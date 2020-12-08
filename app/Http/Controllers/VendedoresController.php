<?php

namespace App\Http\Controllers;

use Ajaxray\PHPWatermark\Watermark;
use App\Mail\AvisoPostulacionRecibida;
use App\Mail\AvisoPreventaEmpresa;
use App\Mail\AvisoPreventaVendedor;
use App\Mail\AvisoPreventaVirtualCALL;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\AvisoDocumentoInterno;
use App\Mail\AvisoReEnvioDocumentoInterno;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\This;
use PhpParser\Node\Stmt\Return_;
use PhpParser\Node\Stmt\TryCatch;
use App\Clients;
use Twilio\Rest\Client;

class VendedoresController extends Controller
{
    protected $client;

    public function __construct()
    {
        $this->twilioClient = new Client('ACe7ef376b767348818c418cb118048628', 'ffc27e83f62ea619ab52ae7d584534ad');
    }

    public function login()
    {

        return view('frontend.vendedores.login');

    }

    public function relogin()
    {

        return view('frontend.vendedores.relogin');

    }

    public function aspirantes()
    {

        $region_comuna = DB::table('vtcall_comunas')
            ->join('vtcall_regiones', 'vtcall_regiones.idvtcall_regiones', 'vtcall_comunas.vtcall_regiones_idvtcall_regiones')
            ->orderby('vtcall_comunas.nombrecomuna', 'ASC')
            ->get();

        return view('frontend.vendedores.aspirantes.inscripcion', [
            'comunas' => $region_comuna
        ]);

    }

    public function aspirantes2()
    {

        $region_comuna = DB::table('vtcall_comunas')
            ->join('vtcall_regiones', 'vtcall_regiones.idvtcall_regiones', 'vtcall_comunas.vtcall_regiones_idvtcall_regiones')
            ->orderby('vtcall_comunas.nombrecomuna', 'ASC')
            ->get();

        return view('frontend.vendedores.aspirantes.inscripcion2', [
            'comunas' => $region_comuna
        ]);

    }

    public function guardar_aspirantes(Request $request)
    {

        $ex_asp = DB::table('vtcall_aspirantes')
            ->where('rutasp', $request->rut)
            ->count();

        if ($ex_asp == 0) {
            DB::table('vtcall_aspirantes')->insert([
                'feccreasp' => date('Y-m-d H:i:s'),
                'fecmodasp' => null,
                'rutasp' => $request->rut,
                'appaternoasp' => $request->apasp,
                'apmaternoasp' => $request->amasp,
                'nombresasp' => $request->nomasp,
                'fecnacasp' => $request->fecnacasp,
                'correoasp' => $request->mailcont,
                'celularasp' => $request->numcelver,
                'nivelestasp' => $request->nivelest,
                'obsasp' => $request->obsasp,
                'estadoasp' => 1,
                'vtcall_comunas_idvtcall_comunas' => $request->comunaprev,
            ]);

            $comuna = DB::table('vtcall_comunas')
                ->where('idvtcall_comunas', $request->comunaprev)
                ->first();

            $data_correo = array(
                'nombre' => $request->nomasp,
                'nombrecompleto' => $request->nomasp . ' ' . $request->apasp . ' ' . $request->amasp,
                'fono' => $request->numcelver,
                'correo' => $request->mailcont,
                'comuna' => $comuna->nombrecomuna,
                'obs' => $request->obsasp,
            );

            Mail::to($request->mailcont)
                ->cc('csalinas@virtualcall.cl')
                ->bcc('soporte@virtualcall.cl')
                ->send(new AvisoPostulacionRecibida($data_correo));

            return $this->aspirantes2();
        } else {
            return $this->aspirantes2();
        }


    }

    /////////////////////////////////
    ///
    /// VENTAS / PREVENTAS
    ///
    /// /////////////////////////////

    public function panel_ventas(Request $request)
    {

        $vendedor = DB::table('vtcall_vendedores')
            ->where([
                ['clavevend', $request->clavevend],
                ['estadovend', 1] //Activo
            ])
            ->count();

        if ($vendedor == 1) {

            $vendedor = DB::table('vtcall_vendedores')
                ->where([
                    ['clavevend', $request->clavevend],
                    ['estadovend', 1] //Activo
                ])
                ->first();

            $region_comuna = DB::table('vtcall_comunas')
                ->join('vtcall_regiones', 'vtcall_regiones.idvtcall_regiones', 'vtcall_comunas.vtcall_regiones_idvtcall_regiones')
                ->orderby('vtcall_comunas.nombrecomuna', 'ASC')
                ->get();

            $sector_eco = DB::table('vtcall_seconomico')
                ->get();

            $planes = DB::table('vtcall_planes')
                ->where('estadoplan', 1)
                ->get();

            $adic = DB::table('vtcall_adicionales')
                ->where([
                    ['estadoadic', 1],
                    ['catadic', 1]
                ])
                ->get();

            $adic2 = DB::table('vtcall_adicionales')
                ->where([
                    ['estadoadic', 1],
                    ['catadic', 2]
                ])
                ->get();

            return view('frontend.vendedores.preventa.panel', [
                'vendedor' => $vendedor,
                'comunas' => $region_comuna,
                'sector_eco' => $sector_eco,
                'planes' => $planes,
                'adic' => $adic,
                'adic2' => $adic2
            ]);

        } else {
            return view('frontend.vendedores.nologin');
        }

    }

