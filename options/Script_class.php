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

        public static function haridor(){
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

        public static function haridorlar(){
            ?>
                <script type="text/javascript">
                    $(document).ready(function(){
                        $(document).on('click', 'button[name=client]', function(e){
                            e.preventDefault;

                            $.ajax({
                                url:"options/Ajax_class.php",
                                type:"POST",
                                datatype:"JSON",
                                data:{'data':this.value, 'type': 'ajax','page': 'haridorlar'},
                                success:function(val){
                                    let obj = JSON.parse(val);
                                    
                                    $('.modal-title').html(obj.client.fish);
                                    let credit = obj.credit;
                                    let foiz = obj.foiz;
                                    $('#credit_grafik').html('');
                                    credit.forEach(function(item,index){
                                        $('#credit_grafik').append('<tr><td>'+(++index)+'</td><td>'+item.tolov_sana+'</td><td>'+item.oylik_tani+' so`m</td><td>'+foiz.kunlik_foiz+' so`m</td><td>'+(parseInt(item.oylik_tani)+parseInt(foiz.kunlik_foiz))+' so`m</td></tr>');
                                    });
                                }
                            });
                        });

                        $(document).on('click','#print', function (){
                            var sTable = document.getElementById('credit_grafik').innerHTML;

                            var style = "<style>";
                            style = style + "table {width: 100%;font: 24px Calibri;}";
                            style = style + "table, th, td {border: solid 1px #DDD; border-collapse: collapse;";
                            style = style + "padding: 2px 3px;text-align: center;}";
                            style = style + "</style>";

                            // CREATE A WINDOW OBJECT.
                            var win = window.open('', '', 'height=800,width=1000');

                            win.document.write('<html><head>');
                            win.document.write('<title>Profile</title>');   // <title> FOR PDF HEADER.
                            win.document.write(style);          // ADD STYLE INSIDE THE HEAD TAG.
                            win.document.write('</head>');
                            win.document.write('<body>');
                            win.document.write('<table>');
                            win.document.write(sTable);         // THE TABLE CONTENTS INSIDE THE BODY TAG.
                            win.document.write('</table></body></html>');
                            // win.document.write('</body></html>');

                            win.document.close(); 	// CLOSE THE CURRENT WINDOW.

                            win.print();    // PRINT THE CONTENTS.
                        });
                    });
                </script>
            <?php
        }

        public static function tolovstatus(){
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


