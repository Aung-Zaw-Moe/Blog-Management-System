<!DOCTYPE html>
<html lang="en">

<head>
    <style type="text/css">
        .div_deg {
            text-align: center;
        }

        .title_deg {
            font-size: 30px;
            font-weight: bold;
            color: white;
            padding: 30px;
        }

        label {
            display: inline-block;
            width: 200px;
            color: white;
            font-size: 18px;
            font-weight: bold;
        }

        .field_deg {
            padding: 20px;
        }
    </style>
    @include('home.homecss')

</head>

<body>
    @include('sweetalert::alert')
    <!-- header section start -->
    <div class="header_section">
        @include('home.header')

        <div class="div_deg">
            <h3 class="title_deg">Add Post</h3>
            <form action="{{ url('user_post') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="field_deg">
                    <label for="">Title</label>
                    <input type="text" name="title">
                </div>
                <div class="field_deg">
                    <label for="">Description</label>
                    <textarea name="desription" id=""></textarea>
                </div>
                <div class="field_deg">
                    <label for="">Add Image</label>
                    <input type="file" name="image">
                </div>
                <div class="field_deg">
                    <input type="submit" value="Add Post" class="btn btn-outline-info">
                </div>

            </form>
        </div>

        @include('home.footer')
</body>

</html>