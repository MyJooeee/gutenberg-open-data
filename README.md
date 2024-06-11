_Author : Jonathan Dancette_

The purpose of this project is to :
- Analyze structure of french words to create statistics
- Compute them into sentences from more than 300 thousands french words analyzed

Thanks to Project Gutenberg for open data.

**Note: How the random draw function works**:

For a given letter, probability of drawing the consecutive letter

Fictitious dataset:

$data = [
	'a' => 2,
	'b' => 8,
	'c' => 4,
];

Here $data is equivalent to:

$data = ['a', 'a', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'c', 'c', 'c', 'c'];

On a random draw with equal probability, equivalently we also have:

$data = ['a', 'a', 'c', 'c', 'c', 'c', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b'];

Sorted in ascending order of appearance, that's what interests us here

Equivalent to an equiprobable draw out of 14:

$data = [
	'a' => 2,
	'c' => 6,
	'b' => 14,
];