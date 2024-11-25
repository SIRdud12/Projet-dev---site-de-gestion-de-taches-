<?php 
session_start();
if (isset($_SESSION['role']) && isset($_SESSION['id'])) {
    include "DB_connection.php";
    include "app/Model/Task.php";
    include "app/Model/User.php";

    $tasks = get_all_tasks_by_id($conn, $_SESSION['id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes tâches</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <input type="checkbox" id="checkbox">
    <?php include "inc/header.php"; ?>

    <div class="d-flex">
        <?php include "inc/nav.php"; ?>

        <main class="flex-grow-1 p-4">
            <div class="container">
                <h4 class="mb-4 text-primary">Mes tâches</h4>

                <?php if (isset($_GET['success'])) { ?>
                    <div class="alert alert-success" role="alert">
                        <?= stripcslashes($_GET['success']); ?>
                    </div>
                <?php } ?>

                <?php if ($tasks != 0) { ?>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Titre</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Date d'échéance</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; foreach ($tasks as $task) { ?>
                                    <tr>
                                        <td><?= ++$i ?></td>
                                        <td><?= htmlspecialchars($task['title']); ?></td>
                                        <td><?= htmlspecialchars($task['description']); ?></td>
                                        <td>
                                            <span class="badge bg-<?= $task['status'] == 'completed' ? 'success' : ($task['status'] == 'in_progress' ? 'warning' : 'secondary') ?>">
                                                <?= htmlspecialchars($task['status']); ?>
                                            </span>
                                        </td>
                                        <td><?= htmlspecialchars($task['due_date']); ?></td>
                                        <td>
                                            <a href="edit-task-employee.php?id=<?= $task['id'] ?>" class="btn btn-primary btn-sm">
                                                <i class="fa fa-edit"></i> Edit
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                <?php } else { ?>
                    <h5 class="text-muted">Aucune tâche disponible</h5>
                <?php } ?>
            </div>
        </main>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var active = document.querySelector("#navList li:nth-child(2)");
        active.classList.add("active");
    </script>
</body>
</html>
<?php 
} else { 
    $em = "First login";
    header("Location: login.php?error=$em");
    exit();
}
?>
