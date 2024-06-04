<?php
 $str[0]="Hello....";
 $str[1]="How are you..!";
 $str[2]="Howdy";
 $str[3]="whatsup";
 $str[4]="Have a nice day";

 function makeseed()
 {
     list($usec,$sec)=explode(' ',microtime());
     return (double)$usec+((double)$sec*1000000);
 }

mt_srand(makeseed());
$n=mt_rand(0,4);
print $str[$n];
?>