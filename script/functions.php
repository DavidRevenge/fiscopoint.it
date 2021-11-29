<?php

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
    global $needCreateTables, $conn;

    if ($needCreateTables) {create_utenti_operatore_table($conn);}

    global $conn;
    $sql = "SELECT u.*, u.id as utente_id, concat(u.Nome, ' ' , u.Cognome) as NomeCognome, u.CodiceFiscale, u.DataNascita,
        operatori.Nome as Operatore_Nome, operatori.Cognome as Operatore_Cognome, uffici.Sigla as Sigla_Ufficio
        FROM utenti_operatore
        INNER JOIN utenti as u on u.id = utenti_operatore.id_utente
        JOIN operatori ON u.id_Operatore = operatori.indice JOIN uffici ON uffici.id = operatori.Ufficio
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
function create_utenti_operatore_table($conn)
{
    $sql = "CREATE TABLE IF NOT EXISTS `utenti_operatore` (
            `id` int NOT NULL AUTO_INCREMENT,
            `id_operatore` int DEFAULT NULL,
            `id_utente` int DEFAULT NULL,
            PRIMARY KEY (`id`)
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;";

    $conn->query($sql);
}
