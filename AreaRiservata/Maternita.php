<?php 
    // titolo della pagina
    $titolo_pagina = "Maternità";
    include("template/titolo_pagina.php"); 
?>
<div class="row text-end">
	<div class="col-12">
		<a class="btn btn-primary mt-3" href="<?php echo $sito ?>Area-Riservata/Servizi-Patronato.html">Servizi Patronato</a>
	</div>
</div>
<div class="card mt-3">
	<div class="card-header"><font color="Blue"><i><b>Maternità</font></b></i></div>
	<div class="card-body">	
        <p>
            <!-- Maternità sotto ispettorato-->
        </p>
        <section>
            <details>
                <summary><b>Maternità sotto ispettorato</b></summary>
                <ul style="line-height:1.8;">
                    <li style="list-style-type: none;">
                    <ul>
                        <li>Foglio dell&#8217;ASL dei mesi a rischio o foglio del lavoro a rischio;</li>
                        <li>Documento di identità in corso di validità e tessera sanitaria <i>-se straniero permesso o carta di soggiorno-;</i></li>
                        <li>Busta paga;</li>
                        <li>Certificato del ginecologo con la data presunta del parto;</li>
                        <li>Numero di telefono Cellulare&ensp;<label><input name="phone" type="Tel" /></label></li>
                    </ul>
                    </li>
                </ul>
            </details>
        </section>
        <hr />
        <p>
            <!-- Maternità obbligatoria -->
        </p>
        <section>
            <details>
                <summary><b>Maternità obbligatoria</b></summary>
                <ul style="line-height:1.8;">
                    <li style="list-style-type: none;">
                    <ul>
                        <li>Documento di identità in corso di validità e tessera sanitaria <i>-se straniero permesso o carta di soggiorno-;</i></li>
                        <li>Busta paga;</li>
                        <li>Certificato del ginecologo con la data presunta del parto;</li>
                        <li>Numero di telefono Cellulare&ensp;<label><input name="phone" type="Tel" /></label></li>
                        <li style="list-style-type: none;">
                            <p><b>POSSIBILITA&#8217;:</b> &#8211; 2 Mesi prima e 3 dopo il parto; &#8211; 1 mese prima e 4 dopo il parto &#8211; Flessibilità <i>solo con il certificato dell&#8217;ASL</i></p>
                            <p><b>N.B.: Per chi ha i contributi a gestione separata (esempio COCOCO, COCOPRO E COLF) serve l&#8217;IBAN del C/C e il modello <a href="<?php echo $sito ?>media/PDF/SR188.pdf" target="_blank"><em><span style="color: #0000ff;">SR 188</span></em></a></b> <i>se il conto è online serve il documento rilasciato on line dalla procedura di collegamento al conto nel quale appare l&#8217;intestazione</i></p>
                            <h4>Dopo la nascita:</h4>
                        </li>
                        <li>certificato di nascita;</li>
                        <li>Codice Fiscale del neonato;</li>
                        <li>Codice Fiscale di entrambi i genitori e gli indirizzi di residenza<br /><i><b>&#8211; Se straniero permesso o carta di soggiorno &#8211;</b></i></li>
                        <li>Numero di telefono Cellulare&ensp;<label><input name="phone" type="Tel" /></label></li>
                    </ul>
                    </li>
                </ul>
            </details>
        </section>
        <hr />
        <p>
            <!-- Congedo parentale -->
        </p>
        <section>
            <details>
                <summary><b>Congedo parentale</b><br><b><i>&#8211; 180 giorni anche in periodi frazionati &#8211;</i></b></summary>
                <ul style="line-height:1.8;">
                    <li style="list-style-type: none;">
                    <ul>
                        <li>Documento di identità in corso di validità e tessera sanitaria di entrambi i genitori e gli indirizzi di residenza;<br /><i><b>&#8211; se straniero permesso o carta di soggiorno &#8211;</b></i></li>
                        <li>Data della fine della maternità obbligatoria &ensp;<label><input name="Data" type="date" /></label></li>
                        <li>Busta paga;</li>
                        <li>Codice Fiscale del figlio/a;</li>
                        <li>Periodo che richiede dal ______ al ______<br /><i><b>&#8211; 180 giorni in tutto &#8211;</b></i></li>
                        <li>Dell&#8217;altro genitore:</li>
                        <li style="list-style-type: none;">
                            <ul>
                                <li>Attività lavorativa</li>
                                <li>Nel caso avesse fruito dei giorni, fornire documentazione che lo attesta<br /><i><b>&#8211; Quanti e quali giorni ha preso fino ad oggi? &#8211;</b></i></li>
                            </ul>
                        </li>
                        <li>Nel caso di minori adottati:</li>
                        <li style="list-style-type: none;">
                            <ul>
                                <li>N° provvediamento e tribunale che lo ha emesso <i>(omologa adozione)</li>
                                <li>Data ingresso in Italia<br><label><input name="Data" type="date" /></label></li>
                                <li>Data ingresso in famiglia<br><label><input name="Data" type="date" /></label></li>
                            </ul>
                        </li>
                        <li><label>Numero di telefono Cellulare&ensp;<input name="phone" type="Tel" /></label></li>
                    </ul>
                    </li>
                </ul>
            </details>
        </section>
    </div>
