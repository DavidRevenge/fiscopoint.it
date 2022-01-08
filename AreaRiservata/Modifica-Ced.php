<?php
    if($livello == 100) {
        echo "<script type=\"text/javascript\">window.location.replace(\"$sito\");</script>";
        return;
    } 
    // titolo della pagina
    $titolo_pagina = "Modifica CED";    
    include("template/titolo_pagina.php");
    
    $ced_json = json_decode(file_get_contents("json/ced.json"), true);    

    if(isset($_POST["oper"])){
        $set = "";
        $pm = array();
        $val_par = "";
        foreach($ced_json as $value ) {
            $set .= "{$value["name"]} = ?, ";    
            array_push($pm, $_POST[$value["name"]]);
            $val_par .= $value["bind"];
        }
        $set = substr_replace($set ,"",-2);
        array_push($pm, $_GET["id"]);
        $val_par .= "i";
        $sql = "UPDATE ced SET $set WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param($val_par, ...$pm);
        $stmt->execute();
        
        echo "
        <div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">
            <strong>Ced {$_POST["Sigla"]} Modificato</strong>.
            <button type=\button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
        </div>";

    }
    

    $sql = "SELECT * FROM ced where id = ? limit 1";
    $stmt = $conn->prepare($sql);  
    $stmt->bind_param("i", $_GET["id"]);      
    $stmt->execute();
    $result = $stmt->get_result(); 
    $row = $result->fetch_assoc();
?>

<form action="<?php echo $sito ?>Area-Riservata/Modifica-Ced-<?php echo $_GET["id"] ?>.html" method="POST">
    <?php
    foreach($ced_json as $value) {
        $tmp = $row[$value["name"]];
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


    <div class="m-1 m-md-2 row g-md-2 align-items-center">
        <div class="col-12 text-center">
            <input type="hidden" name="oper" value="0">
            <button type="submit" class="btn btn-primary">Modifica CED</button>
        </div>
    </div>
</form>