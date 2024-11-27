<nav class="side-bar">
			<div class="user-p">
				<img src="img/user.png">
				<h4>@<?=$_SESSION['username']?></h4>
			</div>
			
			<?php 

               if($_SESSION['role'] == "employee"){
			 ?>
			 <!-- Employee Navigation Bar -->
			<ul id="navList">
				<li>
					<a href="index.php">
						<i class="fa fa-tachometer" aria-hidden="true"></i>
						<span>Tableau de bord</span>
					</a>
				</li>
				<li>
					<a href="my_task.php">
						<i class="fa fa-tasks" aria-hidden="true"></i>
						<span>mes tâches</span>
					</a>
				</li>
				<li>
					<a href="profile.php">
						<i class="fa fa-user" aria-hidden="true"></i>
						<span>Profile</span>
					</a>
				</li>
				<li>
					<a href="notifications.php">
						<i class="fa fa-bell" aria-hidden="true"></i>
						<span>Notifications</span>
					</a>
				</li>
					<li>
					<a href="comments.php">
						<i class="fa fa-comments-o" aria-hidden="true"></i>
						<span>Discussion</span>
					</a>
				</li>
				<li>
					<a href="logout.php">
						<i class="fa fa-sign-out" aria-hidden="true"></i>
						<span>Déconnexion</span>
					</a>
				</li>
			</ul>
		<?php }else { ?>
			<!-- Admin Navigation Bar -->
            <ul id="navList">
				<li>
					<a href="index.php">
						<i class="fa fa-tachometer" aria-hidden="true"></i>
						<span>Tableau de bord</span>
					</a>
				</li>
				<li>
					<a href="user.php">
						<i class="fa fa-users" aria-hidden="true"></i>
						<span>Gérer les utilisateurs</span>
					</a>
				</li>
				<li>
					<a href="create_task.php">
						<i class="fa fa-plus" aria-hidden="true"></i>
						<span>Créer une tâche</span>
					</a>
				</li>
				<li>
					<a href="tasks.php">
						<i class="fa fa-tasks" aria-hidden="true"></i>
						<span>Toutes les tâches</span>
					</a>
				</li>
				<li>
					<a href="logout.php">
						<i class="fa fa-sign-out" aria-hidden="true"></i>
						<span>Déconnexion</span>
					</a>
				</li>
			</ul>
		<?php } ?>
		</nav>