
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
            <li class="leftbar-menu-item @if (Request::segment(1) == 'contact-group' ||Request::segment(1) == 'home') active @endif    ">
                <a href="{{ url('contact-group') }}" class="menu-link">
                    <i class="mdi mdi-phone"></i>
                    <span> Contact Group</span>
                </a>
            </li>
            <li class="leftbar-menu-item @if (Request::segment(1) == 'contacts') active @endif    ">
                <a href="{{ url('contacts') }}" class="menu-link">
                    <i class="mdi mdi-phone"></i>
                    <span> Contacts</span>
                </a>
            </li>
    </ul>
</div>
<!-- end left-sidenav-->
