<?php
require_once('database.php');
require_once('user.php');
require_once('session.php');

class buyandsellupdate {
public $pageAdrress;
public $user;
public $address ="http://localhost:7080/project/";
public $adpic;
public $message;
public $adname;
public $maker;
public $model;
public $trans;
public $description;
public $Extra_info;
public $price;
public $category;
public $subcat;
public $specify;
public $car_maker;
public $car_tran;
public $truck_maker;
public $motorcycle;
public $cloth;
public $watch;
public $laptop;
public $tv_name;
public $car_model;
public $truck_model;
public $truck_tran;
public $motor_model;
public $motor_tran;
public $phone_maker;
public $phone_model;
public $tablet_maker;
public $tablet_model;
public $ad_loc;
public $quantity;
public $lgarea;
public $location;
public $phone_number;
public $phone_number1;
public $adtable;
public $user_name;
public $tem_file;
public $tem_file2;
public $tem_file3;
public $tem_file4;
public $tem_file5;
public $tem_file6;
public $file_name;
public $file_name2;
public $file_name3;
public $file_name4;
public $file_name5;
public $file_name6;
public $mov1;
public $mov2;
public $mov3;
public $mov4;
public $mov5;
public $mov6;
public $upload_error = array(
        UPLOAD_ERR_OK => "Photo uploaded successfully",
        UPLOAD_ERR_INI_SIZE => "larger than upload_max_filesize",
        UPLOAD_ERR_FORM_SIZE => "Larger than form MAX_FILE_SIZE",
        UPLOAD_ERR_PARTIAL => "Partial Upload",
        UPLOAD_ERR_NO_FILE => "No File selected, please select a file and re-upload",
        UPLOAD_ERR_NO_TMP_DIR => "No Temporary Directory",
        UPLOAD_ERR_CANT_WRITE => "Can't write to disk",
        UPLOAD_ERR_EXTENSION => "File upload stopped by extension"
        
    );
    public $error = array();
    
    public function attach_file($mobile_upload,$file,$file2,$file3,$file4,$file5,$file6){
     global $Database;
     if(!empty($file)){
    $this->file_name = basename($Database->escape_value($file['name']));
        $this->tem_file = $file['tmp_name'];
        $mobile_target_file = $mobile_upload."/".$this->file_name;
        $this->mov1 = move_uploaded_file($this->tem_file,$mobile_target_file);
       } 
         if(!empty($file2)){
    $this->file_name2 = basename($Database->escape_value($file2['name']));
        $this->tem_file2 = $file2['tmp_name'];
        $mobile_target_file2 = $mobile_upload."/".$this->file_name2;
        $this->mov2 = move_uploaded_file($this->tem_file2,$mobile_target_file2);
       } 
          if(!empty($file3)){
    $this->file_name3 = basename($Database->escape_value($file3['name']));
        $this->tem_file3 = $file3['tmp_name'];
        $mobile_target_file3 = $mobile_upload."/".$this->file_name3;
       $this->mov3 =  move_uploaded_file($this->tem_file3,$mobile_target_file3);
       }
            if(!empty($file4)){
    $this->file_name4 = basename($Database->escape_value($file4['name']));
        $this->tem_file4 = $file4['tmp_name'];
        $mobile_target_file4 = $mobile_upload."/".$this->file_name4;
       $this->mov4 =  move_uploaded_file($this->tem_file4,$mobile_target_file4);
       }
            if(!empty($file5)){
    $this->file_name5 = basename($Database->escape_value($file5['name']));
        $this->tem_file5 = $file5['tmp_name'];
        $mobile_target_file5 = $mobile_upload."/".$this->file_name5;
       $this->mov5 =  move_uploaded_file($this->tem_file5,$mobile_target_file5);
       }
            if(!empty($file6)){
    $this->file_name6 = basename($Database->escape_value($file6['name']));
        $this->tem_file6 = $file6['tmp_name'];
        $mobile_target_file6 = $mobile_upload."/".$this->file_name6;
       $this->mov6 =  move_uploaded_file($this->tem_file6,$mobile_target_file6);
       }
    }
    

