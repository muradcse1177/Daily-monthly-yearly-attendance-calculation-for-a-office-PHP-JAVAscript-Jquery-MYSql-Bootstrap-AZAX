<?php
$tag="<reply>
ms=8801551617271|
tid=12401612191007236546|
operation=bsub|
result_code=0|
result_desc=Operation successful.|
previous_balance=2293|
current_balance=2054|
time=2016-12-19 12:29:52
</reply>";

$str2 = explode ("|", substr(substr($tag, 7), 0, -8));
for ($x = 0; $x <8; $x++) {
    $str3 = explode ("=", $str2[$x]);	
	$items[] = $str3[1];
}
 $ms=$items[0];
 $tid=$items[1];
 $operation=$items[2];
 $result_code=$items[3];
 $result_desc=$items[4];
 $previous_balance=$items[5];
 $current_balance=$items[6];
 $time=$items[7];
 echo $ms ."<br>" .$tid ."<br>" .$operation ."<br>". $result_code ."<br>". $result_desc ."<br>". $previous_balance ."<br>". $current_balance ."<br>" .$time; 
?>
