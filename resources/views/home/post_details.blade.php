{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <base href="/public">
    @include('home.homecss')
</head>
<body class="bg-dark">
    <!-- header section start -->
    <div class="header_section">
        @include('home.header')
        <!-- banner section start -->
        <!-- banner section end -->
    </div>
    <div style="text-align: center;" class="col-md-12">
        <div>
            <img style="padding: 20px; height:700px; width:500px; margin:auto;" src="/postimage/{{ $post->image }}">
        </div>
        <h3 class="text-primary"><b>{{ $post->title }}</b></h3>
        <h4 class="text-primary">{{ $post->description }}</h4>
        <p class="text-white">Post by : <b>{{ $post->name }}</b></p>
        <p class="text-white">Views: <i class="fa fa-solid fa-eye text-white">{{ $post->views }}</i> | Likes: <i class="fa fa-solid fa-thumbs-up text-white">{{ $post->likes }}</i></p>
        <form action="{{ url('like_post', $post->id) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary text-white">Like</button>
        </form>
    </div>
    @include('home.footer')
</body>
</html> --}}


<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/public">
    @include('home.homecss')
</head>
<body class="bg-dark">
    <!-- header section start -->
    <div class="header_section">
        @include('home.header')
        <!-- banner section start -->
        <!-- banner section end -->
    </div>
    <div style="text-align: center;" class="col-md-12">
        <div>
            <img style="padding: 20px; height:700px; width:500px; margin:auto;" src="/postimage/{{ $post->image }}">
        </div>
        <h3 class="text-primary"><b>{{ $post->title }}</b></h3>
        <h4 class="text-primary">{{ $post->description }}</h4>
        <p class="text-white">Post by : <b>{{ $post->name }}</b></p>

    </div>
    @include('home.footer')
</body>
</html>
