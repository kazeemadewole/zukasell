<?php
require_once('database.php');
require_once('session.php');
$sql = "select DISTINCT laptop from goodsandservices";
$res = $Database->add_query($sql);
while($result= $Database->fetch_array($res)){
    if($result['laptop'] != ""){
    $sqli = "select count(ad_id) from goodsandservices";
    $sqli .= " where laptop = ";
    $sqli .= "'".$result['laptop']."'";
    $resi = $Database->add_query($sqli);
    $resulti = $Database->fetch_array($resi);
    echo "<a href='".$Database->address."Electronics/laptop_maker.php?id=".$result['laptop']."'><span style='margin-right:20px; font-size:10px'>"
    .$result['laptop']."(".$resulti['count(ad_id)']
    .")</span></a>";
    }
}

?>