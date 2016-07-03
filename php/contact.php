<?php

//email de envio email
$para = "contato@hospedagemriobrasil.com";

//campos

$nome = ucwords($_POST['name']);ucwords($_POST['name']);
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$subject = $_POST['subject'];
$message = $_POST['comments'];

//Mensagem
$mensagem = "<b>Nome:</b> ".$nome;
$mensagem .= "<br><b>Email:</b> ".$email;
$mensagem .= "<br><b>Telefone:</b> ".$telefone;
$mensagem .= "<br><b>Mensagem:</b> "."[".$subject."] ".$message;

$headers = "Content-Type:text/html; charset=UTF-8\n";
$headers .= "From: $email<$email>\n";
$headers .= "X-Mailer: PHP v".phpversion()."\n";
$headers .= "X-IP: ".$_SERVER['REMOTE_ADDR']."\n";
$headers .= "MIME-Version: 1.0\n";

mail($para, "[".$subject."] Contato via Site", $mensagem, $headers);

/* teste */


//campos
$nome2 = ucwords($_POST['name']);
$email2 = $_POST['email'];

$from2 = "contato@hospedagemriobrasil.com";

$para2 = $email2;
//email de envio email

//Mensagem
$mensagem2 = "Olá, ".$nome.". Agradecemos o seu contato e estaremos retornando o mais rápído possível!";

$headers2 = "Content-Type:text/html; charset=UTF-8\n";
$headers2 .= "From: $from2<$from2>\n"; //Vai ser //mostrado que o email partiu deste email e seguido do nome
$headers2 .= "X-Mailer: PHP v".phpversion()."\n";
$headers2 .= "X-IP: ".$_SERVER['REMOTE_ADDR']."\n";
$headers2 .= "MIME-Version: 1.0\n";

mail($para2, "Mensagem Recebida!", $mensagem2, $headers2);

echo "<script>alert('Mensagem enviada!');</script>";
echo "<script>window.location.assign('../index.html');</script>";

?>
