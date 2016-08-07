<?php

if(!$_POST) exit;

if (!defined("PHP_EOL")) define("PHP_EOL", "\r\n");


$apartament = ($_POST['apartament']);
$name = ucwords($_POST['name']);
$telefone = $_POST['telefone'];
$email    = $_POST['email'];
$guests = $_POST['guests'];
$checkin    = $_POST['checkin'];
$checkout    = $_POST['checkout'];

$address = "telmaapartamentosrio@gmail.com";

$e_subject = '['.$apartament.'] Solicitação de reserva';

$e_body = "Boas notícias! Você recebeu uma solicitação de reserva para o apartamento $apartament.

São $guests para se hospedar entre $checkin e $checkout." . PHP_EOL . PHP_EOL;

$e_reply = "Dados do cliente para contato:

Nome: $name
E-mail: $email
Telefone: $telefone

Entre em contato com ele para fechar negócio.";

$msg = wordwrap( $e_body . $e_reply, 70 );

$headers = "From: $address" . PHP_EOL;
$headers .= "Reply-To: $email" . PHP_EOL;
$headers .= "MIME-Version: 1.0" . PHP_EOL;
$headers .= "Content-type: text/plain; charset=utf-8" . PHP_EOL;
$headers .= "Content-Transfer-Encoding: quoted-printable" . PHP_EOL;

/* resposta automática */

$nome2 = ucwords($_POST['name']);
$email2 = $_POST['email'];
$telefone2 = $_POST['telefone'];
$guests2 = $_POST['guests'];
$checkin2    = $_POST['checkin'];
$checkout2    = $_POST['checkout'];

$from2 = "contato@hospedagemriobrasil.com";

$para2 = $email2;

$e_subject2 = "Solicitação de reserva recebida!";

$e_body2 = "Olá, $nome2.

Recebemos sua solicitação de reserva.

Iremos analisá-la retornamos contato o mais rápido
possível.

Aproveite para conferir seus dados:

Apartamento: $apartament
Telefone: $telefone2
Hóspedes: $guests2
Checkin: $checkin2
Checkout: $checkout2" . PHP_EOL . PHP_EOL;

$e_reply2 = "Att, Hospedagem Rio Brasil.";


$msg2 = wordwrap( $e_body2 . $e_reply2, 70 );

$headers2 = "From: $from2" . PHP_EOL;
$headers2 .= "Reply-To: $from2" . PHP_EOL;
$headers2 .= "MIME-Version: 1.0" . PHP_EOL;
$headers2 .= "Content-type: text/plain; charset=utf-8" . PHP_EOL;
$headers2 .= "Content-Transfer-Encoding: quoted-printable" . PHP_EOL;

if((mail($address, $e_subject, $msg, $headers)) && (mail($email2, $e_subject2, $msg2, $headers2))) {

	// Email has sent successfully, echo a success page.

	echo "<script>alert('Solicitação de reserva enviada!');</script>";
	echo "<script>window.location.assign('../index.html');</script>";

} else {

	echo 'ERROR!';

}
