<?php

function calculerMoyenne($chiffre1,$chiffre2,$chriffre3){
    $moyenne = ($chiffre1+$chiffre2+$chriffre3)/3;
        return($moyenne);
}

function afficherResultat($nom,$moyenne){
    if ($moyenne<10){
        print_r("La moyenne de $nom est insuffisante");
    }
    if ($moyenne>=10){
        print_r("La moyenne de $nom est suffisante");
    }
}

afficherResultat("Alice",calculerMoyenne(7,8,8));
?>