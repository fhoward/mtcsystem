<header class="main-header">
    <!-- Logo -->
    <a href="{{ url('/admin/home') }}" class="logo"
       style="font-size: 16px;">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">
           MTC</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">
           Milestones Therapy System</span>
    </a>


    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role= "navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

          {{--   <ul class="navi navbar-nav navbar-right">
                @if (Auth::guest())
               
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                @endif
                    
            </ul> --}}
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
                
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="{{ asset(env('UPLOAD_PATH').'/thumb/' . Auth::user()->avatar) }}" class="user-image" alt="User Image">
                  <span class="hidden-xs">{{Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="{{ asset(env('UPLOAD_PATH').'/thumb/' . Auth::user()->avatar) }}" class="img-circle" alt="User Image">
                    <p>
                      {{Auth::user()->name }}
                      <small>Member since {{Auth::user()->created_at }}</small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                    <li class="user-body ">
                  <div class=" text-center">
                      <a href="{{ route('auth.change_password') }}"><i class="fa fa-key"></i>Change Password</a>
                   <li class="">
{{--                 <a href="">
                    <i class="fa fa-key"></i>
                    <span class="title">Change password</span>
                </a> --}}
                    </li>
                    

                  </li>

                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="/admin/home" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="#logout" onclick="$('#logout').submit();" class="btn btn-default btn-flat">Sign out
                        {{-- <span class="title">@lang('quickadmin.qa_logout')</span> --}}
                        </a>
                    </div>
                    </li>
                    </ul>
                    </li>
                    </ul>
                    </div>       

    </nav>



</header>
{{-- <style>
        .navi{
            margin-top: 2%;
            margin-right: 2%;
            color: white;
        }
</style>
 --}}
