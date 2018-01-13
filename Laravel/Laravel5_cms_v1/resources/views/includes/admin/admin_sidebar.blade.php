<aside class="main-sidebar">

    <section class="sidebar">

        <ul class="sidebar-menu">

            <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>

            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Posts</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('posts') }}"><i class="fa fa-circle-o"></i>All Posts</a></li>
                    <li class="active"><a href="{{ route('post_add') }}"><i class="fa fa-circle-o"></i>Add Post</a></li>
                </ul>
            </li>

        </ul>

    </section>

</aside>