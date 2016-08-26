<?php

if($_COOKIE['usernk']==null){
echo "<script>alert('admin이 아닙니다.')</script>";
        echo "<script>location.href='../index.php';</script>";
        exit();
} else{
$sec = $_COOKIE['usernk'];
$check_fake = base64_decode(base64_decode(base64_decode(base64_decode($sec))));
$usernk1 = explode('=',$check_fake);
$usernk = $usernk1[1];
if ($usernk != "admin"){
echo "<script>alert('admin이 아닙니다.')</script>";
echo "<script>location.href='../index.php';</script>";
        exit();
}
}

$uri= $_SERVER['REQUEST_URI']; //uri를 구합니다.

/*
if ($result == false){
	echo "<script>location.href='../notfound.html';</script>";
	exit();
} else{
	echo "<script>location.href='../stage3.php';</script>";
	exit();
}*/

function sub_0802312() {
        echo "Stage 2 clear!!";
        echo "</br>";
        echo "stage3.php";
	$file_handle1 = fopen("stage3.php", "r");
	echo "<pre>";
	while (!feof($file_handle1)) {

	$line_of_text = str_replace("<?php","<<",fgets($file_handle1));
	echo $line_of_text . "";

	}	
	echo "</pre>";

	echo "test123.php";
	$file_handle2 = fopen("test123.php", "r");
	echo "<pre>";
	while (!feof($file_handle2)) {

	$line_of_text = str_replace("<?php","<<",fgets($file_handle2));
	echo $line_of_text . "";

	}	
	echo "</pre>";
}

function niceSize($b) {
	$si = array(" bytes", " KB", " MB", " GB", " TB", " PB", " EB", " ZB", " YB");
	return $b>1024 ? round($b/pow(1024, ($i = floor(log($b, 1024)))), 2) . $si[$i]." ($b bytes)" : $b.' bytes';
}

if (empty($_GET['sha1'])) die("sha1 is required to get file info");
if(preg_match("/\.\.|\//",$_GET['sha1'])) die("no hack!!!");
$sha1 = trim($_GET['sha1']);
$key = $_GET['key'];

if(md5($key)=='0e572091431906509826762988736854'&(strlen($key)>=10))
{
        $sha1();
        echo "여기부터 내일 개발할게요 ㅎㅎㅎㅎ";
}
if (!file_exists($sha1)) die("no file found for this sha1 hash");
if (!is_readable($sha1)) die("cannot read file data!");
$fsize = niceSize(filesize($sha1));
$fctime = gmdate("F d Y H:i:s",filectime($sha1))." GMT";
if (!is_readable($sha1)) die("cannot read file info!");

readfile('head.html');

echo "<ul>";
echo "<li>SIZE: $fsize</li>";
echo "<li>TIME: $fctime</li>";
echo "<li>SHA1: $sha1</li>";

@ob_flush();@flush(); // big files might be take a while md5
if ($md5=md5_file($sha1)) echo "<li>MD5: $md5</li>";
echo "<ul>";

readfile('foot.html');