     public function update_vehicle($mobile_upload,$file,$file2,$file3,$file4,$file5,$file6,$adid,$adname,$desc, $price,$car_maker,$truck_maker,$motorcycle,
                                    $car_model,$car_tran,$truck_model,
                                    $truck_tran,$motor_model,$motor_tran,$quantity, $lgarea,$location,$phone, $user_name){
    global $Database;
    global $session;
     $this->adtable = "goodsandservices";
    $this->adname = $Database->escape_value($adname);
    $this->description = $Database->escape_value($desc);
    $this->price = $Database->escape_value($price); 
    $this->car_maker= $Database->escape_value($car_maker);
    $this->truck_maker= $Database->escape_value($truck_maker);
    $this->motorcycle= $Database->escape_value($motorcycle); 
    $this->car_model= $Database->escape_value($car_model);
    $this->car_tran= $Database->escape_value($car_tran);
    $this->truck_model = $Database->escape_value($truck_model);
    $this->truck_tran = $Database->escape_value($truck_tran);
    $this->motor_model  = $Database->escape_value($motor_model);
    $this->motor_tran  = $Database->escape_value($motor_tran);
    $this->quantity = $Database->escape_value($quantity);
    $this->lgarea = $Database->escape_value($lgarea);
    $this->location = $Database->escape_value($location);
    $this->phone_number = $Database->escape_value($phone);
    $this->user_name = $Database->escape_value($user_name);
     
     $user = new User();
     $user->find_by_mail($session->user_id);
     $mobile_upload = $mobile_upload."/".$user->email;
     if(!empty($file)){
    $this->file_name = basename($Database->escape_value($file['name']));
        $this->tem_file = $file['tmp_name'];
        $mobile_target_file = $mobile_upload."/".$this->file_name;
        $this->mov1 = move_uploaded_file($this->tem_file,$mobile_target_file);
       } 
         if(!empty($file2)){
    $this->file_name2 = basename($Database->escape_value($file2['name']));
        $this->tem_file2 = $file2['tmp_name'];
        $mobile_target_file2 = $mobile_upload."/".$this->file_name2;
        $this->mov2 = move_uploaded_file($this->tem_file2,$mobile_target_file2);
       } 
          if(!empty($file3)){
    $this->file_name3 = basename($Database->escape_value($file3['name']));
        $this->tem_file3 = $file3['tmp_name'];
        $mobile_target_file3 = $mobile_upload."/".$this->file_name3;
       $this->mov3 =  move_uploaded_file($this->tem_file3,$mobile_target_file3);
       }
            if(!empty($file4)){
    $this->file_name4 = basename($Database->escape_value($file4['name']));
        $this->tem_file4 = $file4['tmp_name'];
        $mobile_target_file4 = $mobile_upload."/".$this->file_name4;
       $this->mov4 =  move_uploaded_file($this->tem_file4,$mobile_target_file4);
       }
            if(!empty($file5)){
    $this->file_name5 = basename($Database->escape_value($file5['name']));
        $this->tem_file5 = $file5['tmp_name'];
        $mobile_target_file5 = $mobile_upload."/".$this->file_name5;
       $this->mov5 =  move_uploaded_file($this->tem_file5,$mobile_target_file5);
       }
            if(!empty($file6)){
    $this->file_name6 = basename($Database->escape_value($file6['name']));
        $this->tem_file6 = $file6['tmp_name'];
        $mobile_target_file6 = $mobile_upload."/".$this->file_name6;
       $this->mov6 =  move_uploaded_file($this->tem_file6,$mobile_target_file6);
       }
       
  $date = strftime('%Y/-%m/-%d-/%H/-%M/-%S', time());
   $sql = "UPDATE goodsandservices SET ";
        $sql .="adname = ";
        $sql .= "'".$this->adname."', ";
        $sql .="description = ";
        $sql .= "'".$this->description."', ";
         $sql .="price = ";
        $sql .= "'".$this->price."', ";
        $sql .="car_maker = ";
        $sql .= "'".$this->car_maker."', ";
        $sql .="truck_maker = ";
         $sql .= "'".$this->truck_maker."', ";
        $sql .="motorcycle = ";
      $sql .= "'".$this->motorcycle."', ";
        $sql .="car_model = ";
         $sql .= "'".$this->car_model."',"; 
        $sql .="car_transmission = ";
        $sql .= "'".$this->car_tran."', ";
        $sql .="truck_model = ";
        $sql .= "'".$this->truck_model."',";
        $sql .="truck_transmission = ";
        $sql .= "'".$this->truck_tran."', ";
        $sql .="motorcycle_model = ";
        $sql .= "'".$this->motor_model."', ";
        $sql .="motorcycle_transmission = ";
        $sql .= "'".$this->motor_model."', "; 
        $sql .="quantity = ";
        $sql .= "'".$this->quantity."', ";
        $sql .="lg_area = ";
        $sql .= "'".$this->lgarea."', ";
        $sql .="location = ";
        $sql .= "'".$this->location."', ";
        $sql .="phone = ";
        $sql .= "'".$this->phone_number."', ";
        $sql .="user_name = ";
        $sql .= "'".$this->user_name."', ";
        $sql .="file_name = ";
        $sql .= "'".$this->file_name."', ";
        $sql .="file_name2 = ";
        $sql .= "'".$this->file_name2."', ";
        $sql .="file_name3 = ";
        $sql .= "'".$this->file_name3."', ";
        $sql .="file_name4 = ";
        $sql .= "'".$this->file_name4."', ";
        $sql .="file_name5 = ";
        $sql .= "'".$this->file_name5."', ";
        $sql .="file_name6 = ";
        $sql .= "'".$this->file_name6."' ";
        $sql .= " where ad_id = ";
        $sql .= "'".$adid."'";
        $sql.= " and user_id = ";
        $sql.= "'".$session->user_id ."'";
        
        $res = $Database->add_query($sql);
        
        }
    
