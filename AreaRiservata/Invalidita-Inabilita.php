<?php 
    // titolo della pagina
    $titolo_pagina = "Invalidità ed inabilità";
    include("template/titolo_pagina.php"); 
?>
<div class="row text-end">
	<div class="col-12">
		<a class="btn btn-primary mt-3" href="<?php echo $sito ?>Area-Riservata/Servizi-Patronato.html">Servizi Patronato</a>
	</div>
</div>

<div class="card mt-3">
	<div class="card-header"><b><i><font color="Blue">Richieste di:</font></i></b></div>
	<div class="card-body">	
		<section>
			<details>
				<summary><b>Riconoscimento o aggravamento di invalidità civile</b></summary>
				<ul style="line-height:1.8;">
					<li style="list-style-type: none;">
					<ul>
						<li>Documento di identità in corso di validità e tessera sanitaria del richiedente e indirizzo di residenza<br><i><strong>-se straniero permesso o carta di soggiorno-</strong></i></li>

						<li>Stato Civile:</li>
						<li style="list-style-type: none;">
							<select name="mydropdown">
								<option value="Single">Celibe/Nubile</option>
								<option value="Coniugato">Coniugato/a</option>
								<option value="Vedovo">Vedovo/a</option>
								<option value="Separato">Separato/a</option>
								<option value="Divorziato">Divorziato/a</option>
							</select>
						</li>

						<li><label>Data variazione stato civile;<br><input name="Data" type="date" /><br><strong><i>-se coniugato &#8211; C.F. del coniuge-</i></strong>&ensp;<input codice fiscale="testo" type="CF"></label></li>
						<li>Attività del richiedente:</li>
						<li style="list-style-type: none;">
							<select name="mydropdown">
								<option value="Pensionato">Pensionato</option>
								<option value="Dipendente_Privato">Dipendente Privato</option>
								<option value="Dipendente_Autonomo">Dipendente Autonomo</option>
								<option value="Dipendente_Pubblico">Dipendente Pubblico</option>
								<option value="Disoccupato">Disoccupato</option>
							</select>
						</li>
						<li>Certificato medico telematico da richiedere al proprio medico curante<i>-Vale 90 gg. dall&#8217;emissione</i></li>
						<li>
							In caso di richiedente inabilitato &#8211; Interdetto &#8211; Minore di età:<br /><i>-del richiedente dell&#8217;amministratore di sostegno &#8211; tutore &#8211; genitore &#8211; </i>
							<ul>
								<li>Documento d&#8217;identità valido;</li>
								<li>Tessera Sanitaria;</li>
								<li>Atto rilasciato dal Tribunale</li>
							</ul>
						</li>
						<li>Numero di telefono Cellulare per SMS dell&#8217;invito a visita &ensp; <label><input name="phone" type="Tel" /></label></li>
						<li>In caso di domanda di aggravamento se la domanda è stata fatta dal 2010 in poi, occorre il verbale precedente;</li>
						<li>IBAN (non scritto a mano) e indirizzo della banco o posta; <i><b>Se viene richiesto l&#8217;accompagno</b></i></li>
						<li>
							Eventuali ricoveri:
							<ul>
								<li>Date e strutture in cui è stato ricoverato; <i><b>Se viene richiesto l&#8217;accompagno</b></i></li>
							</ul>
						</li>
						<li>Il conto è cointestato?</li>
						<li style="list-style-type: none;">
							<select name="mydropdown">
								<option value="Si">Si</option>
								<option value="No">No</option>
							</select>
						</li>
					</ul>
					</li>
				</ul>
			</details>
		</section>
		<hr />
		<p>
			<!-- Accompagno -->
		</p>
		<section>
			<details>
				<summary><b>Accompagno</b></summary>
				<ul style="line-height:1.8;">
					<li style="list-style-type: none;">
					<ul>
						<li>Documento di identità in corso di validità e tessera sanitaria del richiedente e indirizzo di residenza<br><b><i>-se straniero permesso o carta di soggiorno-</i></b></li>
						<li>Stato Civile:</li>
						<li style="list-style-type: none;">
							<select name="mydropdown">
								<option value="Single">Celibe/Nubile</option>
								<option value="Coniugato">Coniugato/a</option>
								<option value="Vedovo">Vedovo/a</option>
								<option value="Separato">Separato/a</option>
								<option value="Divorziato">Divorziato/a</option>
							</select>
						</li>
						<li><label>Data variazione stato civile<br><input name="Data" type="date" /><br><strong><i>-se coniugato &#8211; C.F. del coniuge-</i></strong>&ensp;<input codice fiscale="testo" type="CF"></label></li>
						<li>Attività del richiedente:</li>
						<li style="list-style-type: none;">
							<select name="mydropdown">
								<option value="Pensionato">Pensionato</option>
								<option value="Dipendente_Privato">Dipendente Privato</option>
								<option value="Dipendente_Autonomo">Dipendente Autonomo</option>
								<option value="Dipendente_Pubblico">Dipendente Pubblico</option>
								<option value="Disoccupato">Disoccupato</option>
							</select>
						</li>
						<li>Certificato medico telematico da richiedere al proprio medico curante<i>-Vale 90 gg. dall&#8217;emissione</i></li>
						<li>
							In caso di richiedente inabilitato &#8211; Interdetto &#8211; Minore di età:<br /><i>-del richiedente dell&#8217;amministratore di sostegno &#8211; tutore &#8211; genitore &#8211; </i>
							<ul>
								<li>Documento d&#8217;identità valido;</li>
								<li>Tessera Sanitaria;</li>
								<li>Atto rilasciato dal Tribunale</li>
							</ul>
						</li>
						<li>Numero di telefono Cellulare per SMS dell&#8217;invito a visita<label>&ensp;<input name="phone" type="Tel" /></label></li>
						<li>In caso di domanda di aggravamento se la domanda è stata fatta dal 2010 in poi, occorre il verbale precedente;</li>
						<li>IBAN (non scritto a mano) e indirizzo della banco o posta; <i><b>Se viene richiesto l&#8217;accompagno</b></i></li>
						<li>
							Eventuali ricoveri:
							<ul>
								<li>Date e strutture in cui è stato ricoverato; <i><b>Se viene richiesto l&#8217;accompagno</b></i></li>
							</ul>
						</li>
						<li>Il conto è cointestato?</li>
						<li style="list-style-type: none;">
							<select name="mydropdown">
								<option value="Si">Si</option>
								<option value="No">No</option>
							</select>
						</li>
					</ul>
					</li>
				</ul>
			</details>
		</section>
		<hr />
		<p>
			<!-- Frequenza -->
		</p>
		<section>
			<details>
				<summary><b>Frequenza</b></summary>
				<ul style="line-height:1.8;">
					<li style="list-style-type: none;">
					<ul>
						<li>Documento di identità in corso di validità e tessera sanitaria del richiedente e indirizzo di residenza<br><b><i>-se straniero permesso o carta di soggiorno-</i></b></li>
						<li>Stato Civile:</li>
						<li style="list-style-type: none;">
							<select name="mydropdown">
								<option value="Single">Celibe/Nubile</option>
								<option value="Coniugato">Coniugato/a</option>
								<option value="Vedovo">Vedovo/a</option>
								<option value="Separato">Separato/a</option>
								<option value="Divorziato">Divorziato/a</option>
							</select>
						</li>
						<li><label>Data variazione stato civile<br><input name="Data" type="date" /><br><strong><i>-se coniugato &#8211; C.F. del coniuge-</i></strong>&ensp;<input codice fiscale="testo" type="CF"></label></li>
						<li>Attività del richiedente:</li>
						<li style="list-style-type: none;">
							<select name="mydropdown">
								<option value="Pensionato">Pensionato</option>
								<option value="Dipendente_Privato">Dipendente Privato</option>
								<option value="Dipendente_Autonomo">Dipendente Autonomo</option>
								<option value="Dipendente_Pubblico">Dipendente Pubblico</option>
								<option value="Disoccupato">Disoccupato</option>
							</select>
						</li>
						<li>Certificato medico telematico da richiedere al proprio medico curante<i>-Vale 90 gg. dall&#8217;emissione</i></li>
						<li>
							In caso di richiedente inabilitato &#8211; Interdetto &#8211; Minore di età:<br /><i>-del richiedente dell&#8217;amministratore di sostegno &#8211; tutore &#8211; genitore &#8211; </i>
							<ul>
								<li>Documento d&#8217;identità valido;</li>
								<li>Tessera Sanitaria;</li>
								<li>Atto rilasciato dal Tribunale</li>
							</ul>
						</li>
						<li>Numero di telefono Cellulare per SMS dell&#8217;invito a visita<label>&ensp;<input name="phone" type="Tel" /></label></li>
						<li>In caso di domanda di aggravamento se la domanda è stata fatta dal 2010 in poi, occorre il verbale precedente;</li>
						<li>IBAN (non scritto a mano) e indirizzo della banco o posta; <i><b>Se viene richiesto l&#8217;accompagno</b></i></li>
						<li>
							Eventuali ricoveri:
							<ul>
								<li>Date e strutture in cui è stato ricoverato; <i><b>Se viene richiesto l&#8217;accompagno</b></i></li>
							</ul>
						</li>
						<li>Il conto è cointestato?</li>
						<li style="list-style-type: none;">
							<select name="mydropdown">
								<option value="Si">Si</option>
								<option value="No">No</option>
							</select>
						</li>
					</ul>
					</li>
				</ul>
			</details>
		</section>
		<hr />
		<p>
			<!-- Handicap -->
		</p>
		<section>
			<details>
				<summary><b>HANDICAP &#8211; legge 104/92 &#8211;</b></summary>
				<ul style="line-height:1.8;">
					<li style="list-style-type: none;">
					<ul>
						<li>Documento di identità in corso di validità e tessera sanitaria del richiedente e indirizzo di residenza<br><b><i>-se straniero permesso o carta di soggiorno-</i></b></li>
						<li>Stato Civile:</li>
						<li style="list-style-type: none;">
							<select name="mydropdown">
								<option value="Single">Celibe/Nubile</option>
								<option value="Coniugato">Coniugato/a</option>
								<option value="Vedovo">Vedovo/a</option>
								<option value="Separato">Separato/a</option>
								<option value="Divorziato">Divorziato/a</option>
							</select>
						</li>
						<li><label>Data variazione stato civile<br><input name="Data" type="date" /><br><strong><i>-se coniugato &#8211; C.F. del coniuge-</i></strong>&ensp;<input codice fiscale="testo" type="CF"></label></li>
						<li>Attività del richiedente:</li>
						<li style="list-style-type: none;">
							<select name="mydropdown">
								<option value="Pensionato">Pensionato</option>
								<option value="Dipendente_Privato">Dipendente Privato</option>
								<option value="Dipendente_Autonomo">Dipendente Autonomo</option>
								<option value="Dipendente_Pubblico">Dipendente Pubblico</option>
								<option value="Disoccupato">Disoccupato</option>
							</select>
						</li>
						<li>Certificato medico telematico da richiedere al proprio medico curante<i>-Vale 90 gg. dall&#8217;emissione</i></li>
						<li>
							In caso di richiedente inabilitato &#8211; Interdetto &#8211; Minore di età:<br /><i>-del richiedente dell&#8217;amministratore di sostegno &#8211; tutore &#8211; genitore &#8211; </i>
							<ul>
								<li>Documento d&#8217;identità valido;</li>
								<li>Tessera Sanitaria;</li>
								<li>Atto rilasciato dal Tribunale</li>
							</ul>
						</li>
						<li>Numero di telefono Cellulare per SMS dell&#8217;invito a visita &ensp;<label><input name="phone" type="Tel" /></label></li>
						<li>In caso di domanda di aggravamento se la domanda è stata fatta dal 2010 in poi, occorre il verbale precedente;</li>
						<li>IBAN (non scritto a mano) e indirizzo della banco o posta; <i><b>Se viene richiesto l&#8217;accompagno</b></i></li>
						<li>
							Eventuali ricoveri:
							<ul>
								<li>Date e strutture in cui è stato ricoverato; <i><b>Se viene richiesto l&#8217;accompagno</b></i></li>
							</ul>
						</li>
						<li>Il conto è cointestato?</li>
						<li style="list-style-type: none;">
							<select name="mydropdown">
								<option value="Si">Si</option>
								<option value="No">No</option>
							</select>
						</li>
					</ul>
					</li>
				</ul>
			</details>
		</section>
		<hr />
		<p>
			<!-- Collocamento mirato -->
		</p>
		<section>
			<details>
				<summary><b>Collocamento mirato</b></summary>
				<ul style="line-height:1.8;">
					<li style="list-style-type: none;">
					<ul>
						<li>Documento di identità in corso di validità e tessera sanitaria del richiedente e indirizzo di residenza<br><b><i>-se straniero permesso o carta di soggiorno-</i></b></li>
						<li>Stato Civile:</li>
						<li style="list-style-type: none;">
							<select name="mydropdown">
								<option value="Single">Celibe/Nubile</option>
								<option value="Coniugato">Coniugato/a</option>
								<option value="Vedovo">Vedovo/a</option>
								<option value="Separato">Separato/a</option>
								<option value="Divorziato">Divorziato/a</option>
							</select>
						</li>
						<li><label>Data variazione stato civile<br><input name="Data" type="date" /><br><strong><i>-se coniugato &#8211; C.F. del coniuge-</i></strong>&ensp;<input codice fiscale="testo" type="CF"></label></li>
						<li>Attività del richiedente:</li>
						<li style="list-style-type: none;">
							<select name="mydropdown">
								<option value="Pensionato">Pensionato</option>
								<option value="Dipendente_Privato">Dipendente Privato</option>
								<option value="Dipendente_Autonomo">Dipendente Autonomo</option>
								<option value="Dipendente_Pubblico">Dipendente Pubblico</option>
								<option value="Disoccupato">Disoccupato</option>
							</select>
						</li>
						<li>Certificato medico telematico da richiedere al proprio medico curante<i>-Vale 90 gg. dall&#8217;emissione</i></li>
						<li>
							In caso di richiedente inabilitato &#8211; Interdetto &#8211; Minore di età:<br /><i>-del richiedente dell&#8217;amministratore di sostegno &#8211; tutore &#8211; genitore &#8211; </i>
							<ul>
								<li>Documento d&#8217;identità valido;</li>
								<li>Tessera Sanitaria;</li>
								<li>Atto rilasciato dal Tribunale</li>
							</ul>
						</li>
						<li>Numero di telefono Cellulare per SMS dell&#8217;invito a visita&ensp;<label><input name="phone" type="Tel" /></label></li>
						<li>In caso di domanda di aggravamento se la domanda è stata fatta dal 2010 in poi, occorre il verbale precedente;</li>
						<li>IBAN (non scritto a mano) e indirizzo della banco o posta; <i><b>Se viene richiesto l&#8217;accompagno</b></i></li>
						<li>
							Eventuali ricoveri:
							<ul>
								<li>Date e strutture in cui è stato ricoverato <i><b>Se viene richiesto l&#8217;accompagno</b></i></li>
							</ul>
						</li>
						<li>Il conto è cointestato?</li>
						<li style="list-style-type: none;">
							<select name="mydropdown">
								<option value="Si">Si</option>
								<option value="No">No</option>
							</select>
							<b><i>RICONOSCIMENTO DEL COLLOCAMENTO MIRATO L. 68 DI UNA PERSONA GIA&#8217; IN POSSESSO DEL VERBALE CON LA PERCENTUALE DI INVALIDITA&#8217;</i></b>
						</li>
						<li>Documento di identità in corso di validità e tessera sanitaria del richiedente e indirizzo di residenza<b><i>-se straniero permesso o carta di soggiorno-</i></b></li>
						<li>Stato Civile:</li>
						<li style="list-style-type: none;">
							<select name="mydropdown">
								<option value="Single">Celibe/Nubile</option>
								<option value="Coniugato">Coniugato/a</option>
								<option value="Vedovo">Vedovo/a</option>
								<option value="Separato">Separato/a</option>
								<option value="Divorziato">Divorziato/a</option>
							</select>
						</li>
						<li><label>Data variazione stato civile<br><input name="Data" type="date" /><br><strong><i>-se coniugato &#8211; C.F. del coniuge-</i></strong>&ensp;<input codice fiscale="testo" type="CF"></label></li>
						<li>Attività del richiedente:</li>
						<li style="list-style-type: none;">
							<select name="mydropdown">
								<option value="Pensionato">Pensionato</option>
								<option value="Dipendente_Privato">Dipendente Privato</option>
								<option value="Dipendente_Autonomo">Dipendente Autonomo</option>
								<option value="Dipendente_Pubblico">Dipendente Pubblico</option>
								<option value="Disoccupato">Disoccupato</option>
							</select>
						</li>
						<li>Verbale di invalidità civile con percentuale;</li>
						<li>
							In caso di richiedente inabilitato/interdetto/minore d&#8217;età;<b><i>-del richiedente dell&#8217;amministratore di sostegno &#8211; tutore &#8211; genitore &#8211; </i></b>
							<ul>
								<li>Documento di identità valido;</li>
								<li>Tessera sanitaria</li>
								<li>Atto rilasciato dal tribunale;</li>
							</ul>
						</li>
						<li>Numero di telefono Cellulare per SMS dell&#8217;invito a visita&ensp;<label><input name="phone" type="Tel" /></label></li>
					</ul>
					</li>
				</ul>
			</details>
		</section>
	</div>
