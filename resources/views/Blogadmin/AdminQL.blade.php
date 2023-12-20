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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Quản Lý Page</title>
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
              <div class="navbar-header">
                <h1>Posts</h1>
              </div>
              <ul class="nav navbar-nav navbar-right">
                <li><a class="btn btn-danger " href="/addPost"><span class="glyphicon glyphicon-user"></span>Add Blog</a></li>
              </ul>
            </div>
          </nav>
          <form action="/deleteSelect" method="post">
            @csrf
        <table class="table" id="posts-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Featured</th>
                    <th>Status</th>
                    <th>Image</th>
                    <th>Excerpt</th>
                    <th>Content</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Update</th>
                    <th>Delete</th>
                    <th>Chọn</th>
                    <th><input id="select_all" type="checkbox">Chọn tất cả</th>
                </tr>
            </thead>
            <tbody>

                @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{$post->slug}}</td>
                        <td>{{ $post->is_featured ? 'Yes' : 'No' }}</td>
                        <td>{{ $post->status }}</td>
                        <td><img src="{{asset('storage/images/' .$post->image)}}" alt="hinh anh posts" width="60px" height="60px"></td>
                        <td>{{ $post->excerpt }}</td>
                        <td>{!!$post->content!!}</td>
                        <td>{{ $post->created_at }}</td>
                        <td>{{ $post->updated_at }}</td>
                       <td>
                            <a class="btn btn-primary " href="/update/{{$post->id}}">Update</a>
                        </td>
                        <td> <form action="{{'/deletePost/' .$post->id}}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-warning ">Delete</button>
                        </form></td>
                        <td><input value="{{$post->id}}" class="checkbox_id" name="ids[{{$post->id}}]"  type="checkbox"></td>
                    </tr>
                @endforeach

            </tbody>
            <button class="btn btn-danger " type="submit">Delete Seleted</button>
        </form>
        </table>
        {{ $posts->links() }}
        <form action="/quanlypageAdmin" method="GET">
            <input  type="text" name="search" placeholder="Search...">
            <button class="btn btn-success " type="submit">Search</button>
        </form> <br>

        <a class="btn btn-danger " href="/admin">Dang xuat</a>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        //// chon tat ca
        $(document).ready(function(){
            $('#select_all').change(function(){
                let selectAll = $(this).prop('checked');
                $('.checkbox_id').prop('checked', selectAll);
            });

        });

        @if(session('error'))
        Toastify({
            text: '{{session('error')}}',
            duration:3000,
            gravity: 'top',
            positionLeft: false,
            backgroundColor: '#ff6666',
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
