$(document).ready(function(){

    $(".autosubmit").on("change", function(){
        this.form.submit();
    });

    $("select[name='client']").on("change", function(){
        $("select[name='syear']").val("");
        $("select[name='eyear']").val("");
        $("select[name='smonth']").val("");
        $("select[name='emonth']").val("");
    });

    $("select[name='syear']").on("change", function(){
        
    });

});



