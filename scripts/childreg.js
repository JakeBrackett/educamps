var count = 1;
var campcost;


$(document).ready(function(){
    // add listeners
    document.getElementById("newchild").addEventListener("click", addFormChild);
    var campdata;
    // get campdata
    $.getJSON("getCampData.php", function(data){
            $("#camps").html('');
            $.each(data, function(){
                $("#camps").append('<option value="'+this.name+'">' + this.name + " (" + this.seats + " seats left)" + '</option>');
            });
            selectCamp(data[0]);
            $("#camps").change(function(){
                selcamp = $('#camps').val();
                var findcamp = $.grep(data, function(camp, index){
                    return camp.name == selcamp;
                })
                selectCamp(findcamp[0]);
            });
    }).fail(function() { console.log("ERROR Getting camp data"); })
    .done(function() {console.log("Done getting campdata")});
});


function selectCamp(camp){
    $('#activity').html('');
    $.each(camp.activities, function(index, data){
        $('#activity').append('<option value="' + data + '">' + data + '</option>');
    });
    campcost = camp.cost;
    updateTotal();
}



function addFormChild(){
    var childfieldset = document.getElementById("child0");
    var cln = childfieldset.cloneNode(true);
    $(cln)
    .contents()
    .filter(function() {
            return this.nodeType == 3; //Node.TEXT_NODE
     }).remove();
    
    cln.setAttribute("id", "child" + count);
    cln.children[0].innerHTML = "Child " + (count+1);
    //1 is label
    cln.children[2].setAttribute("name", "childname[" + count + "]");
    cln.children[3].setAttribute("name", "dob[" + count + "]");
    //3 is label
    document.getElementById("mainfs").insertBefore(cln, document.getElementById("buttons"));
    if(count == 1){
        var removeButton = document.createElement("button");
        removeButton.setAttribute("id", "removechild");
        removeButton.setAttribute("type", "button");
        rbt = document.createTextNode("(-) Remove Extra Child");
        removeButton.appendChild(rbt);
        removeButton.setAttribute("class", "childbutton");
        removeButton.addEventListener("click", removeFormChild);
        document.getElementById("buttons").appendChild(removeButton);
    }
    
    count++;
    updateTotal();
}

function updateTotal(){
    var dischild = campcost * .9;
    var numdischildren = count-1;
    var total = parseFloat(campcost);
    total += numdischildren * dischild;
    total = parseFloat(total).toFixed(2);
    $('#total').val('$' + total);
}

function removeFormChild(){
    var lastFormChild = document.getElementById("child" + (count - 1));
    lastFormChild.parentElement.removeChild(lastFormChild);
    count--;
    if (count == 1){
        var removeButton = document.getElementById("removechild");
        removeButton.parentNode.removeChild(removeButton);
    }
    updateTotal();
}


