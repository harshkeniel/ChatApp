<?php
  include_once "header.php";
?>
<body>
  <div class="wrapper">
  	<section class="form contact-us">
      <header>Chat App - Contact Us</header>
      <form action="" method="POST">
        <div class="error-text">This is an error message!!</div>
      	<div class="name-details">
          <div class="field input">
            <label>First Name</label>
            <input type="text" name="fname" placeholder="First name" required>
          </div>
          <div class="field input">
            <label>Last Name</label>
            <input type="text" name="lname" placeholder="Last name" required>
          </div>
        </div>
        <div class="field input">
          <label>Email Address</label>
          <input type="text" name="email" placeholder="Enter your email" required>
		  <i class="fas fa-envelope"></i>
        </div>
        <div class="field input">
          <label>Message</label>
          <input type="text" name="msg" placeholder="Enter Message" required>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Send Message">
        </div>
      </form>
      <div class="link">Already signed up? <a href="login.php">Login now</a></div>
      <div class="link">Not yet signed up? <a href="index.php">Signup now</a></div>
	</section>  
  </div>
  <script src="./javascript/contact-us.js"></script>
</body>
</html>