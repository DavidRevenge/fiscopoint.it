<?php

class Operatore extends FPDatabase
{
    protected $id;
    public function __construct($id)
    {
        $this->id = $id;
    }
    
    public function getOperatoreCedServizi()
    {

        if (NEED_CREATE_TABLES) {
            create_servizio_operatori_ced_table();
        }

        $sql = OperatoreSql::getOperatoreCedServiziSelect();
        return parent::getStmtResult($sql, array('types' => 's', 'vars' => array($this->id)));
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
    public function getUfficio()
    {
        $sql = OperatoreSql::getUfficioSelect();
        return parent::getStmtResult($sql, array('types' => 's', 'vars' => array($this->id)));
    }
    public function changeIndexToId()
    {
        $sql = OperatoreSql::getChangeIndexToIdAlter();
        $stmt = parent::executeStmt($sql);

        if ($stmt->sqlstate === '00000') {
            return true;
        } else {
            return $stmt->error;
        }

    }
    public function getOperatoreCed()
    {
        $sql = OperatoreSql::getOperatoreCedSelect();
        return parent::getStmtResult($sql, array('types' => 's', 'vars' => array($this->id)));
    }
}
