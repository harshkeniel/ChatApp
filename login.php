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
    <section class="form login">
      <header>Chat App</header>
      <form>
		<div class="error-text">This is an error message!!</div>
        <div class="field input">
          <label>Email Address</label>
          <input type="email" name="email" placeholder="Enter your email" required>
        </div>
        <div class="field input">
          <label>Password</label>
          <input type="password" name="password" placeholder="Enter your password" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Log In">
        </div>
      </form>
      <div class="link">Not yet signed up? <a href="index.php">Signup now</a></div>
	  <div class="link">Any Queries? <a href="contact-us.php">Contact Us</a></div>
    </section>
  </div>
  <script src="./javascript/login.js"></script>
  <script src="./javascript/pass-show-hide.js"></script>
</body>
</html>
