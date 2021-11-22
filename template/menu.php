<?php
   
    $menu = json_decode(file_get_contents("json/menu.json"), true);
?>


<nav class="navbar navbar-expand-md bg-white navbar-light fixed-top">
    <div class="container">

    <a class="navbar-brand" href="<?php echo $sito ?>">
        <figure>
            <figcaption></figcaption>
            <picture>
                <source type="image/webp" srcset="<?php echo "$sito{$menu["logo"][0]["webp"]}" ?>">
                <img src="<?php echo "$sito{$menu["logo"][0]["image"]}" ?>" class="img-fluid" style="" alt="">
            </picture>
        </figure>    
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <?php

            foreach($menu["menu"] as $key=>$value) {
                $lk =  $value["sito"];
                $etichetta =  $value["etichetta"];
                if($lk !="submenu") {
                    echo "
                    <li class=\"nav-item\">
                        <a class=\"nav-link active\" aria-current=\"page\" href=\"$sito$lk\">$etichetta</a>
                    </li>
                    ";
                }else{
                    echo "
                    <li class=\"nav-item dropdown\">
                        <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarDropdownMenuLink\" role=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
                            $etichetta
                        </a>
                        <ul class=\"dropdown-menu\" aria-labelledby=\"navbarDropdownMenuLink\">
                    ";
                    foreach($menu[$etichetta] as $sub_key=>$sub_value) {
                        $sub_lk = $sub_value["sito"];
                        $sub_etichetta = $sub_value["etichetta"];
                        echo "
                            <li>
                                <a class=\"dropdown-item\" href=\"$sito$sub_lk\">$sub_etichetta</a>
                            </li>
                        ";
                    }
                    echo "</ul></li>";
                }
            }
        
            if($livello == "100") {
                echo "
                <li class=\"nav-item\">
                    <a class=\"nav-link\" href=\"{$sito}Login.html\">Area Riservata</a>
                </li> ";      
            }  else {
                include("AreaRiservata/livello.php");
            }         
            
        ?>
      </ul>
    </div>
    </div>
</nav>

<?php include("template/fake_menu.php"); ?>