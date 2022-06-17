<!DOCTYPE html>
<html lang="en">
<head>

   <style>
      @media print {
      body * {
      visibility: hidden;
      }
      .modal-content * {
      visibility: visible;
      overflow: visible;
      }
      .main-page * {
      display: none;
      }
      .modal {
      position: absolute;
      left: 0;
      top: 0;
      margin: 0;
      padding: 0;
      min-height: 550px;
      visibility: visible;
      overflow: visible !important; /* Remove scrollbar for printing. */
      }
      .modal-dialog {
      visibility: visible !important;
      overflow: visible !important; /* Remove scrollbar for printing. */
      }
      #mailgroup {
      display: none;
      }
      #adressegroup{
      display : none;
      }
      #numerogroup {
      display : none;
      }
      #boutonimprimer {
      display : none;
      }
      #entete_show {
      display : none;
      }
      #bas_show {
      display : none;
      }
      }
   </style>
</head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap CRUD Data Table for Database with Modal Form</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" >
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <body>
   <div id="nonPrintable">
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Gestion <b>d'Employés</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Ajouter un Employé</span></a>
						<a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Supprimer</span></a>						
					</div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
						<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th>
                        <th>Nom</th>
                        <th>Email</th>
						      <th>Adresse</th>
                        <th>Telephone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $users)
                        
                    <tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
						</td>
                        <td style="cursor:pointer;" href="#showEmployeeModal" data-toggle="modal" class="voiremploye" name="voiremploye" id={{$users->id}}>
                            {{$users->Nom}}
                        </td>

                        <td style="cursor:pointer;" href="#showEmployeeModal" data-toggle="modal" class="voiremploye" name="voiremploye" id={{$users->id}}>
                            {{$users->Mail}}
                        </td>

						<td style="cursor:pointer;" href="#showEmployeeModal" data-toggle="modal" class="voiremploye" name="voiremploye" id={{$users->id}}>
                            {{$users->Adresse}}
                        </td>

                        <td style="cursor:pointer;" href="#showEmployeeModal" data-toggle="modal" class="voiremploye" name="voiremploye" id={{$users->id}}>
                            {{$users->Telephone}}
                        </td>
                        <td>
                            <a type="button" href="#editEmployeeModal"  data-toggle="modal"><i class="material-icons edit" data-toggle="tooltip" name="editbutton" title="Modifier"  id={{$users['id']}}>&#xE254;</i></a>
                            <a type="button" href="#deleteEmployeeModal" data-toggle="modal"><i class="material-icons delete" data-toggle="tooltip" name="deletebutton" title="Supprimer" id={{$users['id']}}>&#xE872;</i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
			<div class="clearfix">
                <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                <ul class="pagination">
                    <li class="page-item disabled"><a href="#">Previous</a></li>
                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item active"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item"><a href="#" class="page-link">Next</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Show Modal HTML -->
    <div id="showEmployeeModal" class="modal fade">
        <div class="modal-dialog">
           <div class="modal-content">
              <form method="GET" action="" >
                 <div class="modal-header" id="entete_show">
                    <h4 class="modal-title">Information de l'employé</h4>
                    <button type="button" name="close" id="close" class="close" onClick="window.location.reload();" data-dismiss="modal" aria-hidden="true">&times;</button>
                 </div>
                 <div class="modal-body">
                    <div class="form-group" id="nomgroup">
                          <label>Photo Utilisateur : </label>
                          <img class="photovoir" id="photovoir" src="" height="55" width="70"/>
                    </div>
                    <div class="form-group" id="nomgroup">
                       <label>Nom</label>
                       <input type="text" class="form-control" name="nomvoir" id="nomvoir" readonly required>
                    </div>
                    <div class="form-group" id="mailgroup">
                       <label>Email</label>
                       <input type="email" class="form-control" name="mailvoir" id="mailvoir" readonly required>
                    </div>
                    <div class="form-group" id="adressegroup">
                       <label>Adresse</label>
                       <textarea class="form-control" name="adressevoir" id="adressevoir" readonly required></textarea>
                    </div>
                    <div class="form-group" id="numerogroup">
                       <label>Numéro de téléphone</label>
                       <input type="text" class="form-control" name="numerovoir" id="numerovoir" readonly required>
                    </div>
                  
                    <div id="qrcode-container" name="qrcode-container" style="text-align:center;">
                       <h4>QRcode</h4>
                       <img id="qrcode">
                    </div>
                 </div>
                 <div class="modal-footer" id="bas_show">
                    <a href="javascript:window.print()" id ="boutonimprimer" class="btn btn-primary pull-right">Imprimer</a>
                    <button type="submit" name="envoyer_mail" id="envoyer_mail" value="envoyer_mail" class="btn btn-primary pull-right" style="margin-right:120px;" >Envoyer Mail</button>
                    <input type="hidden" name="qr64" id="qr64" class ="qr64">
                 </div>
           </div>
           </form>
        </div>
     </div>
  </div>
	<!-- Add Modal HTML -->
    <div id="addEmployeeModal" class="modal fade">
        <div class="modal-dialog">
        <div class="modal-content">
        <form method="POST" action="" >
        <div class="modal-header">						
        <h4 class="modal-title">Ajouter un employé</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">					
        <div class="form-group">
        <label>Nom</label>
        <input type="text" class="form-control" name="nomajouter" required>
        </div>
        <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control" name="mailajouter" required>
        </div>
        <div class="form-group">
        <label>Adresse</label>
        <textarea class="form-control" name="adresseajouter" required></textarea>
        </div>
        <div class="form-group">
        <label>Numéro de téléphone</label>
        <input type="text" class="form-control" name="numeroajouter" required>
        </div>					
        </div>
        <div class="modal-footer">
        <input type="reset" class="btn btn-default" data-dismiss="modal" value="Annuler">
        <input type="Submit" class="btn btn-success" name="Ajouter" value="Ajouter">
        <?php
           $default = './img/default.jpg';
           // Ici si l'utilisateur clique sur le bouton ajouter alors les valeurs sont directement ajouter dans la bdd dans la table user //
               if (isset($_POST['Ajouter'])) {
                   $ajouterpersonne = $connexion->query("INSERT INTO user VALUES (null, '{$_POST['nomajouter']}', '{$_POST['mailajouter']}', '{$_POST['adresseajouter']}', '{$_POST['numeroajouter']}', '$default')");
                   
                 echo "<meta http-equiv='refresh' content='0'>";
               }
           ?>
        </div>
        </form>
        </div>
        </div>
        </div>
	<!-- Edit Modal HTML -->
   <div id="editEmployeeModal" class="modal fade">
      <div class="modal-dialog">
      <div class="modal-content">
      <form method="GET" action="" id="envoyer_id" class="envoyer_id" enctype="multipart/form-data">
         @csrf
      <div class="modal-header">						
      <h4 class="modal-title">Modifier un employé</h4>
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
      <div class="form-group">
          <input class="form-control" type="file" name="uploadfile" value="" />
      </div>					
      <div class="form-group">
      <label>Nom</label>
      <input id="identifiant" name="identifiant" type="hidden" >
      <input type="text" class="form-control" name="nommodifier" id="nommodifier" required>
      </div>
      <div class="form-group">
      <label>Email</label>
      <input type="email" class="form-control" name="mailmodifier" id="mailmodifier" required>
      </div>
      <div class="form-group">
      <label>Adresse</label>
      <textarea class="form-control" name="adressemodifier" id="adressemodifier" required></textarea>
      </div>
      <div class="form-group">
      <label>Numéro de téléphone</label>
      <input type="text" class="form-control" name="numeromodifier" id="numeromodifier" required>
      </div>					
      </div>
      <div class="modal-footer">
      <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
      <input type="submit" href="" class="btn btn-info" id="Sauvegarder" name="Sauvegarder" value="Save">
      </div>
      </form>
      </div>
      </div>
      </div>
	<!-- Delete Modal HTML -->
	<div id="deleteEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Delete Employee</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<p>Are you sure you want to delete these Records?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-danger" value="Delete">
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>



