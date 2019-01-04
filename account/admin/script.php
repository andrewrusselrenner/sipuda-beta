<script>
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
			$('#dynamic-content').html('');    
			$('#dynamic-content').html(data); // load response 
            $('#modal-loader').hide();		  // hide ajax loader
            $('#bukutable').load('buku/tabel.php');
            $('#hapusbuku').modal('hide');	
		})
		.fail(function(){
			$('#dynamic-content').html('<i class="fas fa-info"></i> Ada yang tidak beres. Coba lagi...');
            $('#modal-loader').hide();
            $('#hapusbuku').modal('hide');
		});
		
	});
	
});

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
                $('#suntingbuku').modal('hide'); 
                $('#suksesmodal2').modal('show');
                //$('#suksesmodal .modal-header .modal-title').html("Sukses");
                $('#suksesmodal2 .modal-body').html(data);
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
</script>