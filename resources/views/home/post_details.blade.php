    <!DOCTYPE html>
    <html lang="en">
    <head>
        <base href="/public">
        @include('home.homecss')
        {{-- Fontawsome  --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body class="bg-light">
        <!-- Header Section -->
        <div class="header_section mb-3">
            @include('home.header')
        </div>

        <!-- Post Details -->
        <div style="text-align: center;" class="col-md-12 border border-4">
            <div class="card mt-3 mb-3" style="width: 500px; margin: 0 auto;">
                <img style="padding: 20px; height: 300px; width: 100%; object-fit: cover;" src="/postimage/{{ $post->image }}" alt="Post Image">
                <div class="card-body">
                    <h3 class="card-title"><b>{{ $post->title }}</b></h3>
                    <p class="card-text">{{ $post->description }}</p>
                    <p class="card-text">Posted by : <b>{{ $post->name }}</b></p>
                    <p class="card-text">Views: <i class="fa-solid fa-eye"></i> {{ $post->views }} | Likes: <i class="fa-solid fa-thumbs-up"></i> {{ $post->likes }}</p>

                    <!-- Like Button -->
                    <form action="{{ route('like.post', $post->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        <button type="submit" class="btn btn-success btn-sm"><i class="fa-solid fa-heart"></i> Like</button>
                        <span>{{ $post->likes }} Likes</span>
                    </form>

                    <!-- Comment Link -->
                    <a href="{{ route('comment.create', $post->id) }}" class="btn btn-primary btn-sm ml-3 "><i class="fa-solid fa-comment"></i> Comment</a>
                </div>

                <!-- Comments Section -->
                <div class="mt-1 p-3">
                    <h5 class="text-dark">Comments</h5>
                    @forelse ($post->comments as $comment)
                        <div class="card card-body shadow-sm mt-3 border border-secondary" style="background: transparent;">
                            <div class="detail-area">
                                <h6 class="user-name mb-1 text-info float-left">
                                    <i class="fa-solid fa-user"></i>
                                    @if ($comment->user)
                                        {{ $comment->user->name }}
                                    @endif
                                </h6>
                                <h6>
                                    <small class="text-primary float-right"><i class="fa-solid fa-calendar-days"></i> {{ $comment->created_at->format('d-m-y') }}</small>
                                </h6><br>
                                <p class="user-comment mb-1 text-black float-left">
                                    <b>{!! $comment->comment_body !!}</b>
                                </p>
                            </div>
                            @if (Auth::check() && Auth::id() == $comment->user_id)
                                <div class="">
                                    <!-- Edit Comment Link -->
                                    <a href="{{ route('comment.edit', $comment->id) }}" class="btn btn-primary btn-sm me-2 float-right">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>

                                    <!-- Delete Comment Form -->
                                    <form action="{{ route('comment.delete', $comment->id) }}" method="POST" class="d-inline-block float-right">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm float-end">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    @empty
                        <div class="card card-body shadow-sm mt-3 border border-secondary" style="background: transparent;">
                            <h6>No Comments Yet</h6>
                        </div>
                    @endforelse
                </div>

                <!-- Add Comment Form -->
                <form action="{{ route('post.comment', $post->id) }}" method="POST" class="p-3 ">
                    @csrf
                    <div class="form-group">
                        <textarea name="comment_body" class="form-control" rows="3" placeholder="Add a comment" required></textarea>
                        @error('comment_body')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa-solid fa-paper-plane"></i> Send</button>

                    <!-- Cancel Button -->
                    <button type="button" class="btn btn-secondary btn-sm" onclick="cancelComment()"><i class="fa-solid fa-comment-slash"></i> Cancel</button>
                    <a href="{{ route('home') }}" class="btn btn-danger btn-sm"><i class="fa fa-home" aria-hidden="true"></i> Back_To_Home </a>

                </form>
            </div>
        </div>

        <!-- Footer Section -->
        @include('home.footer')

        <!-- JavaScript for Cancel Button -->
        <script>
            function cancelComment() {
                if (confirm('Are you sure you want to cancel? Your comment will be lost.')) {
                    document.querySelector('textarea[name="comment_body"]').value = ''; // Clear the textarea
                }
            }
        </script>
    </body>
    </html>
