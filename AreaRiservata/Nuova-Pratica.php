<?php
    if($livello != 0) { 
        echo "<script type=\"text/javascript\">window.location.replace(\"$sito\");</script>";
        return;        
    } 
    // titolo della pagina
    $titolo_pagina = "Nuova pratica";    
    include("template/titolo_pagina.php");

    $pratiche = json_decode(file_get_contents("json/pratiche.json"), true);    
    $id_operatore = $_SESSION["id_operatore"];
    $protocollo = "$id_operatore-" . time();
    


?>

<div class="card p-2 m-2">  
    <div class="card-body">
        <div class="row">
            <div class="col-md-3">
                Pratica di <?php //echo "$nome $cognome" ?> 
            </div>
            <div class="col-md-9">
                <form action="<?php echo $sito ?>Area-Riservata/Pratiche.html" method="POST"> 
                    <div class="row justify-content-end">
                        <div class="col-auto">
                            <label for="cerca-operatore" class="col-form-label">Ricerca Protocollo</label>
                        </div>
                        <div class="col-auto">
                            <input type="text" name="testo" class="form-control" placeholder="Inserisci codice fiscale" aria-describedby="" title="">
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

