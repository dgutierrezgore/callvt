<?php

namespace App\Http\Controllers;

use Ajaxray\PHPWatermark\Watermark;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\AvisoDocumentoInterno;
use App\Mail\AvisoReEnvioDocumentoInterno;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\Return_;
use PhpParser\Node\Stmt\TryCatch;

class VtCallController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index()
    {
        return view('vendor.adminlte.home');
    }

    public function registro_llamadas()
    {
        return view('backend.registro_llamadas');
    }

    public function reportes_diarios()
    {
        return view('backend.reportes_diarios');
    }

    public function ver_cliente()
    {
        return view('backend.ver_clientes');
    }

    public function ver_rep_cliente()
    {
        return view('backend.ver_rep_cliente');
    }


    public function ver_usuarios()
    {
        return view('backend.gestion_usuarios');
    }

    public function ver_rep_usuario()
    {
        return view('backend.reporte_por_usuario');
    }

    public function acerca_de()
    {
        return view('backend.acerca_de');
    }


    ////////////////////////////////////////////////////////////// OK

    public function nuevo_usuario()
    {

        $region_comuna = DB::table('vtcall_comunas')
            ->join('vtcall_regiones', 'vtcall_regiones.idvtcall_regiones', 'vtcall_comunas.vtcall_regiones_idvtcall_regiones')
            ->get();

        $usuarios_pend = DB::table('vtcall_usuarios')
            ->where('estadous', 1)
            ->get();

        return view('backend.usuarios.ficha_crea_usuario', [
            'regioncomuna' => $region_comuna,
            'usuariospend' => $usuarios_pend,
        ]);
    }

    public function registrar_usuario(Request $request)
    {

        $ex_usuario = DB::table('vtcall_usuarios')
            ->where('rutus', $request->rut)
            ->count();

        if ($ex_usuario == 0) {
            $id_usuario = DB::table('vtcall_usuarios')->insertGetId([
                'fecregistrous' => date('Y-m-d H:i:s'),
                'rutus' => $request->rut,
                'paternous' => $request->user_paterno,
                'maternous' => $request->user_materno,
                'nombresus' => $request->user_nombres,
                'nacus' => $request->user_nacionalidad,
                'fecnacus' => $request->user_fecnac,
                'ecivilus' => $request->user_ecivil,
                'profesionus' => $request->user_prof,
                'oficious' => $request->user_ofic,
                'calleus' => $request->user_calle,
                'numus' => $request->user_num,
                'blockus' => $request->user_block,
                'villaus' => $request->user_villa,
                'ffijous' => $request->user_ffijo,
                'celus' => $request->user_cel,
                'mailpus' => $request->user_mailp,
                'avancepl1us' => 1,
                'avancepl2us' => 0,
                'avancepl3us' => 0,
                'avancepl4us' => 0,
                'estadous' => 1,
                'vtcall_comunas_idvtcall_comunas' => $request->idcomuna,
            ]);
            echo 1;
        } else {
            echo 2;
        }

    }


    ////////////////////////////////////////////////////////////// OK

    public function operacion_llamada()
    {
        return view('backend.operacion.llamadaentrante');
    }

    public function traer_datos_cliente(Request $request)
    {

        $num_datos_cliente = DB::table('vtcall_clientes')
            ->where('fonoentra1', $request->fonoip)
            ->orwhere('fonoentra2', $request->fonoip)
            ->count();

        $datos_cliente = DB::table('vtcall_clientes')
            ->join('vtcall_contactos', 'vtcall_contactos.vtcall_clientes_idclientes', 'vtcall_clientes.idclientes')
            ->where('fonoentra1', $request->fonoip)
            ->orwhere('fonoentra2', $request->fonoip)
            ->get();

        if ($num_datos_cliente == 0) {
            echo 2;
        } else {
            return $datos_cliente;
        }

    }

    public function traer_datos_num_ex(Request $request)
    {

        $num_datos_externos = DB::table('vtcall_externos')
            ->where('numext', $request->fonoex)
            ->count();

        $datos_externos = DB::table('vtcall_externos')
            ->where('numext', $request->fonoex)
            ->get();

        if ($num_datos_externos == 0) {
            echo 2;
        } else {
            return $datos_externos;
        }
    }

    public function finaliza_llamada(Request $request)
    {

        $idcliente = DB::table('vtcall_clientes')
            ->where('fonoentra1', $request->fonocli)
            ->Orwhere('fonoentra2', $request->fonocli)
            ->first();

        DB::table('vtcall_externos')
            ->updateOrInsert(
                ['numext' => $request->fonoex],
                ['numext' => $request->fonoex, 'nombreext' => $request->nombreex, 'empresaext' => $request->empresaex, 'fonosecext' => $request->fonsecex, 'mailext' => $request->mailex]
            );

        $idexterno = DB::table('vtcall_externos')
            ->where('numext', $request->fonoex)
            ->first();

        DB::table('vtcall_registro_llamada')->insert([
            'fechorainillam' => $request->fectoma,
            'fechorafinllam' => date('Y-m-d h:i:s'),
            'mensajellam' => $request->motiex,
            'accion1llam' => $request->ac1,
            'accion2llam' => $request->ac2,
            'accion3llam' => $request->ac3,
            'derivacionllam' => $request->deriva,
            'estadoaudit' => null,
            'vtcall_clientes_idclientes' => $idcliente->idclientes,
            'vtcall_externos_idvtcallext' => $idexterno->idvtcallext,
        ]);

        echo 1;

    }


    ////////////////////////////////////////////////////////////// OK

    public function nuevo_cliente()
    {

        $region_comuna = DB::table('vtcall_comunas')
            ->join('vtcall_regiones', 'vtcall_regiones.idvtcall_regiones', 'vtcall_comunas.vtcall_regiones_idvtcall_regiones')
            ->get();

        $ultimos_5_clientes = DB::table('vtcall_clientes')
            ->orderby('idclientes', 'DESC')
            ->take(5)
            ->get();

        return view('backend.clientes.ficha_crea_cliente', [
            'regioncomuna' => $region_comuna,
            'u_5_c' => $ultimos_5_clientes,
        ]);
    }

    public function registrar_cliente(Request $request)
    {

        $ex_cliente = DB::table('vtcall_clientes')
            ->where('rutcliente', $request->rut)
            ->count();

        if ($ex_cliente == 0) {
            $id_cliente = DB::table('vtcall_clientes')->insertGetId([
                'rutcliente' => $request->rut,
                'razonsoccliente' => $request->rsoc_emp,
                'girocliente' => $request->giro_emp,
                'callecliente' => $request->calle_emp,
                'numcliente' => $request->num_call_emp,
                'blockcliente' => $request->block_call_emp,
                'fonocliente' => $request->fono_emp,
                'sitiowebcliente' => $request->web_emp,
                'estadocliente' => 0,
                'vtcall_comunas_idvtcall_comunas' => $request->idcomuna
            ]);
            echo 1;
        } else {
            echo 2;
        }

    }

    public function complementa_registrar_cliente(Request $request)
    {

        $cliente = DB::table('vtcall_clientes')
            ->join('vtcall_comunas', 'vtcall_comunas.idvtcall_comunas', 'vtcall_clientes.vtcall_comunas_idvtcall_comunas')
            ->join('vtcall_regiones', 'vtcall_comunas.vtcall_regiones_idvtcall_regiones', 'vtcall_regiones.idvtcall_regiones')
            ->where('idclientes', $request->idcli)
            ->first();

        $rep_legales = DB::table('vtcall_rep_legal')
            ->where([
                ['vtcall_clientes_idclientes', $request->idcli],
                ['estadoreplegal', 1]
            ])
            ->get();

        $plan_ini = DB::table('vtcall_servicio_cont')
            ->join('vtcall_planes', 'vtcall_planes.idplanes', 'vtcall_servicio_cont.vtcall_planes_idplanes')
            ->join('vtcall_sis_pago', 'vtcall_sis_pago.idsispago', 'vtcall_servicio_cont.vtcall_sis_pago_idsispago')
            ->where([
                ['vtcall_clientes_idclientes', $request->idcli],
                ['estadoserv', 1]
            ])
            ->first();

        $plan_ini_num = DB::table('vtcall_servicio_cont')
            ->where([
                ['vtcall_clientes_idclientes', $request->idcli],
                ['estadoserv', 1]
            ])
            ->count();

        if ($plan_ini_num >= 1) {
            $fp_ini_num = DB::table('vtcall_fpagos')
                ->where([
                    ['vtcall_servicio_cont_idservcont', $plan_ini->idservcont],
                ])
                ->count();

            $dfpago = DB::table('vtcall_fpagos')
                ->where([
                    ['vtcall_servicio_cont_idservcont', $plan_ini->idservcont],
                ])
                ->first();
        } else {
            $fp_ini_num = null;
            $dfpago = null;
        }

        $bancos = DB::table('vtcall_bancos')
            ->where([
                ['estadobanco', 1]
            ])
            ->get();

        $tipos_cuenta = DB::table('vtcall_tipo_cuenta')
            ->where([
                ['estadotipcuenta', 1]
            ])
            ->get();

        $planes = DB::table('vtcall_planes')
            ->where([
                ['estadoplan', 1]
            ])
            ->get();

        $fpago = DB::table('vtcall_sis_pago')
            ->where([
                ['estadosispago', 1]
            ])
            ->get();

        $contactos = DB::table('vtcall_contactos')
            ->where([
                ['vtcall_clientes_idclientes', $request->idcli],
                ['estadocont', 1]
            ])
            ->get();

        return view('backend.clientes.ficha_complementa_cliente', [
            'cliente' => $cliente,
            'replegales' => $rep_legales,
            'planini' => $plan_ini,
            'planininum' => $plan_ini_num,
            'planes' => $planes,
            'fpago' => $fpago,
            'fpini' => $fp_ini_num,
            'dfini' => $dfpago,
            'bancos' => $bancos,
            'tcuenta' => $tipos_cuenta,
            'contactos' => $contactos
        ]);
    }

    public function registra_rl_cliente(Request $request)
    {

        $ex_rl_cli = DB::table('vtcall_rep_legal')
            ->where('uniqrlegemp', $request->rut . '-' . $request->idcli)
            ->count();

        if ($ex_rl_cli == 0) {
            DB::table('vtcall_rep_legal')->insert([
                'rutreplegal' => $request->rut,
                'apaternorlegal' => $request->pat_rep,
                'amaternorlegal' => $request->mat_rep,
                'nombresrlegal' => $request->nombres_rep,
                'nacionalidadrlegal' => $request->nac_rep,
                'ffijorlegal' => $request->fijo_rep,
                'celrlegal' => $request->cel_rep,
                'mail1replegal' => $request->mail1_rep,
                'mail2replegal' => $request->mail2_rep,
                'fecinireplegal' => date('Y-m-d H:i:s'),
                'fecfinreplegal' => null,
                'estadoreplegal' => 1,
                'ecivilrep' => $request->estadocivil,
                'uniqrlegemp' => $request->rut . '-' . $request->idcli,
                'vtcall_clientes_idclientes' => $request->idcli
            ]);
            echo 1;
        } else {
            echo 2;
        }

    }

    public function registra_plan_inicial(Request $request)
    {

        DB::table('vtcall_servicio_cont')->insert([
            'fecharegistroserv' => date('Y-m-d H:i:s'),
            'feciniserv' => $request->feciniplan,
            'fecfinserv' => $request->fecfinplan,
            'estadoserv' => 1,
            'vtcall_sis_pago_idsispago' => $request->idfpago,
            'vtcall_planes_idplanes' => $request->idplan,
            'vtcall_clientes_idclientes' => $request->idcli
        ]);

        echo 1;

    }

    public function registra_detalles_tc(Request $request)
    {
        DB::table('vtcall_fpagos')->insert([
            'feccreafpagos' => date('Y-m-d H:i:s'),
            'titularpago' => $request->nom_titular,
            'ruttitularpago' => $request->rut2,
            'numcuentapago' => null,
            'tarjetapago' => $request->idtarjeta,
            'numtarjeta' => $request->numtc,
            'feccargopago' => $request->feccargo,
            'fecregpago' => null,
            'montopago' => null,
            'estadopago' => null,
            'vtcall_servicio_cont_idservcont' => $request->idserv,
            'vtcall_tipo_cuenta_idtipocuenta' => null,
            'vtcall_bancos_idbanco' => null
        ]);

        echo 1;
    }

    public function registra_detalles_pac(Request $request)
    {
        DB::table('vtcall_fpagos')->insert([
            'feccreafpagos' => date('Y-m-d H:i:s'),
            'titularpago' => $request->nom_titular2,
            'ruttitularpago' => $request->rut3,
            'numcuentapago' => $request->numcta,
            'tarjetapago' => null,
            'numtarjeta' => null,
            'feccargopago' => $request->feccargo2,
            'fecregpago' => null,
            'montopago' => null,
            'estadopago' => null,
            'vtcall_servicio_cont_idservcont' => $request->idserv,
            'vtcall_tipo_cuenta_idtipocuenta' => $request->idtipocuenta,
            'vtcall_bancos_idbanco' => $request->idbanco
        ]);

        echo 1;
    }

    public function registra_contacto(Request $request)
    {
        DB::table('vtcall_contactos')->insert([
            'feccreacont' => date('Y-m-d H:i:s'),
            'paternocont' => $request->cont_pat,
            'maternocont' => $request->cont_mat,
            'nombrescont' => $request->cont_nombres,
            'celcont' => $request->cont_cel,
            'mailcont' => $request->cont_mail,
            'estadocont' => 1,
            'anex1cont' => $request->anexo,
            'anex2cont' => $request->anexo2,
            'anex3cont' => $request->anexo3,
            'vtcall_clientes_idclientes' => $request->idcli,
        ]);

        DB::table('vtcall_clientes')
            ->where('idclientes', $request->idcli)
            ->increment('contactosac', 1);
        echo 1;
    }

    public function registra_contestacion(Request $request)
    {

        DB::table('vtcall_clientes')
            ->where('idclientes', $request->idcli)
            ->update([
                'fomcontllamada' => $request->contestacion,
                'fonoentra1' => $request->fonoip1,
                'fonoentra2' => $request->fonoip2,
            ]);
        echo 1;

    }

    public function registra_info_general(Request $request)
    {

        DB::table('vtcall_clientes')
            ->where('idclientes', $request->idcli)
            ->update([
                'infoextra' => $request->infoextra
            ]);
        echo 1;
    }

    ///////////////////////////////////////////////////////////////////

}
