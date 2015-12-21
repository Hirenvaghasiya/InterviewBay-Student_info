<?php
error_reporting(0);
$string = "Raj is the best programmer in the world";
$i = 0;
$wordArray = array();
$lenArray = array();
$cnt =0;
$preLen = 0;
$totalChar = 0;
$word = "";
while($string[$i] != NULL)
{
    if($string[$i] == " ")
    {
        $wordArray[$cnt] = $word;
        $cnt++;
        $word = "";
    }
    else
    {
        $word = $word.$string[$i];
    }
    $i++;
   
}

$wordArray[$cnt] = $word;

for($i = 0; $i<=$cnt; $i++)
{
    for($j=$i; $j<=$cnt;$j++)
    {
        if(Len($wordArray[$i]) > Len($wordArray[$j]))
        {
            $tmp = $wordArray[$i];
            $wordArray[$i] = $wordArray[$j];
            $wordArray[$j] = $tmp;
        }
        if(Len($wordArray[$i]) == Len($wordArray[$j]))
        {
            if(Cmp($wordArray[$i],$wordArray[$j]) == 1)
            {
                $tmp = $wordArray[$j];
                $wordArray[$j] = $wordArray[$i];
                $wordArray[$i] = $tmp;
            }
        }
    }
}
$i =0;
while($i <= $cnt)
{
    echo $wordArray[$i]."  ";
    $i++;
}
function Len($str)
{
    $len = 0;
    while($str[$len] != NULL)
    {
        $len++;
    }
    return $len;
}
function Cmp($str1, $str2)
{
    if($str1 > $str2)
    {
        return 1;
    }
    else if($str1 < $str2)
    {
        return -1;
    }
    else
    {
        return 0;
    }
}

?>
