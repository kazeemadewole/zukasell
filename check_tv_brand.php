<?php
require_once('database.php');
require_once('session.php');
$sql = "select DISTINCT tv_brand from goodsandservices";
$res = $Database->add_query($sql);
while($result= $Database->fetch_array($res)){
if($result['tv_brand'] != ""){
echo "empty";
}
    if($result['tv_brand'] != ""){
    $sqli = "select count(ad_id) from goodsandservices";
    $sqli .= " where tv_brand = ";
    $sqli .= "'".$result['tv_brand']."'";
    $resi = $Database->add_query($sqli);
    $resulti = $Database->fetch_array($resi);
if($Database->num_rows($resi) == 0 ){
echo "There is no Match";
}
    echo "<a href='".$Database->address."Electronics/tv_maker.php?id=".$result['tv_brand']."'><span style='margin-right:20px; font-size:10px'>"
    .$result['tv_brand']."(".$resulti['count(ad_id)']
    .")</span></a>";
    }
}

?>