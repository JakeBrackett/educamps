//PUT THIS RIGHT AFTER BODY IN EVERY HTML FILE
//<script src="navBar.js"></script>
//To modify this file:
//Type in as if you're writing HTML.
//End every line with \
//Escape every " or ' with \
console.log("begin navbar js");
var url = document.location.href;
console.log(url);
document.getElementById("header").innerHTML = " \
<img id=\"logo\" src=\"../img/educampslogo1.png\" alt=\"Edu Camps\">\
\
	<div id=\"nav\">\
         <ul>\
         	<li> <a href=\"../index.php\"> Home </a> </li>\
            <li> <a href=\"../schedule.php\"> Schedule</a> </li>\
            <li> <a href=\"../newaccount.html\"> Registration</a> </li>\
            <li> <a href=\"../activities.html\"> Activities</a> </li>\
         	<li> <a href=\"../forum.html\"> Forum</a> </li>\
         	<li> <a href=\"../catalog/cart.php\"> Catalog</a> </li>\
         	<li> <a href=\"../visualization.html\"> Visualization</a> </li>\
            <li> <a href=\"#\" class=\"special\" onclick=\"document.getElementById('id01').style.display='block'\"> Sign In </a> </li>\
         </ul>\
	</div>\
";
document.getElementById("id01").innerHTML = "\
<form class=\"modal-content\" action=\"/login.php\" method=\"POST\">\
        <div class=\"imgcontainer\">\
            <span onclick=\"document.getElementById('id01').style.display='none'\" class=\"close\" title=\"Close Modal\">&times;</span>\
            <img src=\"../img/educampslogo1.png\" alt=\"Avatar\" class=\"avatar\">\
                </div>\
        \
        <div class=\"container\">\
            <label><b>Username</b></label>\
            <input type=\"text\" placeholder=\"Enter Username\" name=\"uname\" required>\
                \
                <label><b>Password</b></label>\
                <input type=\"password\" placeholder=\"Enter Password\" name=\"psw\" required>\
                    \
                    <button type=\"submit\">Login</button>\
                    <input type=\"checkbox\" checked=\"checked\"> Remember me\
                        </div>\
        \
        <div class=\"container\" style=\"background-color:#f1f1f1\">\
            <button type=\"button\" onclick=\"document.getElementById('id01').style.display='none'\" class=\"cancelbtn\">Cancel</button>\
            <p class=\"psw\"><a href=\"../registrationpage.html\"> Sign up </a></p>\
        </div>\
    </form>\
";
document.getElementById("id01").style.display = "none";

var modal = document.getElementById('id01');
    
    // When the user clicks anywhere outside of the modal, close it
    modal.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
        console.log("log in modal clicked");
    };

console.log("done with navbar");
console.log("test");