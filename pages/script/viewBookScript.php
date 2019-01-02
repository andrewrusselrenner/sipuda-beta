<script>
// script js peminjaman buku
  $(document).ready(function(){
	
	$(document).on('click', '#pinjam', function(e){
		
		e.preventDefault();
		
		var uid = $(this).data('id');   // it will get id of clicked row
		
		$('#dynamic-content').html(''); // leave it blank before ajax call
		$('#modal-loader').show();      // load ajax loader
		
		$.ajax({
			url: 'pinjam.php',
			type: 'POST',
			data: 'id='+uid,
			dataType: 'html'
		})
		.done(function(data){
			console.log(data);	
			$('#dynamic-content').html('');    
			$('#dynamic-content').html(data); // load response 
			$('#modal-loader').hide();		  // hide ajax loader	
		})
		.fail(function(){
			$('#dynamic-content').html('<i class="fa fas-info"></i> Something went wrong, Please try again...');
			$('#modal-loader').hide();
		});
		
	});
	
});

// script js hapus buku
$(document).ready(function(){
	
	$(document).on('click', '#hapus', function(e){
		
		e.preventDefault();
		
		var uid = $(this).data('id');   // it will get id of clicked row
		
		$('#dynamic-content').html(''); // leave it blank before ajax call
		$('#modal-loader').show();      // load ajax loader
		
		$.ajax({
			url: '/account/admin/buku/delbook.php',
			type: 'GET',
			data: 'nopang='+uid,
			dataType: 'html'
		})
		.done(function(data){
			console.log(data);	
			$('#dynamic-content').html('');    
			$('#dynamic-content').html(data); // load response 
            $('#modal-loader').hide();		  // hide ajax loader
            windows.location("catalog/index.php");
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
</script>