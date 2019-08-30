 <?php
 include_once("class.pagination.php");
 $pagination = new Pagination();
$pagination->setItemCount(1000); //count of total items
$pagination->setLimitpg(5);//set limit elements displayed
$pagination->SetCurrent($numberpage);//set current page number from 1 
$pagination->Set_max_page_displayed(5); //set number of pages can be displayed
$pagination->Set_linkiQuery("http://www.elhawy.it/items./page/{__PAGE__}"); //set Link Query;{__PAGE__} is replaced by Page NUMBER


echo $pagination->paging_responsave_rander($ulClasses = "pagination ",$liClasses = "page-item",$aclasses = "page-link" ,$activePage = "active");
 ?>
