<?php
class PraticaSql
{    
    public static function rimuoviPraticaLavorata()
     {
         $sql = "DELETE FROM pratiche_lavorate
             WHERE id_pratica = ?";
         return $sql;
     }
    public static function getPraticaLavorata()
    {
        $sql = "SELECT `id_pratica`
        FROM pratiche_lavorate
        WHERE id_pratica = ?";
        return $sql;
    }
    public static function getLavoraPratica()
    {
        $sql = "INSERT INTO pratiche_lavorate (id_pratica)
        VALUES (?);";
        return $sql;
    }
}
