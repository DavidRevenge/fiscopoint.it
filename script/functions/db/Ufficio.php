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

        $anno = isset($_POST['anno_filtro']) ? $_POST['anno_filtro'] : date('Y');

        if ($livello > 0) return parent::getStmtResult($sql, array('types' => 'ss', 'vars' => array($this->id, $anno)));
        else return parent::getStmtResult($sql, array('types' => 's', 'vars' => array($anno)));
    }
    public function getPraticheByTipologia($tipologia) {
        global $livello;
        $sql = UfficioSql::getPraticheByTipologia();

        $anno = isset($_POST['anno_filtro']) ? $_POST['anno_filtro'] : date('Y');

        if ($livello > 0) return parent::getStmtResult($sql, array('types' => 'sss', 'vars' => array($this->id, $tipologia, $anno)));
        else return parent::getStmtResult($sql, array('types' => 'ss', 'vars' => array($tipologia, $anno)));
    }

}
