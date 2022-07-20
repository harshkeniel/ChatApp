<?php
  session_start();
  if(isset($_SESSION['unique_id'])){
      header("location: users.php");
  }
?>
<?php
  include_once "header.php";
?>
<body>
  <div class="wrapper">
	<section class="form signup">
      <header>Chat App</header>
      <form action="#" enctype="multipart/form-data">
		<div id="error-text" class="error-text">This is an error message!!</div>
        <div class="name-details">
          <div class="field input">
            <label>First Name</label>
            <input type="text" name="fname" id="fname" pattern="[A-Za-z]+" placeholder="First name" required>
          </div>
          <div class="field input">
            <label>Last Name</label>
            <input type="text" name="lname" id="lname" pattern="[A-Za-z]+" placeholder="Last name" required>
          </div>
        </div>
        <div class="field input">
          <label>Email Address</label>
          <input type="email" name="email" placeholder="Enter your email" required>
        </div>
        <div class="field input">
          <label>Password</label>
          <input type="password" name="password" placeholder="Enter new password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
		  <i class="fas fa-eye"></i>
        </div>
        <div class="field image">
          <label>Select Image</label>
          <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
        </div>
        <div class="field button">
          <input type="submit" value="Sign Up">
        </div>
      </form>
      <div class="link">Already signed up? <a href="login.php">Login now</a></div>
	  <div class="link">Any Queries? <a href="contact-us.php">Contact Us</a></div>
	</section>  
  </div>
  <script src="javascript/signup.js"></script>
  <script src="javascript/pass-show-hide.js"></script>
</body>
</html>