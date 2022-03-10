<?php

class Pratica extends FPDatabase
{
    protected $id;
    public function __construct($id = '')
    {
        $this->id = $id;
    }
   
    public function rimuoviPraticaLavorata()
    {
        $sql = PraticaSql::rimuoviPraticaLavorata();
        return parent::executeStmt($sql, array('types' => 's', 'vars' => array($this->id)));
    }
    public function lavoraPratica()
    {
        if (NEED_CREATE_TABLES) create_pratiche_lavorate_table();
        $sql = PraticaSql::getLavoraPratica();
        return parent::executeStmt($sql, array('types' => 's', 'vars' => array($this->id)));
    }
    public function getPraticaLavorata()
    {
        if (NEED_CREATE_TABLES) create_pratiche_lavorate_table();
        $sql = PraticaSql::getPraticaLavorata();
        return parent::getStmtResult($sql, array('types' => 's', 'vars' => array($this->id)));
    }
    public function getUtente()
    {
        $sql = PraticaSql::getUtente();
        return parent::getStmtResult($sql, array('types' => 's', 'vars' => array($this->id)));
    }    
}
