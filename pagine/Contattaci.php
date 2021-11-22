<form class="p-3" action="" method="post">
    <div class="card p-3">
        <div class="card-header p-0">
            <div class="text-center py-2 titolo_pagina">                
                    <picture>
                        <source type="image/webp" srcset="<?php echo $sito ?>media/webp/contatta.webp">
                        <img src="<?php echo $sito ?>media/img/contatta.png" class="img-fluid" style="width: 30px;" alt="contatta"> 
                    </picture>                 
                <h3>Inviaci un messaggio</h3>                
            </div>
        </div>
        <div class="card-body p-3">
            <!--Body-->
            <div class="form-group">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text p-0">
                            <picture>
                                <source type="image/webp" srcset="<?php echo $sito ?>media/webp/nick.webp">
                                <img src="<?php echo $sito ?>media/img/nick.png" class="img-fluid" alt="nick"> 
                            </picture>  
                        </div>
                    </div>
                    <input type="text" class="form-control" name="nome" placeholder="Inserisci il tuo nome" required>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text p-0">
                            <picture>
                                <source type="image/webp" srcset="<?php echo $sito ?>media/webp/mail.webp">
                                <img src="<?php echo $sito ?>media/img/mail.png" class="img-fluid" alt="e-mail"> 
                            </picture> 
                        </div>
                    </div>
                    <input type="email" class="form-control" name="email" placeholder="Inserisci l'email" required>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text p-0">
                            <picture>
                                <source type="image/webp" srcset="<?php echo $sito ?>media/webp/messaggio.webp">
                                <img src="<?php echo $sito ?>media/img/messaggio.png" class="img-fluid" alt="messaggio"> 
                            </picture> 
                        </div>
                    </div>
                    <textarea name="messaggio" class="form-control" placeholder="Inserisci un messaggio" required style="height:300px;"></textarea>
                </div>
            </div>

            <div class="text-center">
                <input type="submit" value="Invia Messaggio" class="btn btn-primary py-2">
            </div>
        </div>

    </div>
</form>