<script>
   $(document).ready(function() {
   
})
</script>
    


      <!-- partial -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

      <script>
         $(".edit").click(function(){
         	var id_row = $(this).attr("id");
            
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
                     url: '/fetch-employee',
                     dataType: "json",
                     success: function(response) {
                        id_row-=1;
                        // console.log(response.employe[id_row].Nom);
                        document.getElementById("nommodifier").value = response.employe[id_row].Nom;
                        document.getElementById('envoyer_id').action = 'edit/'+response.employe[id_row].id;
                        document.getElementById("mailmodifier").value = response.employe[id_row].Mail;
                        document.getElementById("adressemodifier").value = response.employe[id_row].Adresse;
                        document.getElementById("numeromodifier").value = response.employe[id_row].Telephone;
                        document.getElementById("identifiant").value = response.employe[id_row].id;
                  }
            });
         }


         	});
         
      </script>

      <script>
         $(".delete").click(function(){
         	var id_row = $(this).attr("id");
         
         	$.ajax({
         		type: "POST",
         		url: 'get_employe_by_id.php',
         		data: { id_row : id_row },
         		success: function(data)
         		{
         			data = JSON.parse(data);
         			document.getElementById("identifiant2").value = data.ID;
         			document.getElementById("nomsupprimer").value = data.Nom;
         		}
         	});
         });
      </script> 

      <script>
         $(".voiremploye").click(function(){
         	var id_row = $(this).attr("id");
         	
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
                     url: '/fetch-employee',
                     dataType: "json",
                     success: function(response) {
                        id_row-=1;
                        // console.log(response.employe[id_row].Nom);
                        document.getElementById("photovoir").src = "Test";
                        document.getElementById("nomvoir").value = response.employe[id_row].Nom;
                        document.getElementById("mailvoir").value = response.employe[id_row].Mail;
                        document.getElementById("adressevoir").value = response.employe[id_row].Adresse;
                        document.getElementById("numerovoir").value = response.employe[id_row].Telephone;
                        var Nom = response.employe[id_row].Nom;
                        var Mail = response.employe[id_row].Mail;
                        var Adresse = response.employe[id_row].Adresse;
                        var Telephone = response.employe[id_row].Telephone;
                        var QrCode = creerQRC(Mail);
                        var src_qrcode = document.getElementById('qrcode').src;
                        document.getElementById("qr64").value = src_qrcode;
                        createCookie("Mail",Mail,"1");
                        createCookie("Nom",Nom,"1");
                  }
            });
         }

         });
      </script> 

      <script>
         function createCookie(cname, cvalue, exdays) {
          const d = new Date();
          d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
          let expires = "expires="+d.toUTCString();
          document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
         }
      </script>

      <script>
         function creerQRC(a) {
         var url = a;
         var qrcode = 'https://chart.googleapis.com/chart?cht=qr&chl=' + encodeURIComponent(url) + '&chs=200x200&choe=UTF-8&chld=L|0';
         document.getElementById("qrcode").src = qrcode;
         }
      </script>

      <!-- <script type="text/javascript" >
         function generateQRCode(a){
         $("#qrcode").html("");
         new QRCode(document.getElementById("qrcode"), a);}
         </script> -->

      <script>
         function functionPrint() {
           document.getElementById("nonPrintable").className += "noPrint";
           window.print();
         }
      </script>

      <!-- Script qui permet de refresh la page sans que les données ne soient envoyées 2 fois -->
      <script>
         if ( window.history.replaceState ) {
             window.history.replaceState( null, null, window.location.href );
         }
      </script>

      <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
      
      <script>
         $("#export_button").click(function(){
         $(document).ready(function() {
         $('#table_info').DataTable( {
         	dom: 'Bfrtip',
         	paging: false,
         	ordering: false,
         	info: false,
         	searching : false,
         	buttons: [
         		{extend: 'pdf',
                         exportOptions: {
                          columns: [ 2, 3, 4, 5 ],
                         },
                         text:'PDF'
                  },
         	  {extend: 'excelHtml5',
                         exportOptions: {
                          columns: [ 0, 1, 2, 3, 4 ],
                         },
                         text:'Excel'
                  }
         	]
         }  );
         } );
         });
         
         
      </script>

