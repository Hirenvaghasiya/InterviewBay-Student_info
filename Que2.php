<html>
    <head>
        
        <link href="style.css" rel="stylesheet" type="text/css">
        <title>Student Information</title>
    </head>
    <body>
        <div id="tabContainer">
            <h2 style="margin-top:0;
color:#fff;
background-color:#0B87AA;
text-align:center;
width:100%;
height:50px;
padding-top:30px;
font-size: xx-large;">Question-2</h2>
        <ul id="topTab">
            <li><a href="index.php" title="Home" class="current">Add Student</a></li>
            <li><a href="edit.php" title="Edit">Edit Details</a></li>
            <li><a href="Que2.php" title="Question-2">Question-2</a></li>
                        <li><a href="Que3.php" title="Question-2">Question-3</a></li>
        </ul>
    </div>
        <div id="mainform">
<div class="innerdiv">
    <form action="Que2.php" id="myForm" method='post' name="myForm">
<h3>Sort String Based on Length !</h3>
<table>
<tr>
<td>Enter String</td>
<td><input id='txtStr' name='txtStr' type='text'  required></td>
<td>
<div id='stdname'></div>
</td>
</tr>
</table>
<input type="submit" name="submit" value="Submit">

</form>

</div>
    
        
    <?php
if(isset($_POST['submit']))
{
    
    error_reporting(0);
    $string = $_POST['txtStr'];
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
   
    $wordArray[$cnt] = $word;
    $i=0;
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
    ?>
                   <div id="mainform">
                       <div class="innerdiv" style="margin: -100px 0 0 200px">
    
<h3>Result</h3>


              <?php
    while($i <= $cnt)
    {
    
        echo $wordArray[$i]."  ";
        $i++;
    }
    
}
?>
            </div>
            </div>
</body>
</html>
