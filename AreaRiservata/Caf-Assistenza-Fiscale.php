<?php
    if($livello > 1) {
        echo "<script type=\"text/javascript\">window.location.replace(\"$sito\");</script>";
        return;
    } 
    
    // titolo della pagina
    $titolo_pagina = "Caf assistenza fiscale";
    include("template/titolo_pagina.php") ;
    
?>
<div class="row p-3">
    <div class="d-flex align-items-start">
        <div class="nav flex-column nav-tabs me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link active text-center" type="button" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
                <figure>
                    <figcaption></figcaption>
                    <picture>
                        <source type="img/webp" srcset="<?php echo $sito ?>media/webp/p730.webp">
                        <img src="<?php echo $sito ?>media/img/p730.png" class="img-fluid" style="" alt="">
                    </picture>
                </figure>
            </a>
            <a class="nav-link text-center" type="button" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="true">
                <figure>
                    <figcaption></figcaption>
                    <picture>
                        <source type="img/webp" srcset="<?php echo $sito ?>media/webp/pupf.webp">
                        <img src="<?php echo $sito ?>media/img/pupf.png" class="img-fluid" style="" alt="">
                    </picture>
                </figure>
            </a>
        </div>
        <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab"><?php include("AreaRiservata/p730pre.php");?> </div>
            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">2</div>
        </div>    
    </div>
</div>

