<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Informations sur le film</title>
        <link rel="stylesheet" href="style/vod.css">
    </head>
    
	<body>
		<?php
			//~ Contiendra "" tant que le film n'a pas été trouvé
			$film = "" ;

			$src = fopen( "data/vod.csv" , "r" ) ;
			//~ Tant que l'on n'a pas trouvé le film et que l'on n'est pas à la fin du fichier... On cherche
			while( $film == "" && ! feof( $src ) ){

				$ligne = fgets( $src ) ;
				$ligne = rtrim( $ligne ) ;

				if( $ligne != "" ){

					$infos = explode( ":" , $ligne ) ;
					//~ Ce film est il celui qui l'on recherche ?
					if( $infos[0] == $_POST["titre"] ){
						//~ On mémorise le film dans $film (ce qui permet entre autre de mettre fin à la boucle)
						$film = $ligne ;
					}
				}
			}

			fclose( $src ) ;
		
			//~ Si le film a été trouvé
			if( $film != "" ){

				echo "Titre : " . $infos[0] . "<br/>" ;
				echo "Année : " . $infos[1] . "<br/>" ;
				echo "Réalisateur : " . $infos[2] . "<br/>" ;
			}
			else {
				echo "<h5>Film non recensé.</h5>" ;
			}
		?>

		<a href="vod.html">Retour</a>
	</body>
