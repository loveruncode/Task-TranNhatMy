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
    <title>Update Post</title>
</head>
<body>

<div class="container mt-5">

    <h2>Update Post :</h2>

    <form action="/updateForm/{{$id}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label"> Nhập Title Mới :</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>

        <div class="mb-3">
            <label for="is_featured" class="form-label">Is Featured</label>
            <select class="form-select" id="is_featured" name="is_featured" required>
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status" required>
                <option value="published">Published</option>
                <option value="draft">Draft</option>
                <option value="pending">Pending</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image mới</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>

        <div class="mb-3">
            <label for="excerpt" class="form-label">Excerpt</label>
            <textarea class="form-control" id="excerpt" name="excerpt" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label"> Nhập Content mới</label>
            <textarea class="form-control" id="content" name="content" rows="10"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a class="btn btn-success" href="/quanlypageAdmin">Quản Lý Posts Page</a>
    </form>
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
    @if(session('success'))
        Toastify({
            text: '{{ session('success') }}',
            duration: 3000,
            gravity: 'top',
            positionLeft: false,
            backgroundColor: '#33cc33',
        }).showToast();
    @endif




        ClassicEditor
        .create(document.querySelector('#content'))
        .catch(error => {
            console.error(error);
        });

        </script>


</body>
</html>
