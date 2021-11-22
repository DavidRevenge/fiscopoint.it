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

    // apri database
    include("script/apridb.php");

    function bytesToSize1024($bytes, $precision = 2) {
        $unit = array('B','KB','MB');
        return @round($bytes / pow(1024, ($i = floor(log($bytes, 1024)))), $precision).' '.$unit[$i];
    }

    $sFileName = $_FILES['image_file']['name'];
    $sFileType = $_FILES['image_file']['type'];
    $protocollo = $_POST["protocollo"];
    $id_utente = $_POST["id_utente"];
    $nome_file = $_POST["nome_file"];
    $sFileSize = bytesToSize1024($_FILES['image_file']['size'], 1);
    $data = time();



    //crea directory utente se non esiste
    $target_dir = "Documenti/$id_utente/";
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
    $nome = "Doc-" . $data . "." . explode(".", basename($_FILES["image_file"]["name"]))[1];
    $target_file = $target_dir . $nome; 
    copy($_FILES['image_file']['tmp_name'], $target_file) or die("Impossibile caricare il file");
    $nome = "$id_utente/" . $nome;

    $sql = "INSERT INTO documenti (id_Operatore, protocollo, Nome_File, Tipo, Nome_Documento, Data, Operazione, Note) VALUES (?, ?, ?, ? ,?, ?, '0', '')";
    $stmt = $conn->prepare($sql); 
    $stmt->bind_param('issssi', $id_operatore, $protocollo, $nome, $sFileType ,$nome_file, $data);
    $stmt->execute();  

    $conn->close();

?>