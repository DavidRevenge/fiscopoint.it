<?php
function getOperatoriCedResult($extraParam = false) {
    global $conn;
    $cond = '';
    $sql = getOperatoriCedSelect($extraParam);
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $cond, $cond, $cond);
    $stmt->execute();
    $result = $stmt->get_result();

    return $result;
}
function getOperatoriCedEditResult($id) {
    global $conn;
    $sql = getOperatoriCedEditSelect();
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $id);
    $stmt->execute();

    return $stmt->get_result();
}
function updateOperatoriCedEdit($id, $insert, $val_par, $pm) {
    global $conn;
    $sql = getOperatoriCedEditUpdate($insert);

    $pm[] = $id;
    $val_par .= 'i';

    $stmt = $conn->prepare($sql);
    $stmt->bind_param($val_par, ...$pm);
    $stmt->execute();
}