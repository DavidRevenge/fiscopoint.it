<?php
if ($livello == 100) {
    echo "<script type=\"text/javascript\">window.location.replace(\"$sito\");</script>";
    return;
}

require_once 'script/functions.php';

// $json_pratiche = json_decode(file_get_contents("json/pratiche.json"), true);
// $pratiche = $json_pratiche["Pratiche"];

$db_pratiche = TipologiaPratica::getAll();

$pratiche = [];

while ($p = $db_pratiche->fetch_assoc()) {
    $pratiche[] = $p;
}

$id = isset($_GET["id"]) ? $_GET["id"] : "";

// verifica che l'operatore della pratica è lui
if ($livello != 0) {

    $sql = "SELECT * FROM pratiche WHERE id = ? AND id_Operatore = ? LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $id, $id_operatore);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows <= 0) {

        /** OPERATORE CED */
        $isOperatoreCed = isset($_SESSION["id_operatore_ced"]);

        if ($isOperatoreCed) {
            $id_operatore_ced = $_SESSION["id_operatore_ced"];
            $operatoreCedObj = new OperatoreCed($id_operatore_ced);
            $result = $operatoreCedObj->getPratiche();
            if ($result->num_rows <= 0) {
                echo "<script type=\"text/javascript\">window.location.replace(\"$sito\");</script>";
                return;
            }
        }

        /** FINE OPERATORE CED */

        // echo "<script type=\"text/javascript\">window.location.replace(\"$sito\");</script>";
        // return;
    }

}

// lettura note dal database x la pratica
$sql = "SELECT notifiche.*, operatori.*, concat(operatori.Nome, ' ' , operatori.Cognome) as NomeCognome FROM notifiche JOIN operatori ON notifiche.Operatore = operatori.id WHERE Pratica = ? ORDER BY data DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$notifiche = "";
while ($row = $result->fetch_assoc()) {

    $fmt = new IntlDateFormatter('IT',
    IntlDateFormatter::FULL, 
    IntlDateFormatter::FULL
    );
    $fmt->setPattern('EEEE dd LLL yyyy - HH:mm:ss');
    $dt =  $fmt->format($row["Data"]);// display venerdì 15 apr 2022

    //$dt = utf8_encode(strftime('%A %d %B %Y - %H:%M:%S', $row["Data"]));

    $notifiche .= "<strong>{$row["NomeCognome"]}</strong> - $dt<br>{$row["Testo"]}<br><hr>";
}
;

// lettura dal database dei documenti della pratica
//$sql = "SELECT pratiche.*, utenti.* FROM pratiche JOIN utenti ON utenti.id = pratiche.id_Utente WHERE pratiche.id = ? limit 1";
$sql = "SELECT pratiche.*, utenti.* FROM
        pratiche JOIN utenti ON utenti.id = pratiche.id_Utente
        JOIN utenti_operatore AS uo ON uo.id_utente = utenti.id
        JOIN operatori AS o ON o.id = uo.id_operatore
        WHERE pratiche.id = ? ";

$is_admin = $livello > 0;
$is_operatore_ced = isset($_SESSION['id_operatore_ced']);

if ($is_admin && !$is_operatore_ced) {
    $sql .= "AND o.Ufficio = ?";
}

$sql .= " limit 1";

$stmt = $conn->prepare($sql);

if ($is_admin && !$is_operatore_ced) {
    $stmt->bind_param("is", $id, $_SESSION['id_ufficio']);
} else {
    $stmt->bind_param("i", $id);
}

$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$key = array_search($row["id_Pratica"], array_column($pratiche, 'id'));
$pratica = $pratiche[$key]["nome"];

$fmt = new IntlDateFormatter('IT',
    IntlDateFormatter::FULL, 
    IntlDateFormatter::FULL
    );
    $fmt->setPattern('EEEE dd LLL yyyy');
    $data =  $fmt->format($row["Data"]);// display venerdì 15 apr 2022


//$data = utf8_encode(strftime('%A %d %B %Y', $row["Data"]));


$protocollo = $row["Protocollo"];
$id_utente = "ID{$row["id"]}";


$title = str_replace("-", " ", $page);

$titolo_pagina = $title.' '.$pratica;

echo "
    <div class=\"row p-3 titolo_pagina text-center\">
        <h1>$title: $pratica</h1>
        <h1>$data<br>{$row["Nome"]} {$row["Cognome"]}</h1>
    </div>";
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

