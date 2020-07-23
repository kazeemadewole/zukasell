/*var myForm = document.getElementById("emailform");
myForm.onfocus = function(){
    if(myForm.value == "Email is compulsory"){
        myForm.value = "";
    }
}
myForm.onblur = function() {
    if(myForm.value == ""){
        myForm.value = "Email is compulsory";
    }
}*/

function prepareHandler(){
    document.getElementById("formaction").onsubmit = function(){
        if(document.getElementById("emailform").value ==""){
            document.getElementById("errorMessage").innerHTML = " Please provide an email address";
            return false;
        }
         if(document.getElementById("emailform").value.indexOf('@')==-1){
            document.getElementById("errorMessage").innerHTML = " Invalid Email provided";
            return false;
        }
         if(document.getElementById("password1").value != document.getElementById("password2").value){
        document.getElementById("errorMessage").innerHTML = "Your password does not match each other";
        return false;
    }
    if(document.getElementById("surname").value ==""){
        document.getElementById("errorMessage").innerHTML = "Your surname is important";
        return false;
    }
    if(document.getElementById("othernames").value ==""){
        document.getElementById("errorMessage").innerHTML = "Please fill in your other names";
        return false;
    }
    if(document.getElementById("password1").value ==""){
        document.getElementById("errorMessage").innerHTML = "Please provide a password";
        return false;
    }else{
             document.getElementById("errorMessage").innerHTML = "";
             return true;
        }
        
    }
}
function prepareHandling(){
    document.getElementById("formacting").onsubmit = function(){
        if(document.getElementById("homestate").value ==""){
            document.getElementById("errorMessage").innerHTML = " Home_state field is compulsory";
            return false;
        }
        
    elseif(document.getElementById("rescountry").value ==""){
        document.getElementById("errorMessage").innerHTML = "Fill in the current country field";
        return false;
    }
    elseif(document.getElementById("resstate").value ==""){
        document.getElementById("errorMessage").innerHTML = "Please fill in the current state field";
        return false;
    }
   elseif(document.getElementById("curr").value ==""){
        document.getElementById("errorMessage").innerHTML = "Please fill in the current city field";
        return false;
    }
    elseif(document.getElementById("phone").value ==""){
        document.getElementById("errorMessage").innerHTML = "Valid phone number need to be provided";
        return false;
    }
   else{
             document.getElementById("errorMessage").innerHTML = "";
             return true;
        }
        
    }
}

var addele = document.createElement("p");
    var text = document.createTextNode("i am here");
    var addPic = document.getElementById("attach");
function fileHandler(){
        if(addPic.appendChild("addele")){
        addele.appendChild("text");
        
    }
}
function clicme(){
    var fr = document.getElementById("attach");
    var cr = document.getElementById('file');
   cr.onclick() = function(){
    fr.onclick();

   }
}


window.onload = function(){
    prepareHandler();
     prepareHandling();
    
    

}