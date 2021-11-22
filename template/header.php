<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="<?php echo $sito ?>css/bootstrap.min.css">  

        <!-- libreria jquery -->
        <script type="text/javascript" src="<?php echo $sito ?>js/jquery-3.5.1.min.js" ></script>

        <script type="text/javascript" src="<?php echo $sito ?>js/classi.js" ></script>
        <script type="text/javascript" src="<?php echo $sito ?>js/funzioni.js" ></script>
        <!-- stile della pagina CSS -->
        <link rel="stylesheet" href="<?php echo $sito ?>css/style.css?v=<?php echo rand() ?>">


        <title>Fiscopoint - <?php echo str_replace("-", " ", $page); ?></title>
        
        <!-- Global site tag (gtag.js) - Google Analytics -->
            <script async src="https://www.googletagmanager.com/gtag/js?id=UA-213015357-1"></script>
            <script>
                window.dataLayer = window.dataLayer || [];
                function gtag(){dataLayer.push(arguments);}
                gtag('js', new Date());

                gtag('config', 'UA-213015357-1');
            </script>
    </head>

    <body>