var xmlhttp = new XMLHttpRequest();
var myObj;
xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        myObj = JSON.parse(this.responseText);
        //var obj = {a: 1, b: 2};
        var table = "";
        var val;
        for (var key in myObj) {
            if (myObj.hasOwnProperty(key)) {
                val = myObj[key];
                console.log(val);
            }
            //for(var key1 in val){
                var postdate=val["postdate"];
                var ftext=val["ftext"];
                var name=val["fname"] + " " + val["lname"];
                var row = "<p class='date'>" + postdate + " </p> <q class='post'>" + ftext + "</q> <br> <span class='name'> ----" + name + "</span> <hr>";
                table += row;
            //}
        }
     document.getElementById("posts").innerHTML = table;
      
       //myObj
    }
}

xmlhttp.open("GET", "forum.php", true);
xmlhttp.send();





function uploadText() {
    document.getElementById("upload").innerHTML = "";
    document.getElementById('forumtype').value = "forumposts";
    var textbox = document.createElement("TEXTAREA");
    textbox.rows = "8";
    textbox.id="textbox";
    textbox.name="textbox";
    document.getElementById("upload").appendChild(textbox);
    var lnbr = document.createElement("BR");
    document.getElementById("upload").appendChild(lnbr);
    var post = document.createElement("INPUT");
    post.type = "submit";
    post.value = "POST";
    document.getElementById("upload").appendChild(post);
}

function uploadImg() {
    document.getElementById("upload").innerHTML = "";
    document.getElementById('forumtype').value = "memories";
    var cap = document.createElement("INPUT");
    cap.id="title";
    cap.type = "text";
    cap.placeholder = "Add a Caption";
    cap.maxLength = 200;
    cap.value="My Memories";
    cap.name="title";
    document.getElementById("upload").appendChild(cap);
    var lnbr = document.createElement("BR");
    document.getElementById("upload").appendChild(lnbr);
    var imgs = document.createElement("INPUT");
    imgs.type = "file";
    imgs.id="imgs";
    imgs.name="imgs";
    document.getElementById("upload").appendChild(imgs);
    var post = document.createElement("INPUT");
    post.type = "submit";
    post.value = "UPLOAD";
    document.getElementById("upload").appendChild(post);
}

/*
function submit_i(){
    
    alert("Sorry, image upload funtion is not available at this point!");
}


function submit_t(){
    alert("Your review is submitted! Refresh page to see.");
}
*/


function validateForm(){
    //post
    if (document.forms["forumpost"]["forumtype"].value == "forumposts"){
        var review = document.forms["forumpost"]["textbox"].value;
        if (review == "") {
            alert("Review cannot be blank!");
            return false;
         }
    }
    //memories
    else{
        var title = document.forms["forumpost"]["title"].value;
        if (title == ""){
            alert("Please add a title");
            return false;
        }
        var file = document.forms["forumpost"]["imgs"].value;
        if (file == ""){
            alert("Please upload an image");
            return false;
        }
    }
}