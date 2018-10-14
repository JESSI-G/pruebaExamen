<?php
session_start();

if(!empty($_SESSION['id']) && !empty($_SESSION['pass']) ){
    require_once 'LIGA3/LIGA.php';
    BD('localhost','root','','prueba1');
    HTML::cabeceras(array('title'=>'Sistema seguro', 'description'=> 'lo que sea'));
    //echo 'usuario admitido';
    $body = array('contenedor' => array('uno'=> '<p>Usuario valido</p>',   //crea una div dentro de otra
                                        'dos' => '<a href="cerrar.php">Cerrar sesión</a>' 
                                        ));
    
    $usuario= LIGA('usuarios');
    $columna=('id,nombre,fecha');
    
    $col=array('ID' => '@[id]',
        'Usuario' => '@[nombre]',
              'Hora de registro' => '@{substr("@[fecha]",11,19)}@' );
    
    HTML::tabla($usuario,'USUARIOS REGISTRADOS',$col);
    
    HTML::cuerpo($body);
    
    HTML::pie();
    
}else{
    header ('Location: .?error=1');
    //echo 'area prohibida';
}

