<?php

class register{

private $username;
private $password;
private $secretpass;
public $success;
public $fail;
private $storage = "uss.jsonc";
private $stored_users; //array
private $new_user; //array -- that will hold the username and the hashed password.


//// ****==== 1- 
public function __construct($username,$password){
    /* I use trim fun here to remove any white spaces ++ to validate data I use filter_var function, 
    It takes two pieces of data(The variable I want to check + The variable I want to check )
    FILTER_SANITIZE_STRING -->to remove all HTML tags from a string  */
 $this->username = filter_var(trim($username), FILTER_SANITIZE_STRING);
 $this->password = filter_var(trim($password), FILTER_SANITIZE_STRING);
 $this->secretpass = password_hash($this->password, PASSWORD_DEFAULT); // password_hash to encrypt the password

/* I use file_get_contents() function which is the preferred way to read the contents of a file into a string
The keyword true tells the function to return the data as an array. If we omit it the function returns an object. */
 $this->stored_users = json_decode(file_get_contents($this->storage), true); 

 $this->new_user = [
    "username" => $this->username,
    "password" => $this->secretpass,
 ];

 if($this->checkFieldValues()){
    
    $this->insertUser();
 }

}

// *****===== 2- to validate that the username and password input fields are not empty
private function checkFieldValues(){
if(empty($this->username) || empty($this->password)){
    $this->fail = "Field is required";
    return false;
}else{
    return true;
}
    
}

// *****===== 3- will loop through all stored users to check that username is not already in use. 
private function usernameExists(){
    foreach($this->stored_users as $user){
        if($this->username == $user['username']){
            $this->fail = "User Name already exist";
            return true;
        }
    }

   return false; 
}

// *****===== 4- will record the user in the JSON file
private function insertUser(){
if($this->usernameExists() == FALSE){
    array_push($this->stored_users, $this->new_user);
    if(file_put_contents($this->storage, json_encode($this->stored_users))){
        return $this->success = "Well Done!";
    }else{
        return $this->fail = "Try Again!";
    }
}
    
}

}


//https://digitalfox-tutorials.com/tutorial.php?title=Register-and-login-application-with-php-and-json//
// https://www.youtube.com/watch?v=0Nw1GvtmblY //


?>