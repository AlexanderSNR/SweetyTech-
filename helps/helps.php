<?php

function validar_campo($campo)
{
    $campo = trim($campo);
    $campo = stripcslashes($campo);
    $campo = htmlspecialchars($campo);

    return $campo;
}

function validar_fecha($campo)
{
    $campo = checkdate($campo);

    return $campo;
}


  
