<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    @hasrole('Users')
    <li class="active treeview">
        <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="active"><a href="{{ url('admin/permissions') }}"><i class="fa fa-circle-o"></i> Permissions</a></li>
            <li><a href="{{ url('admin/roles') }}"><i class="fa fa-circle-o"></i> Roles</a></li>
            <li><a href="{{ url('admin/users') }}"><i class="fa fa-circle-o"></i> Users</a></li>
        </ul>
    </li>
    @endhasrole
<!--    <li class="treeview">
        <a href="#">
            <i class="fa fa-edit"></i> <span>CSV Uploader</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{ url('admin/csv_uploader') }}"><i class="fa fa-circle-o"></i> Map CSV</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Update Page</a></li>
        </ul>
    </li>-->
    <li class="treeview">
        <a href="#">
            <i class="fa fa-search"></i> <span>Research</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{ route('research_view') }}"><i class="fa fa-circle-o"></i>List</a></li>
        </ul>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-search"></i> <span>Training</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{ url('admin/training_view') }}"><i class="fa fa-circle-o"></i>List</a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-search"></i> <span>Map Color Range</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{ url('admin/map_color_range_view') }}"><i class="fa fa-circle-o"></i>List</a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-search"></i> <span>General Post</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{ url('admin/general_post_view') }}"><i class="fa fa-circle-o"></i>List</a></li>
        </ul>
    </li>
    
    
    <li class="treeview">
        <a href="#">
            <i class="fa fa-search"></i> <span>Databank</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{ url('admin/databank') }}"><i class="fa fa-circle-o"></i>List</a></li>
        </ul>
    </li>
</ul>