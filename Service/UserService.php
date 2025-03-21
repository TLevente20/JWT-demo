<?php

require_once __DIR__ .  "/../Model/User.php";

class UserService{

    static function login($email, $password){

        $hashedPassword = User::login($email);

        if($hashedPassword){
            if(password_verify($password,$hashedPassword)){
                
                return [
                    "status" => "success",
                    "statusCode" => 200,
                    "message" => "Login Successfull"
                ];
            }else{
                return [
                    "status" => "error",
                    "statusCode" => 417,
                    "message" => "Invalid Password"
                ];
            }

        }else{
            return [
                "status" => "error",
                "statusCode" => 417,
                "message" => "Invalid Email"
            ];
        }
    }

    static function register(User $user){

        $hashedUser = new User(
            $user->getUsername(),
            $user->getEmail(),
            password_hash($user->getPassword(), PASSWORD_DEFAULT)
        );
        $modelResult = User::register($hashedUser);
        if($modelResult){
            return [
                "status" => "success",
                    "statusCode" => 200,
                    "message" => "Register Successfull"
            ];
        }else{
            return [
                "status" => "error",
                "statusCode" => 417,
                "message" => "Invalid Email"
            ];
        }
    }
}