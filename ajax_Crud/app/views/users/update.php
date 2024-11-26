<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div id="flash-alert" class="alert d-none"></div>
                
                <div class="card shadow">
                    <div class="card-header text-white text-center">
                        <h3>Edit User</h3>
                    </div>
                    <div class="card-body p-4">
                        <form id="updateUserForm">
                            <div class="mb-3">
                                <label for="firstname" class="form-label">First Name</label>
                                <input type="text" class="form-control" 
                                    value="<?= $users['firstname'] ?>" id="firstname" name="firstname" placeholder="Enter your first name" required>
                            </div>

                            <div class="mb-3">
                                <label for="lastname" class="form-label">Last Name</label>
                                <input type="text" class="form-control" 
                                    value="<?= $users['lastname'] ?>" id="lastname" name="lastname" placeholder="Enter your last name" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" 
                                    value="<?= $users['email'] ?>" id="email" name="email" placeholder="Enter your email" required>
                            </div>

                            <div class="mb-3">
                                <label for="gender" class="form-label">Gender</label>
                                <select class="form-select" id="gender" name="gender" required>
                                    <option disabled>Select your gender</option>
                                    <option value="Male" <?= $users['gender'] == 'Male' ? 'selected' : '' ?>>Male</option>
                                    <option value="Female" <?= $users['gender'] == 'Female' ? 'selected' : '' ?>>Female</option>
                                    <option value="Other" <?= $users['gender'] == 'Other' ? 'selected' : '' ?>>Other</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="address" class="form-label">Address</label>
                                <textarea class="form-control" id="address" name="address" rows="3" required><?= $users['address'] ?></textarea>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="<?= site_url("/users/display") ?>" class="btn btn-secondary">Cancel</a>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap CSS -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(145deg, #a18cd1, #fbc2eb);
            min-height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Roboto', sans-serif;
        }

        .card {
            border-radius: 20px;
            background: #ffffff;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            width: 100%;
            max-width: 650px;
        }

        .card-header {
            padding: 20px;
            background: linear-gradient(to right,blue,violet);
            color: #fff;
            text-align: center;
            font-size: 1.5rem;
            font-weight: bold;
            text-transform: uppercase;
        }

        .form-floating label {
            font-size: 0.9rem;
            color: #6c757d;
        }

        .form-floating input:focus,
        .form-floating textarea:focus,
        .form-floating select:focus {
            border-color: #4e73df;
            box-shadow: 0 0 5px rgba(78, 115, 223, 0.5);
        }

        .form-control,
        .form-select {
            border-radius: 12px;
        }

        .btn-primary {
            background: linear-gradient(90deg, #6a11cb, #2575fc);
            border: none;
            border-radius: 12px;
            transition: all 0.3s;
        }

        .btn-primary:hover {
            background: linear-gradient(90deg, #2575fc, #6a11cb);
        }

        .btn-secondary {
            border-radius: 12px;
        }

        .tooltip-text {
            font-size: 0.8rem;
            color: #555;
            margin-top: -8px;
        }

        .progress-bar {
            border-radius: 12px;
        }

        .section-title {
            font-size: 1.2rem;
            color: #333;
            margin-bottom: 20px;
            font-weight: 600;
            text-transform: uppercase;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
    $(document).ready(function () {
        $('#updateUserForm').submit(handleFormSubmit);

        function handleFormSubmit(event) {
            event.preventDefault();

            const formData = $(this).serialize();
            const updateUrl = '<?= site_url("/users/update/" . $users["id"]) ?>';

            updateUser(updateUrl, formData);
        }

        function updateUser(url, data) {
            $.ajax({
                url: url,
                method: 'POST',
                data: data,
                success(response) {
                    showFlashMessage('User updated successfully!', 'alert-success');
                },
                error(xhr) {
                    const errorMessage = 'Error updating user: ' + (xhr.responseText || 'An unexpected error occurred.');
                    showFlashMessage(errorMessage, 'alert-danger');
                }
            });
        }

        function showFlashMessage(message, alertClass) {
            $('#flash-alert')
                .removeClass('d-none alert-success alert-danger')
                .addClass(alertClass)
                .text(message);
        }
    });
</script>
</body>
</html>
