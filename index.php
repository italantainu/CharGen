<?php
require_once 'character.class.php';

echo "<hr />";
echo "<h3>Random Character</h3>";
$char = new character();
//echo "<pre>"; var_dump($char); echo "</pre>";
echo "Name: ".$char->name."<br />";
echo "Age: ".$char->age."<br />";
echo "Gender: ".$char->gender."<br />";

echo "<hr />";
echo "<h3>Character Seed:123</h3>";
$char2 = new character(123);
//echo "<pre>"; var_dump($char2); echo "</pre>";
echo "Name: ".$char2->name."<br />";
echo "Age: ".$char2->age."<br />";
echo "Gender: ".$char2->gender."<br />";

echo "<hr />";
echo "<h3>Character Seed:Test</h3>";
$char3 = new character("Test");
//echo "<pre>"; var_dump($char3); echo "</pre>";
echo "Age: ".$char3->age."<br />";
echo "Gender: ".$char3->gender."<br />";
echo "Name: ".$char3->name."<br />";

