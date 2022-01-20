<?php
class ServizioSql {    
   
    public static function getAllSelect() {
        $sql = "SELECT * FROM servizi;";
        return $sql;
    }
}