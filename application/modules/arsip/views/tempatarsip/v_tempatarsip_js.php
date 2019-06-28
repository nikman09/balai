<script>
jQuery( document ).ready( function( $ ) {

    
    var csfrData = {};
    csfrData['<?php echo $this->security->get_csrf_token_name(); ?>'] = '<?php echo $this->security->get_csrf_hash(); ?>';
    $.ajaxSetup({
        data: csfrData
    });

    var $table1 = jQuery( '#table-1' );            
    // Initialize DataTable
    $table1.DataTable( {
        "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        "bStateSave": true
    });
    // Initalize Select Dropdown after DataTables is created
    $table1.closest( '.dataTables_wrapper' ).find( 'select' ).select2( {
        minimumResultsForSearch: -1
    });

    


 

   $(".hapus").click(function (e) {
    var v_id = this.id;
    $.confirm({
        title: 'Hapus!',
        content: 'Yakin ingin menghapus ?',
        buttons: {
            hapus: {
                text: 'Hapus',
                btnClass: 'btn-primary',
                action: function(){
                    window.location.assign("<?php echo base_url() ?>arsip/tempatarsiphapus?id="+v_id);
                }
            },
            batal: function () {

            }
            
        }
        });
    });

    $('#lemari').focus();



    $('#id_ruangan').change(function(){
        var id=$(this).val();
        $.ajax({
            url : "<?php echo base_url();?>arsip/ruanganlemari",
            method : "POST",
            data : {id_ruangan: id},
            async : false,
            dataType : 'json',
            success: function(data){
                var html ='<option value="" disabled selected>.:Pilih Lemari:.</option>';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<option value="'+data[i].id_lemari+'">'+data[i].nama_lemari+'</option>';
                    }
                    $('#id_lemari').html(html);
                   
                    var html ='<option value="" disabled selected>.:Pilih Rak:.</option>';
                    $('#id_rak').html(html);

            }
        });
    });

    $('#id_lemari').change(function(){
        var id=$(this).val();
        $.ajax({
        url : "<?php echo base_url();?>arsip/lemarirak",
        method : "POST",
        data : {id_lemari: id},
        async : false,
        dataType : 'json',
        success: function(data){
            var html ='<option value="" disabled selected>.:Pilih Rak:.</option>';
                var i;
                for(i=0; i<data.length; i++){
                    html += '<option value="'+data[i].id_rak+'">'+data[i].nama_rak+'</option>';
                }
                $('#id_rak').html(html);

        }
        });
    });

  



});

</script>