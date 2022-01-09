<?php

require_once 'script/functions.php';

$is_opc_edit = (isset($_POST['edit']) && $_POST['edit'] === true);

if ($livello != 0) {
    echo "<script type=\"text/javascript\">window.location.replace(\"$sito\");</script>";
    return;
}
// titolo della pagina
$titolo_pagina = "Operatori CED";
include "template/titolo_pagina.php";

$operatori = json_decode(file_get_contents("json/operatori_ced.json"), true);
$mn_servizi = json_decode(file_get_contents("json/servizi.json"), true);

if ($needCreateTables) {
    create_operatori_ced_table();
}

if (isset($_POST["operatori_ced"])) {
    // leggi i menu
    $servizi = "";
    foreach ($mn_servizi as $key => $value) {
        $servizi .= isset($_POST['op' . $key]) ? "1" : "0";
    }
    $insert = "";
    $val_par = "";
    $values = "";
    $pm = array();

    foreach ($operatori as $value) {
        $insert .= $value["name"] . ", ";
        $val_par .= $value["bind"];
        $values .= " ?,";
        array_push($pm, (($value["name"] == "Password") ? password_hash($_POST["Password"], PASSWORD_BCRYPT) : $_POST[$value["name"]]));
    }

    $insert = substr_replace($insert, "", -2);
    $values = substr_replace($values, "", -1);
    // $insert .= ", Servizi";
    // $val_par .= "s";
    // $values .= " ?";
    // array_push($pm, $servizi);

    // if (isset($_POST["ced"])) {
    //     $insert .= ", id_ced";
    //     $val_par .= "s";
    //     $values .= ", ?";
    //     array_push($pm, intval($_POST["ced"]));
    // }

    // $insert .= ", Livello";
    // $val_par .= "s";
    // $values .= ", ?";
    // array_push($pm, intval($_POST["livello"]));

    if (isset($_POST['opc_edit'])) {

        updateOperatoriCedEdit($_GET['id'], $insert,  $val_par, $pm);

        echo "
            <div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
                <strong>Operatore {$_POST["Username"]} modificato con successo</strong>.
                <button type=\button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
            </div>";
    } else {
        $sql = "INSERT INTO operatori_ced ($insert) VALUES ($values)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param($val_par, ...$pm);
        $stmt->execute();

        echo "
            <div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">
                <strong>Operatore {$_POST["Username"]} aggiunto</strong>.
                <button type=\button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
            </div>";
    }
}

$actionPage = ($is_opc_edit) ? 'Modifica-Operatore-ced-'.$_GET['id'].'.html' : 'Aggiungi-Operatore-ced.html';

if ($is_opc_edit) {
    $operatoriCedEditResult = getOperatoriCedEditResult($_GET['id']);
    $operatoriCedEditResult = $operatoriCedEditResult->fetch_assoc();
}

?>

<form action="<?php echo $sito ?>Area-Riservata/<?php echo $actionPage ?>" method="POST">

    <?php
foreach ($operatori as $value) {

    if ($value["tipo"] === 'select') {

        if (isset($_POST['opc_edit'])) {

        }

        $optionToSelect = ($is_opc_edit) ? $operatoriCedEditResult[$value['name']] : false;

        echo getJsonSelect($value, $optionToSelect);
    } else {

        $inputVal = $is_opc_edit ? $operatoriCedEditResult[$value['name']] : '';
        echo "
        <div class=\"m-1 m-md-2 row g-md-2 align-items-center\">
            <div class=\"col-md-2 text-md-end\">
                <label for=\"nick\" class=\"col-form-label\">{$value["etichetta"]}</label>
            </div>
            <div class=\"col-md-10\">
                <input value=\"$inputVal\" type=\"{$value["tipo"]}\" name=\"{$value["name"]}\" class=\"form-control\" aria-describedby=\"\" {$value["opzioni_add"]} title=\"{$value["descrizione_add"]}\">
                <small><strong>{$value["descrizione_add"]}</small></strong>
            </div>
        </div>
        ";
    }
}
?>

    <!-- livello operatore
    <div class="m-1 m-md-2 row g-md-2 align-items-center">
        <div class="col-md-2 text-md-end">
            <label for="nick" class="col-form-label">Livello Operatore</label>
        </div>
        <div class="col-md-10">
            <select name="livello" class="form-select">
    <?php
// $livelli_json = json_decode(file_get_contents("json/livelli.json"), true);
// foreach ($livelli_json as $value) {
//     echo "
//                 <option value=\"{$value["livello"]}\">
//                     {$value["descrizione"]}
//                 </option>
//             ";
// }
?>
            </select>
        </div>
    </div>
 -->





<!--
    <div class="m-1 m-md-2 row g-md-2">
    <?php
// foreach ($mn_servizi as $key => $value) {
//     echo "
//             <div class=\"form-check col-md-3\">
//                 <input class=\"form-check-input\" type=\"checkbox\" name=\"op$key\" >
//                 <label class=\"form-check-label\" for=\"op$key\">
//                     {$value["etichetta"]};
//                 </label>
//             </div>";
// }

$buttonLabel = $is_opc_edit ? 'Modifica Operatore' : 'Aggiungi Operatore';

?>
    </div> -->





    <div class="m-1 m-md-2 row g-md-2 align-items-center">
        <div class="col-12 text-center">
            <input type="hidden" name="operatori_ced" value="0">
            <input type="hidden" name="ced" value="0">
            <?php if ($is_opc_edit): ?>

            <input type="hidden" name="opc_edit" value="0">
            <?php endif;?>

            <button type="submit" class="btn btn-primary mb-2"><?php echo $buttonLabel; ?></button>
        </div>
    </div>
</form>