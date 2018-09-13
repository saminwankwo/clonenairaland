<?php
echo "<!DOCTYPE html> <html><head>";

if(!$pagetitle){
	echo "<title> $config->title Forum";
} else {
	echo "<title> {$config->title} - {$pagetitle} </title>";
}
include 'css.php';
$javas = (isset($javascript)) ? $javascript : "";

echo "$javas</head><body><div class='body'>";

$user = $_SESSION["user"];
$self =''.$_SERVER["HTTP_HOST"].''.$_SERVER["REQUEST_URI"].'';
$totalmembers = mysqli_num_rows(mysqli_query("SELECT * FROM `users`"));
$totaltopics = mysqli_num_rows(mysqli_query("SELECT * FROM `topics`"));
$time = time();
$tdate = functions::maindate($time);
$out = 'Welcome,';

if(functions::issloggedin()){
	$banned = functions::user_info($user, banned);

	if ($banned == 0) {
		if (functions::user_info($user, lasttime) > (time() - 300)) {
			$totalonsite = functions::user_info($user, timespent) + time() - functions::user_info($user, lasttime);
			mysqli_query("UPDATE users SET timespent='$totalonsite' WHERE username='$user'");
		} else {
			header('location: '.$config->url.'logout');
			exit();
		}

		$tfcheck = mysqli_num_rows(mysqli_query("SELECT * FROM `follow` WHERE follower='$user' AND type='topic'"));
		if ($tfcheck > 0) {
				$tfollowq = mysqli_fetch_array(mysqli_query("SELECT IFNULL(SUM(hasread), 0) AS hastotal FROM follow WHERE follower='$user' AND type='topic'"));
				$tfollow = $tfollowq["hastotal"];

				if ($tfollow > 0) {
					$tfollowed = " / <a href='".$config->url."followed'>Followed Topics(".$tfollow.")</a>";
				} else {
					$tfollowed = " / <a href='".$config->url."followed'>Followed Topics</a>";
				}

			} else {
				$tfollowed = "";
			}

		$bfcheck = mysqli_num_rows(mysqli_query("SELECT * FROM `follow` WHERE follower='$user' AND type='board'"));
		if ($ncheck > 0) {
			$noti = mysqli_num_rows(mysqli_query("SELECT `hasread` FROM `notifications` WHERE `hasread`=0 AND `to`='$user'"));
			if ($noti > 0) {
				$notifications = " / <a href='".$config->url."notifications'>Notifacations(".$noti.")</a>";
			} else {
				$notifications = " / <a href='".$config->url."notifications'>Notifacations</a>";
			}
		} else {
			$notifications = "";
		}

		$pmcheck = mysqli_num_rows(mysqli_query("SELECT `hasread` FROM `pms` WHERE `to`='$user'"));
		if ($pmcheck > 0 ) {
			$pmnum = mysqli_num_rows(mysqli_query("SELECT `hasread` FROM `pms` WHERE `hasread`=0 AND `to`='$user'"));
			if ($pmnum > 0) {
				$pms = " / <a href='".$config->url."pm'>Messages(".$pmnum.")</a>";
			} else {
				$pms = " / <a href='".$config->url."pm'>Messages</a>";
			}
		} else {
			$pm = " ";
		}

		$modcheck = mysqli_num_rows(mysqli_query("SELECT * FROM moderators WHERE username = '$user'"));
		$admincheck = mysqli_num_rows(mysqli_query("SELECT * FROM admins WHERE username = '$user'"));
		if ($admincheck > 0) {
			$panel = " / <a href='".$config->url."panel'>Admin Panel</a>";
		} elseif ($modcheck > 0) {
			$panel = " / <a href='".$config->url."panel'>Moderators Panel</a>";
		} else {
			$panel = "";
		}

		$username = functions::user_info($user, username);
		$uid = functions::user_info($user, userID); 
		$out = "<b>".functions::user_link($username)."</b>: <a href='".$config->url."editprofile'>Edit Profile</a>".$bfollowed.$tfollowed.$following.$pms.$notifications." / <a href='".$config->url."trending'>Trending</a> / <a href='".$config->url."recent'>Recent</a> / <a href='".$config->url."new'>New</a>".$panel." / <a href='".$config->url."logout?session=".$sessionkey."'>Logout</a><br>";
	} else {
		functions::updateguest();
		$out = ' <b>Guest</b>: <a href="'.$config->url.'register">Join'.$config->title.'</a> / <a href="'.$config->url.'login?redirect='.urlencode($self).'">Login</a> / <a href="'.$config->url.'trending">Trending</a> / <a href="'.$config->url.'recent">Recent</a> / <a href="'.$config->url.'new">New</a><br>';
	}
}
echo '<table summary = "" id = "up">
<tbody><tr><td class "grad"> <h1><a href = "'.$config->url.'" class=g title="'.$config->title.' Nigerian Forum">'.$config->title.' Forum *</a></h1>
'.$out.'<b>Stats: </b> '.$totalmembers.' members, '.$totaltopics. ' topics. <b>Date:</b> '.$tdate.'<p>
<form action="'.$config->url.'search" method="post"> 
	<input type="text" name="q" size="32">
	<input type="submit" name="sa" value="Search">
</form></tbody></table><p><h2></h2>';
?>