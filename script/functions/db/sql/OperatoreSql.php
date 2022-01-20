<?php
class OperatoreSql {
    
   public static function getOperatoreCedServiziSelect()
   {
       $sql = "SELECT * from servizio_operatori_ced WHERE id_operatore = ?";
       return $sql;
   } 
    public static function getServizioInsert() {
        $sql = "INSERT INTO operatori_servizio (id_operatore, id_servizio)
                 VALUES (?, ?);";
        return $sql;
    }
    public static function getServiziSelect() {
        $sql = "SELECT * from operatori_servizio WHERE id_operatore = ?;";
        return $sql;
    }    
    public static function getChangeIndexToIdAlter() {
        $sql = "
            ALTER TABLE `operatori` 
            CHANGE COLUMN `indice` `id` BIGINT NOT NULL AUTO_INCREMENT
        ";
        return $sql;
    }
    public static function getServizioDelete() {
        $sql = "DELETE FROM operatori_servizio
                WHERE id_operatore = ? AND id_servizio = ?";
        return $sql;
    }
    public static function getUfficioSelect() {
        $sql = "SELECT Ufficio
                FROM operatori
                WHERE id = ?;";
        return $sql;
    }
    public static function getOperatoreCedSelect() {
        $sql = "SELECT `operatori_ced`.`id`,
                `operatori_ced`.`Username`,
                `operatori_ced`.`id_ced`,
                `operatori_ced`.`id_operatore` 
                FROM operatori_ced
                WHERE id_operatore = ?;";
        return $sql;
    }
}