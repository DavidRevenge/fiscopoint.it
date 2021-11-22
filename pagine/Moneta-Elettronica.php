<?php 
    // titolo della pagina
    $titolo_pagina = "Moneta elettronica";
    include("template/titolo_pagina.php"); 
?>




<div class="m-3">
    <nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" href="#finalita" role="tab" aria-controls="nav-home" aria-selected="true">Finalità</a>
        <a class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" href="#moneta-elettronica" role="tab" aria-controls="nav-profile" aria-selected="false">Servizi Online</a>
        <a class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" href="#servizi-point" role="tab" aria-controls="nav-contact" aria-selected="false">Servizi Point</a>
    </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="finalita" role="tabpanel" aria-labelledby="nav-home-tab">
            <h2 class="mt-3">Finalità del Servizio</h2>
            <p class="mt-3">             
                Questo servizio è rivolto sia alle persone fisiche, ditte individuali e/o società che hanno bisogno di una carta di debito e/o di un conto dedicato e diamo l’opportunità a strutture già esistenti o a start up di poter aprire un point per la gestione di moneta elettronica e/o per servizi di pagamento online e ricariche.
            </p>
        </div>
        <div class="tab-pane fade" id="moneta-elettronica" role="tabpanel" aria-labelledby="nav-profile-tab">
            <?php include("pagine/Servizi-Online.php"); ?>
        </div>
        <div class="tab-pane fade" id="servizi-point" role="tabpanel" aria-labelledby="nav-contact-tab">
            <?php include("pagine/point.php"); ?>
        </div>
    </div>
</div>