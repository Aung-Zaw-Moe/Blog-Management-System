<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Post Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <style>
        .comment-area {
            margin: auto;
            width: 50%;
            border: 3px solid rgb(183, 248, 183);
            padding: 10px;
            background: transparent;
        }
    </style>
</head>

<body class="bg-dark">
    <div class="mt-2 mb-2 bg-image" style="background-image: url('background.png'); height: 100vh;">
        @if (session('message'))
            <h5 class="alert alert-warning mb-3">{{ session('message') }}</h5>
        @endif
        <div class="comment-area">
            <div class="card card-body border border-secondary" style="background: transparent;">
                <h5 class="card-title text-info"><b>Leave Comment</b></h5>
                <!-- Form for submitting a comment -->
                <form action="{{ url('comments') }}" method="POST">
                    @csrf
                    <textarea name="comment_body" class="form-control" rows="3" required></textarea>
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </form>
            </div>
            @forelse ($post->comments as $comment)
                <div class="card card-body shadow-sm mt-3 border border-secondary" style="background: transparent;">
                    <div class="detail-area">
                        <h6 class="user-name mb-1 text-info">
                            <i class="fa-solid fa-user"></i>
                            @if ($comment->user)
                                <a href="{{ route('profile.show', $comment->user->id) }}" class="text-info">
                                    {{ $comment->user->name }}
                                </a>
                            @endif
                        </h6>
                        <h6>
                            <small class="text-primary float-end mb-3">
                                <i class="fa-solid fa-comment"></i> {{ $comment->created_at->format('d-m-y') }}
                            </small>
                        </h6>
                        <p class="user-comment mb-1 text-light">
                            {!! $comment->comment_body !!}
                        </p>
                    </div>
                    @if (Auth::check() && Auth::id() == $comment->user_id)
                        <div>
                            <a href="#" class="btn btn-primary btn-sm me-2 float-end">Edit</a>
                            <a href="#" class="btn btn-danger btn-sm me-2 float-end">Delete</a>
                        </div>
                    @endif
                </div>
            @empty
                <div class="card card-body shadow-sm mt-3 border border-secondary" style="background: transparent;">
                    <h6>No Comments Yet</h6>
                </div>
            @endforelse
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
