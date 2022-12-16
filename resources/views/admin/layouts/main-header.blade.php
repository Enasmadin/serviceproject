<!--=================================
header start-->
<nav class="admin-header navbar navbar-default col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <!-- logo -->
    <div class="text-left navbar-brand-wrapper">
        <a class="navbar-brand brand-logo"">&nbsp;
            <i class="fa fa-truck" aria-hidden="true"></i>
            <em>Talabia</em></a>
        <a class="navbar-brand brand-logo-mini"">&nbsp;
            <i class="fa fa-truck" aria-hidden="true"></i>
            <em>Talabia</em></a>


    </div>
    <!-- Top bar left -->
    <ul class="nav navbar-nav mr-auto">
        <li class="nav-item">
            <a id="button-toggle" class="button-toggle-nav inline-block ml-50 pull-left" href="javascript:void(0);"><i
                    class="zmdi zmdi-menu ti-align-right"></i></a>
        </li>
    </ul>


    <li class="nav-item dropdown p-0 fixed-top d-flex flex-row">
        <a id="navbarDropdown" class="nav-link" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false" v-pre href="#">
            <div class="d-flex flex-md-row-reverse">
                <div class="d-flex flex-column justify-content-center align-items-center text-capitalize">
                    <span>
                        {{ Auth::user()->name }}
                    </span>

                </div>

            </div>
        </a>

        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
        

            <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                {{ __('خروج') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </li>
    </ul>
</nav>