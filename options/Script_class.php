<?php
    namespace options;


    use options\Ajax;

    class Script extends Ajax{
        
        public static $page = '';

        public static function setPage($page){
            self::$page = $page;
        }

        public static function show($page){
            if(self::$page == $page){
                self::$page();
            }
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
            ?>
                <script type="text/javascript">
                    $(document).ready(function(){
                        $(document).on('click', 'button[name=client]', function(e){
                            e.preventDefault;
                            console.log(this.value);
                        });
                    });
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
                                    
                                    $('.add').removeAttr('href');
                                    $('.delete').removeAttr('href');
                                });

                                $('#checkbutton').removeAttr('disabled');
                                $('#deletebutton').removeAttr('disabled');
                            }else{
                                $('.checkrow').each(function(e){
                                    this.checked = false

                                    let id = this.id.split("_");
                                    id = id[1];
                                    $('.add_'+id).attr('href',"?a=tolovstatus&add=true&ids[]="+id);
                                    $('.delete_'+id).attr('href',"?a=tolovstatus&delete=true&ids[]="+id);
                                });

                                $('#checkbutton').attr('disabled','true');
                                $('#deletebutton').attr('disabled','true');
                            }
                        });

                        $(document).on('click', '#checkbutton', function(e){
                            $('.checkrow').each(function(){
                                let id = this.id.split("_");
                                id = id[1];
                                
                                if(this.checked){
                                    $('#tolovstatusform').append('<input type="hidden" name="ids[]" value="'+id+'">')
                                }
                            });
                        });

                        $(document).on('click', '#deletebutton', function(e){

                            $('.checkrow').each(function(){
                                let id = this.id.split("_");
                                id = id[1];
                                
                                if(this.checked){
                                    $('#tolovstatusform').append('<input type="hidden" name="ids[]" value="'+id+'">')
                                }
                            });
                            
                        });

                        $(document).on('click', '.checkrow', function(e){

                            let status = 0;
                            $('.checkrow').each(function(e){
                                if(this.checked){
                                    status++;
                                }
                            });

                            if(status == 0){
                                $('.checkrow').each(function(e){
                                    let id = this.id.split("_");
                                    id = id[1];
                                    $('.add_'+id).attr('href',"?a=tolovstatus&add=true&ids[]="+id);
                                    $('.delete_'+id).attr('href',"?a=tolovstatus&delete=true&ids[]="+id);
                                });

                                $('#checkbutton').attr('disabled','true');
                                $('#deletebutton').attr('disabled','true');
                            }

                            if(status != 0){
                                $('.checkrow').each(function(e){
                                    $('.add').removeAttr('href');
                                    $('.delete').removeAttr('href');
                                });

                                $('#checkbutton').removeAttr('disabled');
                                $('#deletebutton').removeAttr('disabled');
                            }
                        });
                    });
                </script>
            <?php
        }
    }
?>