     public function update_RealEstate($mobile_upload,$file,$file2,$file3,$file4,$file5,$file6,$adid,$adname,$desc, $price,$ad_loc,
				  $quantity, $lgarea,$location,$phone, $user_name){
    global $Database;
    global $session;
     $this->adtable = "goodsandservices";
    $this->adname = $Database->escape_value($adname);
    $this->description = $Database->escape_value($desc);
    $this->price = $Database->escape_value($price);
    $this->ad_loc= $Database->escape_value($ad_loc);
    $this->quantity = $Database->escape_value($quantity);
    $this->lgarea = $Database->escape_value($lgarea);
    $this->location = $Database->escape_value($location);
    $this->phone_number = $Database->escape_value($phone);
    $this->user_name = $Database->escape_value($user_name);
    
    $user = new User();
     $user->find_by_mail($session->user_id);
     $mobile_upload = $mobile_upload."/".$user->email;
     
    if(!empty($file)){
    $this->file_name = basename($Database->escape_value($file['name']));
        $this->tem_file = $file['tmp_name'];
        $mobile_target_file = $mobile_upload."/".$this->file_name;
        $this->mov1 = move_uploaded_file($this->tem_file,$mobile_target_file);
       } 
         if(!empty($file2)){
    $this->file_name2 = basename($Database->escape_value($file2['name']));
        $this->tem_file2 = $file2['tmp_name'];
        $mobile_target_file2 = $mobile_upload."/".$this->file_name2;
        $this->mov2 = move_uploaded_file($this->tem_file2,$mobile_target_file2);
       } 
          if(!empty($file3)){
    $this->file_name3 = basename($Database->escape_value($file3['name']));
        $this->tem_file3 = $file3['tmp_name'];
        $mobile_target_file3 = $mobile_upload."/".$this->file_name3;
       $this->mov3 =  move_uploaded_file($this->tem_file3,$mobile_target_file3);
       }
            if(!empty($file4)){
    $this->file_name4 = basename($Database->escape_value($file4['name']));
        $this->tem_file4 = $file4['tmp_name'];
        $mobile_target_file4 = $mobile_upload."/".$this->file_name4;
       $this->mov4 =  move_uploaded_file($this->tem_file4,$mobile_target_file4);
       }
            if(!empty($file5)){
    $this->file_name5 = basename($Database->escape_value($file5['name']));
        $this->tem_file5 = $file5['tmp_name'];
        $mobile_target_file5 = $mobile_upload."/".$this->file_name5;
       $this->mov5 =  move_uploaded_file($this->tem_file5,$mobile_target_file5);
       }
            if(!empty($file6)){
    $this->file_name6 = basename($Database->escape_value($file6['name']));
        $this->tem_file6 = $file6['tmp_name'];
        $mobile_target_file6 = $mobile_upload."/".$this->file_name6;
       $this->mov6 =  move_uploaded_file($this->tem_file6,$mobile_target_file6);
       }
       
  $date = strftime('%Y/-%m/-%d-/%H/-%M/-%S', time());
   $sql = "UPDATE goodsandservices SET ";
        $sql .="adname = ";
        $sql .= "'".$this->adname."', ";
        $sql .="description = ";
        $sql .= "'".$this->description."', ";
         $sql .="price = ";
          $sql .= "'".$this->price."', ";
        $sql .="ad_address = ";
        $sql .= "'".$this->ad_loc."', ";
        $sql .="quantity = ";
        $sql .= "'".$this->quantity."', ";
        $sql .="lg_area = ";
        $sql .= "'".$this->lgarea."', ";
        $sql .="location = ";
        $sql .= "'".$this->location."', ";
        $sql .="phone = ";
        $sql .= "'".$this->phone_number."', ";
        $sql .="user_name = ";
        $sql .= "'".$this->user_name."', ";
        $sql .="file_name = ";
        $sql .= "'".$this->file_name."', ";
        $sql .="file_name2 = ";
        $sql .= "'".$this->file_name2."', ";
        $sql .="file_name3 = ";
        $sql .= "'".$this->file_name3."', ";
        $sql .="file_name4 = ";
        $sql .= "'".$this->file_name4."', ";
        $sql .="file_name5 = ";
        $sql .= "'".$this->file_name5."', ";
        $sql .="file_name6 = ";
        $sql .= "'".$this->file_name6."' ";
        $sql .= " where ad_id = ";
        $sql .= "'".$adid."'";
        $sql.= " and user_id = ";
        $sql.= "'".$session->user_id ."'";
        
        $res = $Database->add_query($sql);
        
        }
        
