<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8" />
<title>eduCamps</title>
<link href="img/transparentcaplogo.png" type="image/gif" rel="shortcut icon" />
<link rel="stylesheet" type="text/css" href="css/default_layout.css">
<link rel="stylesheet" type="text/css" href="css/schedule.css">

</head>

<body>
  <div id="header">
  </div>

  <div id="id01" class="modal">
  </div>

<?php session_start(); ?>
<?php if($_SESSION['valid']): ?>
 <script src="/scripts/navBarLoggedIn.js"></script>
<?php else: ?>
 <script src="/scripts/navBar.js"></script>
<?php endif; ?>

<div id="maincontent">
    <h1> Location/Schedule </h1>
    <p> Schedule is updated for Summer 2017 </p>
    <p> New session starts every monday, classes run Monday-Friday </p>
    <div class="location">
        <h2> Santa Clara </h2>
        <p> 500 El Camino Real, Santa Clara, CA 95053 </p>
        <h3> June 19 - August 18</h3>
        <p>8:00 am - 1:00 pm or 1:00 pm - 6:00 pm </p>
    </div>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3171.6984981670794!2d-121.94117618502861!3d37.34964604427787!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808fcbaf36303ec3%3A0x561ca114f6d4e347!2sSanta+Clara+University!5e0!3m2!1sen!2sus!4v1489191798714" width="500" height="300" frameborder="0" style="border:0" allowfullscreen class="gmap"></iframe>
    <hr>
    <div class="location">
        <h2> San Jose </h2>
        <p> 201 S Market St, San Jose, CA 95113 </p>
        <h3> June 12 - July 14, July 24 - August 4</h3>
        <p>9:00 am - 2:00 pm</p>
    </div>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3172.459314918888!2d-121.89231508502904!3d37.331633245304104!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808fccbad5c8c147%3A0xa91fc533e16cb7da!2sThe+Tech+Museum+of+Innovation!5e0!3m2!1sen!2sus!4v1489192021715" width="500" height="300" frameborder="0" style="border:0" allowfullscreen class="gmap"></iframe>
    <hr>
    <div class="location">
        <h2> Mountain View </h2>
        <p> 1401 N Shoreline Blvd, Mountain View, CA 94043 </p>
        <h3> June 19 - August 11</h3>
        <p>10:00 am - 3:00 pm </p>
    </div>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3168.9659948705116!2d-122.07959768502673!3d37.41427864059158!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xea8071641d7ef4f2!2sComputer+History+Museum!5e0!3m2!1sen!2sus!4v1489192128025" width="500" height="300" frameborder="0" style="border:0" allowfullscreen class="gmap"></iframe>
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