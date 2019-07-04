<script>

/* script sunting buku */
$(document).ready(function () {
    $("#suntingbukuform").on("submit", function(e) {
        var postData = $(this).serializeArray();
        var formURL = $(this).attr("action");
        $.ajax({
            url: formURL,
            type: "POST",
            data: postData,
            success: function(data, textStatus, jqXHR) {
                //$('#suntingform')[0].reset();
                console.log("oke");
                if(data.success == true){ // if true (1)
                    console.log("reload");
                    setTimeout(function(){// wait for 5 secs(2)
                        location.reload(); // then reload the page.(3)
                    }, 100);
                }
                $('#suntingbuku').modal('hide'); 
                $('#suksesmodal2').modal('show');
                //$('#suksesmodal .modal-header .modal-title').html("Sukses");
                $('#suksesmodal2 .modal-body').html(data);
                $('.modal').modal('hide');
                $('#bukutable').load('buku/tabel.php');
                //$("#tambah").remove();
            },
            error: function(jqXHR, status, error) {
                console.log(status + ": " + error);
            }
        });
        e.preventDefault();
    });
     
    $("#sunting").on('click', function() {
        $("#suntingbukuform").submit();
    });
});

/* script tambah buku */
$(document).ready(function () {
    $("#tambahbukuform").on("submit", function(e) {
        var postData = $(this).serializeArray();
        var formURL = $(this).attr("action");
        $.ajax({
            url: formURL,
            type: "POST",
            data: postData,
            success: function(data, textStatus, jqXHR) {
                $('#tambahbukuform')[0].reset();
                $('#tambahbuku').modal('hide'); 
                $('#suksesmodal').modal('show');
                //$('#suksesmodal .modal-header .modal-title').html("Sukses");
                $('#suksesmodal .modal-body').html(data);
                $('#bukutable').load('buku/tabel.php');
                //$("#tambah").remove();
                console.log('terkirim');
                console.log(formURL);
            },
            error: function(jqXHR, status, error) {
                console.log(status + ": " + error);
            }
        });
        e.preventDefault();
    });
     
    $("#tambah").on('click', function() {
        $("#tambahbukuform").submit();
    });
});

/* script hapus buku */
  $(document).ready(function(){
	
	$(document).on('click', '#hapus', function(e){
		
		e.preventDefault();
		
		var uid = $(this).data('id');   // it will get id of clicked row
		
		$('#dynamic-content').html(''); // leave it blank before ajax call
		$('#modal-loader').show();      // load ajax loader
		
		$.ajax({
			url: 'buku/delbook.php',
			type: 'GET',
			data: 'nopang='+uid,
			dataType: 'html'
		})
		.done(function(data){
			console.log(data);	
			// $('#dynamic-content').html('');    
			// $('#dynamic-content').html(data); // load response 
            $('#modal-loader').hide();		  // hide ajax loader
            $('#bukutable').load('buku/tabel.php');
            $('#hapusbuku'+uid+'').modal('hide');
            $('.modal-backdrop').remove();
            $("body").removeClass("modal-open");
           
		})
		.fail(function(){
			$('#dynamic-content').html('<i class="fas fa-info"></i> Ada yang tidak beres. Coba lagi...');
            $('#modal-loader').hide();
            $('#hapusbuku<?php if(isset($nopangs)) echo $nopangs; ?>').modal('hide');
		});
		
	});
	
});

/* load tabel buku */
$(document).ready(function(){
      refreshTable();
    });

    function refreshTable(){
        $('#bukutable').load('buku/tabel.php');
    }

