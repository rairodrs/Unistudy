<?php

session_start();

if(!isset($_SESSION['user'])){
    $_SESSION['userId']="";
    $_SESSION['nome']="";
    $_SESSION['email']="";
    $_SESSION['senha']="";
}

function logout(){
    unset($_SESSION['userId']);
    unset($_SESSION['nome']);
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
}

if (!isset($_SESSION['userid'])) {
    header('Location: index.php');
    exit();
}

function is_logado(){
    if(empty($_SESSION['userId'])){
    return false;
}else{
    return true;
 } 
}  
