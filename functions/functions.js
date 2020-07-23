  var xmlhttp = false;
    
    try{
        xmlhttp  = new ActiveXObject('Msxml2.XMLHTTP');
    }
    catch(e){
    try{
        xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
    } catch(e){
        xmlhttp = false;
    }
    }
    
    
    if (!xmlhttp && typeof XMLHttpRequest != "undefined"){
        xmlhttp = new XMLHttpRequest();
    }


	function makerequest(serverPage, objid){   
    var obj = document.getElementById(objid);
    xmlhttp.open("GET", serverPage);
    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState ==4 && xmlhttp.status ==200){
            obj.innerHTML = xmlhttp.responseText; 
        }
    }
    xmlhttp.send(null);
}

function makerequests(cat_Id, objid){ 
	var strURL="changecategory.php?cat="+cat_Id;  
    var obj = document.getElementById(objid);
    xmlhttp.open("GET", strURL);
    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState ==4 && xmlhttp.status ==200){
            obj.innerHTML = xmlhttp.responseText; 
        }
    }
    xmlhttp.send(null);
}
function makers(countryId,stateId, objid){ 
	var strURL="http://www.africface.com/commm.php?id="+countryId+"&m="+stateId;  
    var obj = document.getElementById(objid);
    xmlhttp.open("GET", strURL);
    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState ==4 && xmlhttp.status ==200){
            obj.innerHTML = xmlhttp.responseText; 
        }
    }
    xmlhttp.send(null);
}
function makingrequests(countryId, objid){ 
	var strURL="findstatecur.php?country="+countryId;  
    var obj = document.getElementById(objid);
    xmlhttp.open("GET", strURL);
    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState ==4 && xmlhttp.status ==200){
            obj.innerHTML = xmlhttp.responseText; 
        }
    }
    xmlhttp.send(null);
}


  function makerequestcity(countryId, obid){
    var xmlhttp1 = false;
    
    try{
        xmlhttp1  = new ActiveXObject('Msxml2.XMLHTTP');
    }
    catch(e){
    try{
        xmlhttp1 = new ActiveXObject('Microsoft.XMLHTTP');
    } catch(e){
        xmlhttp1 = false;
    }
    }
    
    
    if (!xmlhttp1&& typeof XMLHttpRequest != "undefined"){
        xmlhttp1 = new XMLHttpRequest();
    }
    //var  res = countryId.replace("&","%26");
	var strURL="http://www.zukasell.com/todo.php?var="+encodeURIComponent(countryId);  
    var obj = document.getElementById(obid);
    xmlhttp1.open("GET", strURL);
    xmlhttp1.onreadystatechange = function(){
        if(xmlhttp1.readyState ==4 && xmlhttp1.status ==200){
            obj.innerHTML = xmlhttp1.responseText; 
        }
    }
    xmlhttp1.send(null);
}

 function change(){
		
		var k = document.getElementById('objid');
		k.innerHTML = "";
    }
    
    
  var loadFile = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('output');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  }
  var loadingFile = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var outputing = document.getElementById('outputing');
      outputing.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  }
  var loadedFile = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var outputed = document.getElementById('outputed');
      outputed.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  }
  var loadsFile = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var outputor = document.getElementById('outputor');
      outputor.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  }
  var loadssFile = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var outputorer = document.getElementById('outputorer');
      outputorer.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  }
  var loadsssFile = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var out = document.getElementById('out');
      out.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  }
  
  function signin_validate(){
	  if(document.forms["sign_in_form"]["pass"].value == "" ){
	   document.forms["sign_in_form"]["pass"].style.border = "2px solid red";
	   return false;
	  }
	}
	
function validate() {
	  if(document.forms["formact"]["surname"].value == "" ){
	   document.forms["formact"]["surname"].style.border = "2px solid red";
	   return false;
	  }
	  if(document.forms["formact"]["othernames"].value == "" ){
	   document.forms["formact"]["othernames"].style.border = "2px solid red";
	   return false;
	  }
	  
	  if(document.forms["formact"]["email"].value == "" ){
	   document.forms["formact"]["email"].style.border = "2px solid red";
	   return false;
	  }
	   
	   if(document.forms["formact"]["password"].value == "" ){
	   document.forms["formact"]["password"].style.border = "2px solid red";
	   return false;
	  }
	  
	}
	
 function check_form(){
   if (document.getElementById("message").value.trim() == ''){
	document.getElementById("message").style.border = '2px solid red';
	return false;
   }
}

function makingrgs(id, objid){ 
	var strURL="delete.php?id="+id;  
    var obj = document.getElementById(objid);
    xmlhttp.open("GET", strURL);
    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState ==4 && xmlhttp.status ==200){
            obj.innerHTML = xmlhttp.responseText; 
        }
    }
    xmlhttp.send(null);
}

function deletedata(id){
   var x = confirm("Are you sure you want to delete?");
   if(x) {
    
    var strURL="http://localhost:7080/project/delete.php?id="+id;
     xmlhttp.open("GET", strURL);
    xmlhttp.onreadystatechange=function()
    {
          if (xmlhttp.readyState==4 && xmlhttp.status==200)
          {
            window.location.reload();

          }
    }
       
        xmlhttp.send(); 
   
return true;

} else{
    return false;
}
}

function myads_delete(id){
   var x = confirm("Are you sure you want to delete?");
   if(x) {
    
    var strURL="http://localhost:7080/project/myads_delete.php?id="+id;
     xmlhttp.open("GET", strURL);
    xmlhttp.onreadystatechange=function()
    {
          if (xmlhttp.readyState==4 && xmlhttp.status==200)
          {
            window.location.reload();

          }
    }
       
        xmlhttp.send(); 
   
return true;

} else{
    return false;
}
}

function edit_ad() {
	if(document.forms["edit_vehicle"]["adname"].value == ""){
	document.forms["edit_vehicle"]["adname"].style.border ='2px solid red';
	return false;
	}
	if(document.forms['edit_vehicle']['desc'].value == ""){
	document.forms['edit_vehicle']['desc'].style.border ='2px solid red';
	return false;
	}
	if(document.forms['edit_vehicle']['price'].value == ""){
	document.forms['edit_vehicle']['price'].style.border ='2px solid red';
	return false;
	}
	if(document.forms['edit_vehicle']['qua'].value == ""){
	document.forms['edit_vehicle']['qua'].style.border ='2px solid red';
	return false;
	}
	if(document.forms['edit_vehicle']['location'].value == ""){
	document.forms['edit_vehicle']['location'].style.border ='2px solid red';
	return false;
	}
	if(document.forms['edit_vehicle']['phone'].value == ""){
	document.forms['edit_vehicle']['phone'].style.border ='2px solid red';
	return false;
	}
	if(document.forms['edit_vehicle']['user_name'].value == ""){
	document.forms['edit_vehicle']['user_name'].style.border ='2px solid red';
	return false;
	}
	
	}

