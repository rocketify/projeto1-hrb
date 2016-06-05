<?php

    $email_to = "matheuslink1996@gmail.com";
    $email_subject = "Hospedagem Rio Brasil - Contato";

    function died($error) {
      echo "Parece que houve um erro com sua mensagem! <br /><br />";
      echo $error."<br /><br />";
      echo "Por favor corrija os erros e tente novamente.<br /><br />";
      die();
    }

    if(($_POST['name'] === "") || ($_POST['email'] === "") || ($_POST['msg'] === '')) {
      died('Sentimos muito, mas parece que há algo errado com seu formulário de mensagem.');
    }

    $nome = $_POST['name'];
    $email = $_POST['email'];
    $mensagem = $_POST['msg'];

    $email_message = "Mensagem enviada via hospedagemriobrasil.com \n\n";

    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }

    $email_message = "Nome: ".clean_string($nome)."\n";
    $email_message .= "Email: ".clean_string($email)."\n";
    $email_message .= "Mensagem: ".clean_string($mensagem)."\n";

    $headers = 'From: '.$email."\r\n".
    'Reply-To: '.$email."\r\n" .
    'X-Mailer: PHP/' . phpversion();
    @mail($email_to, $email_subject, $email_message, $headers);

    ?>

  <script>
    alert("Obrigado pelo contato, estaremos respondendo o mais breve possivel!");
    location.href="http://www.hospedagemriobrasil.com/contato.html";
  </script>
