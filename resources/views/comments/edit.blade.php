{{-- @extends('layouts.app')
@section('content') --}}


{{-- @endsection --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Post Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .comment-area {
            margin: auto;
            width: 50%;
            border: 3px solid rgb(183, 248, 183);
            padding: 10px;
            background: transparent;
        }
    </style>
     {{-- Fontawsome  --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-light">
    <div class="mt-2 mb-2 bg-image" style="background-image: url('background.png'); height: 100vh;">
        <div class="container" style="margin-top:20px;
            width: 50%;            
            padding: 10px;
            ">
            <div class="card">
                <div class="card-header">
                    <h2><b>Edit Comment</b><a href="{{ route('post.details', $comment->post_id) }}" class="btn btn-secondary btn-sm float-end">Back</a></h2>
                    
                </div>
                <div class="card-body">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form action="{{ route('comment.update', $comment->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="comment_body"><b>Comment:</b>
                            </label>
                            <textarea name="comment_body" id="comment_body" class="form-control @error('comment_body') is-invalid @enderror" rows="5">{{ old('comment_body', $comment->comment_body) }}</textarea>
                            @error('comment_body')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary">Update Comment</button>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>
</html>