         public function update_mobilephone($mobile_upload,$file,$file2,$file3,$file4,$file5,$file6,$adid,$adname,$desc, $price,$phone_maker,$phone_model,
				  $tablet_maker, $tablet_model,$quantity, $lgarea,$location,$phone, $user_name){
    global $Database;
    global $session;
     $this->adtable = "goodsandservices";
    $this->adname = $Database->escape_value($adname);
    $this->description = $Database->escape_value($desc);
    $this->price = $Database->escape_value($price);
    $this->phone_maker= $Database->escape_value($phone_maker);
    $this->phone_model= $Database->escape_value($phone_model);
     $this->tablet_maker= $Database->escape_value($tablet_maker);
    $this->tablet_model= $Database->escape_value($tablet_model);
    $this->quantity = $Database->escape_value($quantity);
    $this->lgarea = $Database->escape_value($lgarea);
    $this->location = $Database->escape_value($location);
    $this->phone_number = $Database->escape_value($phone);
    $this->user_name = $Database->escape_value($user_name);
     $user = new User();
     $user->find_by_mail($session->user_id);
     $mobile_upload = $mobile_upload."/".$user->email;
     
    if(!empty($file)){
    $this->file_name = basename($Database->escape_value($file['name']));
        $this->tem_file = $file['tmp_name'];
        $mobile_target_file = $mobile_upload."/".$this->file_name;
        $this->mov1 = move_uploaded_file($this->tem_file,$mobile_target_file);
       } 
         if(!empty($file2)){
    $this->file_name2 = basename($Database->escape_value($file2['name']));
        $this->tem_file2 = $file2['tmp_name'];
        $mobile_target_file2 = $mobile_upload."/".$this->file_name2;
        $this->mov2 = move_uploaded_file($this->tem_file2,$mobile_target_file2);
       } 
          if(!empty($file3)){
    $this->file_name3 = basename($Database->escape_value($file3['name']));
        $this->tem_file3 = $file3['tmp_name'];
        $mobile_target_file3 = $mobile_upload."/".$this->file_name3;
       $this->mov3 =  move_uploaded_file($this->tem_file3,$mobile_target_file3);
       }
            if(!empty($file4)){
    $this->file_name4 = basename($Database->escape_value($file4['name']));
        $this->tem_file4 = $file4['tmp_name'];
        $mobile_target_file4 = $mobile_upload."/".$this->file_name4;
       $this->mov4 =  move_uploaded_file($this->tem_file4,$mobile_target_file4);
       }
            if(!empty($file5)){
    $this->file_name5 = basename($Database->escape_value($file5['name']));
        $this->tem_file5 = $file5['tmp_name'];
        $mobile_target_file5 = $mobile_upload."/".$this->file_name5;
       $this->mov5 =  move_uploaded_file($this->tem_file5,$mobile_target_file5);
       }
            if(!empty($file6)){
    $this->file_name6 = basename($Database->escape_value($file6['name']));
        $this->tem_file6 = $file6['tmp_name'];
        $mobile_target_file6 = $mobile_upload."/".$this->file_name6;
       $this->mov6 =  move_uploaded_file($this->tem_file6,$mobile_target_file6);
       }
       
  $date = strftime('%Y/-%m/-%d-/%H/-%M/-%S', time());
   $sql = "UPDATE goodsandservices SET ";
        $sql .="adname = ";
        $sql .= "'".$this->adname."', ";
        $sql .="description = ";
        $sql .= "'".$this->description."', ";
         $sql .="price = ";
          $sql .= "'".$this->price."', ";
        $sql .="phone_maker = ";
        $sql .= "'".$this->phone_maker."', ";
        $sql .="phone_model = ";
        $sql .= "'".$this->phone_model."', ";
         $sql .="tablet_maker = ";
        $sql .= "'".$this->tablet_maker."', ";
        $sql .="tablet_model = ";
        $sql .= "'".$this->tablet_model."', ";
        $sql .="quantity = ";
        $sql .= "'".$this->quantity."', ";
        $sql .="lg_area = ";
        $sql .= "'".$this->lgarea."', ";
        $sql .="location = ";
        $sql .= "'".$this->location."', ";
        $sql .="phone = ";
        $sql .= "'".$this->phone_number."', ";
        $sql .="user_name = ";
        $sql .= "'".$this->user_name."', ";
        $sql .="file_name = ";
        $sql .= "'".$this->file_name."', ";
        $sql .="file_name2 = ";
        $sql .= "'".$this->file_name2."', ";
        $sql .="file_name3 = ";
        $sql .= "'".$this->file_name3."', ";
        $sql .="file_name4 = ";
        $sql .= "'".$this->file_name4."', ";
        $sql .="file_name5 = ";
        $sql .= "'".$this->file_name5."', ";
        $sql .="file_name6 = ";
        $sql .= "'".$this->file_name6."' ";
        $sql .= " where ad_id = ";
        $sql .= "'".$adid."'";
        $sql.= " and user_id = ";
        $sql.= "'".$session->user_id ."'";
        
        $res = $Database->add_query($sql);
        
        }
        
