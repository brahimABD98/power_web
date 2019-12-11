<?PHP
include "
CommandeC.php";
$produit1C=new produitC();
$listeproduits=$produit1C->afficherproduits();

//var_dump($listeproduits->fetchAll());
?>
<table border="1">
<tr>
<td>Nom</td>
<td>ID</td>
<td>Prix</td>
<td>Quantite</td>

<td>supprimer</td>
<td>modifier</td>
</tr>

<?PHP
foreach($listeproduits as $row){
	?>
	<tr>
	<td><?PHP echo $row['Nom']; ?></td>
	<td><?PHP echo $row['ID']; ?></td>
	<td><?PHP echo $row['Prix']; ?></td>
	<td><?PHP echo $row['Quantite']; ?></td>

	<td><form method="POST" action="supprimerproduit.php">
	<input type="submit" name="supprimer" value="supprimer">
	<input type="hidden" value="<?PHP echo $row['Nom']; ?>" name="Nom">
	</form>
	</td>
	<td><a href="modifierproduit.php?Nom=<?PHP echo $row['Nom']; ?>">
	Modifier</a></td>
	</tr>
	<?PHP
}
?>
</table>


