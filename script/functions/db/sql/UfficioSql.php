<?php
class UfficioSql {
    private static $tipologia = 'id_Pratica';
    public static function getUtenti() {
        $sql = "SELECT u.*, u.id as utente_id, concat(u.Nome, ' ' , u.Cognome) as NomeCognome, u.CodiceFiscale, u.DataNascita,
                o.Nome as Operatore_Nome, o.Cognome as Operatore_Cognome, uffici.Sigla as Sigla_Ufficio FROM operatori as o
                JOIN utenti_operatore AS uo ON uo.id_operatore = o.id
                JOIN utenti AS u ON u.id = uo.id_utente
                JOIN uffici ON uffici.id = o.Ufficio
                WHERE Ufficio = ?;";
        return $sql;
    }
    public static function getPratiche() {
        global $livello;
        $opr = ($livello == 0) ? "" : " WHERE Ufficio = ?";

        $opr .= ' AND FROM_UNIXTIME(Data, \'%Y\') = ?';

        $sql = "SELECT FROM_UNIXTIME(Data, '%Y'), pratiche.*, pratiche.id as idPratica, operatori.*
        FROM pratiche
        JOIN operatori ON pratiche.id_Operatore = operatori.id
        $opr
        ORDER BY data DESC;";
        return $sql;
    }
    public static function getPraticheByTipologia() {
        global $livello;
        $opr = ($livello == 0) ? 'WHERE '.UfficioSql::$tipologia.' = ? ' : ' WHERE Ufficio = ? AND '.UfficioSql::$tipologia.' = ?';

        $opr .=  ' AND FROM_UNIXTIME(Data, \'%Y\') = ?';

        $sql = "SELECT FROM_UNIXTIME(Data, '%Y') as data_pratica, pratiche.*, pratiche.id as idPratica, operatori.*
        FROM pratiche
        JOIN operatori ON pratiche.id_Operatore = operatori.id 
        $opr
        ORDER BY data DESC;";
        return $sql;
    }
}