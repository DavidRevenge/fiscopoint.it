<?php 
    if($livello != 0) {
        echo "<script type=\"text/javascript\">window.location.replace(\"$sito\");</script>";
        return;
    } 
    // titolo della pagina
    $titolo_pagina = "Operatori_CED";
    include("template/titolo_pagina.php");

    $livelli_json = json_decode(file_get_contents("json/livelli.json"), true);

    if(isset($_GET["oper"])) {
        $sql = "UPDATE operatori SET Stato = NOT Stato WHERE indice=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $_GET["id"]);
        $stmt->execute();
    }
?>
<div class="card p-2 m-2">  
    <div class="card-body">
        <div class="row">
            <div class="col-md-3">
                <a class="btn btn-primary" href="<?php echo $sito ?>Area-Riservata/Aggiungi-Operatore_Ced.html">Aggiungi operatore CED</a>
            </div>
            <div class="col-md-9">
                <form action="<?php echo $sito ?>Area-Riservata/Operatori_Ced.html" method="POST"> 
                    <div class="row justify-content-end">
                        <div class="col-auto">
                            <label for="cerca-operatore" class="col-form-label">Cerca Operatore CED</label>
                        </div>
                        <div class="col-auto">
                            <input type="text" name="testo" class="form-control" aria-describedby="" title="">
                        </div>
                        <div class="col-auto">
                            <input type="hidden" name="cerca" value="cerca">
                            <button type="submit" class="btn btn-primary">Cerca</button>
                        </div>
                    </div>
                </form>    
            </div>
        </div>
    </div> 
</div>






<div class="card p-2 m-2">
    <div class="card-title bg-dark text-white text-center"><h3>Lista Operatori CED</h3></div>
    <div class="card-body">
        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th scope="col">Username</th>
                    <th scope="col">Operatore</th>
                    <th scope="col">Email</th>
                    <td scope="col">Livello</th>
                    <th scope="col">Azione</th>
                </tr>
            </thead>
            <tbody>   
        <?php   

        
        $cond = isset($_POST["cerca"]) ? $_POST["testo"] : "";      
        $sql = "SELECT * FROM `operatori_ced` WHERE (Username like CONCAT('%', ?, '%') OR Nome like CONCAT('%', ?, '%') OR Cognome like CONCAT('%', ?, '%')) AND id > 1";
        $stmt = $conn->prepare($sql);  
        $stmt->bind_param("sss", $cond, $cond, $cond);    
        $stmt->execute();
        $result = $stmt->get_result(); 


        while ($row = $result->fetch_assoc()){
            $id = $row["indice"];
            $username = $row["Username"];
            $nome = $row["Nome"];
            $cognome = $row["Cognome"];
            $email = $row["Email"];
            $liv = $livelli_json[$row["Livello"]]["descrizione"];
            $stato = $row["Stato"];
            

            $status = ($stato) ? "<a href=\"{$sito}Area-Riservata/Operatori_Ced-$id.html\" class=\"btn btn-primary\">Disabilita</a>" : "<a href=\"{$sito}Area-Riservata/Operatori_Ced-$id.html\" class=\"btn btn-primary\">Abilita</a>";
            $status .= "<a class=\"ms-2 btn btn-primary lista_operatori_Ced\" href=\"{$sito}Area-Riservata/Modifica-Operatore_Ced-$id.html\">Modifica</a>";
            $row_color = (!$stato) ? "bg-danger text-white" : "";
            echo "<tr class=\"$row_color\" > 
                    <td>$username</td>
                    <td class=\"\">$nome $cognome</td>
                    <td>$email</td>
                    <td>$liv</td>
                    <td>$status</td>
                </tr>";
        }
        ?>

            </tbody>
        </table>
    </div>
</div>