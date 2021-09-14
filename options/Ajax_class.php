<?php

    namespace options;
    use options\Connection;

    /**
     * Ajax so'rovlarni ushlab olish uchun
     *  @return boolen
     */

    class Ajax{

        protected static $request;

        function __construct()
        {
            self::$request = $_REQUEST;
        }

 
        public function getAjax(){
            return self::$request;
        }

        public static function request(){

            if(isset($_REQUEST['page']) && $_REQUEST['type'] == 'ajax'){

                $page = $_REQUEST['page'];
                self::$page();
            }
            
        }

        public function haridorlar(){
            $db = new \mysqli('localhost','root','','credit');
            $client_id = $_REQUEST['data'];
            $dbc = $db->query("SELECT * FROM client WHERE id = {$client_id}");
            $client_credit = $db->query("SELECT * FROM credit_tani WHERE client_id = {$client_id}");
            $client_foiz = $db->query("SELECT * FROM credit_foiz WHERE client_id = {$client_id}");
            
            $dbc = $dbc->fetch_array();
            $credit = [];
            while($row = $client_credit->fetch_array()){
                array_push($credit, $row);
            }

            $client_foiz = $client_foiz->fetch_array();

            echo json_encode([
                'client' => $dbc,
                'credit' => $credit,
                'foiz' => $client_foiz
            ]);
        }


    }

    Ajax::request();

?>