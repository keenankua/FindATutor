<!DOCTYPE html>
<html lang="en">
<head>
  <title>Tutor Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="loggedinstyle.css" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style>

	@media (min-width: 1631px) {
		.filler {
			min-height: 250px;
		}
	}

	@media (min-width: 768px) and (max-width: 1630px) {
		.filler {
			min-height: 415px;
		}
	}

	@media (max-width: 767px) {
		.postalField, .availabilitySwitch {
			text-align: left;
		}
	}

	/* .....NavBar: Icon only with coloring/layout.....*/

  	@media (min-width: 768px) {
		.postalField, .availabilitySwitch {
			text-align: center;
		}

		.top-filler {
			min-height: 80px;
		}
	}

	.gradeCap {
		width:130px;
		height: 27px;
		float: right;
		margin-right: 40%;
		font-size: 12px;
	}

	.btn-default.btn-on.active {
		background-color: #1abc9c;color: white;
	}

	.btn-default.btn-off.active {
		background-color: #DA4F49;color: white;
	}

	.btn {
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
		  <a class="navbar-brand" href="index.php?operation=home"><b>FindATutor</b></a>
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
					<li><a href="index.php?operation=home">Home<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li>
					<li ><a href="index.php?operation=findatutor">Find a Tutor<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-search"></span></a></li>
					<li class = "active"><a href="index.php?operation=tutorForm">Tutor Dashboard<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-blackboard"></span></a></li>
				</ul>

			</div>
			<div class="filler"> </div>
		</nav>

		<div class="main" style="font-size:20px;">
			<form  id="findStudent" method="post">
				<div class="form-check col-sm-3" >
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
				
				<div class="form-group form-inline col-sm-5">
					<label>Subjects</label><br>
					<div class="custom-checkbox">
						<input type="checkbox" class="subject" name="math" id="math" >
						<label for="math">Math&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>

						<select name="mathCap" id="mathCap" class="form-control gradeCap circle-select">
							<!-- <option selected="selected" value="16">Max Grade</option> -->
							<option value="9">Grade 9</option>
							<option value="10">Grade 10</option>
							<option value="11">Grade 11</option>
							<option value="12">Grade 12</option>
							<option value="13">First Year</option>
							<option value="14">Second Year</option>
							<option value="15">Third Year</option>
							<option selected="selected"  value="16">Fourth Year</option>
						</select>

					</div>
					<div class="custom-checkbox">
						<input type="checkbox" class="subject" name="physics" id="physics">
						<label for="physics">Physics&nbsp&nbsp&nbsp&nbsp</label>
						<select name="physicsCap" id="physicsCap" class="form-control gradeCap circle-select">
							<!-- <option selected="selected" value="16">Max Grade</option> -->
							<option value="9">Grade 9</option>
							<option value="10">Grade 10</option>
							<option value="11">Grade 11</option>
							<option value="12">Grade 12</option>
							<option value="13">First Year</option>
							<option value="14">Second Year</option>
							<option value="15">Third Year</option>
							<option selected="selected"  value="16">Fourth Year</option>
						</select>
					</div>
					<div class="custom-checkbox">
						<input type="checkbox" class="subject" name="chemistry" id="chemistry">
						<label for="chemistry">Chemistry</label>
						<select name="chemistryCap" id="chemistryCap" class="form-control gradeCap circle-select">
							<!-- <option selected="selected" value="16">Max Grade</option> -->
							<option value="9">Grade 9</option>
							<option value="10">Grade 10</option>
							<option value="11">Grade 11</option>
							<option value="12">Grade 12</option>
							<option value="13">First Year</option>
							<option value="14">Second Year</option>
							<option value="15">Third Year</option>
							<option selected="selected"  value="16">Fourth Year</option>
						</select>
					</div>
					<div class="custom-checkbox">
						<input type="checkbox" class="subject" name="biology" id="biology">
						<label for="biology">Biology&nbsp&nbsp&nbsp&nbsp</label>
						<select name="biologyCap" id="biologyCap" class="form-control gradeCap circle-select">
							<!-- <option selected="selected" value="16">Max Grade</option> -->
							<option value="9">Grade 9</option>
							<option value="10">Grade 10</option>
							<option value="11">Grade 11</option>
							<option value="12">Grade 12</option>
							<option value="13">First Year</option>
							<option value="14">Second Year</option>
							<option value="15">Third Year</option>
							<option selected="selected"  value="16">Fourth Year</option>
						</select>
					</div>
					<div class="custom-checkbox">
						<input type="checkbox" class="subject" name="english" id="english">
						<label for="english">English&nbsp&nbsp&nbsp&nbsp</label>
						<select name="englishCap" id="englishCap" class="form-control gradeCap circle-select">
							<!-- <option selected="selected" value="16">Max Grade</option> -->
							<option value="9">Grade 9</option>
							<option value="10">Grade 10</option>
							<option value="11">Grade 11</option>
							<option value="12">Grade 12</option>
							<option value="13">First Year</option>
							<option value="14">Second Year</option>
							<option value="15">Third Year</option>
							<option selected="selected"  value="16">Fourth Year</option>
						</select>
					</div>
					<div class="custom-checkbox">
						<input type="checkbox" class="subject" name="french"  id="french">
						<label for="french">French&nbsp&nbsp&nbsp&nbsp&nbsp</label>
						<select name="frenchCap" id="frenchCap" class="form-control gradeCap circle-select">
							<!-- <option selected="selected" value="16" >Max Grade</option> -->
							<option value="9">Grade 9</option>
							<option value="10">Grade 10</option>
							<option value="11">Grade 11</option>
							<option value="12">Grade 12</option>
							<option value="13">First Year</option>
							<option value="14">Second Year</option>
							<option value="15">Third Year</option>
							<option selected="selected"  value="16">Fourth Year</option>
						</select>
					<div class="custom-checkbox">
						<input type="checkbox" class="subject" name="spanish" id="spanish">
						<label for="spanish">Spanish&nbsp&nbsp&nbsp</label>
						<select name="spanishCap" id="spanishCap" class="form-control gradeCap circle-select">
							<!-- <option selected="selected" value="16">Max Grade</option> -->
							<option value="9">Grade 9</option>
							<option value="10">Grade 10</option>
							<option value="11">Grade 11</option>
							<option value="12">Grade 12</option>
							<option value="13">First Year</option>
							<option value="14">Second Year</option>
							<option value="15">Third Year</option>
							<option selected="selected"  value="16">Fourth Year</option>
						</select>
					</div>
					</div><br>
				</div>


				<div class="form-group col-sm-4">
					<label>Rate</label><br><br>
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
						<label>Your phone number&nbsp&nbsp</label> <input type="text" title="Please enter a valid cellphone number in the form +XXXXXXXXXX" name="tutorNum" class="form-control" type="tel" id="tutorNum" minlength="11" maxlength="11" placeholder="+XXXXXXXXXX" pattern="^\+\d{10}$" required>
					</div>
				</div>
				<div class="form-group form-inline">
					<div class="col-sm-offset-3 col-sm-6 availabilitySwitch"><br>
						<input  id="findtut" name="findtut" type="submit" class="btn btn-default" value="Find a Student!">
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

<script>
  $(function() {
    $('#findStudent').submit(function (e) {
        //check atleat 1 checkbox is checked
        if (!$('.subject').is(':checked')) {
            //prevent the default form submit if it is not checked
            alert("Select a subject to tutor");
            e.preventDefault();
        }
    });
    $('#toggle-two').bootstrapToggle({
      on: 'Enabled',
      off: 'Disabled'
    });
  })
</script>

</body>
</html>
