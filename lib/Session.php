<?php
/*
   Session Class
*/
   class Session{
   	public static function init(){
   		session_start();
   	} 
   	public static function set($key,$value){
   		$_SESSION[$key]=$value;
   	}
   	public static function get($key){
   		if(isset($_SESSION[$key])){
   			return $_SESSION[$key];
   		}
   		else{
   			return false;
   		}
   	}
   	public static function Checksession(){
         self::init();
         if(self::get('login')==false){
            self::Destroy();
         }
      }
      public static function CheckLogin(){
   		self::init();
   		if(self::get('login')==true){
   			header("Location:index.php");
   		}
   	}
   	public static function Destroy(){
   		session_destroy();
   		header("Location:login.php");
   	}
   }
?>