         public function update_jobs($mobile_upload,$file,$file2,$file3,$file4,$file5,$file6,$adid,$adname,$desc, $price,
				  $quantity, $lgarea,$location,$phone, $user_name){
    global $Database;
    global $session;
    $this->adtable = "goodsandservices";
    $this->adname = $Database->escape_value($adname);
    $this->description = $Database->escape_value($desc);
    $this->price = $Database->escape_value($price);
    $this->quantity = $Database->escape_value($quantity);
    $this->lgarea = $Database->escape_value($lgarea);
    $this->location = $Database->escape_value($location);
    $this->phone_number = $Database->escape_value($phone);
    $this->user_name = $Database->escape_value($user_name);
     
     $user = new User();
     $user->find_by_mail($session->user_id);
     $mobile_upload = $mobile_upload."/".$user->email;
     
     if(!empty($file)){
    $this->file_name = basename($Database->escape_value($file['name']));
        $this->tem_file = $file['tmp_name'];
        $mobile_target_file = $mobile_upload."/".$this->file_name;
        $this->mov1 = move_uploaded_file($this->tem_file,$mobile_target_file);
       } 
         if(!empty($file2)){
    $this->file_name2 = basename($Database->escape_value($file2['name']));
        $this->tem_file2 = $file2['tmp_name'];
        $mobile_target_file2 = $mobile_upload."/".$this->file_name2;
        $this->mov2 = move_uploaded_file($this->tem_file2,$mobile_target_file2);
       } 
          if(!empty($file3)){
    $this->file_name3 = basename($Database->escape_value($file3['name']));
        $this->tem_file3 = $file3['tmp_name'];
        $mobile_target_file3 = $mobile_upload."/".$this->file_name3;
       $this->mov3 =  move_uploaded_file($this->tem_file3,$mobile_target_file3);
       }
            if(!empty($file4)){
    $this->file_name4 = basename($Database->escape_value($file4['name']));
        $this->tem_file4 = $file4['tmp_name'];
        $mobile_target_file4 = $mobile_upload."/".$this->file_name4;
       $this->mov4 =  move_uploaded_file($this->tem_file4,$mobile_target_file4);
       }
            if(!empty($file5)){
    $this->file_name5 = basename($Database->escape_value($file5['name']));
        $this->tem_file5 = $file5['tmp_name'];
        $mobile_target_file5 = $mobile_upload."/".$this->file_name5;
       $this->mov5 =  move_uploaded_file($this->tem_file5,$mobile_target_file5);
       }
            if(!empty($file6)){
    $this->file_name6 = basename($Database->escape_value($file6['name']));
        $this->tem_file6 = $file6['tmp_name'];
        $mobile_target_file6 = $mobile_upload."/".$this->file_name6;
       $this->mov6 =  move_uploaded_file($this->tem_file6,$mobile_target_file6);
       }
    
  $date = strftime('%Y/-%m/-%d-/%H/-%M/-%S', time());
   $sql = "UPDATE goodsandservices SET ";
        $sql .="adname = ";
        $sql .= "'".$this->adname."', ";
        $sql .="description = ";
        $sql .= "'".$this->description."', ";
         $sql .="price = ";
          $sql .= "'".$this->price."', ";
        $sql .="quantity = ";
        $sql .= "'".$this->quantity."', ";
        $sql .="lg_area = ";
        $sql .= "'".$this->lgarea."', ";
        $sql .="location = ";
        $sql .= "'".$this->location."', ";
        $sql .="phone = ";
        $sql .= "'".$this->phone_number."', ";
        $sql .="user_name = ";
        $sql .= "'".$this->user_name."', ";
        $sql .="file_name = ";
        $sql .= "'".$this->file_name."', ";
        $sql .="file_name2 = ";
        $sql .= "'".$this->file_name2."', ";
        $sql .="file_name3 = ";
        $sql .= "'".$this->file_name3."', ";
        $sql .="file_name4 = ";
        $sql .= "'".$this->file_name4."', ";
        $sql .="file_name5 = ";
        $sql .= "'".$this->file_name5."', ";
        $sql .="file_name6 = ";
        $sql .= "'".$this->file_name6."' ";
        $sql .= " where ad_id = ";
        $sql .= "'".$adid."'";
        $sql.= " and user_id = ";
        $sql.= "'".$session->user_id ."'";
        
        $res = $Database->add_query($sql);
        
        }
        
