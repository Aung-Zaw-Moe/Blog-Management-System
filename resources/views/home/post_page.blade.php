<!DOCTYPE html>
<html lang="en">
   <head>
    <base href="/public">
    @include('home.homecss')
    <style type="text/css">
        .div_deg
        {
            text-align: center;
            width: 430px;
            height: 600px;
            margin-left:40%;
        }
        .img_deg
        {
            height: 50px;
            width: 80px;
            margin: auto;
        }
        .current_img_deg
        {
            height: 50px;
            width: 100px;
            margin: auto;
            float: left;
            
        }
        label
        {
            font-size: 8px;
            font-weight: bold;
            width: 100px;
            color:white;
        }
        .input_deg
        {
            padding: 2px;
            
        }
        .title_deg
        {
            padding: 10px;
            font-size: 30px ;
            font-weight: bold;
            color: white;
            margin-bottom: 20px;
        }
    </style>

   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
         @include('home.header')
        <div class="div_deg border border-secondary rounded">
            @if(session()->has('message'))
            <div class="alert alert-success m-2">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{ session()->get('message') }}
            </div>
            @endif
            <h1 class="title_deg ">Update Post</h1>
            <form action="{{ url('update_post_data',$data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 row">
                    <div class="input_deg">
                        <label for="">Title</label>
                        <input type="text" name="title" value="{{ $data->title }}">
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="input_deg">
                        <label for="">Descrition</label>
                        <textarea name="description">{{ $data->description }}</textarea>
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="current_img_deg">
                        <label for=""></label>
                        <img name="image" class="" src="/postimage/{{ $data->image }}">
                        @error('image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="input_deg" style="margin-top: 40px; ">
                        <label for="">ChangeImage</label>
                        <input type="file" name="image" class="border border-secondary rounded text-light" style="">
                        @error('image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                {{-- <div class="input_deg">
                    <label for="comment">Comment</label>
                    <textarea name="comment" required></textarea>
                     @error('comment')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div> --}}
                <div class="input_deg">
                    <input type="submit" class="btn btn-outline-info" value="Update">
                </div>
            </form>

            {{-- <form action="{{ url('update_post_data', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="input_deg">
                    <label for="">Title</label>
                    <input type="text" name="title" value="{{ $data->title }}">
                </div>
                <div class="input_deg">
                    <label for="">Description</label>
                    <textarea name="description">{{ $data->description }}</textarea>
                </div>
                <div class="input_deg">
                    <label for="">Current Image</label>
                    <img class="img_deg" src="/postimage/{{ $data->image }}">
                </div>
                <div class="input_deg">
                    <label for="">Change Current Image</label>
                    <input type="file" name="image">
                </div>
                <div class="input_deg">
                    <label for="">View and Likes</label>
                    <input type="text" name="view_and_likes" value="{{ $data->view_and_likes }}" readonly>
                </div>
                <div class="input_deg">
                    <input type="submit" class="btn btn-outline-info" value="Update">
                </div>
            </form> --}}

        </div>
      </div>

      @include('home.footer')
   </body>
</html>
