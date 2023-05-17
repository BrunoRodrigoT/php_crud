<?php
//recebe os valores respectivos do formulário de registro e aloca a uma variável.
$username= $_POST['username'];
$email= $_POST['email'];
$passwd= sha1($_POST['passwd']);//sha1 cripytografa a senha registrada pelo.

//implode junta os dados usuário,os separa por virgula e concatena a uma quebra de linha para alocar no arquivo csv.
$line= implode(',', [$username, $email, $passwd]). "\n";

//validação por meio do operador ternário que verifica se existe dados; se não houver, seta como 1 o valor da váriavel.
$registers= file('../csv/register.csv')!=null?file('../csv/register.csv'): 1;

//separa registro por registro para verificação de cadastro.
foreach ($registers as $register) {
    
    //separa os dados para verificação de existência e redirecionamento junto com a menssagem de erro.
    list($un, $e, $pass)= explode(',',$register);   
    
    if($username==trim($un)&&$email==trim($e)){

       header('location:../reg_form.php?message=O cadastro já existe&color=253, 204, 201');
       exit();

    }else if($username==trim($un)){

        header('location:../reg_form.php?message=Username já cadastrado&color=253, 204, 201');
        exit();

    }else if($email==trim($e)){

        header('location:../reg_form.php?message=Email já cadastrado&color=253, 204, 201');
        exit();

    }

}

//se os dados já não forem cadastrados, o programa os cadastra e envia uma mensagem pelo metodo get de validação.

$fp= fopen('../csv/register.csv', 'a');
fwrite($fp, $line);//escreve a linha no arquivo.
fclose($fp);//fecha o arquivo.
//redireciona a pagina com a menssagem de valedação.
header('location:../reg_form.php?message=Cadastrado com sucesso&color=232, 253, 201');