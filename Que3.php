<?php
        include 'db_connection.php';
        $query = "select FLOOR ((datediff(date_of_birth,CURRENT_DATE) /(-365.25))) as Age, count(name) as No_Of_Employee 
from employee group by Age having Age between 30 AND 50";
        $result = mysqli_query($connection, $query);
?>
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
font-size: xx-large;">Question-3</h2>
        <ul id="topTab">
            <li><a href="index.php" title="Home" class="current">Add Student</a></li>
            <li><a href="edit.php" title="Edit">Edit Details</a></li>
            <li><a href="Que2.php" title="Question-2">Question-2</a></li>
                        <li><a href="Que3.php" title="Question-2">Question-3</a></li>
        </ul>
    </div>
        <div id="mainform">
<div class="innerdiv">
               <h2 style="margin-top:0;
    color:#fff;
    background-color:#0B87AA;
    text-align:center;
    margin: 0 0 0 400px;
    width:58%;
    height:50px;
    padding-top:30px;
    font-size: large;">No. Of Employee who's Age Between 30 And 50 </h2>
    <h2 style="margin: 0 0 0 200px"><?php echo $query; ?></h2>
                <table style="background-color:#fff;
                              color:#123456;
                              box-shadow:0 1px 1px 1px gray;
                              width:400px;
                              margin: 10px 200px 200px  380px;
                              float:left;
                              text-align: center;
                            height: auto;
                            padding:10px;
                            font-size: large;

                            border-collapse: collapse;
                         " border="3px solid " >
                    
                    <tr>
                        <td><b>Age</b></td>
                        <td><b>No. Of Employee</b></td>
                       
                    </tr>
            
 <?php
                    while ($row = mysqli_fetch_assoc($result))
                    {
                     ?>
                    <tr>
                        <td><?php echo $row['Age'];?></td>
                        <td><?php echo $row['No_Of_Employee'];?></td>
                        
                    </tr>

                    <?php
                    }
                    ?>
</table>
</div>
    
           </div>
            </div>
</body>
</html>
