<?php
    class Category{

        var $category_id;
        var $name;
        var $description;

        public function __constructor(){}

        public function get_category($category_id){
            $this->query_db_category($category_id);
        }

        public function get_all_categories(){

        }

        private function query_db_category($category_id = null){
            $db_conn = get_db_connection();
            $sql = $db_conn->prepare("SELECT * FROM `customer` WHERE `customer_id` = ?");

            if ($stmt->execute(array($staffid))) {
                $row = $stmt->fetch();
                $this->customer_id = $row["customer_id"];
                $this->username = $row["username"];
                $this->surname = $row["surname"];
                $this->phone = $row["phone"];
                $this->email = $row["email"];
                $this->password = $row["password"];
            }
        }
    }
?>