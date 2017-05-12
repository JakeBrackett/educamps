var xmlhttp = new XMLHttpRequest();
var dataXML = new XMLHttpRequest();
var myObj;
var dbdata;
var dobdata;
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        myObj = JSON.parse(this.responseText);
        //console.log(myObj["01"])
        var i = 1;
        var y = new Array();
        for(i = 1; i<=12; i++){
            var key = "";
            if(i < 10)
                key += "0"+i.toString();
            else
                key += i;
            y.push(myObj[key])
            //console.log(key);
        }
        //console.log(y);
        dobdata = new Array();
        var innerData = 
     {
          x: ['January','February','March','April','June','July','August','September','October','November','December'],
          y: y,
          type: 'bar',
          name: 'Birthdays!',
          legend: true
     }
        dobdata[0] = innerData
        var cheight = $("#chart").height();
        var cwidth = $("#chart").width();
        var layout = {
          title: "Camper Birthdays",
                    
          height: cheight,
          width: cwidth
       };

     Plotly.newPlot('chart', dobdata, layout);

     //Plotly.newPlot('chart', data);
        //document.getElementById("demo").innerHTML = myObj.name;
    }
};

dataXML.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        dbdata = JSON.parse(this.responseText);
        var i = 2;
        var val;
        for (var key in dbdata) {
            //console.log(key);
            if (dbdata.hasOwnProperty(key)) {
                val = dbdata[key];
                //console.log(val);
                var idNum = "l"+(i-1);
                //console.log(idNum)
                document.getElementById(idNum).innerHTML = val["campname"]
                i++;
            }
            
        }
    }
};


//var 

console.log("done init with visual");

xmlhttp.open("GET", "visualization.php", true);
xmlhttp.send();
dataXML.open("GET", "visualization1.php", true);
dataXML.send();

 console.log("more js stuff");
     function showDropdown() {
          document.getElementById("myDropdown").classList.toggle("show");
     }

// Close the dropdown menu if the user clicks outside of it
  window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
     }
    }
  }
  document.getElementById('l0').addEventListener('click', selected);
  document.getElementById('l1').addEventListener('click', selected);
  document.getElementById('l2').addEventListener('click', selected);
  document.getElementById('l3').addEventListener('click', selected);
  function modifyChart(input){
      /*global dbdata*/
      for (var key in dbdata) {
            //console.log(key);
            if (dbdata.hasOwnProperty(key)) {
                var val = dbdata[key];
                if(val["campname"] == input){
                    var free = val["campcapacity"] - val["enrolled"];
                    var data = [{
                        values: [val["enrolled"],free],
                        labels: ['Enrolled', "Free"],
                        type: 'pie'
                    }];
                }
                var cheight = $("#chart").height();
                var cwidth = $("#chart").width();
                var layout = {
                    title: input+" Registration",
                    
                    height: cheight,
                    width: cwidth
               };
               console.log(input);
                Plotly.newPlot('chart',data, layout);
                //console.log(val);
                //var idNum = "l"+(i-1);
                //console.log(idNum)
                //document.getElementById(idNum).innerHTML = val["campname"]
                //i++;
            }
            
        }
  }

  function selected(){
       //console.log(x)
       /*global dobdata*/
       document.getElementById("drpbtn").innerHTML = this.innerHTML;
       //console.log(dbdata);
       //console.log(this.innerHTML);
       if(this.innerHTML =="Birthdays"){
          var cheight = $("#chart").height();
          var cwidth = $("#chart").width();
          var layout = {
            title: "Camper Birthdays",
                    
            height: cheight,
            width: cwidth
         };
            Plotly.newPlot('chart', dobdata,layout);
       }
       else{
            modifyChart(this.innerHTML)
       }
       //console.log("help i'm here now")
  }
     