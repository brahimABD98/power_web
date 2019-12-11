<?PHP
include "produit.php";
include "produit.C.php";
$produit=new produit(75757575,'BEN Ahmed','Salah',50,20);
$produitC=new produitC();
$produitC->afficherproduit($produit);
echo "****************";
echo "<br>";
echo "Nom:".$produit->getNom();
echo "<br>";
echo "ID:".$produit->getID();
echo "<br>";
echo "Prix:".$produit->getPrix();
echo "<br>";
echo "Quantite:".$produit->getQuantite();
echo "<br>";
?>