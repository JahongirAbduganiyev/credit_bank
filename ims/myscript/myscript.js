$(document).ready(function(){
    
    $('.number-separator').on('keyup click change paste input mouseover', function (event) {
        $(this).val(function (index, value) {
            if (value != "") {
                //return '$' + value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                var decimalCount;
                value.match(/\./g) === null ? decimalCount = 0 : decimalCount = value.match(/\./g);
    
                if (decimalCount.length > 1) {
                    value = value.slice(0, -1);
                }
    
                var components = value.toString().split(".");
                if (components.length === 1)
                    components[0] = value;
                components[0] = components[0].replace(/\D/g, '').replace(/\B(?=(\d{3})+(?!\d))/g, ' ');
                if (components.length === 2) {
                    components[1] = components[1].replace(/\D/g, '').replace(/^\d{3}$/, '');
                }
    
                if (components.join('.') != '')
                    return components.join('.');
                else
                    return '';
            }
        });
    });
    //End Number Format
    $(this).on("change",'#toliq_kirim',function(){
        var chex    =   $("#toliq_kirim:checked").length;
        if(chex>0)
        {
            var jsum    =   $("#jami_summa").val();
            $("#bkirim_summa").val(jsum);
        }
        else
        {
            $("#bkirim_summa").val(' ');
           
        }
      });    
      //End Toliq Kirim
      
      $(this).on("click","#btntas",function(e){
        var tjsum =   $("#jami_summa").val();
        var trim_tjsum = tjsum.replaceAll(/\s/g,'');
        var bksum =   $("#bkirim_summa").val();
        var trim_bksum = bksum.replaceAll(/\s/g,'');
        var a = parseInt(trim_tjsum) < parseInt(trim_bksum);
        if(a == true || bksum=='0' || bksum=='')
        {
           alert("Mablag' Yetarli Emas!");
           e.preventDefault(e);
           //window.location.href="?a=boshqarma_inkassa";
        }  
    });       
      //End Mablag' error
     

});