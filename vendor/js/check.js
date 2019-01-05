$('document').ready(function(){
    //var konfirmasikatasandi_state = false;
    var email_state = false;
    /*
    $('#konfirmasikatasandi').on('blur', function(){
     var konfirmasikatasandi = $('#konfirmasikatasandi').val();
     var sandi = $('#sandi').val();
     
     $.ajax({
       url: 'register.php',
       type: 'post',
       data: {
           'username_check' : 1,
           'username' : username,
       },
       success: function(response){
         if (response == 'taken' ) {
             username_state = false;
             $('#username').parent().removeClass();
             $('#username').parent().addClass("form_error");
             $('#username').siblings("span").text('Sorry... Username already taken');
         }else if (response == 'not_taken') {
             username_state = true;
             $('#username').parent().removeClass();
             $('#username').parent().addClass("form_success");
             $('#username').siblings("span").text('Username available');
         }
       }
     });
    });
    */		
     $('#surel').on('blur', function(){
        var surel = $('#surel').val();
        if (surel == '') {
            email_state = false;
            return;
        }
        $.ajax({
         url: 'daftar.php',
         type: 'POST',
         data: {
             'surel_check' : 1,
             'surel' : surel,
         },
         success: function(response){
             if (response == 'taken' ) {
             email_state = false;
             $('#surel').parent().removeClass();
             $('#surel').parent().addClass("form_error");
             $('#surel').siblings("span").text('Maaf, surel sudah ada. Gunakan surel yang lainnya.');
             }else if (response == 'not_taken') {
               email_state = true;
               $('#surel').parent().removeClass();
               $('#surel').parent().addClass("form_success");
               $('#surel').siblings("span").text('Surel bisa dipakai.');
             }
         }
        });
    });
   
    $('#daftar').on('click', function(){
        //var username = $('#username').val();
        var namad = $('#namad').val();
        var namab = $('#namab').val();
        var surel = $('#surel').val();
        var nope = $('#nope').val();
        var almt = $('#almt').val();
        var sandi = $('#sandi').val();
        var idcard = $('#idcard').val();
        var noid = $('#noid').val();
        var tptlahir = $('#tptlahir').val();
        var tgllahir = $('#tgllahir').val();
        var gender = $('#gender').val();
        var jobstatus = $('#jobstatus').val();
        if (email_state == false) {
         $('#error_msg').text('Fix the errors in the form first');
       }else{
         // proceed with form submission
         $.ajax({
             url: 'daftar.php',
             type: 'POST',
             data: {
                 'simpan' : 1,
                 'namad' : namad,
                 'namab' : namab,
                 'surel' : surel,
                 'nope' : nope,
                 'almt' : almt,
                 'sandi' : sandi,
                 'idcard' : idcard,
                 'noid' : noid,
                 'tptlahir' : tptlahir,
                 'tgllahir' : tgllahir,
                 'gender' : gender,
                 'jobstatus' : jobstatus,
             },
             success: function(response){
                 alert('user saved');
                 $('#username').val('');
                 $('#surel').val('');
                 $('#sandi').val('');
             }
         });
        }
    });
   });