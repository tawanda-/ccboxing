<?php 
    $request_uri = explode('?', substr($_SERVER['REQUEST_URI'], strlen('/')), 2);

    //var_dump($request_uri);
    //background: #000;
    //index

    switch($request_uri){
        case "app":
            require_once __DIR__."/app/index.php";
        break;
        case "":
        default:
            include('indexhtml.php');
        break;
    }
?>