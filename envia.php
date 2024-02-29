<?php

    $nome = addslashes($_POST['nome']);
    $email = addslashes($_POST['email']);
    $telefone = addslashes(S_POST['telefone']);
    $texto = addslashes(S_POST['texto']);

    $para = "rafaella.desenvolvedora@gmail.com";
    $assunto = "Contato - Portfolio";

    $corpo = "Nome: ".$nome."\n"."E-mail: ".$email."\n"."Telefone: ".$telefone;

    $cabeca = "From: rafaella.desenvolvedora@gmail.com"."\n"."Replay-to: ".$email."\n"."X=Mailer:PHP/".phpversion();

    if(mail($para,$assunto,$corpo,$cabeca)){

        echo("E-mail enviado com sucesso!");
    }else{
        echo("Houve um erro ao enviar o e-mail!");
    }

?>