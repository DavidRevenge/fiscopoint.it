<?php

class TipologiaPratica extends FPDatabase
{
    protected $id;
    public function __construct($id)
    {
        $this->id = $id;
    }
    public static function getAll()
    {
        $sql = TipologiaPraticaSql::getAllSelect();
        return parent::getStmtResult($sql);
    }
}
