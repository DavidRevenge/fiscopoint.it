<?php

if ($livello == 100) {
    echo "<script type=\"text/javascript\">window.location.replace(\"$sito\");</script>";
    return;
}

require_once 'script/functions.php';

// $json_pratiche = json_decode(file_get_contents("json/pratiche.json"), true);
//$pratiche = $json_pratiche["Pratiche"];

$db_pratiche = TipologiaPratica::getAll();
$pratiche = [];

while ($p = $db_pratiche->fetch_assoc()) {
    $pratiche[] = $p;
}

$id = (isset($_GET["id"])) ? $_GET["id"] : 0;
$sql = "SELECT * FROM utenti WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$nome = $row["Nome"];
$cognome = $row["Cognome"];

echo "
    <div class=\"row p-3 titolo_pagina text-center\">
        <h1>Pratiche<br></h1>
        <h1 style=\"color:white\";>{$row["Nome"]} {$row["Cognome"]}</h1>
    </div>";

if (isset($_POST["new_pratica"])) {
    if ($_POST["new_pratica"] != "0") {
        $id_pratica = $_POST["new_pratica"];
        $protocollo = "$id_operatore-$id_pratica-$id-" . time();
        $data = time();
        $sql = "INSERT INTO pratiche (id_Operatore, id_Utente, Protocollo, id_Pratica, Data) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iisis", $id_operatore, $id, $protocollo, $id_pratica, $data);
        $stmt->execute();
        $sql = "SELECT * FROM pratiche WHERE Protocollo = ? LIMIT 1;";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $protocollo);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $id_temp = $row["id"];
        echo "<script type=\"text/javascript\">window.location.replace(\"{$sito}Area-Riservata/Pratica-$id_temp.html\");</script>;
            <div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">
                <strong>Pratica Aggiunta</strong>.
                <button type=\button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
            </div>";
    } else {
        echo "
            <div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">
                <strong>Tipo di pratica non selezionata, si prega di selezionarne una prima di premere il pulsante</strong>.
                <button type=\button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
            </div>";
    }
}

?>

<div class="card p-2 m-2">
    <div class="card-body">
        <form action="<?php echo "{$sito}Area-Riservata/Pratiche-$id.html" ?>" method="POST">
            <div class="row align-items-center">
                <div class="col-auto">
                    <label>Seleziona tipo di pratica</label>
                </div>
                <div class="col-auto">
                    <select name="new_pratica" class="form-select">
                        <option value="0">Seleziona il tipo di pratica</option>
                        <?php
foreach ($pratiche as $pratica) {
    echo "
                                    <option class=\"form-control\" value=\"{$pratica["id"]}\">{$pratica["nome"]}</option>
                                ";
}
?>
                    </select>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary">Aggiungi Nuova Pratica</a>
                </div>
            </div>
        </form>
    </div>
</div>


<div class="card p-2 m-2">
    <div class="card-title bg-dark text-white text-center"><h3>Lista Pratiche</h3></div>
    <div class="card-body">
        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th scope="col">Data di inserimento</th>
                    <th scope="col">Pratica</th>
                    <th scope="col">Protocollo</th>
                    <?php
if ($livello == 0) {
    echo "<th scope=\"col\">Creato Da</th>";
}
?>
                    <th scope="col">Azione</th>
                </tr>
            </thead>
            <tbody>
        <?php

// $opr = ($livello == 0) ? "" : "AND pratiche.id_Operatore = $id_operatore";
/**  Aggiunta - Task - Operatori - condividere utenti e pratiche con lo stesso ufficio. */
$opr = ($livello == 0) ? "" : "AND operatori.Ufficio = {$_SESSION['id_ufficio']}";
$sql = "SELECT pratiche.*, pratiche.id as idPratica, utenti.*, operatori.*
        FROM pratiche
        JOIN utenti ON utenti.id = pratiche.id_Utente 
        JOIN operatori ON pratiche.id_Operatore = operatori.id
        WHERE id_utente = ? $opr 
        ORDER BY data DESC";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

$op_pratiche =  getArrayFromDbQuery($result);


/** OPERATORE CED */
$isOperatoreCed = isset($_SESSION["id_operatore_ced"]);

if ($isOperatoreCed) {
    $id_operatore_ced = $_SESSION["id_operatore_ced"];
    $operatoreCedObj = new OperatoreCed($id_operatore_ced);
    $resultOC = $operatoreCedObj->getPraticheByUtente($id);

    $opc_pratiche = getArrayFromDbQuery($resultOC);

    $op_pratiche = array_merge($op_pratiche, $opc_pratiche);

    $op_pratiche = removeDuplicateArrayElement($op_pratiche, 'idPratica');

} 

/** FINE OPERATORE CED */

// while ($row = $result->fetch_assoc()) {
foreach ($op_pratiche as $row) {
    $id = $row["idPratica"];
    $id_pratica = $row["id_Pratica"];
    $key = array_search($id_pratica, array_column($pratiche, 'id'));
    $pratica = $pratiche[$key]["nome"];
    $data = utf8_encode(strftime('%A %d %B %Y', $row["Data"]));
    $protocollo = explode("-", $row["Protocollo"])[3];
    $user_oper = $row["Username"];

    $status = "<a class=\"ms-2 btn btn-primary lista_operatori\" href=\"{$sito}Area-Riservata/Pratica-$id.html\">Entra</a>";
    echo "<tr>
                    <td>$data</td>
                    <td>$pratica</td>
                    <td>$protocollo</td>";
    if ($livello == 0) {echo "<td>$user_oper</td>";}
    echo "<td>$status</td>
                </tr>";
}
?>

            </tbody>
        </table>
    </div>
</div>

