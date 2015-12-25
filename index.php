<?php
  include 'db_connection.php';
 //    $connecton = mysqli_connect($host, $user, $password, $database);

  if(isset($_GET['edit']))
  {
      $getEmail = $_GET['email'];
      $getData = "Select * from student where email = '".$getEmail."'";
      $result = mysqli_query($connection, $getData);
      $row = mysqli_fetch_array($result);
      
      
  }
    if(mysqli_connect_errno())
    {
        echo "faild".  mysqli_connect_error();
    }
    if (isset($_POST['submit']) )
    {
        
        $email = $_POST['email'];
            $query = "SELECT email FROM student WHERE email = '".$email."'";
          // echo $query;
            $result = mysqli_query($connection,$query) or die(mysql_error());
           
                $name = $_POST['stdName'];
                $dob = $_POST['dob'];
                $phNo = $_POST['phNo'];
                $collage = $_POST['collage'];
                $address1 = $_POST['address1'];
                
                $city = $_POST['city'];
                $state = $_POST['state'];
                $country = $_POST['country'];
                if($_POST['submit'] == "Add" && mysqli_num_rows($result) == 0)
                {
                     
                $query1 = "INSERT INTO student VALUES ('$name','$email','$dob',$phNo,'$collage','$address1','$city','$state','$country')";  
                mysqli_query($connection, $query1) or dir(mysqli_error($connection));
                header('Location:edit.php');
            
                }
                else if( $_POST['submit'] == "Update")
                {
                    $query =" update student set name = '$name',date_of_birth='$dob',phone=$phNo,collage='$collage',address='$address1',city='$city',state='$state',country='$country' WHERE email = '$email'";
                    $result = mysqli_query($connection, $query);
                    
                   $count = mysqli_affected_rows($connection);
                    if (isset($count)){
                        $sucsess =" Details Updates";
                    }
                }
                else
                {
                    $error = "Already";
                }    
          
        
        
    }
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
            <li><a href="Que2.php" title="Question-2">Question-2</a></li>
            <li><a href="Que3.php" title="Question-2">Question-3</a></li>
        </ul>
    </div>
        <div id="mainform">
<div class="innerdiv">
<!-- Required Div Starts Here -->
<?php
    if(isset($error))
    {
    ?>
<h2 style="color: red;margin-left:250px">*Error: Email ID Already Exists</h2>
   <?php
       unset($error);
    }
    if(isset($sucsess))
    {
     ?>
<h2 style="color: green;margin-left:250px"> Trasaction Perfomerd Sucessfully</h2>

    <?php   
    }
?>
<form action='index.php' id="myForm" method='post' name="myForm">
<h3>Fill Student Information!</h3>
<table style="border-color: ">
<tr>
<td>Name</td>
<td><input id='studentName' name='stdName' type='text' value="<?php if(isset($_POST['stdName'])){echo $_POST['stdName'];} if(isset($_GET['edit'])){ echo $row[0]; } ?>" required></td>
<td>
<div id='stdname'></div>
</td>
</tr>
<tr>
<td>Email</td>
<td><input id='email' name='email' type='email' value="<?php if(isset($_POST['email'])){echo $_POST['email'];} if(isset($_GET['edit'])){ echo $row[1]; } ?>" required></td>
<td>
<div id='email'></div>
</td>
</tr>
<tr>
<td>Date Of Birth</td>
<td><input id='dob' name='dob'  type='date' value="<?php if(isset($_POST['dob'])){echo $_POST['dob'];}if(isset($_GET['edit'])){ echo $row[2]; } ?>" required></td>
<td>
<div id='dob'></div>
</td>
</tr>
<tr>
<td>Phone No.</td>
<td><input id='phNo' name='phNo'  type='text' pattern="[789][0-9]{9}" value="<?php if(isset($_POST['phNo'])){echo $_POST['phNo'];} if(isset($_GET['edit'])){ echo $row[3]; } ?>" required></td>
<td>
<div id='phNo'></div>
</td>
</tr>
<tr>
<td>Collage</td>
<td><input id='collage' name='collage'  type='text' value="<?php if(isset($_POST['collage'])){echo $_POST['collage'];} if(isset($_GET['edit'])){ echo $row[4]; } ?>" required></td>
<td>
<div id='collage'></div>
</td>
</tr>
<tr>
<td>Address</td>
<td>
    <textarea rows="3" cols="4" name="address1" required><?php if(isset($_POST['address1'])){echo $_POST['address1'];} if(isset($_GET['edit'])){ echo $row[5]; } ?></textarea>
<!--<input id='address1' name='address1' type='text' value="<?php if(isset($_POST['address1'])){echo $_POST['address1'];} if(isset($_GET['edit'])){ echo $row[5]; } ?>" required></td>
--><td>
<div id='address1'></div>
</td>
</tr>

<tr>
<td>City</td>
<td><input id='city' name='city' ype='text' value="<?php if(isset($_POST['city'])){echo $_POST['city'];} if(isset($_GET['edit'])){ echo $row[6]; } ?>" required></td>
<td>
<div id='city'></div>
</td>
</tr>
<tr>
<td>State</td>
<td><input id='state' name='state' type='text' value="<?php if(isset($_POST['state'])){echo $_POST['state'];} if(isset($_GET['edit'])){ echo $row[7]; } ?>" required></td>
<td>
<div id='state'></div>
</td>
</tr>
<tr>
<td>Country</td>
<td><input id='country' name='country' type='text' value="<?php if(isset($_POST['country'])){echo $_POST['country'];} if(isset($_GET['edit'])){ echo $row[8]; } ?>" required></td>
<td>
<div id='country'></div>
</td>
</tr>
</table>
<input type="submit" name="submit" value="<?php if(isset($_GET['edit'])){echo "Update";} else {echo "Add";}?>">
</form>
</div>
    </body>
        
</html>
