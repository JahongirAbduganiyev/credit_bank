$(document).ready(function(){

    $("#client_kodi").keypress(function(e) {
        var key = e.which;
        if (key == 13) // the enter key code
        {
            $("#search_client").click();
        }
    });

    $("#search_client").click(function(){
        var client_kodi = $("#client_kodi").val();
        if (client_kodi != '') {
            $.ajax({
                url:"json_encode/client_info.php",
                type:"POST",
                datatype:"JSON",
                data:{'client_kodi':client_kodi},
                success:function(data){
                    $("#client_table").html(data);
                    $("#client_kodi").val("");
                    if (!data){
                        alert("Bunday IDga tegishli klient mavjud emas!");
                    }
                }
            })
        }
        else{
            alert("CLient kodini kiriting!");
            $("#client_table").html("");
        }
    });
});

$(document).ready(function(){
    $(document).on('click', '#insert_button', function(){
        startSpinner();

        var client_id = $("#client_id").html();

        $.ajax({
            url:"json_encode/client_tekshir.php",
            type:"POST",
            datatype:"JSON",
            data:{'client_id':client_id},
            success:function(val){
                var info = JSON.parse(val);
                if (info.status == 1){
                    var izox;
                    if (info.credit_status == 1){
                        izox = "to'liq yopilgan";
                    }
                    if(info.credit_status == 0){
                        izox = "to'liq yopilmagan";
                    }
                    $("#modal_text").html("("+info.client_kodi+")-raqamli klientning ("+info.credit_kodi+")-tartibli "+izox+" krediti mavjud! (YES) tugmasini bossangiz ushbu klient raqamiga (02)-tartibli kredit shakillantiriladi! Rad etish uchun (NO) tugmasini bosing!")
                    $("#modal-info").modal('toggle');
                    stopSpinner();
                }
                if(info.status == 2){
                    $.ajax({
                        url:"json_encode/client_insert.php",
                        type:"POST",
                        datatype:"JSON",
                        data:{'client_id':client_id},
                        success:function(val){
                            var obj = JSON.parse(val);
                            if (obj.a){
                                alert("Ma'lumotlar bazaga saqlandi!");
                                $("#client_table").html("");
                                stopSpinner1();
                            }else {
                                alert("Ma'lumotlar bazaga saqlanmadi qaytadan urinib ko'ring!");
                                stopSpinner();
                            }
                        }
                    })
                }
            }
        })
    });

    $(document).on('click', '#insert_ok', function(){
        startSpinner1();
        var client_id = $("#client_id").html();
        $.ajax({
            url:"json_encode/client_insert.php",
            type:"POST",
            datatype:"JSON",
            data:{'client_id':client_id},
            success:function(val){
                var obj = JSON.parse(val);
                if (obj.a){
                    alert("Ma'lumotlar bazaga saqlandi!");
                    $("#client_table").html("");
                    $("#modal-info").modal('toggle');
                    stopSpinner1();
                }else {
                    alert("Ma'lumotlar bazaga saqlanmadi qaytadan urinib ko'ring!");
                    stopSpinner();
                }
            }
        })
    });

    function startSpinner() {
        $("#insert_button").prop("disabled", true);
        $("#insert_button").html(
            `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Loading...`
        );
    }
    function stopSpinner() {
        $("#insert_button").prop("disabled", false);
        $("#insert_button").html("Insert");
    }

    function startSpinner1() {
        $("#insert_ok").prop("disabled", true);
        $("#insert_ok").html(
            `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Loading...`
        );
    }
    function stopSpinner1() {
        $("#insert_ok").prop("disabled", false);
        $("#insert_ok").html("YES");
    }

});