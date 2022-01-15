<?php

require_once('functions/constants.php');

require_once 'functions/sql.php';
require_once 'functions/db/db.php';
require_once 'functions/alerts.php';

function getJsonSelect($value, $optionToSelect = false)
{
    global $conn;
    $return = '
    <div class="m-1 m-md-2 row g-md-2 align-items-center">
            <div class="col-md-2 text-md-end">
                <label for="nick" class="col-form-label">' . $value['etichetta'] . '</label>
            </div>
            <div class="col-md-10"> ';

    $sqlWhere = (isset($value['sqlWhere'])) ? $value['sqlWhere'] : '';
    $sqlId = (isset($value['sqlId'])) ? $value['sqlId'] : 'id';

    $sql = 'SELECT * FROM '.$value['sqlTable'].' '.$sqlWhere;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $return .= '<select name="'.$value['name'].'" class="form-select">';
    
    while ($row = $result->fetch_assoc()) {
        $sqlSelectOptionValue = '';

        $selected = ($row[$sqlId] === $optionToSelect) ? 'selected': '';

        if (is_array($value['sqlSelectOptionValue'])) {
            foreach ($value['sqlSelectOptionValue'] as $ssov) $sqlSelectOptionValue .= ' '.$row[$ssov];
        } else $sqlSelectOptionValue = $row[$value['sqlSelectOptionValue']];
        $return .= '
                <option value="'.$row[$sqlId].'" '.$selected.'>'
                .$sqlSelectOptionValue.'
                </option>
                ';
    }
    $return .= "</select>
            </div>
        </div>";

    return $return;
}

function removeDuplicateArrayElement($array, $key)
{
    $array_to_return = array();
    foreach ($array as $u) {
        if (isset($array_to_return[$u[$key]])) {
            // found duplicate
            continue;
        }
        $array_to_return[$u[$key]] = $u;
    }
    return $array_to_return;
}
function getOperatorUsers($operator_id)
{
    global $conn;

    if (NEED_CREATE_TABLES) {create_utenti_operatore_table($conn);}

    global $conn;
    $sql = "SELECT u.*, u.id as utente_id, concat(u.Nome, ' ' , u.Cognome) as NomeCognome, u.CodiceFiscale, u.DataNascita,
        operatori.Nome as Operatore_Nome, operatori.Cognome as Operatore_Cognome, uffici.Sigla as Sigla_Ufficio
        FROM utenti_operatore
        INNER JOIN utenti as u on u.id = utenti_operatore.id_utente
        JOIN operatori ON u.id_Operatore = operatori.id JOIN uffici ON uffici.id = operatori.Ufficio
        WHERE utenti_operatore.id_operatore = ?";

    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        echo '<h2 style="color: red;">C\'è un errore nel codice sql. Contattare l\'amministratore del sito</h2>';
        return false;
    } else {
        $stmt->bind_param("s", $operator_id);
        $stmt->execute();
        return $stmt->get_result();
    }
}
function userExists($codice_fiscale)
{
    global $conn;
    $sql = "SELECT id FROM utenti where CodiceFiscale = ?";

    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        echo '<h2 style="color: red;">C\'è un errore nel codice sql. Contattare l\'amministratore del sito</h2>';
    } else {
        $stmt->bind_param("s", $codice_fiscale);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

}
function operatorUserExists($conn, $user_id, $operator_id)
{
    $sql = "SELECT id_utente FROM utenti_operatore where id_operatore = ? and id_utente = ?";

    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        echo '<h2 style="color: red;">C\'è un errore nel codice sql. Contattare l\'amministratore del sito</h2>';
    } else {
        $stmt->bind_param("ss", $operator_id, $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

}
function assignUserToOperator($conn, $user_id, $operator_id)
{
    $sql = "INSERT INTO utenti_operatore (id_operatore, id_utente) VALUES (?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $operator_id, $user_id);
    $stmt->execute();
}
