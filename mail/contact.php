<?php
if(empty($_POST['name']) || empty($_POST['subject']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
}

// import all php dependencies
require_once __DIR__ . '/../vendor/autoload.php';

// import PHPMailer and Dotenv classes in global name space
use Dotenv\Dotenv as Dotenv;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$m_subject = strip_tags(htmlspecialchars($_POST['subject']));
$message = strip_tags(htmlspecialchars($_POST['message']));

// environment variables
$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$gmailUsername = $_ENV['GMAIL_USERNAME'];
$gmailPassword = $_ENV['GMAIL_PASSWORD'];

$mail = new PHPMailer(true);

try {
  // server configuration
    $mail->SMTPDebug = 2;                                 
    $mail->isSMTP();                                      
    $mail->Host       = 'smtp.gmail.com';  
    $mail->SMTPAuth   = true;                              
    $mail->Username   = $gmailUsername;             
    $mail->Password   = $gmailPassword;                           
    $mail->SMTPSecure = 'tls';                            
    $mail->Port       = 587;
    // destination
    $mail->setFrom('diezi7oficialweb@gmail.com', 'pagina_oficial_17');
    $mail->addAddress('eldany0510@gmail.com', 'correo_del_dany');
    // content
    $mail->isHTML(true);                                  
    $mail->Subject = "$m_subject: $name";
    $mail->Body    = "Has recibido un nuevo mensaje desde la página de diezi7_oficial."."Aquí están los detalles: <br> Nombre: $name <br> Correo: $email <br> Asunto: $m_subject <br> Mensaje: $message";
    $mail->send();
  } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    http_response_code(500);
}
?>
