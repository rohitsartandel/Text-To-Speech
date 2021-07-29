<!--
Into this file, we create a layout for login page.
-->

<?php
include_once('header.php');
include_once('link.php');

?>
<style type="text/css">
			body{
				background: #f6f6f6;
				background-image: url("pexels-matt-hardy-3560168.jpg");
				background-size: cover;
			}
			</style>



<div id="frmRegistration" style ="margin-left:30%; margin-top: 15%; border:1px solid white; background-color: white; padding-top:1rem; padding-bottom:1rem;">
  
<form class="form-horizontal" method="POST" action="login_code.php">
	<h1>User Login</h1>
	
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Email:</label>
    <div class="col-sm-6">
      <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Password:</label>
    <div class="col-sm-6"> 
      <input type="password" class="form-control" name="password" id="pwd" placeholder="Enter password">
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="login" class="btn btn-primary" >Login</button>
    </div>
  </div>
</form>
</div>