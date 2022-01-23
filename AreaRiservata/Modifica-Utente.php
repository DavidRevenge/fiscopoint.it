<?php
    if($livello == 100) {
        echo "<script type=\"text/javascript\">window.location.replace(\"$sito\");</script>";
        return;
    } 
    // titolo della pagina
    $titolo_pagina = "Modifica utente";
    include("template/titolo_pagina.php");
    include("template/breadcrumb.php");
    
    $utenti = json_decode(file_get_contents("json/utenti.json"), true);    

    if(isset($_POST["oper"])){
        // leggi i menu         
        $set = "";
        $pm = array();
        $val_par = "";

        foreach($utenti as $value ) {
            if($value["name"] != "Password" && $value["modificabile"] == "si" && $value["tipo"] != "calendario") { 
                $set .= "{$value["name"]} = ?, ";    
                array_push($pm, $_POST[$value["name"]]);
                $val_par .= $value["bind"]; 
            }else if($value["tipo"] == "calendario") {
                $cl = explode(",", $value["value"]);
                $g = $cl[0]; $m = $cl[1]; $a = $cl[2];
                $data = "$_POST[$g]/$_POST[$m]/$_POST[$a]";
                $set .= "{$value["name"]} = ?, ";    
                array_push($pm, $data);
                $val_par .= $value["bind"];
            }

        }
        $set = substr_replace($set ,"",-2);
        array_push($pm, $_GET["id"]);
        $val_par .= "i";
        $sql = "UPDATE utenti SET $set WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param($val_par, ...$pm);
        $stmt->execute();

        if($_POST["Password"] != "") {
            $hash = password_hash($_POST["Password"], PASSWORD_BCRYPT);
            $sql = "UPDATE operatori SET Password=? WHERE id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('si', $hash, $_GET["id"]);
            $stmt->execute();
        }

        echo "
        <div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">
            <strong>Utente {$_POST["Nome"]} {$_POST["Cognome"]} Modificato</strong>.
            <button type=\button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
        </div>";

    }
    

    $sql = "SELECT * FROM utenti where id = ? limit 1";
    $stmt = $conn->prepare($sql);  
    $stmt->bind_param("i", $_GET["id"]);      
    $stmt->execute();
    $result = $stmt->get_result(); 
    $row = $result->fetch_assoc();
?>


<form action="<?php echo $sito ?>Area-Riservata/Modifica-Utente-<?php echo $_GET["id"] ?>.html" method="POST">
    <?php
    foreach($utenti as $value) {
        if($value["modificabile"] == "si") {        
            $tmp = ($value["name"] == "Password") ? "" : $row[$value["name"]];
            $tipo = $value["tipo"];
            if($tipo == "lista") {
                echo "
                    <div class=\"m-1 m-md-2 row g-md-2 align-items-center\">
                        <div class=\"col-md-2 text-md-end\">
                            <label for=\"nick\" class=\"col-form-label\">{$value["etichetta"]}</label>
                        </div>
                        <div class=\"col-md-10\">
                            <select name=\"{$value["name"]}\" class=\"form-select\" aria-describedby=\"\" title=\"{$value["descrizione_add"]}\">
                                <option value=\"$tmp\" >$tmp</option>";
                    foreach (explode("," , $value["value"]) as $el) {
                        echo "  <option value=\"$el\">$el</option>";
                    }
                    echo "  </select>
                            <small><strong>{$value["descrizione_add"]}</small></strong>
                        </div>
                    </div>
                ";
            }else if($tipo == "calendario") {
                $cl = explode("," , $value["value"]);
                $giorno = $cl[0];
                $mese= $cl[1];
                $anno = $cl[2];  
                $dt = explode("/" , $tmp);         
                $val_giorno = (isset($dt[1])) ? "<option value=\"$dt[0]\">$dt[0]</option>" : ""; 
                $val_mese = (isset($dt[1])) ?  "<option value=\"$dt[1]\">$dt[1]</option>" : ""; 
                $val_anno = (isset($dt[2])) ? "$dt[2]" : "";
                echo "<div class=\"m-1 m-md-2 row g-md-2 align-items-center\">
                        <div class=\"col-md-2 text-md-end\">
                            <label for=\"nick\" class=\"col-form-label\">{$value["etichetta"]}</label>
                        </div>
                        <div class=\"col-md-10\">";
                            include("template/calendario.php");
                echo "  </div>
                    </div>";
            }else{
                echo "
                <div class=\"m-1 m-md-2 row g-md-2 align-items-center\">
                    <div class=\"col-md-2 text-md-end\">
                        <label for=\"nick\" class=\"col-form-label\">{$value["etichetta"]}</label>
                    </div>
                    <div class=\"col-md-10\">
                        <input type=\"{$value["tipo"]}\" name=\"{$value["name"]}\" class=\"form-control\" value=\"$tmp\" aria-describedby=\"\" {$value["opzioni_mod"]} title=\"{$value["descrizione_mod"]}\">
                        <small><strong>{$value["descrizione_mod"]}</small></strong>
                    </div>
                </div>
                ";
            }
        }
    }
    ?>
    


    <div class="m-1 m-md-2 row g-md-2 align-items-center">
        <div class="col-12 text-center">
            <input type="hidden" name="oper" value="0">
            <button type="submit" class="btn btn-primary">Modifica Utente</button>
        </div>
    </div>
</form>