<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <title>Blogs Webpage</title>
</head>
<body>

    Userblog




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>

@if(session('success'))
        Toastify({
            text: '{{ session('success') }}',
            duration: 3000,
            gravity: 'top',
            positionLeft: false,
            backgroundColor: '#33cc33',
        }).showToast();
    @endif
    @if(session('error'))
        Toastify({
            text: '{{session('error')}}',
            duration:3000,
            gravity: 'top',
            positionLeft: false,
            backgroundColor: '#ff6666',
        }).showToast();

    @endif
    </script>
</body>
</html>
