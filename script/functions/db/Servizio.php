<?php

class Servizio extends FPDatabase
{
    protected $id;
    public function __construct($id)
    {
        $this->id = $id;
    }

    public static function getAll()
    {

        if (NEED_CREATE_TABLES) {
            create_servizi_table();
        }

        $sql = ServizioSql::getAllSelect();
        return parent::getStmtResult($sql);
    }

}
