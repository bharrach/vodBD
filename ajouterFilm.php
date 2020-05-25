<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Informations sur le film</title>
        <link rel="stylesheet" href="style/vod.css">
    </head>
	
	<body>
	
			<?php
			//~ Ouverture du fichier en mode Ajout
			$dst = fopen( "data/vod.csv" , "a" ) ;

			$ligne = $_POST["titre"] . ":" . $_POST["annee"] . ":" .
					$_POST["realisateur"] . "\n" ;

			fwrite( $dst , $ligne ) ;

			fclose( $dst ) ;

			echo "Titre : " . $_POST["titre"] . "<br/>" ;
			echo "Année : " . $_POST["annee"] . "<br/>" ;
			echo "Réalisateur : " . $_POST["realisateur"] . "<br/>" ;
		?>
		<!--Ce film a été enregistré.-->

		<a href="vod.html">Retour</a>
	</body>
