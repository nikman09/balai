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
        "aLengthMenu"   : [[10, 25, 50, -1], [10, 25, 50, "All"]],
        "bStateSave"    : true,
        "ajax"          : {
                            url :"<?php echo $link ?>", // json datasource
                            type: "post",  // method  , by default get
                            error: function(){  // error handling
                                $(".employee-grid-error").html("");
                                $("#employee-grid").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                                $("#employee-grid_processing").css("display","none");
                            }
                        },
        "order"         : [[ 1, 'desc' ]],
        "processing"    : true,
        "serverSide"    : true,
        "columnDefs"    : [
                            { "orderable": false, "targets": [0]
                            }
                        ],
						
		"responsive": true,
        "fnDrawCallback": function(oSettings){
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
                            window.location.assign("<?php echo base_url() ?>costumer/costumerhapus?id="+v_id);
                        }
                    },
                    batal: function () {

                    }
                    
                }
                });
            });
                
            }


        
    });
    // Initalize Select Dropdown after DataTables is created
    $table1.closest( '.dataTables_wrapper' ).find( 'select' ).select2( {
        minimumResultsForSearch: -1
    });

    

} );
 


   
</script>