  
  <?php
    $password = "alpha314";

    $hash = password_hash($password, PASSWORD_BCRYPT);

    printf("Hash password \"%s\": %s\n", $password, $hash);

    if (password_verify($password, $hash)) {
      echo "Password corretta!";
    } else {
      echo "Password errata!";
    }

    
?>


<?php
    $prova = json_decode(file_get_contents("json/pratiche.json"), true);
    foreach($prova as $key=>$value) {
        foreach ($value as $pratica)
        echo "$key - {$pratica["id"]} - {$pratica["nome"]}<br>";

    }
?>


<?php
    /*
    $key = 'bRuD5WYw5wd0rdHR9yLlM6wt2vteuiniQBqE70nAuhU=';

    function my_encrypt($data, $key) {
        $encryption_key = base64_decode($key);
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
        $encrypted = openssl_encrypt($data, 'aes-256-cbc', $encryption_key, 0, $iv);
        return base64_encode($encrypted . '::' . $iv);
    }

    function my_decrypt($data, $key) {
        $encryption_key = base64_decode($key);
        list($encrypted_data, $iv) = explode('::', base64_decode($data), 2);
        return openssl_decrypt($encrypted_data, 'aes-256-cbc', $encryption_key, 0, $iv);
    }

    $code = file_get_contents('AreaRiservata/prova.pdf'); //Get the code to be encypted.
    $encrypted_code = my_encrypt($code, $key); //Encrypt the code.
    echo 'Encrypted Code <br><br>';
    //echo $encrypted_code;

    file_put_contents('prova.pdf', $encrypted_code); //Save the ecnypted code somewhere.
    
    $encrypted_code = file_get_contents('prova.pdf'); //Get the encrypted code.
    $decrypted_code = my_decrypt($encrypted_code, $key);//Decrypt the encrypted code.
    echo 'Decrypted Code <br><br>';
    //echo $decrypted_code;

    file_put_contents('prova2.pdf', $decrypted_code); //Save the decrypted code somewhere.
    */
?>

<?php
    /*
    $filename = "AreaRiservata/prova.pdf";
    //Define header information
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header("Cache-Control: no-cache, must-revalidate");
    header("Expires: 0");
    header('Content-Disposition: attachment; filename="'.basename($filename).'"');
    header('Content-Length: ' . filesize($filename));
    header('Pragma: public');

    //Clear system output buffer
    flush();

    //Read the size of the file
    readfile($filename);
    */
?>
