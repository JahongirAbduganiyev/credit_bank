<?php
    namespace options;


    use options\Ajax;

    class Script extends Ajax{

        public static function show($page){
                self::$page();
        }

        public function haridor(){
            ?>
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
                </script>
            <?php
        }

        public function haridorlar(){

            echo "haridorlar";
            ?>
                <script type="text/javascript">
                    // $(document).ready(function(){
                    //     $(document).on('click', '#tolovButton', function(e){
                    //         e.preventDefault;
                    //         const form = $('#tolov').serializeArray();
                    //         // form.forEach(element => {
                    //             // console.log(JSON.stringify(form));
                    //         // });
                    //         $.ajax({
                    //             url:"#",
                    //             type:"POST",
                    //             datatype:"JSON",
                    //             data:{'data':form, 'type': 'ajax'},
                    //             success:function(val){
                    //                 var obj = JSON.parse(val);
                    //                 console.log(obj);
                    //             }
                    //         })
                    //     });
                    // });
                </script>
            <?php
        }

        public function tolovstatus(){
            ?>
                <script type="text/javascript">
                    $(document).ready(function(){
                        $(document).on('click', '.checkall', function(e){
                            if(this.checked){
                                $('.checkrow').each(function(e){
                                    this.checked = true
                                    console.log(this.id);
                                });
                            }else{
                                $('.checkrow').each(function(e){
                                    this.checked = false
                                    console.log(this.id);
                                });
                            }
                        });

                        $(document).on('click', '#checkbutton', function(e){
                            // if(this.checked){
                            //     $('.checkrow').each(function(e){
                            //         this.checked = true
                            //         console.log(this.id);
                            //     });
                            // }else{
                            //     $('.checkrow').each(function(e){
                            //         this.checked = false
                            //         console.log(this.id);
                            //     });
                            // }
                            // $('.checkrow').each(function(e){
                            //     // this.checked = true
                            //     if(this.checked){
                            //         console.log(this.id);
                            //     }
                            // });
                        });
                        $(document).on('click', '.checkrow', function(e){
                            let status = 0;
                            let id = this.id.split("_");
                            id = id[1];

                            $('.checkrow').each(function(e){
                                if(this.checked){
                                    status++;
                                }
                            });

                            $('.checkrow').each(function(e){
                                if(status > 1){
                                    $('.add').removeAttr('href');
                                    $('.delete').removeAttr('href');   
                                }
                            });

                            $('.checkrow').each(function(e){
                                let id = this.id.split("_");
                                id = id[1];
                                
                                if(this.checked){
                                    $('.add_'+id).attr('href',"?a=tolovstatus&type=add&tranzak_id="+id);
                                    $('.delete_'+id).attr('href',"?a=tolovstatus&type=delete&tranzak_id="+id);   
                                }else{
                                    ('.add').removeAttr('href');
                                    $('.delete').removeAttr('href'); 
                                }
                                return 0;
                            });

                            if(this.checked){
                                $('.add_'+id).attr('href',"?a=tolovstatus&type=add&tranzak_id="+id);
                                $('.delete_'+id).attr('href',"?a=tolovstatus&type=delete&tranzak_id="+id);
                            }else{
                                $('.add_'+id).removeAttr('href');
                                $('.delete_'+id).removeAttr('href');
                            }


                        });
                    });
                </script>
            <?php
        }
    }
?>


