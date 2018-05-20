<?php
require('configfiles/init.php');
require('configfiles/head.php');


$query = mysql_query("SELECT * FROM `boards` WHERE `type`='parent'");
echo '<table class="boards"><tr><th><h3>'.strtoupper($config->title).'NIGERIAN FORUMS</h3>';

$i = 0;
while($info = mysql_fetch_array($query)){

	$id = $info["id"];
	$name = $info["name"];
	$des = $info["description"];
	$query2 = mysql_query("SELECT * FROM `boards` WHERE `type`='child' AND `typeid`='$id'");

if($i%2 == 0)
{
$css = 'l w';
} else {
$css = 'l ';
}
$check2 = mysql_fetch_array(mysql_query("SELECT * FROM `boards` WHERE `type`='child' AND `typeid`='$id' ORDER BY `id` DESC LIMIT 1"));
$cid = $check2["id"]; 

echo '<tr><td class="'.$css.'"><a href="'.urls::board($name, $id).'" title="'.$des.'"><b>'.$name.'</b></a>: ';
while($info2 = mysql_fetch_array($query2))
{
$id2 = $info2["id"];
$name2 = $info2["name"];
$des2 = $info2["description"];

if($cid == $id2)
{
$echo = '<a href="'.urls::board($name2, $id2).'" title="'.$des2.'"><b>'.$name2.'</b></a>';
} else {
$echo = '<a href="'.urls::board($name2, $id2).'" title="'.$des2.'"><b>'.$name2.'</b></a>, ';
}
echo $echo;
}


$i++;
}
echo '</table>';
mysql_free_result($query);

$limit = 65;
$urows = mysql_num_rows( mysql_query("SELECT * FROM `updates`"));
$pagination2 = new pagination($limit, 1, ''.$config->url.'links/(page)', $urows);

echo '<p><table
class="boards"><tr><th><b><img src="'.$config->url.'icons/smiley.gif" \> <a
href="'.$config->url.'links">Featured Links:</a> '.$pagination2->display2().' <a
href="http://twitter.com/">Twitter</a> / <a href="http://facebook.com/'.$config->fb.'">Facebook</a> <img src="'.$config->url.'icons/smiley.gif" \></b><tr><td
class="featured w">';

$query = mysql_query("SELECT * FROM `updates` ORDER BY `id` DESC LIMIT $limit");
$num = mysql_num_rows($query);
if($num==0)
{
echo "No updates yet";
}
else
{
while($uinfo=mysql_fetch_array($query))
{
$url = functions::cleanoutput($uinfo["url"]);
$title = functions::cleanoutput($uinfo["title"]);

echo ' ==> <a
href="'.$url.'"><b>'.$title.'</b></a> <==<br>';
}
echo '<tr><td class="l w"> <center><a
href="'.$config->url.'links">(1)</a> '.$pagination2->display2() . '</center>';
}
mysql_free_result($query);
echo '</table>';

$recent = date("U")-300;
$uonline = mysql_num_rows(mysql_query("SELECT * FROM `users` WHERE `lasttime`>'$recent'"));
$gonline = mysql_num_rows(mysql_query("SELECT * FROM `guestsonline` WHERE `time`>'$recent'"));
echo '<p><table><tr><td><h3>Members
Online:</h3> (<b><a href="'.$config->url.'who">'.$uonline.'
Members</b></a> and <b>'.$gonline.' Guests</b>
online in <b>last 5 minutes</b>!)';


$bquery = mysql_query("SELECT * FROM `users` WHERE `birthmonth`='".(date("n"))."' AND `birthday`='".(date("j"))."'") or die(mysql_error());

if(mysql_num_rows($bquery) > 0)
{
$out = "";
while($binfo = mysql_fetch_array($bquery))
{
$sex = $binfo['sex'];
if(strlen($sex) == 4)
{
$age = '<span class="m">' . functions::ageCount($binfo["birthday"] . "/" . $binfo["birthmonth"] . "/" . $binfo["birthyear"]) . '</span>';
}
elseif(strlen($sex) == 6)
{
$age = '<span
class="f">' . functions::ageCount($binfo["birthday"] . "/" . $binfo["birthmonth"] . "/" . $binfo["birthyear"]) . '</span>';
}
else {
$age = functions::ageCount($binfo["birthday"] . "/" . $binfo["birthmonth"] . "/" . $binfo["birthyear"]);
}

$out .= '<a href="'.urls::user($binfo["username"]).'">'.$binfo["username"].'</a>('.$age.'), ';
}
echo '<tr><td class="l w"><center><b>Birthdays:</b><br> '.functions::cleanlast($out, 2).'</center>';
} else {
echo '';
}
echo '</table><p class="small">(<a href="#up"><b>Go
Up</b></a>)<p><table id="down"><tr><td
class="small w grad"><form action="'.$config->url.'search"> <input type="text" name="q"
size="32"><input type="submit" name="sa"
value="Search"></form><br><b><a href="'.$config->url.'" title="'.$config->title.' Nigerian
Forum">'.$config->title.'</a></b> - Copyright &copy;
2016 <a href="http://fb.me/'.$config->fb.'" title="'.$config->owner.'">'.$config->owner.'</a>. All rights reserved. <br>
Disclaimer: All edoloaded members are free to Post and Upload anything Worth every Kilobyte it Costs.<center><script type="text/javascript" src="http://widget.supercounters.com/online_i.js"></script><script type="text/javascript">sc_online_i(1288791,"ffffff","#ff9147");</script><br>
</center></table>';

echo '</div></body></html>';
die();
?>