<script src="<?php echo $sito ?>js/upload.js"></script>

<?php 

if (isset($_POST['lavoraPratica']) && $_POST['lavoraPratica'] === '1') {

    
    $praticaObj = new Pratica($_GET["id"]);
    $result = $praticaObj->lavoraPratica();

    if ($result->sqlstate === '00000') alert('success', 'Pratica aggiunta alle lavorate con successo!');
    else if ($result->sqlstate === '23000') alert('warning', 'Pratica già lavorata!');
    else alert('danger', 'C\'è stato un errore nel database: contattare l\'amministratore!');
} else if (isset($_POST['rimuoviPraticaLavorata']) && $_POST['rimuoviPraticaLavorata'] === '1') {
    $praticaObj = new Pratica($_GET["id"]);
    $result = $praticaObj->rimuoviPraticaLavorata();

    if ($result->sqlstate === '00000') alert('success', 'Pratica rimossa dalle lavorate con successo!');
    else if ($result->sqlstate === '23000') alert('warning', 'Pratica già rimossa!');
    else alert('danger', 'C\'è stato un errore nel database: contattare l\'amministratore!');
}

?>


<!-- sezione note della pratica pratica -->
<div class="card p-2 m-2">
    <div class="card-title bg-dark text-white text-center"><h3>Note presenti</h3></div>
        <div class="card-body">
            <div class="row">
            <div class="col-8 mb-3 overflow-auto border border-1 p-1 rounded shadow-lg" style="height: 200px;">
                <?php echo $notifiche ?>
            </div>
            <div class="col-4 mb-3">
                <form action="../note.php" id="add_nota" method="post" >
                    <textarea id="nota" class="form-control" type="text" name="nota" placeholder="Aggiungi una nota" style="height: 140px;" required></textarea>
                    <label style="display:none;color:red;"><strong>ATTENZIONE: Nota richiesta</strong></label>
                    <br>
                    <input type="hidden" name="pratica" value="<?php echo $id ?>">
                    <input type="hidden" name="link" value="<?php echo $_SERVER['REQUEST_URI'] ?>">
                    <input type="submit" class="btn btn-primary" value="Aggiungi Nota">
                </form>
            </div>
            </div>
        </div>
</div>






