<?php
/**
 * Created by PhpStorm.
 * User: Márcio Winicius
 * Date: 12/06/2018
 * Time: 11:52
 */
session_start(); // Destrói toda sessão
$_SESSION = [];

header("location: index.php");
echo '<script type="text/javascript>" alert("Produtos deletados do carrinho.") </script>';
exit();

?>