/* 
function hi(){ alert("hi");}

function validate(x){ 
    var p=x.getElementById("name");
    alert(p);
    return false;
}
*/
//x.getElementById("register").onsubmit = function() {alert("form submitted");}

function validate(){
    if(document.getElementById("name").value==""){
        alert("Name cannot be blank!");
        return false;
    }
    else{
        var p=document.getElementById("name").value;
        return true;
    }
    
}
function take_confirmation3(){
    return confirm("Are you sure to delete this record?");
}
function take_confirmation(){
    return confirm("Are you sure to delete this record?");
}
function take_confirmation1(){
    return confirm("Are you sure to edit this record?");
}