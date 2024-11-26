<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(145deg, #f5f7fa, #c3cfe2);
            font-family: 'Roboto', sans-serif;
        }

        .container {
            margin-top: 50px;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 12px 20px rgba(0, 0, 0, 0.2);
        }

        h2 {
            font-weight: 700;
            color: #333;
        }

        .dataTables_filter {
            float: right !important;
        }

        table.dataTable th,
        table.dataTable td {
            text-align: center;
            vertical-align: middle;
        }

        .btn-primary,
        .btn-danger {
            border-radius: 10px;
        }

        .btn-success {
            border-radius: 10px;
            background: linear-gradient(90deg, #32cd32, #28a745);
            border: none;
        }

        .btn-success:hover {
            background: linear-gradient(90deg, #28a745, #32cd32);
        }

        .delete-btn {
            background: linear-gradient(90deg, #ff6b6b, #ff3b3b);
            border: none;
        }

        .delete-btn:hover {
            background: linear-gradient(90deg, #ff3b3b, #ff6b6b);
        }

        .action-icons i {
            cursor: pointer;
        }

        .action-icons i:hover {
            color: #007bff;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>User Management</h2>
            <a href="<?= site_url('/users/add'); ?>" class="btn btn-success">
                <i class="fas fa-user-plus me-2"></i>Create User
            </a>
        </div>

        <!-- Flash Alerts -->
        <?php flash_alert() ?>

        <!-- Table -->
        <table id="userTable" class="table table-hover table-bordered text-center">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($users as $user): ?>
                    <tr>
                        <td><?= $user['id']?></td>
                        <td><?= $user['lastname']?></td>
                        <td><?= $user['firstname']?></td>
                        <td><?= $user['email']?></td>
                        <td><?= $user['gender']?></td>
                        <td><?= $user['address']?></td>
                        <td class="action-icons">
                            <a href="<?= site_url('/users/update/'. $user['id']);?>" class="btn btn-primary btn-sm">
                                <i class="fas fa-edit me-1"></i>Update
                            </a>
                            <button class="btn btn-danger btn-sm delete-btn" data-id="<?= $user['id']; ?>">
                                <i class="fas fa-trash-alt me-1"></i>Delete
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- JS Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <script>
    $(document).ready(function () {
        const table = initializeDataTable();

        $('#userTable tbody').on('click', '.delete-btn', handleDelete);

        function initializeDataTable() {
            return $('#userTable').DataTable({
                paging: true,
                lengthChange: false,
                searching: true,
                ordering: true,
                info: true,
                autoWidth: false,
                responsive: true,
                language: {
                    paginate: {
                        previous: 'Prev',
                        next: 'Next'
                    }
                }
            });
        }

        function handleDelete(event) {
            event.preventDefault();

            const userId = $(this).data('id');
            if (confirm('Are you sure you want to delete this user?')) {
                deleteUser(userId, $(this).parents('tr'));
            }
        }

        function deleteUser(userId, tableRow) {
            $.ajax({
                url: `<?= site_url('/users/delete/'); ?>${userId}`,
                type: 'GET',
                success(response) {
                    alert('User deleted successfully!');
                    table.row(tableRow).remove().draw();
                },
                error(xhr) {
                    alert('An error occurred while deleting the user.');
                    console.error(xhr.responseText);
                }
            });
        }
    });
</script>
</body>

</html>
