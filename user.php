<?php
	include "Crud.php";
	include "authenticator.php";
//	include_once 'DBConnector.php';
	include_once 'PDOConnector.php';
	
	class User implements Crud, Authenticator {
        private static $instance;

        protected $db;
        protected $data;

        private $userID;
		private $firstName;
		private $lastName;
		private $cityName;

//		For timezone details
        private $utc_timezone, $offset;

//		variables for the authenticator class
        private $username;
        private $password;

/*        Initialize values using the constructor
		member variables cannot be instantiated from elsewhere. They are private*/
		function __construct($firstName, $lastName, $cityName,
                             $username, $password,
                             $utc_timezone, $offset){
			$this->firstName = $firstName;
			$this->lastName = $lastName;
			$this->cityName = $cityName;
            $this->username = $username;
            $this->password = $password;
            $this->utc_timezone = $utc_timezone;
            $this->offset = $offset;

            $this->db = PDOConnector::instance();
		}

    /*
     * Static constructor
     */
    public static function create(){
        self::$instance = new self;
        return self::$instance;
    }

//        username setter
        public function setUsername($username){
            $this->username = $username;
        }
//        username getter
        public function getUsername(){
            return$this->username;
        }

//        password setter
        public function setPassword($password){
            $this->password = $password;
        }

//        password getter
        public function getPassword(){
            return $this->password;
        }

		public function setUserID($userID){
			$this->userID = $userID;
		}

		public function getUserID(){
			return $this->userID;
		}

		public function save(){
			$fn = $this->firstName;
			$ln = $this->lastName;
			$city = $this->cityName;
			$username = $this->username;
			$this->hashPasssword();
			$pass = $this->password;

			$utc_time = $this->utc_timezone;
			$off = $this->offset;

			$this->data = $this->db->run("INSERT INTO user
				(firstName, last_name, user_city, username, 
				password, utc_timezone, offset) 
				VALUES (?,?,?,?,?,?,?)",
                [$fn,$ln,$city, $username, $pass, $utc_time, $off]);
		}
        public function readAll()
        {
            $this->data = $this->db->run("SELECT * FROM user");
            while ($row = $this->data->fetch(PDO::FETCH_ASSOC))
            {
                $title = $row['title'];
                $body = $row['body'];
                echo "id: " . $row["id"]. " - First Name: " . $row["firstName"]. " - Last Name: " . $row["Lastname"].
                    " - City: " . $row["user_city"]."<br>";
            }
        }

        public function validateForm()
        {
            //Returns true if the values are not empty
            $fn = $this->firstName;
            $ln = $this->lastName;
            $city = $this->cityName;

            if($fn == "" || $ln == "" || $city == ""){
                return false;
            }
            return true;
        }

        public function createFormErrorSessions()
        {
            session_start();
            $_SESSION['form_errors'] = "All fields are required";
        }



        public function hashPasssword()
        {
//            in-built function password_hash hashes our password
            $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        }

        public function isPasswordCorrect()
        {
            $found = false;
            $this->data = $this->db->run("SELECT * FROM user");
            while($row=$this->data->fetch(PDO::FETCH_ASSOC)){
                if(password_verify($this->getPassword(), $row['password']) && $this->getUsername() == $row['username']){
                    $found = true;
                }
            }
            return $found;
        }

       public function login()
       {
           if($this->isPasswordCorrect()){
//                Correct password input. We have to load the protected page
               header("Location:private_page.php");
           }
       }

       public function createUserSession(){
           session_start();
           $_SESSION['username'] = $this->getUsername();
       }

       public function logout()
       {
           session_start();
           unset($_SESSION['username']);
           session_destroy();
           header("Location:register.php");
       }

       public function isUserExists(){
           $username = $this->username;
           $this->data = $this->db->run(
               "SELECT * FROM user WHERE username = '$username'");

           $row = $this->data->fetch(PDO::FETCH_ASSOC);

           if($row){
               return false;
           }else {
               return true;
           }
       }

    public function search()
    {
        // TODO: Implement search() method.
    }

    public function update()
    {
        // TODO: Implement update() method.
    }

    public function removeOne()
    {
        // TODO: Implement removeOne() method.
    }

    public function removeAll()
    {
        // TODO: Implement removeAll() method.
    }

    public function readUnique()
    {
        // TODO: Implement readUnique() method.
    }
}