<!-- sezione documenti caricati della pratica -->
<div class="card p-2 m-2">
    <div class="card-title bg-dark text-white text-center"><h3>Documenti presenti</h3></div>
    <div class="card-body">
        <div class="row">
            <div class="col-12"><strong>&nbsp;&nbsp;Carica nuovo documento</strong></div>
        </div>
        <div class="row">
            <form id="upload_form" enctype="multipart/form-data" method="post" >
                <div class="row">
                    <div class="col-5 mb-3">
                        <input id="nome_doc" class="form-control" type="text" name="nome_file" placeholder="Inserisci il nome del documento" required onclick="pulisci();">
                        <label id="req_doc" style="display:none;color:red;"><strong>ATTENZIONE: Nome del documento richiesto</strong></label>
                    </div>
                    <div class="col-5 mb-3">
                        <input class="form-control" type="file" accept="image/*, application/pdf" name="image_file" id="image_file" onchange="fileSelected();" required />
                        <label id="req_file" style="display:none;color:red;"><strong>ATTENZIONE: File richiesto</strong></label>
                    </div>
                    <div class="col-2 mb-3">
                        <input type="hidden" name="protocollo" value="<?php echo $protocollo; ?>">
                        <input type="hidden" name="id_utente" value="<?php echo $id_utente; ?>">
                        <input type="button" class="btn btn-primary" value="Carica documento" onclick="startUploading()" />
                    </div>
                </div>
            </form>

            <div id="error">You should select valid image files only!</div>
            <div id="error2">An error occurred while uploading the file</div>
            <div id="abort">The upload has been canceled by the user or the browser dropped the connection</div>
            <div id="warnsize">Your file is very big. We can't accept it. Please select more small file</div>

            <div id="progress_info">
                <div id="progress"></div>
                <div id="progress_percent"></div>
                <div id="upload_response"></div>
            </div>
        </div>

        <br>


        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th scope="col">Data di inserimento</th>
                    <th scope="col">Nome documento</th>
                    <th scope="col">Caricato da</th>
                    <th scope="col">Azione</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT `documenti`.`id` as id,
                                `documenti`.`id_Operatore`,
                                `documenti`.`Protocollo`,
                                `documenti`.`Nome_File`,
                                `documenti`.`Tipo`,
                                `documenti`.`Nome_Documento`,
                                `documenti`.`Data`,
                                `documenti`.`Operazione`,
                                `documenti`.`Note`,
                                `operatori`.`id` as op_id,
                                `operatori`.`Username`,
                                `operatori`.`Password`,
                                `operatori`.`Nome`,
                                `operatori`.`Cognome`,
                                `operatori`.`Indirizzo`,
                                `operatori`.`Localita`,
                                `operatori`.`Cap`,
                                `operatori`.`CodiceFiscale`,
                                `operatori`.`PartitaIva`,
                                `operatori`.`Email`,
                                `operatori`.`Telefono`,
                                `operatori`.`Cellulare`,
                                `operatori`.`Pec`,
                                `operatori`.`Livello`,
                                `operatori`.`Ufficio`,
                                `operatori`.`Stato` FROM documenti JOIN operatori ON operatori.id = documenti.id_Operatore WHERE Protocollo = ? ORDER BY data DESC";
                                $stmt = $conn->prepare($sql);
                                $stmt->bind_param("s", $protocollo);
                                $stmt->execute();
                                $result = $stmt->get_result();
                                while ($row = $result->fetch_assoc()) {
                                    $id = $row["id"];
                                    $nome_documento = $row["Nome_Documento"];
                                    $caricato = $row["Username"];
                                    $file = $row["Nome_File"];

                                    $fmt = new IntlDateFormatter('IT',
                                    IntlDateFormatter::FULL, 
                                    IntlDateFormatter::FULL
                                    );
                                    $fmt->setPattern('EEEE dd LLL yyyy');
                                    $data =  $fmt->format($row["Data"]);// display venerdì 15 apr 2022
                                    
                                   // $data = utf8_encode(strftime('%A %d %B %Y', $row["Data"]));

                                    $var = rand();
                                    $note = $row["Note"];
                                    $status = "<a class=\"ms-2 btn btn-primary lista_operatori\" href=\"{$sito}Anteprima-$id.html?var=$var\" target=\"_blank\">Visualizza</a>";
                                    //$notifiche = ($note != "" ) ? "<a class=\"ms-2 btn btn-primary lista_operatori\" href=\"{$sito}Nota-$id.html\" target=\"_blank\">Notifiche</a>" : "";
                                    $notifiche = ($note != "") ? "<button onclick=\"showUser($id)\" class=\"ms-2 btn btn-primary lista_operatori\" \">Notifiche</a>" : "";
                                    echo "<tr>
                                                        <td>$data</td>
                                                        <td>$nome_documento</td>
                                                        <td>$caricato</td>
                                                        <td>$status</td>
                                                    </tr>";
                                }
                ?>

            </tbody>
        </table>
    </div>
    <?php 
        //if ($is_operatore_ced) {
        $praticaObj = new Pratica($_GET["id"]);
        $pratica_lavorata = $praticaObj->getPraticaLavorata();

        if ($pratica_lavorata->num_rows > 0 && $livello === 2) {
            echo '<script type="text/javascript">window.location.replace("'.$sito.'Area-Riservata/Pratiche-all.html");</script>';
            return;
        }

       // }
    ?>
    <?php if ($pratica_lavorata->num_rows === 0): ?>
        <form action="<?php echo $sito ?>Area-Riservata/Pratica-<?php echo $_GET["id"]; ?>.html" method="POST">
            <input type="hidden" name="lavoraPratica" value="1">
            <button onclick="if(confirm('Lavorare la pratica?')) { return true; } else { return false; }" type="submit" class="btn btn-primary w-100 my-4">Aggiungi alle lavorate</button>
        </form>
    <?php elseif ($pratica_lavorata->num_rows > 0): ?>
        <form action="<?php echo $sito ?>Area-Riservata/Pratica-<?php echo $_GET["id"]; ?>.html" method="POST">
            <input type="hidden" name="rimuoviPraticaLavorata" value="1">
            <button type="submit" class="btn btn-danger w-100 my-4">Rimuovi dalle lavorate</button>
        </form>
    <?php endif;?>
</div>






