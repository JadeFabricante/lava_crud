<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-header text-white text-center">
                        <h3>Add New User</h3>
                    </div>

                    <div class="card-body p-4">
                        <div id="flash-alert" class="alert d-none"></div>

                        <form id="addUserForm">
                        <div class="form-group-icon mb-4">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="John" required>
                        <label for="firstname">First Name</label>
                        <i class="fa-solid fa-user form-icon"></i>
                        <small class="tooltip-text">Enter your first name.</small>
                    </div>
                </div>

                <!-- Last Name -->
                <div class="form-group-icon mb-4">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Doe" required>
                        <label for="lastname">Last Name</label>
                        <i class="fa-solid fa-user form-icon"></i>
                        <small class="tooltip-text">Enter your last name.</small>
                    </div>
                </div>

                <!-- Email -->
                <div class="form-group-icon mb-4">
                    <div class="form-floating">
                        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                        <label for="email">Email Address</label>
                        <i class="fa-solid fa-envelope form-icon"></i>
                        <small class="tooltip-text">We'll never share your email.</small>
                    </div>
                </div>

                <!-- Gender -->
                <div class="form-group-icon mb-4">
                    <div class="form-floating">
                        <select class="form-select" id="gender" name="gender" required>
                            <option value="" disabled selected>Select gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                        <label for="gender">Gender</label>
                        <i class="fa-solid fa-venus-mars form-icon"></i>
                        <small class="tooltip-text">Choose your gender.</small>
                    </div>
                </div>

                <!-- Address -->
                <div class="form-group-icon mb-4">
                    <div class="form-floating">
                        <textarea class="form-control" id="address" name="address" placeholder="Enter your address" style="height: 100px;" required></textarea>
                        <label for="address">Address</label>
                        <i class="fa-solid fa-location-dot form-icon"></i>
                        <small class="tooltip-text">Enter your full address.</small>
                    </div>
                </div>

                <!-- Actions -->
                <div class="d-flex justify-content-between align-items-center">
                    <a href="<?= site_url('/users/display'); ?>" class="btn btn-secondary">
                        <i class="fa-solid fa-arrow-left me-1"></i>Cancel
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa-solid fa-paper-plane me-1"></i>Submit
                    </button>
                </div>
            </form>
        </div>
    </div>

 <!-- Bootstrap CSS -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

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
            max-width: 800px;
        }

        .card-header {
            padding: 20px;
            background: linear-gradient(to left,blue,violet);
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

        .form-group-icon {
            position: relative;
        }

        .form-group-icon input,
        .form-group-icon select,
        .form-group-icon textarea {
            padding-right: 40px;
        }

        .form-group-icon .form-icon {
            position: absolute;
            top: 50%;
            right: 15px;
            transform: translateY(-50%);
            color: #aaa;
        }

        .form-group-icon input:focus + .form-icon,
        .form-group-icon textarea:focus + .form-icon,
        .form-group-icon select:focus + .form-icon {
            color: #4e73df;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
    $(document).ready(function () {
        $('#addUserForm').submit(function (event) {
            event.preventDefault(); 

            const formData = $(this).serialize();

            $.ajax({
                type: 'POST',
                url: $(this).attr('action'), // Optionally set an action URL if needed
                data: formData,
                success(response) {
                    displayFlashMessage('User added successfully!', 'alert-success');
                    $('#addUserForm')[0].reset();
                },
                error(xhr) {
                    const errorMessage = 'Error adding user: ' + (xhr.responseText || 'An unexpected error occurred.');
                    displayFlashMessage(errorMessage, 'alert-danger');
                }
            });
        });

        function displayFlashMessage(message, alertClass) {
            $('#flash-alert')
                .removeClass('d-none alert-success alert-danger')
                .addClass(alertClass)
                .text(message);
        }
    });
</script>

</body>

</html>
