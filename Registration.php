<?php 
    require "DbConnect.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registration</title>
    </head>

    <body>
        <?php

             $fnameErr=$lnameErr=$genderErr=$dobErr=$errorMessage=$religionErr=$emailErr=$successfulMessage=$userNameErr=$passwordErr="";
             $fname=$lname=$gender=$dob=$religion=$present_address=$parmanent_address=$phone=$email=$link=$userName=$password="";
             
             
             $successfulMessage=$errorMessage="";
             $flag=false;
             
            if($_SERVER['REQUEST_METHOD']=='POST')
            {
                

                if(empty($_POST['fname']))
                {
                    $fnameErr="*Please fill up Properly";
                    $flag=true;
                    
                }
                
                if(empty($_POST['lname']))
                {
                    $lnameErr="**Please fill up Properly";
                    $flag=true;
                    
                }
                if(empty($_POST['gender']))
                {
                    $genderErr="*Please fill up Properly";
                    $flag=true;
                    
                }
                if(empty($_POST['dob']))
                {
                    $dobErr="*Please fill up Properly";
                    $flag=true;
                    
                }
                if(empty($_POST['religion']))
                {
                    $religionErr="*Please fill up Properly";
                    $flag=true;
                }
                if(empty($_POST['email']))
                {
                    $emailErr="*Please fill up Properly";
                    $flag=true;
                    
                }
                if(empty($_POST['username']))
                {
                    $userNameErr="*Please fill up Properly";
                    $flag=true;
                }
                if(empty($_POST['password']))
                {
                    $passwordErr="*Please fill up Properly";
                    $flag=true;
                    
                }

                if(!$flag)
                {
                    $fname=test_name($_POST['fname']);
                    $lname=test_name($_POST['lname']);
                    $gender=test_name($_POST['gender']);
                    $dob=test_name($_POST['dob']);
                    $religion=test_name($_POST['religion']);
                    $email=test_name($_POST['email']);
                    $userName=test_name($_POST['username']);
                    $password=test_name($_POST['password']);

                    
                    $result=register($fname,$lname,$gender,$dob,$religion,$email,$userName,$password);

                    if($result)
                    {
                        $successfulMessage= "Registration Successful";
                    }
                    else
                    {
                        $errorMessage="Registration Failed";
                    }
                }
                

            }
            function test_name($data)
            {
                $data=trim($data);
                $data=stripcslashes($data);
                $data=htmlspecialchars($data);
                return $data;
            }
        ?>

            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
            <h2>Registration Form:</h2>
            <fieldset>
                <legend>Basic Information:</legend>
                <label for="fname">First Name:</label>
                <input type="text" id="fname" name="fname" ><span style="color : red;"><?php echo $fnameErr; ?></span>
                <br><br>
                <label for="lname">Last Name:</label>
                <input type="text" id="lname" name="lname" ><span style="color : red;"><?php echo $lnameErr; ?></span>
                <br><br>
                <label for ="gender">Gender :</label>
                <br>
                <input type="radio" id="male" name="gender" value="male" >
                <label for="male">Male</label><br>
                <input type="radio" id="female" name="gender" value="female" >
                <label for="female">Female</label><br>
                <input type="radio" id="other" name="gender" value="other" >
                <label for="other">Other</label>
                <span style="color : red;"><?php echo $genderErr; ?></span>
                <br><br>
                <label for="dob">Date of Birth:</label>

                <input type="date" id="dob" name="dob" ><span style="color : red;"><?php echo $dobErr; ?></span>
                <br><br>
                <label for="religion">Religion:</label>
                <select name="religion" id="religion" >
                    <option value="Islam">Islam</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Cristan">Cristan</option>
                    <option value="Buddhism">Buddhism</option>
                </select>
                <span style="color : red;"><?php echo $religionErr; ?></span>
                
                <br>

            </fieldset>

            <fieldset>
                <legend>Contact Information:</legend>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" placeholder="abcd@gmail.com" pattern=".+@+.+.com" ><span style="color : red;"><?php echo $emailErr; ?></span>
                

            </fieldset>

            <fieldset>
                <legend>Account Information:</legend>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" ><span style="color : red;"><?php echo $userNameErr; ?></span>
                <br><br>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" pattern=".{4,}" ><span style="color : red;"><?php echo $passwordErr; ?></span>
                <br><br>
                <input type="submit" value="submit">
                <br><br>
                <span style =" color : green;"><?php echo "<b>" .$successfulMessage  ."</b>"; ?></span>
                <span style =" color : green;"><?php echo "<b>" .$errorMessage  ."</b>"; ?></span>
            </fieldset>

            

        </form>
        <p><a href="login.php"><b style="color:red;">Click here</b></a>  for login.</p>

    </body>
</html>