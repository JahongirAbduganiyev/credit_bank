<?php
    namespace options;


    use options\Ajax;

    class Script extends Ajax{

        public static function show($page){
                self::$page();
        }

        public function haridor(){
            ?>
<<<<<<< HEAD
                <script>
                    //alert("Salom")
=======
                <script type="text/javascript">
                    $(document).ready(function(){
                        // $(document).on('click', '#tolovButton', function(e){
                        //     e.preventDefault;
                        //     const form = $('#tolov').serializeArray();
                        //     // form.forEach(element => {
                        //         // console.log(JSON.stringify(form));
                        //     // });
                        //     $.ajax({
                        //         url:"options/Ajax_class.php",
                        //         type:"POST",
                        //         datatype:"JSON",
                        //         data:{'data':form, 'type': 'ajax','page': 'haridor'},
                        //         success:function(val){
                        //             // var obj = JSON.parse(val);
                        //             // let k = (obj.data[0]);
                        //             // console.log(k.value);
                        //             console.log(val);
                        //         }
                        //     })
                        // });
                    });
>>>>>>> edc623041de40540d7120e036d13bf8435cd0ae6
                </script>
            <?php
        }

        public function haridorlar(){

            echo "haridorlar";
            ?>
                <!-- <script type="text/javascript">
                    $(document).ready(function(){
                        $(document).on('click', '#tolovButton', function(e){
                            e.preventDefault;
                            const form = $('#tolov').serializeArray();
                            // form.forEach(element => {
                                // console.log(JSON.stringify(form));
                            // });
                            $.ajax({
                                url:"#",
                                type:"POST",
                                datatype:"JSON",
                                data:{'data':form, 'type': 'ajax'},
                                success:function(val){
                                    var obj = JSON.parse(val);
                                    console.log(obj);
                                }
                            })
                        });
                    });
                </script> -->
            <?php
        }

        public function tolov(){

            echo "tolov";
            ?>
                <!-- <script type="text/javascript">
                    $(document).ready(function(){
                        $(document).on('click', '#tolovButton', function(e){
                            e.preventDefault;
                            const form = $('#tolov').serializeArray();
                            // form.forEach(element => {
                                // console.log(JSON.stringify(form));
                            // });
                            $.ajax({
                                url:"#",
                                type:"POST",
                                datatype:"JSON",
                                data:{'data':form, 'type': 'ajax'},
                                success:function(val){
                                    var obj = JSON.parse(val);
                                    console.log(obj);
                                }
                            })
                        });
                    });
                </script> -->
            <?php
        }
    }
?>