         public function update_home($mobile_upload,$file,$file2,$file3,$file4,$file5,$file6,$adid,$adname,$desc, $price,
				  $quantity, $lgarea,$location,$phone, $user_name){
    global $Database;
    global $session;
     $this->adtable = "goodsandservices";
    $this->adname = $Database->escape_value($adname);
    $this->description = $Database->escape_value($desc);
    $this->price = $Database->escape_value($price);
    $this->quantity = $Database->escape_value($quantity);
    $this->lgarea = $Database->escape_value($lgarea);
    $this->location = $Database->escape_value($location);
    $this->phone_number = $Database->escape_value($phone);
    $this->user_name = $Database->escape_value($user_name);
     
     $user = new User();
     $user->find_by_mail($session->user_id);
     $mobile_upload = $mobile_upload."/".$user->email;
     
    if(!empty($file)){
    $this->file_name = basename($Database->escape_value($file['name']));
        $this->tem_file = $file['tmp_name'];
        $mobile_target_file = $mobile_upload."/".$this->file_name;
        $this->mov1 = move_uploaded_file($this->tem_file,$mobile_target_file);
       } 
         if(!empty($file2)){
    $this->file_name2 = basename($Database->escape_value($file2['name']));
        $this->tem_file2 = $file2['tmp_name'];
        $mobile_target_file2 = $mobile_upload."/".$this->file_name2;
        $this->mov2 = move_uploaded_file($this->tem_file2,$mobile_target_file2);
       } 
          if(!empty($file3)){
    $this->file_name3 = basename($Database->escape_value($file3['name']));
        $this->tem_file3 = $file3['tmp_name'];
        $mobile_target_file3 = $mobile_upload."/".$this->file_name3;
       $this->mov3 =  move_uploaded_file($this->tem_file3,$mobile_target_file3);
       }
            if(!empty($file4)){
    $this->file_name4 = basename($Database->escape_value($file4['name']));
        $this->tem_file4 = $file4['tmp_name'];
        $mobile_target_file4 = $mobile_upload."/".$this->file_name4;
       $this->mov4 =  move_uploaded_file($this->tem_file4,$mobile_target_file4);
       }
            if(!empty($file5)){
    $this->file_name5 = basename($Database->escape_value($file5['name']));
        $this->tem_file5 = $file5['tmp_name'];
        $mobile_target_file5 = $mobile_upload."/".$this->file_name5;
       $this->mov5 =  move_uploaded_file($this->tem_file5,$mobile_target_file5);
       }
            if(!empty($file6)){
    $this->file_name6 = basename($Database->escape_value($file6['name']));
        $this->tem_file6 = $file6['tmp_name'];
        $mobile_target_file6 = $mobile_upload."/".$this->file_name6;
       $this->mov6 =  move_uploaded_file($this->tem_file6,$mobile_target_file6);
       }
       
  $date = strftime('%Y/-%m/-%d-/%H/-%M/-%S', time());
    $sql = "UPDATE goodsandservices SET ";
        $sql .="adname = ";
        $sql .= "'".$this->adname."', ";
        $sql .="description = ";
        $sql .= "'".$this->description."', ";
         $sql .="price = ";
          $sql .= "'".$this->price."', ";
        $sql .="quantity = ";
        $sql .= "'".$this->quantity."', ";
        $sql .="lg_area = ";
        $sql .= "'".$this->lgarea."', ";
        $sql .="location = ";
        $sql .= "'".$this->location."', ";
        $sql .="phone = ";
        $sql .= "'".$this->phone_number."', ";
        $sql .="user_name = ";
        $sql .= "'".$this->user_name."', ";
        $sql .="file_name = ";
        $sql .= "'".$this->file_name."', ";
        $sql .="file_name2 = ";
        $sql .= "'".$this->file_name2."', ";
        $sql .="file_name3 = ";
        $sql .= "'".$this->file_name3."', ";
        $sql .="file_name4 = ";
        $sql .= "'".$this->file_name4."', ";
        $sql .="file_name5 = ";
        $sql .= "'".$this->file_name5."', ";
        $sql .="file_name6 = ";
        $sql .= "'".$this->file_name6."' ";
        $sql .= " where ad_id = ";
        $sql .= "'".$adid."'";
        $sql.= " and user_id = ";
        $sql.= "'".$session->user_id ."'";
        $res = $Database->add_query($sql);
        
        }
        
