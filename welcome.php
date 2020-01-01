<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1"> <!-- for mobile -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
	<link href="miscstyle.css" rel="stylesheet" type="text/css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<title>FindATutor</title>

  </head>
<body>

	<nav class="navbar navbar-default navbar-fixed-top">
	  <div class="container">
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span> 
		  </button>
		  <a class="navbar-brand" href="#"><b>FindATutor</b></a>
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav navbar-center">
				<li><a href="index.php?operation=howitworks">HOW IT WORKS</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><p class="navbar-text">Already have an account?</p></li>
				<li class="dropdown">
				  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
					<ul id="login-dp" class="dropdown-menu">
						<li>
							 <div class="row">
									<div class="col-sm-10 col-sm-offset-1">
										 <form class="form" role="form" method="post" action="index.php" accept-charset="UTF-8" id="login-nav">
												<div class="form-group">
													 <label class="sr-only" for="email">Email address</label>
													 <input type="email" class="form-control" name="email" id="email" placeholder="Email address" required>
												</div>
												<div class="form-group">
													 <label class="sr-only" for="password">Password</label>
													 <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
													 <div class="help-block text-right"><a href="">Forgot password?</a></div>
												</div>
												<div class="form-group">
													 <button type="submit" value="login" name="login" class="btn btn-primary btn-block">
													Sign in</button>
												</div>
												<div class="checkbox text-center">
													 <label>
													 <input type="checkbox"> Keep me logged-in
													 </label>
												</div>
										 </form>
									<div class="bottom text-center">
										New here ? <a href="#tf-register"><b>Join Us</b></a>
									</div>
								</div>
							 </div>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	  </div>
	</nav>

	
	<div class="container-fluid bg-teal text-center" id = "tf-register">
			<h3>New? Register now!</h3><br>
			<form class="form-horizontal" method = "post">
				<div class="form-group">
					<div class="col-sm-2 col-sm-offset-4">
						<input type="text" class="form-control" id="firstname" placeholder="First Name" required autocomplete="off" name="firstname">
					</div>
					<div class="col-sm-2">
						<input type="text" class="form-control" id="lastname" placeholder="Last Name" required autocomplete="off" name="lastname">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-4 col-sm-offset-4">
					<input type="email" class="form-control" id="email" placeholder="Email Address" type="email" required autocomplete="off" name="email">

					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-4 col-sm-offset-4"> 
						<input type="password" class="form-control" id="pwd" placeholder="Password" name="password" autocomplete="off" required autocomplete="off">

					</div>
				</div><br>
				<div class="form-group"> 
					<div class="col-sm-offset-1 col-sm-10">
						<button type="submit" name = "register" value = "register" class="btn btn-default">Register</button>
					</div>
				</div>
			</form>
	</div>
	
	<div class="container-fluid bg-white text-center">
		<h2>What is FindATutor?</h2>
		<h4>Find a tutor anytime, anywhere.</h4><br>
		<div class ="row">
			<div class="col-sm-5 col-sm-offset-2">
				<p class ="text-justify">
				FindATutor is a web application designed to help students from high school to university find a tutor to help them with their studies. Students can fill out a form indicating what kind of help they need and tutors can fill out a form indicating what kind of help they are willing to provide. Available students and tutors are then automatically matched based on each of their preferences.
				</p>
			</div>
			<div class = "col-sm-3">
			  <img src="welcomeimage.png" class="img-responsive margin" style="display:inline" width="225" height="225">
			</div>
		</div>
	</div>

	
	<div id="services" class="container-fluid bg-lightgrey text-center">
	  <h2>FEATURES</h2>
	  <h4>What we offer</h4>
	  <br>
	  <div class="row">
		<div class="col-sm-4">
		  <span class="glyphicon glyphicon-time"></span>
		  <h4>AUTOMATIC MATCHING</h4>
		  <p>Suitable students and tutors are automatically matched</p>
		</div>
		<div class="col-sm-4">
		  <span class="glyphicon glyphicon-user"></span>
		  <h4>IN-PERSON MEETINGS</h4>
		  <p>Support for in-person tutoring meet-ups</p>
		</div>
		<div class="col-sm-4">
		  <span class="glyphicon glyphicon-road"></span>
		  <span class="glyphicon glyphicon-usd"></span>
		  <h4>PREFERENCES</h4>
		  <p>Ability to specific distance and price preferences</p>
		</div>
	  </div>
	  <br>
	
	</div>
		
	<footer class="container-fluid footer bg-darkgrey text-center">
		<div class="col-sm-2 col-sm-offset-5">
		<a href = #>About Us</a>
		</div>
	</footer>
	
</body>
</html>