<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Menu</li>
            <li>
                <a href="{{route('counselor.home.dashboard')}}">
                    <i class="fa fa-home"></i>
                    <span>Dashboard</span>
                    <span class="pull-right-container"></span>
                </a>
            </li>
            <li>
                <a href="{{route('counselor.coupon.generator')}}">
                    <i class="fa fa-ticket"></i>
                    <span>Generate Kupon</span>
                    <span class="pull-right-container"></span>
                </a>
            </li>
            <li>
                <a href="{{route('counselor.profile.edit')}}">
                    <i class="fa fa-cog"></i>
                    <span>Profile</span>
                    <span class="pull-right-container"></span>
                </a>
            </li>
            <li>
                <a href="{{route('counselor.report.list')}}">
                    <i class="fa fa-list"></i>
                    <span>Report</span>
                    <span class="pull-right-container"></span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
