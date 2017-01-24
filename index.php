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
