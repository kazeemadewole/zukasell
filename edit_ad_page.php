<?php
require_once('header.php');
require_once('database.php');
$id = $_GET['id'];
?>
<div style="" class="b_Add_Class">
	<?php
        $sql = "select * from goodsandservices ";
        $sql .= " where ad_id = ";
        $sql .= "'".$id."'";
        $sql .= " and user_id = ";
        $sql .= "'".$session->user_id ."'";
        $sql .= " limit 1";
        $res = $Database->add_query($sql);
        $result = $Database->fetch_array($res);
        ?>
<form method="post" enctype="multipart/form-data">
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
		 <td style="width: 80%"><textarea name="desc" rows="7" class="buyandsellad_inside_ad"></textarea></td>
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
		 <td style="width: 80%;"><input type="number" name="price"  class="buyandsellad_inside_ad" /></td>
</div>
</tr>
</table>
<?php if($result['subcategory'] == "Cars"){
	?>
<table width=100% id="show_car1" style=" ">
<tr>
<div style="margin-top: 40px; ">
		 <td style="width: 20%; "><strong>  Maker </strong></label></td>
		 <td style="width: 80%; "> <select name="car_maker" id="car1" class="buyandsellad_inside_ad"  >
		 <option value="">Select</option>
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
		 <td style="width: 80%; "><input id="c_model" name="car_model" class="buyandsellad_inside_ad"/></td>
</div>
</tr>
</table>

<table width=100% id="car_t" style=" ">
<tr>
<div style="margin-top: 40px; ">
		 <td style="width: 20%; "><strong> Transmission </strong></label></td>
		 <td style="width: 80%; "><input type="text" list="datalist3" id="c_tran" name="car_transmission" class="buyandsellad_inside_ad" />
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
		 <td style="width: 80%; "> <select name="truck_maker" id="truck" class="buyandsellad_inside_ad"  >
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
		 <td style="width: 80%; "><input id="t_model" name="truck_model" class="buyandsellad_inside_ad"/></td>
</div>
</tr>
</table>

<table width=100% id="truck_t" style=" ">
<tr>
<div style="margin-top: 40px; ">
		 <td style="width: 20%; "><strong> Transmission </strong></label></td>
		 <td style="width: 80%; "><input type="text" list="datalist4" id="t_tran" name="truck_transmission" class="buyandsellad_inside_ad" />
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
		 <td style="width: 80%; "> <select name="motorcycle" id="motorcycle_select" class="buyandsellad_inside_ad"  >
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
		 <td style="width: 80%; "><input id="m_model" name="motorcycle_model" class="buyandsellad_inside_ad"/></td>
</div>
</tr>
</table>

<table width=100% id="motorcycle_t" style="">
<tr>
<div style="margin-top: 40px; ">
		 <td style="width: 20%; "><strong> Transmission </strong></label></td>
		 <td style="width: 80%; "><input type="text" list="datalist2" id="m_tran" name="motorcycle_transmission" class="buyandsellad_inside_ad"  />
				  <datalist id="datalist2">
				  <option value="manual" >
				  <option value="automatic" >
				  </datalist>
		 </td>
</div>
</tr>
</table>
<?php }

if($result['subcategory'] == "Computer&Laptops"){
	?>
<table width=100% id="laptop" style="">
<tr>
<div style="margin-top: 40px; ">
		 <td style="width: 20%; "><strong>  Maker </strong></label></td>
		 <td style="width: 80%; "> <select name="laptop" id="laptop_name" class="buyandsellad_inside_ad"  >
		 <option value="">Select</option>
			<?php
			$sql = "select * from laptop ";                      
                        $res= $Database->add_query($sql);
			while($result = $Database->fetch_array($res)){
                            ?>
			<option value="<?php echo $result['laptop_name']?>"><?php echo $result['laptop_name']?></option>
			<?php } ?>
		</td>
</div>
</tr>
</table>
<?php }
if(($result['subcategory'] == "Phones") || ($result['subcategory'] == "Tablets")){
	?>
<table width=100% id="phone1" style=" ">
<tr>
<div style="margin-top: 40px; ">
		 <td style="width: 20%; "><strong>  Maker </strong></label></td>
		 <td style="width: 80%; "><input id="p1" name="phone_maker" class="buyandsellad_inside_ad"/></td>
</div>
</tr>
</table>

<table width=100% id="phone2" style=" ">
<tr>
<div style="margin-top: 40px; ">
		 <td style="width: 20%; "><strong>  Model </strong></label></td>
		 <td style="width: 80%; "><input id="p2" name="phone_model" class="buyandsellad_inside_ad"/></td>
</div>
</tr>
</table>
<?php }

