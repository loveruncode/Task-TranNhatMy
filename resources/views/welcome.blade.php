<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="#">Blogs Website</a>
          </div>
          <ul class="nav navbar-nav navbar-right">
            <li><a class="btn btn-warning" href="/admin"><span class="glyphicon glyphicon-log-in"></span> Login for Admin</a></li>
          </ul>
        </div>
      </nav>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <h1 class="card-header">Login for User</h1>
                <div class="card-body">
                    <form action="/loginuser" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label">Email: </label>
                            <input type="text" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="remember" name="remember">
                            <label class="form-check-label" for="remember">Remember me</label>
                        </div>
                        <button class="btn btn-primary">Login</button>
                        <a href="/register" class="btn btn-primary">Register</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
     <script>
        @if(session('error'))
        Toastify({
            text: '{{ session('error') }}',
            duration: 3000,
            gravity: 'top-left',
            positionLeft: false,
            backgroundColor: '#ff6666',
        }).showToast();
    @endif
     </script>
</body>
</html>
