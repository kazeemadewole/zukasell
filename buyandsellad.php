<?php
session_start();
require_once("database.php");
require_once("user.php");
require_once("buyandsellpost.php");
require_once("session.php");
require_once ('src/Facebook/autoload.php');
require_once ('src/Facebook/facebook.php');
$session->start_login();
if($session->user_id == 0){
	$url = $Database->address.'login.php?loc='.$_SERVER['REQUEST_URI'];
	$_SESSION['serveraddress']= $_SERVER['REQUEST_URI'];
	$Database->redirect_to($url);
}else{
	if(isset($_SESSION['serveraddress'])){
		unset($_SESSION['serveraddress']);
	}
}
?>

<!DOCTYPE html>
<html lang="en">	
<head>
	<meta charset="utf-8" />
	<title>Create Ad Page</title>
	<link type="text/css" rel="stylesheet" href="css/main.css">
 <script type="text/javascript" src="functions/functions.js"></script>
<script type="text/javascript" src="functions/jquery-3.2.0.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" >
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

<body class="content" style="background-color:#5c5c3d; width:100% ; ">
  <?php require_once('header.php'); ?>    

<div class="b_Add_Container" >
		 <?php
if(isset($_POST['submit'])){
$adname = $_POST['adname'];
$desc = $_POST['desc'];
$price = $_POST['price'];
$subcat = $_POST['subcat'];
$category = $_POST['category'];
if($subcat == "Phones"){
$phone_maker = $_POST['phone_maker'];
$phone_model = $_POST['phone_model'];
$specify = "";
$car_maker = "";
$truck_maker = "";
$motorcycle = "";
$cloth = "";
$watch = "";
$laptop = "";
$tv_name = "";
$car_model = "";
$car_tran = "";
$truck_model = "";
$truck_tran = "";
$motor_model = "";
$motor_tran = "";
$tablet_maker = "";
$tablet_model = "";
$ad_loc = "";
}
if($subcat == "Tablets"){
$tablet_maker = $_POST['tab_maker'];
$tablet_model = $_POST['tab_model'];
$specify = "";
$car_maker = "";
$truck_maker = "";
$motorcycle = "";
$cloth = "";
$watch = "";
$laptop = "";
$tv_name = "";
$car_model = "";
$car_tran = "";
$truck_model = "";
$truck_tran = "";
$motor_model = "";
$motor_tran = "";
$phone_maker = "";
$phone_model = "";
$ad_loc = "";
}
if($subcat == "Cars"){
$car_model = $_POST['car_model'];
$car_tran = $_POST['car_transmission'];
$car_maker = $_POST['car_maker'];
$specify = "";
$truck_maker = "";
$motorcycle = "";
$cloth = "";
$watch = "";
$laptop = "";
$tv_name = "";
$truck_model = "";
$truck_tran = "";
$motor_model = "";
$motor_tran = "";
$phone_maker = "";
$phone_model = "";
$tablet_maker = "";
$tablet_model = "";
$ad_loc = "";
}
if($subcat == "Trucks,Commercial"){
$truck_model = $_POST['truck_model'];
$truck_tran = $_POST['truck_transmission'];
$truck_maker = $_POST['truck_maker'];
$specify = "";
$car_maker = "";
$motorcycle = "";
$cloth = "";
$watch = "";
$laptop = "";
$tv_name = "";
$car_model = "";
$car_tran = "";
$motor_model = "";
$motor_tran = "";
$phone_maker = "";
$phone_model = "";
$tablet_maker = "";
$tablet_model = "";
$ad_loc = "";
}
if($subcat == "Motorcycles"){
$motorcycle = $_POST['motorcycle'];
$motor_model = $_POST['motorcycle_model'];
$motor_tran = $_POST['motorcycle_transmission'];
$specify = "";
$car_maker = "";
$truck_maker = "";
$cloth = "";
$watch = "";
$laptop = "";
$tv_name = "";
$car_model = "";
$car_tran = "";
$truck_model = "";
$truck_tran = "";
$phone_maker = "";
$phone_model = "";
$tablet_maker = "";
$tablet_model = "";
$ad_loc = "";
}
if($subcat == "Clothing&Shoes"){
$cloth = $_POST['cloth'];
$specify = "";
$car_maker = "";
$truck_maker = "";
$motorcycle = "";
$watch = "";
$laptop = "";
$tv_name = "";
$car_model = "";
$car_tran = "";
$truck_model = "";
$truck_tran = "";
$motor_model = "";
$motor_tran = "";
$phone_maker = "";
$phone_model = "";
$tablet_maker = "";
$tablet_model = "";
$ad_loc = "";
}
if($subcat == "Watches,Jewelry&Accessories"){
$watch = $_POST['watch'];
$specify = "";
$car_maker = "";
$truck_maker = "";
$motorcycle = "";
$cloth = "";
$laptop = "";
$tv_name = "";
$car_model = "";
$car_tran = "";
$truck_model = "";
$truck_tran = "";
$motor_model = "";
$motor_tran = "";
$phone_maker = "";
$phone_model = "";
$tablet_maker = "";
$tablet_model = "";
$ad_loc = "";
}
if($subcat == "Computer&Laptops"){
$laptop = $_POST['laptop'];
$specify = "";
$car_maker = "";
$truck_maker = "";
$motorcycle = "";
$cloth = "";
$watch = "";
$tv_name = "";
$car_model = "";
$car_tran = "";
$truck_model = "";
$truck_tran = "";
$motor_model = "";
$motor_tran = "";
$phone_maker = "";
$phone_model = "";
$tablet_maker = "";
$tablet_model = "";
$ad_loc = "";
}
if($subcat == "Tv,Audio&Video"){
$tv_name = $_POST['tv_name'];
$specify = "";
$car_maker = "";
$truck_maker = "";
$motorcycle = "";
$cloth = "";
$watch = "";
$laptop = "";
$car_model = "";
$car_tran = "";
$truck_model = "";
$truck_tran = "";
$motor_model = "";
$motor_tran = "";
$phone_maker = "";
$phone_model = "";
$tablet_maker = "";
$tablet_model = "";
$ad_loc = "";
}
if(($subcat == "Land")||($subcat == "House&Apartment")||($subcat == "Office,Shop&Commercial")){
$ad_loc = $_POST['ad_loc'];
$specify = "";
$car_maker = "";
$truck_maker = "";
$motorcycle = "";
$cloth = "";
$watch = "";
$laptop = "";
$tv_name = "";
$car_model = "";
$car_tran = "";
$truck_model = "";
$truck_tran = "";
$motor_model = "";
$motor_tran = "";
$phone_maker = "";
$phone_model = "";
$tablet_maker = "";
$tablet_model = "";
}
if($subcat == "Others"){
$specify = $_POST['specify'];
$car_maker = "";
$truck_maker = "";
$motorcycle = "";
$cloth = "";
$watch = "";
$laptop = "";
$tv_name = "";
$car_model = "";
$car_tran = "";
$truck_model = "";
$truck_tran = "";
$motor_model = "";
$motor_tran = "";
$phone_maker = "";
$phone_model = "";
$tablet_maker = "";
$tablet_model = "";
$ad_loc = "";
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
//checking the email of the user from the database
//$user->find_by_mail($_SESSION['user_id']);
$mobile = "uploads";


// initiating a class object of buyandsell from buyandsellad.php
//...........................................
$buy = new buyandsell();

// inserting inputs from user to the database
//..................................


$buy->insert_into_table( $mobile,$adname,$desc, $price,$category,$subcat,$specify,
			   $car_maker,$truck_maker,$motorcycle,$cloth,$watch,$laptop,$tv_name,
			   $car_model,$car_tran,$truck_model,$truck_tran,$motor_model,$motor_tran,$phone_maker,$phone_model,
			   $ad_loc,$tablet_maker,$tablet_model, $quantity, $lgarea,$location,$phone, $user_name, $file,
                                      $file2, $file3,$file4,$file5,$file6);

if($buy->message == "Success"){
		 echo  "Successfully submitted";
/* if(isset($_SESSION['facebook_access_token'])){
$id = $buy->insert_id;
$sql = "select * from goodsandservices where ad_id = ";
$sql .= "'".$id."'";
$res = $Database->add_query($sql);
$result = $Database->fetch_array($res);
$adname = $result['adname'];
$desc = $result['description'];
$picture_user_id = $result['user_id'];
$user = new User();
 $user->find_by_mail($picture_user_id);
if($result['file_name'] != ""){
$source = $Database->address."uploads/".$user->email."/".$result['file_name'];
}elseif($result['file_name2'] != ""){
$source = $Database->address."uploads/".$user->email."/".$result['file_name2'];	 
}elseif($result['file_name3'] != ""){
$source = $Database->address."uploads/".$user->email."/".$result['file_name3'];		 
}elseif($result['file_name4'] != ""){
$source = $Database->address."uploads/".$user->email."/".$result['file_name4'];	 
}elseif($result['file_name5'] != ""){
$source = $Database->address."uploads/".$user->email."/".$result['file_name5'];		 
}elseif($result['file_name6'] != ""){
$source = $Database->address."uploads/".$user->email."/".$result['file_name6'];		 
}

 $category = $result['category'];
        if($category == "Fashion & Beauty"){
            $pageAdrress = $Database->address."Fashion and Beauty/";
        }elseif($category == "Mobile Phones and Tablet"){
            $pageAdrress = $Database->address."Mobile phones and Tablets/";
        }
        elseif($category == "Vehicle"){
            $pageAdrress = $Database->address."Vehicle/";
        }
         elseif($category == "Electronics"){
            $pageAdrress = $Database->address."Electronics/";
         }
         elseif($category == "Home,Furniture and Garden"){
            $pageAdrress = $Database->address."Home,Furniture/";
         }
         elseif($category == "Real Estate"){
            $pageAdrress = $Database->address."Real Estate/";
         }
         elseif($category == "Real Estate"){
            $pageAdrress = $Database->address."Real Estate/";
        }else{
    $pageAdrress = $Database->address."Jobs and Services/";
      }
      $sanitized_adname = str_replace(" ","-",$result['adname']);
      ?>
    <div  id="obdn" style="width:350px; background-color: white; margin-left:10%; padding:2% 0">
      <div style='width:300px; height: 250px;  margin-bottom:10px; margin-left:25px'>
      <p><?php echo $adname ?></p>
        <img src='<?php echo $source; ?>' style='width: 100%; height: 80%' />
	<p><?php echo $desc ?></p>
      </div>
      
     <a href="<?php echo $Database->address ?>buyandsellad.php" ><span class="fb_no_post">No</span></a>
     <a href="javascript://" onclick="makerequest('<?php echo $Database->address; ?>post_to_fb.php?id=<?php echo $id ?>', 'obdn')">
     <span class="fb_span_to_post">Post To Facebook</span></a>
    </div>  
      <?php
 }
 */
}
}

?>
<div style="" class="b_Add_Class">
<div style="margin:5px 0 ">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- zukasell responsice -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-9386381840362693"
     data-ad-slot="6858314767"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>
	
<form method="post" name="edit_vehicle" enctype="multipart/form-data" onsubmit=" return edit_ad()">
		 <div style=" border-bottom: 1px solid grey; margin-bottom: 10px; padding-bottom:50px" >
       <?php /* if(isset($_SESSION['facebook_access_token'])){
         echo '<p><span style="color:red">Note:</span> After submitting your ad, a box containing your ad will pops up asking you to authorize posting to your Facebook timeline </p>';
}
*/
?>
		 <h5>Your Ad Features</h5>
<table width=100%>
		 <tr>
 <div style="margin-top: 30px; ">
		   <td style="width: 20%; "><label style="vertical-align:top;   "><strong>Ads Title</strong> <span style="color: red;vertical-align:top">*</span></label></td>
		  <td style="width: 80%"> <input  name="adname" class="buyandsellad_inside_ad"  /></td>
 </div>
 </tr>
</table>
<table width=100%>
<tr>			 
<div style="margin-top: 40px; ">		 
		 <td style="width: 20%; "><label style="vertical-align:top"><strong>Describe your item</strong> <span style="color: red;vertical-align:top">*</span></label></td>
		 <td style="width: 80%"><textarea name="desc" rows="7" class="buyandsellad_inside_ad"></textarea></td>
</div>
</tr>
</table>
<table width=100%>
<tr>
<div style="margin-top: 40px; ">
		 <td style="width: 20%; "><strong>Price</strong><span style="color: red;vertical-align:top">*</span></label></td>
		 <td style="width: 80%;"><input type="text" name="price" id="price"  class="buyandsellad_inside_ad" onkeyup="AddComma()" /></td>
</div>
</tr>
</table>
<table width=100%>
<tr>
<div style="margin-top: 40px; ">
		 <td style="width: 20%; "><strong>Category</strong><span style="color: red;vertical-align:top">*</span></label></td>
		 <td style="width: 80%;">
		 <?php
		 $sql = "select * from category";
		 $res= $Database->add_query($sql); ?>
		 
		 <select name="category" onchange=" makerequests(this.value, 'sub_cat'); change() " class="buyandsellad_inside_ad"  >
		 <option value="">Select</option>
		 <?php while($result = $Database->fetch_array($res)){ ?>
		 <option value="<?php echo $result['cat_name']?>"><?php echo $result['cat_name'] ?></option>
		 <?php } ?>
		 </select>
		
		 </td>
</div>
</tr>
</table>

<table width=100%>
<tr>
<div style="margin-top: 40px; ">
		 <td style="width: 20%; "><strong> Sub Category </strong></label></td>
		 <td style="width: 80%; "><div id="sub_cat">
				  <select name="subcat" style="width: 60%; height:30px" >
  

        </select>
		 </div>
		 
		 </td>
		 
</div>
</tr>
</table>

<div id="objid"></div>

<table width=100%>
<tr>
<div style="margin-top: 40px; ">
		 <td style="width: 20%; "><strong> Quantity </strong></label></td>
		 <td style="width: 80%; "><input type="text" name="qua"  style="width:20%; " class="buyandsellad_inside_ad" /></td>
</div>
</tr>
</table>
</div>
<div style="margin:10px 0 30px 0">
		 <h5>CONTACT DETAILS</h5>
<table width=100%>
<tr>
<div style="margin-top: 40px; ">
		 <td style="width: 20%; "><label style="vertical-align:top"> <strong>LGAreas/Surburb</strong> <span style="color: red;vertical-align:top">*</span></label></td>
		 <td style="width: 80%; "> <input type="text" name="lgarea" list="datalist1" placeholder="Type your LG area or your surburb here"  class="buyandsellad_inside_ad">
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
		 <td style="width: 80%; "><input type="text" name="location" class="buyandsellad_inside_ad"/><td>
</div>
</tr>
</table>

<table width=100%>
<tr>
<div style="margin-top: 40px; ">
		<td style="width: 20%; "><strong>Contact Number </strong><span style="color: red;vertical-align:top">*</span></label></td>
		<td style="width: 80%; "><input type="number" name="phone"  class="buyandsellad_inside_ad"/></td>		
</div>
</tr>
</table>

<table width=100%>
<tr>
<div style="margin-top: 40px; ">
		<td style="width: 20%; "><strong>Contact Name </strong><span style="color: red;vertical-align:top">*</span></label></td>
		<td style="width: 80%; "><input type="text" name="user_name"  class="buyandsellad_inside_ad"/></td>		
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
<div style="margin-top: 20px; margin-bottom:10px">
<?php 
$buy = new buyandsell();
//$buy->show_user_post($_SESSION['user_id']);
?>
</div>
</div>


</div>
</body>
</html>
