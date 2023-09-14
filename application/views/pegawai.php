<html>

<head>
    <title>Belajaphp.net - Codeigniter Datatable</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h3>DATA KARYAWAN</h3>
        <table id="table" class="display" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>FOTO</th>
                    <th>NAMA</th>
                    <th>EMAIL</th>
                    <th>NO HP</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">
        var save_method; //for save method string
        var table;

        $(document).ready(function() {
            //datatables
            table = $('#table').DataTable({
                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                "order": [], //Initial no order.
                // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": '<?php echo site_url('testing/json'); ?>',
                    "type": "POST"
                },
                //Set column definition initialisation properties.
                "Columns": [{
                        "Data": "foto",
                        width: 170
                    },
                    {
                        "data": "nama_lengkap",
                        width: 100
                    },
                    {
                        "data": "email",
                        width: 100
                    },
                    {
                        "data": "no_hp",
                        width: 100
                    },
                    {
                        "data": "action",
                        width: 100
                    }
                ],

            });

        });
    </script>

    <script>
        $(document).ready(function() {
            // Setup datatables
            $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings) {
                return {
                    "iStart": oSettings._iDisplayStart,
                    "iEnd": oSettings.fnDisplayEnd(),
                    "iLength": oSettings._iDisplayLength,
                    "iTotal": oSettings.fnRecordsTotal(),
                    "iFilteredTotal": oSettings.fnRecordsDisplay(),
                    "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                    "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                };
            };

            var table = $("#mytable").dataTable({
                initComplete: function() {
                    var api = this.api();
                    $('#mytable_filter input')
                        .off('.DT')
                        .on('input.DT', function() {
                            api.search(this.value).draw();
                        });
                },
                oLanguage: {
                    sProcessing: "loading..."
                },
                processing: true,
                serverSide: true,
                ajax: {
                    "url": "http://103.7.226.117/barangkeluar/jsonkeluar",
                    "type": "POST"
                },
                "sColumns": [{
                        "aaData": "kode_penjualan",
                    },
                    {
                        "aaData": "item",
                    },
                    {
                        "aaData": "id_warna",
                    },
                    {
                        "aaData": "tgl_keluar",
                    },
                    {
                        "aaData": "stok_keluar",
                    },
                    {
                        "aaData": "yard_keluar",
                    },
                    {
                        "aaData": "nm_cust",
                    },
                    {
                        "aaData": "packing_list",
                    },
                    {
                        "aaData": "status_jual",
                    },
                ],
                order: [
                    [1, 'asc']
                ],
                rowCallback: function(row, data, iDisplayIndex) {
                    var info = this.fnPagingInfo();
                    var page = info.iPage;
                    var length = info.iLength;
                    var index = page * length + (iDisplayIndex + 1);
                    $('td:eq(0)', row).html(index);
                }

            });

        });
    </script>


    <script>
        $(document).ready(function() {
            // Setup datatables
            $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings) {
                return {
                    "iStart": oSettings._iDisplayStart,
                    "iEnd": oSettings.fnDisplayEnd(),
                    "iLength": oSettings._iDisplayLength,
                    "iTotal": oSettings.fnRecordsTotal(),
                    "iFilteredTotal": oSettings.fnRecordsDisplay(),
                    "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                    "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                };
            };

            var table = $("#mytable").dataTable({
                initComplete: function() {
                    var api = this.api();
                    $('#mytable_filter input')
                        .off('.DT')
                        .on('input.DT', function() {
                            api.search(this.value).draw();
                        });
                },
                oLanguage: {
                    sProcessing: "loading..."
                },
                processing: true,
                serverSide: true,
                ajax: {
                    "url": "<?php echo base_url() . 'index.php/crud/get_produk_json' ?>",
                    "type": "POST"
                },
                columns: [{
                        "data": "barang_kode"
                    },
                    {
                        "data": "barang_nama"
                    },
                    //render harga dengan format angka
                    {
                        "data": "barang_harga",
                        render: $.fn.dataTable.render.number(',', '.', '')
                    },
                    {
                        "data": "kategori_nama"
                    },
                    {
                        "data": "view"
                    }
                ],
                order: [
                    [1, 'asc']
                ],
                rowCallback: function(row, data, iDisplayIndex) {
                    var info = this.fnPagingInfo();
                    var page = info.iPage;
                    var length = info.iLength;
                    $('td:eq(0)', row).html();
                }

            });

        });
    </script>

</body>

</html>