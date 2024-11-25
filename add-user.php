<?php 
session_start();
if (isset($_SESSION['role']) && isset($_SESSION['id']) && $_SESSION['role'] == "admin") {
  
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Ajouter un utilisateur</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">

</head>
<body>
	<input type="checkbox" id="checkbox">
	<?php include "inc/header.php" ?>
	<div class="body">
		<?php include "inc/nav.php" ?>
		<section class="section-1">
			<h4 class="title">Ajouter un utilisateur <a href="user.php">utilisateur</a></h4>
			<form class="form-1"
			      method="POST"
			      action="app/add-user.php">
			      <?php if (isset($_GET['error'])) {?>
      	  	<div class="danger" role="alert">
			  <?php echo stripcslashes($_GET['error']); ?>
			</div>
      	  <?php } ?>

      	  <?php if (isset($_GET['success'])) {?>
      	  	<div class="success" role="alert">
			  <?php echo stripcslashes($_GET['success']); ?>
			</div>
      	  <?php } ?>
				<div class="input-holder">
					<lable>Nom et prénom</lable>
					<input type="text" name="full_name" class="input-1" placeholder="Nom et prénom"><br>
				</div>
				<div class="input-holder">
					<lable>Nom d'utilisateur</lable>
					<input type="text" name="user_name" class="input-1" placeholder="Nom d'utilisateur"><br>
				</div>
				<div class="input-holder">
					<lable>Mot de passe</lable>
					<input type="text" name="password" class="input-1" placeholder="Mot de passe"><br>
				</div>

				<button class="edit-btn">Ajouter</button>
			</form>
			
		</section>
	</div>

<script type="text/javascript">
	var active = document.querySelector("#navList li:nth-child(2)");
	active.classList.add("active");
</script>
</body>
</html>
<?php }else{ 
   $em = "First login";
   header("Location: login.php?error=$em");
   exit();
}
 ?>