</div>
<div class="card mt-3 mb-3">
	<div class="card-header"><font color="Blue"><i><b>Agevolazioni</b></i></font></div>
	<div class="card-body">	
    <section>
        <details>
            <summary><b>Bonus Bebè</b><i>&#8211;Entro 90 gg. dalla nascita&#8211;</i>
            </summary>
            <ul style="line-height:1.8;">
                <li style="list-style-type: none;">
                    <ul>
                        <li>Documento di identità in corso di validità e tessera sanitaria del genitore titolare del conto corrente e convivente del minore<i>-se straniero permesso o carta di soggiorno-</i></li>
                        <li>Codice fiscale del minore;</li>
                        <li>Certificato o atto di nascita del minore;</li>
                        <li>Attestazione ISEE che non superi <b><u>€ 25.000</u></b><i>&#8211; e che riporti il nucleo familiare compreso il neonato &#8211;</i></li>
                        <li>IBAN c/c intestato al genitore richiedente</li>
                        <li><a href="<?php echo $sito ?>media/PDF/SR188.pdf"target="_blank"><em><strong><span style="color: #0000ff;">Modello SR 188</span></strong></em></a>
                        <i>&#8211; Se il conto è online serve il documento rilasciato on line dalla procedura di collegamento al conto nel quale appare l&#8217;intestazione &#8211;</i></li>
                        <li>Numero di telefono Cellulare&ensp;<label><input name="phone" type="Tel" /></label></li>
                    </ul>
                </li>
            </ul>
        </details>
    </section>
    <hr />
    <!-- Premio alla nascita -->
    <section>
        <details>
            <summary><b>Premio alla nascita</b><i>&#8211;dal 7° mese compiuto di gravidanza o dopo la nascita, e ntro un anno dall&#8217;evento&#8211;</i>
            </summary>
            <ul style="line-height:1.8;">
                <li style="list-style-type: none;">
                    <ul>
                        <li style="list-style-type: none;">
                            <h4>Prima della nascita</h4>
                        </li>
                        <li><b>Della mamma<b></b></b></li>
                        <li style="list-style-type: none;">
                            <ul>
                                <li>Documento di identità in corso di validità e tessera sanitaria;<i>-se straniero permesso o carta di soggiorno-</i></li>
                                <li>Codice Fiscale;</li>
                                <li>Conto Corrente;</li>
                            </ul>
                        </li>
                        <li>Certificato medico con protocollo telematico attestante la settimana di gravidanza per le lavoratrici dipendenti;</li>
                        <li>Numero identificativo a 15 cifre e la data di rilascio di una prescrizione medica <b>&#8211; ricetta rossa &#8211;</b> con indicazione del codice di esenzione compreso <b>tra M31 e M42</b> per le disoccupate;</li>
                        <li>IBAN del c/c intestato alla richiedente;</li>
                        <li><a href="<?php echo $sito ?>media/PDF/SR188.pdf"target="_blank"><em><strong><span style="color: #0000ff;">Modello SR 188</span></strong></em></a>&ensp;<i>&#8211; Se il conto è online serve il documento rilasciato on line dalla procedura di collegamento al conto nel quale appare l&#8217;intestazione &#8211;</i></li>
                        <li>Numero di telefono Cellulare&ensp;<label><input name="phone" type="Tel" /></label></li>
                        <li style="list-style-type: none;">
                        <br>
                            <h4>Dopo la nascita:</h4>
                        </li>
                        <li><b>Della mamma<b></b></b></li>
                        <li style="list-style-type: none;">
                            <ul>
                                <li>Documento di identità in corso di validità e tessera sanitaria;<i>-se straniero permesso o carta di soggiorno-</i></li>
                                <li>Codice Fiscale;</li>
                                <li>Conto Corrente;</li>
                            </ul>
                        </li>
                        <li><b>Del minore<b></b></b></li>
                        <li style="list-style-type: none;">
                            <ul>
                                <li>Atto di nascita;</li>
                                <li>Codice Fiscale;</li>
                            </ul>
                        </li>
                        <li><a href="<?php echo $sito ?>media/PDF/SR188.pdf"target="_blank"><span style="color: #0000ff;"><em><strong>Modello SR 188</strong></em></span>&ensp;</a><i>&#8211; Se il conto è online serve il documento rilasciato on line dalla procedura di collegamento al conto nel quale appare l&#8217;intestazione &#8211;</i></li>
                        <li>Numero di telefono Cellulare&ensp;<label><input name="phone" type="Tel" /></label></li>
                    </ul>
                </li>
            </ul>
        </details>
    </section>
    <hr />
    <!-- Bonus asilo nido -->
    <section>
        <details>
            <summary><b>Bonus asilo nido</b></summary>
            <ul style="line-height:1.8;">
                <li style="list-style-type: none;">
                    <ul>
                        <li>Del genitore intestatario dei pagamenti del nido:</li>
                        <li style="list-style-type: none;">
                            <ul>
                                <li>Documento di identità in corso di validità e tessera sanitaria di entrambi i genitori e gli indirizzi di residenza;<i>&#8211; se straniero permesso o carta di soggiorno &#8211;</i></li>
                                <li>Codice fiscale;</li>
                            </ul>
                        </li>
                        <li>Del minore:</li>
                        <li style="list-style-type: none;">
                            <ul>
                                <li>Codice Fiscale;</li>
                            </ul>
                        </li>
                        <li>Iscrizione al nido;</li>
                        <li>tipologia asilo:</li>
                        <li style="list-style-type: none;">
                            <ul>
                                <li>Privato</li>
                                <li>Pubblico</li>
                                <li>Autorizzato</li>
                            </ul>
                        </li>
                        <li><i><b></b>Se privato autorizzato (*)</i></li>
                        <li style="list-style-type: none;">
                            <ul>
                                <li><i>Autorizzazione rilasciata con Provv. n°</i></li>
                                <li><i>Del</i></li>
                                <li><i>Adottato da</i></li>
                            </ul>
                        </li>
                        <li>Dati del nido:</li>
                        <li style="list-style-type: none;">
                            <ul>
                                <li>Denominazione;</li>
                                <li>Partita IVA;</li>
                                <li>Codice Fiscale;</li>
                            </ul>
                        </li>
                        <li>Ricevuta di pagamento del mese di <i>Settembre;</i><b>nella ricevuta ci devono essere i dati del genitore e i dati del minore</b></li>
                        <li><a href="<?php echo $sito ?>Generici/2019/11/SR163_Rich_Pag_Prest.pdf"target="_blank"><em><strong>Modello SR 163</strong></em></a><i>&#8211; Se il conto è online serve il documento rilasciato on line dalla procedura di collegamento al conto nel quale appare l&#8217;intestazione &#8211;</i></li>
                        <li style="list-style-type: none;"><b>* Per i nidi privati autorizzati è essenziale reperire il protocollo di autorizzazione, la data e da chi è stato adottato, i dati si possono chiedere al nido stesso.</b>
                        <i><u>Ogni mese dopo aver effettuato il pagamento il genitore lo deve trasmettere all&#8217;INPS attraverso il PIN dispositivo.</u></i></li>
                    </ul>
                </li>
            </ul>
        </details>
    </section>
    <hr />
    <!-- Voucher baby sitting / asilo nido entro 11 mesi dalla nascita -->
    <section>
        <details>
            <summary><b>Voucher baby sitting / Asilo nido entro 11 mesi dalla nascita</b></summary>
            <ul style="line-height:1.8;">
                <li style="list-style-type: none;">
                    <ul>
                        <li>Documento di identità in corso di validità e tessera sanitaria del dichiarante;<i>&#8211; se straniero permesso o carta di soggiorno &#8211;</i></li>
                        <li>Busta paga del dichiarante;</li>
                        <li>Datore di lavoro:</li>
                        <li style="list-style-type: none;">
                            <ul>
                                <li>PEC datore di lavoro;<i>l&#8217;accettazione della pratica arriva seulla PEC del datore di lavoro</i></li>
                                <li>Email;</li>
                                <li>Numero di telefono;</li>
                            </ul>
                        </li>
                        <li>Ultimo giorno di congedo di maternità obbligatoria<i>vedi proseguo maternità</i></li>
                        <li>Attestazione ISEE in corso di validità</li>
                        <li>Ha usufruito del congedo parentale? &#8211; 180 giorni &#8211;</li>
                        <li style="list-style-type: none;">
                            <ul>
                                <li>se si&#8230; quanti giorni?</li>
                            </ul>
                        </li>
                        <li>Quabti giorni di Voucher vuole prendere?;</li>
                        <li>Codice Fiscale altro genitore;</li>
                        <li>Residenza altro genitore<i>&#8211; se diversa dal dichiarante &#8211;</i></li>
                        <li>Busta paga altro genitore;</li>
                        <li>L&#8217;altro genitore ha usufruito del congedo parentale? &#8211; 180 gg. &#8211;</li>
                        <li style="list-style-type: none;">
                            <ul>
                                <li>Se si&#8230; quanti giorni?;</li>
                            </ul>
                        </li>
                        <li>Codice fiscale del minore</li>
                        <li><a href="<?php echo $sito ?>Generici/2019/11/SR163_Rich_Pag_Prest.pdf"target="_blank"><span style="color: #0000ff;"><em><strong>Modello SR 163</strong></em></span></a><i>&#8211; Se il conto è online serve il documento rilasciato on line dalla procedura di collegamento al conto nel quale appare l&#8217;intestazione &#8211;</i></li>
                    </ul>
                </li>
            </ul>
        </details>
    </section>
    </div>
</div>