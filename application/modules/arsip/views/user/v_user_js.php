<script>
jQuery( document ).ready( function( $ ) {
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

    

} );
 

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
                    window.location.assign("<?php echo base_url() ?>arsip/userhapus?username="+v_id);
                }
            },
            batal: function () {

            }
            
        }
        });
    });

          $('#form').validate({ // initialize plugin
            highlight: function (label) {
                $(label).closest('.form-group').removeClass('has-success').addClass('has-error');
                $('.error').css({'font-size':'9px','margin-bottom':'0px'});
                $('#status-error').css({'font-size':'9px'});
            },
            success: function (label) {
                $(label).closest('.form-group').removeClass('has-error');
                label.remove();
            },
            errorPlacement: function (error, element) {
                var placement = element.closest('.input-group');
                if (!placement.get(0)) {
                    placement = element;
                }
                if (error.text() !== '') {
                    placement.after(error);
                }
            },

            rules: {
                username: {
                    required: true,
                }, 
                password: {
                    required: true,
                    minlength: 6
                }, 
                repassword: {
                    required: true,
                    equalTo: "#password"
                },   
                email: {
                    email: true
                },
                nohp: {
                    required: false
                },  
                alamat: {
                    required: false
                }, 
                jk: {
                    required: true
                },
                cabang: {
                    required: true
                },
                jabatan: {
                    required: true
                },
                status: {
                    required: true
                }, 
                rule: {
                    required: true
                },
                nama: {
					required: true
				},
                
            },
            messages: {
				nama: {
					required: 'Nama harus diisi'
				},
            }
        });
</script>