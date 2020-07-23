<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/database.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/user.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/session.php');
class buyandsell {
public $pageAdrress;
public $user;
public $insert_id;
public $address ="http://www.zukasell.com/";
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
    public function attach_file($file){
        global $Database;
        if(!$file || empty($file)|| !is_array($file)){
            $this->error[] = "No file was uploaded";
            return false;
        }
        elseif($file['error']!=0){
            $this->error[] = $this->upload_error[$file['error']];
            return false;
        }else{
        $this->tem_file = $file['tmp_name'];
        $this->file_name = basename($Database->escape_value($file['name']));
        return true;
        }
    }

public function create_table(){
global $Database;

$this->adtable = "goodsandservices";

$sql = "create table IF NOT EXISTS ". $this->adtable;
            $sql .= " (ad_id int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
                    user_id int(10) UNSIGNED NOT NULL,
                   description text NOT NULL,
                    title varchar(100) NOT NULL,
                    price varchar(50),
                    contact varchar(20),
                    file_name varchar(100),
                    location varchar(100),
                     date datetime NOT NULL,                                  
                     file_name2 varchar(100),
                     file_name3 varchar(100),
                     file_name4 varchar(100),
                     file_name5 varchar(100),
                     file_name6 varchar(100),
                     quantity int(10),
                     PRIMARY KEY (id) 
                     )";
            $Database->add_query($sql);
            }
            
    public function insert_into_table($mobile_upload,$adname,$desc, $price,$category,
                                      $subcat,$specify,$car_maker,$truck_maker,$motorcycle,$cloth,$watch,$laptop,$tv_name,
                                      $car_model,$car_tran,$truck_model,$truck_tran,$motor_model,$motor_tran,$phone_maker,$phone_model,$tablet_maker,$tablet_model,$ad_loc,
                                      $quantity,$lgarea, $location,$phone, $user_name, $file,
                                      $file2, $file3,$file4,$file5,$file6
                                      ){
    global $Database;
    global $session;
    $this->adtable = "goodsandservices";
    $this->adname = $Database->escape_value($adname);
    $this->description = $Database->escape_value($desc);
    $this->price = $Database->escape_value($price);
    $this->category = $Database->escape_value($category);
    $this->subcat= $Database->escape_value($subcat);
    $this->specify= $Database->escape_value($specify);
    $this->car_maker= $Database->escape_value($car_maker);
    $this->truck_maker= $Database->escape_value($truck_maker);
    $this->motorcycle= $Database->escape_value($motorcycle);
    $this->cloth= $Database->escape_value($cloth);
    $this->watch= $Database->escape_value($watch);
    $this->laptop= $Database->escape_value($laptop);
    $this->tv_name= $Database->escape_value($tv_name);
    $this->car_model= $Database->escape_value($car_model);
    $this->car_tran = $Database->escape_value($car_tran);
    $this->truck_model = $Database->escape_value($truck_model);
    $this->truck_tran = $Database->escape_value($truck_tran);
    $this->motor_model  = $Database->escape_value($motor_model);
    $this->motor_tran  = $Database->escape_value($motor_tran);
    $this->phone_maker= $Database->escape_value($phone_maker);
    $this->phone_model= $Database->escape_value($phone_model);
    $this->tablet_maker= $Database->escape_value($tablet_maker);
    $this->tablet_model= $Database->escape_value($tablet_model);
    $this->ad_loc= $Database->escape_value($ad_loc);
    $this->quantity = $Database->escape_value($quantity);
    $this->lgarea = $Database->escape_value($lgarea);
    $this->location = $Database->escape_value($location);
    $this->phone_number = $Database->escape_value($phone);
    $this->user_name = $Database->escape_value($user_name);
    
    $this->user = $session->user_id;
    $user = new User();
    $user->find_by_mail($session->user_id);
    $mobile_upload = "uploads/".$user->email;
    
    
    
    
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
          
         if($this->mov1 || $this->mov2 || $this->mov3 || $this->mov4 ||
            $this->mov5 || $this->mov6){
    
        
        $sql = "INSERT INTO " . $this->adtable."(user_id,adname, description,price,category,subcategory,extra_info,
                car_maker,truck_maker, motorcycle, clothing, watches, laptop, tv_brand,car_model,car_transmission,truck_model,
                truck_transmission, motorcycle_model, motorcycle_transmission,phone_maker,phone_model,tablet_maker,tablet_model,ad_address,quantity,
                lg_area,location,phone,user_name,file_name,file_name2,file_name3,file_name4,file_name5,file_name6, date)";
        $sql .= "VALUES ('$this->user','$this->adname','$this->description','$this->price','$this->category','$this->subcat',
                '$this->specify','$this->car_maker','$this->truck_maker','$this->motorcycle','$this->cloth','$this->watch',
                '$this->laptop','$this->tv_name','$this->car_model','$this->car_tran','$this->truck_model','$this->truck_tran','$this->motor_model','$this->motor_tran','$this->phone_maker','$this->phone_model',
                '$this->tablet_maker','$this->tablet_model','$this->ad_loc','$this->quantity','$this->lgarea','$this->location','$this->phone_number','$this->user_name',
                '$this->file_name', '$this->file_name2', '$this->file_name3','$this->file_name4','$this->file_name5','$this->file_name6','$date' )";
        $res = $Database->add_query($sql);
      $this->insert_id = $Database->insert_id();
        
        
  }
  else{
        $sqli = "INSERT INTO " . $this->adtable."(
                user_id,adname, description,price,category,subcategory,extra_info,car_maker,truck_maker,
                motorcycle, clothing, watches, laptop, tv_brand,car_model,car_transmission,truck_model, truck_transmission,
                motorcycle_model, motorcycle_transmission,phone_maker,phone_model,tablet_maker,tablet_model,ad_address,quantity,lg_area,location,phone,
                user_name, date )";
        $sqli .= "VALUES ('$this->user','$this->adname','$this->description','$this->price','$this->category','$this->subcat','$this->specify',
                '$this->car_maker','$this->truck_maker','$this->motorcycle','$this->cloth','$this->watch','$this->laptop','$this->tv_name',
                '$this->car_model','$this->car_tran','$this->truck_model','$this->truck_tran','$this->motor_model','$this->motor_tran',
                '$this->phone_maker','$this->phone_model','$this->tablet_maker','$this->tablet_model','$this->ad_loc','$this->quantity','$this->lgarea','$this->location',
                '$this->phone_number','$this->user_name','$date' )";
        $resi = $Database->add_query($sqli);
       $this->insert_id = $Database->insert_id();
        
        }
        $this->message = "Success";

}
        
     public function select_from($per_page, $offset){
     global $Database;
     
     $sql = "select * from goodsandservices";
      $sql .= " ORDER BY date DESC ";
      $sql .= " LIMIT {$per_page} ";
     $sql .= "OFFSET {$offset}";
        $res = $Database->add_query($sql);
        if($Database->num_rows($res)  == 0 ){
            echo " <div class='no_ad_to_display_div'><p>There is no ad yet . Please click the picture below to create an Advert. It is free and always will it be</p>";
     echo   '<a href="'.$Database->address.'buyandsellad.php"><img src="'.$Database->address.'required/zukasell_ad_sell.jpg" class="no_ad_to_display_image" /></a></div>';         
        }
        while($result = $Database->fetch_array($res)){
            $this->user = $result['user_id'];   
            $this->description = ucfirst($result['description']);
            $this->file_name = $result['file_name'];
            $this->file_name2 = $result['file_name2'];
            $this->file_name3 = $result['file_name3'];
            $this->phone_number = $result['phone'];
            $this->location = ucfirst($result['location']);
            $this->adname = ucfirst($result['adname']);
            $this->price = $result['price'];
            $this->id = $result['ad_id'];
            $this->quantity = $result['quantity'];
            $user = new User();
            $user->find_by_mail($this->user);
           
           if($this->file_name != ""){
           $source = $Database->address."uploads/".$user->email."/".$this->file_name;
            } 
            elseif($this->file_name2 != ""){
            $source = $Database->address."uploads/".$user->email."/".$this->file_name2;
            }
            elseif($this->file_name3 != ""){
            $source = $Database->address." uploads/".$user->email."/".$this->file_name3;
            }
            elseif($this->file_name4 != ""){
            $source = $Database->address." uploads/".$user->email."/".$this->file_name4;
            }
            elseif($this->file_name5 != ""){
            $source = $Database->address." uploads/".$user->email."/".$this->file_name5;
            }
            elseif($this->file_name6 != ""){
            $source = $Database->address." uploads/".$user->email."/".$this->file_name6;
            }else{
            $source = $Database->address."required/no-picture.jpg";
            }

            if($this->adname == ""){
            $adname = "&nbsp";
            }else{
            $adname = $this->adname;
            }
           
         
        if($this->quantity == 0){
        $this->quantity = 1;
        }
           $this->category = $result['category'];
        if($this->category == "Fashion and Beauty"){
            $this->pageAdrress = $Database->fashion;
        }elseif($this->category == "Mobile Phones and Tablet"){
            $this->pageAdrress = $Database->mobile;
        }
        elseif($this->category == "Vehicle"){
            $this->pageAdrress = $Database->vehicle;
        }
         elseif($this->category == "Electronics"){
            $this->pageAdrress = $Database->electronics;
         }
         elseif($this->category == "Home,Furniture and Garden"){
            $this->pageAdrress = $Database->home;
         }
         elseif($this->category == "Real Estate"){
            $this->pageAdrress = $Database->realEstate;
        }else{
    $this->pageAdrress = $Database->jobs;
      }
$sanitized_adname = str_replace(" ","-",$this->adname);
     echo '<div class="select_from" >';
      echo '<a href="'.$this->pageAdrress.$this->id."/".$sanitized_adname.'" ><div style="width:100%; border-bottom: 1px solid grey"><img src="'. $source .'" style="width:100%;height: 140px " alt="'.$this->adname.'" /></div></a>';
      echo ' <a href="'.$this->pageAdrress.$this->id."/".$sanitized_adname.'" >
<p class="select_p" ><strong style=" ">'. $adname .'</strong></p></a>';
      
        echo ' <p style="background-color:white; width:97%; padding-left:3%">
        <strong style=" padding-bottom:20px; color: #8a8a0f">';
      ?>&#8358
        <?php echo $this->price . '</strong></p>';
        echo '<p class="select_p" ><strong style=" ">'. $this->location .'</strong></p>';

     echo '</div>';
            
    }
  
    }
    
    
     public function select_from_with_lg($lg,$per_page,$offset){
     global $Database;
     
     $sql = "select * from goodsandservices";
     $sql .= " where lg_area = ";
     $sql .= "'". $lg ."'";
    $sql .= " ORDER BY date DESC";
     $sql .= " LIMIT {$per_page} ";
     $sql .= "OFFSET {$offset}";
        $res = $Database->add_query($sql);
        if($Database->num_rows($res)  == 0 ){
            echo " <div class='no_ad_to_display_div'><p>There is no ad yet . Please click  below to create an Advert. It is always free</p>";
     echo   '<a href="'.$Database->address.'buyandsellad.php"><img src="'.$Database->address.'required/zukasell_ad_sell.jpg" class="no_ad_to_display_image" /></a></div>'; 
        }
        while($result = $Database->fetch_array($res)){
            $this->user = $result['user_id'];   
            $this->description = ucfirst($result['description']);
            $this->file_name = $result['file_name'];
            $this->file_name2 = $result['file_name2'];
            $this->file_name3 = $result['file_name3'];
            $this->phone_number = $result['phone'];
            $this->location = ucfirst($result['location']);
            $this->adname = ucfirst($result['adname']);
            $this->price = $result['price'];
            $this->id = $result['ad_id'];
            $this->quantity = $result['quantity'];
            $user = new User();
            $user->find_by_mail($this->user);
           
            if($this->file_name != ""){
           $source = $Database->address."uploads/".$user->email."/".$this->file_name;
            } 
            elseif($this->file_name2 != ""){
            $source = $Database->address."uploads/".$user->email."/".$this->file_name2;
            }
            elseif($this->file_name3 != ""){
            $source = $Database->address." uploads/".$user->email."/".$this->file_name3;
            }
            elseif($this->file_name4 != ""){
            $source = $Database->address." uploads/".$user->email."/".$this->file_name4;
            }
            elseif($this->file_name5 != ""){
            $source = $Database->address." uploads/".$user->email."/".$this->file_name5;
            }
            elseif($this->file_name6 != ""){
            $source = $Database->address." uploads/".$user->email."/".$this->file_name6;
            }else{
            $source = $Database->address."required/no-picture.jpg";
            }
            if($this->adname == ""){
            $adname = "&nbsp";
            }else{
            $adname = $this->adname;
            }
           
         
        if($this->quantity == 0){
        $this->quantity = 1;
        }
           $this->category = $result['category'];
        if($this->category == "Fashion and Beauty"){
            $this->pageAdrress = $Database->fashion;
        }elseif($this->category == "Mobile Phones and Tablet"){
            $this->pageAdrress = $Database->mobile;
        }
        elseif($this->category == "Vehicle"){
            $this->pageAdrress = $Database->vehicle;
        }
         elseif($this->category == "Electronics"){
            $this->pageAdrress = $Database->electronics;
         }
         elseif($this->category == "Home,Furniture and Garden"){
            $this->pageAdrress = $Database->home;
         }
         elseif($this->category == "Real Estate"){
            $this->pageAdrress = $Database->realEstate;
        }else{
    $this->pageAdrress = $Database->jobs;
      }
$sanitized_adname = str_replace(" ","-",$this->adname);
     echo '<div class="select_from" >';
      echo '<a href="'.$this->pageAdrress.$this->id."/".$sanitized_adname.'" ><div style="width:100%; border-bottom: 1px solid grey"><img src="'. $source .'" style="width:100%;height: 140px " alt="'.$this->adname.'" /></div></a>';
      echo ' <a href="'.$this->pageAdrress.$this->id."/".$sanitized_adname.'" >
<p class="select_p" ><strong style=" ">'. $adname .'</strong></p></a>';
      
        echo ' <p style="background-color:white; width:97%; padding-left:3%">
        <strong style=" padding-bottom:20px; color: #8a8a0f">';
      ?>&#8358
        <?php echo $this->price . '</strong></p>';
        echo '<p class="select_p" ><strong style=" ">'. $this->location .'</strong></p>';

     echo '</div>';
            
    }
  
    }
    
   public function select_from_with_name($name,$per_page,$offset){
     global $Database;
     
     $sql = "select * from goodsandservices";
     $sql .= " where adname like ";
     $sql .= "'%". $name ."%'";
    $sql .= " ORDER BY date DESC";
    $sql .= " LIMIT {$per_page} ";
     $sql .= "OFFSET {$offset}";
        $res = $Database->add_query($sql);
        if($Database->num_rows($res)  == 0 ){
           echo " <div class='no_ad_to_display_div'><p>There is no ad yet . Please click  below to create an Advert. It is always free</p>";
     echo   '<a href="'.$Database->address.'buyandsellad.php"><img src="'.$Database->address.'required/zukasell_ad_sell.jpg" class="no_ad_to_display_image" /></a></div>';
        }
        while($result = $Database->fetch_array($res)){
            $this->user = $result['user_id'];   
            $this->description = ucfirst($result['description']);
            $this->file_name = $result['file_name'];
            $this->file_name2 = $result['file_name2'];
            $this->file_name3 = $result['file_name3'];
            $this->phone_number = $result['phone'];
            $this->location = ucfirst($result['location']);
            $this->adname = ucfirst($result['adname']);
            $this->price = $result['price'];
            $this->id = $result['ad_id'];
            $this->quantity = $result['quantity'];
            $user = new User();
            $user->find_by_mail($this->user);
           
           if($this->file_name != ""){
           $source = $Database->address."uploads/".$user->email."/".$this->file_name;
            } 
            elseif($this->file_name2 != ""){
            $source = $Database->address."uploads/".$user->email."/".$this->file_name2;
            }
            elseif($this->file_name3 != ""){
            $source = $Database->address." uploads/".$user->email."/".$this->file_name3;
            }
            elseif($this->file_name4 != ""){
            $source = $Database->address." uploads/".$user->email."/".$this->file_name4;
            }
            elseif($this->file_name5 != ""){
            $source = $Database->address." uploads/".$user->email."/".$this->file_name5;
            }
            elseif($this->file_name6 != ""){
            $source = $Database->address." uploads/".$user->email."/".$this->file_name6;
            }else{
            $source = $Database->address."required/no-picture.jpg";
            }

            if($this->adname == ""){
            $adname = "&nbsp";
            }else{
            $adname = $this->adname;
            }
           
         
        if($this->quantity == 0){
        $this->quantity = 1;
        }
           $this->category = $result['category'];
        if($this->category == "Fashion and Beauty"){
            $this->pageAdrress = $Database->fashion;
        }elseif($this->category == "Mobile Phones and Tablet"){
            $this->pageAdrress = $Database->mobile;
        }
        elseif($this->category == "Vehicle"){
            $this->pageAdrress = $Database->vehicle;
        }
         elseif($this->category == "Electronics"){
            $this->pageAdrress = $Database->electronics;
         }
         elseif($this->category == "Home,Furniture and Garden"){
            $this->pageAdrress = $Database->home;
         }
         elseif($this->category == "Real Estate"){
            $this->pageAdrress = $Database->realEstate;
        }else{
    $this->pageAdrress = $Database->jobs;
      }
$sanitized_adname = str_replace(" ","-",$this->adname);
     echo '<div class="select_from" >';
      echo '<a href="'.$this->pageAdrress.$this->id."/".$sanitized_adname.'" ><div style="width:100%; border-bottom: 1px solid grey"><img src="'. $source .'" style="width:100%;height: 140px " alt="'.$this->adname.'" /></div></a>';
      echo ' <a href="'.$this->pageAdrress.$this->id."/".$sanitized_adname.'" >
<p class="select_p" ><strong style=" ">'. $adname .'</strong></p></a>';
      
        echo ' <p style="background-color:white; width:97%; padding-left:3%">
        <strong style=" padding-bottom:20px; color: #8a8a0f">';
      ?>&#8358
        <?php echo $this->price . '</strong></p>';
        echo '<p class="select_p" ><strong style=" ">'. $this->location .'</strong></p>';

     echo '</div>';
            
    }
  
    }
      public function select_from_with_lg_and_name($lg,$name,$per_page,$offset){
     global $Database;
     
     $sql = "select * from goodsandservices";
     $sql .= " where adname like ";
     $sql .= "'%". $name ."%'";
     $sql .= " and lg_area = ";
     $sql .= "'". $lg ."'";
    $sql .= " ORDER BY date DESC";
    $sql .= " LIMIT {$per_page} ";
     $sql .= "OFFSET {$offset}";
        $res = $Database->add_query($sql);
        if($Database->num_rows($res)  == 0 ){
          echo " <div class='no_ad_to_display_div'><p>There is no ad yet . Please click  below to create an Advert. It is always free</p>";
     echo   '<a href="'.$Database->address.'buyandsellad.php"><img src="'.$Database->address.'required/zukasell_ad_sell.jpg" class="no_ad_to_display_image" /></a></div>';
        }
       while($result = $Database->fetch_array($res)){
            $this->user = $result['user_id'];   
            $this->description = ucfirst($result['description']);
            $this->file_name = $result['file_name'];
            $this->file_name2 = $result['file_name2'];
            $this->file_name3 = $result['file_name3'];
            $this->phone_number = $result['phone'];
            $this->location = ucfirst($result['location']);
            $this->adname = ucfirst($result['adname']);
            $this->price = $result['price'];
            $this->id = $result['ad_id'];
            $this->quantity = $result['quantity'];
            $user = new User();
            $user->find_by_mail($this->user);
           
           if($this->file_name != ""){
           $source = $Database->address."uploads/".$user->email."/".$this->file_name;
            } 
            elseif($this->file_name2 != ""){
            $source = $Database->address."uploads/".$user->email."/".$this->file_name2;
            }
            elseif($this->file_name3 != ""){
            $source = $Database->address." uploads/".$user->email."/".$this->file_name3;
            }
            elseif($this->file_name4 != ""){
            $source = $Database->address." uploads/".$user->email."/".$this->file_name4;
            }
            elseif($this->file_name5 != ""){
            $source = $Database->address." uploads/".$user->email."/".$this->file_name5;
            }
            elseif($this->file_name6 != ""){
            $source = $Database->address." uploads/".$user->email."/".$this->file_name6;
            }else{
            $source = $Database->address."required/no-picture.jpg";
            }
            if($this->adname == ""){
            $adname = "&nbsp";
            }else{
            $adname = $this->adname;
            }
           
         
        if($this->quantity == 0){
        $this->quantity = 1;
        }
           $this->category = $result['category'];
        if($this->category == "Fashion and Beauty"){
            $this->pageAdrress = $Database->fashion;
        }elseif($this->category == "Mobile Phones and Tablet"){
            $this->pageAdrress = $Database->mobile;
        }
        elseif($this->category == "Vehicle"){
            $this->pageAdrress = $Database->vehicle;
        }
         elseif($this->category == "Electronics"){
            $this->pageAdrress = $Database->electronics;
         }
         elseif($this->category == "Home,Furniture and Garden"){
            $this->pageAdrress = $Database->home;
         }
         elseif($this->category == "Real Estate"){
            $this->pageAdrress = $Database->realEstate;
        }else{
    $this->pageAdrress = $Database->jobs;
      }
$sanitized_adname = str_replace(" ","-",$this->adname);
     echo '<div class="select_from" >';
      echo '<a href="'.$this->pageAdrress.$this->id."/".$sanitized_adname.'" ><div style="width:100%; border-bottom: 1px solid grey"><img src="'. $source .'" style="width:100%;height: 140px " alt="'.$this->adname.'" /></div></a>';
      echo ' <a href="'.$this->pageAdrress.$this->id."/".$sanitized_adname.'" >
<p class="select_p" ><strong style=" ">'. $adname .'</strong></p></a>';
      
        echo ' <p style="background-color:white; width:97%; padding-left:3%">
        <strong style=" padding-bottom:20px; color: #8a8a0f">';
      ?>&#8358
        <?php echo $this->price . '</strong></p>';
        echo '<p class="select_p" ><strong style=" ">'. $this->location .'</strong></p>';

     echo '</div>';
            
    }
  
    }
    
      public function select_from_table($table,$per_page,$offset){
     global $Database;
     
     $sql = "select * from goodsandservices";
        $sql .= " where category = ";
        $sql .= "'".$table ."'";
        $sql .= " ORDER BY date DESC";
        $sql .= " LIMIT {$per_page} ";
        $sql .= "OFFSET {$offset}";
        $res = $Database->add_query($sql);
        if($Database->num_rows($res)  == 0 ){
           echo " <div class='no_ad_to_display_div'><p>There is no ad yet . Please click  below to create an Advert. It is always free</p>";
     echo   '<a href="'.$Database->address.'buyandsellad.php"><img src="'.$Database->address.'required/zukasell_ad_sell.jpg" class="no_ad_to_display_image" /></a></div>';
        }
        while($result = $Database->fetch_array($res)){
            $this->user = $result['user_id'];   
            $this->description = ucfirst($result['description']);
            $this->file_name = $result['file_name'];
            $this->file_name2 = $result['file_name2'];
            $this->file_name3 = $result['file_name3'];
            $this->phone_number = $result['phone'];
            $this->location = ucfirst($result['location']);
            $this->adname = ucfirst($result['adname']);
            $this->price = $result['price'];
            $this->id = $result['ad_id'];
            $this->quantity = $result['quantity'];
            $user = new User();
            $user->find_by_mail($this->user);
           
           if($this->file_name != ""){
           $source = $Database->address."uploads/".$user->email."/".$this->file_name;
            } 
            elseif($this->file_name2 != ""){
            $source = $Database->address."uploads/".$user->email."/".$this->file_name2;
            }
            elseif($this->file_name3 != ""){
            $source = $Database->address." uploads/".$user->email."/".$this->file_name3;
            }
            elseif($this->file_name4 != ""){
            $source = $Database->address." uploads/".$user->email."/".$this->file_name4;
            }
            elseif($this->file_name5 != ""){
            $source = $Database->address." uploads/".$user->email."/".$this->file_name5;
            }
            elseif($this->file_name6 != ""){
            $source = $Database->address." uploads/".$user->email."/".$this->file_name6;
            }else{
            $source = $Database->address."required/no-picture.jpg";
            }
            if($this->adname == ""){
            $adname = "&nbsp";
            }else{
            $adname = $this->adname;
            }
           
         
        if($this->quantity == 0){
        $this->quantity = 1;
        }
           $this->category = $result['category'];
        if($this->category == "Fashion and Beauty"){
            $this->pageAdrress = $Database->fashion;
        }elseif($this->category == "Mobile Phones and Tablet"){
            $this->pageAdrress = $Database->mobile;
        }
        elseif($this->category == "Vehicle"){
            $this->pageAdrress = $Database->vehicle;
        }
         elseif($this->category == "Electronics"){
            $this->pageAdrress = $Database->electronics;
         }
         elseif($this->category == "Home,Furniture and Garden"){
            $this->pageAdrress = $Database->home;
         }
         elseif($this->category == "Real Estate"){
            $this->pageAdrress = $Database->realEstate;
        }else{
    $this->pageAdrress = $Database->jobs;
      }
$sanitized_adname = str_replace(" ","-",$this->adname);
     echo '<div class="select_from" >';
      echo '<a href="'.$this->pageAdrress.$this->id."/".$sanitized_adname.'" ><div style="width:100%; border-bottom: 1px solid grey"><img src="'. $source .'" style="width:100%;height: 140px " alt="'.$this->adname.'" /></div></a>';
      echo ' <a href="'.$this->pageAdrress.$this->id."/".$sanitized_adname.'" >
<p class="select_p" ><strong style=" ">'. $adname .'</strong></p></a>';
      
        echo ' <p style="background-color:white; width:97%; padding-left:3%">
        <strong style=" padding-bottom:20px; color: #8a8a0f">';
      ?>&#8358
        <?php echo $this->price . '</strong></p>';
        echo '<p class="select_p" ><strong style=" ">'. $this->location .'</strong></p>';

     echo '</div>';
            
    }
  
    }
     public function select_from_table_with_lg($table, $lg,$per_page,$offset){
     global $Database;
     
     $sql = "select * from goodsandservices";
        $sql .= " where category = ";
        $sql .= "'".$table ."'";
        $sql .= " and lg_area = ";
        $sql .= "'". $lg ."'";
        $sql .= " ORDER BY date DESC";
         $sql .= " LIMIT {$per_page} ";
        $sql .= "OFFSET {$offset}";
        $res = $Database->add_query($sql);
        if($Database->num_rows($res)  == 0 ){
           echo " <div class='no_ad_to_display_div'><p>There is no ad yet . Please click  below to create an Advert. It is always free</p>";
     echo   '<a href="'.$Database->address.'buyandsellad.php"><img src="'.$Database->address.'required/zukasell_ad_sell.jpg" class="no_ad_to_display_image" /></a></div>';
        }
        while($result = $Database->fetch_array($res)){
            $this->user = $result['user_id'];   
            $this->description = ucfirst($result['description']);
            $this->file_name = $result['file_name'];
            $this->file_name2 = $result['file_name2'];
            $this->file_name3 = $result['file_name3'];
            $this->phone_number = $result['phone'];
            $this->location = ucfirst($result['location']);
            $this->adname = ucfirst($result['adname']);
            $this->price = $result['price'];
            $this->id = $result['ad_id'];
            $this->quantity = $result['quantity'];
            $user = new User();
            $user->find_by_mail($this->user);
           
           if($this->file_name != ""){
           $source = $Database->address."uploads/".$user->email."/".$this->file_name;
            } 
            elseif($this->file_name2 != ""){
            $source = $Database->address."uploads/".$user->email."/".$this->file_name2;
            }
            elseif($this->file_name3 != ""){
            $source = $Database->address." uploads/".$user->email."/".$this->file_name3;
            }
            elseif($this->file_name4 != ""){
            $source = $Database->address." uploads/".$user->email."/".$this->file_name4;
            }
            elseif($this->file_name5 != ""){
            $source = $Database->address." uploads/".$user->email."/".$this->file_name5;
            }
            elseif($this->file_name6 != ""){
            $source = $Database->address." uploads/".$user->email."/".$this->file_name6;
            }else{
            $source = $Database->address."required/no-picture.jpg";
            }

            if($this->adname == ""){
            $adname = "&nbsp";
            }else{
            $adname = $this->adname;
            }
           
         
        if($this->quantity == 0){
        $this->quantity = 1;
        }
           $this->category = $result['category'];
        if($this->category == "Fashion and Beauty"){
            $this->pageAdrress = $Database->fashion;
        }elseif($this->category == "Mobile Phones and Tablet"){
            $this->pageAdrress = $Database->mobile;
        }
        elseif($this->category == "Vehicle"){
            $this->pageAdrress = $Database->vehicle;
        }
         elseif($this->category == "Electronics"){
            $this->pageAdrress = $Database->electronics;
         }
         elseif($this->category == "Home,Furniture and Garden"){
            $this->pageAdrress = $Database->home;
         }
         elseif($this->category == "Real Estate"){
            $this->pageAdrress = $Database->realEstate;
        }else{
    $this->pageAdrress = $Database->jobs;
      }
$sanitized_adname = str_replace(" ","-",$this->adname);
     echo '<div class="select_from" >';
      echo '<a href="'.$this->pageAdrress.$this->id."/".$sanitized_adname.'" ><div style="width:100%; border-bottom: 1px solid grey"><img src="'. $source .'" style="width:100%;height: 140px " alt="'.$this->adname.'" /></div></a>';
      echo ' <a href="'.$this->pageAdrress.$this->id."/".$sanitized_adname.'" >
<p class="select_p" ><strong style=" ">'. $adname .'</strong></p></a>';
      
        echo ' <p style="background-color:white; width:97%; padding-left:3%">
        <strong style=" padding-bottom:20px; color: #8a8a0f">';
      ?>&#8358
        <?php echo $this->price . '</strong></p>';
        echo '<p class="select_p" ><strong style=" ">'. $this->location .'</strong></p>';

     echo '</div>';
            
    }
  
    }
     public function select_from_table_with_name($table, $name,$per_page,$offset){
     global $Database;
     
     $sql = "select * from goodsandservices";
        $sql .= " where adname like ";
        $sql .= "'%". $name ."%'";
        $sql .= " and category = ";
        $sql .= "'".$table ."'";     
        $sql .= " ORDER BY date DESC";
         $sql .= " LIMIT {$per_page} ";
        $sql .= "OFFSET {$offset}";
        $res = $Database->add_query($sql);
        if($Database->num_rows($res)  == 0 ){
          echo " <div class='no_ad_to_display_div'><p>There is no ad yet . Please click  below to create an Advert. It is always free</p>";
     echo   '<a href="'.$Database->address.'buyandsellad.php"><img src="'.$Database->address.'required/zukasell_ad_sell.jpg" class="no_ad_to_display_image" /></a></div>';
        }
        while($result = $Database->fetch_array($res)){
            $this->user = $result['user_id'];   
            $this->description = ucfirst($result['description']);
            $this->file_name = $result['file_name'];
            $this->file_name2 = $result['file_name2'];
            $this->file_name3 = $result['file_name3'];
            $this->phone_number = $result['phone'];
            $this->location = ucfirst($result['location']);
            $this->adname = ucfirst($result['adname']);
            $this->price = $result['price'];
            $this->id = $result['ad_id'];
            $this->quantity = $result['quantity'];
            $user = new User();
            $user->find_by_mail($this->user);
           
            if($this->file_name != ""){
           $source = $Database->address."uploads/".$user->email."/".$this->file_name;
            } 
            elseif($this->file_name2 != ""){
            $source = $Database->address."uploads/".$user->email."/".$this->file_name2;
            }
            elseif($this->file_name3 != ""){
            $source = $Database->address." uploads/".$user->email."/".$this->file_name3;
            }
            elseif($this->file_name4 != ""){
            $source = $Database->address." uploads/".$user->email."/".$this->file_name4;
            }
            elseif($this->file_name5 != ""){
            $source = $Database->address." uploads/".$user->email."/".$this->file_name5;
            }
            elseif($this->file_name6 != ""){
            $source = $Database->address." uploads/".$user->email."/".$this->file_name6;
            }else{
            $source = $Database->address."required/no-picture.jpg";
            }
            if($this->adname == ""){
            $adname = "&nbsp";
            }else{
            $adname = $this->adname;
            }
           
         
        if($this->quantity == 0){
        $this->quantity = 1;
        }
           $this->category = $result['category'];
        if($this->category == "Fashion and Beauty"){
            $this->pageAdrress = $Database->fashion;
        }elseif($this->category == "Mobile Phones and Tablet"){
            $this->pageAdrress = $Database->mobile;
        }
        elseif($this->category == "Vehicle"){
            $this->pageAdrress = $Database->vehicle;
        }
         elseif($this->category == "Electronics"){
            $this->pageAdrress = $Database->electronics;
         }
         elseif($this->category == "Home,Furniture and Garden"){
            $this->pageAdrress = $Database->home;
         }
         elseif($this->category == "Real Estate"){
            $this->pageAdrress = $Database->realEstate;
        }else{
    $this->pageAdrress = $Database->jobs;
      }
$sanitized_adname = str_replace(" ","-",$this->adname);
     echo '<div class="select_from" >';
      echo '<a href="'.$this->pageAdrress.$this->id."/".$sanitized_adname.'" ><div style="width:100%; border-bottom: 1px solid grey"><img src="'. $source .'" style="width:100%;height: 140px " alt="'.$this->adname.'" /></div></a>';
      echo ' <a href="'.$this->pageAdrress.$this->id."/".$sanitized_adname.'" >
<p class="select_p" ><strong style=" ">'. $adname .'</strong></p></a>';
      
        echo ' <p style="background-color:white; width:97%; padding-left:3%">
        <strong style=" padding-bottom:20px; color: #8a8a0f">';
      ?>&#8358
        <?php echo $this->price . '</strong></p>';
        echo '<p class="select_p" ><strong style=" ">'. $this->location .'</strong></p>';

     echo '</div>';
            
    }
  
    }
    public function select_from_table_with_lg_and_name($table,$lg,$name,$per_page,$offset){
     global $Database;
     
     $sql = "select * from goodsandservices";
        $sql .= " where  category = ";
        $sql .= "'".$table ."'";
        $sql .= " and lg_area = ";
        $sql .= "'". $lg ."'";
        $sql .= " and adname like ";
        $sql .= "'%". $name ."%'";
        $sql .= "  ORDER BY date DESC";
         $sql .= " LIMIT {$per_page} ";
        $sql .= "OFFSET {$offset}";
        $res = $Database->add_query($sql);
        if($Database->num_rows($res)  == 0 ){
          echo " <div class='no_ad_to_display_div'><p>There is no ad yet . Please click  below to create an Advert. It is always free</p>";
     echo   '<a href="'.$Database->address.'buyandsellad.php"><img src="'.$Database->address.'required/zukasell_ad_sell.jpg" class="no_ad_to_display_image" /></a></div>';
        }
        while($result = $Database->fetch_array($res)){
            $this->user = $result['user_id'];   
            $this->description = ucfirst($result['description']);
            $this->file_name = $result['file_name'];
            $this->file_name2 = $result['file_name2'];
            $this->file_name3 = $result['file_name3'];
            $this->phone_number = $result['phone'];
            $this->location = ucfirst($result['location']);
            $this->adname = ucfirst($result['adname']);
            $this->price = $result['price'];
            $this->id = $result['ad_id'];
            $this->quantity = $result['quantity'];
            $user = new User();
            $user->find_by_mail($this->user);
           
            if($this->file_name != ""){
           $source = $Database->address."uploads/".$user->email."/".$this->file_name;
            } 
            elseif($this->file_name2 != ""){
            $source = $Database->address."uploads/".$user->email."/".$this->file_name2;
            }
            elseif($this->file_name3 != ""){
            $source = $Database->address." uploads/".$user->email."/".$this->file_name3;
            }
            elseif($this->file_name4 != ""){
            $source = $Database->address." uploads/".$user->email."/".$this->file_name4;
            }
            elseif($this->file_name5 != ""){
            $source = $Database->address." uploads/".$user->email."/".$this->file_name5;
            }
            elseif($this->file_name6 != ""){
            $source = $Database->address." uploads/".$user->email."/".$this->file_name6;
            }else{
            $source = $Database->address."required/no-picture.jpg";
            }
            if($this->adname == ""){
            $adname = "&nbsp";
            }else{
            $adname = $this->adname;
            }
           
         
        if($this->quantity == 0){
        $this->quantity = 1;
        }
           $this->category = $result['category'];
        if($this->category == "Fashion and Beauty"){
            $this->pageAdrress = $Database->fashion;
        }elseif($this->category == "Mobile Phones and Tablet"){
            $this->pageAdrress = $Database->mobile;
        }
        elseif($this->category == "Vehicle"){
            $this->pageAdrress = $Database->vehicle;
        }
         elseif($this->category == "Electronics"){
            $this->pageAdrress = $Database->electronics;
         }
         elseif($this->category == "Home,Furniture and Garden"){
            $this->pageAdrress = $Database->home;
         }
         elseif($this->category == "Real Estate"){
            $this->pageAdrress = $Database->realEstate;
        }else{
    $this->pageAdrress = $Database->jobs;
      }
$sanitized_adname = str_replace(" ","-",$this->adname);
     echo '<div class="select_from" >';
      echo '<a href="'.$this->pageAdrress.$this->id."/".$sanitized_adname.'" ><div style="width:100%; border-bottom: 1px solid grey"><img src="'. $source .'" style="width:100%;height: 140px " alt="'.$this->adname.'" /></div></a>';
      echo ' <a href="'.$this->pageAdrress.$this->id."/".$sanitized_adname.'" >
<p class="select_p" ><strong style=" ">'. $adname .'</strong></p></a>';
      
        echo ' <p style="background-color:white; width:97%; padding-left:3%">
        <strong style=" padding-bottom:20px; color: #8a8a0f">';
      ?>&#8358
        <?php echo $this->price . '</strong></p>';
        echo '<p class="select_p" ><strong style=" ">'. $this->location .'</strong></p>';

     echo '</div>';
            
    }
  
    }
    
    public function show_ad($id){
     global $Database;
     
     $sql = "select * from goodsandservices";
     $sql .= " where ad_id = ";
     $sql .= "'".$id."'";
 
        $res = $Database->add_query($sql);
        while($result = $Database->fetch_array($res)){
            $this->user = $result['user_id'];   
            $this->description = ucfirst($result['description']);
            $this->file_name = $result['file_name'];
            $this->file_name2 = $result['file_name2'];
            $this->file_name3 = $result['file_name3'];
            $this->file_name4 = $result['file_name4'];
            $this->file_name5 = $result['file_name5'];
            $this->file_name6 = $result['file_name6'];
            $this->phone_number = $result['phone'];
            $this->location = ucfirst($result['location']);
            $this->adname = ucfirst($result['adname']);
              $this->quantity = $result['quantity'];
            $this->price = $result['price'];
            $this->id = $result['ad_id'];
           $user = new User();
            $user->find_by_mail($this->user);
     
            if($this->file_name != ""){
           $source = $Database->address."uploads/".$user->email."/".$this->file_name;
            } 
            elseif($this->file_name2 != ""){
            $source = $Database->address."uploads/".$user->email."/".$this->file_name2;
            }
            elseif($this->file_name3 != ""){
            $source = $Database->address." uploads/".$user->email."/".$this->file_name3;
            }else{
            $source = $Database->address."uploads/nopic.jpg";
            }
            if($this->file_name2 != ""){
            $source2 = $this->address."uploads/".$user->email."/".$this->file_name2;
           }else{
            $source2 = $this->address."uploads/nopic.jpg";
            }
           ?>
          <script type="text/javascript">
            $('#number').click(function() {
    $(this).find('span').text( $(this).data('last') );
});
           </script>
           <?php
if($this->file_name3 != "" ){
$source3 = $this->address."uploads/".$user->email."/".$this->file_name3;
}
else{
            $source3 = $this->address."uploads/nopic.jpg";
            }

            if($this->quantity == 0){
        $this->quantity = 1;
        }
        
        $this->phone_number1 = substr($this->phone_number, 0, 5) ;
        $this->phone_number = substr($this->phone_number, 5, 11) ;
        
        #checking the ad category to determine how the description will be
        #....................................
        
        $this->category = $result['category'];
        
    if($this->category == "Fashion and Beauty"){
        if($result['subcategory'] == "Clothing&Shoes"){
                $this->maker = $result['clothing'];
            }
        if($result['subcategory'] == "Watches,Jewelry&Accessories"){
                $this->maker = $result['watches'];
            }
            $this->Extra_info =  '
            <table style="border:1px solid; background-color:#e6ff99; width: 70%; text-align:center">
            <tr>
            <td style="border-bottom:1px solid; padding:2.5px 10px"><strong>Brand Name</strong></td>
            </tr>
            <tr>
            <td>'.ucfirst($this->maker).'</td>
            </tr>
            </table>';
    }elseif($this->category == "Mobile Phones and Tablet"){
            
            if($result['subcategory'] == "Phones"){
                $this->maker = $result['phone_maker'];
                $this->model = $result['phone_model'];
            }
            else{
                $this->maker = $result['tablet_maker'];
                $this->model = $result['tablet_model'];
            }
            
            $this->Extra_info  = '
            <table style="border:1px solid; background-color:#e6ff99; width: 70%">
            <tr>
            <td style="border-right:1px solid;border-bottom:1px solid; padding:2.5px 10px"><strong>Maker</strong></td>
            <td style="border-bottom:1px solid;padding:2.5px 10px"><strong>Model</strong></td>
            </tr>
            <tr>
            <td>'.ucfirst($this->maker).'</td>
            <td>'.ucfirst($this->model).'</td>
            </tr>
            </table>';
    }elseif($this->category == "Vehicle"){
        # ......................................
        # codes below are to check which variety of vehicles the ad falls into
            
            if($result['subcategory'] == "Cars"){
                $this->maker = $result['car_maker'];
                $this->model = $result['car_model'];
                $this->trans = $result['car_transmission'];
            }
            if($result['subcategory'] == "Motorcycles"){
                $this->maker = $result['motorcycle_maker'];
                 $this->model = $result['motorcycle_model'];
                 $this->trans = $result['motorcycle_transmission'];
            }
            if($result['subcategory'] == "Trucks,Commercial"){
                $this->maker = $result['truck_maker'];
                $this->model = $result['truck_model'];
                 $this->trans = $result['truck_transmission'];
            }
           
            $this->Extra_info  = '<table style="border:1px solid; background-color:#e6ff99; width: 70%">
            
            <tr >
            <td style="border-right:1px solid;border-bottom:1px solid; padding:2.5px 10px"><strong>Maker</strong></td>
            <td style="border-right:1px solid;border-bottom:1px solid;padding:2.5px 10px"><strong>Model</strong></td>
            <td style="border-right:1px solid; border-bottom:1px solid;padding:2.5px 10px"><strong>Transmission</strong></td>
           <td style="border-bottom:1px solid;padding:2.5px 10px"><strong>Year</strong></td>
            </tr>
            <tr>
            <td>'.$this->maker.'</td>
            <td>'.ucfirst($this->model).'</td>
            <td>'.ucfirst($this->trans).'</td>
            </tr>
            </table>';
        #..............................................
        # marking the end of the above codes for Vehicle
    }elseif($this->category == "Electronics"){
             if($result['subcategory'] == "Tv,Audio&Video"){
                $this->maker = $result['tv_brand'];
            }
            else{
                $this->maker = $result['laptop'];
            }
            $this->Extra_info  =  '
            <table style="border:1px solid; background-color:#e6ff99; width: 70%; text-align:center">
            <tr>
            <td style="border-bottom:1px solid; padding:2.5px 10px"><strong>Maker</strong></td>
            </tr>
            <tr>
            <td>'.ucfirst($this->maker).'</td>
            </tr>
            </table>';
    }elseif($this->category == "Home,Furniture and Garden"){
            $this->Extra_info  = "";
        
    }elseif($this->category == "Real Estate"){
           $this->Extra_info  =  '
            <table style="border:1px solid; background-color:#e6ff99; width: 70%; text-align:center">
            <tr>
            <td style="border-bottom:1px solid; padding:2.5px 10px"><strong>Address Location</strong></td>
            </tr>
            <tr>
            <td>'.ucfirst($result['ad_address']).'</td>
            </tr>
            </table>';
    }elseif($this->category == "Jobs and Services"){
           $this->Extra_info  = "";
    }
        
        
     # ..............................................................
     # for the desktop version
     #.........................
     echo '<div class="mainShowAd">';
     echo '<div class="buyandsellpost_showad"><div class="par">
     <p style="margin-left:3%"><strong>'
     . $this->adname .'</strong></p>
     </div>';
      echo '<div class="image_box">
      <img src="'.$source.'" style="max-width:100%; height:auto" alt="'.$this->adname.'1"/>';

  echo '</div>';    
        echo ' <div class="desc_box"><strong >Description</strong>
        <br>'.$this->description .'</div>';
        echo ' <div class="desc_box">
        <br>'.$this->Extra_info .'</div>';
if($this->file_name2 != "" ){
$source2 = $this->address."uploads/".$user->email."/".$this->file_name2;
  echo '<div class="image_box">
      <img src="'.$source2.'" style="max-width:100%; height:auto" alt="'.$this->adname.'2"/>';

  echo '</div>';
}
if($this->file_name3 != "" ){
$source3 = $this->address."uploads/".$user->email."/".$this->file_name3;
  echo '<div class="image_box">
      <img src="'.$source3.'" style="max-width:100%; height:auto" alt="'.$this->adname.'3"/>';

  echo '</div>';
}
if($this->file_name4 != "" ){
$source4 = $this->address."uploads/".$user->email."/".$this->file_name4;
 echo '<div class="image_box">
      <img src="'.$source4.'" style="max-width:100%; height:auto" alt="'.$this->adname.'4"/>';

  echo '</div>';
}
if($this->file_name5 != "" ){
$source5 = $this->address."uploads/".$user->email."/".$this->file_name5;
 echo '<div class="image_box">
      <img src="'.$source5.'" style="max-width:100%; height:auto" alt="'.$this->adname.'5"/>';

  echo '</div>';
}
if($this->file_name6 != "" ){
$source6 = $this->address."uploads/".$user->email."/".$this->file_name6;
 echo '<div class="image_box">
      <img src="'.$source6.'" style="max-width:100%; height:auto" alt="'.$this->adname.'6"/>';

  echo '</div>';
}
    echo '</div>';
        echo ' <div class="side_bar" style="text-align:center" >
        <div><p style=" color:white; background-color:#2e6b42;
        padding:15px 0 ; ">';
      ?>&#8358
        <?php echo $this->price .'</strong></p></div>';

        echo '<div style="" ><div style="background-color:#d96e26; text-align:center;  padding:20px 0;color: white"><p style="padding:5px 0">
        '.$this->phone_number1 .'<span style="background-color:; padding:10px 0; " onclick="this.innerHTML='.$this->phone_number.'">
        Click to show</span></p></div>
        <div><a href="'.$Database->address.'conversation/'.$this->id.'/'.$this->user.'/'.$_SERVER['REQUEST_URI'].'"><button  class="button_class" style="text-align:center">Send Message</button></a></div>
        <div style=" height: 60px; "><p style="padding: 20px 0;  ">'.$this->location .'</p></div>
        
        <div style=" height: 60px; background-color: grey; "><p style="padding: 20px 0;  ">Quantity:<span style=" font-size: 17px; ">'.$this->quantity .'</span></p></div></div>';
     ?>
<div style="margin:5px 0; height:200px">
<p>Advertisement</p>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- zukasell_link_ad -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-9386381840362693"
     data-ad-slot="9647207169"
     data-ad-format="link"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>
<?php  

echo  '</div></div>';
       
        # this is for the mobile view
        #.........................
        
        echo '<div class="mobile_mainShowAdd">';
     echo '<div class="mobile_buyandsellpost_showad"><div class="mobile_par">
     <p style="margin-left:3%"><strong>'
     . $this->adname .'</strong></p>
     </div>';
      echo '<div class="mobile_image_box">
      <img src="'.$source.'" style="width:100%; max-height:100%" alt="'.$this->adname.'1"/>';

  echo '</div>';
  echo ' <div class="desc_box" style="margin-bottom: 20px; padding-left:2%">
        <br>'.$this->Extra_info .'</div>';
        echo ' <div class="mobile_desc_box"><strong>Description</strong>
        <br>'.$this->description .'</div>';
        
        echo ' <div class="mobile_side_bar" style="text-align:center" >
        <div><p style=" color:white; background-color:#2e6b42;
        padding:15px 0; "><strong>';
      ?>&#8358
        <?php echo $this->price .'</strong></p></div>';

        echo '<div style="" ><div style="background-color:#d96e26; padding:20px 0;color: white"><p style="; padding:5px 0">
        '.$this->phone_number1 .'<span style="background-color:; padding:10px 0; " onclick="this.innerHTML='.$this->phone_number.'">
        Click to show</span></p></div>
        <div><a href="'.$Database->address.'conversation/'.$this->id.'/'.$this->user.'/'.$_SERVER['REQUEST_URI'].'"><button  class="button_class" style="text-align:center">Send Message</button></a></div>
        <div style=" height: 60px; "><p style="padding: 20px 0;  ">'.$this->location .'</p></div>
        
        <div style=" height: 60px; background-color: grey; "><p style="padding: 20px 0;  ">Quantity:<span style=" font-size: 17px; ">'.$this->quantity .'</span></p></div></div>';
       echo  '</div>';
        echo '<div class="mobile_image_box">
      <img src="'.$source2.'" style="width:100%; max-height:100%" alt="'.$this->adname.'2"/>';

  echo '</div>'; 
  echo '<div class="mobile_image_box">
      <img src="'.$source3.'" style="width:100%; max-height:100%" alt="'.$this->adname.'3"/>';

  echo '</div>';
  if($this->file_name4 != "" ){
$source4 = $this->address."uploads/".$user->email."/".$this->file_name4;
 echo '<div class="image_box">
      <img src="'.$source4.'" style="width:100%; max-height:100%" alt="'.$this->adname.'4"/>';

  echo '</div>';
}
if($this->file_name5 != "" ){
$source5 = $this->address."uploads/".$user->email."/".$this->file_name5;
 echo '<div class="image_box">
      <img src="'.$source5.'" style="width:100%; max-height:100%" alt="'.$this->adname.'5"/>';

  echo '</div>';
}
if($this->file_name6 != "" ){
$source6 = $this->address."uploads/".$user->email."/".$this->file_name6;
 echo '<div class="image_box">
      <img src="'.$source6.'" style="width:100%; max-height:100%" alt="'.$this->adname.'6"/>';

  echo '</div>';
}

    echo '</div>
        
       </div>';
            
    }
  
    }
    
       public function show_familiar($id){
     global $Database;
     $sqli = "select subcategory from goodsandservices where ad_id =";
    $sqli .= "'".$id ."'";
   $resi = $Database->add_query($sqli);
   $result = $Database->fetch_array($resi);
   $cat = $result['subcategory'];
   
     $sql = "select * from goodsandservices where subcategory = ";
   $sql .= "'".$cat ."'";
   $sql .= " and ad_id != ";
   $sql .= "'".$id ."'";
  $sql .= " ORDER BY date DESC";
        $res = $Database->add_query($sql);
        $numrow = $Database->num_rows($res);
        while($result = $Database->fetch_array($res)){
            $this->user = $result['user_id'];   
            $this->description = ucfirst($result['description']);
            $this->file_name = $result['file_name'];
            $this->file_name2 = $result['file_name2'];
            $this->file_name3 = $result['file_name3'];
            $this->file_name4 = $result['file_name4'];
            $this->file_name5 = $result['file_name5'];
            $this->file_name6 = $result['file_name6'];
         //   $this->phone_number = $result['phone_number'];
            $this->location = ucfirst($result['location']);
            $this->adname = ucfirst($result['adname']);
          $this->quantity = $result['quantity'];
            $this->price = $result['price'];
            $this->id = $result['ad_id'];
            $user = new User();
            $user->find_by_mail($this->user);
           if($this->file_name != ""){
           $source = $Database->address."uploads/".$user->email."/".$this->file_name;
            } 
            elseif($this->file_name2 != ""){
            $source = $Database->address."uploads/".$user->email."/".$this->file_name2;
            }
            elseif($this->file_name3 != ""){
            $source = $Database->address." uploads/".$user->email."/".$this->file_name3;
            }
            elseif($this->file_name4 != ""){
            $source = $Database->address." uploads/".$user->email."/".$this->file_name4;
            }
            elseif($this->file_name5 != ""){
            $source = $Database->address." uploads/".$user->email."/".$this->file_name5;
            }
            elseif($this->file_name6 != ""){
            $source = $Database->address." uploads/".$user->email."/".$this->file_name6;
            }else{
            $source = $Database->address."required/no-picture.jpg";
            }

            if($this->adname == ""){
            $adname = "&nbsp";
            }else{
            $adname = $this->adname;
            }
        if($this->quantity == 0){
        $this->quantity = 1;
        }
      $this->category = $result['category'];
        if($this->category == "Fashion and Beauty"){
            $this->pageAdrress = $Database->fashion;
        }elseif($this->category == "Mobile Phones and Tablet"){
            $this->pageAdrress = $Database->mobile;
        }
        elseif($this->category == "Vehicle"){
            $this->pageAdrress = $Database->vehicle;
        }
         elseif($this->category == "Electronics"){
            $this->pageAdrress = $Database->electronics;
         }
         elseif($this->category == "Home,Furniture and Garden"){
            $this->pageAdrress = $Database->home;
         }
         elseif($this->category == "Real Estate"){
            $this->pageAdrress = $Database->realEstate;
        }else{
    $this->pageAdrress = $Database->jobs;
      }
$sanitized_adname = str_replace(" ","-",$this->adname);
    echo '<a href="'.$this->pageAdrress.$this->id."/".$sanitized_adname.'"  style="color:black">';
    echo '<div style="clear:both;width:100%; margin:auto;padding-top:6px "  >
      
<div class="show_familiar_pic" ><img src="'. $source .'" style="width:100%;height: 100% " alt="'.$this->adname.'" /></div>';
echo '<div class="show_familiar_desc" >';
      
 echo '<p class="select_p" ><strong style=" ">'. $adname .'</strong></p>';
      
        echo ' <p style="background-color:white; width:97%; padding-left:3%">
        <strong style=" padding-bottom:20px; color: #8a8a0f">';
      ?>&#8358
        <?php echo $this->price . '</strong></p>';
      echo '<p class="select_p">'.$this->description.'</p>';
        echo '<p class="select_p" ><strong style=" ">'. $this->location .'</strong></p>';

     echo '</div>
</div></a>';    
            
      
    }
    }
    
     public function show_user_post($id, $adtable){
     global $Database;
     
     $sql = "select * from " .$adtable;
   $sql .= " where user_id = ";
   $sql .= "'".$id ."'";
  $sql .= " ORDER BY date DESC";
        $res = $Database->add_query($sql);
        while($result = $Database->fetch_array($res)){
            $this->user = $result['user_id'];   
            $this->description = ucfirst($result['description']);
            $this->file_name = $result['file_name'];
            $this->file_name2 = $result['file_name2'];
            $this->file_name3 = $result['file_name3'];
            $this->phone_number = $result['phone_number'];
            $this->location = ucfirst($result['location']);
            $this->adname = ucfirst($result['adname']);
          $this->quantity = $result['quantity'];
            $this->price = $result['price'];
            $this->id = $result['id'];
            $user = new User();
            $user->find_by_mail($this->user);
            if($this->file_name != ""){
           $source = "uploads/".$user->email."/".$this->file_name;
            }
            elseif($this->file_name2 != ""){
            $source = "uploads/".$user->email."/".$this->file_name2;
            }
            elseif($this->file_name3 != ""){
            $source = "uploads/".$user->email."/".$this->file_name3;
            }else{
            $source = "uploads/nopic.jpg";
            }
            if($this->adname == ""){
            $adname = "&nbsp";
            }else{
            $adname = $this->adname;
            }
            if(strlen($adname) > 22){
        $adname = substr($adname, 0, 22) .".....";
        }else{
        $adname = $adname;
        }
            if(strlen($this->description) > 60){
        $description = substr($this->description, 0, 60) .".........";
        }else{
        $description = $this->description;
        } 
         if(strlen($this->location) > 40){
        $location = substr($this->location, 0, 40) .".....";
        }else{
        $location = $this->location;
        }
        if($this->quantity == 0){
        $this->quantity = 1;
        }
          /*A  if($this->price == ""){
            $price = "&nbsp";
            }else{
            $price = $this->price;
            }
            if($this->phone_number == ""){
            $phone_number = "&nbsp";
            }else{
            $phone_number = $this->phone_number;
            }
             if($this->location == ""){
            $location = "&nbsp";
            }else{
           $location = $$this->location;
            }*/
        echo '<table style="width:100%"><tr><td style="border:1px solid; background-color:pink; width:40%"><a href="edit_ad.php?id='.$this->id.'" style="text-decoration:none">Edit Ad Post</a></td><td style="border:1px solid; background-color:grey; "></td></tr></table>';    
      echo '<a href="showad.php?ad_id='.$this->id.'" style="text-decoration:none">';
     echo '<table style="border: 1px solid; width: 100%">
      <tr><td style="width:40%"><img src="'. $source .'" style="width:100%;height: 160px " /></td>';
      echo ' <td><table style="width:100%"><tr><td style="background-color:pink; border:2px solid grey; padding: 2px"><strong style=" ">'. $adname .'</strong></td></tr>';
      
        echo '<tr><td style=" padding-bottom:20px; border:1px solid; height:55px"><span style="font-size:11px">Description</span><br>'.$description .'</td></tr>';
        echo ' <tr style="width:100%"><td style="background-color:pink; width:100%"><strong style=" padding-bottom:20px">Price:'.$this->price .'</strong></td></tr>';

        echo '<tr><td style="  border:2px solid grey; width:100% " ><span style="font-size:8px">Phone:</span><span >'.$this->phone_number .'</span></td></tr>';
        echo'<tr><td style="  border:2px solid grey; width:100% "><span style="font-size:8px">Location:</span><span >'.$location .'</span></td></tr>';
        echo'<tr><td style="  border:2px solid grey; width:100% "><span style="font-size:8px">Quantity:</span><span >'.$this->quantity .'</span></td></tr></table></td></tr></table></a>';
       echo '<br />';     
    }
  
    }
    
    public function select_for_myads($id){
     global $Database;
     
     $sql = "select * from goodsandservices";
        $sql .= " where user_id = ";
        $sql .= "'".$id ."'";
        $sql .= " ORDER BY date DESC";
        $res = $Database->add_query($sql);
        if($Database->num_rows($res)  == 0 ){
            echo '<div class="no_ad_to_display_div">
            <p>No Ad had been created by you. please <a href="'.$Database->address.'buyandsellad.php">Create an Ad</a> </p>';
     echo   '</div>'; 
        }
        while($result = $Database->fetch_array($res)){
            $this->user = $result['user_id'];   
            $this->description = ucfirst($result['description']);
            $this->file_name = $result['file_name'];
            $this->file_name2 = $result['file_name2'];
            $this->file_name3 = $result['file_name3'];
            $this->phone_number = $result['phone'];
            $this->location = ucfirst($result['location']);
            $this->adname = ucfirst($result['adname']);
            $this->price = $result['price'];
            $this->id = $result['ad_id'];
            $this->quantity = $result['quantity'];
            $user = new User();
            $user->find_by_mail($this->user);
            if($this->file_name != ""){
           $source = $Database->address."uploads/".$user->email."/".$this->file_name;
            } 
            elseif($this->file_name2 != ""){
            $source = $Database->address."uploads/".$user->email."/".$this->file_name2;
            }
            elseif($this->file_name3 != ""){
            $source = $Database->address." uploads/".$user->email."/".$this->file_name3;
            }else{
            $source = $Database->address."required/no-picture.jpg";
            }
            if($this->adname == ""){
            $adname = "&nbsp";
            }else{
            $adname = $this->adname;
            }
        if($this->quantity == 0){
        $this->quantity = 1;
        }
            $this->category = $result['category'];
        if($this->category == "Fashion and Beauty"){
            $this->pageAdrress = $Database->fashion;
        }elseif($this->category == "Mobile Phones and Tablet"){
            $this->pageAdrress = $Database->mobile;
        }
        elseif($this->category == "Vehicle"){
            $this->pageAdrress = $Database->vehicle;
        }
         elseif($this->category == "Electronics"){
            $this->pageAdrress = $Database->electronics;
         }
         elseif($this->category == "Home,Furniture and Garden"){
            $this->pageAdrress = $Database->home;
         }
         elseif($this->category == "Real Estate"){
            $this->pageAdrress = $Database->realEstate;
        }else{
    $this->pageAdrress = $Database->jobs;
      }
       $sanitized_adname = str_replace(" ","-",$this->adname);
      
     echo '<table class="myads_table" ><tr>';
      echo '<td style=" width:12%"><img src="'. $source .'" style="width:100%;height: 60px " /></td>';
      echo ' <td class="myads_adname_tr"><p class="select_p"><strong style=" ">'. $adname .'</strong> </p><br />
      <p class="select_p"><strong>';
     ?>&#8358
        <?php echo $this->price .'</strong></p>
      </td>';
      
        echo ' <td><a href="'.$this->pageAdrress.'edit/'.$this->id.'/'.$sanitized_adname.'"><span class="myads_select_from1">Edit</span></a><a href="'.$this->pageAdrress.'show-view/'.$this->id .'/'.$sanitized_adname.'"><span class="myads_select_from2">Preview</span></a><a href="javascript://" onclick="myads_delete('.$this->id .')" ><span class="myads_select_from3"><img src="'.$Database->address.'required/delete.JPG" style="width:20px; height:20px" alt="delete" /></span></a></td></table>';
            
    }
  
    }
    
     public function select_for_myads_by_id($id){
     global $Database;
     
     $sql = "select * from goodsandservices";
        $sql .= " where ad_id = ";
        $sql .= "'".$id ."'";
        $sql .= " LIMIT 1";
        $res = $Database->add_query($sql);
        if($Database->num_rows($res)  == 0 ){
          echo " <div class='no_ad_to_display_div'><p>There is no ad yet . Please click  below to create an Advert. It is always free</p>";
     echo   '<a href="'.$Database->address.'buyandsellad.php"><img src="'.$Database->address.'required/zukasell_ad_sell.jpg" class="no_ad_to_display_image" /></a></div>';
        }
        while($result = $Database->fetch_array($res)){
            $this->user = $result['user_id'];   
            $this->description = ucfirst($result['description']);
            $this->file_name = $result['file_name'];
            $this->file_name2 = $result['file_name2'];
            $this->file_name3 = $result['file_name3'];
            $this->phone_number = $result['phone'];
            $this->location = ucfirst($result['location']);
            $this->adname = ucfirst($result['adname']);
            $this->price = $result['price'];
            $this->id = $result['ad_id'];
            $this->quantity = $result['quantity'];
            $user = new User();
            $user->find_by_mail($this->user);
            if($this->file_name != ""){
           $source = $Database->address."uploads/".$user->email."/".$this->file_name;
            } 
            elseif($this->file_name2 != ""){
            $source = $Database->address."uploads/".$user->email."/".$this->file_name2;
            }
            elseif($this->file_name3 != ""){
            $source = $Database->address." uploads/".$user->email."/".$this->file_name3;
            }else{
            $source = $Database->address."required/no-picture.jpg";
            }
            if($this->adname == ""){
            $adname = "&nbsp";
            }else{
            $adname = $this->adname;
            }
          
            $this->category = $result['category'];
        if($this->category == "Fashion and Beauty"){
            $this->pageAdrress = $Database->fashion;
        }elseif($this->category == "Mobile Phones and Tablet"){
            $this->pageAdrress = $Database->mobile;
        }
        elseif($this->category == "Vehicle"){
            $this->pageAdrress = $Database->vehicle;
        }
         elseif($this->category == "Electronics"){
            $this->pageAdrress = $Database->electronics;
         }
         elseif($this->category == "Home,Furniture and Garden"){
            $this->pageAdrress = $Database->home;
         }
         elseif($this->category == "Real Estate"){
            $this->pageAdrress = $Database->realEstate;
        }else{
    $this->pageAdrress = $Database->jobs;
      }
      
      $sanitized_adname = str_replace(" ","-",$this->adname);
     echo '<table class="myads_tables" ><tr>';
      echo '<td style=" width:30%"><img src="'. $source .'" style="width:100%;height: 60px " /></td>';
      echo ' <td style=" "><strong  style="width:100%; overflow:hidden; text-overflow:ellipsis; background-color:none">'. $this->adname .'</strong> <br />
      <strong>';?>&#8358
        <?php echo $this->price .'</strong>
      </td>';
      
       echo'<td><a href="'.$this->pageAdrress.$this->id."/".$sanitized_adname.'" >Preview</a></td></table>';
            
    }
  
    }
    
    public function select_for_ad($id,$user,$adname){
     global $Database;
     global $session;
     $sql = "select * from goodsandservices";
        $sql .= " where ad_id = ";
        $sql .= "'".$id ."'";
        $sql .= " and user_id = ";
        $sql .= "'".$user ."'";
        $sql .= " and adname = ";
        $sql .= "'".$adname ."'";
        $sql .= " limit 1";
        $res = $Database->add_query($sql);
        while($result = $Database->fetch_array($res)){
            $this->user = $result['user_id'];   
            $this->description = ucfirst($result['description']);
            $this->file_name = $result['file_name'];
            $this->file_name2 = $result['file_name2'];
            $this->file_name3 = $result['file_name3'];
            $this->phone_number = $result['phone'];
            $this->location = ucfirst($result['location']);
            $this->adname = ucfirst($result['adname']);
                    $this->quantity = $result['quantity'];
            $this->price = $result['price'];
            $this->id = $result['ad_id'];
        $user = new User();
            $user->find_by_mail($this->user);
            if($this->file_name != ""){
           $source1 = $this->address."uploads/".$user->email."/".$this->file_name;
            }else{
            $source1 = "uploads/".$user->email."/nopic.jpg";
            }
            if($this->file_name2 != ""){
            $source2 = $this->address."uploads/".$user->email."/".$this->file_name2;
           }else{
            $source2 = $this->address."uploads/nopic.jpg";
            }
           ?>
          <script type="text/javascript">
            $('#number').click(function() {
    $(this).find('span').text( $(this).data('last') );
});
           </script>
           <?php
if($this->file_name3 != "" ){
$source3 = $this->address."uploads/".$user->email."/".$this->file_name3;
}
else{
            $source3 = $this->address."uploads/nopic.jpg";
            }
            if($this->quantity == 0){
        $this->quantity = 1;
        }
        
        $this->phone_number1 = substr($this->phone_number, 0, 5) ;
        $this->phone_number = substr($this->phone_number, 5, 11) ;
        
        #checking the ad category to determine how the description will be
        #....................................
        
        $this->category = $result['category'];
        
    if($this->category == "Fashion and Beauty"){
        if($result['subcategory'] == "Clothing&Shoes"){
                $this->maker = $result['clothing'];
            }
        if($result['subcategory'] == "Watches,Jewelry&Accessories"){
                $this->maker = $result['watches'];
            }
            $this->Extra_info =  '
            <table style="border:1px solid; background-color:#e6ff99; width: 70%; text-align:center">
            <tr>
            <td style="border-bottom:1px solid; padding:2.5px 10px"><strong>Brand Name</strong></td>
            </tr>
            <tr>
            <td>'.ucfirst($this->maker).'</td>
            </tr>
            </table>';
    }elseif($this->category == "Mobile Phones and Tablet"){
            
            if($result['subcategory'] == "Phones"){
                $this->maker = $result['phone_maker'];
                $this->model = $result['phone_model'];
            }
            else{
                $this->maker = $result['phone_maker'];
                $this->model = $result['phone_model'];
            }
            
            $this->Extra_info  = '
            <table style="border:1px solid; background-color:#e6ff99; width: 70%">
            <tr>
            <td style="border-right:1px solid;border-bottom:1px solid; padding:2.5px 10px"><strong>Maker</strong></td>
            <td style="border-bottom:1px solid;padding:2.5px 10px"><strong>Model</strong></td>
            </tr>
            <tr>
            <td>'.ucfirst($this->maker).'</td>
            <td>'.ucfirst($this->model).'</td>
            </tr>
            </table>';
    }elseif($this->category == "Vehicle"){
        # ......................................
        # codes below are to check which variety of vehicles the ad falls into
            
            if($result['subcategory'] == "Cars"){
                $this->maker = $result['car_maker'];
                $this->model = $result['car_model'];
                $this->trans = $result['car_transmission'];
            }
            if($result['subcategory'] == "Motorcycles"){
                $this->maker = $result['motorcycle_maker'];
                 $this->model = $result['motorcycle_model'];
                 $this->trans = $result['motorcycle_transmission'];
            }
            if($result['subcategory'] == "Trucks,Commercial"){
                $this->maker = $result['truck_maker'];
                $this->model = $result['truck_model'];
                 $this->trans = $result['truck_transmission'];
            }
           
            $this->Extra_info  = '<table style="border:1px solid; background-color:#e6ff99; width: 70%">
            
            <tr >
            <td style="border-right:1px solid;border-bottom:1px solid; padding:2.5px 10px"><strong>Maker</strong></td>
            <td style="border-right:1px solid;border-bottom:1px solid;padding:2.5px 10px"><strong>Model</strong></td>
            <td style="border-right:1px solid; border-bottom:1px solid;padding:2.5px 10px"><strong>Transmission</strong></td>
           <td style="border-bottom:1px solid;padding:2.5px 10px"><strong>Year</strong></td>
            </tr>
            <tr>
            <td>'.$this->maker.'</td>
            <td>'.ucfirst($this->model).'</td>
            <td>'.ucfirst($this->trans).'</td>
            </tr>
            </table>';
        #..............................................
        # marking the end of the above codes for Vehicle
    }elseif($this->category == "Electronics"){
             if($result['subcategory'] == "Tv,Audio&Video"){
                $this->maker = $result['tv_brand'];
            }
            else{
                $this->maker = $result['laptop'];
            }
            $this->Extra_info  =  '
            <table style="border:1px solid; background-color:#e6ff99; width: 70%; text-align:center">
            <tr>
            <td style="border-bottom:1px solid; padding:2.5px 10px"><strong>Maker</strong></td>
            </tr>
            <tr>
            <td>'.ucfirst($this->maker).'</td>
            </tr>
            </table>';
    }elseif($this->category == "Home,Furniture and Garden"){
            $this->Extra_info  = "";
        
    }elseif($this->category == "Real Estate"){
           $this->Extra_info  =  '
            <table style="border:1px solid; background-color:#e6ff99; width: 70%; text-align:center">
            <tr>
            <td style="border-bottom:1px solid; padding:2.5px 10px"><strong>Address Location</strong></td>
            </tr>
            <tr>
            <td>'.ucfirst($result['ad_address']).'</td>
            </tr>
            </table>';
    }elseif($this->category == "Jobs and Services"){
           $this->Extra_info  = "";
    }
          
        
     # ..............................................................
     # for the desktop version
     #.........................
     echo '<div class="mainShowAd" >';
     echo '<div class="buyandsellpost_showad"><div class="par">
     <p style="margin-left:3%"><strong>'
     . $this->adname .'</strong></p>
     </div>';
      echo '<div class="image_box">
      <img src="'.$source1.'" style="width:100%; max-height:100%"/>';

  echo '</div>';    
        echo ' <div class="desc_box"><span style="font-size:11px">Description</span>
        <br>'.$this->description .'</div>';
        echo ' <div class="desc_box">
        <br>'.$this->Extra_info .'</div>';
        echo '<div class="image_box">
      <img src="'.$source2.'" style="width:100%; max-height:100%"/>';

  echo '</div>';
  echo '<div class="image_box">
      <img src="'.$source3.'" style="width:100%; max-height:100%"/>';

  echo '</div>';
  echo '<div class="image_box">
      <img src="'.$source3.'" style="width:100%; max-height:100%"/>';

  echo '</div>';
    echo '</div>';
        echo ' <div class="side_bar" style="width:35%" >
        <div><p style=" color:white; background-color:#2e6b42;
        padding:15px 0 ; "><strong><img src="'.$this->address.'required/nai.jpg" style="height: 30px; vertical-align:middle"/>'
        .$this->price .'</strong></p></div>';

        echo '<div style="" ><div style="background-color:#d96e26; padding-left:8%; padding-top:20px; padding-bottom:20px;color: white"><p style="; padding-top:5px; padding-bottom:5px">
        '.$this->phone_number1 .'<span style="background-color:; padding-top:10px; padding-bottom:10px; padding-right:10px" onclick="this.innerHTML='.$this->phone_number.'">
        Click to show</span></p></div>
        <div><button  class="button_class">Send Message</button></div>
        <div style=" height: 60px; "><p style="padding: 20px 0; margin-left: 20px; ">'.$this->location .'</p></div>
        
        <div style=" height: 60px; background-color: grey; "><p style="padding: 20px 0; margin-left: 20px; ">Quantity:<span style=" font-size: 17px; ">'.$this->quantity .'</span></p></div></div>';
       echo  '</div></div>';
       
        # this is for the mobile view
        #.........................
        
        echo '<div class="mobile_mainShowAdd">';
     echo '<div class="mobile_buyandsellpost_showad"><div class="mobile_par">
     <p style="margin-left:3%"><strong>'
     . $this->adname .'</strong></p>
     </div>';
      echo '<div class="mobile_image_box">
      <img src="'.$source1.'" style="width:100%; max-height:100%"/>';

  echo '</div>';
  echo ' <div class="desc_box" style="margin-bottom: 20px">
        <br>'.$this->Extra_info .'</div>';
        echo ' <div class="mobile_desc_box"><span style="font-size:11px">Description</span>
        <br>'.$this->description .'</div>';
        
        echo ' <div class="mobile_side_bar" >
        <div><p style=" color:white; background-color:#2e6b42;
        padding:15px 0 ; "><strong>';
?>&#8358
        <?php echo $this->price .'</strong></p></div>';

        echo '<div style="" ><div style="background-color:#d96e26; padding-left:8%; padding-top:20px; padding-bottom:20px;color: white"><p style="; padding-top:5px; padding-bottom:5px">
        '.$this->phone_number1 .'<span style="background-color:; padding-top:10px; padding-bottom:10px; padding-right:10px" onclick="this.innerHTML='.$this->phone_number.'">
        Click to show</span></p></div>
        <div><button  class="button_class">Send Message</button></div>
        <div style=" height: 60px; "><p style="padding: 20px 0; margin-left: 20px; ">'.$this->location .'</p></div>
        
        <div style=" height: 60px; background-color: grey; "><p style="padding: 20px 0; margin-left: 20px; ">Quantity:<span style=" font-size: 17px; ">'.$this->quantity .'</span></p></div></div>';
       echo  '</div>';
        echo '<div class="mobile_image_box">
      <img src="'.$source2.'" style="width:100%; max-height:100%"/>';

  echo '</div>';
  echo '<div class="mobile_image_box">
      <img src="'.$source3.'" style="width:100%; max-height:100%"/>';

  echo '</div>';
  echo '<div class="mobile_image_box">
      <img src="'.$source3.'" style="width:100%; max-height:100%"/>';

  echo '</div>';
    echo '</div>
        
       </div>';
            
    }
   }
   
   public function select_for_maker($cati,$maker,$answer){
     global $Database;
     
     $sql = "select * from goodsandservices";
        $sql .= " where category = ";
        $sql .= "'".$cati ."'";
        $sql .= " and $maker = ";
        $sql .= "'".$answer ."'";
        $sql .= " ORDER BY date DESC";
        $res = $Database->add_query($sql);
        if($Database->num_rows($res)  == 0 ){
          echo " <div class='no_ad_to_display_div'><p>There is no ad yet . Please click  below to create an Advert. It is always free</p>";
     echo   '<a href="'.$Database->address.'buyandsellad.php"><img src="'.$Database->address.'required/zukasell_ad_sell.jpg" class="no_ad_to_display_image" /></a></div>';
        }
        while($result = $Database->fetch_array($res)){
            $this->user = $result['user_id'];   
            $this->description = ucfirst($result['description']);
            $this->file_name = $result['file_name'];
            $this->file_name2 = $result['file_name2'];
            $this->file_name3 = $result['file_name3'];
            $this->phone_number = $result['phone'];
            $this->location = ucfirst($result['location']);
            $this->adname = ucfirst($result['adname']);
            $this->price = $result['price'];
            $this->id = $result['ad_id'];
            $this->quantity = $result['quantity'];
            $user = new User();
            $user->find_by_mail($this->user);
            if($this->file_name != ""){
           $source = $Database->address."uploads/".$user->email."/".$this->file_name;
            } 
            elseif($this->file_name2 != ""){
            $source = $Database->address."uploads/".$user->email."/".$this->file_name2;
            }
            elseif($this->file_name3 != ""){
            $source = $Database->address." uploads/".$user->email."/".$this->file_name3;
            }else{
            $source = $Database->address."required/no-picture.jpg";
            }
            if($this->adname == ""){
            $adname = "&nbsp";
            }else{
            $adname = $this->adname;
            }
            if(strlen($adname) > 22){
        $adname = substr($adname, 0, 22) .".....";
        }else{
        $adname = $adname;
        }
            if(strlen($this->description) > 60){
        $description = substr($this->description, 0, 60) .".........";
        }else{
        $description = $this->description;
        } 
         if(strlen($this->location) > 40){
        $location = substr($this->location, 0, 40) .".....";
        }else{
        $location = $this->location;
        }
        if($this->quantity == 0){
        $this->quantity = 1;
        }
        $this->category = $result['category'];
        if($this->category == "Fashion and Beauty"){
            $this->pageAdrress = $Database->fashion;
        }elseif($this->category == "Mobile Phones and Tablet"){
            $this->pageAdrress = $Database->mobile;
        }
        elseif($this->category == "Vehicle"){
            $this->pageAdrress = $Database->vehicle;
        }
         elseif($this->category == "Electronics"){
            $this->pageAdrress = $Database->electronics;
         }
         elseif($this->category == "Home,Furniture and Garden"){
            $this->pageAdrress = $Database->home;
         }
         elseif($this->category == "Real Estate"){
            $this->pageAdrress = $Database->realEstate;
        }else{
    $this->pageAdrress = $Database->jobs;
      }
     echo '<div class="select_from" >';
      echo '<a href="'.$this->pageAdrress.'showad.php?ad_id='.$this->id.'" ><div style="width:100%; border-bottom: 1px solid grey"><img src="'. $source .'" style="width:100%;height: 140px " /></div></a>';
      echo ' <a href="'.$this->pageAdrress.'showad.php?ad_id='.$this->id.'" ><p style="background-color:white; max-height:20px"><strong style=" ">'. $adname .'</strong></p></a>';
      
        echo ' <p style="background-color:white; width:97%; padding-left:3%">
        <strong style=" padding-bottom:20px; color: #8a8a0f"><img src="'.$this->address .'required/naira.jpg" style="height: 15px"/>'.$this->price .'</strong></p>
        </div>';
            
    }
  
    }
    
    
    public function select_for_maker_subcat($cat,$maker,$answer, $lgarea,$adname){
     global $Database;
     
     $sql = "select * from goodsandservices";
        $sql .= " where category = ";
        $sql .= "'". $cat ."'";
        $sql .= " and $maker = ";
        $sql .= "'".$answer ."'";
        $sql .= " and lg_area = ";
        $sql .= "'".$lgarea ."'";
        $sql .= " and adname like ";
        $sql .= "'%". $adname ."%'";
        $sql .= " ORDER BY date DESC";
        $res = $Database->add_query($sql);
        if($Database->num_rows($res)  == 0 ){
          echo " <div class='no_ad_to_display_div'><p>There is no ad yet . Please click  below to create an Advert. It is always free</p>";
     echo   '<a href="'.$Database->address.'buyandsellad.php"><img src="'.$Database->address.'required/zukasell_ad_sell.jpg" class="no_ad_to_display_image" /></a></div>';
        }
        while($result = $Database->fetch_array($res)){
            $this->user = $result['user_id'];   
            $this->description = ucfirst($result['description']);
            $this->file_name = $result['file_name'];
            $this->file_name2 = $result['file_name2'];
            $this->file_name3 = $result['file_name3'];
            $this->phone_number = $result['phone'];
            $this->location = ucfirst($result['location']);
            $this->adname = ucfirst($result['adname']);
            $this->price = $result['price'];
            $this->id = $result['ad_id'];
            $this->quantity = $result['quantity'];
            $user = new User();
            $user->find_by_mail($this->user);
            if($this->file_name != ""){
           $source = $Database->address."uploads/".$user->email."/".$this->file_name;
            } 
            elseif($this->file_name2 != ""){
            $source = $Database->address."uploads/".$user->email."/".$this->file_name2;
            }
            elseif($this->file_name3 != ""){
            $source = $Database->address." uploads/".$user->email."/".$this->file_name3;
            }else{
            $source = $Database->address."required/no-picture.jpg";
            }
            if($this->adname == ""){
            $adname = "&nbsp";
            }else{
            $adname = $this->adname;
            }
            if(strlen($adname) > 22){
        $adname = substr($adname, 0, 22) .".....";
        }else{
        $adname = $adname;
        }
            if(strlen($this->description) > 60){
        $description = substr($this->description, 0, 60) .".........";
        }else{
        $description = $this->description;
        } 
         if(strlen($this->location) > 40){
        $location = substr($this->location, 0, 40) .".....";
        }else{
        $location = $this->location;
        }
        if($this->quantity == 0){
        $this->quantity = 1;
        }
         $this->category = $result['category'];
        if($this->category == "Fashion and Beauty"){
            $this->pageAdrress = $Database->fashion;
        }elseif($this->category == "Mobile Phones and Tablet"){
            $this->pageAdrress = $Database->mobile;
        }
        elseif($this->category == "Vehicle"){
            $this->pageAdrress = $Database->vehicle;
        }
         elseif($this->category == "Electronics"){
            $this->pageAdrress = $Database->electronics;
         }
         elseif($this->category == "Home,Furniture and Garden"){
            $this->pageAdrress = $Database->home;
         }
         elseif($this->category == "Real Estate"){
            $this->pageAdrress = $Database->realEstate;
        }else{
    $this->pageAdrress = $Database->jobs;
      }
      
     echo '<div class="select_from" >';
      echo '<a href="'.$this->pageAdrress.'showad.php?ad_id='.$this->id.'" ><div style="width:100%; border-bottom: 1px solid grey"><img src="'. $source .'" style="width:100%;height: 140px " /></div></a>';
      echo ' <a href="'.$this->pageAdrress.'showad.php?ad_id='.$this->id.'" ><p style="background-color:white; max-height:20px"><strong style=" ">'. $adname .'</strong></p></a>';
      
        echo ' <p style="background-color:white; width:97%; padding-left:3%">
        <strong style=" padding-bottom:20px; color: #8a8a0f"><img src="'.$this->address .'required/naira.jpg" style="height: 15px"/>'.$this->price .'</strong></p>
        </div>';
            
    }
  
    }
    
    public function select_for_maker_subcat_lg($cat,$maker,$answer, $lgarea){
     global $Database;
     
     $sql = "select * from goodsandservices";
        $sql .= " where category = ";
        $sql .= "'". $cat ."'";
        $sql .= " and $maker = ";
        $sql .= "'".$answer ."'";
        $sql .= " and lg_area = ";
        $sql .= "'".$lgarea ."'";
        $sql .= " ORDER BY date DESC";
        $res = $Database->add_query($sql);
        if($Database->num_rows($res)  == 0 ){
         echo " <div class='no_ad_to_display_div'><p>There is no ad yet . Please click  below to create an Advert. It is always free</p>";
     echo   '<a href="'.$Database->address.'buyandsellad.php"><img src="'.$Database->address.'required/zukasell_ad_sell.jpg" class="no_ad_to_display_image" /></a></div>';
        }
        while($result = $Database->fetch_array($res)){
            $this->user = $result['user_id'];   
            $this->description = ucfirst($result['description']);
            $this->file_name = $result['file_name'];
            $this->file_name2 = $result['file_name2'];
            $this->file_name3 = $result['file_name3'];
            $this->phone_number = $result['phone'];
            $this->location = ucfirst($result['location']);
            $this->adname = ucfirst($result['adname']);
            $this->price = $result['price'];
            $this->id = $result['ad_id'];
            $this->quantity = $result['quantity'];
            $user = new User();
            $user->find_by_mail($this->user);
            if($this->file_name != ""){
           $source = $Database->address."uploads/".$user->email."/".$this->file_name;
            } 
            elseif($this->file_name2 != ""){
            $source = $Database->address."uploads/".$user->email."/".$this->file_name2;
            }
            elseif($this->file_name3 != ""){
            $source = $Database->address." uploads/".$user->email."/".$this->file_name3;
            }else{
            $source = $Database->address."required/no-picture.jpg";
            }
            if($this->adname == ""){
            $adname = "&nbsp";
            }else{
            $adname = $this->adname;
            }
            if(strlen($adname) > 22){
        $adname = substr($adname, 0, 22) .".....";
        }else{
        $adname = $adname;
        }
            if(strlen($this->description) > 60){
        $description = substr($this->description, 0, 60) .".........";
        }else{
        $description = $this->description;
        } 
         if(strlen($this->location) > 40){
        $location = substr($this->location, 0, 40) .".....";
        }else{
        $location = $this->location;
        }
        if($this->quantity == 0){
        $this->quantity = 1;
        }
       $this->category = $result['category'];
        if($this->category == "Fashion and Beauty"){
            $this->pageAdrress = $Database->fashion;
        }elseif($this->category == "Mobile Phones and Tablet"){
            $this->pageAdrress = $Database->mobile;
        }
        elseif($this->category == "Vehicle"){
            $this->pageAdrress = $Database->vehicle;
        }
         elseif($this->category == "Electronics"){
            $this->pageAdrress = $Database->electronics;
         }
         elseif($this->category == "Home,Furniture and Garden"){
            $this->pageAdrress = $Database->home;
         }
         elseif($this->category == "Real Estate"){
            $this->pageAdrress = $Database->realEstate;
        }else{
    $this->pageAdrress = $Database->jobs;
      }
     echo '<div class="select_from" >';
      echo '<a href="'.$this->pageAdrress.'showad.php?ad_id='.$this->id.'" ><div style="width:100%; border-bottom: 1px solid grey"><img src="'. $source .'" style="width:100%;height: 140px " /></div></a>';
      echo ' <a href="'.$this->pageAdrress.'showad.php?ad_id='.$this->id.'" ><p style="background-color:white; max-height:20px"><strong style=" ">'. $adname .'</strong></p></a>';
      
        echo ' <p style="background-color:white; width:97%; padding-left:3%">
        <strong style=" padding-bottom:20px; color: #8a8a0f"><img src="'.$this->address .'required/naira.jpg" style="height: 15px"/>'.$this->price .'</strong></p>
        </div>';
            
    }
  
    }
    
    
    public function select_for_maker_subcat_name($cat,$maker,$answer, $name){
     global $Database;
     
     $sql = "select * from goodsandservices";
        $sql .= " where category = ";
        $sql .= "'". $cat ."'";
        $sql .= " and $maker = ";
        $sql .= "'".$answer ."'";
        $sql .= " and adname like ";
        $sql .= "'%".$name ."%'";
        $sql .= " ORDER BY date DESC";
        $res = $Database->add_query($sql);
        if($Database->num_rows($res)  == 0 ){
         echo " <div class='no_ad_to_display_div'><p>There is no ad yet . Please click  below to create an Advert. It is always free</p>";
     echo   '<a href="'.$Database->address.'buyandsellad.php"><img src="'.$Database->address.'required/zukasell_ad_sell.jpg" class="no_ad_to_display_image" /></a></div>';
        }
        while($result = $Database->fetch_array($res)){
            $this->user = $result['user_id'];   
            $this->description = ucfirst($result['description']);
            $this->file_name = $result['file_name'];
            $this->file_name2 = $result['file_name2'];
            $this->file_name3 = $result['file_name3'];
            $this->phone_number = $result['phone'];
            $this->location = ucfirst($result['location']);
            $this->adname = ucfirst($result['adname']);
            $this->price = $result['price'];
            $this->id = $result['ad_id'];
            $this->quantity = $result['quantity'];
            $user = new User();
            $user->find_by_mail($this->user);
            if($this->file_name != ""){
           $source = $Database->address."uploads/".$user->email."/".$this->file_name;
            } 
            elseif($this->file_name2 != ""){
            $source = $Database->address."uploads/".$user->email."/".$this->file_name2;
            }
            elseif($this->file_name3 != ""){
            $source = $Database->address." uploads/".$user->email."/".$this->file_name3;
            }else{
            $source = $Database->address."required/no-picture.jpg";
            }
            if($this->adname == ""){
            $adname = "&nbsp";
            }else{
            $adname = $this->adname;
            }
            if(strlen($adname) > 22){
        $adname = substr($adname, 0, 22) .".....";
        }else{
        $adname = $adname;
        }
            if(strlen($this->description) > 60){
        $description = substr($this->description, 0, 60) .".........";
        }else{
        $description = $this->description;
        } 
         if(strlen($this->location) > 40){
        $location = substr($this->location, 0, 40) .".....";
        }else{
        $location = $this->location;
        }
        if($this->quantity == 0){
        $this->quantity = 1;
        }
         $this->category = $result['category'];
        if($this->category == "Fashion and Beauty"){
            $this->pageAdrress = $Database->fashion;
        }elseif($this->category == "Mobile Phones and Tablet"){
            $this->pageAdrress = $Database->mobile;
        }
        elseif($this->category == "Vehicle"){
            $this->pageAdrress = $Database->vehicle;
        }
         elseif($this->category == "Electronics"){
            $this->pageAdrress = $Database->electronics;
         }
         elseif($this->category == "Home,Furniture and Garden"){
            $this->pageAdrress = $Database->home;
         }
         elseif($this->category == "Real Estate"){
            $this->pageAdrress = $Database->realEstate;
        }else{
    $this->pageAdrress = $Database->jobs;
      }
     echo '<div class="select_from" >';
      echo '<a href="'.$this->pageAdrress.'showad.php?ad_id='.$this->id.'" ><div style="width:100%; border-bottom: 1px solid grey"><img src="'. $source .'" style="width:100%;height: 140px " /></div></a>';
      echo ' <a href="'.$this->pageAdrress.'showad.php?ad_id='.$this->id.'" ><p style="background-color:white; max-height:20px"><strong style=" ">'. $adname .'</strong></p></a>';
      
        echo ' <p style="background-color:white; width:97%; padding-left:3%">
        <strong style=" padding-bottom:20px; color: #8a8a0f"><img src="'.$this->address .'required/naira.jpg" style="height: 15px"/>'.$this->price .'</strong></p>
        </div>';
            
    }
  
    }
    
}
  