<?php
session_start();
require_once("includes/session.php");
require_once("includes/user.php");
require_once("header.php");
require_once("includes/database.php");
require_once("includes/buyandsellpost.php");
?>
<div style="clear:both"></div>
<div style="margin-top:20px; margin-bottom:10px">
<a href="buyandsellad.php"><button style="padding:5px">Place an Ad</button></a><span style="margin-left: 5%"><a href="buyandsell.php"><button style="padding:5px">Ad Arena</button></a></span><span style="margin-left: 5%"><a href="ad_home.php"><button style="padding:5px">My Ads</button></a></span>
</div>
<div style="margin-top:10px; margin-bottom:40px">
<?php
$id = $_GET['id'];
$table = User::$country."adtable";
    if(isset($_POST['submit'])){
$desc = $_POST['desc'];
$adname = $_POST['adname'];
$location = $_POST['location'];
$phone = $_POST['phone'];
$qua = $_POST['qua'];
$price = $_POST['price'];
$user = new User();
$user->find_by_mail($_SESSION['user_id']);
$table = User::$country."adtable";
$mobile = "uploads/".$user->email;
$buy = new buyandsell();
if(User::$country != ""){

if($buy->update($mobile_upload, $desc,$phone,$location,$adname, $price,$table, $qua, $id)){
echo "Successfully Updated";
}
}else{
echo " Please update your home country";
}
}
$sql = "select * from " .$table;
     $sql .= " where id = ";
     $sql .= "'".$id."'";
 
        $res = $Database->add_query($sql);
        $result = $Database->fetch_array($res);
            $user = $result['user_id'];   
            $description = ucfirst($result['description']);
            $file_name = $result['file_name'];
            $file_name2 = $result['file_name2'];
            $file_name3 = $result['file_name3'];
            $phone_number = $result['phone_number'];
            $location = ucfirst($result['location']);
            $adname = ucfirst($result['adname']);
                    $quantity = $result['quantity'];
            $price = $result['price'];
            $id = $result['id'];
            
        $sql ="select * from user";
        $sql .=" where user_id = ";
        $sql .= "'".$user."'";
        $res = $Database->add_query($sql);
        while($result = $Database->fetch_array($res)){
            $email = $result['email'];
            }
           $source = "uploads/".$email."/".$file_name;
            
            
            $source2 = "uploads/".$email."/".$file_name2;
           
           

$source3 = "uploads/".$email."/".$file_name3;

            if($quantity == 0){
        $quantity = 1;
        }
            
 
?>
Preview of current picture
<table><tr><td><img src="<?php echo $source; ?>" style="height: 100px; width: 100px" /><span style="margin-left: 3px"><img src="<?php echo $source2; ?>" style="height: 100px; width: 100px" /></span><span style="margin-left: 3px"><img src="<?php echo $source3; ?>" style="height: 100px; width: 100px" /></span></td></tr></table>

<form method="post" enctype="multipart/form-data">
<table><tr><td>Description:<br>
<textarea name="desc" style="width:90%">  <?php echo $description; ?></textarea></td></tr>
<tr><td>  Name of what are you selling: <input type="text" name="adname" value="<?php echo $adname; ?>" style="width:90%; height: 40px" /></td></tr>
<tr><td> Location:<input type="text" name="location" value="<?php echo $location; ?>" style="width:90%; height: 40px" /></td></tr>
<tr><td> Contact Number:<input type="number" name="phone" value="<?php echo $phone_number; ?>"  style="width:90%; height: 40px" /></td></tr>
<tr><td> Price:<input type="number" name="price" value="<?php echo $price; ?>" style="width:90%; height: 40px" /></td></tr>
<tr><td> quantity:<input type="number" name="qua" value="<?php echo $qauntity; ?>" style="width:90%; height: 40px" /></td></tr>

<tr><td><br><input type="submit" name="submit" value="Submit" style="width:90%; height: 35px" /></td></tr>
	

</table>

</form>	

<script>
  var loadFile = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('output');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };
</script>	
<script>
  var loadingFile = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var outputing = document.getElementById('outputing');
      outputing.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };
</script>
<script>
  var loadedFile = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var outputed = document.getElementById('outputed');
      outputed.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };
</script>
</div>

<?php require_once('footer.php'); ?>		