var count = 1;
var campcost = 50.00;

$(document).ready(function(){
    // add listeners
    document.getElementById("newchild").addEventListener("click", addFormChild);
 

    // get camps
    $.getJSON("getCamps.php", function(data){
        $("#camps").html('');
        $.each(data, function(){
               $("#camps").append('<option value="'+this.value+'">' + this.value + " (" + this.seats + " seats left)" + '</option>');
               });
    });
    
    
    //autoupdate activities
    $('#camps').change(function(){
        $.getJSON("getcampdata.php?q="+$('#camps').val(), function(data){
            campcost = data.cost;
            updateTotal();
            $('#activity').html('');
            $.each(data.activities, function(index, value){
                $('#activity').append('<option value="' + value + '">' + value + '</option>');
                });
            });
        });
    });                   

function addFormChild(){
    var childfieldset = document.getElementById("child0");
    var cln = childfieldset.cloneNode(true);
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
    var total = (campcost * count).toString();
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


