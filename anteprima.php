<?php
    session_start();
    include("script/config.php");
    include("script/apridb.php");
    $livello = isset($_SESSION["livello"]) ? $_SESSION["livello"] : "100";

    if($livello == 100) { 
        echo "<script type=\"text/javascript\">window.location.replace(\"$sito\");</script>";
        return;        
    } 
   
       
    if($livello < 100) {
        $id = $_GET["id"]; 
        $sql = "SELECT * FROM documenti WHERE id = ? limit 1";
        $stmt = $conn->prepare($sql);  
        $stmt->bind_param('i', $id);    
        $stmt->execute();
        $result = $stmt->get_result(); 
        if($result->num_rows > 0 ) {
            $row = $result->fetch_assoc();  
            $file = $row["Nome_File"];          
            $filename = "Documenti/$file";  
            $nome_file = $row["Nome_Documento"] . "." . explode("." , $filename)[1];     
            $tipo = $row["Tipo"];   
            header("Cache-Control: no-cache, must-revalidate");
            header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
            header('Content-Type: ' . $tipo );            
            header('Content-Disposition: inline; filename='. $nome_file);
            header('Content-Transfer-Encoding: binary');
            header('Accept-Ranges: bytes');
            header('Pragma: public');
            readfile($filename); 
        }
    }
    
    

    



?>



