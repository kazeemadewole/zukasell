<?php
require_once('database.php');
$var = $_GET['var'];
if($var == "Others"){?>

<table width=100% id="show_table" style="">
<tr>
<div style="margin-top: 40px; ">
		 <td style="width: 20%; "><strong> Specify </strong></label></td>
		 <td style="width: 80%; "><input id="nor" name="specify" type="text" class="buyandsellad_inside_ad" /></td>
</div>
</tr>
</table>
<?php }
if($var == "Cars"){?>
<table width=100% id="show_car1" style="display: ">
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
<table width=100% id="car_m" style=" ">
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
</table>
<?php }
if($var == "Trucks,Commercial"){?>

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
			<?php } ?></select>
		</td>
</div>
</tr>
</table>

<table width=100% id="truck_m" style="">
<tr>
<div style="margin-top: 40px; ">
		 <td style="width: 20%; "><strong>  Model </strong></label></td>
		 <td style="width: 80%; "><input id="t_model" name="truck_model" class="buyandsellad_inside_ad"/></td>
</div>
</tr>
</table>

<table width=100% id="truck_t" style="">
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
if($var == "Motorcycles"){?>
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
			</select>
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
if($var == "Clothing&Shoes"){?>
<table width=100% id="clothing" style="">
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
			</select>
		</td>
</div>
</tr>
</table>
<?php }
if($var == "Watches,Jewelry&Accessories"){?>
<table width=100% id="watches" style=" ">
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
			</select>
		</td>
</div>
</tr>
</table>
<?php }
if($var == "Computer&Laptops"){?>
<table width=100% id="laptop" style=" ">
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
			</select>
		</td>
</div>
</tr>
</table>
<?php }
if($var == "Tv,Audio&Video"){ ?>
<table width=100% id="tv" style=" ">
<tr>
<div style="margin-top: 40px; ">
		 <td style="width: 20%; "><strong>  tv_Maker </strong></label></td>
		 <td style="width: 80%; "> <select name="tv_name" id="tv_name" class="buyandsellad_inside_ad"  >
		 <option value="">Select</option>
			<?php
			$sql = "select * from tv ";                      
                        $res= $Database->add_query($sql);
			while($result = $Database->fetch_array($res)){
                            ?>
			<option value="<?php echo $result['tv_brand_name']?>"><?php echo $result['tv_brand_name']?></option>
			<?php } ?>
			</select>
		</td>
</div>
</tr>
</table>
<?php }
if($var == "Phones"){?>

<table width=100% id="phone1" style=" ">
<tr>
<div style="margin-top: 40px; ">
		 <td style="width: 20%; "><strong>  Maker </strong></label></td>
		 <td style="width: 80%; ">
		 <select id="p1" name="phone_maker" class="buyandsellad_inside_ad"  >
		 <option value="">Select</option>
			<?php
			$sql = "select * from phone ";                      
                        $res= $Database->add_query($sql);
			while($result = $Database->fetch_array($res)){
                            ?>
			<option value="<?php echo $result['phone_name']?>"><?php echo $result['phone_name']?></option>
			<?php } ?>
			</select>
		 </td>
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
if($var == "Tablets"){?>
<table width=100% id="tablet1" style=" ">
<tr>
<div style="margin-top: 40px; ">
		 <td style="width: 20%; "><strong>  Tablet Maker </strong></label></td>
		 <td style="width: 80%; ">
		 <select id="tab1" name="tab_maker" class="buyandsellad_inside_ad"  >
		 <option value="">Select</option>
			<?php
			$sql = "select * from tablet ";                      
                        $res= $Database->add_query($sql);
			while($result = $Database->fetch_array($res)){
                            ?>
			<option value="<?php echo $result['tablet_name']?>"><?php echo $result['tablet_name']?></option>
			<?php } ?>
			</select>
		 </td>
</div>
</tr>
</table>

<table width=100% id="tablet2" style=" ">
<tr>
<div style="margin-top: 40px; ">
		 <td style="width: 20%; "><strong>  Tablet Model </strong></label></td>
		 <td style="width: 80%; "><input id="tab2" name="tab_model" class="buyandsellad_inside_ad"/></td>
</div>
</tr>
</table>
<?php }
if(($var == "Land")||($var == "House&Apartment")||($var == "Office,Shop&Commercial")){?>

<table width=100% id="Land1" style=" >
<tr>
<div style="margin-top: 40px; ">
		 <td style="width: 20%; "><strong>Ad Location /Address </strong></label></td>
		 <td style="width: 80%; "><input id="ad_loc" name="ad_loc" type="text" class="buyandsellad_inside_ad"/></td>
</div>
</tr>
</table>
<?php } ?>