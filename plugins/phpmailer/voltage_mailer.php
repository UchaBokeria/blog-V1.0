<?php
//this is not vltage mailer, this is technick info mailer
date_default_timezone_set('Etc/UTC');
header('Content-Type: text/html; charset=utf-8');

require_once('/var/www/eproBit/includes/excel/PHPExcel.php');
require_once('/var/www/eproBit/includes/excel/PHPExcel/IOFactory.php');

require_once('/var/www/eproBit/includes/phpmailer/PHPMailerAutoload.php');
require_once('/var/www/eproBit/includes/phpmailer/class.smtp.php');
require_once('/var/www/eproBit/includes/classes/core.php');

function nullValueFixer($value){

    return $value == null ? 0 : $value;

}

$current_date = date("Y-m-d");

$objPHPExcel = new PHPExcel();

$rendererName = PHPExcel_Settings::PDF_RENDERER_TCPDF;
$rendererLibraryPath = '/var/www/eproBit/includes/excel/tcpdf';

$res = mysql_query("SELECT               branch.`name`,
                        			     service_center.`name`,
                                         COUNT(*),
                        				--  SUM(IF(incomming_call.cat_1 = 11,1,0)) AS `teqnikuri`,
                                         SUM(IF(incomming_call.cat_1 = 11 AND incomming_call.cat_1_1 = 24,1,0)) AS `usafrtxoeba`,
                                         SUM(IF(incomming_call.cat_1 = 11 AND incomming_call.cat_1_1 = 28,1,0)) AS `zaralis_anazgaureba`,
                                         SUM(IF(incomming_call.cat_1 = 11 AND incomming_call.cat_1_1 = 69,1,0)) AS `dabali_zabva`,
                                
                                         SUM(IF(incomming_call.cat_1 = 80,1,0)) AS `avariuli_gatishva`,
                                         SUM(IF(incomming_call.cat_1 = 80 AND incomming_call.cat_1_1 in(97,84),1,0)) AS `gare_mizeze`,
										 SUM(IF(incomming_call.cat_1 = 77,1,0)) as `gegmiuri_gatishva`,
										 SUM(IF(incomming_call.cat_1 = 77 AND incomming_call.cat_1_1 in(86,96),1,0)) as `gegmiuri_gatishva_gare_mizezi`
                                FROM     incomming_call
                                JOIN     personal_info ON personal_info.incomming_call_id = incomming_call.id
                                JOIN     branch ON branch.id = personal_info.branch_id
                                JOIN     service_center ON service_center.id = personal_info.service_center_id
                                WHERE    DATE(incomming_call.date) BETWEEN '$current_date' AND '$current_date'
                                GROUP BY service_center.id");
    
    $b = 1;
    
    $objPHPExcel->getActiveSheet()->setCellValue("A".$b,'ფილიალი');
    $objPHPExcel->getActiveSheet()->setCellValue("B".$b,'მომსახურების ცენტრი');
    $objPHPExcel->getActiveSheet()->setCellValue("C".$b,'უსაფრთხოება');
    $objPHPExcel->getActiveSheet()->setCellValue("D".$b,'ზარალის ანაზღაურება #');
    $objPHPExcel->getActiveSheet()->setCellValue("E".$b,'დაბალი ძაბვა');
    $objPHPExcel->getActiveSheet()->setCellValue("F".$b,'ავარიული გათიშვა');
    $objPHPExcel->getActiveSheet()->setCellValue("G".$b,'ავარიული გარე მიზეზით');
    $objPHPExcel->getActiveSheet()->setCellValue("H".$b,'გეგმიური გათიშვა');
    $objPHPExcel->getActiveSheet()->setCellValue("I".$b,'გეგმიური გარე მიზეზით');
    
    $a                 = 3;
    $region_name_saver = "";
    $region_name       = "";
    
    while ($row = mysql_fetch_array($res)) {
    
        $objPHPExcel->getActiveSheet()->setCellValue("A".$a,$row[0])->getColumnDimension('A')->setWidth(12);
        $objPHPExcel->getActiveSheet()->setCellValue("B".$a,$row[1])->getColumnDimension('B')->setWidth(11);
        $objPHPExcel->getActiveSheet()->setCellValue("C".$a,$row[2])->getColumnDimension('C')->setWidth(11);
        $objPHPExcel->getActiveSheet()->setCellValue("D".$a,$row[3])->getColumnDimension('D')->setWidth(11);
        $objPHPExcel->getActiveSheet()->setCellValue("E".$a,$row[4])->getColumnDimension('E')->setWidth(11);
        $objPHPExcel->getActiveSheet()->setCellValue("F".$a,$row[5])->getColumnDimension('F')->setWidth(11);
        $objPHPExcel->getActiveSheet()->setCellValue("G".$a,$row[6])->getColumnDimension('G')->setWidth(11);
        $objPHPExcel->getActiveSheet()->setCellValue("H".$a,$row[7])->getColumnDimension('H')->setWidth(11);
        $objPHPExcel->getActiveSheet()->setCellValue("I".$a,$row[8])->getColumnDimension('I')->setWidth(11);
        
        $a++;
    }

    if (!PHPExcel_Settings::setPdfRenderer(
            $rendererName,
            $rendererLibraryPath
        )) {
        die(
            'NOTICE: Please set the $rendererName and $rendererLibraryPath values' .
            '<br />' .
            'at the top of this script as appropriate for your directory structure'
        );
    };
    
    // Redirect output to a client’s web browser (PDF)
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment;filename="ქოლ-ცენტრი ტექნიკური რეპორტი.pdf"');
    header('Cache-Control: max-age=0');

    $writerObject = PHPExcel_IOFactory::createWriter($objPHPExcel, 'PDF');
    $writerObject->save('/var/www/eproBit/media/excel/technick.pdf');

    sleep(30);

$subject 	 		= "ქოლ-ცენტრი ტექნიკური რეპორტი";
$body 	 			= " ";
$attachmet          = '/var/www/eproBit/media/excel/technick.pdf';

$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';
//Set the hostname of the mail server
$mail->Host = "mail.energo-pro.ge";
//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 587;
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication
$mail->Username = "customers@energo-pro.ge";
//Password to use for SMTP authentication
$mail->Password = 'Em$Kj4+FDG';
//Set who the message is to be sent from
$mail->setFrom('customers@energo-pro.ge', 'Energo Pro');
//Set an alternative reply-to address
$mail->addReplyTo('customers@energo-pro.ge', 'Energo Pro');
//Set who the message is to be sent to

// query addreses with relevant report type
$query_addresses = mysql_query("SELECT mail FROM persons_phone WHERE report_type = 2 AND actived = 1");

// loop throw addresses
while($res = mysql_fetch_array($query_addresses)) {
    $mail->addAddress($res[0]);
}
// $mail->addAddress("giorgi.natsvlishvili@energo-pro.ge");
// add mail subject, attachment and body
$mail->Subject = $subject;
$mail->addAttachment($attachmet);
$mail->msgHTML($body);

//send the message, check for errors
$mail->send();