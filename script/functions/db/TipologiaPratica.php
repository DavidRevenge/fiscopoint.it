<?php
require_once 'FPDatabase.php';
require_once 'sql/TipologiaPraticaSql.php';
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
        return parent::getStmtResultStatic($sql);
    }
}
