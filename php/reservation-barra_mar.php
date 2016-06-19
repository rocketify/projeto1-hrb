<?php

if(!$_POST) exit;

if (!defined("PHP_EOL")) define("PHP_EOL", "\r\n");


$name = $_POST['name'];
$telefone = $_POST['telefone'];
$email    = $_POST['email'];
$guests = $_POST['guests'];
$checkin    = $_POST['checkin'];
$checkout    = $_POST['checkout'];

$address = "contato@hospedagemriobrasil.com";

$e_subject = '[Barra Mar] Solicitação de reserva';

$e_body = "Boas notícias! A reserva foi solicitada por $name

O cliente solicitou o apartamento Barra Mar para $guests hóspedes.

O cliente deseja se hospedar entre $checkin e $checkout"  . PHP_EOL . PHP_EOL;

$e_reply = "Você poderá entrar em contato com o cliente pelo, $email ou $telefone, para completar a reserva.";

$msg = wordwrap( $e_body . $e_reply, 70 );

$headers = "From: $email" . PHP_EOL;
$headers .= "Reply-To: $email" . PHP_EOL;
$headers .= "MIME-Version: 1.0" . PHP_EOL;
$headers .= "Content-type: text/plain; charset=utf-8" . PHP_EOL;
$headers .= "Content-Transfer-Encoding: quoted-printable" . PHP_EOL;

if(mail($address, $e_subject, $msg, $headers)) {

	// Email has sent successfully, echo a success page.

	echo "<script>alert('Solicitação de reserva enviada!');</script>";
	echo "<script>window.location.assign('../ap_barra_mar.html');</script>";

} else {

	echo 'ERROR!';

}

/* resposta automática */

$nome2 = $_POST['name'];
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

Iremos analisá-la e estaremos entrando em contato o mais rápido possível.

Aproveite para conferir seus dados:

Apartamento: Barra Mar
Telefone: $telefone2
Hóspedes: $guests2
Checkin: $checkin2
Checkout: $checkout2

==========================================


We have received your reservation request.

We will analyze it and we will be getting in touch as soon as possible.

Take the opportunity to check your data:

Apartment: Barra Mar
Phone: $telefone2
Guests: $guests2
Checkin: $checkin2
Checkout: $checkout2"  . PHP_EOL . PHP_EOL;

$e_reply2 = "Att, Hospedagem Rio Brasil.";


$msg2 = wordwrap( $e_body2 . $e_reply2, 70 );

$headers2 = "From: $from2" . PHP_EOL;
$headers2 .= "Reply-To: $from2" . PHP_EOL;
$headers2 .= "MIME-Version: 1.0" . PHP_EOL;
$headers2 .= "Content-type: text/plain; charset=utf-8" . PHP_EOL;
$headers2 .= "Content-Transfer-Encoding: quoted-printable" . PHP_EOL;

mail($email2, $e_subject2, $msg2, $headers2);
