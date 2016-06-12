<?php

//email de envio email
$para = "matheuslink1996@gmail.com";

//campos

$nome = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['comments'];

//Mensagem
$mensagem = "<b>Nome:</b> ".$nome;
$mensagem .= "<br><b>Email:</b> ".$email;
$mensagem .= "<br><b>Mensagem:</b> ".$message;

$headers = "Content-Type:text/html; charset=UTF-8\n";
$headers .= "From: $email<$email>\n"; //Vai ser //mostrado que o email partiu deste email e seguido do nome
//$headers .= "X-Sender: <haniger@haniger.com.br>\n"; //email do servidor //que enviou
$headers .= "X-Mailer: PHP v".phpversion()."\n";
$headers .= "X-IP: ".$_SERVER['REMOTE_ADDR']."\n";
//$headers .= "Return-Path: <guilherme@haniger.com.br>\n"; //caso a msg //seja respondida vai para este email.
$headers .= "MIME-Version: 1.0\n";

mail($para, "Contato Via Site", $mensagem, $headers);

echo "<script>alert(\"Mensagem enviada com Sucesso!\");</script>";
echo "<script>window.location.assign(\"contato.html\");</script>";

?>
