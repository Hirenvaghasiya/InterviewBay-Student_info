<?php

$string = "Hiren is best programmer in the world";
$i = 0;
$wordArray = array();
$cnt =0;
$preLen = 0;

$word = "";
while($string[$i] != NULL)
{
    if($string[$i] == " ")
    {
        $preLen = $i - $preLen - $cnt ;
        $wordArray[$cnt] = $word;
        $word = "";
       echo $preLen."\n";
       $cnt++;
    }
    else
    {
        $word = $word.$string[$i];
    }
    $i++;
   
}
$wordArray[$cnt] = $word;
print_r($wordArray);    
 echo count($wordArray);
?>