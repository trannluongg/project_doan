<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <img src="{{ asset('upload/avatar/'. \Illuminate\Support\Facades\Auth::guard('admins')->user()->avatar) }}" class="img-circle elevation-2" alt="User Image" style="width: 36px;height: 36px;margin-top: -6px;margin-right: 4px;object-fit: cover">
                <span>{{ \Illuminate\Support\Facades\Auth::guard('admins')->user()->name ?? '' }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <div>
                    <img src="{{ asset('upload/avatar/'. \Illuminate\Support\Facades\Auth::guard('admins')->user()->avatar) }}" class="img-circle elevation-2" alt="User Image" style="width: 90px;height: 90px;margin: 15px auto 0 auto;display: block;object-fit: cover">
                    <span style="text-align: center;display: block;margin: 15px 0;">{{ \Illuminate\Support\Facades\Auth::guard('admins')->user()->name ?? '' }}</span>
                    <div class="media-body" >
                        <div class="pull-left" style="float: left; margin-left: 10px; margin-bottom: 10px">
                            <a href="" class="btn btn-default btn-flat">Profile</a>
                        </div>
                        <div class="pull-right" style="float: right; margin-right: 10px; margin-bottom: 10px">
                            <a href="{{ route('post.admin.logout', ['token' => \App\Core123\Auth\AuthMe::token('admins')]) }}" class="btn btn-default btn-flat">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </li>
    </ul>
</nav>
