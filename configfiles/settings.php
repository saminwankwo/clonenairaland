<?php
$config = new core();

//// DATABSE SETTINGS ////
$dbname = "Testing_db"; // Your Sql Database Name
$dbuser = "samuel"; // Your sql database username
$dbhost = "localhost"; // its always localhost, except if your host states otherwise
$dbpass = "Iprogram"; // Your sql database password


////SITE SETTING////
$config->url = 'http://'.$_SERVER["HTTP_HOST"].'/'; // Your website address pls dont edit here.
$config->title = "Testing"; // Your site title. Preferably your domain without .com/.net/.org/ etc
$config->css = "black"; // css styles options.. black, green, blue, or red..
$config->desc = "Nigerian forum"; // Your site description,


////OTHER SETTINGS///
$config->twit = "saminwankwo"; // Your Twitter Username (Not URL)
$config->fb = "nwankwo.samuel"; // Site Facebook Page name (Not profile name or URL)
$config->owner = "Nwankwo Samuel"; // Name Of Owner
$config->email = "nwankwosami@gmail.com"; // Email Of Owner
$config->mobile = "+2348058643829"; // Mobile No. Of Owner         
$config->postsperpage = 15;
$config->topicsperpage = 15;
$config->validExtension = array("jad","jar","zip","sis","sisx","pdf","prov","nth","thm","rar","png","jpg","gif","jpeg");
$config->imgExtension = array("png","jpg","jpeg","gif");
$config->attachmentFolder = ''.$_SERVER['DOCUMENT_ROOT'].'/attachment/';
$config->sitePassword = '';

?>