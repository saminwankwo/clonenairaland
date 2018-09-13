<?php
class functions extends core{

	public static function go($url){
		header('location: '.$url);
		exit();
	}

	public static function converturl($text){
		$text = html_entity_decode(trim($text), ENT_QUOTES, 'UTF-8');
		$text=str_replace(" ","-", $text);
		$text=str_replace("--","-", $text);
		$text=str_replace("@","-",$text);
		$text=str_replace("/","-",$text);
		$text=str_replace("\\","-",$text);
		$text=str_replace(":","",$text);
		$text=str_replace("\"","",$text);
		$text=str_replace("'","",$text);
		$text=str_replace("<","",$text);
		$text=str_replace(">","",$text);
		$text=str_replace(",","",$text);
		$text=str_replace("?","",$text);
		$text=str_replace(";","",$text);
		$text=str_replace(".","",$text);
		$text=str_replace("[","",$text);
		$text=str_replace("]","",$text);
		$text=str_replace("(","",$text);
		$text=str_replace(")","",$text);
		$text=str_replace("*","",$text);
		$text=str_replace("!","",$text);
		$text=str_replace("$","-",$text);
		$text=str_replace("&","-and-",$text);
		$text=str_replace("%","",$text);
		$text=str_replace("#","",$text);
		$text=str_replace("^","",$text);
		$text=str_replace("=","",$text);
		$text=str_replace("+","",$text);
		$text=str_replace("~","",$text);
		$text=str_replace("`","",$text);
		$text=str_replace("--","-",$text);
		$text = preg_replace("/(Г?|Г?|б ?|б ?|Г?|Г?|б ?|б ?|б ?|б ?|б ?|Д?|б ?|б ?|б ?|б ?|б ?)/", 'a', $text);
		$text = preg_replace("/(aМ?|aМ?|aМ?|aМ?|aМ?|Г?|Г?М?|Г?М?|Г?М?|Г?М?|Г?М?|Д?|Д?М?|ДМ?|Д?М?|Д?М?|Д?М?)/", 'a', $text);
		$text = preg_replace("/(ГЁ|Г?|б  |б  |б  |Г?|б ?|б  |б ?|б ?|б ?)/", 'e', $text);$text = preg_replace("/(eМ?|eМ?|eМ?|eМ?|eМ?|Г?|Г?М?|Г?М?|Г?М?|Г?М?|Г?М?)/", 'e', $text);
		$text = preg_replace("/(Г?|Г?|б ?|б ?|Д?)/", 'i', $text);
		$text = preg_replace("/(iМ?|iМ?|iМ?|iМ?|iМ?)/", 'i', $text);
		$text = preg_replace("/(Г?|Г?|б ?|б ?|Г?|Г?|б ?|б ?|б ?|б ?|б ?|Ж?|б ?|б ?|б ?|б ?|б ?)/", 'o', $text);
		$text = preg_replace("/(oМ?|oМ?|oМ?|oМ?|oМ?|Г?|Г?М?|Г?М?|Г?М?|Г?М?|Г?М?|Ж?|Ж?М?|Ж?М?|Ж?М?|Ж?М?|Ж?М?)/", 'o', $text);
		$text = preg_replace("/(Г |Г |б ?|б ?|Е?|Ж?|б ?|б ?|б ?|б ?|б ?)/", 'u', $text);
		$text = preg_replace("/(uМ?|uМ?|uМ?|uМ?|uМ?|Ж?|Ж?М?|Ж?М?|Ж?М?|Ж?М?|Ж?М?)/", 'u', $text);
		$text = preg_replace("/(б ?|Г |б ?|б ?|б  )/", 'y', $text);
		$text = preg_replace("/(Д?)/", 'd', $text);
		$text = preg_replace("/(yМ?|yМ?|yМ?|yМ?|yМ?)/", 'y', $text);
		$text = preg_replace("/(Д?)/", 'd', $text);
		$text = preg_replace("/(Г?|Г?|б ?|б ?|Г?|Г?|б ?|б ?|б ?|б Ё|б ?|Д?|б ?|б ?|б ?|б ?|б ?)/", 'A', $text);$text = preg_replace("/(AМ?|AМ?|AМ?|AМ?|AМ?|Г?|Г?М?|Г?М?|Г?М?|Г?М?|Г?М?|Д?|Д?М?|Д?М?|Д?М|Д?М?|Д?М?)/", 'A', $text);
		$text = preg_replace("/(Г?|Г?|б ё|б  |б  |Г?|б ?|б  |б ?|б ?|б ?)/", 'E', $text);$text = preg_replace("/(EМ?|EМ?|EМ?|EМ?|EМ?|Г?|Г?М?|Г?М?|Г?М?|Г?М?|Г?М?)/", 'E', $text);
		$text = preg_replace("/(Г?|Г?|б ?|б ?|ДЁ)/", 'I', $text);$text = preg_replace("/(IМ?|IМ?|IМ?|IМ?|IМ?)/", 'I', $text);
		$text = preg_replace("/(Г?|Г?|б ?|б ?|Г?|Г?|б ?|б ?|б ?|б ?|б ?|Ж?|б ?|б ?|б ?|б ?|б ?)/", 'O', $text);$text = preg_replace("/(OМ?|OМ?|OМ?|OМ?|OМ?|Г?|Г?М?|Г?М?|Г?М?|Г?М?|Г?М?|Ж?|Ж?М?|Ж?М?|Ж?М?|Ж?М?|Ж?М?)/", 'O', $text);
		$text = preg_replace("/(Г?|Г?|б ?|б ?|ЕЁ|Ж?|б ?|б Ё|б ?|б ?|б ?)/", 'U', $text);$text = preg_replace("/(UМ?|UМ?|UМ?|UМ?|UМ?|Ж?|Ж?М?|Ж?М?|Ж?М?|Ж?М?|Ж?М?)/", 'U', $text);
		$text = preg_replace("/(б ?|Г?|б ?|б ?|б ё)/", 'Y', $text);$text = preg_replace("/(Д?)/", 'D', $text);
		$text = preg_replace("/(YМ?|YМ?|YМ?|YМ?|YМ?)/", 'Y', $text);$text = preg_replace("/(Д)/", 'D', $text);
		$text=strtolower($text);
		return $text;
	}

