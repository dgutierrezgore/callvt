<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'VtCallController@index');

///////////////
///
///////////////
Route::get('/OperacionLlamada', 'VtCallController@operacion_llamada'); // Formulario de Operación de Llamadas
Route::post('/TraerCliente', 'VtCallController@traer_datos_cliente'); // Trae Info del CLiente VTCALL
Route::post('/TraerDatosNum', 'VtCallController@traer_datos_num_ex'); // Trae Info del Numero Externo
Route::post('/FinLLamadaActDatos', 'VtCallController@finaliza_llamada'); // Finaliza Llamada y Actualiza Datos de Ser Necesario


Route::get('/RegistroLlamadas', 'VtCallController@registro_llamadas');
Route::get('/ReporteDiario', 'VtCallController@reportes_diarios');

///////////////
///
///////////////

Route::get('/NuevoCliente', 'VtCallController@nuevo_cliente'); // Formulario Nuevo Cliente
Route::post('/RegistrarCliente', 'VtCallController@registrar_cliente'); // Registra Nuevo Cliente
Route::post('/ComplementarCliente', 'VtCallController@complementa_registrar_cliente'); // Formulario Complementa Nuevo Cliente
Route::post('/AddRepresentantesLegales', 'VtCallController@registra_rl_cliente'); // Registra Representantes Legales
Route::post('/AddPlanIni', 'VtCallController@registra_plan_inicial'); // Registra Plan Inicial
Route::post('/AddDetallesPAC', 'VtCallController@registra_detalles_pac'); // Registra Detalles PAC
Route::post('/AddDetallesTC', 'VtCallController@registra_detalles_tc'); // Registra Detalles Tarjeta de Crédito
Route::post('/AddContacto', 'VtCallController@registra_contacto'); // Registra Contactos del Cliente
Route::post('/AddContestacion', 'VtCallController@registra_contestacion'); // Registra Contestación Cliente
Route::post('/AddInfoGeneral', 'VtCallController@registra_info_general'); // Registra Contestación Cliente

Route::get('/VerClientes', 'VtCallController@ver_cliente');
Route::get('/VerRepClientes', 'VtCallController@ver_rep_cliente');

///////////////
///
///////////////

Route::get('/CrearUsuario', 'VtCallController@nuevo_usuario'); // Formulario Nuevo Usuario de Sistema
Route::post('/RegistrarUsuario', 'VtCallController@registrar_usuario'); // Registra Nuevo Usuario de Sistema


Route::get('/VerUsuarios', 'VtCallController@ver_usuarios');
Route::get('/RepUsuario', 'VtCallController@ver_rep_usuario');

Route::get('/AcercaDe', 'VtCallController@acerca_de');


Route::post('/GuardarCliente', 'VtCallController@crear_cliente');
Route::post('/GuardarInfoAdicional', 'VtCallController@crear_cliente_ampliado_final');


Route::group(['middleware' => 'auth'], function () {


    Route::get('/home', 'DocumentosInternosController@index');
    Route::get('/GestionDocsInt', 'DocumentosInternosController@gestion_docs_int');
    Route::get('/FichaDocsInt', 'DocumentosInternosController@ingreso_documento');
    Route::get('/Mantenedores', 'DocumentosInternosController@gestion_mantenedores');
    Route::get('/BuscarRegistros', 'DocumentosInternosController@buscar_registros');
    Route::get('/DocsConErrores', 'DocumentosInternosController@documentos_erroneos');


    Route::post('/FichaDocsInt', 'DocumentosInternosController@ficha_docs_interno');

    Route::post('/GuardarNuevoDoc', 'DocumentosInternosController@guardar_nuevo_documento');
    Route::post('/GuardarEnvInt', 'DocumentosInternosController@guardar_envio_interno');
    Route::post('/GuardarEnvCGR', 'DocumentosInternosController@guardar_envio_interno_cgr');
    Route::post('/GuardarRecCGR', 'DocumentosInternosController@guardar_recep_interno_cgr');
    Route::post('/GuardarObsBit', 'DocumentosInternosController@guardar_obs_b_interno_cgr');
    Route::post('/GuardarGrupDis', 'DocumentosInternosController@guardar_grupo_dis_int');

    Route::post('/HabDesFuncGrpInt', 'DocumentosInternosController@hab_des_mante_fun_grp');
    Route::post('/GuardarNuevoGrupoInterno', 'DocumentosInternosController@guardar_grupo_int');
    Route::post('/GuardarNuevoGrupoExterno', 'DocumentosInternosController@guardar_grupo_ext');

    Route::post('/BloquearEntrega', 'DocumentosInternosController@bloquear_doc');

    Route::post('/FichaErrorDocInt', 'DocumentosInternosController@ficha_error_docs');
    Route::post('/GuardarDocCorreg', 'DocumentosInternosController@guardar_doc_correg');

});


