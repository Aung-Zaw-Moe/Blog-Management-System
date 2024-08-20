<nav id="sidebar">
        <!-- Sidebar Header-->
        {{-- <div class="sidebar-header d-flex align-items-center bg-warning">
          <div class="avatar bg-info"><img src="admincss/img/avatar-12.jpg" height="80px" alt="..." class="img-fluid rounded-circle"></div>
          <div class="title">
            <h1 class="h5">Aung Zaw Moe</h1>
            <p>Web Developer</p>
          </div>
        </div> --}}
        <!-- Sidebar Navidation Menus--><span class="heading text-info ">Main Sidebar</span>
        <ul class="list-unstyled">
                <li class="active"><a href="{{ url('home') }}"> <i class="icon-home"></i>Home </a></li>
                <li class="text-white"><a href="{{ url('create') }}"> <i class="icon-grid"></i>Add-Post </a></li>
                <li class="text-white"><a href="{{ url('/show_post') }}"> <i class="fa fa-bar-chart"></i>Show-Post</a></li>
                {{-- <li><a href="forms.html"> <i class="icon-padnote"></i>Forms </a></li> --}}
                {{-- <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Example dropdown </a>
                  <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                    <li><a href="#">Page</a></li>
                    <li><a href="#">Page</a></li>
                    <li><a href="#">Page</a></li>
                  </ul>
                </li> --}}
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            <p style="color:rgb(9, 155, 33)!important;">
                                <i class="icon-logout"></i>{{ __('Log Out') }}
                            </p>
                            </x-dropdown-link>
                        </form>
                    {{-- <a href="login.html"> --}}
                     {{-- Login page --}}
                    {{-- </a> --}}
                </li>
                {{-- </ul><span class="heading">Extras</span> --}}
                {{-- <ul class="list-unstyled">
                <li> <a href="#"> <i class="icon-settings"></i>Demo </a></li>
                <li> <a href="#"> <i class="icon-writing-whiteboard"></i>Demo </a></li>
                <li> <a href="#"> <i class="icon-chart"></i>Demo </a></li>
                </ul> --}}
            </nav>
