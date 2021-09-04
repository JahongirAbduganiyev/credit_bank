<?php

    namespace options;

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
    }

?>