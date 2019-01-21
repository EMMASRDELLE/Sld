 <!-- Tableau -->
        <script src="https://code.jquery.com/jquery-1.12.3.js"></script>

        <link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>

        <script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

        <script type="text/javascript" src=" https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>

       <script type="text/javascript" src=" https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>

       <script type="text/javascript" src=" https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>


       <script type="text/javascript" src=" https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
       
       <script type="text/javascript" src=" https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>

       <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css"></style>

       <!-- <link rel="stylesheet" href="assets/color-master/build/1.2.2/css/pick-a-color-1.2.2.min.css">   --> 

    

       <script type="text/javascript"> 
       $(document).ready(function() {
    $('#myTable').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );
} );

        $(document).ready(function() {
    $('#myTable2').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );
} );

        $(document).ready(function() {
    $('#myTable3').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );
} );
        </script>