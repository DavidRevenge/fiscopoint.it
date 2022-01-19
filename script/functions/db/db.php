<?php

require_once 'create.php';

function executeStmt($sql, $bind = array()) {    
    $stmt = prepareAndBind($sql, $bind);
    if ( ! $stmt) return false;
    else $stmt->execute();
    return $stmt;
}
function prepareAndBind($sql, $bind = array()) {
    global $conn;
    $stmt = $conn->prepare($sql);
    if ( ! empty($bind)) $stmt->bind_param($bind['types'], ...$bind['vars']);
    return $stmt;
}
function getStmtResult($sql, $bind = array()) {
    $stmt = executeStmt($sql, $bind);
    return $stmt->get_result();
}
function getServiziOperatore($id) {
    
    if (NEED_CREATE_TABLES) create_operatori_servizio_table();

    $sql = getServiziOperatoreSelect();
    return getStmtResult($sql, array('types' => 's', 'vars' => array($id)));

}
function getPraticheOperatoreCed($id_operatore_ced) {
    $sql = getPraticheOperatoreCedSelect();
    return getStmtResult($sql, array('types' => 's', 'vars' => array($id_operatore_ced)));
}
function getPraticheOperatoreCedByUtente($id_utente, $id_operatore_ced) {
    $sql = getPraticheOperatoreCedByUtenteSelect();
    return getStmtResult($sql, array('types' => 'ss', 'vars' => array($id_utente, $id_operatore_ced)));
}
function getTipologiePratica() {
    $sql = getTipologiePraticaSelect();
    return getStmtResult($sql);
}
function getOperatoreCedServizi($id_operatore) {

    if (NEED_CREATE_TABLES) create_servizio_operatori_ced_table();

    $sql = getOperatoreCedServiziSelect();
    return getStmtResult($sql, array('types' => 's', 'vars' => array($id_operatore)));
}
function getServizi() {

    if (NEED_CREATE_TABLES) create_servizi_table();

    $sql = getServiziSelect();
    return getStmtResult($sql);
}
function getUfficioByOperatore($id_operatore) {
    $sql = getUfficioByOperatoreSelect();
    return getStmtResult($sql, array('types' => 's', 'vars' => array($id_operatore)));
}

function getUtentiOperatoreCed($id_operatore_ced) {
    $sql = getUtentiOperatoreCedSelect();
    return getStmtResult($sql, array('types' => 's', 'vars' => array($id_operatore_ced)));
}
function getUtentiByUfficio($id_ufficio) {
    $sql = getUtentiByUfficioSelect();
    return getStmtResult($sql, array('types' => 's', 'vars' => array($id_ufficio)));
}
function getOperatoreCedByOperatore($id_operatore) {
    $sql = getOperatoreCedByOperatoreSelect();
    return getStmtResult($sql, array('types' => 's', 'vars' => array($id_operatore)));
}
function getOperatoriCedResult($extraParam = false) {
    $sql = getOperatoriCedSelect($extraParam);
    return getStmtResult($sql, array('types' => 'sss', 'vars' => array('', '', '')));
}
function getOperatoriCedEditResult($id) {
    global $conn;
    $sql = getOperatoriCedEditSelect();
    $stmt = prepareAndBind($sql, array('types' => 's', 'vars' => array($id)));

    $stmt->execute();

    return $stmt->get_result();
}
function updateOperatoriCedEdit($id, $insert, $val_par, $pm) {
    global $conn;
    $sql = getOperatoriCedEditUpdate($insert);

    $pm[] = $id;
    $val_par .= 'i';
    $stmt = prepareAndBind($sql, array('types' => $val_par, 'vars' => $pm));

    $stmt->execute();
}
function updateOperatoreCedServizio($id_operatore_ced, $id_operatore, $id_servizio) {
    global $conn;
    $sql = getOperatoreCedServizioUpdate();
    $stmt = prepareAndBind($sql, array('types' => 'sss', 'vars' => array($id_operatore_ced, $id_operatore, $id_servizio)));

    $stmt->execute();
}

function insertServizioOperatore($id_operatore, $id_servizio) {
    
    global $conn;
    $sql = getServizioOperatoreInsert($id_operatore, $id_servizio);
    $stmt = prepareAndBind($sql, array('types' => 'ss', 'vars' => array($id_operatore, $id_servizio)));

    $stmt->execute();
}
function insertOperatoreCedServizio($id_operatore, $id_servizio, $id_operatore_ced) {
    global $conn;
    $sql = getOperatoreCedServizioInsert($id_operatore, $id_servizio, $id_operatore_ced);
    $stmt = prepareAndBind($sql, array('types' => 'sss', 'vars' => array($id_operatore, $id_servizio, $id_operatore_ced)));

    $stmt->execute();
    return $stmt->get_result();
}
function deleteOperatoreCedServizio($id_operatore, $id_servizio, $id_operatore_ced) {
    global $conn;
     $sql = getOperatoreCedServizioDelete($id_operatore, $id_servizio, $id_operatore_ced);
    $stmt = prepareAndBind($sql, array('types' => 'sss', 'vars' => array($id_operatore, $id_servizio, $id_operatore_ced)));

     $stmt->execute();
}
 function deleteServizioOperatore($id_operatore, $id_servizio) {
    
     global $conn;
     $sql = getServizioOperatoreDelete($id_operatore, $id_servizio);
    $stmt = prepareAndBind($sql, array('types' => 'ss', 'vars' => array($id_operatore, $id_servizio)));

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