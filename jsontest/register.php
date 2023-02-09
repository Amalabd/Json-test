<?php

class register{

private $username;
private $password;

public $success;
public $fail;
private $storage = "uss.jsonc";
private $stored_users; //array
private $new_user; //array -- that will hold the username and the hashed password.


//// ****==== 1- 
public function __construct($username,$password){
 $this->username = filter_var(trim($username), FILTER_SANITIZE_STRING);
 

 $this->password = filter_var(trim($password), FILTER_SANITIZE_STRING);
 $this->stored_users = json_decode(file_get_contents($this->storage), true);

 $this->new_user = [
    "username" => $this->username,
    "password" => $this->password,
 ];



}


    




// *****===== 4- will record the user in the JSON file
private function insertUser(){

    if(file_put_contents($this->storage, json_encode($this->stored_users))){
        return $this->success = "Well Done!";
    }else{
        return $this->fail = "Try Again!";
    }
}
    
}




//https://digitalfox-tutorials.com/tutorial.php?title=Register-and-login-application-with-php-and-json//
// https://www.youtube.com/watch?v=0Nw1GvtmblY //


?>