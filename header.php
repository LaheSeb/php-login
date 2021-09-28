<?php
function chargerClasse( string $classe)
{
    include $classe . '.php' ; //On inclut la classe correspondante au parametre passé 
}
spl_autoload_register('chargerClasse');
include "conf.php";
