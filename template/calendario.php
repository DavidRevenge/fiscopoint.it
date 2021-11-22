<?php
    $mesi = array("Gennaio", "Febbraio", "Marzo", "Aprile","Maggio","Giugno","Luglio","Agosto","Settembre","Ottobre","Novembre","Dicembre");
?>
<div class="d-flex bd-highlight">
    <div class="flex-fill bd-highlight">
        <div class="col-auto">
            <small><strong>Giorno</small></strong>
            <select name="<?php echo $giorno ?>" class="form-select" aria-describedby="" title=""> 
                <?php echo $val_giorno; ?> 
            <?php
                for($x=1; $x<=31; $x++) echo "<option value=\"$x\">$x</option>";
            ?>
            </select>
        </div>
    </div>
    <div class="flex-fill bd-highlight">
        <div class="col-auto ps-1">
            <small><strong>Mese</small></strong>
            <select name="<?php echo $mese ?>" class="form-select" aria-describedby="" title="">  
                <?php echo $val_mese; ?> 
            <?php
                foreach($mesi as $mese) echo "<option value=\"$mese\">$mese</option>";
            ?>
            </select>         
        </div>
    </div>
    <div class="flex-fill bd-highlight">
        <div class="col-auto ps-1">
            <small><strong>Anno</small></strong>
            <input type="number" name="<?php echo $anno ?>" value="<?php echo $val_anno ?>" class="form-control" placeholder="Inserisci anno di nascita" aria-describedby="" title="" minlength="4" maxlength="4">            
        </div>
    </div>
</div>