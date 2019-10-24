<?php

class DrawCellsService
{

	protected $wordsStatistics;

	public function __construct($wordsStatisticsService)
	{
		$this->wordsStatistics = $wordsStatisticsService;
	}

	public function drawCells()
	{

		$data = $this->wordsStatistics->getDataFromCSVFile();

		$coloredData = '<table>
							<thead class=\'letters\'>
	    						<tr>
	        						<th> </th> <th> a </th> <th> b </th> <th> c </th> 
	        						<th> d </th> <th> e </th> <th> f </th> <th> g </th>
	        						<th> h </th> <th> i </th> <th> j </th> <th> k </th>
	        						<th> l </th> <th> m </th> <th> n </th> <th> o </th>
	        						<th> p </th> <th> q </th> <th> r </th> <th> s </th>
	        						<th> t </th> <th> u </th> <th> v </th> <th> w </th>
	        						<th> x </th> <th> y </th> <th> z </th>
 	    						</tr>
							</thead>

							<tbody>';


		foreach ($this->wordsStatistics->getAlphabet() as $keyFirstLevel) {
			$coloredData .= '		<tr> <td class=\'letters\'>' . $keyFirstLevel . '</td>';
			foreach ($this->wordsStatistics->getAlphabet() as $keySecondLevel) {
				$coloredData .= '<td style="background-color:'. $this->getColor($data[$keyFirstLevel][$keySecondLevel]).'">' . $data[$keyFirstLevel][$keySecondLevel] . '</td>' ;
			}
			$coloredData .= '</tr>';
		}

	    $coloredData .= '		</tbody>
							</table>';

		return $coloredData;

	}

	protected function getColor($value)
	{
		$color = '#000000';

		if($value >= 50000) {
			$color = '#FF3333';
		} elseif ($value >= 40000) {
			$color = '#FF6B33';
		} elseif ($value >= 30000) {
			$color = '#FFA533';
		} elseif ($value >= 20000) {
			$color = '#FFE633';
		} elseif ($value >= 10000) {
			$color = '#FFFF33';
		} elseif ($value >= 5000) {
			$color = '#A8FF33';
		} elseif ($value >= 2500) {
			$color = '#33FF9F';
		} elseif ($value >= 1250) {
			$color = '#33FFE3';
		} elseif ($value >= 625) {
			$color = '#33CEFF';
		} elseif ($value >= 313) {
			$color = '#3399FF';
		} elseif ($value >= 156) {
			$color = '#3352FF';
		} elseif ($value >= 75) {
			$color = '#181149';
		} elseif ($value >= 35) {
			$color = '#484556';
		} elseif ($value >= 15) {
			$color = '#35343B';
		} elseif($value >= 8) {
			
		}

		return $color;
	}
}