<?php

class Ufficio extends FPDatabase
{
    protected $id;
    public function __construct($id)
    {
        $this->id = $id;
    }
    public function getUtenti()
    {
        $sql = UfficioSql::getUtenti();
        return parent::getStmtResult($sql, array('types' => 's', 'vars' => array($this->id)));
    }
    public function getPratiche() {
        global $livello;
        $sql = UfficioSql::getPratiche();
        if ($livello > 0) return parent::getStmtResult($sql, array('types' => 's', 'vars' => array($this->id)));
        else return parent::getStmtResult($sql);
    }
    public function getPraticheByTipologia($tipologia) {
        global $livello;
        $sql = UfficioSql::getPraticheByTipologia();
        if ($livello > 0) return parent::getStmtResult($sql, array('types' => 'ss', 'vars' => array($this->id, $tipologia)));
        else return parent::getStmtResult($sql, array('types' => 's', 'vars' => array($tipologia)));

    }

}