    public function panel_final()
    {
        return view('frontend.vendedores.preventa.panel2');
    }

    public function guardar_preventa(Request $request)
    {

        /// GUARDA PREVENTA EN BD
        ///
        $id_prev = DB::table('vtcall_preventas')->insertGetID([
            'codprev' => date('y') . '-PREV-' . rand(1000, 9000),
            'fecregistroprev' => date('Y-m-d H:i:s'),
            'rutprev' => $request->rut,
            'razonsocprev' => $request->rsocprev,
            'subsectorprev' => $request->subsec,
            'nomcontprev' => $request->nombrecont,
            'mailcontprev' => $request->mailcont,
            'celularprev' => $request->numcel,
            'obsprev' => $request->obspreventa,
            'probpreventa' => $request->probprev,
            'estadopreve' => 1,
            'runrepleg' => $request->rutemp,
            'patrepleg' => $request->apasp,
            'matrepleg' => $request->amasp,
            'nomrepleg' => $request->nomasp,
            'nacrepleg' => $request->nacrl,
            'estcivrepleg' => $request->ecrl,
            'fonorepleg' => $request->fijorl,
            'celrepleg' => $request->celrl,
            'vtcall_seconomico_idsececo' => $request->sec_eco,
            'vtcall_vendedores_idvendedoresvt' => $request->idvend,
            'vtcall_comunas_idvtcall_comunas' => $request->comunaprev,
            'vtcall_planes_idplanes' => $request->idplanes,
        ]);

        $valor_adic1 = DB::table('vtcall_adicionales')
            ->where('idadicionales', $request->idadic1)
            ->first();

        $valor_adic2 = DB::table('vtcall_adicionales')
            ->where('idadicionales', $request->idadic2)
            ->first();

        $valor_adic1 = intval($valor_adic1->valoradic);
        $valor_adic2 = intval($valor_adic2->valoradic);

        DB::table('vtcall_prev_adic')->insert([
            'estadoadicprev' => 1,
            'valorprevadic' => $valor_adic1,
            'vtcall_preventas_idpreventas' => $id_prev,
            'vtcall_adicionales_idadicionales' => $request->idadic1,
        ]);

        DB::table('vtcall_prev_adic')->insert([
            'estadoadicprev' => 1,
            'valorprevadic' => $valor_adic2,
            'vtcall_preventas_idpreventas' => $id_prev,
            'vtcall_adicionales_idadicionales' => $request->idadic2,
        ]);

        //OBTIENE VENDEDOR
        $vendedor = DB::table('vtcall_vendedores')
            ->join('vtcall_usuarios', 'vtcall_usuarios.idvtcallusers', 'vtcall_vendedores.vtcall_usuarios_idvtcallusers')
            ->where('vtcall_vendedores.idvendedoresvt', $request->idvend)
            ->first();

        $comuna = DB::table('vtcall_comunas')
            ->where('vtcall_comunas.idvtcall_comunas', $request->comunaprev)
            ->first();

        $plan = DB::table('vtcall_planes')
            ->where('vtcall_planes.idplanes', $request->idplanes)
            ->first();

        $adic1 = DB::table('vtcall_adicionales')
            ->where('vtcall_adicionales.idadicionales', $request->idadic1)
            ->first();

        $adic2 = DB::table('vtcall_adicionales')
            ->where('vtcall_adicionales.idadicionales', $request->idadic2)
            ->first();

        $data_correo = array(
            'rutemp' => $request->rut,
            'rsocemp' => $request->rsocprev,
            'nombrecont' => $request->nombrecont,
            'mailcont' => $request->mailcont,
            'telcont' => $request->numcel,
            'comunaemp' => $comuna->nombrecomuna,
            'nivelint' => $request->probprev,
            'planofertado' => $plan->nombreplan,
            'agendaof' => $adic1->nombreadici,
            'numadic' => $adic2->nombreadici,
            'nombrevend' => $vendedor->nombrevend,
            'obspreventa' => $request->obspreventa,
        );

        Mail::to($vendedor->mailpus)
            ->cc('csalinas@virtualcall.cl')
            ->bcc('soporte@virtualcall.cl')
            ->send(new AvisoPreventaVendedor($data_correo));

        Mail::to('csalinas@virtualcall.cl')
            ->bcc('soporte@virtualcall.cl')
            ->send(new AvisoPreventaVirtualCALL($data_correo));

        //Mail::to($request->mailcont)
        //  ->cc('soporte@virtualcall.cl')
        //->send(new AvisoPreventaEmpresa($data_correo));

        return $this->panel_final();

    }

    public function hola()
    {

        $twilio = new Client('ACe7ef376b767348818c418cb118048628', 'ffc27e83f62ea619ab52ae7d584534ad');

        $message = $twilio->messages
            ->create("whatsapp:+56966550512", // to
                array(
                    "from" => "whatsapp:+14155238886",
                    "body" => "Mensaje desde VirtualCALL"
                )
            );

        print($message->sid);

    }

}
