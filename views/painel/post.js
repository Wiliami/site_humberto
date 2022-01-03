$(document).ready(function() {
    $('#example').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "list-user.php",
            "type": "POST"
        }          
    } );
} );

