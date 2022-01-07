<?php
    session_start();
    // include configurazione base
    include("script/config.php");
    
    // apri database
    include("script/apridb.php");

    //echo date("d-m-Y", strtotime("2018-09-20 15:57:45"))."\n"; 

    //livello dell'utente
    $livello = isset($_SESSION["livello"]) ? $_SESSION["livello"] : "100";
    $id_operatore = isset($_SESSION["id_operatore"]) ? $_SESSION["id_operatore"] : "no";


    // apri pagina
    $page = (isset($_GET["page"])) ? $_GET["page"] : "Home"; 
    $dir = (isset($_GET["ris"])) ? "AreaRiservata" : "pagine"; 


    //include("script/apridb.php");
    include("template/header.php");

    // inizio body
    include("template/menu.php");
    

    // caricamento corpo della pagina.
    include("$dir/$page.php");




    include("template/footer.php"); 
    $conn->close();
?>





















