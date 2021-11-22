<?php
    if($livello > 1) {
        echo "<script type=\"text/javascript\">window.location.replace(\"$sito\");</script>";
        return;
    } 
    
    
    include("template/titolo_pagina.php") ;
    
?>