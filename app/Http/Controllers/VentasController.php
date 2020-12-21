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
use PhpOffice\PhpWord\Style\Language;
use PhpParser\Node\Stmt\Return_;
use PhpParser\Node\Stmt\TryCatch;

class VentasController extends Controller
{

    public function preventas()
    {

        $preventas = DB::table('vtcall_preventas')
            ->join('vtcall_vendedores', 'vtcall_vendedores.idvendedoresvt', 'vtcall_preventas.vtcall_vendedores_idvendedoresvt')
            ->where('estadopreve', '<', 3)
            ->get();

        $prev_acep = DB::table('vtcall_preventas')
            ->join('vtcall_vendedores', 'vtcall_vendedores.idvendedoresvt', 'vtcall_preventas.vtcall_vendedores_idvendedoresvt')
            ->where('estadopreve', 3)
            ->get();

        $prev_rec = DB::table('vtcall_preventas')
            ->join('vtcall_vendedores', 'vtcall_vendedores.idvendedoresvt', 'vtcall_preventas.vtcall_vendedores_idvendedoresvt')
            ->where('estadopreve', 4)
            ->get();

        return view('backend.ventas.listadoprev', [
            'preventas' => $preventas,
            'prev_acep' => $prev_acep,
            'prev_rec' => $prev_rec
        ]);

    }

