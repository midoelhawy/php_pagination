# php_pagination
simple responsive php pagination and randering 

`
$pagination = new Pagination();

$pagination->setItemCount($eventes['count']);

$pagination->setLimitpg(5);

$pagination->SetCurrent($numberpage);

$pagination->Set_max_page_displayed(5);

$pagination->Set_linkiQuery("http://localhost/CMSEvents/AllEvents./page/{__PAGE__}");

`
