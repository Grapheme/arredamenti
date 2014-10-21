<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "guests_interface";
$route['404_override'] = 'guests_interface/page404';

$route['redactor/upload'] = "global_interface/redactorUploadImage";
$route['redactor/get-uploaded-images'] = "global_interface/redactorUploadedImages";

/*************************************************** AJAX INTRERFACE ***********************************************/
$route['send-callback-message'] = "ajax_interface/sendCallbackMessage";
/****************** pages ********************/
$route[ADMIN_START_PAGE.'/page/update'] = "ajax_interface/updatePage";
$route[ADMIN_START_PAGE.'/pages/:any/upload/resource'] = "ajax_interface/pageUploadResources";
$route[ADMIN_START_PAGE.'/page/remove/resource'] = "ajax_interface/removePageResource";
/****************** brends ********************/
$route[ADMIN_START_PAGE.'/brend/insert'] = "ajax_interface/insertBrend";
$route[ADMIN_START_PAGE.'/brend/update'] = "ajax_interface/updateBrend";
$route[ADMIN_START_PAGE.'/brend/remove'] = "ajax_interface/removeBrend";
/****************** factory ********************/
$route[ADMIN_START_PAGE.'/factory/insert'] = "ajax_interface/insertFactory";
$route[ADMIN_START_PAGE.'/factory/update'] = "ajax_interface/updateFactory";
$route[ADMIN_START_PAGE.'/factory/remove'] = "ajax_interface/removeFactory";
/**************** categories ******************/
$route[ADMIN_START_PAGE.'/category/insert'] = "ajax_interface/insertCategory";
$route[ADMIN_START_PAGE.'/category/update'] = "ajax_interface/updateCategory";
$route[ADMIN_START_PAGE.'/category/remove'] = "ajax_interface/removeCategory";
/**************** collection ******************/
$route[ADMIN_START_PAGE.'/collection/insert'] = "ajax_interface/insertCollection";
$route[ADMIN_START_PAGE.'/collection/update'] = "ajax_interface/updateCollection";
$route[ADMIN_START_PAGE.'/collection/remove'] = "ajax_interface/removeCollection";

$route[ADMIN_START_PAGE.'/collection/upload/resource'] = "ajax_interface/collectionUploadImage";
$route[ADMIN_START_PAGE.'/collection/remove/resource'] = "ajax_interface/collectionRemoveImage";
$route[ADMIN_START_PAGE.'/collection/caption/resource'] = "ajax_interface/collectionImageCaption";

/**************** news ******************/
$route[ADMIN_START_PAGE.'/news/insert'] = "ajax_interface/insertNews";
$route[ADMIN_START_PAGE.'/news/update'] = "ajax_interface/updateNews";
$route[ADMIN_START_PAGE.'/news/remove'] = "ajax_interface/removeNews";
/******************load view ********************/
$route['load-view/expert-statement'] = "ajax_interface/loadExpertStatement";
/*************************************************** ADMIN INTRERFACE ***********************************************/
$route[ADMIN_START_PAGE] = "admin_interface/controlPanel";
$route[ADMIN_START_PAGE.'/brends'] = "admin_interface/brends";
$route[ADMIN_START_PAGE.'/brends/add'] = "admin_interface/addBrend";
$route[ADMIN_START_PAGE.'/brends/edit'] = "admin_interface/editBrend";

$route[ADMIN_START_PAGE.'/factory'] = "admin_interface/factory";
$route[ADMIN_START_PAGE.'/factory/add'] = "admin_interface/addFactory";
$route[ADMIN_START_PAGE.'/factory/edit'] = "admin_interface/editFactory";

$route[ADMIN_START_PAGE.'/categories'] = "admin_interface/categories";
$route[ADMIN_START_PAGE.'/categories/add'] = "admin_interface/addСategory";
$route[ADMIN_START_PAGE.'/categories/edit'] = "admin_interface/editCategory";

$route[ADMIN_START_PAGE.'/collections'] = "admin_interface/collections";
$route[ADMIN_START_PAGE.'/collections/add'] = "admin_interface/addCollection";
$route[ADMIN_START_PAGE.'/collections/edit'] = "admin_interface/editCollection";

$route[ADMIN_START_PAGE.'/pages'] = "admin_interface/pages";
$route[ADMIN_START_PAGE.'/pages/:any/edit'] = "admin_interface/editPages";

$route[ADMIN_START_PAGE.'/collection/update-thumbnails'] = "admin_interface/collectionUpdateThumbnails";

$route[ADMIN_START_PAGE.'/news'] = "admin_interface/news";
$route[ADMIN_START_PAGE.'/news/add'] = "admin_interface/addNews";
$route[ADMIN_START_PAGE.'/news/edit'] = "admin_interface/editNews";

/***************************************************** AUTORIZATION *************************************************/
$route['login'] = "autorization/signIN";
$route['login-in'] = "autorization/loginIn";
$route['log-off'] = "autorization/logoff";
/*************************************************** GUEST INTRERFACE ***********************************************/
$route['magazin-italianskoi-mebeli'] = "guests_interface/about";
$route['catalog-mebeli'] = "guests_interface/catalog";
$route['partnership'] = "guests_interface/partnership";
$route['factories'] = "guests_interface/factories";
$route['contacts'] = "guests_interface/contacts";

$route['catalog-mebeli/:any/:any'] = "guests_interface/singleCollection";
$route['catalog-mebeli/:any'] = "guests_interface/collections";

$route['news'] = "guests_interface/news";
$route['news/:num'] = "guests_interface/showNews";
$route['news/:any'] = "guests_interface/showNews";


$route[RUSLAN.'|'.ENGLAN] = "guests_interface/index";

