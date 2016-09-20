    <!-- ナビゲーション -->
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <!-- 在庫リスト -->
                <li {{ Helper::set_active('storage') }}>
                    <a href="/storage"> 在庫リスト</a>
                </li>
                <!-- ログイン -->
                <li {{ Helper::set_active('login') }}>
                    <a href="/login"> ログイン</a>
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->