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

			<h2> Répartition de fréquence d'apparition de couple de lettres <h2>
		 
			<div> <?php echo $drawCellsService->drawCells(); ?> </div>

			<p> N.B. : Pour la lecture : Colonne de gauche, première lettre. Ligne du haut seconde lettre. </br>
				Exemple, ici : 3 mots avec deux 'a' qui se suivent : afrikaans, kraal, kraals parmis plus de 300 000 !
			</p>

</body>
</html>
