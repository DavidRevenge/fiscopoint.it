<?php
class FPDatabase
{
    public function prepareAndBind($sql, $bind = array())
    {
        global $conn;
        $stmt = $conn->prepare($sql);
        if (!empty($bind)) {
            $stmt->bind_param($bind['types'], ...$bind['vars']);
        }

        return $stmt;
    }
    public function executeStmt($sql, $bind = array())
    {
        $stmt = $this->prepareAndBind($sql, $bind);
        if (!$stmt) {
            return false;
        } else {
            $stmt->execute();
        }

        return $stmt;
    }
    public function getStmtResult($sql, $bind = array())
    {
        $stmt = $this->executeStmt($sql, $bind);
        return $stmt->get_result();
    }
    public static function prepareAndBindStatic($sql, $bind = array())
    {
        global $conn;
        $stmt = $conn->prepare($sql);
        if (!empty($bind)) {
            $stmt->bind_param($bind['types'], ...$bind['vars']);
        }

        return $stmt;
    }
    public static function getStmtResultStatic($sql, $bind = array())
    {
        $stmt = FpDAtabase::executeStmtStatic($sql, $bind);
        return $stmt->get_result();
    }
    public static function executeStmtStatic($sql, $bind = array())
    {        
        $stmt = FpDAtabase::prepareAndBindStatic($sql, $bind);
        if (!$stmt) {
            return false;
        } else {
            $stmt->execute();
        }

        return $stmt;
    }
}
