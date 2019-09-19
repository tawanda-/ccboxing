<?php
    class OrderItem{
        var $order_item_id;
        var $order_id;
        var $product;
        var $quantity;

        public function __constructor(){

        }

        public function set_product($product_id){
            $a_product = new Product();
            $a_product->get_product($product_id);
            $this->product = $a_product;
        }

        public function get_order_item($order_id){

            $db_conn = get_db_connection();
            $sql = $db_conn->prepare("SELECT * FROM `order_item` WHERE `order_id` = ?");

            if ($stmt->execute(array($order_id))) {
                $row = $stmt->fetch();
                $this->order_id = $row["order_id"];
                $this->set_customer($row["username"]);
                $this->timestamp = $row["surname"];
            }
        }
    }
?>