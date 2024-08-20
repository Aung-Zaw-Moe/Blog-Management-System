<!DOCTYPE html>
<html>
  <head>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.12.4/sweetalert2.min.js" integrity="sha512-w4LAuDSf1hC+8OvGX+CKTcXpW4rQdfmdD8prHuprvKv3MPhXH9LonXX9N2y1WEl2u3ZuUSumlNYHOlxkS/XEHA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}

    @include('admin.css')
    <style type="text/css" class="">
        .title_deg{
            font-size: 30px;
            font-weight: bold;
            color: white;
            padding: 30px;
            text-align:center;
        }
        .table_deg{
            border:1px solid white;
            width: 80%;
            text-align: center;
            margin-left: 20px;
            margin-right: 0px;
        }
        .th_deg{
            background-color: rgb(47, 184, 243);
            color: black;


        }
        .IMG_DEG{
            text-align: center;
        }
    </style>
  </head>
  <body>
    <div class="container-sm">
                @include('admin.header')
                <div class="d-flex align-items-stretch">
                <!-- Sidebar Navigation-->
                @include('admin.sidebar')
                <!-- Sidebar Navigation end-->
                <div class="page-content">
                    @if (session()->has('message'))
                        <div class="alert alert-danger m-1">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    <h1 class="title_deg">All Post</h1>
                    <table class="table table-bordered border-white m-3">
                        <tr class="th_deg">
                            <th>Post Title</th>
                            <th>Description</th>
                            <th>Post By</th>
                            <th>Post Status</th>
                            <th>UserType</th>
                            <th>Image</th>
                            <th>Action</th>
                            <th>Accept & Reject</th>
                        </tr>
                        @foreach ($post as $post)
                            <tr class="bg-dark text-white" >
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->description }}</td>
                                <td>{{ $post->name }}</td>
                                <td>{{ $post->post_status }}</td>
                                <td>{{ $post->userType }}</td>
                                <td class="IMG_DEG">
                                    <img src="postimage/{{ $post->image }}" alt="" width="50" height="50"  >
                                </td>
                                <td>
                                    {{-- <a href="{{ url('delete_post',$post->id)}}" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are You sure to delete this')">Delete</a> --}}
                                    <a href="{{ url('delete_post',$post->id)}}" class="btn btn-outline-danger btn-sm" onclick="confirmation(event )">Delete</a>
                                    <a href="{{ url('edit_page',$post->id)}}" class="btn btn-outline-success btn-sm" >Edit</a>
                                </td>
                                <td class="50">
                                    <a onclick="return confirm('Are you Sure to accept this post?')" href="{{ url('accept_post',$post->id)}}" class="btn btn-outline-info btn-sm" >Accept</a>
                                    <a onclick="return confirm('Are you Sure to reject this post?')" href="{{ url('reject_post',$post->id)}}" class="btn btn-outline-warning btn-sm" >Reject</a>
                                </td>
                            </tr>
                        @endforeach

                    </table>
                </div>

                @include('admin.footer')

                {{-- <script type="text/javascript">
                    function confirmation(ev)
                    {
                        ev.preventDefault();
                        var urlToRedirect = ev.currentTarget.getAttribute('href');
                        console.log(urlToRedirect);
                        swal({
                            title:"Are You Sure to delete this?",
                            text:"You won't be able to revent this delete",
                            icon:"warning",
                            buttons: true,
                            dangerMode: true,

                        })
                        .then((willCancel)=>
                    {
                        if(willCancel)
                        {
                            window.location.href = urlToRedirect;

                        }
                    });
                    }
                </script> --}}
    </div>
  </body>
</html>
