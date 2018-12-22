<script type="text/javascript">
    function pwvalidasi()
    {
        if(document.register.sandi.value!= document.register.konfirmasikatasandi.value)
        {
            alert("Kata Sandi dan Konfirmasi Kata Sandi harus sama!");
            document.register.konfirmasikatasandi.focus();
            
            return false;
        }
        return true;
    }
</script>

<script>
    function cekEmail() 
    {
        $("#loaderIcon").show();
        jQuery.ajax(
        {
            url: "ceksurel.php",
            data:'surel='+$("#surel").val(),
            type: "POST",
        
            success:function(data)
            {
                $("#statusanggota").html(data);
                $("#loaderIcon").hide();
            },
        error:function (){}
        });
    }
</script>