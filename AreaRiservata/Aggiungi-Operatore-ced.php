<?php
    if($livello != 0) {
        echo "<script type=\"text/javascript\">window.location.replace(\"$sito\");</script>";
        return;
    } 
    // titolo della pagina
    $titolo_pagina = "Operatori CED";
    include("template/titolo_pagina.php");
    
    $operatori_ced = json_decode(file_get_contents("json/operatori_ced.json"), true);
    $mn_servizi = json_decode(file_get_contents("json/servizi.json"), true);

    if(isset($_POST["oper"])) {
        // leggi i menu         
        $servizi = "";
        foreach($mn_servizi as $key=>$value) {
            $servizi .= isset($_POST['op' . $key]) ? "1" : "0";
        }        
        $insert = "";
        $val_par = "";
        $values = "";
        $pm = array();  

        foreach($operatori as $value ) {            
            $insert .= $value["name"] . ", ";
            $val_par .= $value["bind"];
            $values .= " ?,";
            array_push($pm, (($value["name"] == "Password") ? password_hash($_POST["Password"], PASSWORD_BCRYPT) : $_POST[$value["name"]]));
        }
        
        $insert = substr_replace($insert ,"",-2);
        $insert .= ", Servizi";
        $val_par .= "s"; 
        $values .= " ?";  
        array_push($pm, $servizi);
       
        
        if(isset($_POST["ufficio"])) {
            $insert .= ", Ufficio";
            $val_par .= "i"; 
            $values .= ", ?";
            array_push($pm, intval($_POST["ufficio"]));
        }

        $insert .= ", Livello";
        $val_par .= "i"; 
        $values .= ", ?";
        array_push($pm, intval($_POST["livello"]));

        
        $sql = "INSERT INTO operatori ($insert) VALUES ($values)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param($val_par , ...$pm);
        $stmt->execute();        

        echo "
        <div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">
            <strong>Operatore {$_POST["Username"]} aggiunto</strong>.
            <button type=\button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
        </div>";
    }

    
    

?>

<form action="<?php echo $sito ?>Area-Riservata/Aggiungi-Operatore.html" method="POST">  

    <?php
    foreach($operatori as $value) {
        echo "
        <div class=\"m-1 m-md-2 row g-md-2 align-items-center\">
            <div class=\"col-md-2 text-md-end\">
                <label for=\"nick\" class=\"col-form-label\">{$value["etichetta"]}</label>
            </div>
            <div class=\"col-md-10\">
                <input type=\"{$value["tipo"]}\" name=\"{$value["name"]}\" class=\"form-control\" aria-describedby=\"\" {$value["opzioni_add"]} title=\"{$value["descrizione_add"]}\">
                <small><strong>{$value["descrizione_add"]}</small></strong>
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
        // ufficio di lavoro
        $sql = "SELECT * FROM uffici";
        $stmt = $conn->prepare($sql);
        $stmt->execute();   
        $result = $stmt->get_result(); 
        echo "<select name=\"ufficio\" class=\"form-select\">";
        while($row = $result->fetch_assoc()){
            $tmp = ($row["id"] == 0) ? "disabled selected" : "";
            echo "
                <option value=\"{$row["id"]}\" $tmp>
                    {$row["Sigla"]}
                </option>
            ";
        }
        echo "</select>
            </div>
        </div>";
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
            echo "
                <option value=\"{$value["livello"]}\">
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
        foreach($mn_servizi as $key=>$value) {
            echo "
            <div class=\"form-check col-md-3\">
                <input class=\"form-check-input\" type=\"checkbox\" name=\"op$key\" >
                <label class=\"form-check-label\" for=\"op$key\">
                    {$value["etichetta"]};
                </label>
            </div>";
        }           
    ?>
    </div>

    



    <div class="m-1 m-md-2 row g-md-2 align-items-center">
        <div class="col-12 text-center">
            <input type="hidden" name="oper" value="0">
            <button type="submit" class="btn btn-primary">Aggiungi Operatore</button>
        </div>
    </div>
</form>