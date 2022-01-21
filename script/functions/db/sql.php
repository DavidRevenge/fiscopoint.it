<?php


/** FATTO */

function getOperatoreCedServizioDelete($id_operatore, $id_servizio, $id_operatore_ced) {
    $sql = "DELETE FROM servizio_operatori_ced
            WHERE id_operatore = ? AND id_servizio = ? AND id_operatore_ced = ?";
    return $sql;
}


function getOperatoreCedServiziSelect() {
    $sql = "SELECT * from servizio_operatori_ced WHERE id_operatore = ?";
    return $sql;
}
function getOperatoriCedEditSelect() {
    $sql = "
        SELECT id, Username, id_operatore, id_ced
        FROM operatori_ced
        WHERE id = ?
    ";
    return $sql;
}

function getOperatoriCedEditUpdate($fields) {

    $fields = explode(',', $fields);
    $update = '';

    foreach ($fields as $key => $value) {
        $length = count($fields);
        $comma = ($length > 1 && $key < ($length - 1)) ? ', ' : ' ';
        $update .= $value .' = ?'.$comma;
    }
    $sql = "
        UPDATE operatori_ced
        SET $update
        WHERE id = ?
    ";

    return $sql;
}

function getOperatoreCedByOperatoreSelect() {
    $sql = "SELECT `operatori_ced`.`id`,
            `operatori_ced`.`Username`,
            `operatori_ced`.`id_ced`,
            `operatori_ced`.`id_operatore` 
            FROM operatori_ced
            WHERE id_operatore = ?;";
    return $sql;
}

function getPraticheOperatoreCedSelect() {
    $sql = "SELECT `pratiche`.`id`,
        `pratiche`.`id_Operatore`,
        `pratiche`.`id_Utente`,
        `pratiche`.`Protocollo`,
        `pratiche`.`id_Pratica`,
        `pratiche`.`Data`,
        `pratiche`.`Note` 
        FROM pratiche
        JOIN servizio_operatori_ced AS soc ON soc.id_servizio = pratiche.id_Pratica
        WHERE soc.id_operatore_ced = ?;";
    return $sql;
}

function getPraticheOperatoreCedByUtenteSelect() {
    $sql = "SELECT pratiche.*, pratiche.id as idPratica, utenti.*, operatori.*
        FROM pratiche 
        JOIN utenti ON utenti.id = pratiche.id_Utente
        JOIN operatori ON pratiche.id_Operatore = operatori.id  
        JOIN servizio_operatori_ced AS soc ON soc.id_servizio = pratiche.id_Pratica
        WHERE id_utente = ?
        AND id_operatore_ced = ?
        ORDER BY data DESC;";
    return $sql;
}
function getUfficioByOperatoreSelect() {
    $sql = "SELECT Ufficio
            FROM operatori
            WHERE id = ?;";
    return $sql;
}
function getServizioOperatoreDelete($id_operatore, $id_servizio) {
    $sql = "DELETE FROM operatori_servizio
            WHERE id_operatore = ? AND id_servizio = ?";
    return $sql;
}
function getChangeIndexOperatoreToIdAlter () {
    $sql = "
        ALTER TABLE `operatori` 
        CHANGE COLUMN `indice` `id` BIGINT NOT NULL AUTO_INCREMENT
    ";
    return $sql;
}


function getServiziOperatoreSelect() {
    $sql = "SELECT * from operatori_servizio WHERE id_operatore = ?;";
    return $sql;
}