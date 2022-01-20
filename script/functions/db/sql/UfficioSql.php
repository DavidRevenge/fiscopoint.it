<?php
class UfficioSql {       
    public static function getUtentiSelect() {
        $sql = "SELECT u.*, u.id as utente_id, concat(u.Nome, ' ' , u.Cognome) as NomeCognome, u.CodiceFiscale, u.DataNascita,
                o.Nome as Operatore_Nome, o.Cognome as Operatore_Cognome, uffici.Sigla as Sigla_Ufficio FROM operatori as o
                JOIN utenti_operatore AS uo ON uo.id_operatore = o.id
                JOIN utenti AS u ON u.id = uo.id_utente
                JOIN uffici ON uffici.id = o.Ufficio
                WHERE Ufficio = ?;";
        return $sql;
    }
}