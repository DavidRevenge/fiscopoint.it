<?php
class OperatoreCedSql
{
    public static function getPraticheSelect()
    {
        $sql = "SELECT `pratiche`.`id`,
            `pratiche`.`id_Operatore`,
            `pratiche`.`id_Utente`,
            `pratiche`.`Protocollo`,
            `pratiche`.`id_Pratica`,
            `pratiche`.`Data`,
            `pratiche`.`Note`
            FROM pratiche
            JOIN servizio_operatori_ced AS soc ON soc.id_servizio = pratiche.id_Pratica
            WHERE soc.id_operatore_ced = ?;";
        return $sql;
    }

    public static function getPraticheByUtenteSelect()
    {
        $sql = "SELECT pratiche.*, pratiche.id as idPratica, utenti.*, operatori.*
            FROM pratiche
            JOIN utenti ON utenti.id = pratiche.id_Utente
            JOIN operatori ON pratiche.id_Operatore = operatori.id
            JOIN servizio_operatori_ced AS soc ON soc.id_servizio = pratiche.id_Pratica
            WHERE id_utente = ?
            AND id_operatore_ced = ?
            ORDER BY data DESC;";
        return $sql;
    }

   public static function getServizioDelete()
    {
        $sql = "DELETE FROM servizio_operatori_ced
            WHERE id_operatore = ? AND id_servizio = ? AND id_operatore_ced = ?";
        return $sql;
    }

   public static function getServizioInsert()
    {
        $sql = "INSERT INTO servizio_operatori_ced (id_operatore, id_servizio, id_operatore_ced)
             VALUES (?, ?, ?);";
        return $sql;
    }

   public static function getUtentiSelect()
    {
        $sql = "SELECT `utenti`.`id` as utente_id,
            CONCAT(utenti.Nome, ' ', utenti.Cognome) as NomeCognome,
            `utenti`.`DataNascita`,
            `utenti`.`Email`,
            `utenti`.`Residenza`,
            `utenti`.`Localita`,
            `utenti`.`Cap`,
            `utenti`.`CodiceFiscale`,
            `utenti`.`PartitaIva`,
            `utenti`.`Telefono`,
            `utenti`.`Cellulare`,
            `utenti`.`Pec`,
            `utenti`.`Documento`,
            `utenti`.`Sigla`,
            `utenti`.`Scadenza`,
            `utenti`.`Rilasciato`,
            `utenti`.`DataRegistrazione`,
            `utenti`.`id_Operatore`,
            `operatori`.`Nome` as Operatore_Nome,
            `operatori`.`Cognome` as Operatore_Cognome,
            uffici.Sigla as Sigla_Ufficio
        FROM pratiche
        JOIN servizio_operatori_ced AS soc ON soc.id_servizio = pratiche.id_Pratica
        JOIN utenti ON utenti.id = pratiche.id_Utente
        JOIN operatori ON operatori.id = soc.id_operatore
        JOIN uffici ON uffici.id = operatori.Ufficio
        WHERE id_operatore_ced = ?;";
        return $sql;
    }
   public static function getOperatoriCedSelect($extraParam = false)
    {
        $sql = "
        SELECT op_ced.id as id, op_ced.Username, op.Nome as NomeOperatore, op.Cognome as CognomeOperatore, ced.Sigla as SiglaCed FROM operatori_ced as op_ced
        JOIN operatori as op on op.id = op_ced.id_operatore
        JOIN ced on ced.id = op_ced.id_ced
        WHERE (op_ced.Username like CONCAT('%', ?, '%') OR CONCAT(op.Nome, ' ', Op.Cognome) like CONCAT('%', ?, '%') OR ced.Sigla like CONCAT('%', ?, '%'))
    ";

        if (isset($extraParam['where'])) {
            $sql .= ' ' . $extraParam['where'];
        }

        return $sql;
    }
   public static function getOperatoriCedEditSelect()
    {
        $sql = "
        SELECT id, Username, id_operatore, id_ced
        FROM operatori_ced
        WHERE id = ?
    ";
        return $sql;
    }

   public static function getServizioUpdate()
    {
        $sql = "
        UPDATE servizio_operatori_ced
        SET id_operatore_ced = ?
        WHERE id_operatore = ?
        AND id_servizio = ?
    ";
        return $sql;
    }
   public static function getOperatoriCedEditUpdate($fields)
    {

        $fields = explode(',', $fields);
        $update = '';

        foreach ($fields as $key => $value) {
            $length = count($fields);
            $comma = ($length > 1 && $key < ($length - 1)) ? ', ' : ' ';
            $update .= $value . ' = ?' . $comma;
        }
        $sql = "
        UPDATE operatori_ced
        SET $update
        WHERE id = ?
    ";

        return $sql;
    }
}
