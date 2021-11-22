<?php
    if($livello != 100) {
        echo "<script type=\"text/javascript\">window.location.replace(\"$sito\");</script>";
        return;
    } 

    if(isset($_POST["Username"])) {   
        $username = $_POST["Username"];
        $password = $_POST["Password"];
        $sql = "SELECT * FROM operatori WHERE Username = ? AND Stato = 1 LIMIT 1";
        $stmt = $conn->prepare($sql);   
        $stmt->bind_param("s", $username);       
        $stmt->execute();
        $result = $stmt->get_result(); 
        while ($row = $result->fetch_assoc()){
            $user = $row["Username"];
            $psw = $row["Password"];
            $livello = $row["Livello"];
            $servizi = $row["Servizi"];
            $id_operatore = $row["indice"];
        }


        if (isset($psw) and password_verify($password, $psw)) {
            $_SESSION["livello"] = $livello;
            $_SESSION["servizi"] = $servizi;
            $_SESSION["id_operatore"] = $id_operatore;
            echo "<script type=\"text/javascript\">window.location.replace(\"$sito\");</script>";
        }else{
            echo "
            <div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">
                <strong>nome utente o password errata o utente non abilitato</strong>.
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
            </div>";
        }
        
    }
    


?>

 

<?php 
    $titolo_pagina = "Login";
    include("template/titolo_pagina.php")

?>



<div class="row p-3">
    <p class="mt-3">        
        <form action="<?php echo $sito ?>Login.html" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label"><strong>Username</strong></label>
                <input type="text" class="form-control" id="username" name="Username" aria-describedby="username" placeholder="Inserisci l'username">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label"><strong>Password</strong></label>
                <input type="password" class="form-control" id="password" name="Password" autocomplete="new-password" placeholder="Inserisci la password">
            </div>
            <button type="submit" class="btn btn-primary">Accedi</button>
        </form>
    </p>
</div>