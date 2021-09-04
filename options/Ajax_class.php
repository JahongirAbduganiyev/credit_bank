<?php

    namespace options;

    /**
     * Ajax so'rovlarni ushlab olish uchun
     *  @return boolen
     */

    class Ajax{

        protected static $script;

        public function getAjax(){
            self::$script = $_REQUEST;
            return self::$script;
        }
    }

?>