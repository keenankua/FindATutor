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
	<title>NAME</title>
	<style>
		.info {
			padding-top: 50px;
			padding-bottom: 0px;
		}

		.form {
			padding-top: 25px;
			padding-bottom: 50px;
		}
	</style>
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
			<a class="navbar-brand" href="index.php?operation=home"><b>FindATutor</b></a>
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav navbar-center">
				<li><a href="#">BECOME A TUTOR</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="index.php?operation=logout"><span class="glyphicon glyphicon-off"></span> LOGOUT</a></li>
			</ul>
		</div>
	  </div>
	</nav>

	<div class="container-fluid info bg-white-greentext text-center">
		<h3>How to Become a Tutor</h3><br>
		<div class="col-sm-8 col-sm-offset-2">
			 <p class="description">In order to become a tutor, we first need to check if you are qualified. Simply fill out the form below with the appropriate information. We will review your application and if you are qualified to become a tutor, we will send you an email and upgrade your account so that it has tutoring capabilities.</p>
		</div>
	</div>

	<div class="container-fluid bg-white form">
		<form class="form-horizontal" id="applyfortutor" action="index.php" enctype="multipart/form-data" method="post">
			<div class="form-group">
				<label class="control-label col-sm-2 col-sm-offset-3" for="firstname">First Name</label>
				<div class="col-sm-4">
					<input name="firstname" type="firstname" class="form-control" id="firstname" placeholder="First Name">
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-2 col-sm-offset-3" for="lastname">Last Name</label>
				<div class="col-sm-4">
					<input name="lastname" type="lastname" class="form-control" id="lastname" placeholder="Last Name">
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-2 col-sm-offset-3" for="lastname">Email</label>
				<div class="col-sm-4">
					<input name="email" type="email" class="form-control" id="email" placeholder="Email Address">
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-2 col-sm-offset-3" for="education">Highest Level of Education</label>
				<div class="col-sm-4">
					<select name="education" id="education" class="form-control circle-select">
						<option selected="selected" disabled="disabled">Education</option>
						<option value="">Grade 9</option>
						<option value="class_1">Grade 10</option>
						<option value="class_2">Grade 11</option>
						<option value="class_3">Grade 12</option>
						<option value="class_4">University: First Year</option>
						<option value="class_5">University: Second Year</option>
						<option value="class_6">University: Third Year</option>
						<option value="class_7">University: Fourth Year</option>
						<option value="class_8">Postgraduate</option>
					</select>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-2 col-sm-offset-3" for="transcripts">Transcripts</label>
				<div class="col-sm-4">
					<input name="transcripts" type="file" accept=".pdf" class="form-control-file" id="transcripts" aria-describedby="fileHelp">
					<small id="fileHelp" class="form-text text-muted">Please upload your most up to date school transcripts as a pdf file.</small>
				</div>
			</div>
			<div class = "control-label col-sm-4 col-sm-offset-1">
				<button name="submit" type="submit" id="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
	</div>

	<footer class="container-fluid footer bg-darkgrey text-center">
		<div class="col-sm-2 col-sm-offset-5">
		<a href = #>About Us</a>
		</div>
	</footer>

<script>
// var form = document.getElementById('applyfortutor');
// var transcriptsSelect = document.getElementById('transcripts');
// var submitButton = document.getElementById('submitform');
//
//
// form.onsubmit = function(event) {
//   event.preventDefault();
//
//   // Get the selected files from the input.
//   var files = transcriptsSelect.files;
//   var formData = new FormData();
//
//   for (var i = 0; i < files.length; i++) {
// 	  var file = files[i];
//
// 	  // Check the file type.
// 	  if (!file.type.match('.pdf')) {
// 		continue;
// 	  }
//
// 	  // Add the file to the request.
// 	  formData.append('transcripts[]', file, file.name);
//   }
//
//   var xhr = new XMLHttpRequest();
//   xhr.open('POST', 'handler.php', true);
// }
</script>

</body>
</html>
