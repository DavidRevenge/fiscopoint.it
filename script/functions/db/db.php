<?php

require_once 'create.php';

function getPraticheOperatoreCed($id_operatore_ced) {
    global $conn;
    $sql = getPraticheOperatoreCedSelect();
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $id_operatore_ced);
    $stmt->execute();

    return $stmt->get_result();
}
function getPraticheOperatoreCedByUtente($id_utente, $id_operatore_ced) {
    global $conn;
    $sql = getPraticheOperatoreCedByUtenteSelect();
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $id_utente, $id_operatore_ced);
    $stmt->execute();

    return $stmt->get_result();
}
function getTipologiePratica() {
    global $conn;

    $sql = getTipologiePraticaSelect();    
    $stmt = $conn->prepare($sql);
    if ( ! $stmt) return false;
    else $stmt->execute();

    return $stmt->get_result();
}

function getOperatoreCedServizi($id_operatore) {
    global $conn;

    if (NEED_CREATE_TABLES) create_servizio_operatori_ced_table();

    $sql = getOperatoreCedServiziSelect();    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $id_operatore);
    $stmt->execute();

    return $stmt->get_result();
}

function getServiziOperatore($id) {
    global $conn;

    if (NEED_CREATE_TABLES) create_operatori_servizio_table();

    $sql = getServiziOperatoreSelect();    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $id);
    $stmt->execute();

    return $stmt->get_result();
}
function getServizi() {
    global $conn;

    if (NEED_CREATE_TABLES) create_servizi_table();
    
    $sql = getServiziSelect();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    return $result;
}
function getUfficioByOperatore($id_operatore) {
    global $conn;
    $sql = getUfficioByOperatoreSelect();
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $id_operatore);
    $stmt->execute();
    $result = $stmt->get_result();

    return $result;
}

function getUtentiOperatoreCed($id_operatore_ced) {
    global $conn;
    $sql = getUtentiOperatoreCedSelect();
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $id_operatore_ced);
    $stmt->execute();

    return $stmt->get_result();
}
function getUtentiByUfficio($id_ufficio) {
    global $conn;
    $sql = getUtentiByUfficioSelect();
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $id_ufficio);
    $stmt->execute();
    $result = $stmt->get_result();

    return $result;
}
function getOperatoreCedByOperatore($id_operatore) {
    global $conn;
    $sql = getOperatoreCedByOperatoreSelect();
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $id_operatore);
    $stmt->execute();
    $result = $stmt->get_result();

    return $result;
}
function getOperatoriCedResult($extraParam = false) {
    global $conn;
    $cond = '';
    $sql = getOperatoriCedSelect($extraParam);
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $cond, $cond, $cond);
    $stmt->execute();
    $result = $stmt->get_result();

    return $result;
}
function getOperatoriCedEditResult($id) {
    global $conn;
    $sql = getOperatoriCedEditSelect();
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $id);
    $stmt->execute();

    return $stmt->get_result();
}
function updateOperatoriCedEdit($id, $insert, $val_par, $pm) {
    global $conn;
    $sql = getOperatoriCedEditUpdate($insert);

    $pm[] = $id;
    $val_par .= 'i';

    $stmt = $conn->prepare($sql);
    $stmt->bind_param($val_par, ...$pm);
    $stmt->execute();
}
function updateOperatoreCedServizio($id_operatore_ced, $id_operatore, $id_servizio) {
    global $conn;
    $sql = getOperatoreCedServizioUpdate();

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sss', $id_operatore_ced, $id_operatore, $id_servizio);
    $stmt->execute();
}

function insertServizioOperatore($id_operatore, $id_servizio) {
    
    global $conn;
    $sql = getServizioOperatoreInsert($id_operatore, $id_servizio);
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $id_operatore, $id_servizio);
    $stmt->execute();
}
function insertOperatoreCedServizio($id_operatore, $id_servizio, $id_operatore_ced) {
    global $conn;
    $sql = getOperatoreCedServizioInsert($id_operatore, $id_servizio, $id_operatore_ced);
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sss', $id_operatore, $id_servizio, $id_operatore_ced);
    $stmt->execute();
    return $stmt->get_result();
}
function deleteOperatoreCedServizio($id_operatore, $id_servizio, $id_operatore_ced) {
    global $conn;
     $sql = getOperatoreCedServizioDelete($id_operatore, $id_servizio, $id_operatore_ced);
     $stmt = $conn->prepare($sql);
     $stmt->bind_param('sss', $id_operatore, $id_servizio, $id_operatore_ced);
     $stmt->execute();
}
 function deleteServizioOperatore($id_operatore, $id_servizio) {
    
     global $conn;
     $sql = getServizioOperatoreDelete($id_operatore, $id_servizio);
     $stmt = $conn->prepare($sql);
     $stmt->bind_param('ss', $id_operatore, $id_servizio);
     $stmt->execute();
 }

 function changeIndexOperatoriToId() {
      global $conn;

      $sql = getChangeIndexOperatoreToIdAlter();
      $stmt = $conn->prepare($sql);
      $stmt->execute();
  
      if ($stmt->sqlstate === '00000') return true;
      else return $stmt->error;
 }