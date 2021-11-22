
<?php 
// titolo della pagina
$titolo_pagina = "Altre pratiche di patronato";
include("template/titolo_pagina.php"); 
?>


<div class="row text-end">
	<div class="col-12">
		<a class="btn btn-primary mt-3" href="<?php echo $sito ?>Area-Riservata/Servizi-Patronato.html">Servizi Patronato</a>
	</div>
</div>
<div class="card mt-3 mb-3">
	<div class="card-body">	
    <section>
        <details>
        <summary><strong>Pensione di Vecchiaia &#8211; Pensione Anticipata &#8211; Pensione di Anzianità</strong></summary>
        <ul style="line-height:1.8;">
            <li style="list-style-type: none;">
                <ul>
                    <li style="list-style-type: none;"> </li>
                    <li>Documento di identità in corso di validità e tessera sanitaria del richiedente e del coniuge<br><b><i>-se straniero permesso o carta di soggiorno-</i></b></li>
                    <li>Stato Civile:</li>
                        <select name="mydropdown">
                            <option value="Single">Celibe/Nubile</option>
                            <option value="Coniugato">Coniugato/a</option>
                            <option value="Vedovo">Vedovo/a</option>
                            <option value="Separato">Separato/a</option>
                            <option value="Divorziato">Divorziato/a</option>
                        </select>
                    <li>Data variazione stato civile<br><i>-se separazione o divorzio anche sentensa e omologa del tribunale-</i></label></li>
                    <li>IBAN (non scrittto a mano) e indirizzo della banco o posta;</li>
                    <li>Il conto è cointestato?</li>
                        <select name="mydropdown">
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    <li>Reddito e patrimonio immobiliare del richiedente e del coniuge<br><b><i>&#8211; dichiarazione dei redditi dell&#8217;anno precedente e dell&#8217;anno in corso &#8211;</i></b></li>
                    <li>Pensione estere<br /><b><i>&#8211; se presenti &#8211;</i></b></li>
                    <li>Lettera del datore di lavoro per il requisito pensionistico</li>
                    <li>Numero di telefono Cellulare&ensp;<label><input name="phone" type="Tel" /></label></li>
                </ul>
            </li>
        </ul>
        </details>
    </section>
    <hr />
    <!-- ASSEGNO SOCIALE -->
    <section>
        <details>
        <summary><strong>Assegno Sociale</strong></summary>
        <ul style="line-height:1.8;">
            <li style="list-style-type: none;">
                <ul>
                    <li>Avere il requisito anagrafico<br /><b><i>&#8211; varia annualmente da controllare su sito INPS &#8211;</i></b></li>
                    <li>Documento di identità in corso di validità e tessera sanitaria del richiedente<br><b><i>&#8211; se straniero permesso o carta di soggiorno e certificato di residenza storico anagrafico &#8211;</i></b></li>
                    <li>Stato Civile:</li>
                        <select name="mydropdown">
                            <option value="Single">Celibe/Nubile</option>
                            <option value="Coniugato">Coniugato/a</option>
                            <option value="Vedovo">Vedovo/a</option>
                            <option value="Separato">Separato/a</option>
                            <option value="Divorziato">Divorziato/a</option>
                        </select>
                    <li>Data variazione stato civile<br><label><input name="Data" type="date" /> </label><br /><b><i>&#8211; se separazione o divorzio anche sentenza e omologa del tribunale &#8211;</i></b></li>
                    <li>Redditi e patrimonio immobiliare del richiedente e del coniuge<br /><b>&#8211; dichiarazione dei redditi dell&#8217;anno precedente e dell&#8217;anno in corso</b></li>
                    <li>IBAN (non scrittto a mano) e indirizzo della banco o posta;<br /><b><i>&#8211; intestato al contribuente &#8211; </i></b></li>
                    <li>Il conto è cointestato?</li>
                        <select name="mydropdown">
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    <li>Residenza in Italia da almeno 10 anni</li>
                    <li>Numero di telefono Cellulare<label>&ensp;<input name="phone" type="Tel" /></label></li>
                </ul>
            </li>
        </ul>
        </details>
    </section>
    <hr />
    <!-- PENSIONE AI SUPERSTITI-->
    <section>
        <details>
        <summary><strong>Pensione ai superstiti</strong> - <b>Reversibilità</b></summary>
        <ul style="line-height:1.8;">
            <li style="list-style-type: none;">
                <ul>
                    <li>Certificato di morte</li>
                    <li>Codice Fiscale del DE CUIUS</li>
                    <li>Documento di identità in corso di validità e tessera sanitaria del coniuge superstite<br /><i>-se straniero permesso o carta di soggiorno-</i></li>
                    <li>Codice fiscale del deceduto</li>
                    <li>IBAN (non scrittto a mano) e indirizzo della banco o posta;<br /><i><b>&#8211; non cointestato con il coniuge deceduto &#8211;</b></i></li>
                    <li>Il conto è cointestato?</li>
                        <select name="mydropdown">
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    
                    <li>Redditi dei coniugi</li>
                    <li>Rendite catastali degli immobili</li>
                    <li>Data e luogo del matrimonio</li>
                    <li>Che tipo di pensione percepiva il coniuge deceduto?</li>
                        <select name="mydropdown">
                            <option value="INPS">INPS</option>
                            <option value="INPDAP">INPDAP</option>
                        </select>
                    &#8211; se è INPDAP luogo e attività svolta dal coniuge deceduto &#8211;
                    </li>
                    <li>Se il coniuge deceduto percepiva pensione estera:
                        <ul>
                            <li>Di quale stato?</li>
                            <li>Per quale periodo? &#8211; Documentato &#8211;</li>
                            <li>Attività svolta</li>
                        </ul>
                    </li>
                    <li>Copia della sentenza di separazione o di divorzio<br /><i>&#8211; In caso di divorzio la pensione spetta solo se il richiedente percepiva l&#8217;assegno di mantenimento &#8211;</i></li>
                    <li>Per figli inabili a carico:</li>
                        <ul>
                            <li><a href="<?php echo $sito ?>Generici/2019/11/SS3.pdf"target="_blank"><span style="color: #0000ff;"><strong>Certificato Medico SS3</strong></span></a></li>
                        </ul>
                    <li>Per figli studenti fino a 26 anni:</li>
                        <ul>
                            <li>Certificato di iscrizione al corso di studi;</li>
                        </ul>
                    <li>Numero di telefono Cellulare&ensp;<label><input name="phone" type="Tel" /></label></li>
                    <li><b>Ratei maturati e non riscossi &#8211; modello da compilare </b><a href="<?php echo $sito ?>Generici/2019/11/AP23_Rate_mat_non_risc.pdf"target="_blank"><strong><span style="color: #0000ff;">AP 23</span></strong></a><b> per ogni erede-</b></li>
                        <ul>
                            <li><b>I ratei della tredicesima vengono liquidati con la reversibilità, quindi va fatta domanda solo nel caso non ci fosse coniuge superstite o in caso di richiesta dell&#8217;indennità di accompagnamento riconosciuta ma non percepita dal de cuius</b></li>
                        </ul>
                    <li>Per ogni erede:</li>
                        <ul>
                            <li>Data e luogo della/del:</li>
                                <ul>
                                    <li>Matrimonio o vedovanza</li>
                                    <li>separazione o divorzio</li>
                                </ul>    
                            <li>IBAN C/C non cointestato con il DE CUIUS e indirizzo della banca o posta</li>
                            <li>Il conto è cointestato?</li>
                                <select name="mydropdown">
                                    <option value="Si">Si</option>
                                    <option value="No">No</option>
                                </select>
                            <li>Se uno degli eredi vuole delegare alla riscossione un altro erede serve un atto notorio autenticato al Comune</li>
                            <li>Documento e Codice Fiscale<br /><i>Se straniero permesso o carta di soggiorno</i></li>
                            <li>Atto notorio uso succesione<br /><i><b>da richiedere in Circoscrizione</b></i></li>
                            <li>Numero di telefono Cellulare&ensp;<label><input name="phone" type="Tel" /></label></li>
                        </ul>
                    </li>
                </ul>
            </li>    
        </details>
    </section>
    <hr />
    <!-- ASSEGNI FAMILIARI LAVORATORI DOMESTICI E GESTIONE SEPARATA -->
    <section>
        <details>
        <summary><strong>Ricostituzioni Pensioni</strong></summary>
        <ul style="line-height:1.8;">
            <li style="list-style-type: none;">
                <ul>
                    <li>Documento di identità in corso di validità e tessera sanitaria del Pensionato<br><b><i>-se straniero permesso o carta di soggiorno-</i></b></li>
                    <li>Data variazione stato civile&ensp;<label><input name="Data" type="date" /></label></li>
                    <li>Stato Civile:</li>
                        <select name="mydropdown">
                            <option value="Single">Celibe/Nubile</option>
                            <option value="Coniugato">Coniugato/a</option>
                            <option value="Vedovo">Vedovo/a</option>
                            <option value="Separato">Separato/a</option>
                            <option value="Divorziato">Divorziato/a</option>
                        </select>
                    <i>se coniugato <b>C.F. del coniuge</b></i>&ensp;<input codice fiscale="testo" type="CF">
                    <li>Pensione estere<i><b> - se presenti -</b></i></li>
                    <li>che tipo di riscostituzione si vuole richiedere?</li>
                        <select name="mydropdown">
                            <option value="Reddituale">Reddituale</option>
                            <option value="Documentale">Documentale</option>
                            <option value="Magg. Sociale">Magg. Sociale</option>
                            <option value="14^ mensilità">14^ mensilità</option>
                            <option value="Supplemento">Supplemento</option>
                        </select>
                    <i>&#8211; SUPPLEMENTO &#8211; Ogni 5 anni portando le ultime 5 divhiarazioni dei redditi</i>
                    <li>Numero di telefono Cellulare&ensp;<label><input name="phone" type="Tel" /></label></li>
                </ul>
            </li>
        </ul>
        </details>
    </section>
    </div>
</div>