         public function update_fashion($mobile_upload,$file,$file2,$file3,$file4,$file5,$file6,$adid,$adname,$desc, $price,$cloth,$watch,
				  $quantity, $lgarea,$location,$phone, $user_name){
    global $Database;
    global $session;
     $this->adtable = "goodsandservices";
    $this->adname = $Database->escape_value($adname);
    $this->description = $Database->escape_value($desc);
    $this->price = $Database->escape_value($price);
    $this->cloth= $Database->escape_value($cloth);
    $this->watch= $Database->escape_value($watch);
    $this->quantity = $Database->escape_value($quantity);
    $this->lgarea = $Database->escape_value($lgarea);
    $this->location = $Database->escape_value($location);
    $this->phone_number = $Database->escape_value($phone);
    $this->user_name = $Database->escape_value($user_name);
     $user = new User();
     $user->find_by_mail($session->user_id);
     $mobile_upload = $mobile_upload."/".$user->email;
     
    if(!empty($file)){
    $this->file_name = basename($Database->escape_value($file['name']));
        $this->tem_file = $file['tmp_name'];
        $mobile_target_file = $mobile_upload."/".$this->file_name;
        $this->mov1 = move_uploaded_file($this->tem_file,$mobile_target_file);
       } 
         if(!empty($file2)){
    $this->file_name2 = basename($Database->escape_value($file2['name']));
        $this->tem_file2 = $file2['tmp_name'];
        $mobile_target_file2 = $mobile_upload."/".$this->file_name2;
        $this->mov2 = move_uploaded_file($this->tem_file2,$mobile_target_file2);
       } 
          if(!empty($file3)){
    $this->file_name3 = basename($Database->escape_value($file3['name']));
        $this->tem_file3 = $file3['tmp_name'];
        $mobile_target_file3 = $mobile_upload."/".$this->file_name3;
       $this->mov3 =  move_uploaded_file($this->tem_file3,$mobile_target_file3);
       }
            if(!empty($file4)){
    $this->file_name4 = basename($Database->escape_value($file4['name']));
        $this->tem_file4 = $file4['tmp_name'];
        $mobile_target_file4 = $mobile_upload."/".$this->file_name4;
       $this->mov4 =  move_uploaded_file($this->tem_file4,$mobile_target_file4);
       }
            if(!empty($file5)){
    $this->file_name5 = basename($Database->escape_value($file5['name']));
        $this->tem_file5 = $file5['tmp_name'];
        $mobile_target_file5 = $mobile_upload."/".$this->file_name5;
       $this->mov5 =  move_uploaded_file($this->tem_file5,$mobile_target_file5);
       }
            if(!empty($file6)){
    $this->file_name6 = basename($Database->escape_value($file6['name']));
        $this->tem_file6 = $file6['tmp_name'];
        $mobile_target_file6 = $mobile_upload."/".$this->file_name6;
       $this->mov6 =  move_uploaded_file($this->tem_file6,$mobile_target_file6);
       }
       
  $date = strftime('%Y/-%m/-%d-/%H/-%M/-%S', time());
   $sql = "UPDATE goodsandservices SET ";
        $sql .="adname = ";
        $sql .= "'".$this->adname."', ";
        $sql .="description = ";
        $sql .= "'".$this->description."', ";
         $sql .="price = ";
          $sql .= "'".$this->price."', ";
        $sql .="clothing = ";
        $sql .= "'".$this->cloth."', ";
        $sql .="watches = ";
        $sql .= "'".$this->watch."', ";
        $sql .="quantity = ";
        $sql .= "'".$this->quantity."', ";
        $sql .="lg_area = ";
        $sql .= "'".$this->lgarea."', ";
        $sql .="location = ";
        $sql .= "'".$this->location."', ";
        $sql .="phone = ";
        $sql .= "'".$this->phone_number."', ";
        $sql .="user_name = ";
        $sql .= "'".$this->user_name."', ";
        $sql .="file_name = ";
        $sql .= "'".$this->file_name."', ";
        $sql .="file_name2 = ";
        $sql .= "'".$this->file_name2."', ";
        $sql .="file_name3 = ";
        $sql .= "'".$this->file_name3."', ";
        $sql .="file_name4 = ";
        $sql .= "'".$this->file_name4."', ";
        $sql .="file_name5 = ";
        $sql .= "'".$this->file_name5."', ";
        $sql .="file_name6 = ";
        $sql .= "'".$this->file_name6."' ";
        $sql .= " where ad_id = ";
        $sql .= "'".$adid."'";
        $sql.= " and user_id = ";
        $sql.= "'".$session->user_id ."'";
        
        $res = $Database->add_query($sql);
        
        }
        
