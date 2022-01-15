<?php

    require_once 'script/functions.php';

    if($livello != 0) {
        echo "<script type=\"text/javascript\">window.location.replace(\"$sito\");</script>";
        return;
    } 

    // titolo della pagina
    $titolo_pagina = "Modifica operatore";
    include("template/titolo_pagina.php");
    
    $anagrafica = json_decode(file_get_contents("json/operatori.json"), true);
    $mn_servizi = getServizi();

    $servizi_checked = [];
    $servizi_operatore = getServiziOperatore($_GET['id']);
    while ($row = $servizi_operatore->fetch_assoc()) {
        $servizi_checked[$row['id_servizio']] = true;
    }
    
   // $mn_servizi = json_decode(file_get_contents("json/servizi.json"), true);

    if(isset($_POST["oper"])){
        $pm = array();
        $val_par = "";

        // leggi i menu 
       // $servizi = "";
        
        // foreach($mn_servizi->fetch_assoc() as $value) {
        
        $set = "";
        foreach($anagrafica as $value ) {
            if($value["name"] != "Password") {
                $set .= "{$value["name"]} = ?, ";    
                array_push($pm, $_POST[$value["name"]]);
                $val_par .= $value["bind"];
            }  
        }

        // $set .= "Servizi= ?, ";  
        // array_push($pm, $servizi);
     //   $val_par .= "s";

        $set .= "Ufficio= ?, ";
        array_push($pm, $_POST["ufficio"]);
        $val_par .= "i";
        $set .= "Livello= ? ";
        array_push($pm, $_POST["livello"]);
        $val_par .= "i";
        array_push($pm, $_GET["id"]);
        $val_par .= "i";


        $sql = "UPDATE operatori SET $set WHERE id = ?";
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

        
        $pre_servizi_checked_key = array_keys($servizi_checked);
        $post_servizi_checked_key = [];
        
        while ( $row = $mn_servizi->fetch_assoc()) {
             //$servizi .= isset($_POST['op' . $key]) ? "1" : "0";
             if (isset($_POST['op' . $row['id']])) $post_servizi_checked_key[] = $row['id'];
         }

         foreach($pre_servizi_checked_key as $id_servizio) {
             unset($servizi_checked[$id_servizio]);
            if ( ! in_array($id_servizio, $post_servizi_checked_key) ) deleteServizioOperatore($_GET["id"], $id_servizio);
         }
         foreach($post_servizi_checked_key as $id_servizio) {
            $servizi_checked[$id_servizio] = true;
            if ( ! in_array($id_servizio, $pre_servizi_checked_key) ) insertServizioOperatore($_GET["id"], $id_servizio);
         }

        echo "
        <div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">
            <strong>Operatore {$_POST["Username"]} Modificato</strong>.
            <button type=\button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
        </div>";

    }
    

    $sql = "SELECT * FROM operatori where id = ? limit 1";
    $stmt = $conn->prepare($sql);  
    $stmt->bind_param("i", $_GET["id"]);      
    $stmt->execute();
    $result = $stmt->get_result(); 
    $row = $result->fetch_assoc();
 //   $servizi = $row["Servizi"];
    $ufficio = $row["Ufficio"];
    $liv = $row["Livello"];
?>


<form action="<?php echo $sito ?>Area-Riservata/Modifica-Operatore-<?php echo $_GET["id"] ?>.html" method="POST">
    <?php
    foreach($anagrafica as $value) {
        $tmp = ($value["name"] == "Password") ? "" : $row[$value["name"]];
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
    ?>

    <!-- Ufficio -->
    <div class="m-1 m-md-2 row g-md-2 align-items-center">
            <div class="col-md-2 text-md-end">
                <label for="nick" class="col-form-label">Ufficio</label>
            </div>
            <div class="col-md-10">
    <?php
        $sql = "SELECT * FROM uffici";
        $stmt = $conn->prepare($sql);
        $stmt->execute();   
        $result = $stmt->get_result(); 
        echo "<select name=\"ufficio\" class=\"form-select\">";
        while($row = $result->fetch_assoc()){
            $tmp = ($ufficio == $row["id"]) ? "selected" : "";
            echo "
                <option value=\"{$row["id"]}\" $tmp>
                    {$row["Sigla"]}
                </option>
            ";
        }
        echo "</select></div></div>";
    ?>
    <!-- fine ufficio -->


    <!-- livello operatore -->
    <div class="m-1 m-md-2 row g-md-2 align-items-center">
            <div class="col-md-2 text-md-end">
                <label for="nick" class="col-form-label">Livello Operatore</label>
            </div>
            <div class="col-md-10">
                <select name="livello" class="form-select">
        <?php
            $livelli_json = json_decode(file_get_contents("json/livelli.json"), true);
            foreach ($livelli_json as $value) {
                $tmp = ($liv == $value["livello"]) ? "selected" : "";
                echo "
                    <option value=\"{$value["livello"]}\" $tmp>
                        {$value["descrizione"]}
                    </option>
                ";
            }       
        ?>
            </select>
        </div>
    </div>
    <!-- Fine livello operatore -->


    <div class="m-1 m-md-2 row g-md-2">
    <?php
    //  foreach($mn_servizi as $key=>$value) {
       
        if(isset($_POST["oper"])) { 
            $mn_servizi = getServizi();
        }

        if ($mn_servizi->num_rows === 0) echo alert('danger', 'Popolare la tabella servizi e operatori_servizio (contattare l\'amministratore)');

        while ( $value = $mn_servizi->fetch_assoc()) {

            //$tmp = ($servizi[$key]) ? "checked" : "";
            $tmp = (isset($servizi_checked[$value['id']])) ? "checked" : "";
            echo "
            <div class=\"form-check col-md-3\">
                <input class=\"form-check-input\" type=\"checkbox\" name=\"op{$value['id']}\" $tmp >
                <label class=\"form-check-label\" for=\"op{$value['id']}\">
                    {$value["nome"]};
                </label>
            </div>";
        }        
    ?>
    </div>


    <div class="m-1 m-md-2 row g-md-2 align-items-center">
        <div class="col-12 text-center">
            <input type="hidden" name="oper" value="0">
            <button type="submit" class="btn btn-primary">Modifica Operatore</button>
        </div>
    </div>
</form>