<?php
include "data/papar.php";
include "simple_html_dom.php";

$table = '<table border="2">';
$table.= '<tr>';
$table.= '<th>Title</th>';
$table.= '<th>Test</th>';
$table.= '<th>Score</th>';
$table.= '</tr>';
foreach($csv[$_GET["x"]] as $row){
		$table.= '<tr>';
		$table.= '<td>'.$row['title'].'</td>';
		$table.= '<td>'.$row['test'].'</td>';
		$table.= '<td>'.$row['score'].'</td>';
		$table.= '</tr>';
	}
$table.= '</table>';

$html = str_get_html($table);

header('Content-type: application/ms-excel');
header('Content-Disposition: attachment; filename=testiv.csv');

$fp = fopen("php://output", "w");

foreach($html->find('tr') as $element)
{
    $td = array();
foreach( $element->find('th') as $row)
{
    $td [] = $row->plaintext;
}

foreach( $element->find('td') as $row)
{
    $td [] = $row->plaintext;
}
fputcsv($fp, $td);
}

fclose($fp);
?>