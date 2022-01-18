    <li class="nav-item dropdown">  
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Amministra
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <?php
                if($livello == 0) {
                    $mn_riservato = json_decode(file_get_contents("json/menu_admin.json"), true);
                } else if ($livello > 1 ) {
                    $mn_riservato = json_decode(file_get_contents("json/menu_operatori.json"), true);
                }
                

                foreach($mn_riservato as $key=>$value) {
                    echo "<li>
                            <a class=\"dropdown-item\" href=\"{$sito}Area-Riservata/{$value["sito"]}\">{$value["etichetta"]}</a>
                        </li>";
                }
            ?>
            <li>
                <a class="dropdown-item" href="<?php echo $sito ?>Esci.html">Esci</a>
            </li>
        </ul>
    </li>