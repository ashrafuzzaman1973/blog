<?php include "inc/header.php"; ?>
    <?php 
          if ($_SERVER['REQUEST_METHOD']=='POST') {
          	  $fname= $fm->vlidation($_POST['firstname']);
          	  $lname= $fm->vlidation($_POST['lastname']);
          	  $email= $fm->vlidation($_POST['email']);
          	  $body= $fm->vlidation($_POST['body']);


          	  $fname=mysqli_real_escape_string($db->link,$fname);
          	  $lname=mysqli_real_escape_string($db->link,$lname);
          	  $email=mysqli_real_escape_string($db->link,$email);
          	  $body=mysqli_real_escape_string($db->link,$body);

          	  $error="";
          	  if (empty($fname)) {
          	  	$error="First name must not to  be empty !";
          	  }elseif (empty($lname)) {
          	  	$error="Last name must not to  be empty !";
          	  }elseif (empty($email)) {
          	  	$error="Email field must not to be empty!";
          	  }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          	  	$error="Invalid email address";
          	  }elseif (empty($body)) {
          	  	$error="Message field must not  to  be  empty !";
          	  }else{
          	  	    $query="INSERT  INTO tbl_contact (firstname,lastname,email,body) VALUES ('$fname','$lname','$email','$body')";
                        $inserted_rows=$db->insert($query);
                        if ($inserted_rows) {
                         $msg="Message Send successfully";

                        }else{
          	  	         $error="Message not Send!";

                        }
          	  }

          	  }
    ?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<h2>Contact us</h2>
				<?php 
                  if (isset($error)) {
                  	echo "<span style='color:red'>$error</span>";
                  }
                  if (isset($msg)) {
                  	 echo "<span style='color:green'>$msg</span>";
                  }
				?>
			<form action="" method="post">
				<table>
				<tr>
					<td>Your First Name:</td>
					<td>
					<input type="text" name="firstname" placeholder="Enter first name" required="1"/>
					</td>
				</tr>
				<tr>
					<td>Your Last Name:</td>
					<td>
					<input type="text" name="lastname" placeholder="Enter Last name" required="1"/>
					</td>
				</tr>
				
				<tr>
					<td>Your Email Address:</td>
					<td>
					<input type="email" name="email" placeholder="Enter Email Address" required="1"/>
					</td>
				</tr>
				<tr>
					<td>Your Message:</td>
					<td>
					<textarea name="body"></textarea>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
					<input type="submit" name="submit" value="Send"/>
					</td>
				</tr>
		</table>
	<form>				
 </div>

		</div>
	<?php include "inc/sidebar.php"; ?>
    <?php include "inc/footer.php"; ?>