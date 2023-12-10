<?php
include("../Assets/Connection/Connection.php");
session_start();
require('../Assets/fpdf186/fpdf.php');
require '../Assets/phpMail/src/Exception.php';
require '../Assets/phpMail/src/PHPMailer.php';
require '../Assets/phpMail/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$packid = $con->real_escape_string($_GET['paid']);
$userid = $con->real_escape_string($_SESSION['uid']);

class CustomPDF extends FPDF {
    function header() {
        $this->SetFont('Arial', 'B', 15);
        $this->Cell(0, 30, 'HOBBIO...Follow Your Passion', 0, 2, 'C');
    }

    function footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Page ' . $this->PageNo(), 0, 0, 'C');
    }
}

$pdf = new CustomPDF();
$pdf->AddPage();

$pdf->SetFont('Arial', '', 12);
$pdf->SetLineWidth(0.9);
$pdf->Rect(10, 10, 190, 275, 'D');

$a = "SELECT * FROM tbl_booking b inner join tbl_package p on b.package_id=p.package_id inner join tbl_course c on c.course_id=p.course_id inner join tbl_center ce on ce.center_id=c.center_id where b.user_id=".$userid;
$result = $con->query($a);

if ($resrow = $result->fetch_assoc()) {
    // $pdf->Cell(0, 10, 'HOBBIO...Follow Your Passion', 0, 1);
    // $pdf->Cell(0, 10, '123 Main Street', 0, 1);
    // $pdf->Cell(0, 10, 'City, State ZIP', 0, 1);
    // $pdf->Cell(0, 10, 'Phone: (123) 456-7890', 0, 1);

    $pdf->SetFont('Arial', 'B', 12);

    // Set background color for the title cells
    $pdf->SetFillColor(200, 220, 255);
    
    // Set text color for the title cells
    $pdf->SetTextColor(33, 64, 95);
    
    // Add content to the PDF
    $pdf->Cell(0, 10, 'Center Name: ' . $resrow['center_name'], 0, 1, 'C');
    $pdf->Cell(0, 10, 'Center Contact: ' . $resrow['center_contact'], 0, 1, 'C');
    $pdf->Cell(0, 10, 'Center Type: ' . $resrow['center_type'], 0, 1, 'C');
    $pdf->Cell(0, 10, 'Center Email: ' . $resrow['center_email'], 0, 1, 'C');
    $pdf->Cell(0, 10, 'Center Area: ' . $resrow['center_area'], 0, 1, 'C');
    $pdf->Cell(0, 10, 'Center Building: ' . $resrow['center_building'], 0, 1, 'C');
    $pdf->Cell(0, 10, 'Center Landmark: ' . $resrow['center_landmark'], 0, 1, 'C');
    $pdf->Cell(0, 10, 'Course Name: ' . $resrow['course_name'], 0, 1, 'C');
    $pdf->Cell(0, 10, 'Course Description: ' . $resrow['course_des'], 0, 1, 'C');
    $pdf->Cell(0, 10, 'Package Name: ' . $resrow['package_name'], 0, 1, 'C');
    $pdf->Cell(0, 10, 'Package Cost: Rs:' . $resrow['package_cost'], 0, 1, 'C');
    $pdf->Cell(0, 10, 'Package Duration: ' . $resrow['package_duration'], 0, 1, 'C');
    $pdf->Cell(0, 10, 'Package Details: ' . $resrow['package_details'], 0, 1, 'C');
    
    // Add some space between content and footer
    $pdf->Ln(10);
    
    // Output the PDF to a file instead of directly to the browser
    $pdf->Output('Details.pdf', 'F');
    // Send email with attachment
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'hobbiomini@gmail.com';
        $mail->Password = 'itunzneuztnyzahb';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
$sel="select *from tbl_user where user_id=".$userid;
$res=$con->query($sel);
$rows=$res->fetch_assoc();
$uemail=$rows['user_email'];
        $mail->setFrom('hobbiomini@gmail.com');
        $mail->addAddress($uemail);

        $mail->isHTML(false);
        $mail->Subject = 'PDF Attachment';
        $mail->Body = 'Hello ,Thank You for choosing HOBBIO .
        Your payment has been successfully completed for the package.
        Detailed information is attached in the below file...
        
        HAPPY LEARNING...😊

        "Please find the attached PDF.';
        $mail->addAttachment('Details.pdf', 'Details.pdf');

        $mail->send();
        echo 'Email sent with PDF attachment';
        ?>
        <script>
            window.location="ViewDetails.php?pacid=<?php echo $packid ?>"
        </script>
        <?php
    } catch (Exception $e) {
        echo 'Email sending failed: ' . $e->getMessage();
    }

    // Delete the generated PDF file
    unlink('Details.pdf');
} else {
    echo "No data found"; // Handle the case when no data is retrieved
}
?>