         public function update_electronics($mobile_upload,$file,$file2,$file3,$file4,$file5,$file6,$adid,$adname,$desc, $price,$laptop,$tv_name,
				  $quantity, $lgarea,$location,$phone, $user_name){
    global $Database;
    global $session;
    $this->adtable = "goodsandservices";
    $this->adname = $Database->escape_value($adname);
    $this->description = $Database->escape_value($desc);
    $this->price = $Database->escape_value($price); 
    $this->laptop= $Database->escape_value($laptop);
    $this->tv_name= $Database->escape_value($tv_name);
    $this->quantity = $Database->escape_value($quantity);
    $this->lgarea = $Database->escape_value($lgarea);
    $this->location = $Database->escape_value($location);
    $this->phone_number = $Database->escape_value($phone);
    $this->user_name = $Database->escape_value($user_name);
     
     $user = new User();
     $user->find_by_mail($session->user_id);
     $mobile_upload = $mobile_upload."/".$user->email;
     
     if(!empty($file)){
    $this->file_name = basename($Database->escape_value($file['name']));
        $this->tem_file = $file['tmp_name'];
        $mobile_target_file = $mobile_upload."/".$this->file_name;
        $this->mov1 = move_uploaded_file($this->tem_file,$mobile_target_file);
       } 
         if(!empty($file2)){
    $this->file_name2 = basename($Database->escape_value($file2['name']));
        $this->tem_file2 = $file2['tmp_name'];
        $mobile_target_file2 = $mobile_upload."/".$this->file_name2;
        $this->mov2 = move_uploaded_file($this->tem_file2,$mobile_target_file2);
       } 
          if(!empty($file3)){
    $this->file_name3 = basename($Database->escape_value($file3['name']));
        $this->tem_file3 = $file3['tmp_name'];
        $mobile_target_file3 = $mobile_upload."/".$this->file_name3;
       $this->mov3 =  move_uploaded_file($this->tem_file3,$mobile_target_file3);
       }
            if(!empty($file4)){
    $this->file_name4 = basename($Database->escape_value($file4['name']));
        $this->tem_file4 = $file4['tmp_name'];
        $mobile_target_file4 = $mobile_upload."/".$this->file_name4;
       $this->mov4 =  move_uploaded_file($this->tem_file4,$mobile_target_file4);
       }
            if(!empty($file5)){
    $this->file_name5 = basename($Database->escape_value($file5['name']));
        $this->tem_file5 = $file5['tmp_name'];
        $mobile_target_file5 = $mobile_upload."/".$this->file_name5;
       $this->mov5 =  move_uploaded_file($this->tem_file5,$mobile_target_file5);
       }
            if(!empty($file6)){
    $this->file_name6 = basename($Database->escape_value($file6['name']));
        $this->tem_file6 = $file6['tmp_name'];
        $mobile_target_file6 = $mobile_upload."/".$this->file_name6;
       $this->mov6 =  move_uploaded_file($this->tem_file6,$mobile_target_file6);
       }
    
  $date = strftime('%Y/-%m/-%d-/%H/-%M/-%S', time());
    $sql = "UPDATE goodsandservices SET ";
        $sql .="adname = ";
        $sql .= "'".$this->adname."', ";
        $sql .="description = ";
        $sql .= "'".$this->description."', ";
         $sql .="price = ";
          $sql .= "'".$this->price."', ";
        $sql .="laptop = ";
        $sql .= "'".$this->laptop."', ";
        $sql .="tv_brand = ";
        $sql .= "'".$this->tv_name."', ";
        $sql .="quantity = ";
        $sql .= "'".$this->quantity."', ";
        $sql .="lg_area = ";
        $sql .= "'".$this->lgarea."', ";
        $sql .="location = ";
        $sql .= "'".$this->location."', ";
        $sql .="phone = ";
        $sql .= "'".$this->phone_number."', ";
        $sql .="user_name = ";
        $sql .= "'".$this->user_name."', ";
        $sql .="file_name = ";
        $sql .= "'".$this->file_name."', ";
        $sql .="file_name2 = ";
        $sql .= "'".$this->file_name2."', ";
        $sql .="file_name3 = ";
        $sql .= "'".$this->file_name3."', ";
        $sql .="file_name4 = ";
        $sql .= "'".$this->file_name4."', ";
        $sql .="file_name5 = ";
        $sql .= "'".$this->file_name5."', ";
        $sql .="file_name6 = ";
        $sql .= "'".$this->file_name6."' ";
        $sql .= " where ad_id = ";
        $sql .= "'".$adid."'";
        $sql.= " and user_id = ";
        $sql.= "'".$session->user_id ."'";
        
        $res = $Database->add_query($sql);
        
        }
}

?>