<?php

if(!class_exists("Pagination")){
  class Pagination{
    public $__items_count = 1;
    public $__limitperPage = 1;
    public $__CurrentPage = 1;
    public $__max_pages_page = 10;//[1][...][3]
    public $__linkQueruy = "/";//[1][...][3]
    public function __construct($countItems = 1,$limitperPage=1){
      if(is_numeric($countItems)){
        $this->__items_count = $countItems;
      }

      if(is_numeric($limitperPage)){
        $this->__limitperPage = $limitperPage;
      }

    }


    public function Set_linkiQuery($linkQueruy){
      $this->__linkQueruy = $linkQueruy;//{__PAGE__}
    }
    public function setItemCount($countItems){
      if(is_numeric($countItems) && $countItems > -1){
        $this->__items_count = $countItems;
      }
    }

    public function setLimitpg($limitperPage){
      if(is_numeric($limitperPage) && $limitperPage > 0){
        $this->__limitperPage = $limitperPage;
      }
    }

    public function SetCurrent($current){
      if(is_numeric($current) && $current > 0){
        $this->__CurrentPage = $current;
      }
    }



    public function Set_max_page_displayed($pages_displayed){
      if(is_numeric($pages_displayed) && $pages_displayed > 0){
        $this->__max_pages_page = $pages_displayed;
      }
    }

    public function Get_page_number(){
      if($this->__limitperPage > 0){
        return ceil($this->__items_count / $this->__limitperPage);
      }
      return 0;
    }



    public function Get_array_pages_responsave(){
        $pages = ceil(intval($this->__items_count) / intval($this->__max_pages_page));
        $res = array();
        $this->__CurrentPage--;
        $pointesAdd = false;
        if ($pages > $this->__max_pages_page) {
            for ($i=0; $i<$pages; $i++) {
                if ($i === 0) {
                    $res[] = ($i+1);
                } elseif ($i+1 == $pages) {
                    $res[] = ($i+1);
                } elseif($i > $this->__CurrentPage - $this->__limitperPage && $i < $this->__CurrentPage + $this->__limitperPage) {
                    $res[] = ($i+1);
                }else{
                  if($pointesAdd == false){
                    $res[] = "...";
                    $pointesAdd = true;
                  }
                }
            }
        } else {
            for ($i=0; $i<$pages; $i++) {
                $res[] = ($i+1);
            }
        }
        return $res;
    }



    public function paging_responsave_rander($ulClasses = "pagination ",$liClasses = "page-item",$aclasses = "page-link" ,$activePage = "active") {
        $pages = ceil(intval($this->__items_count) / intval($this->__max_pages_page));
        $res = array("<ul class='".$ulClasses."'>");
        $this->__CurrentPage--;
        $pointesAdd = false;
        if ($pages > $this->__max_pages_page) {
            for ($i=0; $i<$pages; $i++) {
                if ($i === 0) {
                    $res[] = "<li ".(($i === $this->__CurrentPage)?"class='".$activePage." ".$liClasses."'":"class=' ".$liClasses."'")." data-page='".$i."'><a href='".str_replace("{__PAGE__}",($i+1),$this->__linkQueruy)."' class='".$aclasses."'>«</a></li>";
                } elseif ($i+1 == $pages) {
                    $res[] = "<li ".(($i === $this->__CurrentPage)?"class='".$activePage." ".$liClasses."'":"class=' ".$liClasses."'")." data-page='".$i."'><a href='".str_replace("{__PAGE__}",($i+1),$this->__linkQueruy)."' class='".$aclasses."'>»</a></li>";
                } elseif($i > $this->__CurrentPage - $this->__limitperPage && $i < $this->__CurrentPage + $this->__limitperPage) {
                    $res[] = "<li ".(($i === $this->__CurrentPage)?"class='".$activePage." ".$liClasses."'":"class=' ".$liClasses."'")." data-page='".$i."'><a href='".str_replace("{__PAGE__}",($i+1),$this->__linkQueruy)."' class='".$aclasses."'>".($i+1)."</a></li>";
                }else{
                  if($pointesAdd == false){
                    $res[] = "<li class='disabled ".$liClasses."' data-page='".$i."'><a  class='".$aclasses."'>...</a></li>";
                    $pointesAdd = true;
                  }
                }
            }
        } else {
            for ($i=0; $i<$pages; $i++) {
                $res[] = "<li ".(($i === $this->__CurrentPage)?"class='".$activePage." ".$liClasses."'":"class=' ".$liClasses."'")." data-page='".$i."'><a href='".str_replace("{__PAGE__}",($i+1),$this->__linkQueruy)."' class='".$aclasses."'>".($i+1)."</a></li>";
            }
        }
        $res[] = "</ul>";
        return implode('',$res);
    }




  }
}




 ?>
