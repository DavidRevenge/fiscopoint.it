<?php
/**
 * 
 */

function create_servizi_table()
{
    global $conn;
    $sql = "CREATE TABLE IF NOT EXISTS `servizi` (
        `id` int NOT NULL AUTO_INCREMENT,
        `nome` varchar(45) DEFAULT NULL,
        PRIMARY KEY (`id`)
    )";

    $conn->query($sql);
}
function create_operatori_servizio_table()
{
    global $conn;
    $sql = "CREATE TABLE IF NOT EXISTS `operatori_servizio` (
        `id_operatore` INT NOT NULL,
        `id_servizio` INT NOT NULL);";

    $conn->query($sql);
}
function create_tipologia_pratica_table()
{
    global $conn;
    $sql = "CREATE TABLE IF NOT EXISTS `tipologia_pratica` (
        `id` int NOT NULL AUTO_INCREMENT,
        `nome` varchar(45) DEFAULT NULL,
        PRIMARY KEY (`id`)
      )";

    $conn->query($sql);
}
function create_sezioni_table()
{
    global $conn;
    $sql = "CREATE TABLE IF NOT EXISTS `sezioni` (
        `id` int NOT NULL AUTO_INCREMENT,
        `nome` varchar(45) DEFAULT NULL,
        PRIMARY KEY (`id`)
      )";

    $conn->query($sql);
}
function create_utenti_operatore_table($conn)
{
    $sql = "CREATE TABLE IF NOT EXISTS `utenti_operatore` (
            `id` int NOT NULL AUTO_INCREMENT,
            `id_operatore` int DEFAULT NULL,
            `id_utente` int DEFAULT NULL,
            PRIMARY KEY (`id`)
          )"; // ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;";

    $conn->query($sql);
}
function create_operatori_ced_table()
{
    global $conn;
    $sql = "CREATE TABLE IF NOT EXISTS `operatori_ced` (
        `id` bigint NOT NULL AUTO_INCREMENT,
        `Username` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `id_ced` bigint DEFAULT NULL,
        `id_operatore` bigint DEFAULT NULL,
        PRIMARY KEY (`id`)
      )";

    $conn->query($sql);
}
