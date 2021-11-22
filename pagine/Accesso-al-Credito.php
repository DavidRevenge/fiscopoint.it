<?php 
    // titolo della pagina
    $titolo_pagina = "Accesso al credito";
    include("template/titolo_pagina.php"); 
?>

<div class="m-3">
    <nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" href="#finalita" role="tab" aria-controls="nav-home" aria-selected="true">Finalità</a>
        <a class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" href="#PMI" role="tab" aria-controls="nav-profile" aria-selected="false">PMI</a>
        <a class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" href="#Privati" role="tab" aria-controls="nav-contact" aria-selected="false">Privati</a>
    </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="finalita" role="tabpanel" aria-labelledby="nav-home-tab">
            <h2 class="mt-3">Finalità del Servizio</h2>                       
            <p class="mt-3">        
                Grazie a degli accordi stipulati con società  di servizi aziendali, mettiamo a disposizione dei nostri clienti, servizi di assistenza per l’accesso ai bandi di finanziamenti agevolati in favore delle piccole e medie imprese, in particolare, forniamo attività di consulenza sui principali strumenti di finanza agevolata esistenti a livello territoriale; analisi delle opportunità esistenti; elaborazione e predisposizione del business plan; Presentazione del progetto finanziario; Istruttoria e monitoraggio degli stati di avanzamento.<br>
                <br>
                Inoltre mettiamo a disposizione, per il tramite dei nostri Point presenti sul territorio nazionale i servizi di Assistenza per favorire l’accesso al credito grazie alla Cooperativa di Garanzia fidi.<br>
                <br>
                L’attività della cooperativa di garanzia è infatti finalizzata alla prestazione delle garanzie necessarie per l’ottenimento della concessione di crediti a Medio Termine da parte di banche ed Istituti di Credito, come ad esempio:<br>
                - Aperture di credito su conto corrente;<br>
                - Aperture di credito per SBF;<br>
                <br>
                Sconto fatture e per crediti a medio – lungo termine (mutui chirografari ed ipotecari, Leasing).
            </p>        
        </div>
        <div class="tab-pane fade" id="PMI" role="tabpanel" aria-labelledby="nav-profile-tab">
            <?php include("pagine/PMI.php"); ?>
        </div>
        <div class="tab-pane fade" id="Privati" role="tabpanel" aria-labelledby="nav-contact-tab">
            <?php include("pagine/Privati.php"); ?>
        </div>
    </div>
</div>