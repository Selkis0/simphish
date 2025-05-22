<!doctype html>

<?php
    if(isset($_GET["id"])) {
        $id = htmlspecialchars($_GET["id"]);
        $whurl = "https://discord.com/api/webhooks/1264924370493640725/FcrwfKnaGFM8yZsNvNSM7GaPkLdD3cM1u1ZIGRcdLzdkgJprDnU92P9ryUiqTMKZV3z6";
        $message = array(
            'content' => "L'ID ".$id." a cliqué sur le lien.",
            'username' => "Lien visité"
        );
        $context = array(
            'http' => array(
            'method' => 'POST',
            'header' => "Content-type: application/json\r\n",
            'content' => json_encode($message),
            )
        );
        $context = stream_context_create($context);
        $result = @file_get_contents($whurl, false, $context);


        header("location:./accueil.html");
        exit;
    }

?>