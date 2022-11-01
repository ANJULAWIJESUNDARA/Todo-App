
<!-- Left Sidenav -->
<div class="left-sidenav ">
    <!-- LOGO -->
    <div class="topbar-left" style="margin-top: -21px;">
        <a href="" class="logo">

            <span>
            </span>
        </a>
    </div>
    <!--end logo-->
    <ul class="metismenu left-sidenav-menu scroll">
        <!--slimscroll-->
        <br><br><br>
            <li class="leftbar-menu-item @if (Request::segment(1) == 'home' ||Request::segment(1) == '/') active @endif    ">
                <a href="{{ url('/home') }}" class="menu-link">
                    <i class="mdi mdi-guage"></i>
                    <span> Dashboard</span>
                </a>
            </li>

    </ul>
</div>
<!-- end left-sidenav-->
