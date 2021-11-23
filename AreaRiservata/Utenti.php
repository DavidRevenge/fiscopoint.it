<?php     

//var_dump($_SESSION);

    if($livello == 100) {
        echo "<script type=\"text/javascript\">window.location.replace(\"$sito\");</script>";
        return;
    } 
    // titolo della pagina
    $titolo_pagina = "Utenti";
    include("template/titolo_pagina.php");

    

    if(isset($_GET["oper"])) {
        $sql = "UPDATE utenti SET Stato = NOT Stato WHERE indice=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $_GET["id"]);
        $stmt->execute();
    }
    $cond = isset($_POST["cerca"]) ? $_POST["testo"] : "";  

?>

<div class="card p-2 m-2">  
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <form id="verifica_cf" action="<?php echo $sito ?>Area-Riservata/Aggiungi-Utente.html" method="POST"> 
                    <div class="row justify-content-start">                    
                        <div class="col-auto">
                            <input type="text" name="ver_cf" id="ver_cf" class="form-control" placeholder="Codice Fiscale" aria-describedby="" title="" value="" required>
                        </div>
                        <div class="col-auto">
                            <input type="submit" class="btn btn-primary" id="btn_add_user" value="Aggiungi Utente" >
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <form action="<?php echo $sito ?>Area-Riservata/Utenti.html" method="POST"> 
                    <div class="row justify-content-end">
                        <div class="col-auto">
                            <label for="cerca-operatore" class="col-form-label">Cerca Utente</label>
                        </div>
                        <div class="col-auto">
                            <input type="text" name="testo" class="form-control" placeholder="Trova codice fiscale" aria-describedby="" title="" value="<?php echo $cond ?>">
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
    <div class="card-title bg-dark text-white text-center"><h3>Lista Utenti</h3></div>
    <div class="card-body">
        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th scope="col">Nome e Cognome</th>
                    <th scope="col">Codice Fiscale</th>
                    <th scope="col">Data di Nascita</th>
                    <?php 
                        if($livello == 0 ) {
                            echo "<th scope=\"col\">Creato Da</th>";
                        }
                    ?>
                    <th scope="col">Azione</th>
                </tr>
            </thead>
            <tbody>   
        <?php   

        
        $opr = ($livello == 0) ? "" : "AND utenti.id_Operatore = $id_operatore";
            
        $sql = "SELECT utenti.*, utenti.id as utente_id, operatori.Nome as Operatore_Nome, operatori.Cognome as Operatore_Cognome, ";
        $sql .= "uffici.Sigla as Sigla_Ufficio, concat(utenti.Cognome, ' ' , utenti.Nome) as CognomeNome FROM utenti JOIN operatori ON ";
        $sql .= "utenti.id_Operatore = operatori.indice JOIN uffici ON uffici.id = operatori.Ufficio WHERE utenti.CodiceFiscale like concat('%', ?, '%') ";
        $sql .= $opr;

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $cond);    
        $stmt->execute();
        $result = $stmt->get_result(); 


        while ($row = $result->fetch_assoc()){
            $id = $row["utente_id"];
            $cognome_nome = $row["CognomeNome"];
            $cf = strtoupper($row["CodiceFiscale"]);
            $creato = "{$row["Operatore_Nome"]} {$row["Operatore_Cognome"]}" ;
            $datanascita =str_replace("/", " " , $row["DataNascita"]);
            $sigla = $row["Sigla_Ufficio"];
            //$Sigla = ($row["Sigla_Ufficio"] != 0) ? $row["Sigla_Ufficio"] : "";
            

            $status = "<a class=\"ms-2 btn btn-primary lista_operatori\" href=\"{$sito}Area-Riservata/Modifica-Utente-$id.html\">Modifica</a>";
            $status .= "<a class=\"ms-2 btn btn-primary lista_operatori\" href=\"{$sito}Area-Riservata/Pratiche-$id.html\">Pratiche</a>";
            echo "<tr> 
                    <td class=\"\">$cognome_nome</td>                    
                    <td>$cf</td>
                    <td>$datanascita</td>";
                    if ($livello == 0) { echo "<td>$creato<br>$sigla</td>"; }
                   echo "<td>$status</td>
                </tr>";
        }
        ?>

            </tbody>
        </table>
    </div>
</div>