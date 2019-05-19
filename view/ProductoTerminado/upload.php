<?php
try {
    if (empty($base = $_POST['base']))
    die("missing string base64");

function base64ToJpeg($base64_string) {
    $data = explode(';', $base64_string);
    $dataa = explode(',', $base64_string);
    $part = explode("/", $data[0]);
    if (empty($part))
        return false;
    $file = md5(uniqid(rand(), true)) . ".{$part[1]}";
    if (!is_dir(realpath(__DIR__) . "/Imagenes/"))
        mkdir(realpath(__DIR__) . "/Imagenes/");

    $ifp = fopen(realpath(__DIR__) . "/Imagenes/{$file}", 'wb');
    fwrite($ifp, base64_decode($dataa[1]));
    fclose($ifp);
    return $file;
}

$fotos = array();
foreach ($base as $index => $base64) {
        
    if (!empty($base64) && !file_exists($finalFile = sprintf('%1$s/Imagenes/%2$s', realpath(__DIR__), base64ToJpeg($base64))))
        die("Upload error {$finalFile} on index : {$index}");
        array_push($fotos,base64ToJpeg($base64));
}
} catch (Exception  $e) {
    echo "Agregue fotos por favor";
}

