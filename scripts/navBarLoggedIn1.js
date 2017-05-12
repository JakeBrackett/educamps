//PUT THIS RIGHT AFTER BODY IN EVERY HTML FILE
//<script src="navBar.js"></script>
//To modify this file:
//Type in as if you're writing HTML.
//End every line with \
//Escape every " or ' with \
console.log("Logged in navbar js");
document.getElementById("header").innerHTML = " \
<a href=\"index.php\"><img id=\"logo\" src=\"/img/educampslogo1.png\" alt=\"Edu Camps\"></a>\
\
	<div id=\"nav\">\
         <ul>\
         	<li> <a href=\"../index.php\"> Home </a> </li>\
            <li> <a href=\"../schedule.php\"> Schedule</a> </li>\
            <li> <a href=\"../childreg.html\"> Registration</a> </li>\
            <li> <a href=\"../activities.html\"> Activities</a> </li>\
         	<li> <a href=\"../forum.html\"> Forum</a> </li>\
         	<li> <a href=\"cart.php\"> Catalog</a> </li>\
         	<li> <a href=\"../visualization.html\"> Visualization</a> </li>\
            <li> <a href=\"../logout.php\" class=\"special\"> Logout </a> </li>\
         </ul>\
	</div>\
";