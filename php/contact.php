<?php

if(isset($_POST['email'])) {

    $email_to = "matheuslink1996@gmail.com";
    $email_subject = "Hospedagem Rio Brasil - Contato";

    function died($error) {
        echo "Sentimos muito, mas não conseguimos enviar seu email devido aos seguintes erros: ";
        echo $error."<br /><br />";
        echo "Por favor, corrija-os e tente novamente.<br /><br />";
        die();
    }

    // validation expected data exists
    if(!isset($_POST['name']) || !isset($_POST['email']) || !isset($_POST['comments'])) {
        died('Opa! Parece que há algum problema com seu formulário de email.');
    }

    $name = $_POST['name']; // required
    $email = $_POST['email']; // required
    $subject = $_POST['subject']; // not required
    $comments = $_POST['comments']; // required

    $email_message = "Mensagem enviada via hospedagemriobrasil.com.br \n\n";

    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }


    $email_message .= "Nome: ".clean_string($name)."\n";
    $email_message .= "Email: ".clean_string($email)."\n";
    $email_message .= "Mensagem: ".clean_string($comments)."\n";





// create email headers
$headers = 'From: '.$email."\r\n".
'Reply-To: '.$email."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);
?>



<!-- include your own success html here -->
<script>
    alert("Obrigado pelo contato, estaremos respondendo o mais breve possivel!");
    location.href="http://www.hospedagemriobrasil.com.br/contato.html";
</script>

<?php

}

?>
