var xmlhttp = new XMLHttpRequest();
var myObj;
xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        myObj = JSON.parse(this.responseText);
       }
       //myObj
}

xmlhttp.open("GET", "visualization.php", true);
xmlhttp.send();