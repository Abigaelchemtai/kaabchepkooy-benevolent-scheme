<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Kaabchepkooy Benevolent Fund</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #f5f5dc, #cce3f6); /* beige to light blue */
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', sans-serif;
        }
        .card {
            border: none;
            border-radius: 1.5rem;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #004c8c !important; /* deep blue */
            color: white;
            border-radius: 1.5rem 1.5rem 0 0;
        }
        .btn-primary {
            background-color: #004c8c;
            border: none;
        }
        .btn-primary:hover {
            background-color: #006bb6;
        }
        .form-label {
            font-weight: 600;
            color: #004c8c;
        }
        .text-link {
            color: #004c8c;
        }
        .text-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-header text-center py-3">
                    <h4>Create an Account</h4>
                </div>
                <div class="card-body px-4 py-4">
                    <!-- Laravel Error Display -->
                    @if ($errors->any())
                        <div class="alert alert-danger">{{ $errors->first() }}</div>
                    @endif

                    <!-- Registration Form -->
                    <form method="POST" action="{{ route('register-user') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="surname" class="form-label">Surname</label>
                            <input type="text" name="surname" id="surname" class="form-control rounded-pill" required>
                        </div>
                    

                        <div class="mb-3">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" name="first_name" id="first_name" class="form-control rounded-pill" required>
                        </div>

                        <div class="mb-3">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" name="last_name" id="last_name" class="form-control rounded-pill" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" name="email" id="email" class="form-control rounded-pill" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control rounded-pill" required>
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control rounded-pill" required>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg rounded-pill">Register</button>
                        </div>
                    </form>

                    <div class="text-center mt-3">
                        <small>Already have an account?
                            <a href="{{ route('login') }}" class="text-link fw-bold">Login here</a>
                            <a href="{{ route('home') }}" class="text-decoration-none d-block mt-2">← Back to Home</a>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
