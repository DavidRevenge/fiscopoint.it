<?php

class OperatoreCed extends FPDatabase
{
    protected $id;
    public function __construct($id = '')
    {
        $this->id = $id;
    }
    public function getPratiche()
    {
        $sql = OperatoreCedSql::getPraticheSelect();
        return parent::getStmtResult($sql, array('types' => 's', 'vars' => array($this->id)));
    }
    public function getPraticheByUtente($id_utente)
    {
        $sql = OperatoreCedSql::getPraticheByUtenteSelect();
        return parent::getStmtResult($sql, array('types' => 'ss', 'vars' => array($id_utente, $this->id)));
    }
    function getUtenti()
    {
        $sql = OperatoreCedSql::getUtentiSelect();
        return parent::getStmtResult($sql, array('types' => 's', 'vars' => array($this->id)));
    }
    public function getOperatoriCedResult($extraParam = false)
    {
        $sql = OperatoreCedSql::getOperatoriCedSelect($extraParam);
        return parent::getStmtResult($sql, array('types' => 'sss', 'vars' => array('', '', '')));
    }
    public function getEdit()
    {
        $sql = OperatoreCedSql::getOperatoriCedEditSelect();
        return parent::getStmtResult($sql, array('types' => 's', 'vars' => array($this->id)));
    }
    public function updateEdit($insert, $val_par, $pm)
    {
        $sql = OperatoreCedSql::getOperatoriCedEditUpdate($insert);
        $pm[] = $this->id;
        $val_par .= 'i';
        parent::executeStmt($sql, array('types' => $val_par, 'vars' => $pm));
    }
    public function updateServizio($id_operatore, $id_servizio)
    {
        $sql = OperatoreCedSql::getServizioUpdate();
        parent::executeStmt($sql, array('types' => 'sss', 'vars' => array($this->id, $id_operatore, $id_servizio)));
    }
    public function insertServizio($id_operatore, $id_servizio)
    {
        $sql = OperatoreCedSql::getServizioInsert($id_operatore, $id_servizio, $this->id);
        return parent::getStmtResult($sql, array('types' => 'sss', 'vars' => array($id_operatore, $id_servizio, $this->id)));
    }
    public function deleteServizio($id_operatore, $id_servizio)
    {
        $sql = OperatoreCedSql::getServizioDelete();
        parent::executeStmt($sql, array('types' => 'sss', 'vars' => array($id_operatore, $id_servizio, $this->id)));
    }
}
