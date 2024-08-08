<!DOCTYPE html>
<html>
  <head>
    <base href="/public">
    @include('admin.css')
    <style type="text/css">
      .post_title {
        font-size: 30px;
        font-weight: bold;
        text-align: center;
        padding: 30px;
      }
    </style>
  </head>
  <body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
      @include('admin.sidebar')
      <div class="page-content bg-white">
        @if (session()->has('message'))
            <div class="alert alert-success m-1">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{ session()->get('message') }}
            </div>
        @endif

        <div class="container mt-6">
          <div class="card border border-success">
            <div class="card-header justify-content-between font-weight-bold bg-primary text-dark border-bottom">
              Edit Page
              <a class="text-success float-right" href="{{ url('show_post') }}">
                <button type="button" class="btn btn-outline-dark btn-sm">
                  <i class="metismenu-icon pe-7s-back"></i> Back
                </button>
              </a>
            </div>
            <div class="card-body bg-dark border border-success">
              <form action="{{ url('update_post', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row text-light">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group row">
                      <label for="title" class="col-sm-2 col-form-label mb-2">Title</label>
                      <div class="col-sm-10">
                        <input type="text" name="title" id="title" class="form-control border border-success" value="{{ $post->title }}" required />
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="description" class="col-sm-2 col-form-label mb-2">Description</label>
                      <div class="col-sm-10">
                        <textarea name="description" id="description" class="form-control border border-success" required>{{ $post->description }}</textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="old_image" class="col-sm-2 col-form-label mb-2">Old Image</label>
                      <div class="col-sm-10">
                        <img src="/postimage/{{ $post->image }}" class="img-fluid" alt="Old Image" height="100px" width="150px" style="margin:left;">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="image" class="col-sm-2 col-form-label mb-2">New Image</label>
                      <div class="col-sm-10">
                        <input type="file" name="image" id="image" class="form-control border border-success" />
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-2"></div>
                      <div class="d-grid gap-2 col-2 mx-auto">
                        <button type="submit" name="submit" id="submit" class="btn btn-outline-primary">
                          Update
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    @include('admin.footer')
  </body>
</html>
