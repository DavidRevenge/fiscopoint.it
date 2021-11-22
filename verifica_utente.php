<?php    
    session_start();

    $livello = isset($_SESSION["livello"]) ? $_SESSION["livello"] : "100";


    // include configurazione base
    include("script/config.php");

    if($livello == 100) {
        echo "<script type=\"text/javascript\">window.location.replace(\"$sito\");</script>";
        return;
    } 

    // apri database
    include("script/apridb.php");

    if (isset($_POST["ver_cf"])) {
        $cf = strtoupper($_POST["ver_cf"]);
        $sql = "SELECT * FROM utenti WHERE CodiceFiscale = ? LIMIT 1";
        $stmt = $conn->prepare($sql); 
        $stmt->bind_param("s", $cf);
        $stmt->execute(); 
        $result = $stmt->get_result(); 
        $row = $result->fetch_assoc();
        $id_utente = $row["id"];

        echo "$cf -- $result->num_rows";        
        //echo "<script type=\"text/javascript\">window.location.replace(\"$sito/Area-Riservata/Pratiche-$id_utente.html\");</script>";
    }

    $conn->close();



?>