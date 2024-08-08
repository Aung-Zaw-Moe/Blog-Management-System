<!DOCTYPE html>
<html>
  <head>
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
      <!-- Sidebar Navigation-->
      @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        @if (session()->has('message'))
            <div class="alert alert-success m-1">
                <button type="button" class="close" data-dismiss="alert" aria-hideen="true">x</button>
                {{ session()->get('message') }}
            </div>
        @endif


        <div class="container mt-6">
          <div class="card border border-success">
            <div class="card-header justify-content-between font-weight-bold bg-info text-dark border-bottom">
              <b>Create New Movie</b>
              <a class="text-success float-right" href="{{ url('show_post') }}">
                <button type="button" class="btn btn-outline-dark btn-sm">
                  <i class="metismenu-icon pe-7s-back"></i> Back
                </button>
              </a>
            </div>
            <div class="card-body bg-black text-white border border-success">
              <form action="{{ url('add_post') }}" method="POST" enctype="multipart/form-data" class="">
                @csrf
                <div class="row text-light">
                  <div class="col-xs-12 col-sm-12 col-md-12 ">
                    <div class="form-group row">
                      <label for="title" class="col-sm-2 col-form-label mb-2 text-white">Title</label>
                      <div class="col-sm-10">
                        <input type="text" name="title" id="title" class="form-control border border-dark"  placeholder="Title............." required />
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="description" class="col-sm-2 col-form-label mb-2 text-white">Description</label>
                      <div class="col-sm-10">
                        <textarea name="description" id="description" class="form-control border border-dark" placeholder="Bla..Bla..........."></textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="image" class="col-sm-2 col-form-label mb-2 text-white">Image</label>
                      <div class="col-sm-10">
                        <input type="file" name="image" id="image" class="form-control border border-dark" required />
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-2"></div>
                      <div class="d-grid gap-2 col-2  mx-auto">
                        <button type="submit" name="submit" id="submit" class="btn btn-outline-light">
                          SUBMIT
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
