<?php

    //O que está entre <script> e </script> é o Sweetalert que aparecerá na tela caso o campo esteja vazio, ou seja, empty  
 

        //Inicio na sessão
        session_start();
        include('conexao.php');

        //Verifica se não é sql injection
        $Email = mysqli_real_escape_string($conn, $_POST['email']);
        $Senha = mysqli_real_escape_string($conn, $_POST['senha']);
        $vsenha = md5($Senha);


        //Verifica se tem cadastro no banco de dados
        $Query = "SELECT COD_FUN, EMAIL_FUN FROM TBL_FUNCIONARIO WHERE EMAIL_FUN = '{$Email}' AND SENHA_FUN = '{$vsenha}'";

        $result = mysqli_query($conn, $Query);

        //Quantidade de linhas
        $row = mysqli_num_rows($result);

        if($row == 1) {
            $_SESSION['email'] = $Email;
            header('Location: ../VIEW/ordemservicoFuncionario.php');
            exit();
        }
        else {
            header('Location: ../VIEW/loginFuncionario.php');
            exit();
        }
  
?>