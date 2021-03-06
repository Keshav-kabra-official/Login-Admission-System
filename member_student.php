<?php 
session_start();
if(!isset($_SESSION["sess_user"]) && !isset($_SESSION['id'])){
	header("location:login_admin.php");
}
?>

<!-- ---------------------------------------------------------------------------------------------- -->
<!DOCTYPE html>
<html>

	<head>
        <title>STUDENT PANEL</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
        <link href='custom.css' rel='stylesheet' type='text/css'>

        <style type="text/css">
            body{
                background: lightpink;
            }
            .avatar {
			    vertical-align: middle;
			    width: 40px;
			    height: 40px;
			    border-radius: 50%;
			    margin-left: 5px;
			    margin-right: 30px;
			}
			div .align-right {
			    text-align: right;
			    color:darkgreen;
			    font-size: 30px;
			}
			.php_class{
				margin-left: 30px;
			}
			img{
				float: right;
				margin-right: 280px;
			}
        </style>
    </head>

	<body>
		<div id="container">
	        <img src="avatar.png" alt="Avatar" class="avatar" align="right">
	        <div class="align-right">
	    		<h2 style="margin-top: 30px;" title="Current Username"><?php $user=$_SESSION['sess_user']; echo "$user"?>
			</div>
		</div>
		<div class="align-right">
			<a href="logout.php" style="margin-left: 1265px;" class="btn btn-danger">Logout</a>
		</div>

		<form method="post" action="" role="form">
            <button type="submit" name="submit" value="submit" class="btn btn-primary">View Your Profile</button>
        </div>
    	</form>
    	<hr>
		<a href="change_password_student.php">Change Your Password</a>
		<hr>
		<a href="show_attendance_student.php">View Your Attendance</a>
		<hr>
		<a href="show_notice.php">Read Notices</a>


		<?php
	    if(isset($_POST["submit"])){

	    	$xid = $_SESSION['id'];

	    	$con=mysqli_connect('localhost','root','') or die(mysqli_error());
	    	mysqli_select_db($con,'student_register') or die("cannot select DB");

	        $query=mysqli_query($con, "SELECT * FROM student_info WHERE id=$xid");
	        $numrows=mysqli_num_rows($query);

	        if($numrows!=0)
	        {
	            $row=mysqli_fetch_assoc($query);

	            $id = $row['id'];
	            $course = $row['course'];
	            $branch = $row['branch'];
	            $sem = $row['sem'];
	            $mode_admission = $row['mode_admission'];
	            ///
	            $image = $row['image'];
	            ///
                $fname = $row['fname'];
                $lname = $row['lname'];
                $mother_name = $row['mother_name'];
                $father_name = $row['father_name'];
                $gender = $row['gender'];
                $dob = $row['dob'];
                $category = $row['category'];
                ///
                $address = $row['address'];
                $state = $row['state'];
                $district = $row['district'];
                $pin = $row['pin'];
                $father_mob = $row['father_mob'];
                $mother_mob = $row['mother_mob'];
                $self_mob = $row['self_mob'];

                echo "<div class='php_class'>";

                echo "<br><br>";
	            echo "<b><br><br>-------------------------- YOUR DETAILS --------------------------<br><br></b>";

	            $wid = 300;
                echo "<img src='image_stud/".$row['image']."' width=$wid >";
	            ///
                echo "<b>NAME :</b> $fname $lname &emsp;&emsp; <b>ID :</b> $id <br>";
                echo "<b>MOTHER NAME :</b> $mother_name &emsp;&emsp; <b>FATHER NAME :</b> $father_name <br>";
                echo "<b>GENDER :</b> $gender &emsp;&emsp; <b>DOB :</b> $dob <br>";
                echo "<b>CATEGORY :</b> $category <br>";
                ///
                echo "<b>COURSE :</b> $course &emsp;&emsp; <b>BRANCH :</b> $branch <br>";
                echo "<b>SEMESTER :</b> $sem &emsp;&emsp; <b>MODE OF ADMISSION :</b> $mode_admission <br>";
                ///
                echo "<b>ADDRESS :</b> $address <br>";
                echo "<b>STATE :</b> $state &emsp;&emsp; <b>DISTRICT :</b> $district &emsp;&emsp; <b>PIN :</b> $pin <br>";
                ///
                echo "<b>FATHER MOBILE :</b> $father_mob <br>";
                echo "<b>MOTHER MOBILE :</b> $mother_mob <br>";
                echo "<b>SELF MOBILE :</b> $self_mob <br>";
                ///
                
                ///
                echo "</div>";
	            
	        } else {
	        echo "This Student was not Found !!!";
	        }
		}
		?>

	</body>

</html>