    <!--sidebar start-->
    <aside>
        <div id="sidebar"  class="nav-collapse ">
            <!-- sidebar menu start-->
            <ul class="sidebar-menu" id="nav-accordion">
                
                <li class="sub-menu">
                    <a class="{{ Request::segment(2) === 'storage' ? 'active' : '' }}" href="javascript:;" >
                        <i class="fa fa-edit"></i>
                        <span>在庫リスト</span>
                    </a>
                    <ul class="sub">
                        <li class="{{ Request::is('admin/storage') ? 'active' : '' }}">
                            <a  href="{{ url('admin/storage') }}">一覧</a>
                        </li>
                        <li class="{{ Request::is('admin/storage/create') ? 'active' : '' }}">
                            <a  href="{{ url('admin/storage/create') }}">作成</a>
                        </li>
                    </ul>
                </li>

                <li class="sub-menu">
                    <a class="{{ Request::segment(2) === 'user' ? 'active' : '' }}" href="javascript:;" >
                        <i class="fa fa-group"></i>
                        <span>ユーザー</span>
                    </a>
                    <ul class="sub">
                        <li class="{{ Request::is('admin/user') ? 'active' : '' }}">
                            <a  href="{{ url('admin/user') }}">一覧</a>
                        </li>
                        <li class="{{ Request::is('admin/user/create') ? 'active' : '' }}">
                            <a  href="{{ url('admin/user/create') }}">作成</a>
                        </li>
                    </ul>
                </li>

            </ul>
            <!-- sidebar menu end-->
        </div>
    </aside>
    <!--sidebar end-->