    public function generar_contrato(Request $request)
    {

        $preventa = DB::table('vtcall_preventas')
            ->join('vtcall_comunas', 'vtcall_comunas.idvtcall_comunas', 'vtcall_preventas.vtcall_comunas_idvtcall_comunas')
            ->where('vtcall_preventas.idpreventas', $request->idpreve)
            ->first();

        $preventa_adic = DB::table('vtcall_prev_adic')
            ->where('vtcall_preventas_idpreventas', $request->idpreve)
            ->get();

        //dd($preventa_adic[0]);

        $phpWord = new \PhpOffice\PhpWord\PhpWord();

        $sectionStyle = array(
            'marginTop' => 1000,
        );

        $section = $phpWord->addSection($sectionStyle);

        $text = "CONTRATO DE SERVICIO<w:br />DE SECRETARIA VIRTUAL";

        $section->addImage('http://virtualcall.cl/img/logovt.png', array(
                'width' => 270,
                'height' => 80,
                'marginTop' => -1,
                'marginLeft' => -1,
                'wrappingStyle' => 'behind',
                'align' => 'center'
            )
        );

        $phpWord->addFontStyle('r2Style', array('bold' => true, 'italic' => false, 'size' => 10));
        $phpWord->addParagraphStyle('p1Style', array('align' => 'left', 'spaceAfter' => 100));
        $phpWord->addParagraphStyle('p2Style', array('align' => 'center', 'spaceAfter' => 100));
        $phpWord->addParagraphStyle('p3Style', array('align' => 'both', 'spaceAfter' => 100));
        $section->addText($text, array('bold' => true, 'underline' => false, 'italic' => false, 'size' => 14, 'align' => 'center'), 'p2Style');

        $section->addTextBreak();

        $text = "En Concepción, a " . date('d / m / Y') . " comparecen por una parte, la Empresa VirtualCall SpA, Rut 77.220.746-8, representada para" .
            " estos efectos por don CARLOS ANDRÉS SALINAS SILVA, Rut: 13.380.076-K , Gerente General de la Empresa anteriormente" .
            " identificada, ambos con domicilio en Francisco de Quiñones 253, Lomas de San Andrés, comuna de Concepción, en" .
            " adelante VirtualCall y Don(ña) " . $preventa->nomrepleg . " " . $preventa->patrepleg . " " . $preventa->matrepleg . ", Cédula de Identidad número " . $preventa->runrepleg . ", de nacionalidad " . $preventa->nacrepleg . ", en representación de " . $preventa->razonsocprev . "," .
            " Rut " . $preventa->rutprev . ", ambos con domicilio en la Comuna de " . $preventa->nombrecomuna . " en adelante el Cliente, quienes han acordado el contrato de" .
            " Servicio que constan en las cláusulas que a continuación se exponen:";

        $section->addText($text, array('bold' => false, 'underline' => false, 'italic' => false, 'size' => 11, 'align' => 'both'), 'p3Style');

        $section->addTextBreak();

        $text = "PRIMERO:";
        $section->addText($text, array('bold' => true, 'underline' => false, 'italic' => false, 'size' => 12, 'align' => 'left'), 'p1Style');

        $text = "Las partes suscriben por el presente instrumento un acuerdo Comercial y de Confidencialidad," .
            " materia del Contrato que comenzará a regir a contar de la fecha de suscripción del mismo.";

        $section->addText($text, array('bold' => false, 'underline' => false, 'italic' => false, 'size' => 11, 'align' => 'both'), 'p3Style');

        $section->addTextBreak();

        $text = "SEGUNDO:";
        $section->addText($text, array('bold' => true, 'underline' => false, 'italic' => false, 'size' => 12, 'align' => 'left'), 'p1Style');

        $text = "Las partes se comprometen a los siguientes puntos, que se definen como fundamentales para " .
            "el buen cumplimiento del presente contrato:";
        $section->addText($text, array('bold' => false, 'underline' => false, 'italic' => false, 'size' => 11, 'align' => 'both'), 'p3Style');

        $phpWord->addNumberingStyle(
            'multilevel',
            array(
                'type' => 'multilevel',
                'levels' => array(
                    array('format' => 'decimal', 'text' => '%1.', 'left' => 720, 'hanging' => 360, 'tabPos' => 720),
                )
            )
        );

        $phpWord->addNumberingStyle(
            'multilevel2',
            array(
                'type' => 'multilevel',
                'levels' => array(
                    array('format' => 'decimal', 'text' => '%1.', 'left' => 720, 'hanging' => 360, 'tabPos' => 720),
                )
            )
        );

        $phpWord->addNumberingStyle(
            'multilevel3',
            array(
                'type' => 'multilevel',
                'levels' => array(
                    array('format' => 'decimal', 'text' => '%1.', 'left' => 720, 'hanging' => 360, 'tabPos' => 720),
                )
            )
        );

        $phpWord->addNumberingStyle(
            'multilevel4',
            array(
                'type' => 'multilevel',
                'levels' => array(
                    array('format' => 'decimal', 'text' => '%1.', 'left' => 720, 'hanging' => 360, 'tabPos' => 720),
                )
            )
        );

        $phpWord->addNumberingStyle(
            'multilevel5',
            array(
                'type' => 'multilevel',
                'levels' => array(
                    array('format' => 'decimal', 'text' => '%1.', 'left' => 720, 'hanging' => 360, 'tabPos' => 720),
                )
            )
        );

        $phpWord->addNumberingStyle(
            'multilevel6',
            array(
                'type' => 'multilevel',
                'levels' => array(
                    array('format' => 'decimal', 'text' => '%1.', 'left' => 720, 'hanging' => 360, 'tabPos' => 720),
                )
            )
        );

        $phpWord->addNumberingStyle(
            'multilevel7',
            array(
                'type' => 'multilevel',
                'levels' => array(
                    array('format' => 'decimal', 'text' => '%1.', 'left' => 720, 'hanging' => 360, 'tabPos' => 720),
                )
            )
        );

        $phpWord->addNumberingStyle(
            'multilevel8',
            array(
                'type' => 'multilevel',
                'levels' => array(
                    array('format' => 'decimal', 'text' => '%1.', 'left' => 720, 'hanging' => 360, 'tabPos' => 720),
                )
            )
        );

        $phpWord->addNumberingStyle(
            'multilevel9',
            array(
                'type' => 'multilevel',
                'levels' => array(
                    array('format' => 'decimal', 'text' => '%1.', 'left' => 720, 'hanging' => 360, 'tabPos' => 720),
                )
            )
        );

        $phpWord->addNumberingStyle(
            'multilevel10',
            array(
                'type' => 'multilevel',
                'levels' => array(
                    array('format' => 'decimal', 'text' => '%1.', 'left' => 720, 'hanging' => 360, 'tabPos' => 720),
                )
            )
        );

        $phpWord->addNumberingStyle(
            'multilevel11',
            array(
                'type' => 'multilevel',
                'levels' => array(
                    array('format' => 'decimal', 'text' => '%1.', 'left' => 720, 'hanging' => 360, 'tabPos' => 720),
                )
            )
        );

        $text_1 = "Virtualcall pondrá a disposición del Cliente la cantidad de un número fijo," .
            " que será exclusivo, de tal forma que el Cliente pueda publicarlo en su página web, papelería," .
            " tarjetas de presentación y en todo medio posible, sin limitación alguna, a fin de posicionarlo" .
            " públicamente para ser contactado a través de éste.";

        $section->addListItem($text_1, 0, null, 'multilevel', array('bold' => false, 'underline' => false, 'italic' => false, 'size' => 11, 'align' => 'both'));

        $text_1 = "La línea telefónica (número exclusivo) que Virtualcall le asignará al Cliente es en calidad" .
            " de COMODATO mientras este contrato se mantenga vigente. En caso de que el Cliente dé de baja este contrato," .
            " esta línea podrá ser asignada a otro cliente.";

        $section->addListItem($text_1, 0, null, 'multilevel', array('bold' => false, 'underline' => false, 'italic' => false, 'size' => 11, 'align' => 'both'));

        $text_1 = "Virtualcall prestará el servicio de Telefonista, para lo cual deberá contratar el Recurso Humano" .
            " necesario para satisfacer las necesidades del Cliente, especialmente para minimizar las posibles llamadas perdidas" .
            " y así mantener comunicado al Cliente con su mercado objetivo.";

        $section->addListItem($text_1, 0, null, 'multilevel', array('bold' => false, 'underline' => false, 'italic' => false, 'size' => 11, 'align' => 'both'));

        $text_1 = "El Cliente deberá pagar el mes anticipado hasta el mismo día de vencida la fecha. Si esto no ocurriera," .
            " Virtualcall dará de baja el servicio en forma inmediata, liberando la línea telefónica asignadas al Cliente.";

        $section->addListItem($text_1, 0, null, 'multilevel', array('bold' => false, 'underline' => false, 'italic' => false, 'size' => 11, 'align' => 'both'));

        $text_1 = "Este servicio se prestará de lunes a viernes, de 09:00 a 19:00 hrs, horario continuado para el" .
            " plan Golden. En caso de contratar el Plan Platinum, este servicio se prestará de lunes a viernes, de 09:00 a" .
            " 19:00 hrs, horario continuado y los días sábado de 09:00 a 14:00 hrs. ";

        $section->addListItem($text_1, 0, null, 'multilevel', array('bold' => false, 'underline' => false, 'italic' => false, 'size' => 11, 'align' => 'both'));

        $text_1 = "Fuera de los horarios establecidos anteriormente, VirtualCall mantendrá una grabación Genérica, indicando" .
            " el horario de atención.";

        $section->addListItem($text_1, 0, null, 'multilevel', array('bold' => false, 'underline' => false, 'italic' => false, 'size' => 11, 'align' => 'both'));

        $section = $phpWord->addSection($sectionStyle);

        $text_1 = "La Telefonista, perteneciente al staff de Virtualcall, contestará las llamadas entrantes al número asignado" .
            " al Cliente según el protocolo establecido por el mismo, llamada que podrá ser transferida al Cliente al número telefónico" .
            " que defina, el cual podrá ser fijo (anexo Virtualcall) o celular (aplicación móvil). Todo lo anterior detallado en anexo A.";

        $section->addListItem($text_1, 0, null, 'multilevel', array('bold' => false, 'underline' => false, 'italic' => false, 'size' => 11, 'align' => 'both'));

        $text_1 = "En el caso de que el Cliente solicite se le derive sus llamadas a un equipo celular, será de" .
            " responsabilidad del Cliente mantener un plan móvil en el mismo, descargar la aplicación y cargar el código" .
            " QR que Virtualcall le facilitará.";

        $section->addListItem($text_1, 0, null, 'multilevel', array('bold' => false, 'underline' => false, 'italic' => false, 'size' => 11, 'align' => 'both'));

        $text_1 = "En caso de que el Cliente solicite se le transfiera sus llamadas a un anexo telefónico fijo, será de" .
            " responsabilidad del Cliente la instalación y programación del mismo. Virtualcall entregará al Cliente un manual" .
            " de instalación y programación para facilitar la instalación de su anexo";

        $section->addListItem($text_1, 0, null, 'multilevel', array('bold' => false, 'underline' => false, 'italic' => false, 'size' => 11, 'align' => 'both'));

        $text_1 = "Virtualcall guardará en base de datos un registro de todas las llamadas recibidas y perdidas. A su" .
            " vez mantendrá un registro de las llamadas transferidas. Todo este tráfico telefónico deberá estar disponible al" .
            " Cliente en plataforma Online, para lo cual VirtualCall entregará Login y Password de uso exclusivo del Cliente," .
            " quien podrá modificar su password en forma remota y las veces que estime conveniente.";

        $section->addListItem($text_1, 0, null, 'multilevel', array('bold' => false, 'underline' => false, 'italic' => false, 'size' => 11, 'align' => 'both'));

        $section->addTextBreak();

        $text = "TERCERO:";
        $section->addText($text, array('bold' => true, 'underline' => false, 'italic' => false, 'size' => 12, 'align' => 'left'), 'p1Style');

        $text = "Con respecto al pago de los servicios Virtualcall:";
        $section->addText($text, array('bold' => false, 'underline' => false, 'italic' => false, 'size' => 11, 'align' => 'both'), 'p3Style');

        $text_1 = "El Cliente pagará a Virtualcall la suma acordada en Anexo A de este documento, en el plazo acorde al Plan Contratado";

        $section->addListItem($text_1, 0, null, 'multilevel2', array('bold' => false, 'underline' => false, 'italic' => false, 'size' => 11, 'align' => 'both'));

        $text_1 = "La fecha de pago es anticipado. En el caso de renovación de contrato, el pago se realizará 30 días contra la fecha de facturación de dicha renovación.";

        $section->addListItem($text_1, 0, null, 'multilevel2', array('bold' => false, 'underline' => false, 'italic' => false, 'size' => 11, 'align' => 'both'));

        $text = "Las formas de pago son:";
        $section->addText($text, array('bold' => false, 'underline' => false, 'italic' => false, 'size' => 11, 'align' => 'both'), 'p3Style');

        $text_1 = "Efectivo en las oficinas de VirtualCall";
        $section->addListItem($text_1, 0, null, 'multilevel2', array('bold' => false, 'underline' => false, 'italic' => false, 'size' => 11, 'align' => 'both'));

        $text_1 = "Tarjetas de Crédito o Débito en las oficinas de VirtuallCall o a través de su portal web.";
        $section->addListItem($text_1, 0, null, 'multilevel2', array('bold' => false, 'underline' => false, 'italic' => false, 'size' => 11, 'align' => 'both'));

        $text_1 = "Con cheques, pudiendo documentar los meses del Plan Contratado.";
        $section->addListItem($text_1, 0, null, 'multilevel2', array('bold' => false, 'underline' => false, 'italic' => false, 'size' => 11, 'align' => 'both'));

        $text_1 = "Transferencia Electrónica a la Cuenta Corriente de Banco Chile, número 02255742510, Titular Virtualcall SpA, rut 77.220.746-8, " .
            "mail de respaldo ventas@virtualcall.cl";
        $section->addListItem($text_1, 0, null, 'multilevel2', array('bold' => false, 'underline' => false, 'italic' => false, 'size' => 11, 'align' => 'both'));

        $section->addTextBreak();

        $text = "CUARTO:";
        $section->addText($text, array('bold' => true, 'underline' => false, 'italic' => false, 'size' => 12, 'align' => 'left'), 'p1Style');

        $text = "Durante la duración de este contrato y después de terminado, las partes tratarán como confidencial y no revelarán a terceros:";
        $section->addText($text, array('bold' => false, 'underline' => false, 'italic' => false, 'size' => 11, 'align' => 'both'), 'p3Style');

        $text_1 = "Los términos del este contrato.";

        $section->addListItem($text_1, 0, null, 'multilevel3', array('bold' => false, 'underline' => false, 'italic' => false, 'size' => 11, 'align' => 'both'));

        $text_1 = "Toda información y/o datos de cualquier naturaleza utilizada por ambas partes para la ejecución de la relación contractual.";

        $section->addListItem($text_1, 0, null, 'multilevel3', array('bold' => false, 'underline' => false, 'italic' => false, 'size' => 11, 'align' => 'both'));

        $text_1 = "Información relacionada con cualquiera de sus filiales y sus respectivas instalaciones, incluyendo," .
            " sin limitación alguna, las operaciones sociales, las políticas de la empresa, técnicas, cuentas, o información" .
            " utilizada por ambas partes para la conducción de este contrato.";

        $section->addListItem($text_1, 0, null, 'multilevel3', array('bold' => false, 'underline' => false, 'italic' => false, 'size' => 11, 'align' => 'both'));

        $section->addTextBreak();

        $text = "QUINTO:";
        $section->addText($text, array('bold' => true, 'underline' => false, 'italic' => false, 'size' => 12, 'align' => 'left'), 'p1Style');

        $text = "Corresponde a VirtualCall:";
        $section->addText($text, array('bold' => false, 'underline' => false, 'italic' => false, 'size' => 11, 'align' => 'both'), 'p3Style');

        $text_1 = "Entregar al Cliente todos los datos o información de los servicios contratados.";

        $section->addListItem($text_1, 0, null, 'multilevel4', array('bold' => false, 'underline' => false, 'italic' => false, 'size' => 11, 'align' => 'both'));

        $text_1 = "Entregar y capacitar al personal asignado por el Cliente para la" .
            " manipulación de los servicios asociados al presente contrato.";

        $section->addListItem($text_1, 0, null, 'multilevel4', array('bold' => false, 'underline' => false, 'italic' => false, 'size' => 11, 'align' => 'both'));

        $text_1 = "Apoyo en la implementación de soluciones telefónicas.";

        $section->addListItem($text_1, 0, null, 'multilevel4', array('bold' => false, 'underline' => false, 'italic' => false, 'size' => 11, 'align' => 'both'));

        $text_1 = "Entregar un soporte técnico eficiente, previa solicitud, no pudiendo en caso alguno actuar" .
            " directamente en esta materia sin autorización expresa del cliente.";

        $section->addListItem($text_1, 0, null, 'multilevel4', array('bold' => false, 'underline' => false, 'italic' => false, 'size' => 11, 'align' => 'both'));

        $text_1 = "Informar periódicamente y con la debida anticipación al Cliente sobre modificaciones o reajustes" .
            " en los precios o cambios de políticas de los servicios de Virtualcall.";

        $section->addListItem($text_1, 0, null, 'multilevel4', array('bold' => false, 'underline' => false, 'italic' => false, 'size' => 11, 'align' => 'both'));

        $section->addTextBreak();

        $text = "SEXTO:";
        $section->addText($text, array('bold' => true, 'underline' => false, 'italic' => false, 'size' => 12, 'align' => 'left'), 'p1Style');

        $text = "Los puntos establecidos en el o los anexos del presente contrato pasarán a ser parte íntegra del presente documento.";
        $section->addText($text, array('bold' => false, 'underline' => false, 'italic' => false, 'size' => 11, 'align' => 'both'), 'p3Style');

        $section->addTextBreak();

        $text = "SÉPTIMO:";
        $section->addText($text, array('bold' => true, 'underline' => false, 'italic' => false, 'size' => 12, 'align' => 'left'), 'p1Style');

        $text = "A la fecha de la suscripción del presente contrato y sólo como información, los servicios generales" .
            " de Virtualcall y sus valores son los siguientes:";
        $section->addText($text, array('bold' => false, 'underline' => false, 'italic' => false, 'size' => 11, 'align' => 'both'), 'p3Style');

        $section->addTextBreak();

        $text = "PLAN GOLDEN:";
        $section->addText($text, array('bold' => false, 'underline' => false, 'italic' => false, 'size' => 11, 'align' => 'both'), 'p3Style');

        $text_1 = "1 Número Exclusivo";
        $section->addListItem($text_1, 0, null, 'multilevel5', array('bold' => false, 'underline' => false, 'italic' => false, 'size' => 11, 'align' => 'both'));

        $text_1 = "1 Celular (vía aplicación) o Anexo para derivación de llamados";
        $section->addListItem($text_1, 0, null, 'multilevel5', array('bold' => false, 'underline' => false, 'italic' => false, 'size' => 11, 'align' => 'both'));

        $text_1 = "Servicio de lunes a Viernes de 09:00 a 19:00 am continuado";
        $section->addListItem($text_1, 0, null, 'multilevel5', array('bold' => false, 'underline' => false, 'italic' => false, 'size' => 11, 'align' => 'both'));

        $text_1 = "Valor $30.000 mensuales";
        $section->addListItem($text_1, 0, null, 'multilevel5', array('bold' => false, 'underline' => false, 'italic' => false, 'size' => 11, 'align' => 'both'));

        $section->addTextBreak();

        $text = "PLAN PLATINIUM:";
        $section->addText($text, array('bold' => false, 'underline' => false, 'italic' => false, 'size' => 11, 'align' => 'both'), 'p3Style');

        $text_1 = "1 Número Exclusivo";
        $section->addListItem($text_1, 0, null, 'multilevel6', array('bold' => false, 'underline' => false, 'italic' => false, 'size' => 11, 'align' => 'both'));

        $text_1 = "1 Celular (vía aplicación) o Anexo para derivación de llamados";
        $section->addListItem($text_1, 0, null, 'multilevel6', array('bold' => false, 'underline' => false, 'italic' => false, 'size' => 11, 'align' => 'both'));

        $text_1 = "Servicio de lunes a Viernes de 09:00 a 19:00 am continuado y los sábado de 09:00 a 14:00 hrs.";
        $section->addListItem($text_1, 0, null, 'multilevel6', array('bold' => false, 'underline' => false, 'italic' => false, 'size' => 11, 'align' => 'both'));

        $text_1 = "Valor $35.000 mensuales";
        $section->addListItem($text_1, 0, null, 'multilevel6', array('bold' => false, 'underline' => false, 'italic' => false, 'size' => 11, 'align' => 'both'));

        $section->addTextBreak();

        $text = "SERVICIOS EXTRAS:";
        $section->addText($text, array('bold' => false, 'underline' => false, 'italic' => false, 'size' => 11, 'align' => 'both'), 'p3Style');

        $text_1 = "Agenda Online: $10.000 Mensuales";
        $section->addListItem($text_1, 0, null, 'multilevel7', array('bold' => false, 'underline' => false, 'italic' => false, 'size' => 11, 'align' => 'both'));

        $text_1 = "Números Exclusivos (máximo 1 por contrato): $10.000 Mensuales";
        $section->addListItem($text_1, 0, null, 'multilevel7', array('bold' => false, 'underline' => false, 'italic' => false, 'size' => 11, 'align' => 'both'));

        $section->addTextBreak();

        $text = "OCTAVO:";
        $section->addText($text, array('bold' => true, 'underline' => false, 'italic' => false, 'size' => 12, 'align' => 'left'), 'p1Style');

        $text = "El servicio brindado por Virtualcall podría tener complicaciones en su proceso de comunicación cuando el enlace de internet del" .
            " Cliente esté muy saturado o sea insuficiente para el correcto desempeño del servicio, especialmente en el caso de transferencia al" .
            " celular del Cliente, quedando sujeto a caídas, cortes, pérdida de datos, tiempos de respuesta elevados, etc. Siendo ésta d responsabilidad" .
            " del proveedor de internet con el cual el Cliente tenga contrato vigente. No obstante, Virtualcall mantendrá en sistema y con acceso 24x7 al" .
            " Cliente de su tráfico de llamadas, con toda la información necesaria para que éste pueda devolver el llamado.";
        $section->addText($text, array('bold' => false, 'underline' => false, 'italic' => false, 'size' => 11, 'align' => 'both'), 'p3Style');

        $section->addTextBreak();
        $text = "NOVENO:";
        $section->addText($text, array('bold' => true, 'underline' => false, 'italic' => false, 'size' => 12, 'align' => 'left'), 'p1Style');

        $text = "El presente contrato tendrá una vigencia mínimo de 6 meses, a contar de la fecha antes mencionada y luego de este plazo se extenderá" .
            " en forma indefinida, siendo que cualquiera de las partes manifieste su voluntad de poner término al presente, no habrá objeción en el" .
            " cese de la prestación de servicios siempre y cuando no existan pagos pendientes o facturas impagas. En caso de término anticipado, el" .
            " cliente deberá dar aviso con 30 días de anticipación y por escrito a ventas@virtualcall.cl. ";
        $section->addText($text, array('bold' => false, 'underline' => false, 'italic' => false, 'size' => 11, 'align' => 'both'), 'p3Style');

        $section->addTextBreak();
        $text = "DÉCIMO:";
        $section->addText($text, array('bold' => true, 'underline' => false, 'italic' => false, 'size' => 12, 'align' => 'left'), 'p1Style');

        $text = "Cualquier dificultad que se suscitase entre las partes por motivos de interpretación, incumplimiento," .
            " validez o nulidad, será resuelta por un árbitro asignado de común acuerdo, en contra de cuya resolución no" .
            " procederá recurso legal alguno.";
        $section->addText($text, array('bold' => false, 'underline' => false, 'italic' => false, 'size' => 11, 'align' => 'both'), 'p3Style');

        $section->addTextBreak();
        $text = "DÉCIMO PRIMERO:";
        $section->addText($text, array('bold' => true, 'underline' => false, 'italic' => false, 'size' => 12, 'align' => 'left'), 'p1Style');

        $text = "Para todos los efectos legales derivados del presente contrato, las partes fijan su domicilio en las ciudades estipuladas";
        $section->addText($text, array('bold' => false, 'underline' => false, 'italic' => false, 'size' => 11, 'align' => 'both'), 'p3Style');

        $section->addTextBreak();
        $text = "DÉCIMO SEGUNDO:";
        $section->addText($text, array('bold' => true, 'underline' => false, 'italic' => false, 'size' => 12, 'align' => 'left'), 'p1Style');

        $text = "El presente contrato se suscribe en dos ejemplares, no siendo necesario la validación de un Notario ni de un" .
            " tercero ministro de fe, quedando uno en poder de cada parte.";
        $section->addText($text, array('bold' => false, 'underline' => false, 'italic' => false, 'size' => 11, 'align' => 'both'), 'p3Style');

        $section->addImage('http://virtualcall.cl/img/firma_carlos.png', array(
                'width' => 450,
                'marginTop' => -1,
                'marginLeft' => -1,
                'wrappingStyle' => 'behind',
                'align' => 'center'
            )
        );

        /////////////
        ///
        /// ANEXO A
        ///
        /////////////

        $section = $phpWord->addSection($sectionStyle);

        $text = "ANEXO A";

        $section->addImage('http://virtualcall.cl/img/logovt.png', array(
                'width' => 270,
                'height' => 80,
                'marginTop' => -1,
                'marginLeft' => -1,
                'wrappingStyle' => 'behind',
                'align' => 'center'
            )
        );

        $section->addText($text, array('bold' => true, 'underline' => false, 'italic' => false, 'size' => 14, 'align' => 'center'), 'p2Style');

        $section->addTextBreak();

        $text = "En Concepción, a " . date(' d / m / y') . " comparecen por una parte, la Empresa VirtualCall SpA, Rut 77.220.746-8, representada para estos efectos por don" .
            " CARLOS ANDRÉS SALINAS SILVA, Rut: 13.380.076-K , Gerente General de la Empresa anteriormente identificada, ambos con domicilio" .
            " en Francisco de Quiñones 253, Lomas de San Andrés, comuna de Concepción, en adelante VirtualCall y Doñ(a) " . $preventa->nomrepleg . " " . $preventa->patrepleg . " " . $preventa->matrepleg . ", Cédula de Identidad número " . $preventa->runrepleg . ", de nacionalidad " . $preventa->nacrepleg . ", en representación de " . $preventa->razonsocprev . "," .
            " Rut " . $preventa->rutprev . ", ambos con domicilio en la Comuna de " . $preventa->nombrecomuna . "  en adelante el Cliente," .
            " quienes han acordado los siguientes puntos del Anexo A, el que se considera parte íntegra del contrato de prestación de servicios suscrito por las partes:";

        $section->addText($text, array('bold' => false, 'underline' => false, 'italic' => false, 'size' => 11, 'align' => 'both'), 'p3Style');

        $section->addTextBreak();
        $text = "SERVICIOS CONTRATADOS Y CARGO MENSUAL:";
        $section->addText($text, array('bold' => true, 'underline' => false, 'italic' => false, 'size' => 12, 'align' => 'left'), 'p1Style');


        $fontStyle = array('bold' => true, 'align' => 'center');
        $fontStyle2 = array('bold' => true, 'align' => 'left');
        $styleTable = array('borderSize' => 2, 'borderColor' => '000000', 'cellMargin' => 10);
        $styleFirstRow = array('borderBottomSize' => 14, 'borderBottomColor' => '000000', 'bgColor' => 'CCCCCC');
        $phpWord->addTableStyle('Fancy Table', $styleTable, $styleFirstRow);
        $table = $section->addTable('Fancy Table');
        $table->addRow();
        $table->addCell(6000)->addText(htmlspecialchars('SERVICIO'), array('align' => 'center', 'bold' => true), $fontStyle);
        $table->addCell(1200)->addText(htmlspecialchars('$ / MENSUAL'), array('align' => 'center', 'bold' => true), $fontStyle);
        $table->addCell(500)->addText(htmlspecialchars('SI'), array('align' => 'center', 'bold' => true), $fontStyle);
        $table->addCell(500)->addText(htmlspecialchars('NO'), array('align' => 'center', 'bold' => true), $fontStyle);
        $table->addCell(1500)->addText(htmlspecialchars('SUBTOTAL'), array('align' => 'center', 'bold' => true), $fontStyle);

        $table->addRow();
        $table->addCell(6000)->addText(htmlspecialchars('Golden / Lunes a Viernes 09:00 a 19:00 hrs'), array('align' => 'left', 'bold' => false), $fontStyle2);
        $table->addCell(1200)->addText(htmlspecialchars('$30.000'), array('align' => 'left', 'bold' => false), $fontStyle);
        {
            {
                if ($preventa->vtcall_planes_idplanes == 1 || $preventa->vtcall_planes_idplanes == 3) {
                    $table->addCell(500)->addText(htmlspecialchars('X'), array('align' => 'left', 'bold' => false), $fontStyle);
                    $table->addCell(500)->addText(htmlspecialchars(''), array('align' => 'left', 'bold' => false), $fontStyle);
                    $table->addCell(1500)->addText(htmlspecialchars('$ 30.000'), array('align' => 'left', 'bold' => false), $fontStyle);
                } elseif ($preventa->vtcall_planes_idplanes == 2 || $preventa->vtcall_planes_idplanes == 4) {
                    $table->addCell(500)->addText(htmlspecialchars(''), array('align' => 'left', 'bold' => false), $fontStyle);
                    $table->addCell(500)->addText(htmlspecialchars('X'), array('align' => 'left', 'bold' => false), $fontStyle);
                    $table->addCell(1500)->addText(htmlspecialchars('-'), array('align' => 'left', 'bold' => false), $fontStyle);
                }
            }
        }


        $table->addRow();
        $table->addCell(6000)->addText(htmlspecialchars('Platinum / Lun a Viern 09:00 a 19:00 hrs / Sábados 09:00 a 14:00 hrs'), array('align' => 'left', 'bold' => false), $fontStyle2);
        $table->addCell(1200)->addText(htmlspecialchars('$35.000'), array('align' => 'left', 'bold' => false), $fontStyle);
        {
            {
                if ($preventa->vtcall_planes_idplanes == 2 || $preventa->vtcall_planes_idplanes == 4) {
                    $table->addCell(500)->addText(htmlspecialchars('X'), array('align' => 'left', 'bold' => false), $fontStyle);
                    $table->addCell(500)->addText(htmlspecialchars(''), array('align' => 'left', 'bold' => false), $fontStyle);
                    $table->addCell(1500)->addText(htmlspecialchars('$ 35.000'), array('align' => 'left', 'bold' => false), $fontStyle);
                } elseif ($preventa->vtcall_planes_idplanes == 1 || $preventa->vtcall_planes_idplanes == 3) {
                    $table->addCell(500)->addText(htmlspecialchars(''), array('align' => 'left', 'bold' => false), $fontStyle);
                    $table->addCell(500)->addText(htmlspecialchars('X'), array('align' => 'left', 'bold' => false), $fontStyle);
                    $table->addCell(1500)->addText(htmlspecialchars('-'), array('align' => 'left', 'bold' => false), $fontStyle);
                }
            }
        }

        $table->addRow();
        $table->addCell(6000)->addText(htmlspecialchars('Un número Extra Exclusivo'), array('align' => 'left', 'bold' => false), $fontStyle2);
        $table->addCell(1200)->addText(htmlspecialchars('$10.000'), array('align' => 'left', 'bold' => false), $fontStyle);
        {
            {
                if ($preventa_adic[1]->vtcall_adicionales_idadicionales == 5) {
                    $table->addCell(500)->addText(htmlspecialchars('X'), array('align' => 'left', 'bold' => false), $fontStyle);
                    $table->addCell(500)->addText(htmlspecialchars(''), array('align' => 'left', 'bold' => false), $fontStyle);
                    $table->addCell(1500)->addText(htmlspecialchars('$ 10.000'), array('align' => 'left', 'bold' => false), $fontStyle);
                } elseif ($preventa_adic[1]->vtcall_adicionales_idadicionales == 4) {
                    $table->addCell(500)->addText(htmlspecialchars(''), array('align' => 'left', 'bold' => false), $fontStyle);
                    $table->addCell(500)->addText(htmlspecialchars('X'), array('align' => 'left', 'bold' => false), $fontStyle);
                    $table->addCell(1500)->addText(htmlspecialchars('-'), array('align' => 'left', 'bold' => false), $fontStyle);
                }
            }
        }

        $table->addRow();
        $table->addCell(6000)->addText(htmlspecialchars('Agenda Online'), array('align' => 'left', 'bold' => false), $fontStyle2);
        $table->addCell(1200)->addText(htmlspecialchars('$10.000'), array('align' => 'left', 'bold' => false), $fontStyle);
        {
            {
                if ($preventa_adic[0]->vtcall_adicionales_idadicionales == 2) {
                    $table->addCell(500)->addText(htmlspecialchars('X'), array('align' => 'left', 'bold' => false), $fontStyle);
                    $table->addCell(500)->addText(htmlspecialchars(''), array('align' => 'left', 'bold' => false), $fontStyle);
                    $table->addCell(1500)->addText(htmlspecialchars('$ 0 (GRATIS)'), array('align' => 'left', 'bold' => false), $fontStyle);
                } elseif ($preventa_adic[0]->vtcall_adicionales_idadicionales == 3) {
                    $table->addCell(500)->addText(htmlspecialchars('X'), array('align' => 'left', 'bold' => false), $fontStyle);
                    $table->addCell(500)->addText(htmlspecialchars(''), array('align' => 'left', 'bold' => false), $fontStyle);
                    $table->addCell(1500)->addText(htmlspecialchars('$ 10.000'), array('align' => 'left', 'bold' => false), $fontStyle);
                } elseif ($preventa_adic[0]->vtcall_adicionales_idadicionales == 1) {
                    $table->addCell(500)->addText(htmlspecialchars(''), array('align' => 'left', 'bold' => false), $fontStyle);
                    $table->addCell(500)->addText(htmlspecialchars('X'), array('align' => 'left', 'bold' => false), $fontStyle);
                    $table->addCell(1500)->addText(htmlspecialchars('-'), array('align' => 'left', 'bold' => false), $fontStyle);
                }
            }
        }


        $section->addTextBreak();
        $text = "FORMA DE PAGO:";
        $section->addText($text, array('bold' => true, 'underline' => false, 'italic' => false, 'size' => 12, 'align' => 'left'), 'p1Style');


        $phpWord->addTableStyle('Fancy Table', $styleTable, $styleFirstRow);
        $table = $section->addTable('Fancy Table');
        $table->addRow();
        $table->addCell(6000)->addText(htmlspecialchars('FORMA DE PAGO'), array('align' => 'center', 'bold' => true), $fontStyle);
        $table->addCell(1000)->addText(htmlspecialchars('SI'), array('align' => 'center', 'bold' => true), $fontStyle);
        $table->addCell(1000)->addText(htmlspecialchars('NO'), array('align' => 'center', 'bold' => true), $fontStyle);
        $table->addCell(2000)->addText(htmlspecialchars('MONTO'), array('align' => 'center', 'bold' => true), $fontStyle);

        $table->addRow();
        if ($preventa->vtcall_planes_idplanes == 1 || $preventa->vtcall_planes_idplanes == 2) {
            $table->addCell(6000)->addText(htmlspecialchars('Mensual'), array('align' => 'left', 'bold' => false), $fontStyle2);
            $table->addCell(1000)->addText(htmlspecialchars('X'), array('align' => 'left', 'bold' => false), $fontStyle);
            $table->addCell(1000)->addText(htmlspecialchars(''), array('align' => 'left', 'bold' => false), $fontStyle);
            if ($preventa->vtcall_planes_idplanes == 1) {
                $table->addCell(2000)->addText(htmlspecialchars('$ 30.000'), array('align' => 'left', 'bold' => false), $fontStyle2);
            } else {
                $table->addCell(2000)->addText(htmlspecialchars('$ 35.000'), array('align' => 'left', 'bold' => false), $fontStyle2);
            }
        } else {
            $table->addCell(6000)->addText(htmlspecialchars('Mensual'), array('align' => 'left', 'bold' => false), $fontStyle2);
            $table->addCell(1000)->addText(htmlspecialchars(''), array('align' => 'left', 'bold' => false), $fontStyle);
            $table->addCell(1000)->addText(htmlspecialchars('X'), array('align' => 'left', 'bold' => false), $fontStyle);
            $table->addCell(2000)->addText(htmlspecialchars('-'), array('align' => 'left', 'bold' => false), $fontStyle2);
        }


        $table->addRow();
        if ($preventa->vtcall_planes_idplanes == 3 || $preventa->vtcall_planes_idplanes == 4) {
            $table->addCell(6000)->addText(htmlspecialchars('Semestral'), array('align' => 'left', 'bold' => false), $fontStyle2);
            $table->addCell(1000)->addText(htmlspecialchars('X'), array('align' => 'left', 'bold' => false), $fontStyle);
            $table->addCell(1000)->addText(htmlspecialchars(''), array('align' => 'left', 'bold' => false), $fontStyle);
            if ($preventa->vtcall_planes_idplanes == 3) {
                $table->addCell(2000)->addText(htmlspecialchars('$180.000'), array('align' => 'left', 'bold' => false), $fontStyle2);
            } else {
                $table->addCell(2000)->addText(htmlspecialchars('$210.000'), array('align' => 'left', 'bold' => false), $fontStyle2);
            }
        } else {
            $table->addCell(6000)->addText(htmlspecialchars('Semestral'), array('align' => 'left', 'bold' => false), $fontStyle2);
            $table->addCell(1000)->addText(htmlspecialchars(''), array('align' => 'left', 'bold' => false), $fontStyle);
            $table->addCell(1000)->addText(htmlspecialchars('X'), array('align' => 'left', 'bold' => false), $fontStyle);
            $table->addCell(2000)->addText(htmlspecialchars('-'), array('align' => 'left', 'bold' => false), $fontStyle2);
        }

        $section->addTextBreak();
        $text = "VARIOS: (RELLENAR POR EL CLIENTE)";
        $section->addText($text, array('bold' => true, 'underline' => false, 'italic' => false, 'size' => 12, 'align' => 'left'), 'p1Style');

        $phpWord->addTableStyle('Fancy Table', $styleTable, $styleFirstRow);
        $table = $section->addTable('Fancy Table');
        $table->addRow();
        $table->addCell(4000)->addText(htmlspecialchars('ITEM'), array('align' => 'center', 'bold' => true), $fontStyle);
        $table->addCell(6000)->addText(htmlspecialchars('OBSERVACION'), array('align' => 'center', 'bold' => true), $fontStyle);

        $table->addRow();
        $table->addCell(4000)->addText(htmlspecialchars(''), array('align' => 'left', 'bold' => false), $fontStyle2);
        $table->addCell(6000)->addText(htmlspecialchars(''), array('align' => 'left', 'bold' => false), $fontStyle2);

        $table->addRow();
        $table->addCell(4000)->addText(htmlspecialchars(''), array('align' => 'left', 'bold' => false), $fontStyle2);
        $table->addCell(6000)->addText(htmlspecialchars(''), array('align' => 'left', 'bold' => false), $fontStyle2);

        $table->addRow();
        $table->addCell(4000)->addText(htmlspecialchars(''), array('align' => 'left', 'bold' => false), $fontStyle2);
        $table->addCell(6000)->addText(htmlspecialchars(''), array('align' => 'left', 'bold' => false), $fontStyle2);

        $table->addRow();
        $table->addCell(4000)->addText(htmlspecialchars(''), array('align' => 'left', 'bold' => false), $fontStyle2);
        $table->addCell(6000)->addText(htmlspecialchars(''), array('align' => 'left', 'bold' => false), $fontStyle2);


        $section->addTextBreak();
        $text = "PROTOCOLO DE ATENCIÓN (RELLENAR POR CLIENTE):";
        $section->addText($text, array('bold' => true, 'underline' => false, 'italic' => false, 'size' => 12, 'align' => 'left'), 'p1Style');

        $phpWord->addTableStyle('Fancy Table', $styleTable, $styleFirstRow);
        $table = $section->addTable('Fancy Table');
        $table->addRow();
        $table->addCell(3000)->addText(htmlspecialchars('PROTOCOLO DE ATENCION'), array('align' => 'center', 'bold' => true), $fontStyle);
        $table->addCell(6000)->addText(htmlspecialchars('EJEMPLO'), array('align' => 'center', 'bold' => true), $fontStyle);

        $table->addRow();
        $table->addCell(4000)->addText(htmlspecialchars('LLAMADA ENTRANTE'), array('align' => 'left', 'bold' => false), $fontStyle2);
        $table->addCell(6000)->addText(htmlspecialchars('HOLA, EMPRESA XXX BUENOS/AS XXXXXX, EN QUE PODEMOS AYUDARLE ...'), array('align' => 'left', 'bold' => false), $fontStyle2);

        $table->addRow();
        $table->addCell(4000)->addText(htmlspecialchars('NOTIFICACIÓN WHATSAPP'), array('align' => 'left', 'bold' => false), $fontStyle2);
        $table->addCell(6000)->addText(htmlspecialchars('+56 9 XXXX XXXX (AQUÍ SE ENVIARAN LOS MENSAJES RECIBIDOS POR LA TELEFONISTA'), array('align' => 'left', 'bold' => false), $fontStyle2);

        $table->addRow();
        $table->addCell(4000)->addText(htmlspecialchars('NOTIFICACIÓN E-MAIL'), array('align' => 'left', 'bold' => false), $fontStyle2);
        $table->addCell(6000)->addText(htmlspecialchars('CONTACTO@MIEMPRESA.CL (AQUÍ SE ENVIARAN LOS MENSAJES RECIBIDOS POR LA TELEFONISTA'), array('align' => 'left', 'bold' => false), $fontStyle2);


        $section->addTextBreak();
        $text = "CONTACTOS (RELLENAR POR CLIENTE):";
        $section->addText($text, array('bold' => true, 'underline' => false, 'italic' => false, 'size' => 12, 'align' => 'left'), 'p1Style');

        $phpWord->addTableStyle('Fancy Table', $styleTable, $styleFirstRow);
        $table = $section->addTable('Fancy Table');
        $table->addRow();
        $table->addCell(500)->addText(htmlspecialchars('N° CONTACTO'), array('align' => 'center', 'bold' => true), $fontStyle);
        $table->addCell(2000)->addText(htmlspecialchars('NOMBRE'), array('align' => 'center', 'bold' => true), $fontStyle);
        $table->addCell(1000)->addText(htmlspecialchars('FONO'), array('align' => 'center', 'bold' => true), $fontStyle);
        $table->addCell(1000)->addText(htmlspecialchars('CELULAR'), array('align' => 'center', 'bold' => true), $fontStyle);
        $table->addCell(3500)->addText(htmlspecialchars('MAIL'), array('align' => 'center', 'bold' => true), $fontStyle);

        $table->addRow();
        $table->addCell(500)->addText(htmlspecialchars('1'), array('align' => 'left', 'bold' => false), $fontStyle2);
        $table->addCell(2000)->addText(htmlspecialchars(''), array('align' => 'left', 'bold' => false), $fontStyle2);
        $table->addCell(1000)->addText(htmlspecialchars(''), array('align' => 'left', 'bold' => false), $fontStyle2);
        $table->addCell(1000)->addText(htmlspecialchars(''), array('align' => 'left', 'bold' => false), $fontStyle2);
        $table->addCell(3500)->addText(htmlspecialchars(''), array('align' => 'left', 'bold' => false), $fontStyle2);

        $table->addRow();
        $table->addCell(500)->addText(htmlspecialchars('2'), array('align' => 'left', 'bold' => false), $fontStyle2);
        $table->addCell(2000)->addText(htmlspecialchars(''), array('align' => 'left', 'bold' => false), $fontStyle2);
        $table->addCell(1000)->addText(htmlspecialchars(''), array('align' => 'left', 'bold' => false), $fontStyle2);
        $table->addCell(1000)->addText(htmlspecialchars(''), array('align' => 'left', 'bold' => false), $fontStyle2);
        $table->addCell(3500)->addText(htmlspecialchars(''), array('align' => 'left', 'bold' => false), $fontStyle2);

        $table->addRow();
        $table->addCell(500)->addText(htmlspecialchars('3'), array('align' => 'left', 'bold' => false), $fontStyle2);
        $table->addCell(2000)->addText(htmlspecialchars(''), array('align' => 'left', 'bold' => false), $fontStyle2);
        $table->addCell(1000)->addText(htmlspecialchars(''), array('align' => 'left', 'bold' => false), $fontStyle2);
        $table->addCell(1000)->addText(htmlspecialchars(''), array('align' => 'left', 'bold' => false), $fontStyle2);
        $table->addCell(3500)->addText(htmlspecialchars(''), array('align' => 'left', 'bold' => false), $fontStyle2);

        $section->addTextBreak();
        $text = "INFORMACIÓN RELEVANTE DEL CLIENTE (RELLENAR POR CLIENTE):";
        $section->addText($text, array('bold' => true, 'underline' => false, 'italic' => false, 'size' => 12, 'align' => 'left'), 'p1Style');

        $phpWord->addTableStyle('Fancy Table', $styleTable, $styleFirstRow);
        $table = $section->addTable('Fancy Table');
        $table->addRow();
        $table->addCell(3000)->addText(htmlspecialchars('ITEM'), array('align' => 'center', 'bold' => true), $fontStyle);
        $table->addCell(7000)->addText(htmlspecialchars('OBSERVACIONES'), array('align' => 'center', 'bold' => true), $fontStyle);

        $table->addRow();
        $table->addCell(3000)->addText(htmlspecialchars('SITIO WEB'), array('align' => 'left', 'bold' => false), $fontStyle2);
        $table->addCell(7000)->addText(htmlspecialchars(''), array('align' => 'left', 'bold' => false), $fontStyle2);

        $table->addRow();
        $table->addCell(3000)->addText(htmlspecialchars('DIRECCIÓN'), array('align' => 'left', 'bold' => false), $fontStyle2);
        $table->addCell(7000)->addText(htmlspecialchars(''), array('align' => 'left', 'bold' => false), $fontStyle2);

        $table->addRow();
        $table->addCell(3000)->addText(htmlspecialchars('SUCURSALES'), array('align' => 'left', 'bold' => false), $fontStyle2);
        $table->addCell(7000)->addText(htmlspecialchars(''), array('align' => 'left', 'bold' => false), $fontStyle2);

        $table->addRow();
        $table->addCell(3000)->addText(htmlspecialchars('HORARIO DE ATENCION'), array('align' => 'left', 'bold' => false), $fontStyle2);
        $table->addCell(7000)->addText(htmlspecialchars(''), array('align' => 'left', 'bold' => false), $fontStyle2);

        $table->addRow();
        $table->addCell(3000)->addText(htmlspecialchars('OTROS'), array('align' => 'left', 'bold' => false), $fontStyle2);
        $table->addCell(7000)->addText(htmlspecialchars(''), array('align' => 'left', 'bold' => false), $fontStyle2);


        $section->addTextBreak();
        $section->addImage('http://virtualcall.cl/img/firma_carlos.png', array(
                'width' => 450,
                'marginTop' => -1,
                'marginLeft' => -1,
                'wrappingStyle' => 'behind',
                'align' => 'center'
            )
        );

        /////////////
        ///
        /// FIN DEL DOC WORD
        ///
        /////////////
        $phpWord->getSettings()->setThemeFontLang(new Language("es-ES"));

        $filename = "" . "Contrato.docx";
        header("Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document");
        header('Content-Disposition: attachment; filename=' . $filename);
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save('php://output');


    }

