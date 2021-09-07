<?php

    namespace options;
    use options\Connection;

    /**
     * Ajax so'rovlarni ushlab olish uchun
     *  @return boolen
     */

    class Ajax{

        public $db;
        protected static $request;

        function __construct()
        {
            // $this->db = new \mysqli('localhost','root','','credit');
            self::$request = $_REQUEST;
        }

        private function setArray($query){
            
            if($query->num_rows == 1){
                return $query->fetch_assoc();
            }

            $array =[];
            $i = 0;
            while($row = $query->fetch_assoc()){
                $array[$i] = $row;
                $i++;
            }

            return $array;
        }

        public function query($query){

            $query = $this->db->query($query)or die("So`rovda xatolik: ".$this->db->error);

			if(is_bool($query) && $query){
				return $query;
			}

			return $this->setArray($query);
        }

        public function getAjax(){
            return self::$request;
            // return "salom";
        }

        public static function request(){

            if(isset($_REQUEST['page']) && $_REQUEST['type'] == 'ajax'){

                $page = $_REQUEST['page'];
                self::$page();
                
            }
            
        }

        public function haridor(){
            // $db = new \mysqli('localhost','root','','credit');
            // $client_id = $_REQUEST['data'][1]['value'];
            // $dbc = $db->query("SELECT * FROM client WHERE id = {$client_id}");
            // // $res = $db->query("SELECT * FROM client WHERE id = {$client_id}");
            // // echo json_encode($res);
            // // print_r($_REQUEST['data'][1]['value']);
            // print_r($dbc);

            return $this->getAjax();

        }


    }

    // Ajax::request();

?>