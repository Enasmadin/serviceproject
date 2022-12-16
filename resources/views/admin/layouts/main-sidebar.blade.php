<div class="container-fluid ">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg" style="overflow: scroll">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->




                    <!-- users-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Grades-menu">
                            <div class="pull-left"><i class="fas fa-school"></i><span class="right-nav-text">عرض
                                    المستخدمين</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Grades-menu" class="collapse" data-parent="#sidebarnav">

                             <li><a href="{{ route('users.index') }}">قائمة المشرفين العام الجدد</a></li> 
                             <li><a href="{{ route('admines.index') }}">قائمة المستخدمين</a></li> 

                        </ul>
                    </li>
                   
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#content-menu">
                            <div class="pull-left"><i class="fas fa-chalkboard"></i></i><span
                                    class="right-nav-text">إدارة محتوى الموقع</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                       <ul id="content-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('admin.services.index') }}"> الخدمات</a></li>
                            <li><a href="{{ route('admin.orders.index') }}"> الطلبيات</a></li>
                           
                        </ul> 
                    </li>



                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================