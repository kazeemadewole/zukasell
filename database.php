<?php
class mydatabase {
    public $last_query;
    private $conn;
    private $magic_quote;
    private $new_enough_php;
    public $address ="http://www.zukasell.com/";
    public $addnew =  "http://www.zukasell.com";
    public $mobile = "http://www.zukasell.com/Mobile-Phone-and-Tablets/";
    public $fashion = "http://www.zukasell.com/Fashions-and-Beauty/";
    public $vehicle = "http://www.zukasell.com/Vehicles/";
    public $electronics = "http://www.zukasell.com/Electronic/";
    public $home = "http://www.zukasell.com/Home-Furniture/";
    public $realEstate = "http://www.zukasell.com/Real-Estates/";
    public $jobs = "http://www.zukasell.com/Jobs-and-Service/";

    public function __construct(){
        $this->open_connection();
                $this->magic_quote= get_magic_quotes_gpc();
                 $this->new_enough_php = function_exists("mysqli_real_escape_string");
        
    }
    private function open_connection(){
        $this->conn = new mysqli("localhost","zukasell_admin","MOtunrayo11..","zukasell_zukasell");
        if($this->conn->connect_errno > 0){
          die("database not connected ". $this->conn->connect_error);
        }
        
        
    }
    public function close_connection(){
        if(isset($this->conn)){
        $this->conn->close();
                        unset($this->conn);
        }
        
    }
    public function add_query($sql){
        $result = $this->conn->query($sql);        
        if(!$result){
            die("database query failed ".$this->conn->error);
        }
        //echo "last sql query". $this->last_query;
        return $result;
    }
    public function prepare($sql){
        return $this->conn->prepare($sql);        
        
    }
    public function redirect_to($value){
       header("Location:$value");
    }
    public function close_statement($res){
     return $res->close();
     }
    public function execute($res){
    return $res->execute();
    }
    public function bind_param($result,$v,$root){
     return $result->bind_param( $v, $root);
     }
     public function fetch_array($res){
     return mysqli_fetch_array($res);
     }
     public function fetch($res){
     return $res->fetch();
     }
    public function escape_value($value){
        $this->magic_quote= get_magic_quotes_gpc();
        $this->new_enough_php = function_exists("mysqli_real_escape_string");
        if($this->new_enough_php){
            if($this->magic_quote){
                $value= stripcslashes($value);
            }
            $value= mysqli_real_escape_string($this->conn,$value);
        }
        else{
            if(!$this->magic_quote){
                $value = addslashes($value);
            }
        }
        return $value;
        }
        
   
   
    public function num_rows($result){
    
       return $result->num_rows;
    }
    public function affected_rows($result){
        return $result->affected_rows;
    }
    public function insert_id(){
      return   mysqli_insert_id($this->conn);
    }
}
$Database = new mydatabase();
?>