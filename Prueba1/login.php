<?php
session_start();
require_once 'LIGA3/LIGA.php';

BD('localhost','root','','prueba1');

$usuarios=LIGA("Select * from usuarios where id='$_POST[id]' and pass=md5('$_POST[pass]')");//md5 cifrado de contraseña

if($usuarios->numReg()==1){
   // echo 'SI ES';
   $_SESSION['id']=$usuarios->d('id');
   $_SESSION['pass']=$usuarios->d('pass');
   //header('Location: sistema.php');
   echo 'Usuario VALIDO';
   
    }else{
     //   header('Location: index.php?error=1');
        echo 'Error en los datos';
    }