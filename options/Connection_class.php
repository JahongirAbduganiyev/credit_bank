<?php
    namespace options;

    /**
     * Dabasega ulanish uchun obyeckt
     *  @return boolen
     */

    class Connection{

        public $db;

        function __construct(){
            global $config;
            
            $this->db = new \mysqli($config['db']['host'], $config['db']['username'], $config['db']['password'], $config['db']['name']);
        }

        public function setArray($query){
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

    }

?>