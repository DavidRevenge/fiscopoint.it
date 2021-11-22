<?php    
    if($livello == 100) { 
        echo "<script type=\"text/javascript\">window.location.replace(\"$sito\");</script>";
        return;        
    } 
    // titolo della pagina
    $titolo_pagina = "Aggiungi CED";
    include("template/titolo_pagina.php");
    
    
    $ced_json = json_decode(file_get_contents("json/ced.json"), true);


    if(isset($_POST["oper"])) {
        // leggi i menu               
        $insert = "";
        $pm = array();
        $val_par = "";
        

        foreach($ced_json as $value ) {             
            $insert .= $value["name"] . ", ";
            array_push($pm, $_POST[$value["name"]]); 
            $val_par .= $value["bind"];          
        }

        $insert = substr_replace($insert ,"",-2); 
        $values = str_repeat('?,', count($pm) - 1) . '?';               
        $sql = "INSERT INTO ced ($insert) VALUES ($values)";
       
        $stmt = $conn->prepare($sql); 
        $stmt->bind_param($val_par, ...$pm);
        $stmt->execute();      

        echo "
        <div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">
            <strong>Ced {$_POST["Sigla"]} aggiunto</strong>.
            <button type=\button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
        </div>";
    }

?>

<form action="<?php echo $sito ?>Area-Riservata/Aggiungi-Ced.html" method="POST">  
    <?php
    foreach($ced_json as $value) {
        $tipo = $value["tipo"];        
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


    <div class="m-1 m-md-2 row g-md-2 align-items-center">
        <div class="col-12 text-center">
            <input type="hidden" name="oper" value="0">
            <button type="submit" class="btn btn-primary">Aggiungi CED</button>
        </div>
    </div>
</form>