<?php

    require_once(dirname(__DIR__)."/config/db.php");

    class CategoryDao{

        public $result;

        public function __constructor(){

        }

        public function get_category($category_id){
            $this->category_db_query($category_id);
        }

        public function get_all_categories(){
            $this->category_db_query();
        }

        private function category_db_query($category_id=null){

            if(is_null($category_id)){

                $stmt = $db_conn->prepare("SELECT * FROM category");
                
                if ($stmt->execute()) {
                    $this->result = $stmt->fetchAll();
                }

            }else{

                $stmt = $db_conn->prepare("
                    SELECT * FROM category WHERE category_id = ?
                ");

                if ($stmt->execute(array($category_id))) {
                    $this->result = $stmt->fetch();
                }
            }
        }
    }
?>