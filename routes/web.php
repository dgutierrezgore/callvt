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

Route::get('/Ventas', 'VendedoresController@login');
Route::post('/PanelVentas', 'VendedoresController@panel_ventas');
Route::get('/PanelVentas', 'VendedoresController@login');
Route::post('/GuardarPreVenta', 'VendedoresController@guardar_preventa');
Route::get('/GuardarPreVenta', 'VendedoresController@login');

Route::get('/trabajaconnosotros', 'VendedoresController@aspirantes');
Route::get('/TrabajaConNosotros', 'VendedoresController@aspirantes');
Route::post('/GuardarAspirante', 'VendedoresController@guardar_aspirantes');


Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', 'DocumentosInternosController@index');
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
    Route::post('/ComplementarUsuario', 'VtCallController@complementa_registrar_usuario'); // Complementa el Registro de Usuarios del Sistema
    Route::post('/AddContratoUS', 'VtCallController@registra_c1_usuario'); // Registra Información del Primer Contrato


    Route::get('/VerUsuarios', 'VtCallController@ver_usuarios');
    Route::get('/RepUsuario', 'VtCallController@ver_rep_usuario');

    Route::get('/AcercaDe', 'VtCallController@acerca_de');

    Route::post('/GuardarCliente', 'VtCallController@crear_cliente');
    Route::post('/GuardarInfoAdicional', 'VtCallController@crear_cliente_ampliado_final');

});


