<?php

    require_once(dirname(__DIR__)."/config/db.php");

    class Product {}

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
    }
?>