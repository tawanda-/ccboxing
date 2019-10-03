<?php

    require_once(dirname(__DIR__)."/config/db.php");

    class CustomerDao{

        public $result;
        public $error_message;

        public function __constructor(){}

        public function get_customer($customer_id, $password=null){
            if(is_null()){
                $this->query_db_customer($customer_id);
            }else{
                $this->query_db_customer($customer_id, $password);
            }        
        }

        public function get_all_customers(){
            $this->query_db_customer();
        }

        public function create_customer( $customer ){

            $db_conn = get_db_connection();
    
            if( $customer["username"] === "" || $customer["email"] === "" || $customer["password"] === ""){
                $this->error_message = "Please add the missing fields";
            }else{

                $sql = $db_conn->prepare("SELECT * FROM `customer` WHERE `customer_username` = ?");

                $username = $customer["username"];

                if ($sql->execute( array( $username  ))) {
                    $res= $sql->fetch();
                    if($res['customer_username'] === $customer["username"]){
                        $this->error_message = "Oops someone has already selected that username please try another one.";
                    }
                }

                $email = $customer["email"];
                $sql = $db_conn->prepare("SELECT * FROM `customer` WHERE `customer_email` = ?");

                if ($sql->execute(array($email))) {
                    $res= $sql->fetch();
                    if($res['customer_email'] === $customer["email"]){
                        $this->error_message = "Email already exists please try another one or use reset password.";
                    }
                }

                if(!isset($this->error_message)){

                    $passwd = $customer['password'];

                    $password =  password_hash($passwd, PASSWORD_DEFAULT);

                    $data = [
                        $customer['username'],$customer['name'],$customer['surname'],$customer['email'],$password,
                    ];

                    $sql = "INSERT INTO customer (`customer_username`, `customer_name`, `customer_surname`, `customer_email`, `password`) VALUES (?,?,?,?,?)";

                    $stmt= $db_conn->prepare($sql);
                    
                    if($stmt->execute($data)){

                    }else{
                        $this->error_message = "Something went wrong please try again";
                    }
                }
            }
        }

        private function query_db_customer( $customer_id = null, $password = null ) {

            $db_conn = get_db_connection();

            if(is_null($customer_id)){

                $stmt = $db_conn->prepare("SELECT * FROM `customer`");
                
                if ($stmt->execute()) {
                    $this->result = $stmt->fetchAll();
                }

            }else{

                $sql = $db_conn->prepare("SELECT * FROM `customer` WHERE `customer_id` = ?");

                if ($stmt->execute(array($customer_id))) {
                    $this->result = $stmt->fetch();
                }
            }
        }
    }
?>