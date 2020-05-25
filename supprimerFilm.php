<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Films en VOD</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="style/vod.css">
    </head>
    
    <body>
	
		<?php
				//~ Indique si on a trouvé le film (Tant qu’on n’a pas cherché on n’a pas trouvé)
				$filmTrouve = FALSE ;
	
				//~ Tableau destiné à mémoriser le contenu du fichier
				$films = array() ;
	
				$src = fopen( "data/vod.csv" , "r" ) ;
	
				//~ Lecture de tout le fichier
				while( ! feof( $src ) ){
			
					$ligne = fgets( $src ) ;
					$ligne = rtrim( $ligne ) ;
				
					if( $ligne != "" ){
	
						$infos = explode( ":" , $ligne ) ;
	
						//~ Le film courant est il le film recherché ?
						if( $infos[0] != $_POST["titre"] ){
	
							//~ Non... Donc on mémorise le film dans le tableau
							array_push( $ligne , $films ) ;
						}
						else {
							//~ Oui... Donc on ne mémorise pas le film dans le tableau
							$filmTrouve = TRUE ;
	
						}
					}
				}	
				fclose( $src ) ;
			
				//~ Si on a trouvé le film...
				if( $filmTrouve == TRUE ){
	
					//~ On écrase le fichier et on l’ouvre en mode écriture
					$dst = fopen( "data/vod.csv" , "w" ) ;
	
					//~ Recopie du contenu du tableau dans le fichier
					foreach( $films as $unFilm ){
	
						fwrite( $dst , $unFilm . "\n" ) ;
				}
			
				fclose( $dst ) ;
			
				echo "Film supprimé.<br/>" ;
	
			}
			else {
				echo "Film non trouvé.<br/>"
			}
		?>
	
		<a href="vod.html">Retour</a>
	</body>
