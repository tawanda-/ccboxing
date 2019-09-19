<?php
    class Order{
        var $order_id;
        var $customer;
        var $items;
        var $timestamp;

        public function __constructor(){}
        
        public function get_order($order_id){
            $this->query_db_order($order_id);
        }

        public function get_customer_orders($customer_id){

        }

        private function query_db_order($order_id){

            $db_conn = get_db_connection();
            $sql = $db_conn->prepare("SELECT * FROM `order` WHERE `order_id` = ?");

            if ($stmt->execute(array($order_id))) {
                $row = $stmt->fetch();
                $this->order_id = $row["order_id"];
                $this->set_customer($row["username"]);
                $this->timestamp = $row["surname"];
            }
        }

        private function set_customer($customer_id){
            $a_customer = new Customer();
            $a_customer->get_customer($customer_id);
            $this->customer = $a_customer;
        }
    }
    //TODO update class
?>