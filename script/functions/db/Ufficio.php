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
        $sql = UfficioSql::getUtentiSelect();
        return parent::getStmtResult($sql, array('types' => 's', 'vars' => array($this->id)));
    }

}
