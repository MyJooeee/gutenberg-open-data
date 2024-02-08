_Author : Jonathan Dancette_

The purpose of this project is to :
- Analyze structure of french words to create statistics
- Compute them into sentences from more than 300 thousands french words analyzed

Thanks to Project Gutenberg for open data.

**Note : Fonctionnement de la fonction de tirage aléatoire** :

Pour une lettre donnée, probabilité de tirer la lettre consécutive

Jeu de donnée fictif :

$data = [
	'a' => 2,
	'b' => 8,
	'c' => 4,
];

Ici $data équivalent à :

$data = ['a', 'a', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'c', 'c', 'c', 'c'];

Sur un tirage aléatoire avec équiprobabilité, de manière équivalente on a aussi :

$data = ['a', 'a', 'c', 'c', 'c', 'c', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b'];

Trié par ordre d'apparition croissant, c'est ce qui nous intèresse ici

Equivalent à un tirage équiprobable sur 14 :

$data = [
	'a' => 2,
	'c' => 6,
	'b' => 14,
]
