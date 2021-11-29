<?php 
    // titolo della pagina
    $titolo_pagina = "Servizi di patronato";
    include("template/titolo_pagina.php"); 
?>

<div class="m-3">
    <div class="row">
        <div class="col-3">
            <nav>
                <div class="nav flex-column nav-pills" id="nav-tab" role="tablist">
                    <a class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" href="#finalita" role="tab" aria-controls="nav-home" aria-selected="true">Regole per presa pratiche</a>
                    <a class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" href="#PMI" role="tab" aria-controls="nav-profile" aria-selected="false">Documentazione da richiedere</a>
                    <a class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" href="#Privati" role="tab" aria-controls="nav-contact" aria-selected="false">Moduli</a>
                    
                </div>            
            </nav>
        </div>
        <div class="col-9">
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="finalita" role="tabpanel" aria-labelledby="nav-home-tab">                  
                    <!-- --------------------------------- -->                      
                    <!-- Sezione Regole per presa pratiche -->
                    <!-- --------------------------------- --> 
                    <p class="mt-3">        
                    Al fine di una buona collaborazione la preghiamo di attenersi ad alcune regole per un lavoro di qualità,<br>
                    <br>
                    <strong>PERTANTO SI RACCOMANDA DI RISPETTARE QUANTO SEGUE:</strong>
                    <br>
                    <ul>
                        <li>Le pratiche devono pervenire alla nostra sede (tramite email: assistenzapatronato.carraresi@gmail.com) almeno 5 giorni LAVORATIVI 
                        prima della scadenza, altrimenti saranno scartate.<br>
                        <br>
                        <li>Il <a href="<?php echo $sito ?>Generici/2019/11/MANDATO-ENASC.pdf" target="_blank">mandato</a> del patronato ENASC va compilato solo ed esclusivamente nella parte anagrafica (nome, cognome, luogo e data di nascita, 
                        sesso, residenza, codice fiscale, cittadinanza) le informazioni riguardanti la pratica vanno riportate nel <a href="<?php echo $sito ?>media/PDF/18.pdf" target="_blank">Mod. 18.</a><br>
                        <br>
                        <li>Le pratiche vanno inoltrate solo ed esclusivamente a completamento della documentazione, attenendosi alla lista dei documenti allegata.<br>
                        <br>
                        <li>Per ogni pratica va compilato obbligatoriamente, ove richiesto nell’elenco della documentazione, il Mod. allegati in ogni suo campo,<br>
                        per le pratiche dove il modello non è richiesto è comunque OBBLIGATORIO compilare il <a href="<?php echo $sito ?>media/PDF/18.pdf" target="_blank">Mod. 18.</a><br>
                        <br>
                    </ul>
                    <i>Per agevolare e velocizzare il nostro lavoro:</i><br>
                    <br>
                    <ul>
                        <li>Per ogni documento caricato, va creato un file.<br>
                        <br>
                        <li>I file caricati vanno rinominati per contenuto (ES: se si allega una carta d’identità, si rinominerà “documento”.)<br>
                        <br>
                        <li><i>Per ogni pratica va compilato il mandato di assistenza, la liberatoria <a href="<?php echo $sito ?>Generici/2019/11/LIBERATORIA-PRIVACY.pdf" target="_blank">PRIVACY</a> e il Mod. 18 del patronato.</i><br>
                        <br>
                    </ul>
                    <strong>
                    N.B.<br>
                    A SCADENZA BIMESTRALE LE PRATICHE DOVRANNO PERVENIRE ALLA SEDE CENTRALE CON IL 
                    MANDATO DEL PATRONATO ENASC FIRMATO IN ORIGINALE.
                    </strong>
                    </p> 
                    <!-- -------------------------------------- --> 
                    <!-- Fine Sezione Regole per presa pratiche --> 
                    <!-- -------------------------------------- -->       
                </div>
                <div class="tab-pane fade" id="PMI" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <!-- --------------------------------- -->                      
                    <!-- Sezione Documentazione da richiedere -->
                    <!-- --------------------------------- --> 
                    
                    <p class="mt-3" style="line-height:30px;"> 
                        <a href="<?php echo $sito ?>Area-Riservata/Invalidita-Inabilita.html">INVALIDITA&#8217; ED INABILITA&#8217;</a><br>
                        <a href="<?php echo $sito ?>Area-Riservata/Maternita.html">MATERNITA&#8217;</a><br>
                        <a href="<?php echo $sito ?>Area-Riservata/Pensione-ed-assegno-sociale.html">PENSIONE ED ASSEGNO SOCIALE</a><br>
                        <a href="<?php echo $sito ?>Area-Riservata/Naspi.html">NASPI</a><br>
                        <a href="<?php echo $sito ?>Area-Riservata/Anf.html">ANF</a><br>
                        <a href="<?php echo $sito ?>Area-Riservata/Dimissioni-online.html">DIMISSIONI ONLINE</a><br>
                        <a href="<?php echo $sito ?>Area-Riservata/Altre-pratiche-di-patronato.html">ALTRE PRATICHE DI PATRONATO</a><br>
                    </p> 
                    
                    <!-- -------------------------------------- --> 
                    <!-- Fine Sezione Documentazione da richiedere --> 
                    <!-- -------------------------------------- -->    
                </div>
                <div class="tab-pane fade" id="Privati" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <!-- --------------------------------- -->                      
                    <!-- Sezione Moduli -->
                    <!-- --------------------------------- --> 
                    <p class="mt-3 " style="line-height:30px;"> 
                        <a href="<?php echo $sito ?>Generici/2019/11/AP23_Rate_mat_non_risc.pdf" target="_blank" rel="noopener">AP 23</a><br>
                        <a href="<?php echo $sito ?>Generici/2019/11/AP70_mod_autocert.pdf" target="_blank" rel="noopener">AP 70</a><br>
                        <a href="<?php echo $sito ?>Generici/2019/11/Modulo-autodichiarazione_Anf.pdf" target="_blank" rel="noopener">Autodichiarazione ANF</a><br>
                        <a href="<?php echo $sito ?>Generici/2019/11/Modulo-autodichiarazione_Naspi.pdf" target="_blank" rel="noopener">Autodichiarazione NASPI</a><br>
                        <a href="<?php echo $sito ?>Generici/2019/11/LIBERATORIA-PRIVACY.pdf" target="_blank" rel="noopener">Liberatoria Privacy</a><br>
                        <a href="<?php echo $sito ?>Generici/2019/11/MANDATO-ENASC.pdf" target="_blank" rel="noopener">Mandato ENASC</a><br>
                        <a href="<?php echo $sito ?>media/PDF/18.pdf" target="_blank" rel="noopener">Presa Pratica</a><br>
                        <a href="<?php echo $sito ?>Generici/2019/11/SR16.pdf" target="_blank" rel="noopener">SR 16</a><br>
                        <a href="<?php echo $sito ?>media/PDF/SR188.pdf" target="_blank" rel="noopener">SR 188</a><br>
                        <a href="<?php echo $sito ?>Generici/2019/11/SS3.pdf" target="_blank" rel="noopener">SS3</a><br>
                        <a href="<?php echo $sito ?>media/PDF/Recesso.pdf" target="_blank" rel="noopener">Modulo Recesso Rapporto di Lavoro</a><br>
                    </p> 
                    <!-- -------------------------------------- --> 
                    <!-- Fine Sezione Moduli --> 
                    <!-- -------------------------------------- -->   
                </div>
            </div>
        </div>
    </div>
</div>