if($result['subcategory'] == "Tv,Audio&Video"){
	?>
<table width=100% id="tv" style=" ">
<tr>
<div style="margin-top: 40px; ">
		 <td style="width: 20%; "><strong>  Maker </strong></label></td>
		 <td style="width: 80%; "> <select name="tv_name" id="tv_name" class="buyandsellad_inside_ad"  >
		 <option value="">Select</option>
			<?php
			$sql = "select * from tv ";                      
                        $res= $Database->add_query($sql);
			while($result = $Database->fetch_array($res)){
                            ?>
			<option value="<?php echo $result['tv_brand_name']?>"><?php echo $result['tv_brand_name']?></option>
			<?php } ?>
		</td>
</div>
</tr>
</table>
<?php }

if($result['subcategory'] == "Clothing&shoes"){
	?>
<table width=100% id="clothing" style=" ">
<tr>
<div style="margin-top: 40px; ">
		 <td style="width: 20%; "><strong>  Brand Name </strong></label></td>
		 <td style="width: 80%; "> <select name="cloth" id="cloth_name" class="buyandsellad_inside_ad"  >
		 <option value="">Select</option>
			<?php
			$sql = "select * from cloth_designer ";                      
                        $res= $Database->add_query($sql);
			while($result = $Database->fetch_array($res)){
                            ?>
			<option value="<?php echo $result['cloth_brand_name']?>"><?php echo $result['cloth_brand_name']?></option>
			<?php } ?>
		</td>
</div>
</tr>
</table>
<?php } 

if($result['subcategory'] == "Watches,Jewelry&Accessories"){
	?>
<table width=100% id="watches" style="">
<tr>
<div style="margin-top: 40px; ">
		 <td style="width: 20%; "><strong>  Brand Name </strong></label></td>
		 <td style="width: 80%; "> <select name="watch" id="watch_name" class="buyandsellad_inside_ad"  >
		 <option value="">Select</option>
			<?php
			$sql = "select * from watches ";                      
                        $res= $Database->add_query($sql);
			while($result = $Database->fetch_array($res)){
                            ?>
			<option value="<?php echo $result['watch_brand_name']?>"><?php echo $result['watch_brand_name']?></option>
			<?php } ?>
		</td>
</div>
</tr>
</table>
<?php } 

if(($result['subcategory'] == "Land") || ($result['subcategory'] == "House&Apartment")|| ($result['subcategory'] == "Office,Shop&Commercial")){
	?>
<table width=100% id="Land1" style=" ">
<tr>
<div style="margin-top: 40px; ">
		 <td style="width: 20%; "><strong>Ad Location /Address </strong></label></td>
		 <td style="width: 80%; "><input id="ad_loc" name="ad_loc" type="text" class="buyandsellad_inside_ad"/></td>
</div>
</tr>
</table>
<?php } ?>
<table width=100%>
<tr>
<div style="margin-top: 40px; ">
		 <td style="width: 20%; "><strong> Quantity </strong></label></td>
		 <td style="width: 80%; "><input type="text" name="qua"  style="width:20%; " class="buyandsellad_inside_ad" /></td>
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
		 <td style="width: 80%; "> <input type="text" name="lgarea" list="datalist1" placeholder="type your LG area or your surburbs here"  class="buyandsellad_inside_ad">
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
<table width=100%>
		 <tr>
		  <div style="margin-top: 40px; ">
<td style="margin-right: 15px"><input type="file" name="pic1" style="width:90%" accept="image/*" onchange="loadFile(event)"  /></td>
<td style="margin-right: 15px"><input type="file" name="pic2" style="width:90%" accept="image/*" onchange="loadingFile(event)"  /></td>

<td style="margin-right: 15px"><input type="file" name="pic3" style="width:90%" accept="image/*" onchange="loadedFile(event)"  /></td>

<td style="margin-right: 15px"><input type="file" name="pic4" style="width:90%" accept="image/*" onchange="loadsFile(event)"  /></td>
<td style="margin-right: 15px"><input type="file" name="pic5" style="width:90%" accept="image/*" onchange="loadssFile(event)"  /></td>

<td style="margin-right: 15px"><input type="file" name="pic6" style="width:90%" accept="image/*" onchange="loadsssFile(event)"  /></td>
		 
		  </div></tr>
</table>
<table width=100%>
<tr>
<div style="margin-top: 40px; ">
<td>
		 <img id="output" style="height: 100px; width: 100px"/>
		 <img id="outputing" style="height: 100px; width: 100px"/>
		 <img id="outputed" style="height: 100px; width: 100px"/>
		 <img id="outputor" style="height: 100px; width: 100px"/>
		 <img id="outputorer" style="height: 100px; width: 100px"/>
		 <img id="out" style="height: 100px; width: 100px"/>
</td>
</div>
</tr>
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
<?php require_once('footer.php');?>