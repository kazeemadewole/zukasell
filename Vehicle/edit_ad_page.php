<?php
session_start();
require_once('../header.php');
require_once('../session.php');
require_once('../user.php');
require_once('../database.php');
require_once('../buyandsellupdate.php');
$id = preg_replace('/[^0-9]/', '', $_GET['ad_id']);
$adname = preg_replace('/[^0-9a-zA-Z- ]/', '', $_GET['adname']);
$sadname = str_replace('-',' ',$adname);

?>
<!DOCTYPE html>
<html lang="en">	
<head>
	<meta charset="utf-8" />
	<link type="text/css" rel="stylesheet" href="http://www.zukasell.com/css/main.css">
	<script type="text/javascript" src="http://www.zukasell.com/functions/functions.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" >
<script type="text/javascript" src="http://www.zukasell.com/functions/jquery-3.2.0.min.js"></script>
<script type="text/javascript">
    $(function() {
    $('#profile-image').on('click', function() {
        $('#profile-image-upload').click();
    });
    $('#profile-image2').on('click', function() {
        $('#profile-image-upload2').click();
    });
    $('#profile-image3').on('click', function() {
        $('#profile-image-upload3').click();
    });
    $('#profile-image4').on('click', function() {
        $('#profile-image-upload4').click();
    });
    $('#profile-image5').on('click', function() {
        $('#profile-image-upload5').click();
    });
    $('#profile-image6').on('click', function() {
        $('#profile-image-upload6').click();
    });
    });
  
    function Comma(Num) { //function to add commas to textboxes
           Num += '';
           Num = Num.replace(',', ''); Num = Num.replace(',', ''); Num = Num.replace(',', '');
           Num = Num.replace(',', ''); Num = Num.replace(',', ''); Num = Num.replace(',', '');
           x = Num.split('.');
           x1 = x[0];
           x2 = x.length > 1 ? '.' + x[1] : '';
           var rgx = /(\d+)(\d{3})/;
           while (rgx.test(x1))
               x1 = x1.replace(rgx, '$1' + ',' + '$2');
           return x1 + x2;
       }

  
  function AddComma()
  {
    
 	$('#price').val(Comma( $('#price').val()));
  }
       </script>
<style type="text/css">
            input.hidden {
    position: absolute;
    left: -9999px;
    
}
.profile-image {
    width:100px;
    cursor:pointer;
}
.inf {
    width:100px;
    margin-left: 20px;
    margin-top:10px;
}

        </style>
	
	
</head>

<div style="background-color:#f2f2f2"><p style="margin-left:5%">
<a href="<?php echo $Database->address ?>myads.php">Back to Ad</a>
</p>
</div>
<div style="" class="b_Add_Class">
	<?php
        $sql = "select * from goodsandservices ";
        $sql .= " where ad_id = ";
        $sql .= "'".$id."'";
        $sql .= " and user_id = ";
        $sql .= "'".$session->user_id ."'";
        $sql .= " and adname = ";
        $sql .= "'".$sadname."'";
        $sql .= " limit 1";
        $res = $Database->add_query($sql);
        $result = $Database->fetch_array($res);
	
	if(isset($_POST['submit'])){
$adname = $_POST['adname'];
$desc = $_POST['desc'];
$price = $_POST['price'];
if($result['subcategory'] == "Cars"){
$car_maker = $_POST['car_maker'];
$car_model = $_POST['car_model'];
$car_tran = $_POST['car_transmission'];
}else {
$car_maker = "";
$car_model = "";
$car_tran = "";	
}
if($result['subcategory'] == "Trucks,Commercial"){
$truck_maker = $_POST['truck_maker'];
$truck_model = $_POST['truck_model'];
$truck_tran = $_POST['truck_transmission'];
}else{
$truck_maker = "";
$truck_model = "";
$truck_tran = "";	
}
if($result['subcategory'] == "Motorcycles"){
$motorcycle = $_POST['motorcycle'];
$motor_model = $_POST['motorcycle_model'];
$motor_tran = $_POST['motorcycle_transmission'];
}else {
$motorcycle = "";
$motor_model = "";
$motor_tran = "";
}
$quantity = $_POST['qua'];
$lgarea = $_POST['lgarea'];
$location = $_POST['location'];
$phone = $_POST['phone'];
$user_name = $_POST['user_name'];
$file = $_FILES['pic1'];
$file2 = $_FILES['pic2'];
$file3 = $_FILES['pic3'];
$file4 = $_FILES['pic4'];
$file5 = $_FILES['pic5'];
$file6 = $_FILES['pic4'];
$user = new User();
$user->find_by_mail($session->user_id);

//checking the email of the user from the database
//$user->find_by_mail($_SESSION['user_id']);
$mobile = "../uploads/";


// initiating a class object of buyandsell from buyandsellad.php
//...........................................
$buy = new buyandsellupdate();
	$buy->update_vehicle($mobile,$file,$file2,$file3,$file4,$file5,$file6,$id,$adname,$desc, $price,$car_maker,$truck_maker,$motorcycle,
                                    $car_model,$car_tran,$truck_model,
                                    $truck_tran,$motor_model,$motor_tran,$quantity, $lgarea,$location,$phone, $user_name);

}

        ?>

	<p>Note: <span style="color:#d96e26;">You are editing this ad(<strong style="color: red">
	<?php echo ucfirst($result['adname']) ?>
	</strong>) and changes made here will affect the entire Ad</span></p>
