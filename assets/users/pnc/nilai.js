$(function() {
    
    getDataTablesKaryawan();

    function getDataTablesKaryawan(periode, department){
        var karyawanTable = $('#karyawan_table').DataTable({
            "searching"  : false,
            "processing" : true,
            "serverSide" : true,
            "order"      : [],
            "ajax"       : {
                url      :  site_url + 'pnc/nilai/datatable',
                data     : {
                    periode : periode,
                    department : department
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

    // filter by department Karyawan
    $('#department').on('change', function(){
        var department = $('#department').val();
        if (department !== '') {
            $('#karyawan_table').DataTable().destroy();
            getDataTablesKaryawan(department);
        }else{
             $('#karyawan_table').DataTable().destroy();
             getDataTablesKaryawan();
        }
    });

    // filter by department Karyawan
    $('#tahun').on('change', function(){
        var tahun = $('#tahun').val();
        if (tahun !== '') {
            $('#karyawan_table').DataTable().destroy();
            getDataTablesKaryawan(tahun);
        }else{
             $('#karyawan_table').DataTable().destroy();
             getDataTablesKaryawan();
        }
    });

    $('.test').html("<select><option>1</option><option>2</option></select>");
});