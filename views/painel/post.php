<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <script type="text/javascript" language="JavaScript">
            $(document).ready(function() {
                $('#example').DataTable( {
                    "processing": true,
                    "serverSide": true,
                    "ajax": {
                        "url": "list-user.php";
                        "type": "POST"
                    }          
                } );
            } );


            $columns = array(
                array( '0' => 'user_name' ),
                array( '1' => 'level_desc' ),
                array( '2' => 'user_create_date' ),
                array( '3' => 'user_status' ),
                array( '4' => 'user_email' ),
            );
        </script>
</body>
</html>