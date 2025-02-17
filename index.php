<?php
include 'db.php';

// Fetch users
$sql = "SELECT * FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">PHP CRUD Operation</h2>
    <a href="create.php" class="btn btn-primary mb-3">Add User</a>

    <!-- PHP Code to Show SweetAlert Pop-ups -->
    <?php if (isset($_GET['message'])): ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                <?php if ($_GET['message'] == 'inserted') { ?>
                    Swal.fire("Success!", "User added successfully!", "success");
                <?php } elseif ($_GET['message'] == 'updated') { ?>
                    Swal.fire("Updated!", "User updated successfully!", "info");
                <?php } elseif ($_GET['message'] == 'deleted') { ?>
                    Swal.fire("Deleted!", "User deleted successfully!", "warning");
                <?php } ?>
            });
        </script>
    <?php endif; ?>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['first_name'] ?></td>
                    <td><?= $row['last_name'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td>
                        <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm delete-btn" data-id="<?= $row['id'] ?>">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            let userId = this.getAttribute('data-id');
            Swal.fire({
                title: "Are you sure?",
                text: "This action cannot be undone!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "delete.php?id=" + userId;
                }
            });
        });
    });
});
</script>

</body>
</html>
