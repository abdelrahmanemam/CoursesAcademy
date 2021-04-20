<div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->

    <div class="logo"><a href="{{ route('backend.index') }}" class="simple-text logo-normal">
            Courses Academy
        </a></div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item active  ">
                <a class="nav-link" href="{{ route('backend.index') }}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>

            <li>
                <a class="nav-link" data-toggle="collapse" href="#three" aria-expanded="false" aria-controls="two">
                    <i class="material-icons">C</i>
                    <p>Courses</p>
                </a>
                <div class="collapse menuCollapse" id="three">
                        <a href="{{ route('backend.courses.index') }}">
                            <p>All Courses</p>
                        </a>

                        <a href="{{ route('backend.courses.create') }}">
                            <p>Create New</p>
                        </a>
                </div>
            </li>

            <li>
                <a class="nav-link" data-toggle="collapse" href="#two" aria-expanded="false" aria-controls="two">
                    <i class="material-icons">category</i>
                    <p>Categories</p>
                </a>
                <div class="collapse menuCollapse" id="two">
                    <a href="{{ route('backend.categories.index') }}">
                        <p>All Categories</p>
                    </a>

                    <a href="{{ route('backend.categories.create') }}">
                        <p>Create New</p>
                    </a>
                </div>
            </li>


            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#one" aria-expanded="false" aria-controls="nine">
                    <i class="material-icons">admin_panel_settings</i>
                    <p>Admins</p>
                </a>
                <div class="collapse menuCollapse" id="one">
                        <a href="{{route('backend.home.admins')}}">
                            <p>All Admins</p>
                        </a>
                        <a href="{{ route('backend.home.signup')}}">
                            <p>Create New</p>
                        </a>
                </div>
            </li>
            </li>
        </ul>
    </div>
</div>
