<?php 
require_once('database.php');
$cat_name = $_GET['cat'];
$sqli = " select cat_id from category ";
$sqli .= " where cat_name = ";
$sqli .= "'".$cat_name."'";
$resulti = $Database->add_query($sqli);
 $res = $Database->fetch_array($resulti);
$cat_id = $res['cat_id'];
$sql = " select * from subcat ";
$sql .= " where cat_id = ";
$sql .= "'".$cat_id."'";
$result = $Database->add_query($sql);

?>
<select name="subcat" onchange="makerequestcity(this.value, 'objid'); " >
<option value="">Select subcategory</option>
<?php while ($row= $Database->fetch_array($result)) { ?>
<option value=<?php echo $row['sub_name']?>><?php echo $row['sub_name']?></option>
<?php } ?>
</select>
