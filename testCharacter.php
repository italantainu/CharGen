<?php
require_once 'character.class.php';

$chars = array();
$chars[] = new character();
$chars[] = new character(123);
$chars[] = new character('test');

if (isset($_GET['s'])) {
	$params = array();
	foreach ($_GET as $param=>$value) {
		if ($param != 's') {
			$params[$param] = $value;
		}
	}
	$chars[] = new character($_GET['s'],$params);
}


foreach ($chars as $char) {
	echo "<h3>Character (".$char->seed.")</h3>";
	foreach ($char->listAttributes() as $attribute) {
		echo "$attribute: ". $char->$attribute."<br />";
	}
	echo "<hr />";
}

$seed = mt_rand();
echo "<h3> Characters ($seed) - Testing if the order of getting attribute matter</h3>";
$char1 = new character($seed);
$char2 = new character($seed);
echo 'Char1 name: '.$char1->name.'<br />';
echo 'Char1 age: '.$char1->age.'<br />';
echo 'Char2 age: '.$char2->age.'<br />';
echo 'Char2 name: '.$char2->name.'<br />';