<form method="post" name="edit_vehicle" enctype="multipart/form-data" onsubmit=" return edit_ad()">
		 <div style=" border-bottom: 1px solid grey; margin-bottom: 10px; padding-bottom:50px" >
		 <h5>Your Ad Features</h5>
<table width=100%>
		 <tr>
 <div style="margin-top: 30px; ">
		   <td style="width: 20%; "><label style="vertical-align:top;   "><strong>Ads Title</strong> <span style="color: red;vertical-align:top">*</span></label></td>
		  <td style="width: 80%"> <input  name="adname" class="buyandsellad_inside_ad" value="<?php echo $result['adname']?>" /></td>
 </div>
 </tr>
</table>
<table width=100%>
<tr>			 
<div style="margin-top: 40px; ">		 
		 <td style="width: 20%; "><label style="vertical-align:top"><strong>Describe your item</strong> <span style="color: red;vertical-align:top">*</span></label></td>
		 <td style="width: 80%"><textarea name="desc" rows="7" class="buyandsellad_inside_ad" ><?php echo $result['description']?></textarea></td>
</div>
</tr>
</table>
<table width=100%>
<tr>
<div style="margin-top: 40px; ">
    <td style="width: 20%; "><label style="vertical-align:top"><strong>Category</strong></label></td>
		 <td style=" width: 80%"><strong> <?php echo $result['category'] ?> , <?php echo $result['subcategory'] ?></strong></td>
</div>
</tr>
</table>
<table width=100%>
<tr>
<div style="margin-top: 40px; ">
		 <td style="width: 20%; "><strong>Price</strong><span style="color: red;vertical-align:top">*</span></label></td>
		 <td style="width: 80%;"><input type="text" name="price" id="price" onkeyup="AddComma()"  class="buyandsellad_inside_ad" value="<?php echo $result['price']?>" /></td>
</div>
</tr>
</table>
<?php if($result['subcategory'] == "Cars"){
	?>
<table width=100% id="show_car1" style=" ">
<tr>
<div style="margin-top: 40px; ">
		 <td style="width: 20%; "><strong>  Maker </strong></label></td>
		 <td style="width: 80%; "> <select name="car_maker" id="car1" class="buyandsellad_inside_ad" value="<?php echo $result['car_maker']?>" >
		 <option value="<?php echo $result['car_maker']?>"><?php echo $result['car_maker']?></option>
			<?php
			$sql = "select * from car ";                      
                        $res= $Database->add_query($sql);
			while($result = $Database->fetch_array($res)){
                            ?>
			<option value="<?php echo $result['car_name']?>"><?php echo $result['car_name']?></option>
			<?php } ?>
		</td>
</div>
</tr>
</table>
<table width=100% id="car_m" style="">
<tr>
<div style="margin-top: 40px; ">
		 <td style="width: 20%; "><strong>  Model </strong></label></td>
		 <td style="width: 80%; "><input id="c_model" name="car_model" class="buyandsellad_inside_ad" value="<?php echo $result['car_model'] ?>" /></td>
</div>
</tr>
</table>

<table width=100% id="car_t" style=" ">
<tr>
<div style="margin-top: 40px; ">
		 <td style="width: 20%; "><strong> Transmission </strong></label></td>
		 <td style="width: 80%; "><input type="text" list="datalist3" id="c_tran" name="car_transmission" class="buyandsellad_inside_ad"  />
				   <datalist id="datalist3">
				  <option value="manual" >
				  <option value="automatic" >
				  </datalist></td>
</div>
</tr>
</table><?php }

