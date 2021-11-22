<?php

    session_start();

    $livello = isset($_SESSION["livello"]) ? $_SESSION["livello"] : "100";
    $id_operatore = isset($_SESSION["id_operatore"]) ? $_SESSION["id_operatore"] : "no";


    // include configurazione base
    include("script/config.php");

    if($livello == 100) {
        echo "<script type=\"text/javascript\">window.location.replace(\"$sito\");</script>";
        return;
    } 


    if(isset($_POST["pratica"])) {
        // apri database
        include("script/apridb.php");    
        // sezione aggiungi una notifica
        $pratica =  $_POST["pratica"];
        $dt = time();
        $testo = nl2br($_POST["nota"]);
        $sql = "INSERT INTO notifiche (Operatore, Pratica, Data, Testo) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql); 
        $stmt->bind_param("iiis", $id_operatore, $pratica, $dt, $testo);     
        $stmt->execute();
        $conn->close();
        echo "<script type=\"text/javascript\">window.location.replace(\"{$_POST["link"]}\");</script>";
    }else{
        echo "<script type=\"text/javascript\">window.location.replace(\"$sito\");</script>";
    }
    

?>