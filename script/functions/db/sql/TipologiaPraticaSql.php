<?php
class TipologiaPraticaSql {       
    public static function getAllSelect() {
        $sql = "SELECT id, nome, id_sezione from tipologia_pratica";
        return $sql;
    }
}