<?php
namespace App\Components;
class Recusive {
    private $data;
    private $htmls;
    private $category;
    private  $menus;
    public function __construct($data){
        $this->data = $data; 
        $this->htmls = "";

        $this->category = array();
    }

    public function categoryRecursive($parentId,$id = 0, $text = '') {
        if (!empty($this->data)) {
            foreach ($this->data as $value) {
                if ($value->parent_id == $id) {
                    if ( !empty($parentId) && $parentId == $value->id) {
                        $this->htmls .= "<option selected value='" . $value->id . "'>" . $text . $value->name . "</option>";
                    } else {
                        $this->htmls .= "<option value='" . $value->id . "'>" . $text . $value->name . "</option>";
                    }
    
                    $this->categoryRecursive($parentId, $value->id, $text. '--');
                }
            }
            return $this->htmls;
        }
    }
    public function menuRecursive($parentId,$id = 0, $text = '') {
        if (!empty($this->data)) {
            foreach ($this->data as $value) {
                if ($value->parent_id == $id) {
                    if ( !empty($parentId) && $parentId == $value->id) {
                        $this->htmls .= "<option selected value='" . $value->id . "'>" . $text . $value->name . "</option>";
                    } else {
                        $this->htmls .= "<option value='" . $value->id . "'>" . $text . $value->name . "</option>";
                    }
    
                    $this->menuRecursive($parentId, $value->id, $text. '--');
                }
            }
            return $this->htmls;
        }
    }
    
        

    public function get_categoryRecursive($id = 0) {
        $stack = array();
        if (!empty($this->data)) {
            foreach($this->data as$value) {
                if($value ->parent_id == $id) {   
                    
                    $this->category = array_push($value);
                    $this->get_categoryRecursive($value->id); 
                }
            }
            return $this->category;
        }
        
        
    }

 }