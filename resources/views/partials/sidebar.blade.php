@inject('request', 'Illuminate\Http\Request')
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" style="font-size: 15px;  ">
        <ul class="sidebar-menu">
   
   {{--          <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">
                <a href="{{ url('/') }}">
                    <i class="fa fa-wrench"></i>
                    <span class="title">@lang('quickadmin.qa_dashboard')</span>
                </a>
            </li> --}}
{{--             @if(auth::check())
            <li><strong>{{ Auth::user()->email}}</li>
            <li>{{ Auth::user()->role->title}}</li><
            @else
            @endif --}}
            @can('user_management_access')
            
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span class="title">@lang('quickadmin.user-management.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                
                @can('user_access')
                <li class="{{ $request->segment(2) == 'users' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.users.index') }}">
                            <i class="fa fa-user-md"></i>
                            <span class="title">
                                @lang('quickadmin.users.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('role_access')
                <li class="{{ $request->segment(2) == 'roles' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.roles.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span class="title">
                                @lang('quickadmin.roles.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('profession_access')
                <li class="{{ $request->segment(2) == 'professions' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.professions.index') }}">
                            <i class="fa fa-folder"></i>
                            <span class="title">
                                @lang('quickadmin.professions.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('user_action_access')
                <li class="{{ $request->segment(2) == 'user_actions' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.user_actions.index') }}">
                            <i class="fa fa-th-list"></i>
                            <span class="title">
                                @lang('quickadmin.user-actions.title')
                            </span>
                        </a>
                    </li>
                @endcan
                </ul>
            </li>
            @endcan
            @can('appointment_request_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-phone-square"></i>
                    <span class="title">@lang('quickadmin.appointment-request.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                
                @can('contact_company_access')
                <li class="{{ $request->segment(2) == 'contact_companies' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.contact_companies.index') }}">
                            <i class="fa fa-building-o"></i>
                            <span class="title">
                                @lang('quickadmin.contact-companies.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('contact_access')
                <li class="{{ $request->segment(2) == 'contacts' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.contacts.index') }}">
                            <i class="fa fa-user-plus"></i>
                            <span class="title">
                                @lang('quickadmin.contacts.title')
                            </span>
                        </a>
                    </li>
                @endcan
                </ul>
            </li>
            @endcan
            @can('patient_access')
            <li class="{{ $request->segment(2) == 'patients' ? 'active' : '' }}">
                <a href="{{ route('admin.patients.index') }}">
                    <i class="fa fa-user"></i>
                    <span class="title">@lang('quickadmin.patients.title')</span>
                </a>
            </li>
            @endcan
            
            @can('schedule_access')
            <li class="{{ $request->segment(2) == 'schedules' ? 'active' : '' }}">
                <a href="{{ route('admin.schedules.index') }}">
                    <i class="fa fa-calendar"></i>
                    <span class="title">@lang('quickadmin.schedules.title')</span>
                </a>
            </li>
            @endcan
            
             <li> 
                <a href="{{url('admin/calendar')}}">
                  <i class="fa fa-calendar"></i>
                  <span class="title">
                    Calendar
                  </span>
                </a>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-line-chart"></i>
                    <span class="title">Charts Report</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                   <li class="{{ $request->is('/reports/patient-report') }}">
                        <a href="{{ url('/admin/reports/patient-report') }}">
                            <i class="fa fa-line-chart"></i>
                            <span class="title">Patient Report</span>
                        </a>
                    </li>   <li class="{{ $request->is('/reports/employee-report') }}">
                        <a href="{{ url('/admin/reports/employee-report') }}">
                            <i class="fa fa-line-chart"></i>
                            <span class="title">Employee Report</span>
                        </a>
                    </li>
                </ul>
            </li>

            

         {{--    <li class="{{ $request->segment(1) == 'change_password' ? 'active' : '' }}">
                <a href="{{ route('auth.change_password') }}">
                    <i class="fa fa-key"></i>
                    <span class="title">Change password</span>
                </a>
            </li>

            <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">@lang('quickadmin.qa_logout')</span>
                </a>
            </li> --}}
        </ul>
    </section>
</aside>
{!! Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']) !!}
<button type="submit">@lang('quickadmin.logout')</button>
{!! Form::close() !!}
