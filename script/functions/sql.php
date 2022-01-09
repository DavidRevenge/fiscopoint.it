<?php
function getOperatoriCedSelect($extraParam = false) {
    $sql = "
        SELECT op_ced.id as id, op_ced.Username, op.Nome as NomeOperatore, op.Cognome as CognomeOperatore, ced.Sigla as SiglaCed FROM operatori_ced as op_ced
        JOIN operatori as op on op.indice = op_ced.id_operatore
        JOIN ced on ced.id = op_ced.id_ced
        WHERE (op_ced.Username like CONCAT('%', ?, '%') OR CONCAT(op.Nome, ' ', Op.Cognome) like CONCAT('%', ?, '%') OR ced.Sigla like CONCAT('%', ?, '%'))
    ";

    if (isset($extraParam['where'])){
        $sql .= ' ' . $extraParam['where'];
    }

    return $sql;
}
function getOperatoriCedEditSelect() {
    $sql = "
        SELECT id, Username, id_operatore, id_ced
        FROM operatori_ced
        WHERE id = ?
    ";

    return $sql;
}
function getOperatoriCedEditUpdate($fields) {

    $fields = explode(',', $fields);
    $update = '';

    foreach ($fields as $key => $value) {
        $length = count($fields);
        $comma = ($length > 1 && $key < ($length - 1)) ? ', ' : ' ';
        $update .= $value .' = ?'.$comma;
    }
    $sql = "
        UPDATE operatori_ced
        SET $update
        WHERE id = ?
    ";

    return $sql;
}