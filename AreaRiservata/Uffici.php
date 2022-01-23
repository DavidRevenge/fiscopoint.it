<?php     
    if($livello == 100) {
        echo "<script type=\"text/javascript\">window.location.replace(\"$sito\");</script>";
        return;
    } 


     //breadcrumb
     unset($_SESSION['breadcrumb']);

     // titolo della pagina
     $titolo_pagina = "Uffici";
     include("template/titolo_pagina.php");
     include("template/breadcrumb.php");
     
     //breadcrumb
     $_SESSION['breadcrumb'] = array($titolo_pagina => 'Area-Riservata/'.$titolo_pagina.'.html');

?>
<div class="card p-2 m-2">  
    <div class="card-body">
        <div class="row">
            <div class="col-md-3">
                <a class="btn btn-primary" href="<?php echo $sito ?>Area-Riservata/Aggiungi-Ufficio.html">Aggiungi Ufficio</a>
            </div>
            <div class="col-md-9">
                <form action="<?php echo $sito ?>Area-Riservata/Uffici.html" method="POST"> 
                    <div class="row justify-content-end">
                        <div class="col-auto">
                            <label for="cerca-operatore" class="col-form-label">Cerca Ufficio</label>
                        </div>
                        <div class="col-auto">
                            <input type="text" name="testo" class="form-control" placeholder="Inserisci sigla" aria-describedby="" title="">
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
    <div class="card-title bg-dark text-white text-center"><h3>Lista Uffici</h3></div>
    <div class="card-body">
        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th scope="col">Sigla</th>
                    <th scope="col">Indirizzo</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Azione</th>
                </tr>
            </thead>
            <tbody>   
        <?php   

        
        $cond = isset($_POST["cerca"]) ? $_POST["testo"] : "";      
        $sql = "SELECT * FROM uffici WHERE Sigla like concat('%', ?, '%') AND id != 0";
        $stmt = $conn->prepare($sql);     
        $stmt->bind_param("s", $cond);
        $stmt->execute();
        $result = $stmt->get_result(); 


        while ($row = $result->fetch_assoc()){
            $id = $row["id"];
            $sigla = $row["Sigla"];
            $indirizzo = $row["Indirizzo"];
            $localita = $row["Localita"];
            $cap = $row["Cap"];
            $email = $row["Email"];
            $telefono = $row["Telefono"];
            
            $status = "<a class=\"ms-2 btn btn-primary lista_operatori\" href=\"{$sito}Area-Riservata/Modifica-Ufficio-$id.html\">Modifica</a>";

             echo "<tr> 
                    <td>$sigla</td>
                    <td class=\"\">$indirizzo<br><small>$cap $localita</small></td>
                    <td>$email</td>
                    <td>$telefono</td>
                    <td>$status</td>
                </tr>";
        }
        ?>
            </tbody>
        </table>
    </div>
</div>