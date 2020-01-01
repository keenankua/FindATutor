<!DOCTYPE html>
<html lang="en">
<head>
  <title>Find a Tutor</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="loggedinstyle.css" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style>

	@media (max-width: 767px) {
		.postalField, .searchButton {
			text-align: left;
		}
	}

	/* .....NavBar: Icon only with coloring/layout.....*/

	/*small/medium side display*/
	@media (min-width: 768px) {

		.postalField, .searchButton {
			text-align: center;
		}

		.filler {
			min-height: 380px;
		}

		.top-filler {
			min-height: 80px;
		}
	}

	@media (min-width: 1116px) {
		.filler {
			min-height: 350px;
		}

		.top-filler {
			min-height: 80px;
		}

	}

	.btn {
		font-size: 18px;
		font-weight: bold;
	}

  </style>

  </head>
<body>
<script>
    function htmlbodyHeightUpdate(){
		var height3 = $( window ).height()
		var height1 = $('.nav').height()+50
		height2 = $('.main').height()
		if(height2 > height3){
			$('html').height(Math.max(height1,height3,height2)+10);
			$('body').height(Math.max(height1,height3,height2)+10);
		}
		else
		{
			$('html').height(Math.max(height1,height3,height2));
			$('body').height(Math.max(height1,height3,height2));
		}

	}
	$(document).ready(function () {
		htmlbodyHeightUpdate()
		$( window ).resize(function() {
			htmlbodyHeightUpdate()
		});
		$( window ).scroll(function() {
			height2 = $('.main').height()
  			htmlbodyHeightUpdate()
		});
	});




</script>

	<nav class="navbar top-navbar navbar-default navbar-fixed-top">
	  <div class="container">
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
		  <a class="navbar-brand" href="home.php"><b>FindATutor</b></a>
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav navbar-center">
				<li><a href="index.php?operation=becomeatutor">BECOME A TUTOR</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="index.php?operation=logout"><span class="glyphicon glyphicon-off"></span> LOGOUT</a></li>
			</ul>
		</div>
	  </div>
	</nav>


<div class ="container-fluid middle">
	<nav class="navbar navbar-inverse sidebar " role="navigation">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header side">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<div class="top-filler"></div>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
				<ul class="nav navbar-nav side">
					<li ><a href="index.php?operation=home">Home<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li>
					<li class = "active"><a href="index.php?operation=findatutor">Find a Tutor<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-search"></span></a></li>
					<li ><a href="index.php?operation=tutorForm">Tutor Dashboard<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-blackboard"></span></a></li>
				</ul>

			</div>
			<div class="filler"> </div>
		</nav>

		<div class="main" style="font-size:20px;">
			<form method="post">
				<div class="form-check col-sm-3">
					<label>Method</label><br>
					<div class="custom-checkbox">
						<input type="checkbox" name="online" id="online">
						<label for="online">Online</label>
					</div>
					<div class="custom-checkbox">
						<input type="checkbox" name="inperson" id="inperson">
						<label for="inperson">In-Person</label>
					</div><br>
				</div>
				<div class="form-group col-sm-3">
					<label>Subject</label><br>
					<label class="radioContainer" >Math
					  <input type="radio" checked="checked" name="subject" value="math">
					  <span class="checkmark"></span>
					</label>
					<label class="radioContainer">Physics
					  <input type="radio" value="physics" name="subject">
					  <span class="checkmark"></span>
					</label>
					<label class="radioContainer">Chemistry
					  <input type="radio"  value="chemistry" name="subject">
					  <span class="checkmark"></span>
					</label>
					<label class="radioContainer">Biology
					  <input type="radio" value="biology" name="subject">
					  <span class="checkmark"></span>
					</label>
					<label class="radioContainer">English
					  <input type="radio" value="english" name="subject">
					  <span class="checkmark"></span>
					</label>
					<label class="radioContainer">French
					  <input type="radio" value="french" name="subject">
					  <span class="checkmark"></span>
					</label>
					<label class="radioContainer">Spanish
					  <input type="radio" value="spanish" name="subject">
					  <span class="checkmark"></span>
					</label><br>
				</div>

				<div class="form-group col-sm-3">
					<label>Grade Level</label><br>
					<label class="radioContainer">Grade 9
					  <input type="radio" value="9" checked="checked" name="gradeLevel">
					  <span class="checkmark"></span>
					</label>
					<label class="radioContainer">Grade 10
					  <input type="radio" value="10" name="gradeLevel">
					  <span class="checkmark"></span>
					</label>
					<label class="radioContainer">Grade 11
					  <input type="radio" value="11" name="gradeLevel">
					  <span class="checkmark"></span>
					</label>
					<label class="radioContainer">Grade 12
					  <input type="radio" value="12" name="gradeLevel">
					  <span class="checkmark"></span>
					</label>
					<label class="radioContainer">First Year
					  <input type="radio" value="13" name="gradeLevel">
					  <span class="checkmark"></span>
					</label>
					<label class="radioContainer">Second Year
					  <input type="radio" value="14" name="gradeLevel">
					  <span class="checkmark"></span>
					</label>
					<label class="radioContainer">Third Year
					  <input type="radio" value="15" name="gradeLevel">
					  <span class="checkmark"></span>
					</label>
					<label class="radioContainer">Fourth Year
					  <input type="radio" value="16" checked="checked" name="gradeLevel">
					<span class="checkmark"></span>
					</label><br>
				</div>

				<div class="form-group col-sm-3">
					<label>Max Rate</label><br><br>
					<div class="slidecontainer">
					  <input type="range" name="rate" min="0" max="100" value="50" class="slider" id="rateRange">
					  <p class="sliderText">$<span id="rateSlider" required></span>/hr</p>
					</div><br>
					<label>Max Distance</label><br><br>
					<div class="slidecontainer">
					  <input type="range" name="maxDist" min="1" max="100" value="50" class="slider" id="distanceRange">
					  <p class="sliderText"><span id="distanceSlider" required></span> km</p>
					</div><br>
				</div>
				<div class="form-group form-inline">
					<div class="col-sm-offset-3 col-sm-6 postalField">
						<label>Your phone number&nbsp&nbsp</label> <input type="text" title="Please enter a valid cellphone number in the form +XXXXXXXXXX" name="studentNum" class="form-control" type="tel" id="studentNum" minlength="11" maxlength="11" placeholder="+XXXXXXXXXX" pattern="^\+\d{10}$" required>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-5 col-sm-2 searchButton"><br>
						<input  id="findtut" name="findtut" type="submit" class="btn btn-default" value="Find a Tutor!">
					</div>
				</div>
			</form>




		</div>
	</div>
</div>

	<footer class="container-fluid footer bg-darkgrey text-center">
		<div class="col-sm-2 col-sm-offset-5">
		<a href = #>About Us</a>
		</div>
	</footer>

<!--Max Rate Slider-->
<script>
	var rateSlider = document.getElementById("rateRange");
	var rateOutput = document.getElementById("rateSlider");
	rateOutput.innerHTML = rateSlider.value;

	rateSlider.oninput = function() {
	  rateOutput.innerHTML = this.value;
	}
</script>

<!--Max Distance Slider-->
<script>
	var distanceSlider = document.getElementById("distanceRange");
	var distanceOutput = document.getElementById("distanceSlider");
	distanceOutput.innerHTML = distanceSlider.value;

	distanceSlider.oninput = function() {
	  distanceOutput.innerHTML = this.value;
	}
</script>

</body>
</html>
