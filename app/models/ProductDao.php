<?php

    require_once(dirname(__DIR__)."/config/db.php");

    class ProductDAO{

        public $result;

        public function __constructor(){

        }

        public function get_product($product_id){
            $this->product_db_query($product_id);
        }

        public function get_all_products(){
            $this->product_db_query();
        }

        public function get_product_by_category($category_id){
            $this->get_product_by_category_from_db($category_id);
        }

        public function get_comments($product_id){
            return $this->comment_query_db($product_id);
        }

        public function add_comment($product_id, $customer_id, $comment){

            $this->get_product($product_id);

            if(isset($this->result) && count($this->result) > 0){
                return $this->comment_add_db($product_id, $customer_id, $comment);
            }else{
                return;
            }
        }

        private function product_db_query($product_id=null){

            $db_conn = get_db_connection();

            if(is_null($product_id)){

                $stmt = $db_conn->prepare("
                    SELECT * FROM product
                    INNER JOIN category on product.category_id = category.category_id
                ");
                
                if ($stmt->execute()) {
                    $this->result = $stmt->fetchAll();
                }
            }else{
                
                $stmt = $db_conn->prepare("
                    SELECT * FROM product AS product
                    INNER JOIN category AS category on product.category_id = category.category_id
                    WHERE product_id = ?
                ");

                if ($stmt->execute(array($product_id))) {
                    $this->result = $stmt->fetch();
                }
            }
        }

        private function get_product_by_category_from_db($category_id){
            
            $db_conn = get_db_connection();

            if(is_null($category_id)){
                $this->result = [];
            }else{

                $stmt = $db_conn->prepare(" SELECT * FROM `product` WHERE `category_id` =? ");
                
                if ($stmt->execute( array($category_id) )) {
                    $this->result = $stmt->fetchAll();
                }
            }
        }

        private function comment_query_db($product_id){

            $db_conn = get_db_connection();

            $stmt = $db_conn->prepare("
                    SELECT * FROM comment AS cmt 
                    INNER JOIN customer AS cust on cmt.customer_id = cust.customer_id 
                    WHERE product_id = ?
                ");

            if ($stmt->execute(array($product_id))) {
                return $stmt->fetchAll();
            }else{
                return [];
            }
        }

        private function comment_add_db($product_id, $customer_id, $comment){

            $db_conn = get_db_connection();

            $data = [
                $product_id, $customer_id, $comment
            ];

            $sql = "INSERT INTO comment (`product_id`, `customer_id`, `comment`) VALUES (?,?,?)";

            $stmt= $db_conn->prepare($sql);
            
            $stmt->execute($data);

            return;
        }
    }
?>