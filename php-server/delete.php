<?phP
session_start();//inicia a sessão.

//verifica se o usuário está logado.
if(!isset($_SESSION['user'])){
    header('locatiom:../index.php');
    exit();
}

//adiciona os dados de sessãoo e do metodo get a uma variável.
$user= $_SESSION['user'];

$key= $_GET["key"];

$itens= file('../csv/compras.csv');//adiciona os dados do arquivo csv a variável itens.
$remove= $itens[$key];//seleciona o item a ser removido.

//verifica se o suário que está tentando remover é o mesmo que está logado.
if(trim(explode(",", $remove)[0])!=$user){
    header('locatiom:../index.php');
    exit();
}

$itens[$key]= "";//remove o item.

$newitens= implode('', $itens);
file_put_contents('../csv/compras.csv', $newitens);//reescreve o arquivo de itens no csv.  

header('location:../logado.php');//redioreciona para a pagina já autenticada.
       
?>