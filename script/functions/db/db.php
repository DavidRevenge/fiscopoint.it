<?php

require_once 'create.php';
class FPDatabase
{
    public function prepareAndBind($sql, $bind = array())
    {
        global $conn;
        $stmt = $conn->prepare($sql);
        if (!empty($bind)) {
            $stmt->bind_param($bind['types'], ...$bind['vars']);
        }

        return $stmt;
    }
    public function executeStmt($sql, $bind = array())
    {
        $stmt = $this->prepareAndBind($sql, $bind);
        if (!$stmt) {
            return false;
        } else {
            $stmt->execute();
        }

        return $stmt;
    }
    public function getStmtResult($sql, $bind = array())
    {
        $stmt = $this->executeStmt($sql, $bind);
        return $stmt->get_result();
    }
}
class OperatoreDb extends FPDatabase
{
    protected $id;
    public function __construct($id)
    {
        $this->id = $id;
    }
    public function insertServizio($id_servizio)
    {
        $sql = OperatoreSql::getServizioInsert();
        parent::executeStmt($sql, array('types' => 'ss', 'vars' => array($this->id, $id_servizio)));
    }
    public function deleteServizio($id_servizio)
    {
        $sql = OperatoreSql::getServizioDelete();
        parent::executeStmt($sql, array('types' => 'ss', 'vars' => array($this->id, $id_servizio)));
    }
    public function getServizi()
    {
        if (NEED_CREATE_TABLES) {
            create_operatori_servizio_table();
        }

        $sql = OperatoreSql::getServiziSelect();
        return parent::getStmtResult($sql, array('types' => 's', 'vars' => array($this->id)));

    }
    public function changeIndexToId()
    {
        $sql = OperatoreSql::getChangeIndexToIdAlter();
        $stmt = parent::executeStmt($sql);

        if ($stmt->sqlstate === '00000') return true;
        else return $stmt->error;
    }
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
function getTipologiePratica()
{
    $sql = getTipologiePraticaSelect();
    return getStmtResult($sql);
}
function getOperatoreCedServizi($id_operatore)
{

    if (NEED_CREATE_TABLES) {
        create_servizio_operatori_ced_table();
    }

    $sql = getOperatoreCedServiziSelect();
    return getStmtResult($sql, array('types' => 's', 'vars' => array($id_operatore)));
}
function getServizi()
{

    if (NEED_CREATE_TABLES) {
        create_servizi_table();
    }

    $sql = getServiziSelect();
    return getStmtResult($sql);
}
function getUfficioByOperatore($id_operatore)
{
    $sql = getUfficioByOperatoreSelect();
    return getStmtResult($sql, array('types' => 's', 'vars' => array($id_operatore)));
}

function getUtentiOperatoreCed($id_operatore_ced)
{
    $sql = getUtentiOperatoreCedSelect();
    return getStmtResult($sql, array('types' => 's', 'vars' => array($id_operatore_ced)));
}
function getUtentiByUfficio($id_ufficio)
{
    $sql = getUtentiByUfficioSelect();
    return getStmtResult($sql, array('types' => 's', 'vars' => array($id_ufficio)));
}
function getOperatoreCedByOperatore($id_operatore)
{
    $sql = getOperatoreCedByOperatoreSelect();
    return getStmtResult($sql, array('types' => 's', 'vars' => array($id_operatore)));
}
function getOperatoriCedResult($extraParam = false)
{
    $sql = getOperatoriCedSelect($extraParam);
    return getStmtResult($sql, array('types' => 'sss', 'vars' => array('', '', '')));
}
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
function updateOperatoreCedServizio($id_operatore_ced, $id_operatore, $id_servizio)
{
    $sql = getOperatoreCedServizioUpdate();
    executeStmt($sql, array('types' => 'sss', 'vars' => array($id_operatore_ced, $id_operatore, $id_servizio)));
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

/** FATTO */

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
