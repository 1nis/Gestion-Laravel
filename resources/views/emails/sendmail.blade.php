<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
        <input type="text" id="mail" class="mail" value="" readonly>
</body>
</html>

<script>
 $(document).ready(function() {
        
       $.ajaxSetup({
          headers : {
             'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
          }
       });
       
        fetchEmployee();

       function fetchEmployee()
       {
          $.ajax({
                type: "GET",
                url: '/send-mail',
                dataType: "json",
                success: function(response) {
                console.log(response.employe);
                document.getElementById("mail").value = response.employe[id_row].Nom;
             }
       });
    }

    });
 </script> 