/* script acc peminjaman */
$(document).ready(function(){
	
	$(document).on('click', '#confirm', function(e){
		
		e.preventDefault();
		
		var uid = $(this).data('id');   // it will get id of clicked row
		
		$('#dynamic-content2').html(''); // leave it blank before ajax call
		$('#modal-loader2').show();      // load ajax loader
		
		$.ajax({
			url: 'peminjaman/konfirmasi.php',
			type: 'GET',
			data: 'nopang='+uid,
			dataType: 'html'
		})
		.done(function(data){
			console.log(data);	
			$('#dynamic-content2').html('');    
			$('#dynamic-content2').html(data); // load response 
            $('#modal-loader2').hide();		  // hide ajax loader
            $('#pinjamtable').load('peminjaman/tabel.php');
            $('#bukutable').load('buku/tabel.php');
            $('#suntingpinjam').modal('hide');	
		})
		.fail(function(){
			$('#dynamic-content2').html('<i class="fas fa-info"></i> Ada yang tidak beres. Coba lagi...');
            $('#modal-loader2').hide();
            $('#suntingpinjam').modal('hide');
		});
		
	});
	
});

/* script tambah peminjaman buku */
$(document).ready(function () {
    $("#tambahpinjamform").on("submit", function(e) {
        var postData = $(this).serializeArray();
        var formURL = $(this).attr("action");
        $.ajax({
            url: formURL,
            type: "POST",
            data: postData,
            success: function(data, textStatus, jqXHR) {
                $('#tambahpinjamform')[0].reset();
                $('#tambahpinjam').modal('hide'); 
                $('#suksesmodal4').modal('show');
                //$('#suksesmodal .modal-header .modal-title').html("Sukses");
                $('#suksesmodal4 .modal-body').html(data);
                $('#pinjamtable').load('peminjaman/tabel.php');
                //$("#tambah").remove();
            },
            error: function(jqXHR, status, error) {
                console.log(status + ": " + error);
            }
        });
        e.preventDefault();
    });
     
    $("#tambahin").on('click', function() {
        $("#tambahpinjamform").submit();
    });
});

/* script perpanjang buku */
$(document).ready(function(){
	
	$(document).on('click', '#panjang', function(e){
		
		e.preventDefault();
		
		var uid = $(this).data('id');   // it will get id of clicked row
		
		$('#dynamic-content5').html(''); // leave it blank before ajax call
		$('#modal-loader5').show();      // load ajax loader
		
		$.ajax({
			url: 'peminjaman/perpanjangpinjam.php',
			type: 'GET',
			data: 'nopang='+uid,
			dataType: 'html'
		})
		.done(function(data){
			console.log(data);	
			$('#dynamic-content5').html('');    
			$('#dynamic-content5').html(data); // load response 
            $('#modal-loader5').hide();		  // hide ajax loader
            $('#pinjamtable').load('peminjaman/tabel.php');
            $('#panjangbuku').modal('hide');	
		})
		.fail(function(){
			$('#dynamic-content').html('<i class="fas fa-info"></i> Ada yang tidak beres. Coba lagi...');
            $('#modal-loader').hide();
            $('#panjangbuku').modal('hide');
		});
		
	});
	
});

/* load tabel pinjam */
$(document).ready(function(){
      pinjamTable();
    });

    function pinjamTable(){
        $('#pinjamtable').load('peminjaman/tabel.php');
    }

/* script acc anggota */
$(document).ready(function(){
	
	$(document).on('click', '#acc', function(e){
		
		e.preventDefault();
		
		var uid = $(this).data('id');   // it will get id of clicked row
		
		$('#dynamic-content4').html(''); // leave it blank before ajax call
		$('#modal-loader4').show();      // load ajax loader
		
		$.ajax({
			url: 'anggota/accmember.php',
			type: 'GET',
			data: 'id='+uid,
			dataType: 'html'
		})
		.done(function(data){
			console.log(data);	
			$('#dynamic-content4').html('');    
			$('#dynamic-content4').html(data); // load response 
            $('#modal-loader4').hide();		  // hide ajax loader
            $('#anggotatable').load('anggota/tabel.php');
            $('#anggotamodal').modal('hide');	
		})
		.fail(function(){
			$('#dynamic-content4').html('<i class="fas fa-info"></i> Ada yang tidak beres. Coba lagi...');
            $('#modal-loader4').hide();
            $('#anggotamodal').modal('hide');
		});
		
	});
	
});

/* load tabel anggota */
$(document).ready(function(){
      anggotaTable();
    });

    function anggotaTable(){
        $('#anggotatable').load('anggota/tabel.php');
    }
</script>