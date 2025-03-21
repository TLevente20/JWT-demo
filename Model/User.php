<?php
require_once __DIR__ .  "/../Config/config.php";


class User{

    private $id;
    private $username;
    private $email;
    private $password;

    public function __construct($username,  $email,  $password)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }
    public function getId() {return $this->id;}

	public function getUsername() {return $this->username;}

	public function getEmail() {return $this->email;}

	public function getPassword() {return $this->password;}

	public function setId( $id): void {$this->id = $id;}

	public function setUsername( $username): void {$this->username = $username;}

	public function setEmail( $email): void {$this->email = $email;}

	public function setPassword( $password): void {$this->password = $password;}

	

    static function login($email){
        try{
            $mysqli = Config::startConnection();

            $sql = "SELECT * FROM `users` WHERE email  = '$email';";
            $result = $mysqli->query($sql);
            $resultArray = $result->fetch_assoc();

            return $resultArray["password"];
        }catch(Exception $error){
            echo $error->getMessage();
            return false;
        }
        
    }

    static function register(User $user){
        try{

            $mysqli = Config::startConnection();
            $username = $user->getUsername();
            $email = $user->getEmail();
            $password = $user->getPassword();
            $sql = "INSERT INTO users VALUES (NULL, '$username', '$email', '$password');";
            $mysqli->query($sql);

            return true;
        }catch(Exception $error){
            echo $error->getMessage();
            return false;
        }
        
    }

}
