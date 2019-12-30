<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Analyse de la structure des mots français</title>
  <link rel="stylesheet" href="css/main.css">
  <script src="script.js"></script>
</head>
<body>


		<h1> Analyse et génération de mots français </h1>

			<div>

				<h2> Répartition de fréquence d'apparition de couple de lettres </h2>
			 
				<div id='cells'> <?php echo $drawCellsService->drawCells(); ?> </div>

				<p> N.B. : Pour la lecture : Colonne de gauche, première lettre. Ligne du haut seconde lettre. </br>
					Exemple, ici : 3 mots avec deux 'a' qui se suivent : afrikaans, kraal, kraals parmis plus de 300 000 !
				</p>

			</div>


			<div>

				<h2> Essai génération de mots de 7 lettres basés sur le tableau statistique</h2>
			 
				<div> 
					<p>
						<?php 

							$newWords = '';
							// Génération de 500 mots de 7 lettres
							for($i=0; $i<500; $i++) {
								$newWords .= ' '.$randomWordsService->exploreData();
							}

							echo $newWords;

						?> 
					</p>
				</div>

			</div>

</body>
</html>
