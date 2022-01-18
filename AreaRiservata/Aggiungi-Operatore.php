<?php
    require_once 'script/functions.php'; 

    if (isset($_POST['popolaTabelle']) && $_POST['popolaTabelle'] === "1" && $livello === 0) {
        populateServiziSezioniTipologiaPratica();
        echo '
            <script>
                window.location.replace("Aggiungi-Operatore.html");
            </script>
        ';
    }

    if($livello != 0) {
        echo "<script type=\"text/javascript\">window.location.replace(\"$sito\");</script>";
        return;
    } 
    // titolo della pagina
    $titolo_pagina = "Operatori";
    include("template/titolo_pagina.php");
    
    $operatori = json_decode(file_get_contents("json/operatori.json"), true);
    //$mn_servizi = json_decode(file_get_contents("json/servizi.json"), true);
    $mn_servizi = getTipologiePratica(); //getServizi();

    if(isset($_POST["oper"])) {
        // leggi i menu         
        $servizi = "";     

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

        if(isset($_POST["ufficio"])) {
            $insert .= "Ufficio";
            $val_par .= "i"; 
            $values .= " ?";
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

        while ( $s = $mn_servizi->fetch_assoc()) {
            if (isset($_POST['op' . $s['id']])) {
                insertServizioOperatore($stmt->insert_id, $s['id']);
                if ($_POST['opced_' . $s['id']] !== 'false') insertOperatoreCedServizio($stmt->insert_id, $s['id'], $_POST['opced_' . $s['id']]);
            }
        }    

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
        if (isset($_POST["oper"])) {
            //$mn_servizi = getServizi();
            $mn_servizi = getTipologiePratica();
            
        }
        require_once('script/common/checkboxes/servizi.php');
    ?>
    </div>
    <div class="m-1 m-md-2 row g-md-2 align-items-center">
        <div class="col-12 text-center">
            <input type="hidden" name="oper" value="0">
            <button type="submit" class="btn btn-primary">Aggiungi Operatore</button>
        </div>
    </div>
</form>
<?php if (! $mn_servizi || $mn_servizi->num_rows === 0) : ?>
    <form action="<?php echo $sito ?>Area-Riservata/Aggiungi-Operatore.html" method="POST">  
        <input type="hidden" name="popolaTabelle" value="1">
        <button type="submit" class="btn btn-primary w-100 my-4">Popola tabelle</button>
    </form>
<?php endif; ?>