 <?php
 require_once('database.php');
  require_once('user.php');
  require_once('session.php');
  
   class searching {
   public $pageAdrress;
public $user;
public $address ="http://localhost:7080/project/";
public $adpic;
public $message;
public $adname;
public $maker;
public $model;
public $cat;
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
    
  public function search($cat,$lgarea){
   global $Database;
 $sql = "select * from goodsandservices";
        $sql .= " where adname like ";
        $sql .= "'%".$cat ."%'";
        $sql .= " and lg_area = ";
        $sql .= "'".$lgarea ."'";
        $sql .= " ORDER BY date DESC";
        $res = $Database->add_query($sql);
        if($Database->num_rows($res)  == 0 ){
            echo " NO AD YET";
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
            $source = $Database->address."uploads/nopic.jpg";
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
        if($this->category == "Fashion & Beauty"){
            $this->pageAdrress = "http://localhost:7080/project/Fashion and Beauty/";
        }elseif($this->category == "Mobile Phones and Tablet"){
            $this->pageAdrress = "http://localhost:7080/project/Mobile phones and Tablets/";
        }
        elseif($this->category == "Vehicle"){
            $this->pageAdrress ="http://localhost:7080/project/Vehicle/";
        }
         elseif($this->category == "Electronics"){
            $this->pageAdrress ="http://localhost:7080/project/Electronics/";
         }
         elseif($this->category == "Home,Furniture and Garden"){
            $this->pageAdrress ="http://localhost:7080/project/Home,Furniture/";
         }
         else{
            $this->pageAdrress = "";
        }
      
     echo '<div class="select_from" >';
      echo '<a href="'.$this->pageAdrress.'showad.php?ad_id='.$this->id.'" ><div style="width:100%; border-bottom: 1px solid grey"><img src="'. $source .'" style="width:100%;height: 140px " /></div></a>';
      echo ' <a href="'.$this->pageAdrress.'showad.php?ad_id='.$this->id.'" ><p style="background-color:white; max-height:20px"><strong style=" ">'. $adname .'</strong></p></a>';
      
        echo ' <p style="background-color:white; width:97%; padding-left:3%">
        <strong style=" padding-bottom:20px; color: #8a8a0f"><img src="'.$this->address .'required/naira.jpg" style="height: 15px"/>'.$this->price .'</strong></p>
        </div>';
            
        }
      }
  
  public function search_for_ad($cat){
   global $Database;
   if($cat != ""){
    if(is_string($cat)){
 $sql = "select * from goodsandservices";
        $sql .= " where adname like ";
        $sql .= "'%".$cat ."%'";
        $sql .= " ORDER BY date DESC";
        $res = $Database->add_query($sql);
        if($Database->num_rows($res)  == 0 ){
            echo " NO AD YET";
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
            $source = $Database->address."uploads/nopic.jpg";
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
        if($this->category == "Fashion & Beauty"){
            $this->pageAdrress = "http://localhost:7080/project/Fashion and Beauty/";
        }elseif($this->category == "Mobile Phones and Tablet"){
            $this->pageAdrress = "http://localhost:7080/project/Mobile phones and Tablets/";
        }
        elseif($this->category == "Vehicle"){
            $this->pageAdrress ="http://localhost:7080/project/Vehicle/";
        }
         elseif($this->category == "Electronics"){
            $this->pageAdrress ="http://localhost:7080/project/Electronics/";
         }
         elseif($this->category == "Home,Furniture and Garden"){
            $this->pageAdrress ="http://localhost:7080/project/Home,Furniture/";
         }
         else{
            $this->pageAdrress = "";
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
     }
     
     public function search_by_lga($lgarea){
   global $Database;
   if($lgarea != ""){
    if(is_string($lgarea)){
 $sql = "select * from goodsandservices";
        $sql .= " where lg_area like ";
        $sql .= "'%".$lgarea ."%'";
        $sql .= " ORDER BY date DESC";
        $res = $Database->add_query($sql);
        if($Database->num_rows($res)  == 0 ){
            echo " NO AD YET";
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
            $source = $Database->address."uploads/nopic.jpg";
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
        if($this->category == "Fashion & Beauty"){
            $this->pageAdrress = "http://localhost:7080/project/Fashion and Beauty/";
        }elseif($this->category == "Mobile Phones and Tablet"){
            $this->pageAdrress = "http://localhost:7080/project/Mobile phones and Tablets/";
        }
        elseif($this->category == "Vehicle"){
            $this->pageAdrress ="http://localhost:7080/project/Vehicle/";
        }
         elseif($this->category == "Electronics"){
            $this->pageAdrress ="http://localhost:7080/project/Electronics/";
         }
         elseif($this->category == "Home,Furniture and Garden"){
            $this->pageAdrress ="http://localhost:7080/project/Home,Furniture/";
         }
         else{
            $this->pageAdrress = "";
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
     }
     
     
      public function search_by_ad_and_lga($cat,$lgarea){
   global $Database;
   if($cat != ""){
    if(is_string($cat)){
 $sql = "select * from goodsandservices";
        $sql .= " where adname like ";
        $sql .= "'%".$cat ."%'";
        $sql .= " and lg_area like";
        $sql .= "'%".$lgarea."%'";
        $sql .= " ORDER BY date DESC";
        $res = $Database->add_query($sql);
        if($Database->num_rows($res)  == 0 ){
            echo " NO AD YET";
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
            $source = $Database->address."uploads/nopic.jpg";
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
        if($this->category == "Fashion & Beauty"){
            $this->pageAdrress = "http://localhost:7080/project/Fashion and Beauty/";
        }elseif($this->category == "Mobile Phones and Tablet"){
            $this->pageAdrress = "http://localhost:7080/project/Mobile phones and Tablets/";
        }
        elseif($this->category == "Vehicle"){
            $this->pageAdrress ="http://localhost:7080/project/Vehicle/";
        }
         elseif($this->category == "Electronics"){
            $this->pageAdrress ="http://localhost:7080/project/Electronics/";
         }
         elseif($this->category == "Home,Furniture and Garden"){
            $this->pageAdrress ="http://localhost:7080/project/Home,Furniture/";
         }
         else{
            $this->pageAdrress = "";
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
     }
     
   }
  