if($result['subcategory'] == "Trucks,Commercial"){
	?>
<table width=100% id="show_truck" style="">
<tr>
<div style="margin-top: 40px; ">
		 <td style="width: 20%; "><strong> Truck Maker </strong></label></td>
		 <td style="width: 80%; "> <select name="truck_maker" id="truck" class="buyandsellad_inside_ad" value="<?php echo $result['truck_maker']?>" >
		 <option value="">Select</option>
			<?php
			$sql = "select * from truck ";                      
                        $res= $Database->add_query($sql);
			while($result = $Database->fetch_array($res)){
                            ?>
			<option value="<?php echo $result['truck_name']?>"><?php echo $result['truck_name']?></option>
			<?php } ?>
		</td>
</div>
</tr>
</table>
<table width=100% id="truck_m" style=" ">
<tr>
<div style="margin-top: 40px; ">
		 <td style="width: 20%; "><strong>  Model </strong></label></td>
		 <td style="width: 80%; "><input id="t_model" name="truck_model" class="buyandsellad_inside_ad" value="<?php echo $result['truck_model']?>"/></td>
</div>
</tr>
</table>

<table width=100% id="truck_t" style=" ">
<tr>
<div style="margin-top: 40px; ">
		 <td style="width: 20%; "><strong> Transmission </strong></label></td>
		 <td style="width: 80%; "><input type="text" list="datalist4" id="t_tran" name="truck_transmission" class="buyandsellad_inside_ad" value="<?php echo $result['truck_transmission']?>" />
				   <datalist id="datalist4">
				  <option value="manual" >
				  <option value="automatic" >
				  </datalist></td>
</div>
</tr>
</table>
<?php }

if($result['subcategory'] == "Motorcycles"){
	?>
<table width=100% id="motorcycle" style="">
<tr>
<div style="margin-top: 40px; ">
		 <td style="width: 20%; "><strong>   Maker </strong></label></td>
		 <td style="width: 80%; "> <select name="motorcycle" id="motorcycle_select" class="buyandsellad_inside_ad" value="<?php echo $result['motorcycle']?>" >
		 <option value="">Select</option>
			<?php
			$sql = "select * from motorcycles ";                      
                        $res= $Database->add_query($sql);
			while($result = $Database->fetch_array($res)){
                            ?>
			<option value="<?php echo $result['motorcycle_name']?>"><?php echo $result['motorcycle_name']?></option>
			<?php } ?>
		</td>
</div>
</tr>
</table>
<table width=100% id="motorcycle_m" style="">
<tr>
<div style="margin-top: 40px; ">
		 <td style="width: 20%; "><strong>  Model </strong></label></td>
		 <td style="width: 80%; "><input id="m_model" name="motorcycle_model" class="buyandsellad_inside_ad" value="<?php echo $result['motorcycle_model']?>"/></td>
</div>
</tr>
</table>

<table width=100% id="motorcycle_t" style="">
<tr>
<div style="margin-top: 40px; ">
		 <td style="width: 20%; "><strong> Transmission </strong></label></td>
		 <td style="width: 80%; "><input type="text" list="datalist2" id="m_tran" name="motorcycle_transmission" class="buyandsellad_inside_ad" value="<?php echo $result['motorcycle_transmission']?>" />
				  <datalist id="datalist2">
				  <option value="manual" >
				  <option value="automatic" >
				  </datalist>
		 </td>
</div>
</tr>
</table>
<?php } ?>
<table width=100%>
<tr>
<div style="margin-top: 40px; ">
		 <td style="width: 20%; "><strong> Quantity </strong></label></td>
		 <td style="width: 80%; "><input type="text" name="qua"  style="width:20%; " class="buyandsellad_inside_ad" value="<?php echo $result['quantity']?>" /></td>
</div>
</tr>
</table>
</div>
<div style="padding-bottom: 40px; margin-top:10px"  >
		 <h5>CONTACT DETAILS</h5>