</div>
<div class="card mt-3 mb-3">
	<div class="card-header"><b><i><font color="Blue">Richiesta economica a seguito di verbale di accertamento</font></i></b></div>
	<div class="card-body">	
	<section>
		<details>
			<summary><b>Invalidità civile o Indennità di accompagno</b></summary>
		<ul style="line-height:1.8;">
			<li style="list-style-type: none;">
				<ul>
					<li><a href="<?php echo $sito ?>Generici/2019/11/AP70_mod_autocert.pdf" target="_blank" rel="noopener"><span style="color: #0000ff;"><b><i>Compilare AP 70</i></b></span></a></li>
					<li>Documento di identità in corso di validità e tessera sanitaria del richiedente e del coniuge<i>-se straniero permesso o carta di soggiorno-</i></li>
					<li>Stato Civile:</li>
					<li style="list-style-type: none;">
					    <select name="mydropdown">
							<option value="Single">Celibe/Nubile</option>
							<option value="Coniugato">Coniugato/a</option>
							<option value="Vedovo">Vedovo/a</option>
							<option value="Separato">Separato/a</option>
							<option value="Divorziato">Divorziato/a</option>
					    </select>
					</li>
					<li><label>Data variazione stato civile <br><input name="Data" type="date" /><br><i><b>-se coniugato &#8211; C.F. del coniuge-&ensp;<input codice fiscale="testo" type="CF"></b></i></label></li>
					<li>Redditi e patrimonio immobiliare;<br /><i>&#8211; se coniugati di entrambi i coniugi &#8211; </i> <b>&#8220;Solo se l&#8217;assistito ha meno di 65 anni&#8221;</b></li>
					<li>Se presente amministratore di sostegno &#8211; tutore &#8211; occorre:</li>
				<ul>
					<li>il documento di identità;</li>
					<li>Atto relativo alla nomina del medesimo;</li>
				</ul>
					<li>Verbale della commissione medica;</li>
					<li>IBAN (non scritto a mano) e indirizzo della banco o posta;</li>
					<li>Il conto è cointestato?</li>
					<li style="list-style-type: none;">
					    <select name="mydropdown">
					    	<option value="Si">Si</option>
							<option value="No">No</option>
						</select>
					</li>
					<li>Eventuali ricoveri:</li>
					<li style="list-style-type: none;">
				        <ul>
					        <li>Date e strutture in cui è stato ricoverato <i><b>dalla data della domanda</b></i></li>
				        </ul>
					</li>
					<li>Numero di telefono Cellulare &ensp;<label><input name="phone" type="Tel" /></label></li>
				</ul>
			</li>
		</ul>
			<p><b><br />N.B.<br />Se la domanda di invalidità non è stata fatta con il nostro patronato occorre la domanda di invalidità con i riferimenti DOMUS per il subentro, inoltre occorrono i dati del patronato con cui è stata fatta la domanda e l&#8217;indirizzo della sede.</b></p>
		</details>
	</section>
	<hr />
	<p>
		<!-- Indennità di frequenza -->
	</p>
	<section>
		<details>
			<summary><b>Indennità di frequenza</b></summary>
			<ul style="line-height:1.8;">
				<li style="list-style-type: none;">
				<ul>
					<li><a href="<?php echo $sito ?>Generici/2019/11/AP70_mod_autocert.pdf" target="_blank" rel="noopener"><span style="color: #0000ff;"><b><i>Compilare AP 70</i></b></span></a></li>
					<li>Documento di identità in corso di validità e tessera sanitaria di entrambi i genitori<i>-se straniero permesso o carta di soggiorno-</i></li>
					<li>IBAN (non scritto a mano) di un libretto o conto <b>NOMINATIVO PER MINORI;</b></li>
					<li style="list-style-type: none;">
						<ul>
							<li>Indirizzo della banca o posta;</li>
						</ul>
					</li>
					<li>Eventuali ricoveri:</li>
					<li style="list-style-type: none;">
						<ul>
							<li>Date e strutture in cui è stato ricoverato <i><b>dalla data della domanda</b></i></li>
						</ul>
					</li>
					<li>Certificazione dei periodi di frequenza dei minori che frequentino:</li>
					<li style="list-style-type: none;">
						<ul>
							<li>scuole pubbliche o private che impartiscano l&#8217;istruzione obbligatoria;</li>
							<li>asili nido pubblici o privati;</li>
							<li>centri di formazione;</li>
							<li>addestramento finalizzato al reinserimento;</li>
							<li>centri specializzati nel trattamento terapeutico o di riabilitazione con riportato codice fiscale della struttura;</li>
						</ul>
					</li>
					<li>Nel caso di minori adottati:</li>
					<li style="list-style-type: none;">
						<ul>
							<li>N° provvedimento e tribunale che lo ha emesso;&ensp;<input testo="testo" type="Provvedimento_e_tribunale"></li>
							<li><label>data ingresso in italia<br><input name="Data" type="date" /></label></li>
							<li><label>data ingresso famiglia <br><input name="Data" type="date" /></label></li>
						</ul>
					</li>
					<li>Numero di telefono Cellulare &ensp;<label><input name="phone" type="Tel" /></label></li>
				</ul>
				</li>
			</ul>
		</details>
	</section>
	<hr />
	<p>
		<!-- Giorni Legge 104/92 solo per dipendenti privati - assistenza a familiari o per sé stessi -->
	</p>
	<section>
		<details>
			<summary><b>Giorni Legge 104/92 solo per dipendenti privati &#8211; assistenza a familiari o per sé stessi</b></summary>
			<ul style="line-height:1.8;">
				<li style="list-style-type: none;">
				<ul>
					<li>Documento di identità in corso di validità e tessera sanitaria del richiedente e indirizzo di residenza;<i>-se straniero permesso o carta di soggiorno-</i></li>
					<li>Documento e Codice Fiscale della persona invalida e indirizzo di residenza;</li>
					<li>La persona invalida:</li>
					<li style="list-style-type: none;">
						<ul>
							<li>Lavora?</li>
							<li>Che lavoro?</li>
							<li>Quante ore giornaliere?</li>
						</ul>
					</li>
					<li>Busta paga dipendente;</li>
					<li>Certificato d&#8217;invalidità e L. 104</li>
					<li>Quante ore lavora al giorno il dipendente?</li>
					<li>Il dipendente prende permessi per un&#8217;altra persona?</li>
					<li>Abita a più di 150 km dalla persona invalida?</li>
					<li><label>Numero di telefono Cellulare&ensp;<input name="phone" type="Tel" /></label></li>
				</ul>
				</li>
			</ul>
		</details>
	</section>
	<hr />
	<p>
		<!-- Congedo straordinario, solo assistenza a familiari che hanno la stessa residenza-->
	</p>
	<section>
		<details>
			<summary><b>Congedo straordinario, solo assistenza a familiari che hanno la stessa residenza<br /></b></summary>
			<ul style="line-height:1.8;">
				<li style="list-style-type: none;">
				<ul>
					<li><b><i><u>REQUISITI ESSENZIALI:</u></i></b></li>
					<li style="list-style-type: none;">
						<ul>
							<li><b><i><u>A SECONDA DEL LEGAME DI PARENTELA, VARIA LA PROCEDURA, CONTATTARE LA SEDE PER INFO,</u></i></b></li>
						</ul>
					</li>
					<li>Documento di identità in corso di validità e tessera sanitaria del dipendente<i>-se straniero permesso o carta di soggiorno-</i></li>
					<li>Indicare il legame di parentela del dipendente con l&#8217;invalidità;</li>
					<li>Comunicare la composizione del nucleo familiare dell&#8217;invalido;</li>
					<li>Documento e Codice Fiscale della persona invalida;<br /><i>&#8211; <b>se straniero permesso o carta di soggiorno &#8211;</b></i></li>
					<li>Verbale della Legge 104/92;<br /><i><b>&#8211; Art. 3 comma 3 &#8211; </b></i></li>
					<li>Busta paga del richiedente;</li>
					<li>Periodo richiesto &#8211; Dal_____ Al_____ &#8211;</li>
					<li><label>Numero di telefono Cellulare&ensp;<input name="phone" type="Tel" /></label></li>
				</ul>
				</li>
			</ul>
		</details>
	</section>
	<hr />
	<p>
		<!-- Assegno Ordinario di Invalidità -->
	</p>
	<section>
		<details>
			<summary><b>Assegno Ordinario di Invalidità</b><br><i><b>&#8211; bisogna avere almeno 3 anni di contributi negli ultimi 5 anni &#8211;</b></i></summary>
			<ul style="line-height:1.8;">
				<li style="list-style-type: none;">
				<ul>
					<li>Documento di identità in corso di validità e tessera sanitaria del richiedente e del coniuge<br><i><b>-se straniero permesso o carta di soggiorno-</b></i></li>
					<li>Stato Civile:</li>
					<li style="list-style-type: none;">
						<select name="mydropdown">
							<option value="Single">Celibe/Nubile</option>
							<option value="Coniugato">Coniugato/a</option>
							<option value="Vedovo">Vedovo/a</option>
							<option value="Separato">Separato/a</option>
							<option value="Divorziato">Divorziato/a</option>
						</select>
					</li>
					<li><label>Data variazione stato civile<br><input name="Data" type="date" /><br><strong><i>-se coniugato &#8211; C.F. del coniuge-</i></strong>&ensp;<input codice fiscale="testo" type="CF"></label></li>
					<li>Se separato o divorziato:</li>
					<li style="list-style-type: none;">
						<ul>
							<li>sentenza e omologa del tribunale</li>
						</ul>
					</li>
					<li>IBAN (non scritto a mano) e indirizzo della banco o posta;</li>
					<li>Il conto è cointestato?</li>
					<li style="list-style-type: none;">
						<select name="mydropdown">
							<option value="Si">Si</option>
							<option value="No">No</option>
						</select>
					</li>
					<li>Reddito e patrimonio Immobiliare del richiedente e del coniuge<br /><i>&#8211; dichiarazione dei redditi dell&#8217;anno precedente e dell&#8217;anno in corso &#8211; </i></li>
					<li>Certificato medico<strong> <a href="<?php echo $sito ?>Generici/2019/11/SS3.pdf" target="_blank" rel="noopener"><em><span style="color: #0000ff;">SS3</span></em></a></strong> Telematico<br /><i>&#8211; Vale 90 gg. dall&#8217;emissione &#8211; </i></li>
					<li><label>Numero di telefono Cellulare&ensp;<input name="phone" type="Tel" /></label></li>
				</ul>
				</li>
			</ul>
		</details>
	</section>
	<hr />
	<p>
		<!-- Pensione di Inabilità-->
	</p>
	<section>
		<details>
			<summary><b>Pensione di Inabilità</b></summary>
			<ul style="line-height:1.8;">
				<li style="list-style-type: none;">
				<ul>
					<li>Documento di identità in corso di validità e tessera sanitaria del richiedente e e del coniuge<br><b><i>-se straniero permesso o carta di soggiorno-</i></b></li>
					<li>Stato Civile:</li>
					<li style="list-style-type: none;">
						<select name="mydropdown">
							<option value="Single">Celibe/Nubile</option>
							<option value="Coniugato">Coniugato/a</option>
							<option value="Vedovo">Vedovo/a</option>
							<option value="Separato">Separato/a</option>
							<option value="Divorziato">Divorziato/a</option>
						</select>
					</li>
					<li>Se separato o divorziato:</li>
					<li style="list-style-type: none;">
						<ul>
							<li>sentenza e omologa del tribunale</li>
						</ul>
					</li>
					<li>IBAN <i>(non scritto a mano)</i> e indirizzo della banco o posta;</li>
					<li>Il conto è cointestato?</li>
					<li style="list-style-type: none;">
						<select name="mydropdown">
							<option value="Si">Si</option>
							<option value="No">No</option>
						</select>
					</li>
					<li>Reddito e patrimonio Immobiliare del richiedente e del coniuge<br /><i><b>&#8211; dichiarazione dei redditi dell&#8217;anno precedente e dell&#8217;anno in corso &#8211;</b></i></li>
					<li>Dichiarazione di cessazione attività lavorativa;</li>
					<li>Certificato medico <a href="<?php echo $sito ?>Generici/2019/11/SS3.pdf" target="_blank" rel="noopener"><em><span style="color: #0000ff;"><strong>SS3</strong></span></em></a> Telematico;<br /><i><b>&#8211; Vale 90 gg. dall&#8217;emissione &#8211; </b></i></li>
					<li><label>Numero di telefono Cellulare&ensp;<input name="phone" type="Tel" /></label></li>
				</ul>
				</li>
			</ul>
		</details>
	</section>
	</div>
</div>