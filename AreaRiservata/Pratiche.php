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
     

if ($id !== 'all') {

    $_SESSION['breadcrumb'] = array(
        'Utenti' => 'Area-Riservata/Utenti.html'
    );

    $sql = "SELECT * FROM utenti WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $nome = $row["Nome"];
    $cognome = $row["Cognome"];

    $titolo_pagina = 'Pratiche';

    echo "
        <div class=\"row p-3 titolo_pagina text-center\">
            <h1>$titolo_pagina<br></h1>
            <h1 style=\"color:white\";>{$row["Nome"]} {$row["Cognome"]}</h1>
        </div>";

} else {
    
    //breadcrumb
    unset($_SESSION['breadcrumb']);

    $titolo_pagina = 'Archivio Pratiche';
    $titolo_pagina_explode = explode(' ', $titolo_pagina);
    echo "
        <div class=\"row p-3 titolo_pagina text-center\">
            <h1>{$titolo_pagina_explode[1]}<br></h1>
            <h1 style=\"color:white\";>{$titolo_pagina_explode[0]}</h1>
        </div>";
}

?>

<!-- Breadcrumb -->
<div class="row breadcrumbBox">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb fp">
            <li class="breadcrumb-item"><a href="<?php echo $sito ?>">Home</a></li>

            <?php 
                if (isset($_SESSION['breadcrumb'])) {
                    foreach ($_SESSION['breadcrumb'] as $name => $url) echo '<li class="breadcrumb-item"><a href="'.$sito.$url.'">'.$name.'</a></li>';
                }
            ?>

            <li class="breadcrumb-item active" aria-current="page"><?php echo $titolo_pagina; ?></li>
        </ol>
    </nav>
</div>

<?php
//breadcrumb
if ($id !== 'all') {
    $_SESSION['breadcrumb'] = array(
        'Utenti' => 'Area-Riservata/Utenti.html',
        $titolo_pagina => 'Area-Riservata/Pratiche-'.$_GET["id"].'.html'
    );
} else $_SESSION['breadcrumb'] = array($titolo_pagina => 'Area-Riservata/Pratiche-all.html');


