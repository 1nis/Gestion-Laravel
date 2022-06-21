<!DOCTYPE html>
<html lang="en">
<head>
   <header>
      <nav class="navbar navbar-inverse">
         <div class="container-fluid">
           <div class="navbar-header">
             <a class="navbar-brand" href="#">Gestion d'Employés</a>
           </div>
           <ul class="nav navbar-nav">
             <li><a href="dashboard">Dashboard</a></li>
             <li><a href="employe">Employe</a></li>
             <li class="active"><a href="pointage">Pointage</a></li>
           </ul>
         </div>
       </nav>
   </header>
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
      #photovoir {
      display : none;
      }
      #adressegroup{
      display : none;
      }
      #numerogroup {
      display : none;
      }
      #photogroup {
      display : none;
      }
      #nomaffichage {
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
        <title>Gestion d'Employés</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" >
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
         <body>
            <div class="container">
               <az id="nonPrintable">
                  <div class="table-wrapper">
                     <div class="table-title">
                        <div class="row">
                           <div class="col-sm-6">
                              <h2>Pointage <b>Employés</b></h2>
                           </div>
                           <div class="col-sm-6">
                              <a href="#addEmployeeModal" class="btn btn-success add" id="add" data-toggle="modal" ><i class="material-icons">&#xE147;</i> <span>Pointer quelqu'un</span></a>                           </div>
                        </div>
                     </div>
                     <table id="table_info" class="table table-striped table-hover">
                        <thead>
                           <tr>
                              <th>
                                 <span class="custom-checkbox">
                                 <input type="checkbox" id="selectAll">
                                 <label for="selectAll"></label>
                                 </span>
                              </th>
                              <th> </th>
                              <th>ID</th>
                              <th>Nom</th>
                              <th>Email</th>
                              <th>Date / Heure pointage</th>
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
                                <td style="cursor:pointer;" href="#showEmployeeModal" data-toggle="modal" class="voiremploye" name="voiremploye" id="',$users['ID'],'">
                                
                                </td>
                                <td style="cursor:pointer;" href="#showEmployeeModal" data-toggle="modal" class="voiremploye" name="voiremploye" id={{$users->id}}>
                                    {{$users->ID}}
                                </td>
        
                                <td style="cursor:pointer;" href="#showEmployeeModal" data-toggle="modal" class="voiremploye" name="voiremploye" id={{$users->id}}>
                                    {{$users->Nom}}
                                </td>
        
                                <td style="cursor:pointer;" href="#showEmployeeModal" data-toggle="modal" class="voiremploye" name="voiremploye" id={{$users->id}}>
                                    {{$users->Mail}}
                                </td>
        
                                <td style="cursor:pointer;" href="#showEmployeeModal" data-toggle="modal" class="voiremploye" name="voiremploye" id={{$users->id}}>
                                    {{$users->Date}}
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
                        <div class="hint-text">
                           Total de <b>
                           </b> éléments
                        </div>
                     </div>
                  </div>
               </az>
               <!-- Show Modal HTML -->
               <div id="showEmployeeModal" class="modal fade">
                  <div class="modal-dialog">
                     <div class="modal-content">
                        <form method="POST" action="" >
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
            <form name="form_add" method="get" action="presence" >
            <div class="modal-header">						
            <h4 class="modal-title">Ajouter un employé</h4>
            <button type="button" class="close" data-dismiss="modal" id="close" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">					
            <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="mailajouter" id="mailajouter" required autofocus/>
            </div>					
            </div>
            <div class="modal-footer">
            <input type="reset" class="btn btn-default" data-dismiss="modal" value="Annuler">
            <input type="Submit" class="btn btn-success" name="Ajouter" value="Ajouter">
            </div>
            </form>

            </div>
            </div>
            </div>
            <!-- Edit Modal HTML -->
            <div id="editEmployeeModal" class="modal fade">
            <div class="modal-dialog">
            <div class="modal-content">
            <form method="POST" action ="" >
            <div class="modal-header">						
            <h4 class="modal-title">Modifier le pointage</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">					
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
            <input type="submit" class="btn btn-info" name="Sauvegarder" value="Save">
            <?php
               if (isset($_POST['Sauvegarder'])) {
               	$modifierpersonne = $connexion->query("UPDATE user Set Nom ='{$_POST['nommodifier']}', Email = '{$_POST['mailmodifier']}', Adresse = '{$_POST['adressemodifier']}', Telephone ='{$_POST['numeromodifier']}' WHERE ID = '{$_POST['identifiant']}'");
               	echo "<meta http-equiv='refresh' content='0'>";
               }
               ?>
            </div>
            </form>
            </div>
            </div>
            </div>
            <!-- Delete Modal HTML -->
            <div id="deleteEmployeeModal" class="modal fade">
            <div class="modal-dialog">
            <div class="modal-content">
            <form method="POST" action="" >
            <div class="modal-header">						
            <h4 class="modal-title">Supprimer le pointage ?</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
            <input id="identifiant2" name="identifiant2" type="hidden" >					
            <p>Êtes-vous sur de vouloir supprimer le pointage ?</p>
            <input type="hidden" class="form-control" name="nomsupprimer" id="nomsupprimer" required>
            <p class="text-warning"><small>Cette action ne pourra pas être anulée.</small></p>
            </div>
            <div class="modal-footer">
            <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
            <input type="submit" class="btn btn-danger" name="validation_supprimer" value="Supprimer le Pointage">
            <?php
               if (isset($_POST['validation_supprimer'])) {
                  $identifiant2 = $_POST['identifiant2'];
               	$supprimerpersonne = $connexion->query("DELETE FROM `pointage` WHERE ID = '$identifiant2'");
               	echo "<meta http-equiv='refresh' content='0'>";
               }
               //$i =0;
               //for (i=0;i<$recuppersonne;i++) {
               //	if (isset($_POST[$i]))
               //}
               
               ?>
            </div>
            </form>
            </div>
            </div>
            </div>
               <!-- Export Modal HTML
            <div id="exportEmployeeModal" class="modal fade">
               <div class="modal-dialog">
                  <div class="modal-content">
                     <form method="POST" action ="" >
                        <div class="modal-header">						
                           <h4 class="modal-title">Exporter les employés</h4>
                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">					
                           <a href="export_pointage_tableur.php" class="btn btn-default" >Format Tableur</a>
                           <a href="export_pointage_tableur.php" class="btn btn-info" >Format PDF</a>			
                        </div>
                        <div class="modal-footer">

                        </div>
                     </form>
                  </div>
               </div>
            </div> -->
            </az>
         </body>
      </html>