	public static function isloggedin(){
		if(isset($_SESSION["user"])) return true;
		else return false;
	}

	public static function checkin($str){
		if (function_exists('iconv')) {
			$str = iconv("UTF-8", "UTF-8", $str);
		}
		$str = preg_replace('#(\.|\?|!|\(|\)){3,}#', '\1\1\1', $str);
		$str = nl2br($str);
		$str = preg_replace('!\p{C}!u', '', $str);$str = str_replace('<br/>', "\n", $str);
		$str = preg_replace('# {2,}#', ' ', $str);$str = preg_replace("/(\n)+(\n)/i", "\n\n", $str);
		return trim($str);
	}

	public static function check($str){
		$str = htmlentities(trim($str), ENT_QUOTES, 'UTF-8');
		$str = nl2br($str);
		$str = strtr($str, array(
		chr(0) => '',
		chr(1) => '',
		chr(2) => '',
		chr(3) => '',
		chr(4) => '',
		chr(5) => '',
		chr(6) => '',
		chr(7) => '',
		chr(8) => '',
		chr(9) => '',
		chr(10) => '',
		chr(11) => '',
		chr(12) => '',
		chr(13) => '',
		chr(14) => '',
		chr(15) => '',
		chr(16) => '',
		chr(17) => '',
		chr(18) => '',
		chr(19) => '',
		chr(20) => '',
		chr(21) => '',
		chr(22) => '',
		chr(23) => '',
		chr(24) => '',
		chr(25) => '',
		chr(26) => '',
		chr(27) => '',
		chr(28) => '',
		chr(29) => '',
		chr(30) => '',
		chr(31) => ''
		));
		$str = str_replace("'", "&#39;", $str);
		$str = str_replace('\\', "&#92;", $str);
		$str = str_replace("|", "I", $str);
		$str = str_replace("||", "I", $str);
		$str = str_replace("/\\\$/", "&#36;", $str);
		$str = mysql_real_escape_string($str);
		return $str;
	}

	public static function checkout($str, $br = 0, $tags = 0){
		$str = htmlentities(trim($str), ENT_QUOTES, 'UTF-8');
		if($br == 1){
			$str = nl2br($str);
		} elseif ($br == 2) {
			$str = str_replace("\r\n", ' ', $str);
		}

		if ($tags == 1) {
			$str = bbcode::tags($str);
		} elseif ($tags == 2) {
			$str = bbcode::notags($str);
		}

		if ($threads == 1) {
			$str = bbcode::threads($str);
		} elseif ($threads == 2) {
			$str = bbcode::comrade($str);
		}

		$replace = array(
		chr(0) => '',
		chr(1) => '',
		chr(2) => '',
		chr(3) => '',
		chr(4) => '',
		chr(5) => '',
		chr(6) => '',
		chr(7) => '',
		chr(8) => '',
		chr(9) => '',
		chr(11) => '',
		chr(12) => '',
		chr(13) => '',
		chr(14) => '',
		chr(15) => '',
		chr(16) => '',
		chr(17) => '',
		chr(18) => '',
		chr(19) => '',
		chr(20) => '',
		chr(21) => '',
		chr(22) => '',
		chr(23) => '',
		chr(24) => '',
		chr(25) => '',
		chr(26) => '',
		chr(27) => '',
		chr(28) => '',
		chr(29) => '',
		chr(30) => '',
		chr(31) => ''
		);
		return strtr($str, $replace);
	}

	public static function cleaninput($string){
		$string = mysqli_real_escape_string(string);
		return $string;
	}

	public function cleanoutput($string){
		$string=strip_tags($string);
		//$string=preg_replace("/[!#$%^&*<>+=]/", ' ', $string);
		//$string=str_replace('"', ' ', $string);
		$string=htmlentities($string, ENT_QUOTES);
		return $string;
	}

	public static function user_info($user, $field){
		//echo"$user and $field success";
		$query=mysqli_query("SELECT $field FROM users WHERE username='$user'");
		$info=mysqli_fetch_array($query);
		$info=$info[$field];
		return $info;
	}

	public static function user_info2($uid, $field){
		//echo"$user and $field success";
		$query2=mysqli_query("SELECT $field FROM users WHERE userID=$uid") or mysql_error();
		//echo"$field<br/>";
		$info=@mysqli_fetch_array($query2);
		//print_r($info);
		$info=$info[$field];
		return $info;
	}

	function ago($timestamp){
		$difference=time()-$timestamp;
		$periods=array("second","minute","hour","day","week","month","years","decade");
		$lengths=array("60","60","24","7","4.35","12","10");
		for ($j = 0; $difference >= $lengths; $j ++) { 
			$difference/=$lengths[$j];
			$difference=round($difference);
		}
		if($difference!=1)
		$periods[$j].="s";
		$text="$difference $periods[$j] ago";
		return $text;
	}

	public static function updateguest(){
		$guestip=$_SERVER["REMOTE_ADDR"];
		$guestbrowser=$_SERVER["HTTP_USER_AGENT"];
		$query = mysqli_query("SELECT * FROM `guestsonline` WHERE `guestip`='$guestip' AND `browser`='$guestbrowser'");

		if (mysql_query(query)) {
			# code...
		}

	}







}
?>