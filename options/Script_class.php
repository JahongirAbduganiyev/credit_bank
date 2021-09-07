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
                    $(function () {
                        $("#example1").DataTable({
                        "responsive": true, "lengthChange": false, "autoWidth": false,
                        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                    });
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

            echo "tolov";
            ?>
                <script type="text/javascript">
                    $(function () {
                        $('#example2').DataTable({
                        "paging": true,
                        "lengthChange": false,
                        "searching": false,
                        "ordering": true,
                        "info": true,
                        "autoWidth": false,
                        "responsive": true,
                        });
                    });
                </script>
            <?php
        }
    }
?>


