<?php
	session_start();
	$email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>eduCamps</title>
<link href="img/transparentcaplogo.png" type="image/gif" rel="shortcut icon" />
<link rel="stylesheet" type="text/css" href="css/default_layout.css">
<link rel="stylesheet" type="text/css" href="css/Homepage.css">

</head>

<body>
<div id="header">
    
</div>
<div id="id01" class="modal"></div>
<?php if($_SESSION['valid']): ?>
 <script src="/scripts/navBarLoggedIn.js"></script>
<?php else: ?>
 <script src="/scripts/navBar.js"></script>
<?php endif; ?>
<div id="maincontent">
    <div id="about-us">
<?php if(isset($_SESSION["valid"])){
	echo "<p>Welcome Back <b>$email</b></p>";
}
?> 
        <h1> About Us </h1>
       <p>EduCamps Inc is an organization that offers educational summer camps for children aged 10-14, across the country. The camps are offered in Winter and Summer months and each camp is either for 1 or 2 weeks. Each camp offers computer-based activities, robotics activities and outdoor activities.</p>
       <button> <a href="schedule.php"> Learn More </a> </button>
    </div>
    <img id="pic1" src="img/pic2.jpg" alt="Edu Camps">

<hr>

    <div id="class-list">
		<div class="classes">
            <h3> Computer-Based </h3> <hr>
            <img src="img/computer.jpg" alt="Computer Class">
			<hr>
			<p> Learn and practice basic computer science concepts by building your own verions of popular web applications using python.</p>
		</div>

		<div class="classes">
            <h3> Robotics </h3> <hr>
            <img src="img/robotics.jpg" alt="Robotics Class">
			<hr>
			<p> You will be introduced to the basics of modeling, design, planning, and control of robot systems. A basic robot is built using knowledge gained at the end of camp. </p>
		</div>

		<div class="classes">
            <h3>  Outdoor  </h3> <hr>
            <img src="img/outdoor.jpg" alt="Outdoor Class">
			<hr>
			<p> You will be able to chooses from a variety list of outdoor activities such as Hiking, Mountain Biking or Kayaking as offered. </p>	
		</div>
    </div>

<hr>

    <div id="philosophy">
			<h2> Philosophy </h2>
				<ul>
					<li> A place where creativity and expression are encouraged </li>
					<li> A program in which teamwork and social interaction are the basics</li>
					<li> A community where the courage to try is celebrated and the desire to succeed is supported </li>
					<li> An opportunity for children to grow through accomplishment and respect</li>
				</ul>
    </div>

</div>


 <footer>
<p class="backtotop"> <a href="#header">Back to Top</a> </p>
<p>
<a href="index.php">Home</a>
·
<a href="schedule.php">Schedule</a>
·
<a href="newaccount.html">Registration</a>
·
<a href="#"> Activities </a>
·
<a href="forum.html"> Forum </a>
·
<a href="#">Catalog</a>
·
<a href="visualization.html">Visualization</a>
</p>

<p>eduCamps 2017 -- Team ?</p>


</footer>

</body>

</html>