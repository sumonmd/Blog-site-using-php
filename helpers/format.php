<?php 
/*

format class

*/
class Format{
	public function dateformat($date){
		return date('F j, Y, g:i a',strtotime($date));
	}
	public function textshorten($text,$limit=300){
		$text=$text." ";
		$text=substr($text,0,$limit);
		$text=substr($text,0,strrpos($text,' '));
		$text=$text."....";
		return $text;

	}
	public function validate($data){
		$data=trim($data);
		$data=stripcslashes($data);
		$data=htmlspecialchars($data);
		return $data;

	}
	public function title(){
		$path=$_SERVER['SCRIPT_FILENAME'];
		$title=basename($path,'.php');
		if($title=='index'){
			$title='Home';
		}
		else if($title=="contact"){
			$title="Contact";
		}
		return $title=ucfirst($title);
	}
}
