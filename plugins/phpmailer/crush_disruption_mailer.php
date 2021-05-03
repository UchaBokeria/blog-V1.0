<?php

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

$res = mysql_query("SELECT     region_name,
                                center_id,
                                centers_in_region,
                                center_name,
                                range_calls
                    FROM (
                        SELECT	b.id region_id,
                            b.name as region_name,
                            COUNT(b.name) as centers_in_region
                        FROM branch b
                        JOIN service_center sc ON sc.branch_id = b.id
                        WHERE b.actived = 1
                        GROUP BY b.name
                    ) as region_data
                    RIGHT JOIN 
                    (
                        SELECT  sc.id center_id,
                            sc.branch_id,
                            sc.name as center_name
                        FROM service_center sc
                        WHERE sc.actived = 1
                    ) as center_data ON center_data.branch_id = region_data.region_id
                    LEFT JOIN
                    (
                        SELECT  pi.service_center_id,
                            COUNT(pi.service_center_id) range_calls
                        FROM personal_info pi
                        JOIN incomming_call ic ON pi.incomming_call_id = ic.id
                        WHERE DATE(ic.date) BETWEEN '$current_date' AND '$current_date' AND 
                            ic.cat_1 IN (80)
                         AND  ic.cat_1_1_1 NOT IN(SELECT ct.id FROM info_category AS ct WHERE ct.`name` = '0,4კვ' AND ct.actived = 1)
                        GROUP BY pi.service_center_id
                    ) as range_calls ON range_calls.service_center_id = center_data.center_id");
    
    $b = 1;
    
    $objPHPExcel->getActiveSheet()->setCellValue("A".$b,'ფილიალი');
    $objPHPExcel->getActiveSheet()->setCellValue("B".$b,'მომსახურების ცენტრი');
    $objPHPExcel->getActiveSheet()->setCellValue("C".$b,'ზარების რაოდენობა(პერიოდის)');
    
    $a                 = 3;
    $region_name_saver = "";
    $region_name       = "";
    
    while ($row = mysql_fetch_assoc($res)) {
    
        $region = $row['region_name'];
        $center_id = $row['center_id'];
        $call_center = $row['center_name'];
        $range_calls = nullValueFixer($row['range_calls']);
        $last_time_calls = nullValueFixer($row['last_time_calls']);
    
        if ($row['region_name'] != null && $row['region_name'] != "სათაო" && $row['region_name'] != '' && !empty($row['region_name'])) {
    
            $objPHPExcel->getActiveSheet()->setCellValue("A".$a,$region)->getColumnDimension('A')->setWidth(33);
            $objPHPExcel->getActiveSheet()->setCellValue("B".$a,$call_center)->getColumnDimension('b')->setWidth(33);
            $objPHPExcel->getActiveSheet()->setCellValue("C".$a,$range_calls)->getColumnDimension('c')->setWidth(33);
            
            $a++;
        }
        
       
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
    header('Content-Disposition: attachment;filename="ავარიული გათიშვები.pdf"');
    header('Cache-Control: max-age=0');

    $writerObject = PHPExcel_IOFactory::createWriter($objPHPExcel, 'PDF');
    $writerObject->save('/var/www/eproBit/media/excel/avariuli.pdf');

    sleep(30);

$subject 	 		= "ავარიული გათიშვები";
$body 	 			= " ";
$attachmet          = '/var/www/eproBit/media/excel/avariuli.pdf';

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
$query_addresses = mysql_query("SELECT mail FROM persons_phone WHERE report_type = 1 AND actived = 1");

// loop throw addresses
while($res = mysql_fetch_array($query_addresses)) {
    $mail->addAddress($res[0]);
}

//  add mail subject, attachment and body
$mail->Subject = $subject;
$mail->addAttachment($attachmet);
$mail->msgHTML($body);

//send the message, check for errors
$mail->send();