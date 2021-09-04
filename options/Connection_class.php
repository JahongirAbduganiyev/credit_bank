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

        public function autocommit($boolen){
            $this->db->autocommit($boolen);
        }

        public function setArray($query){
            
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

    }

?>