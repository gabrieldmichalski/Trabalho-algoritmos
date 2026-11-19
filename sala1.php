<?php
require('index.html');
require('dados.php');
if(isset($_POST['resposta'])){
    $resposta = $_POST['resposta'];
    if($resposta === $salas[1]['resposta']){
        echo 'taserto';
    } else {
        echo 'morra plebeu';
    }
}
?>