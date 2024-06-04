<?php
$fname="count.txt";
$count[1]=1;

if(file_exists($fname))
{
    $count=file_get_contents($fname);
    $count=explode("=",$count);
    $count[1] +=1;
    $file=fopen($fname,"w+");
    fwrite($file,"count=$count[1]");
    fclose($file);

    print "The privious visitors are :";

    for($x=0;$x<=$count[1];$x++)
     print "$x<br>";

     print "The current visitor is $count[1]";
}