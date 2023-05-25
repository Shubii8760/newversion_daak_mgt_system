<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        {{-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
        <span class="brand-text font-weight-light">Daak_Management_System</span>
    </a>


    <div class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('assets/images/avatar.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>




        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" id="navMenus" data-widget="treeview" role="menu"
                data-accordion="false">
                @if (Auth::user()->role_id == '1')
                    <li class="nav-item ">
                        <a href="/Admin-Dashboard" class="nav-link ">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p> Dashboard </p>
                        </a>
                    </li>
                @endif


                <li class="nav-item">
                    <a href="{{ route('view') }}" class="nav-link ">
                        <i class="nav-icon far fa-envelope"></i>
                        <p>
                            Mailbox
                            {{-- <i class="fas fa-angle-left right"></i> --}}
                        </p>
                    </a>
                    {{-- <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="pages/mailbox/mailbox.html" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Inbox</p>
                             </a>
                         </li>
                     </ul> --}}
                </li>

                {{-- to only show this part to admin --}}
                @if (Auth::user()->role_id == '1')
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            {{-- {{ route('user.profile') }} --}}
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Users
                            </p>
                        </a>
                    </li>
                @endif

                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p> Logout</p>
                    </a>
                </li>
            </ul>
        </nav>

    </div>

</aside>

{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $('li').on('click', function() {
        // Remove the active class from all other li elements
        $('li.active').removeClass('active');

        // Add the active class to the current li element
        $(this).addClass('active');
    });
</script> --}}
