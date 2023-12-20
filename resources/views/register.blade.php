<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration User Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <h1 class="card-header">Register User</h1>
                <div class="card-body">
                    <form action="/dangkyuser" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" >
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" >
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" >
                        </div>
                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                        </div>
                        <button type="submit" class="btn btn-primary">Register</button>
                        <a href="/" class="btn btn-primary ">Home Login</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
         @if($errors->any())
        @foreach($errors->all() as $error)
            Toastify({
                text: '{{ $error }}',
                duration: 3000,
                gravity: 'top',
                positionLeft: false,
                backgroundColor: '#ff6666',
            }).showToast();
        @endforeach
    @endif

    @if(session('error'))
        Toastify({
            text: '{{session('error')}}',
            duration:3000,
            gravity: 'top',
            positionLeft: false,
            backgroundColor: '#33cc33',
        }).showToast();

    @endif
    @if(session('success'))
        Toastify({
            text: '{{ session('success') }}',
            duration: 3000,
            gravity: 'top',
            positionLeft: false,
            backgroundColor: '#33cc33',
        }).showToast();
    @endif


</script>
</body>
</html>
