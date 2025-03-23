<?php
include 'qrcode.php';

$link = isset($_GET['link']) ? $_GET['link'] : null;

if(isset($link)) {   
    $text = "$link &action=readfila_estabelecimento";
    $name = md5(time()) . ".png";
    $file = "Files/{$name}";
    $options = array(
        'w' =>500,
        'h' =>500,
    );
    $generator = new QRCode($text, $options);
    $generator->output_image();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- <form action="" method="POST">
        <input type="text" name="qr" placeholder="Texto">
        <button type="submit">Gerar</button>
    </form> -->
</body>
</html>