    public function ficha_preventa(Request $request)
    {

        $id_prev = $request->idpreve;

        $fic_prev = DB::table('vtcall_preventas')
            ->join('vtcall_planes', 'vtcall_planes.idplanes', 'vtcall_preventas.vtcall_planes_idplanes')
            ->join('vtcall_comunas', 'vtcall_comunas.idvtcall_comunas', 'vtcall_preventas.vtcall_comunas_idvtcall_comunas')
            ->join('vtcall_vendedores', 'vtcall_vendedores.idvendedoresvt', 'vtcall_preventas.vtcall_vendedores_idvendedoresvt')
            ->where('idpreventas', $id_prev)
            ->first();

        $anexos_plan = DB::table('vtcall_prev_adic')
            ->join('vtcall_adicionales', 'vtcall_adicionales.idadicionales', 'vtcall_prev_adic.vtcall_adicionales_idadicionales')
            ->where('vtcall_preventas_idpreventas', $id_prev)
            ->get();

        return view('backend.ventas.fichapreventa', [
            'fic_prev' => $fic_prev,
            'anex_plan' => $anexos_plan
        ]);

    }

    public function confirmar_datosprev(Request $request)
    {

        DB::table('vtcall_preventas')
            ->where('idpreventas', $request->idprev)
            ->update([
                'razonsocprev' => $request->rsocemp,
                'mailcontprev' => $request->mail,
                'celularprev' => $request->celular,
                'patrepleg' => $request->apat,
                'matrepleg' => $request->amat,
                'nomrepleg' => $request->nombres,
                'estadopreve' => 2,
            ]);

        return $this->preventas();
    }

