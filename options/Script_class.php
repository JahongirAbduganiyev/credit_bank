<?php
    namespace options;


    use options\Ajax;

    class Script extends Ajax{


        public static function show(){
            ?>
                <script type="text/javascript">
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
                                data:{'data':form},
                                success:function(val){
                                    var obj = JSON.parse(val);
                                    console.log(obj);
                                }
                            })
                        });
                    });
                </script>
            <?php
        }
    }
?>


