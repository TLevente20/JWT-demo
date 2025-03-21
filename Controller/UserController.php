<?php 

require_once __DIR__ .  "/../Service/UserService.php";

class UserController{

    static function login(){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $result = UserService::login($email, $password);

        http_response_code($result["statusCode"]);
        echo json_encode($result);
    }

    static function register(){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];


        $user = new User($username,$email,$password);

        $result = UserService::register($user);

        http_response_code($result["statusCode"]);
        var_dump($result);
        echo json_encode($result);
    }
}