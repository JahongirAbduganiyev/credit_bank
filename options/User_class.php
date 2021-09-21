<?php
    namespace options;

    class User{
        
        public $filial_kodi = '';
        public $user_name = '';
        public $user_id = '';

        function __construct(){
            include __DIR__.'/../pages/session.php';

            $this->filial_kodi = $filial_kodi;
            $this->user_name = $user_name;
            $this->user_id = $user_id;
        }
    }

?>