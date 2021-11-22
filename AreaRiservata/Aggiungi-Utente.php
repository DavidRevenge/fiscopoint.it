<?php

    if($livello == 100) { 
        echo "<script type=\"text/javascript\">window.location.replace(\"$sito\");</script>";
        return;        
    } 

    // titolo della pagina
    $titolo_pagina = "Aggiungi utente";
    include("template/titolo_pagina.php");
    $anagrafica = json_decode(file_get_contents("json/utenti.json"), true);


    // verifica se esiste il codice fiscale in caso avvisa e avvia la scheda 
    if (isset($_POST["ver_cf"])) {
        $cf = strtoupper($_POST["ver_cf"]);
        $sql = "SELECT * FROM utenti WHERE CodiceFiscale = ? LIMIT 1";
        $stmt = $conn->prepare($sql); 
        $stmt->bind_param("s", $cf);
        $stmt->execute(); 
        $result = $stmt->get_result();             
        if($result->num_rows > 0) {
            $row = $result->fetch_assoc(); 
            $id_utente = $row["id"];
            echo "<script type=\"text/javascript\">av = new alert_view('', 'Utente già presente vai alle pratiche', '$sito/Area-Riservata/Pratiche-$id_utente.html');av.show();</script>";                                 
        }        
    }

    if(isset($_POST["oper"])) {
        // leggi i menu               
        $insert = "";
        $pm = array();
        $val_par = "";
        foreach($anagrafica as $value ) {  
            if($value["tipo"] != "calendario")  {
                $insert .= $value["name"] . ", ";
                array_push($pm, (($value["name"] == "Password") ? password_hash($_POST["Password"], PASSWORD_BCRYPT) : $_POST[$value["name"]]));
                $val_par .= $value["bind"]; 
            }else{
                $cl = explode(",", $value["value"]);   
                $g = $cl[0]; $m = $cl[1]; $a = $cl[2];  
                if($_POST[$a] != "") {
                    $insert .= $value["name"] . ", ";                                                   
                    $data = "$_POST[$g]/$_POST[$m]/$_POST[$a]";
                    array_push($pm, $data); 
                    $val_par .= $value["bind"]; 
                }                
            }  
        }
        $insert = substr_replace($insert ,"",-2);   
        $values = str_repeat('?,', count($pm) - 1) . '?';    
        $sql = "INSERT INTO utenti ($insert) VALUES ($values)";
        
        
       // echo $sql;
       //// var_dump($val_par);
       ////// var_dump($pm);
        
        $stmt = $conn->prepare($sql); 
        $stmt->bind_param($val_par, ...$pm);
        $stmt->execute();      
        
        //echo $stmt->error;//var_dump($stmt->execute());// $stmt->errorCode();

        echo "
        <div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">
            <strong>Utente {$_POST["Nome"]} {$_POST["Cognome"]} aggiunto</strong>.
            <button type=\button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
        </div>";
    }

?>

<form action="<?php echo $sito ?>Area-Riservata/Aggiungi-Utente.html" method="POST">  
    <?php
    foreach($anagrafica as $value) {
        $tipo = $value["tipo"];
        if($tipo == "lista") {
            echo "
            <div class=\"m-1 m-md-2 row g-md-2 align-items-center\">
                <div class=\"col-md-2 text-md-end\">
                    <label for=\"nick\" class=\"col-form-label\">{$value["etichetta"]}</label>
                </div>
                <div class=\"col-md-10\">
                    <select name=\"{$value["name"]}\" class=\"form-select\" aria-describedby=\"\" title=\"{$value["descrizione_add"]}\">
                        <option value=\"{$value["opzioni_add"]}\" selected  >{$value["opzioni_add"]}</option>";
            foreach (explode("," , $value["value"]) as $el) {
                echo "  <option value=\"$el\">$el</option>";
            }
            echo "  </select>
                    <small><strong>{$value["descrizione_add"]}</small></strong>
                </div>
            </div>
            ";
        }else if ($tipo == "id_operatore"){
            echo "<input type=\"hidden\" name=\"{$value["name"]}\" value=\"{$_SESSION[$tipo]}\" class=\"form-control\" aria-describedby=\"\" {$value["opzioni_add"]} title=\"{$value["descrizione_add"]}\">";
        }else if ($tipo == "data") {
            $data = time();
            echo "<input type=\"hidden\" name=\"{$value["name"]}\" value=\"$data\" class=\"form-control\" aria-describedby=\"\" {$value["opzioni_add"]} title=\"{$value["descrizione_add"]}\">";
        }else if($tipo == "calendario") {
            $cl = explode("," , $value["value"]);
            $giorno = $cl[0];
            $mese= $cl[1];
            $anno = $cl[2];  
            $val_giorno = ""; 
            $val_mese = ""; 
            $val_anno = "";
            echo "<div class=\"m-1 m-md-2 row g-md-2 align-items-center\">
                    <div class=\"col-md-2 text-md-end\">
                        <label for=\"nick\" class=\"col-form-label\">{$value["etichetta"]}</label>
                    </div>
                    <div class=\"col-md-10\">";
                        include("template/calendario.php");
            echo "  </div>
                </div>";
        }else{
            $tmp = ($value["name"] == "CodiceFiscale") ? strtoupper($_POST["ver_cf"]) : "";
            echo "
            <div class=\"m-1 m-md-2 row g-md-2 align-items-center\">
                <div class=\"col-md-2 text-md-end\">
                    <label for=\"nick\" class=\"col-form-label\">{$value["etichetta"]}</label>
                </div>
                <div class=\"col-md-10\">
                    <input type=\"{$value["tipo"]}\" name=\"{$value["name"]}\" class=\"form-control\" aria-describedby=\"\" {$value["opzioni_add"]} title=\"{$value["descrizione_add"]}\" value=\"$tmp\">
                    <small><strong>{$value["descrizione_add"]}</small></strong>
                </div>
            </div>
            ";
        };
    }
    ?>
    


    



    <div class="m-1 m-md-2 row g-md-2 align-items-center">
        <div class="col-12 text-center">
            <input type="hidden" name="oper" value="0">
            <button type="submit" class="btn btn-primary">Aggiungi Utente</button>
        </div>
    </div>
</form>