    public function confirmar_venta(Request $request)
    {
        $prev = DB::table('vtcall_preventas')
            ->where('vtcall_preventas.idpreventas', $request->idprev)
            ->first();

        //// CREAR CLIENTE

        $id_cli = DB::table('vtcall_clientes')->insertGetId([
            'rutcliente' => $prev->rutprev,
            'razonsoccliente' => $prev->razonsocprev,
            'fonocliente' => $prev->celularprev,
            'mailnotif' => $prev->mailcontprev,
            'avancepl1' => 1,
            'vtcall_comunas_idvtcall_comunas' => $prev->vtcall_comunas_idvtcall_comunas,
        ]);


        DB::table('vtcall_rep_legal')->insert([
            'rutreplegal' => $prev->runrepleg,
            'apaternorlegal' => $prev->patrepleg,
            'amaternorlegal' => $prev->matrepleg,
            'nombresrlegal' => $prev->nomrepleg,
            'nacionalidadrlegal' => $prev->nacrepleg,
            'celrlegal' => $prev->celrepleg,
            'estadoreplegal' => 1,
            'ecivilrep' => null,
            'uniqrlegemp' => $prev->runrepleg . '-' . $id_cli,
            'vtcall_clientes_idclientes' => $id_cli,
        ]);

        dd($id_cli);

        DB::table('vtcall_preventas')
            ->where('idpreventas', $request->idprev)
            ->update([
                'estadopreve' => 3,
            ]);

        return $this->preventas();
    }

    public function eliminar_venta(Request $request)
    {

        DB::table('vtcall_preventas')
            ->where('idpreventas', $request->idprev)
            ->update([
                'estadopreve' => 4,
            ]);

        return $this->preventas();
    }

}
