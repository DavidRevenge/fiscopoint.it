<?php

require_once 'create.php';

spl_autoload_register(function ($class_name) {
    if (file_exists(__DIR__ . '/' . $class_name . '.php')) {
        require_once __DIR__ . '/' . $class_name . '.php';
    } else if (file_exists(__DIR__ . '/sql/' . $class_name . '.php')) {
        require_once __DIR__ . '/sql/' . $class_name . '.php';
    }
});

/** FATTO */

function getOperatoriCedEditResult($id)
{
    $sql = getOperatoriCedEditSelect();
    return getStmtResult($sql, array('types' => 's', 'vars' => array($id)));
}
function updateOperatoriCedEdit($id, $insert, $val_par, $pm)
{
    $sql = getOperatoriCedEditUpdate($insert);
    $pm[] = $id;
    $val_par .= 'i';
    executeStmt($sql, array('types' => $val_par, 'vars' => $pm));
}
function insertOperatoreCedServizio($id_operatore, $id_servizio, $id_operatore_ced)
{
    $sql = getOperatoreCedServizioInsert($id_operatore, $id_servizio, $id_operatore_ced);
    return getStmtResult($sql, array('types' => 'sss', 'vars' => array($id_operatore, $id_servizio, $id_operatore_ced)));
}
function deleteOperatoreCedServizio($id_operatore, $id_servizio, $id_operatore_ced)
{
    $sql = getOperatoreCedServizioDelete($id_operatore, $id_servizio, $id_operatore_ced);
    executeStmt($sql, array('types' => 'sss', 'vars' => array($id_operatore, $id_servizio, $id_operatore_ced)));
}

function getOperatoreCedServizi($id_operatore)
{

    if (NEED_CREATE_TABLES) {
        create_servizio_operatori_ced_table();
    }

    $sql = getOperatoreCedServiziSelect();
    return getStmtResult($sql, array('types' => 's', 'vars' => array($id_operatore)));
}

function getOperatoreCedByOperatore($id_operatore)
{
    $sql = getOperatoreCedByOperatoreSelect();
    return getStmtResult($sql, array('types' => 's', 'vars' => array($id_operatore)));
}

function getPraticheOperatoreCed($id_operatore_ced)
{
    $sql = getPraticheOperatoreCedSelect();
    return getStmtResult($sql, array('types' => 's', 'vars' => array($id_operatore_ced)));
}
function getPraticheOperatoreCedByUtente($id_utente, $id_operatore_ced)
{
    $sql = getPraticheOperatoreCedByUtenteSelect();
    return getStmtResult($sql, array('types' => 'ss', 'vars' => array($id_utente, $id_operatore_ced)));
}

function getUfficioByOperatore($id_operatore)
{
    $sql = getUfficioByOperatoreSelect();
    return getStmtResult($sql, array('types' => 's', 'vars' => array($id_operatore)));
}
function deleteServizioOperatore($id_operatore, $id_servizio)
{
    $sql = getServizioOperatoreDelete();
    executeStmt($sql, array('types' => 'ss', 'vars' => array($id_operatore, $id_servizio)));
}

function changeIndexOperatoriToId()
{
    $sql = getChangeIndexOperatoreToIdAlter();
    $stmt = executeStmt($sql);

    if ($stmt->sqlstate === '00000') {
        return true;
    } else {
        return $stmt->error;
    }

}
function insertServizioOperatore($id_operatore, $id_servizio)
{
    $sql = getServizioOperatoreInsert($id_operatore, $id_servizio);
    executeStmt($sql, array('types' => 'ss', 'vars' => array($id_operatore, $id_servizio)));
}

function getServiziOperatore($id)
{

    if (NEED_CREATE_TABLES) {
        create_operatori_servizio_table();
    }

    $sql = getServiziOperatoreSelect();
    return getStmtResult($sql, array('types' => 's', 'vars' => array($id)));

}

function executeStmt($sql, $bind = array())
{
    $stmt = prepareAndBind($sql, $bind);
    if (!$stmt) {
        return false;
    } else {
        $stmt->execute();
    }

    return $stmt;
}
function prepareAndBind($sql, $bind = array())
{
    global $conn;
    $stmt = $conn->prepare($sql);
    if (!empty($bind)) {
        $stmt->bind_param($bind['types'], ...$bind['vars']);
    }

    return $stmt;
}
function getStmtResult($sql, $bind = array())
{
    $stmt = executeStmt($sql, $bind);
    return $stmt->get_result();
}
