<div class="row breadcrumbBox">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb fp">
            <li class="breadcrumb-item"><a href="<?php echo $sito ?>">Home</a></li>

            <?php 
                if (isset($_SESSION['breadcrumb'])) {
                    foreach ($_SESSION['breadcrumb'] as $name => $url) echo '<li class="breadcrumb-item"><a href="'.$sito.$url.'">'.$name.'</a></li>';
                }
            ?>

            <li class="breadcrumb-item active" aria-current="page"><?php echo $titolo_pagina; ?></li>
        </ol>
    </nav>
</div>