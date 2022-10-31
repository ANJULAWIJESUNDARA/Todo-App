<!-- Top Bar Start -->

<div class="topbar wrapper stack-top" id="info">
            <!-- Navbar -->
            <nav class="navbar-custom">
                <ul class="list-unstyled topbar-nav float-right mb-0">
                    {{-- notifications --}}
                    @php
                        $user = Auth::user();
                    @endphp

                    {{-- profile --}}
                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="" role="button"
                            aria-haspopup="false" aria-expanded="false">

                            <img src="{{ asset('assets/images/users/user-1.png') }}" alt="profile-user" class="rounded-circle"/> &nbsp; @if(!empty($user))
                            {{$user->name}}
                            @endif

                        </a>
                        <div class="dropdown-menu dropdown-menu-right">

                            <div class="dropdown-divider"></div>
                            @auth
                                <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();"><i class="dripicons-exit text-muted mr-2" ></i> Logout</a>
                                <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                                @endauth
                        </div>
                    </li>
                </ul><!--end topbar-nav-->

                <ul class="list-unstyled topbar-nav mb-0">
                    <li>
                        <a href="../analytics/analytics-index.html">
                            <span class="responsive-logo">
                                <img src="../assets/images/logo-sm.png" alt="logo-small" class="logo-sm align-self-center" height="34">
                            </span>
                        </a>
                    </li>
                    <li>
                        <button class="button-menu-mobile nav-link">
                            <i data-feather="menu" class="align-self-center"></i>
                        </button>
                    </li>

                </ul>
            </nav>
            <!-- end navbar-->
        </div>
        <!-- Top Bar End -->
