<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Analyse de la structure des mots français</title>
  <link rel="stylesheet" href="css/main.css">
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

				<h2> Essai génération de 500 mots de 4 lettres basés sur le tableau statistique</h2>

				<div>
					<p> <?php echo $randomWordsService->numberOfWordsGenerated(500, 4); ?> </p>
				</div>

				<h2> Essai génération de 500 mots de 5 lettres</h2>

				<div>
					<p> <?php echo $randomWordsService->numberOfWordsGenerated(500, 5); ?> </p>
				</div>

				<h2> Essai génération de 500 mots de 6 lettres</h2>

				<div>
					<p> <?php echo $randomWordsService->numberOfWordsGenerated(500, 6); ?> </p>
				</div>

				<h2> Essai génération de 500 mots de 7 lettres</h2>

				<div>
					<p> <?php echo $randomWordsService->numberOfWordsGenerated(); ?> </p>
				</div>

                <div>
					<p> <strong> <span class="red">En rouge</span>, les mots français générés aléatoirement sur la base du tableau statistique. </strong> </p>
				</div>

				<div>
					<p> <strong> Des mots qui ressemblent finalement pas mal au latin avec une sonorité française ! ;) </strong> </p>
				</div>

			</div>

</body>
</html>
