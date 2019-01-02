<script>
/* must apply only after HTML has loaded */
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

// script hapus buku
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

$(document).ready(function(){
      refreshTable();
    });

    function refreshTable(){
        $('#bukutable').load('buku/tabel.php');
    }
</script>