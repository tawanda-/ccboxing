<?php

    require_once(dirname(__DIR__)."/config/db.php");

    class StaffDao{

        public $result;

        public function __constructor(){

        }

        public function get_staff($staff_id){
            $this->staff_db_query($staff_id);
        }

        public function get_all_staff(){
            $this->staff_db_query();
        }

        private function staff_db_query($staff_id=null){

            $db_conn = get_db_connection();

            if(is_null($staff_id)){

                $stmt = $db_conn->prepare("
                    SELECT * FROM staff
                ");
                
                if ($stmt->execute()) {
                    $this->result = $stmt->fetchAll();
                }
            }else{
                
                $stmt = $db_conn->prepare("
                    SELECT * FROM product AS staff
                    WHERE staff_id = ?
                ");

                if ($stmt->execute(array($product_id))) {
                    $this->result = $stmt->fetch();
                }
            }
        }
    }
?>