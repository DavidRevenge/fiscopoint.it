<?php

require_once 'script/functions.php';

if ($livello != 0) {
    echo "<script type=\"text/javascript\">window.location.replace(\"$sito\");</script>";
    return;
}

//breadcrumb
unset($_SESSION['breadcrumb']);

// titolo della pagina
$titolo_pagina = "Operatori CED";
include "template/titolo_pagina.php";
include("template/breadcrumb.php");

//breadcrumb
$_SESSION['breadcrumb'] = array($titolo_pagina => 'Area-Riservata/Operatori_Ced.html');

$livelli_json = json_decode(file_get_contents("json/livelli.json"), true);

if (isset($_GET["oper"])) {
    $sql = "UPDATE operatori SET Stato = NOT Stato WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $_GET["id"]);
    $stmt->execute();
}
?>
<div class="card p-2 m-2">
    <div class="card-body">
        <div class="row">
            <div class="col-md-3">
                <a class="btn btn-primary" href="<?php echo $sito ?>Area-Riservata/Aggiungi-Operatore-ced.html">Aggiungi operatore CED</a>
            </div>
            <div class="col-md-9">
                <form action="<?php echo $sito ?>Area-Riservata/Operatori_ced.html" method="POST">
                    <div class="row justify-content-end">
                        <div class="col-auto">
                            <label for="cerca-operatore-ced" class="col-form-label">Cerca Operatore CED</label>
                        </div>
                        <div class="col-auto">
                            <input type="text" name="testo" class="form-control" aria-describedby="" title="">
                        </div>
                        <div class="col-auto">
                            <input type="hidden" name="cerca" value="cerca">
                            <button type="submit" class="btn btn-primary">Cerca</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>






<div class="card p-2 m-2">
    <div class="card-title bg-dark text-white text-center"><h3>Lista Operatori CED</h3></div>
    <div class="card-body">
        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th scope="col">Username</th>
                    <th scope="col">Operatore</th>
                    <th scope="col">Ufficio</th>
                    <th scope="col">Azione</th>
                </tr>
            </thead>
            <tbody>
        <?php

$cond = isset($_POST["cerca"]) ? $_POST["testo"] : "";

if (NEED_CREATE_TABLES) {
    create_operatori_ced_table();
}

// $sql = "SELECT * FROM operatori_ced WHERE (Username like CONCAT('%', ?, '%') OR Nome like CONCAT('%', ?, '%') OR Cognome like CONCAT('%', ?, '%')) AND id > 1";
// $sql = "SELECT * FROM operatori_ced WHERE (Username like CONCAT('%', ?, '%') OR Operatore like CONCAT('%', ?, '%') OR Ced like CONCAT('%', ?, '%'))";
$sql = OperatoreCedSql::getOperatoriCedSelect();
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $cond, $cond, $cond);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    $id = $row["id"];
    $username = $row["Username"];
    $operatore = $row["NomeOperatore"] . ' ' . $row["CognomeOperatore"];
    $ced = $row["SiglaCed"];
    // $stato = $row["Stato"];

    // $status = ($stato) ? "<a href=\"{$sito}Area-Riservata/Operatori-$id.html\" class=\"btn btn-primary\">Disabilita</a>" : "<a href=\"{$sito}Area-Riservata/Operatori-$id.html\" class=\"btn btn-primary\">Abilita</a>";
    $status = "<a class=\"ms-2 btn btn-primary lista_operatori\" href=\"{$sito}Area-Riservata/Modifica-Operatore-ced-$id.html\">Modifica</a>";
    // $row_color = (!$stato) ? "bg-danger text-white" : "";
    // echo "<tr class=\"$row_color\" >
    echo "<tr >
                    <td>$username</td>
                    <td>$operatore</td>
                    <td>$ced</td>
                    <td>$status</td>
                </tr>";
}
?>

            </tbody>
        </table>
    </div>
</div>