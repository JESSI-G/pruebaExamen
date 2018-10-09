<?php
session_start();

if(!empty($_SESSION['id']) && !empty($_SESSION['pass']) ){
    require_once 'LIGA3/LIGA.php';
    HTML::cabeceras(array('title'=>'Sistema seguro', 'description'=> 'lo que sea'));
    //echo 'usuario admitido';
    $body = array('contenedor' => array('uno'=> '<p>Usuario valido</p>',   //crea una div dentro de otra
                                        'dos' => '<a href="cerrar.php">Cerrar sesión</a>' 
                                        ));
    HTML::cuerpo($body);
    
    HTML::pie();
    
}else{
    header ('Location: .?error=1');
    //echo 'area prohibida';
}

