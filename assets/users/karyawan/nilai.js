$(function() {
    
    getDataTablesKaryawan();

    function getDataTablesKaryawan(periode = ''){
        var karyawanTable = $('#karyawan_table').DataTable({
            "searching"  : false,
            "processing" : true,
            "serverSide" : true,
            "order"      : [],
            "ajax"       : {
                url      :  site_url + 'karyawan/nilai/datatable',
                data     : {
                    periode : periode
                }
            },
            responsive   : true,
            "dom": '<lf<t>ip>'
            // $('#show_data').html(data);
        });
    }
});

$(function() {
    
    getDataTablesDetail();

    function getDataTablesDetail(periode = ''){
        var detail_table = $('#detail_table').DataTable({
            "bPaginate"     : true,
            "searching"     : false,
            "bLengthChange" : false,
            "bFilter"       : true,
            "bInfo"         : false,
            "processing"    : true,
            "serverSide"    : true,
            "order"         : [],
            "ajax"          : {
                url         :  site_url + 'karyawan/nilai/detail_datatable',
                data        : {
                    periode : periode
                }
            },
            responsive   : true,
            "dom": '<lf<t>ip>'
            // $('#show_data').html(data);
        });
    }
});