if (isset($_POST["new_pratica"]) && $id !== 'all') {
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
    <?php if ($id !== 'all'): ?>
        <form action="<?php echo "{$sito}Area-Riservata/Pratiche-$id.html" ?>" method="POST">
    <?php else : ?>
        <form action="<?php echo "{$sito}Area-Riservata/Pratiche-all.html" ?>" method="POST">
    <?php endif; ?>
            <div class="row align-items-center">
                <div class="col-auto">
                    <label>Seleziona tipo di pratica</label>
                </div>
                <div class="col-auto">
                    <select name="new_pratica" class="form-select">
                    <?php if ($id !== 'all'): ?>
                        <option value="0">Seleziona il tipo di pratica</option>
                    <?php else : ?>
                        <option value="all">Tutte</option>
                    <?php endif;?>
                        <?php
foreach ($pratiche as $pratica) {
    $selected = isset($_POST['new_pratica']) && $_POST['new_pratica'] == $pratica["id"] ? 'selected': '';
    echo "
                                    <option class=\"form-control\" value=\"{$pratica["id"]}\" $selected>{$pratica["nome"]}</option>
                                ";
}
?>
                    </select>
                </div>

                <?php if ($id === 'all'): ?>
                    <div class="col-auto">
                        <label>Anno</label>
                    </div>
                    <div class="col-auto">
                        <select name="anno_filtro" class="form-select">
                            <option value="<?php echo date('Y'); ?>"><?php $currentYear = date('Y'); echo $currentYear; ?></option>
                            <?php
                            $anni = getAnniArray($currentYear);
                            foreach ($anni as $anno) {
                                $selected = isset($_POST['anno_filtro']) && $_POST['anno_filtro'] == $anno ? 'selected': '';
                                echo "
                                                                <option class=\"form-control\" value=\"{$anno}\" $selected>{$anno}</option>
                                                            ";
                            }
                        ?>
                                            </select>
                    </div> 
                
                <div class="col-auto">
                        <label>Stato</label>
                    </div>
                    <div class="col-auto">
                        <select name="stato_filtro" class="form-select">
                            <?php
                            $stato = ['Tutte', 'Lavorate', 'Da Lavorare'];
                            foreach ($stato as $s) {
                                $selected = isset($_POST['stato_filtro']) && $_POST['stato_filtro'] == $s ? 'selected': '';
                                echo "
                                                                <option class=\"form-control\" value=\"{$s}\" $selected>{$s}</option>
                                                            ";
                            }
                        ?>
                                            </select>
                    </div>   
                <?php endif;?>      
                <div class="col-auto">
                    <?php if ($id !== 'all'): ?>
                        <button type="submit" class="btn btn-primary">Aggiungi Nuova Pratica</a>
                     <?php else : ?>
                        <button type="submit" class="btn btn-primary">Filtra</a>
                    <?php endif;?>
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
                    <th scope="col">Utente</th>
                    <th scope="col">Data di inserimento</th>
                    <th scope="col">Pratica</th>
                    <th scope="col">Protocollo</th>
                    <?php
if ($livello == 0) {
    echo "<th scope=\"col\">Creato Da</th>";
}
?>
                    <th scope="col">Lavorata</th>
                    <th scope="col">Azione</th>
                </tr>
            </thead>
            <tbody>
        <?php

if ($id !== 'all') {
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
} else {
    $ufficioObj = new Ufficio($_SESSION['id_ufficio']);
    if (isset($_POST['new_pratica']) && $_POST['new_pratica'] !== 'all') $result = $ufficioObj->getPraticheByTipologia($_POST['new_pratica']);
    else $result = $ufficioObj->getPratiche();
}

$op_pratiche = getArrayFromDbQuery($result);

/** OPERATORE CED */
$isOperatoreCed = isset($_SESSION["id_operatore_ced"]);

if ($isOperatoreCed && $_POST['new_pratica'] === 'all') {
    $id_operatore_ced = $_SESSION["id_operatore_ced"];
    $operatoreCedObj = new OperatoreCed($id_operatore_ced);
   // $resultOC = $operatoreCedObj->getPraticheByUtente($id);
    $resultOC = $operatoreCedObj->getPraticheArchivio();

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

    $utente_pratica = '';    

    $praticaObj = new Pratica($id);
    $pratica_lavorata = $praticaObj->getPraticaLavorata();

    $utente = getArrayFromDbQuery($praticaObj->getUtente())[0];

    if ($pratica_lavorata->num_rows > 0 && $livello == 2) continue;

    if (isset($_POST['stato_filtro'])) {
        if ( $pratica_lavorata->num_rows === 0 && $_POST['stato_filtro'] === 'Lavorate') continue;
        else if ( $pratica_lavorata->num_rows > 0 && $_POST['stato_filtro'] === 'Da Lavorare') continue;
    }

    $status = "<a class=\"ms-2 btn btn-primary lista_operatori\" href=\"{$sito}Area-Riservata/Pratica-$id.html\">Entra</a>";
    echo "<tr>
                    <td>{$utente['Nome']} {$utente['Cognome']}</td>
                    <td>$data</td>
                    <td>$pratica</td>
                    <td>$protocollo</td>";
    if ($livello == 0) {echo "<td>$user_oper</td>";}

    if ($pratica_lavorata->num_rows > 0) {
        echo '<td><img class="pratica lavorata icon" src="' . $sito . '/media/icon/success.svg"></td>';
    } else if ($pratica_lavorata->num_rows === 0) {
        echo '<td><img class="pratica lavorata icon" src="' . $sito . '/media/icon/failure.svg"></td>';
    }

    echo "<td>$status</td>";
    echo "</tr>";
}
if (empty($op_pratiche)) alert('warning', 'Nessuna pratica presente');
?>

            </tbody>
        </table>
    </div>
</div>

