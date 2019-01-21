<!DOCTYPE html>
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Multi Step Registration Form Using JQuery Bootstrap in PHP</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>


<?php   

 require_once('../inc/config.php');
 require_once('../inc/fonction.inc.php');



if(isset($_POST["email"]))
{

// debug($_POST);

  $_POST['password'] = md5($_POST['password']); // pa fonction md5 prédéfinie md5 permet de crypter un string.


foreach ($_POST as $indice => $valeur) {
      $_POST[$indice] = validate_input($valeur, ENT_QUOTES);    
    }


// insertion en base :
    $mysqli->query("INSERT INTO patient (hopital, adresse, cdp, ville, pays, nom_dir, prenom_dir, email_dir, tel_dir, statut, inscription, login, password, acceptation)

     VALUES ('$_POST[hopital]', '$_POST[adresse]', '$_POST[cdp]', '$_POST[ville]', '$_POST[pays]', '$_POST[nom_dir]', '$_POST[prenom_dir]', '$_POST[email_dir]', '$_POST[tel_dir]', 3, NOW(), '$_POST[login]', '$_POST[password]', '$_POST[acceptation]')") or die($mysqli->error); // 0 pour un patient


$msg = '
  <div class="alert alert-success">
  Vous étes inscrit
  </div>';

  header('location:index.php');
        exit();

}



 ?>




  <style>
  .box
  {
   width:800px;
   margin:0 auto;
  }
  .active_tab1
  {
   background-color:#fff;
   color:#333;
   font-weight: 600;
  }
  .inactive_tab1
  {
   background-color: #f5f5f5;
   color: #333;
   cursor: not-allowed;
  }
  .has-error
  {
   border-color:#cc0000;
   background-color:#ffff99;
  }
  </style>


 </head>
 <body>
 <br />
  <div class="container box">
   <br />
   <h2 align="center">Multi Step Registration Form Using JQuery Bootstrap in PHP</h2><br />
   
   <form method="post" id="register_form">
    <ul class="nav nav-tabs">

     <li class="nav-item">
      <a class="nav-link active_tab1" id="list_contact_details" style="border:1px solid #ccc">Contact</a>
     </li>

     <li class="nav-item">
      <a class="nav-link inactive_tab1" id="list_personal_details" style="border:1px solid #ccc">Personnel</a>
     </li>

     <li class="nav-item">
      <a class="nav-link inactive_tab1" style="border:1px solid #ccc" id="list_login_details">Inscription</a>
     </li>



    </ul>


    <div class="tab-content" style="margin-top:16px;">


  <div class="tab-pane active" id="contact_details">
      <div class="panel panel-default">
       <div class="panel-heading">Fill Contact Details</div>
       <div class="panel-body">

        <div class="form-group">
         <!-- <label>Enter Nom</label> -->
         <input type="text" name="hopital" id="hopital" class="form-control" placeholder="Entrez le nom de l'hôpital"/>
         <span id="error_hopital" class="text-danger"></span>
        </div> 
  
        <div class="form-group">
         <!-- <label>Enter Addresse</label> -->
         <input type="text" name="adresse" id="adresse" class="form-control" placeholder="Entrez l'adresse de l'hôpital" />
         <span id="error_adresse" class="text-danger"></span>
        </div>

        <div class="form-group">
         <!-- <label>Enter Code postal</label> -->
         <input type="text" name="cdp" id="cdp" class="form-control" placeholder="Entrez le code postal de l'hôpital" />
         <span id="error_cdp" class="text-danger"></span>
        </div>

        <div class="form-group">
         <!-- <label>Enter Ville</label> -->
         <input type="text" name="ville" id="ville" class="form-control" placeholder="Entrez la ville de l'hôpital"/>
         <span id="error_ville" class="text-danger"></span>
        </div>

        <div class="form-group">
         <!-- <label>Enter Pays</label> -->
         <input type="text" name="pays" id="pays" class="form-control" placeholder="Entrez le pays de l'hôpital"/>
         <span id="error_pays" class="text-danger"></span>
        </div>

  
        <br />
        <!-- <div align="center">
         <button type="button" name="previous_btn_contact_details" id="previous_btn_contact_details" class="btn btn-default btn-lg">Previous</button>
         <!-- <button type="button" name="btn_contact_details" id="btn_contact_details" class="btn btn-success btn-lg">Register</button>
        </div> -->

        <div align="center">
         <button type="button" name="btn_contact_details" id="btn_contact_details" class="btn btn-info btn-lg">Next</button>
        </div>


        <br />
       </div>
      </div>
   </div>

  <div class="tab-pane fade" id="personal_details">
      <div class="panel panel-default">
       <div class="panel-heading">Fill Personal Details</div>
       <div class="panel-body">


        <div class="form-group">
         <!-- <label>Enter Nom</label> -->
         <input type="text" name="nom_dir" id="nom" class="form-control" placeholder="Entrez le nom directeur"/>
         <span id="error_nom" class="text-danger"></span>
        </div>

        <div class="form-group">
         <!-- <label>Enter Prénom</label> -->
         <input type="text" name="prenom_dir" id="prenom" class="form-control" placeholder="Entrez le prénom du directeur"/>
         <span id="error_prenom" class="text-danger"></span>
        </div>
        <div class="form-group">
         <!-- <label>Enter Email</label> -->
         <input type="text" name="email_dir" id="email" class="form-control" placeholder="Entrez l'email du directeur"/>
         <span id="error_email" class="text-danger"></span>
        </div>

        <div class="form-group">
         <!-- <label>Enter Téléphone</label> -->
         <input type="text" name="tel_dir" id="mobile_no" class="form-control" placeholder="Entrez le téléphone du directeur"/>
         <span id="error_mobile_no" class="text-danger"></span>
        </div>


        <br />
        <div align="center">
         <button type="button" name="previous_btn_personal_details" id="previous_btn_personal_details" class="btn btn-default btn-lg">Previous</button>
         <button type="button" name="btn_personal_details" id="btn_personal_details" class="btn btn-info btn-lg">Next</button>
        </div>


        <br />
       </div>
      </div>
    </div>


  <div class="tab-pane fade" id="login_details">
      <div class="panel panel-default">
       <div class="panel-heading">Login Details</div>
       <div class="panel-body">


        <div class="form-group">
         <!-- <label>Login</label> -->
         <input type="text" name="login" id="login" class="form-control" placeholder="Entrez un identifiant"/>
         <span id="error_login" class="text-danger"></span>
        </div>


        <div class="form-group">
         <!-- <label>Enter Password</label> -->
         <input type="password" name="password" id="password" class="form-control" placeholder="Entrez un mot de passe"/>
         <input type='checkbox' id='toggle' value='0' onchange='togglePassword(this);'>&nbsp; <span id='toggleText'>Show</span>
         <span id="error_password" class="text-danger"></span><br /><br />

         <div><input type="checkbox" name="acceptation" id="acceptation">  J'ai lu et j'accepte les <A href="cvg/cvg.php"> conditions d'utilsation</A></div>
        </div>
        <br />

        <!-- <div align="center">
         <button type="button" name="btn_login_details" id="btn_login_details" class="btn btn-info btn-lg">Next</button>
        </div> -->

        <div align="center">
         <button type="button" name="previous_btn_login_details" id="previous_btn_login_details" class="btn btn-default btn-lg">Previous</button>
         <!-- <button type="button" name="btn_login_details" id="btn_login_details" class="btn btn-info btn-lg">Next</button> -->
        
      
        <button type="button" name="btn_login_details" id="btn_login_details" class="btn btn-success btn-lg">Register</button>

        </div>


        <br />
       </div>
      </div>
    </div>
  

    


    

    </div>
   </form>
  </div>

<script>
$(document).ready(function(){



// Show and Hide Password

 $("#toggle").change(function(){
  
  // Check the checkbox state
  if($(this).is(':checked')){
   // Changing type attribute
   $("#password").attr("type","text");
   
   // Change the Text
   $("#toggleText").text("Hide");
  }else{
   // Changing type attribute
   $("#password").attr("type","password");
  
   // Change the Text
   $("#toggleText").text("Show");
  }
 
 });
   

// parametre premier onglet

   $('#btn_contact_details').click(function(){

  var error_hopital = '';
  var error_adresse = '';
  var error_cdp = '';
  var error_ville = '';
  var error_pays = '';
  
  

   if($.trim($('#hopital').val()).length == 0)
  {
   error_hopital = 'nom de l\'hopital est requis';
   $('#error_hopital').text(error_hopital);
   $('#hopital').addClass('has-error');
  }
  else
  {
   error_hopital = '';
   $('#error_hopital').text(error_hopital);
   $('#hopital').removeClass('has-error');
  }

  if($.trim($('#adresse').val()).length == 0)
  {
   error_address = 'Adresse est requise';
   $('#error_adresse').text(error_address);
   $('#adresse').addClass('has-error');
  }
  else
  {
   error_address = '';
   $('#error_adresse').text(error_address);
   $('#adresse').removeClass('has-error');
  }

  if($.trim($('#cdp').val()).length == 0)
  {
   error_cdp = 'Code postal est requis';
   $('#error_cdp').text(error_cdp);
   $('#cdp').addClass('has-error')

  }
  else
  {
   error_cdp = '';
   $('#error_cdp').text(error_cdp);
   $('#cdp').removeClass('has-error');
  }


  if($.trim($('#ville').val()).length == 0)
  {
   error_ville = 'Ville est requise';
   $('#error_ville').text(error_ville);
   $('#ville').addClass('has-error');
  }
  else
  {
   error_ville = '';
   $('#error_ville').text(error_ville);
   $('#ville').removeClass('has-error');
  }

  if($.trim($('#pays').val()).length == 0)
  {
   error_pays = 'Pays est requis';
   $('#error_pays').text(error_pays);
   $('#pays').addClass('has-error');
  }
  else
  {
   error_pays = '';
   $('#error_pays').text(error_pays);
   $('#pays').removeClass('has-error');
  }
  
  
  

  if(error_hopital != '' || error_adresse != '' || error_cdp != '' || error_ville != '' || error_pays != '')
  {
   return false;
  }
  else
  
// onglet
  {
   $('#list_contact_details').removeClass('active active_tab1');
   $('#list_contact_details').removeAttr('href data-toggle');
   $('#contact_details').removeClass('active');
   $('#list_contact_details').addClass('inactive_tab1');
   $('#list_personal_details').removeClass('inactive_tab1');
   $('#list_personal_details').addClass('active_tab1 active');
   $('#list_personal_details').attr('href', '#personal_details');
   $('#list_personal_details').attr('data-toggle', 'tab');
   $('#personal_details').addClass('active in');
  }
 });
 
 $('#previous_btn_personal_details').click(function(){
  $('#list_personal_details').removeClass('active active_tab1');
  $('#list_personal_details').removeAttr('href data-toggle');
  $('#personal_details').removeClass('active in');
  $('#list_personal_details').addClass('inactive_tab1');
  $('#list_contact_details').removeClass('inactive_tab1');
  $('#list_contact_details').addClass('active_tab1 active');
  $('#list_contact_details').attr('href', '#contact_details');
  $('#list_contact_details').attr('data-toggle', 'tab');
  $('#contact_details').addClass('active in');
 });


 }); 

 
 // parametre deuxieme onglet
 
 $('#btn_personal_details').click(function(){
  var error_nom = '';
  var error_prenom = ''; 
  var error_mobile_no = '';
  var mobile_validation = /^\d{10}$/;
  var error_email = '';
  var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;


  // var error_date_naissance = '';
  // var error_lieu_naissance = '';
  
  // if($.trim($('#date_naissance').val()).length == 0)
  // {
  //  error_date_naissance = 'Date de naissance est requise';
  //  $('#error_date_naissance').text(error_date_naissance);
  //  $('#date_naissance').addClass('has-error');
  // }
  // else
  // {
  //  error_date_naissance = '';
  //  $('#error_date_naissance').text(error_lieu_naissance);
  //  $('#lieu_naissance').removeClass('has-error');
  // }
  
  // if($.trim($('#lieu_naissance').val()).length == 0)
  // {
  //  error_lieu_naissance = 'Lieu de naissance requis';
  //  $('#error_lieu_naissance').text(error_lieu_naissance);
  //  $('#lieu_naissance').addClass('has-error');
  // }
  // else
  // {
  //  error_lieu_naissance = '';
  //  $('#error_lieu_naissance').text(error_lieu_naissance);
  //  $('#lieu_naissance').removeClass('has-error');
  // }



if($.trim($('#nom').val()).length == 0)
  {
   error_nom = 'Nom est requis';
   $('#error_nom').text(error_nom);
   $('#nom').addClass('has-error');
  }
  else
  {
   error_nom = '';
   $('#error_nom').text(error_nom);
   $('#nom').removeClass('has-error');
  }

  if($.trim($('#prenom').val()).length == 0)
  {
   error_prenom = 'Prénom est requis';
   $('#error_prenom').text(error_prenom);
   $('#prenom').addClass('has-error');
  }
  else
  {
   error_prenom = '';
   $('#error_prenom').text(error_prenom);
   $('#prenom').removeClass('has-error');
  }


  if($.trim($('#mobile_no').val()).length == 0)
  {
   error_mobile_no = 'Numéro de mobile est requis';
   $('#error_mobile_no').text(error_mobile_no);
   $('#mobile_no').addClass('has-error');
  }
  else
  {
   if (!mobile_validation.test($('#mobile_no').val()))
   {
    error_mobile_no = 'Numéro de mobile invalide';
    $('#error_mobile_no').text(error_mobile_no);
    $('#mobile_no').addClass('has-error');
   }
   else
   {
    error_mobile_no = '';
    $('#error_mobile_no').text(error_mobile_no);
    $('#mobile_no').removeClass('has-error');
   }
  }
  

  if($.trim($('#email').val()).length == 0)
  {
   error_email = 'Email est requis';
   $('#error_email').text(error_email);
   $('#email').addClass('has-error');
  }
  else
  {
   if (!filter.test($('#email').val()))
   {
    error_email = 'Email invalide';
    $('#error_email').text(error_email);
    $('#email').addClass('has-error');
   }
   else
   {
    error_email = '';
    $('#error_email').text(error_email);
    $('#email').removeClass('has-error');
   }
  }

  if(error_nom != '' || error_prenom != '' || error_email != '' || error_mobile_no != '')
  {
   return false;
  }
  else
  {

    // onglet

   $('#list_personal_details').removeClass('active active_tab1');
   $('#list_personal_details').removeAttr('href data-toggle');
   $('#personal_details').removeClass('active');
   $('#list_personal_details').addClass('inactive_tab1');
   $('#list_login_details').removeClass('inactive_tab1');
   $('#list_login_details').addClass('active_tab1 active');
   $('#list_login_details').attr('href', '#login_details');
   $('#list_login_details').attr('data-toggle', 'tab');
   $('#login_details').addClass('active in');
  }
 });
 
 $('#previous_btn_login_details').click(function(){
  $('#list_login_details').removeClass('active active_tab1');
  $('#list_login_details').removeAttr('href data-toggle');
  $('#login_details').removeClass('active in');
  $('#list_login_details').addClass('inactive_tab1');
  $('#list_personal_details').removeClass('inactive_tab1');
  $('#list_personal_details').addClass('active_tab1 active');
  $('#list_personal_details').attr('href', '#personal_details');
  $('#list_personal_details').attr('data-toggle', 'tab');
  $('#personal_details').addClass('active in');
 });


// parametre troisieme onglet

 $('#btn_login_details').click(function(){
  
  var error_login = '';
  var error_password = '';
  
  
   if($.trim($('#login').val()).length == 0)
  {
   error_login = 'Identifiant requis';
   $('#error_login').text(error_login);
   $('#login').addClass('has-error');
  }
  else
  {
   error_login = '';
   $('#error_login').text(error_login);
   $('#login').removeClass('has-error');
  }
  

  if($.trim($('#password').val()).length == 0)
  {
   error_password = 'Mot de passe requis';
   $('#error_password').text(error_password);
   $('#password').addClass('has-error');
  }
  else
  {
   error_password = '';
   $('#error_password').text(error_password);
   $('#password').removeClass('has-error');
  }

  if(error_login != '' || error_password != '')
  {
   return false;
  }
  else
  {
   $('#btn_login_details').attr("disabled", "disabled");
   $(document).css('cursor', 'prgress');
   $("#register_form").submit();
  }
 
});

</script>
  
 </body>
</html>