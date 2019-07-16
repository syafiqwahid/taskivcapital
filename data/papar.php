<?php 
$strJsonFileContents = file_get_contents("data/evaluation-20190711.json");
$array = json_decode($strJsonFileContents,true);
$csv=array();
foreach($array['data'] as $key=> $ev){
	//echo $key;
	$no=1;
	foreach($ev['evaluation']['score'] as $key2=>$row){	
	$csv[$key][$key2]['title']=$ev['evaluation']['title'];
	$csv[$key][$key2]['test']='test_'.$no;	
	$csv[$key][$key2]['score']=$row['test_'.$no];	
	$no++;
	}
}
?>