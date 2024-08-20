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
                    <!-- Hidden input to store the post's slug -->
                    {{-- <input type="hidden" name="post_slug" value="{{ $post->slug }}"> --}}
                    <!-- Textarea for the comment body -->
                    <textarea name="comment_body" class="form-control" rows="3" required></textarea>
                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </form>
            </div>
                @forelse ($post->comments as $comment)
                    <div class="card card-body shadow-sm mt-3 border border-secondary" style="background: transparent;">
                        <div class="detail-area">
                            <h6 class="user-name mb-1 text-info">
                                <i class="fa-solid fa-user"></i>
                                @if ($comment->user)
                                    {{ $comment->user->name }}
                                @endif
                            </h6>
                            <h6>
                                <small class="text-primary float-end mb-3"><i class="fa-solid fa-calendar-days"></i>{{ $comment->created_at->format('d-m-y') }}</small>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
