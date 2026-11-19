<?php
include('index.html');
if(isset($_POST['resposta'])){

$resposta = $_POST['resposta'];
if($resposta === "6"){
    echo 'taserto';
} else {
    echo 'morra plebeu';
}

}
?>
