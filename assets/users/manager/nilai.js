$(function() {
    
    getDataTablesKaryawan();

    function getDataTablesKaryawan(periode = ''){
        var karyawanTable = $('#karyawan_table').DataTable({
            "processing" : true,
            "serverSide" : true,
            "order"      : [],
            "ajax"       : {
                url      :  site_url + 'nilai/datatable',
                data     : {
                    periode : periode
                }
            },
            responsive   : true,
            "dom": '<lf<t>ip>'
            // $('#show_data').html(data);
        });
    }

    // filter by periode Karyawan
    $('#periode').on('change', function(){
        var periode = $('#periode').val();
        if (periode !== '') {
            $('#karyawan_table').DataTable().destroy();
            getDataTablesKaryawan(periode);
        }else{
             $('#karyawan_table').DataTable().destroy();
             getDataTablesKaryawan();
        }
    });

    $('.test').html("<select><option>1</option><option>2</option></select>");
});