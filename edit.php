<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
   
    include 'db_connection.php';
    
    $query = "SELECT * FROM student";
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
font-size: xx-large;">Student Information System</h2>
        <ul id="topTab">
            <li><a href="index.php" title="Home" class="current">Add Student</a></li>
            <li><a href="edit.php" title="Edit">Edit Details</a></li>
            
        </ul>
    </div>
        <div class="innerdiv">
           <h2 style="margin-top:0;
color:#fff;
background-color:#0B87AA;
text-align:center;
margin: 0 0 0 340px;
width:58%;
height:50px;
padding-top:30px;
font-size: xx-large;">Student List</h2>
            <table style="background-color:#fff;
                          color:#123456;
                          box-shadow:0 1px 1px 1px gray;
                          width:1000px;
                          margin: 0px 200px 200px  170px;
                          float:left;
                        height: auto;
                        padding:10px;
                        font-size: large;
                     border: 1px solid black;">
                <tr>
                    <td><b>Name</b></td>
                    <td><b>Email</b></td>
                    <td><b>DOB</b></td>
                    <td><b>Phone</b></td>
                    <td><b>Collage  </b></td>
                    <td><b>Address</b></td>
                    <td><b>City</b></td>
                    <td><b>State</b></td>
                    <td><b>Country</b></td>
                    <td><b>Edit</b></td>
                </tr>
                <?php
                while ($row = mysqli_fetch_assoc($result))
                {
                 ?>
                <tr>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['email'];?></td>
                    <td style="width: 100px;"><?php echo $row['date_of_birth'];?></td>
                    <td><?php echo $row['phone'];?></td>
                    <td style="width: 100px;"><?php echo $row['collage'];?></td>
                    <td style="width: 300px;"><?php echo $row['address'];?></td>
                    <td style="width: 100px;"><?php echo $row['city'];?></td>
                    <td style="width: 100px;"><?php echo $row['state'];?></td>
                    <td ><?php echo $row['country'];?></td>
                    <td><a href="index.php?edit=true&email=<?php echo $row['email']; ?>"><img src="edit.png" height="10px"/> </a></td>
                    
                </tr>
                
                <?php
                }
                ?>
            </table>
            
        </div>
    </body>
</html>
