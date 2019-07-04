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
   $('#daftar').prop('disabled' , true);
   $('#konfirmasikatasandi').on('keyup', function () {
       var password = $("#sandi").val();
       var confirmPassword = $("#konfirmasikatasandi").val();
   
       if (password != confirmPassword) {
           $("#divCheckPassword").html("Tidak Cocok. Mohon dicocokkan!");
       } else {
           $("#divCheckPassword").html("Kata Sandi Cocok.");
           sandi_state = true;
           $('#daftar').prop('disabled' , false);
       }
   });
   /*
   $('#sandi, #konfirmasikatasandi').on('keyup', function () {
        if ($('#sandi').val() == $('#konfirmasikatasandi').val()) {
            sandi_state = true;
            $('#message').html('Cocok').css('color', 'green');
        } else             
            sandi_state = false;
            $('#message').html('Tidak Cocok. Mohon dicocokkan.').css('color', 'red');
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
    
    $("#daftarForm").on("submit", function(e) {
        var postData = $(this).serializeArray();
        var formURL = $(this).attr("action");
        $.ajax({
            url: formURL,
            type: "POST",
            data: postData,
            success: function(data, textStatus, jqXHR) { 
                $('#daftarForm')[0].reset();
                $('#suksesmodal').modal('show');
                $('#suksesmodal .modal-header .modal-title').html("Oke");
                $('#suksesmodal .modal-body').html(data);
                $("#suksesmodal").on("hidden.bs.modal", function () {
                    window.location.href = "/";
                  });
                
            },
            error: function(jqXHR, status, error) {
                console.log(status + ": " + error);
            }
        });
        e.preventDefault();
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
        if (email_state == false || sandi_state == true) {
         $('#error_msg').text('Mohon perbaiki error yang terdapat di kolom.');
       }else{
         // proceed with form submission
         $("#daftarForm").submit();
        }
    });
   });