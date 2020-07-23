<?php
class pagination {
public $current_page;
public $perpage;
public $total;
public function  paging($page=1, $perpage = 40, $total = 0){
    $this->current_page = (int)$page;
    $this->perpage = (int)$perpage;
    $this->total = (int)$total;
}
public function total_page(){
    return ceil($this->total/$this->perpage);
}
public function previous_page(){
    return $this->current_page - 1;
}
public function next_page(){
    return $this->current_page + 1 ;
}
public function is_next_page(){
    return $this->next_page()<= $this->total_page() ? true: false;
}
public function is_previous_page(){
    return $this->previous_page()>=1 ? true: false;
}
public function offset(){
    return ($this->current_page - 1) * $this->perpage;
}

}
?>