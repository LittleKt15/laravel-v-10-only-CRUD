<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Bootstrap CSS Link --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    {{-- Fontawsome CSS Link --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Index Page</title>

    <style>
        body{
            padding: 100px
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="mb-3">
                    <h5 class="text-start">Post List
                        {{-- url('posts/create') --}}
                        <a href="{{ route('posts.create') }}" class="btn btn-primary btn-sm float-end">
                            <i class="fa-solid fa-plus"></i> Add New
                        </a>
                    </h5>
                </div>
                @if (Session('add'))
                    <div class="alert alert-primary rounded-4">
                        <strong>{{ Session('add') }}</strong>
                    </div>
                @endif
                @if (Session('info'))
                    <div class="alert alert-info rounded-4">
                        <strong>{{ Session('info') }}</strong>
                    </div>
                @endif
                @if (Session('del'))
                    <div class="alert alert-warning rounded-4">
                        <strong>{{ Session('del') }}</strong>
                    </div>
                @endif
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->content }}</td>
                                <td>
                                    <form action="{{ url('posts/'. $post->id .'') }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        {{-- url('posts/'. $post->id .'/edit') --}}
                                        <a class="btn btn-success btn-sm" href="{{ route('posts.edit', $post->id) }}">
                                            <i class="fa-solid fa-pen-to-square"></i> Edit
                                        </a>
                                        <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Are you sure you want to delete?')">
                                            <i class="fa-solid fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $posts->links() }}
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>

    {{-- Bootstrap JS Link --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
