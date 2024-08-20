{{-- <!DOCTYPE html>
<html lang="en">
   <head>
    <base href="/public">
    @include('home.homecss')
    <style type="text/css">
        .post_deg
        {
            padding: 30px;
            text-align: center;
            background-color:transparent;
            height: 50%;
        }
        .title_deg
        {
            font-size: 30px;
            font-weight: bold;
            padding: 15px;
            color: white;
        }
        .des_deg
        {
            font-size: 18px;
            font-weight: bold;
            padding: 15px;
            color: whitesmoke;
        }
        .img_deg
        {
            height: 200px;
            width: 300px;
            padding: 30px;
            margin: auto;
        }
    </style>

   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
         @include('home.header')
         @if(session()->has('message'))

         <div class="alert alert-success m-2">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{ session()->get('message') }}
         </div>
         @endif

         @foreach ($data as $data)
            <div  class="post_deg">
                <img class="img_deg" src="/postimage/{{ $data->image }}">
                <h4 class="title_deg">{{ $data->title }}</h4>
                <p class="des_deg">{{ $data->desription }}</p>
                <a onclick="return confirm('Are you sure to delete this?')" href="{{ url('my_post_del',$data->id) }}" class="btn btn-danger">Delete</a>
                <a href="{{url('post_update_page',$data->id)}}" class="btn btn-primary">Update</a>

            </div>
         @endforeach

      </div>

      @include('home.footer')
   </body>
</html> --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Blog</title>
    {{-- Bootstrap Css --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <div class="services_section layout_padding" >
        <div class="container">
            <h1 class="services_taital text-dark mt-2"><b>My Blog Post</b></h1>
            <p class="services_text text-dark">These blog posts are posts created by users who are currently logged in.</p>
            <div class="services_section layout_padding">
                <div class="row">
                    @foreach ($data as $post)
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                <img class="card-img-top" src="/postimage/{{ $post->image }}" alt="{{ $post->title }}" style="height: 200px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title text-dark">{{ $post->title }}</h5>
                                    <p class="card-text text-secondary">{{ $post->description }}</p>
                                </div>
                                <div class="card-footer bg-transparent border-top-0 d-flex justify-content-between">
                                    <a href="{{ url('my_post_del', $post->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this?')">Delete</a>
                                    <a href="{{ url('post_update_page', $post->id) }}" class="btn btn-info btn-sm">Update</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    {{-- Bootstrap Js --}}
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>




