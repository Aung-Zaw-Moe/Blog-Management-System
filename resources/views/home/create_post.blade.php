<!DOCTYPE html>
<html lang="en">
<head>
    <style type="text/css">
        .div_deg {
                    width: 400px;
                    height: 600px;
                    margin-left:40%;
                    margin-bottom: 30px;

                    }
        .title_deg { font-size: 30px; font-weight: bold; color: white; padding: 30px; }
        label { display: inline-block; width: 200px; color: white; font-size: 18px; font-weight: bold; }
        .field_deg {
            padding: 20px;

        }
    </style>
    @include('home.homecss')
</head>
<body>
    @include('sweetalert::alert')
    <div class="header_section">
        @include('home.header')

        <div class="div_deg border border-secondary rounded">
            <h3 class="title_deg">Add Post</h3>

            {{-- @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}

            <form action="{{ url('user_post') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="field_deg">
                    <label for="title">Title</label>
                    <input type="text" name="title" value="{{ old('title') }}" placeholder="your title...............">
                    @error('title')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="field_deg">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" placeholder="text...........">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                {{-- <div class="field_deg">
                    <label for="slug">Slug (optional)</label>
                    <input type="text" name="slug" value="{{ old('slug') }}">
                </div> --}}
                <div class="field_deg ">
                    <label for="image">Add Image</label>
                    <input type="file" name="image" class="border border-secondary text-light">
                     @error('image')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="field_deg">
                    <input type="submit" value="Add Post" class="btn btn-outline-info">
                </div>
            </form>
        </div>

        @include('home.footer')
    </div>
</body>
</html>
