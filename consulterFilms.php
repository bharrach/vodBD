<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Consulter la liste des films</title>
        <link rel="stylesheet" href="style/vod.css">
    </head>
    
    <body>
		<table>
			<!--Ligne d’en-tête-->
			<tr>
				<td>Titre</td>
				<td>Année</td>
				<td>Réalisateur</td>
			</tr>
			<!--Lignes de données-->
			<?php
				//~ Ouverture du fichier en mode lecture, qui est maintenant référencé par la variable $src
				$src = fopen( "data/vod.csv" , "r" ) ;

				//~ Boucle de lecture ( on lit tant qu’on est pas à la fin de fichier)
				while( ! feof( $src ) ){
				
					//~ Lire la ligne courante (donc le film courant)
					$ligne = fgets( $src ) ;
					
					//~ Nettoyer la ligne lue (enlever le \n qui se trouve à la fin)
					$ligne = rtrim( $ligne ) ;
					
					//~ Ne pas traiter la dernière ligne qui est vide (conséquence du \n à la fin de la ligne précédente)
					if( $ligne != "" ){
					
						//~ Récupérer les 3 informations relatives au film
						$infos = explode( ":" , $ligne ) ;
						//~ Générer la ligne dans la table HTML
						echo "<tr>" ;

						echo "<td>" . $infos[0] . "</td>" ;
						echo "<td>" . $infos[1] . "</td>" ;
						echo "<td>" . $infos[2] . "</td>" ;
						
						echo "</tr>" ;
						
					}
				}

				//~ Fermer le fichier
				fclose( $src ) ;
			?>

		</table>
		
		<a href="vod.html">Retour</a>
</body>
