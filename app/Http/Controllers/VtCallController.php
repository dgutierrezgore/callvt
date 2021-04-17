<?php

namespace App\Http\Controllers;

use Ajaxray\PHPWatermark\Watermark;
use App\Mail\AvisoMensajeOperadora;
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

    public function registra_accesos_indebidos($lugar_sistema)
    {
        DB::table('sys_acc_denegado')->insert([
            'fecregistro' => date('Y-m-d H:i:s'),
            'ip' => \Request::ip(),
            'tipo' => $lugar_sistema,
            'sys_sistemas_idsistemasgore' => 1,
            'users_id' => Auth::id()
        ]);
    }

    public function accesos()
    {

        $accesos = DB::table('sys_acc_sistemas')
            ->where([
                ['users_id', Auth::user()->id]
            ])
            ->first();

        if ($accesos == null) {
            return 0;
        }

        if ($accesos->sys_sistemas_idsistemasgore == 1 && $accesos->estadoacc == 1) {
            if ($accesos->nivelacc == 1 || $accesos->nivelacc == 2) {
                return 1;
            } else {
                return 0;
            }
        } else {
            return 0;
        }

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
            ->orderby('vtcall_comunas.nombrecomuna', 'ASC')
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
            if ($request->tform == 'EXT_0120') {
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

                DB::table('vtcall_aspirantes')
                    ->where('idaspirantesvend', $request->idasp)
                    ->update([
                        'fecmodasp' => date('Y-m-d H:i:s'),
                        'estadoasp' => 4,
                    ]);

                echo 1;

            } else {
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
            }
        } else {
            echo 2;
        }

    }

    public function complementa_registrar_usuario(Request $request)
    {

        $usuario = DB::table('vtcall_usuarios')
            ->join('vtcall_comunas', 'vtcall_comunas.idvtcall_comunas', 'vtcall_usuarios.vtcall_comunas_idvtcall_comunas')
            ->join('vtcall_regiones', 'vtcall_comunas.vtcall_regiones_idvtcall_regiones', 'vtcall_regiones.idvtcall_regiones')
            ->where('idvtcallusers', $request->iduser)
            ->first();

        $contrato = DB::table('vtcall_contratos_u')
            ->join('vtcall_bancos', 'vtcall_bancos.idbanco', 'vtcall_contratos_u.vtcall_bancos_idbanco')
            ->join('vtcall_tipo_cuenta', 'vtcall_tipo_cuenta.idtipocuenta', 'vtcall_contratos_u.vtcall_tipo_cuenta_idtipocuenta')
            ->where([
                ['vtcall_usuarios_idvtcallusers', $request->iduser],
                ['numcontratocu', 1]
            ])
            ->first();

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

        $suc_vtcall = DB::table('vtcall_tipo_cuenta')
            ->where([
                ['estadotipcuenta', 1]
            ])
            ->get();

        return view('backend.usuarios.ficha_complementa_usuario', [
            'usuario' => $usuario,
            'tipo_cta' => $tipos_cuenta,
            'bancos' => $bancos,
            'contrato' => $contrato,
            'sucursal' => $suc_vtcall
        ]);

    }

    public function registra_c1_usuario(Request $request)
    {

        DB::table('vtcall_contratos_u')->insert([
            'fecregistrocu' => date('Y-m-d H:i:s'),
            'numcontratocu' => 1,
            'tipocontratocu' => $request->tipocontrato,
            'fecinicu' => $request->fec_ini_cont,
            'fecfincu' => null,
            'cargocu' => $request->tipocargo,
            'previsioncu' => $request->idprev,
            'saludcu' => $request->idsalud,
            'sueldobasecu' => $request->sueldo_base,
            'asigncu' => $request->asignaciones,
            'comcu' => $request->comisiones,
            'numctacu' => $request->numcta,
            'estadocu' => 1,
            'vtcall_usuarios_idvtcallusers' => $request->iduser,
            'vtcall_bancos_idbanco' => $request->idbanco,
            'vtcall_tipo_cuenta_idtipocuenta' => $request->idtipoc
        ]);

        DB::table('vtcall_usuarios')
            ->where('idvtcallusers', $request->iduser)
            ->update([
                'avancepl2us' => 1,
                'idusuario' => 'USR' . date('y') . rand(10, 999),
            ]);

        if ($request->tipocargo == 'VENDEDOR') {

            $usr_vend = 'VND' . date('y') . rand(10, 999);

            DB::table('vtcall_usuarios')
                ->where('idvtcallusers', $request->iduser)
                ->update([
                    'avancepl2us' => 1,
                    'idusuario' => $usr_vend,
                ]);

            DB::table('vtcall_vendedores')->insert([
                'feccreacionvend' => date('Y-m-d H:i:s'),
                'fecbajavend' => null,
                'nombrevend' => $request->nomvend,
                'clavevend' => $usr_vend,
                'estadovend' => 1,
                'vtcall_usuarios_idvtcallusers' => $request->iduser,
            ]);
        }

        return 1;

    }

    public function aspirantes()
    {

        $aspirantes = DB::table('vtcall_aspirantes')
            ->join('vtcall_comunas', 'vtcall_comunas.idvtcall_comunas', 'vtcall_aspirantes.vtcall_comunas_idvtcall_comunas')
            ->where('vtcall_aspirantes.estadoasp', 1)
            ->get();

        $aceptados = DB::table('vtcall_aspirantes')
            ->join('vtcall_comunas', 'vtcall_comunas.idvtcall_comunas', 'vtcall_aspirantes.vtcall_comunas_idvtcall_comunas')
            ->where('vtcall_aspirantes.estadoasp', 2)
            ->get();

        $descartados = DB::table('vtcall_aspirantes')
            ->join('vtcall_comunas', 'vtcall_comunas.idvtcall_comunas', 'vtcall_aspirantes.vtcall_comunas_idvtcall_comunas')
            ->where('vtcall_aspirantes.estadoasp', 3)
            ->get();

        return view('backend.aspirantes.listado', [
            'aspirantes' => $aspirantes,
            'aceptados' => $aceptados,
            'descartados' => $descartados
        ]);
    }

    public function acepta_postulante(Request $request)
    {

        DB::table('vtcall_aspirantes')
            ->where('idaspirantesvend', $request->idasp)
            ->update([
                'fecmodasp' => date('Y-m-d H:i:s'),
                'estadoasp' => 2,
            ]);

        return $this->aspirantes();

    }

    public function descarta_postulante(Request $request)
    {

        DB::table('vtcall_aspirantes')
            ->where('idaspirantesvend', $request->idasp)
            ->update([
                'fecmodasp' => date('Y-m-d H:i:s'),
                'estadoasp' => 3,
            ]);

        return $this->aspirantes();
    }

    public function crear_vendedor(Request $request)
    {

        $region_comuna = DB::table('vtcall_comunas')
            ->join('vtcall_regiones', 'vtcall_regiones.idvtcall_regiones', 'vtcall_comunas.vtcall_regiones_idvtcall_regiones')
            ->orderby('vtcall_comunas.nombrecomuna', 'ASC')
            ->get();

        $info_asp = DB::table('vtcall_aspirantes')
            ->where('idaspirantesvend', $request->idasp)
            ->first();

        return view('backend.aspirantes.formulario', [
            'regioncomuna' => $region_comuna,
            'info_asp' => $info_asp,
            ''
        ]);


    }

    public function id_vendedor()
    {

        $usuarios_pend = DB::table('vtcall_usuarios')
            ->where('estadous', 1)
            ->get();

        return view('backend.aspirantes.listadoparaid', [
            'usuariospend' => $usuarios_pend,
        ]);

    }

    public function gestion_vendedor()
    {

        $vende_hab = DB::table('vtcall_vendedores')
            ->join('vtcall_usuarios', 'vtcall_usuarios.idvtcallusers', 'vtcall_vendedores.vtcall_usuarios_idvtcallusers')
            ->where('estadovend', 1)
            ->get();

        $vende_deshab = DB::table('vtcall_vendedores')
            ->join('vtcall_usuarios', 'vtcall_usuarios.idvtcallusers', 'vtcall_vendedores.vtcall_usuarios_idvtcallusers')
            ->where('estadovend', 0)
            ->get();

        return view('backend.usuarios.listado_vendedores', [
            'vendedores' => $vende_hab,
            'vendedores_d' => $vende_deshab
        ]);

    }

    public function deshabilitar_vendedor(Request $request)
    {

        DB::table('vtcall_vendedores')
            ->where('idvendedoresvt', $request->idvend)
            ->update([
                'estadovend' => 0
            ]);

        return back();
    }

    public function habilitar_vendedor(Request $request)
    {

        DB::table('vtcall_vendedores')
            ->where('idvendedoresvt', $request->idvend)
            ->update([
                'estadovend' => 1
            ]);

        return back();
    }

    public function reporte_vendedor(Request $request)
    {

        return view('backend.usuarios.reporte_vendedores');

    }

    ////////////////////////////////////////////////////////////// OK

    public function nuevo_cliente()
    {

        $accesos = DB::table('sys_acc_sistemas')
            ->where([
                ['users_id', Auth::user()->id]
            ])
            ->first();

        if ($accesos == null) {
            $this->registra_accesos_indebidos('CREAR CLIENTE');
            return view('backend.acc_denegado');
        }

        if ($accesos->sys_sistemas_idsistemasgore == 1 && $accesos->estadoacc == 1) {
            if ($accesos->nivelacc == 1 || $accesos->nivelacc == 3) {
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
            } else {
                $this->registra_accesos_indebidos('CREAR CLIENTE');
                return view('backend.acc_denegado');
            }
        } else {
            $this->registra_accesos_indebidos('CREAR CLIENTE');
            return view('backend.acc_denegado');
        }

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

    public function modifica_cliente()
    {

        $clientes = DB::table('vtcall_clientes')
            ->join('vtcall_rep_legal', 'vtcall_rep_legal.vtcall_clientes_idclientes', 'vtcall_clientes.idclientes')
            ->get();

        return view('backend.clientes.grilla_mod_cliente', [
            'clientes' => $clientes
        ]);

    }

    public function modificar_datos_cliente(Request $request)
    {

        $cliente = DB::table('vtcall_clientes')
            ->where('idclientes', $request->idcli)
            ->first();

        $rep_legales = DB::table('vtcall_rep_legal')
            ->where('vtcall_clientes_idclientes', $request->idcli)
            ->get();

        $contactos = DB::table('vtcall_contactos')
            ->where('vtcall_clientes_idclientes', $request->idcli)
            ->get();

        //$num_entrante = DB::table('')->get();

        //$anexos = DB::table('')->get();

        return view('backend.clientes.form_mod_cliente', [
            'cliente' => $cliente,
            'rl' => $rep_legales,
            'cont' => $contactos
        ]);

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

        $folio_int = DB::table('vtcall_folio_int')
            ->where('estadofolioint', 1)
            ->get();

        $anexos = DB::table('vtcall_anexo_disp')
            ->where('estadoanex', 1)
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
            'contactos' => $contactos,
            'folio_int' => $folio_int,
            'anexos' => $anexos
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

    ////////////////////////////////////////////////////////////// OK

    public function operacion_llamada()
    {
        $accesos = DB::table('sys_acc_sistemas')
            ->where([
                ['users_id', Auth::user()->id]
            ])
            ->first();

        if ($accesos == null) {
            $this->registra_accesos_indebidos('OPERADORA LLAMADA');
            return view('backend.acc_denegado');
        }

        if ($accesos->sys_sistemas_idsistemasgore == 1 && $accesos->estadoacc == 1) {
            if ($accesos->nivelacc == 1 || $accesos->nivelacc == 2) {
                $vend = DB::table('vtcall_vendedores')
                    ->join('vtcall_usuarios', 'vtcall_usuarios.idvtcallusers', 'vtcall_vendedores.vtcall_usuarios_idvtcallusers')
                    ->where('estadovend', 1)
                    ->orderby('vtcall_vendedores.nombrevend', 'ASC')
                    ->get();

                return view('backend.operacion.llamadaentrante', [
                    'vendedores' => $vend
                ]);
            } else {
                $this->registra_accesos_indebidos('OPERADORA LLAMADA');
                return view('backend.acc_denegado');
            }
        } else {
            $this->registra_accesos_indebidos('OPERADORA LLAMADA');
            return view('backend.acc_denegado');
        }
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

        $nombre_cli = DB::table('vtcall_clientes')
            ->where('idclientes', $idcliente->idclientes)
            ->pluck('razonsoccliente');

        $mail_cli = DB::table('vtcall_clientes')
            ->where('idclientes', $idcliente->idclientes)
            ->pluck('mailnotif');

        if ($request->deriva == 1) {
            $der = 'SE DERIVA AL ANEXO';
        } elseif ($request->deriva == 2) {
            $der = 'SE DERIVA AL CELULAR';
        } else {
            $der = 'SE TOMA EL RECADO';
        }

        if ($request->ac1 == null) {
            $ac1 = 'NO';
        } else {
            $ac1 = 'SI';
        }

        if ($request->ac2 == null) {
            $ac2 = 'NO';
        } else {
            $ac2 = 'SI';
        }

        if ($request->ac3 == null) {
            $ac3 = 'NO';
        } else {
            $ac3 = 'SI';
        }

        $data_correo = array(
            'nombre_cli' => strtoupper($nombre_cli),
            'nombre' => strtoupper($request->nombreex),
            'empresa' => strtoupper($request->empresaex),
            'fono_princ' => $request->fonoex,
            'fono_secun' => $request->fonsecex,
            'correo_elec' => strtoupper($request->mailex),
            'mensaje' => strtoupper($request->motiex),
            'acc_rapida1' => $ac1,
            'acc_rapida2' => $ac2,
            'acc_rapida3' => $ac3,
            'derivacion' => $der,
        );

        Mail::to($mail_cli)
            //Mail::to('soporte@virtualcall.cl')
            ->bcc('soporte@virtualcall.cl')
            ->send(new AvisoMensajeOperadora($data_correo));

        echo 1;

    }

    ///////////////////////////////////////////////////////////////////

    public function mantenedor_fonos()
    {

        $fijos_desocupados = DB::table('vtcall_folio_int')
            ->where('estadofolioint', 1)
            ->get();

        $fijos_ocupados = DB::table('vtcall_folio_int')
            ->join('vtcall_clientes', 'vtcall_clientes.fonoentra1', 'vtcall_folio_int.numfolioint')
            ->where('estadofolioint', 2)
            ->get();

        return view('backend.fonoanexos.fonos', [
            'a_dis' => $fijos_desocupados,
            'a_ocu' => $fijos_ocupados
        ]);
    }

    public function mantenedor_anexos()
    {

        $anexos_desocupados = DB::table('vtcall_anexo_disp')
            ->where('estadoanex', 1)
            ->get();

        $anexos_ocupados = DB::table('vtcall_anexo_disp')
            ->join('vtcall_clientes', 'vtcall_clientes.idclientes', 'vtcall_anexo_disp.vtcall_clientes_idclientes')
            ->join('vtcall_folio_int', 'vtcall_folio_int.idfolioint', 'vtcall_clientes.fonoentra1')
            ->where('estadoanex', 2)
            ->get();

        return view('backend.fonoanexos.anexos', [
            'a_dis' => $anexos_desocupados,
            'a_ocu' => $anexos_ocupados
        ]);
    }

    public function crear_anexos(Request $request)
    {

        DB::table('vtcall_anexo_disp')->insert([
            'anexdisp' => $request->num_an,
            'estadoanex' => 1,
            'vtcall_clientes_idclientes' => null
        ]);

        return back();

    }

}
