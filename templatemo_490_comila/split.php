<?php
$string = "9/99";
/* Use tab and newline as tokenizing characters as well  */
$tok = strtok($string, "/");
$month=0;
$year=0;
$i=0;
while ($tok !== false) {
	if($i==0)
		$month=$tok;
	else
		$year=$tok;
    $i=$i+1;
    $tok = strtok("/");
}
echo "montha=".$month;
echo "<br>Year".$year;

$currmonth=date("m");
$currYear=date("y");

echo "<br>".$currmonth;
echo "<br>".$currYear;


?>