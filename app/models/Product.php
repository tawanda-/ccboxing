<?php

    include 'Category.php';

    class product {
        var $product_id;
        var $category;
        var $name;
        var $description;
        var $price;
        var $stock;
        private $db_conn;

        public function __constructor(){

        }

        public function get_product($product_id){
            $this->product_db_query($product_id);
        }

        public function get_all_products(){

        }

        private function product_db_query($product_id){
            $db_conn = get_db_connection();
            $sql = $db_conn->prepare("SELECT * FROM `product` WHERE `product_id` = ?");

            if ($stmt->execute(array($staffid))) {
                $row = $stmt->fetch();
                $this->product_id = $row["product_id"];
                $this->category = $this->set_category($row["category"]);
                $this->name = $row["name"];
                $this->description = $row["description"];
                $this->price = $row["price"];
                $this->stock = $row["stock"];
            }
        }

        private function set_category($category_id){

            $a_category = new Category();
            $a_category->get_category($category_id);
            $this->category = $a_category;
        }
    }
?>