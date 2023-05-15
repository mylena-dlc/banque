<?php
  require "Compte.php";
  require "Titulaire.php";

$t1 = new Titulaire("Robert", "Georges", "25-04-2000", "Mulhouse");
$t2 = new Titulaire("Meyer", "Jaques", "26-04-1990", "Colmar");


$c1 = new Compte("Compte courant", 100, "€", $t1);
$c2 = new Compte ("Livret A", 15000, "€", $t1);
$c3 = new Compte("Compte courant", 2000, "€", $t2);

$t1->afficherTitulaire();
$t1->afficherComptes();
echo "<br/>";


$t2->afficherTitulaire();
$t2->afficherComptes();
echo "<br/>";

$c1->crediter(2);
echo "<br/>";
$c3->debiter(500);
echo "<br/>";
$c1->virement(20, $c2);

?>