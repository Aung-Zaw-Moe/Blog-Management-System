<div class="services_section layout_padding">
    <div class="container">
        <h1 class="services_taital text-dark">Blog Post</h1>
        <p class="services_text text-dark">Explore our latest blog posts and share your thoughts with us!</p>
        <div class="services_section layout_padding">
                <div class="row">
                    @foreach ($posts as $post)
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                <img src="/postimage/{{ $post->image }}" class="card-img-top" alt="{{ $post->title }}" style="height: 200px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title text-dark"><b>{{ $post->title }}</b></h5>
                                    <p class="card-text text-secondary">Post by: <b>{{ $post->name }}</b></p>
                                    <p class="card-text">Likes: {{ $post->likes }} | Comments: {{ $post->comments->count() }}</p>
                                </div>
                                <div class="card-footer bg-transparent border-top-0">
                                    <a href="{{ url('post_details', $post->id) }}" class="btn btn-dark btn-block">Read More</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>



{{--
<div class="services_section layout_padding">
    <div class="container">
        <h1 class="services_taital">Blog Post</h1>
        <p class="services_text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration</p>
        <div class="services_section_2">
            <div class="row">
                @foreach ($posts as $post)
                    <div class="col-md-4" style="padding:20px;">
                        <div>
                            <img style="margin-bottom: 20px; height:200px" width="350px" src="/postimage/{{ $post->image }}" class="services_img">
                        </div>
                        <h4>{{ $post->title }}</h4>
                        <p>Post by <b>{{ $post->name }}</b></p>
                        <p>Views: <i class="fa fa-solid fa-eye">{{ $post->views }}</i> | Likes: <i class="fa fa-solid fa-thumbs-up">{{ $post->likes }}</i></p>
                        <div class="btn_main"><a href="{{ url('post_details', $post->id) }}">Read More</a></div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div> --}}