<table width=100%>
<tr>
<div style="margin-top: 40px; ">
		 <td style="width: 20%; "><label style="vertical-align:top"> <strong>LGAreas/Surburb</strong> <span style="color: red;vertical-align:top">*</span></label></td>
		 <td style="width: 80%; "> <input type="text" name="lgarea" list="datalist1" placeholder="type your LG area or your surburbs here"  class="buyandsellad_inside_ad" value="<?php echo $result['lg_area']?>">
		<datalist id="datalist1" >
			<?php
			$sql = "select * from areasandsurburbs ";                      
                        $res= $Database->add_query($sql);
			while($result = $Database->fetch_array($res)){
                            ?>
			<option value="<?php echo $result['Areas'].",".$result['State']?>">
			<?php } ?>
		</datalist></td>
</tr>
</table>
<table width=100%>
<tr>
<div style="margin-top: 40px; ">
		 <td style="width: 20%; "><label style="vertical-align:top"> <strong>Town/city</strong> <span style="color: red;vertical-align:top">*</span></label></td>
		 <td style="width: 80%; "><input type="text" name="location" class="buyandsellad_inside_ad" value="<?php echo $result['location']?>"/><td>
</div>
</tr>
</table>

<table width=100%>
<tr>
<div style="margin-top: 40px; ">
		<td style="width: 20%; "><strong>Contact Number </strong><span style="color: red;vertical-align:top">*</span></label></td>
		<td style="width: 80%; "><input type="number" name="phone"  class="buyandsellad_inside_ad" value="<?php echo $result['phone']?>"/></td>		
</div>
</tr>
</table>

<table width=100%>
<tr>
<div style="margin-top: 40px; ">
		<td style="width: 20%; "><strong>Contact Name </strong><span style="color: red;vertical-align:top">*</span></label></td>
		<td style="width: 80%; "><input type="text" name="user_name"  class="buyandsellad_inside_ad" value="<?php echo $result['user_name']?>"/></td>		
</div>
</tr>
</table>
<div style="padding-bottom: 40px; padding-top:20px"  >
<hr />
		 <h5 style="margin-top:10px">AD IMAGE</h5>
<p style="margin-top:10px">The First Image will serve as your Ad Display Image</p>
<table width=100%>
		 <tr>
		  <div style="margin-top: 40px; ">
<div class="inf" style="float: left">
     <input id="profile-image-upload" class="hidden" type="file" name="pic1" onchange="loadFile(event)">
<div id="profile-image" class="profile-image"><img id="output"   src="" height="100px" width="100px" style="border:1px solid"   /></div>   
  </div>
                <div class="inf" style="float: left">
    <input id="profile-image-upload2" class="hidden" type="file" name="pic2" onchange="loadingFile(event)">
<div id="profile-image2" class="profile-image"><img id="outputing"   src="" height="100px" width="100px" style="border:1px solid"   /></div>
</div>
        <div class="inf" style="float: left">
<input id="profile-image-upload3" class="hidden" type="file" name="pic3" onchange="loadedFile(event)">
<div id="profile-image3" class="profile-image"><img id="outputed"   src="" height="100px" width="100px" style="border:1px solid"   /></div>
</div>
        <div class="inf" style="float: left">
<input id="profile-image-upload4" class="hidden" type="file" name="pic4" onchange="loadsFile(event)">
<div id="profile-image4" class="profile-image"><img id="outputor"   src="" height="100px" width="100px" style="border:1px solid"   /></div>
</div>
        <div class="inf" style="float: left">
<input id="profile-image-upload5" class="hidden" type="file" name="pic5" onchange="loadssFile(event)">
<div id="profile-image5" class="profile-image"><img id="outputorer"   src="" height="100px" width="100px" style="border:1px solid"   /></div>
 </div>
        <div class="inf" style="float: left">
 <input id="profile-image-upload6" class="hidden" type="file" name="pic6" onchange="loadsssFile(event)">
<div id="profile-image6" class="profile-image"><img id="out"   src="" height="100px" width="100px" style="border:1px solid"   /></div>
 </div>
		 
		  </div></tr>
</table>
<table width=50%; style="margin-left: 25%; ">
<tr>
<div style="margin-top: 40px; padding-bottom: 40px">
<td><input type="submit" name="submit" value="Submit" class="sub" /></td>
</div>
</tr>
</table>
</form>	
</div>
</div>
</div>
</body>
<?php require_once('../footer.php');?>
</html>
