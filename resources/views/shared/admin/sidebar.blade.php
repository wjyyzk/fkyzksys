    <!-- ナビゲーション -->
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <!-- 在庫リスト -->
                <li>
                    <a href="#a">
                        <i class="fa fa-inbox fa-fw"></i> 在庫リスト<span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="/admin/storage/index"> 一覧</a>
                        </li>
                        <li>
                            <a href="/admin/storage/create"> 作成</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <!-- QR発行ラベル -->
                <li>
                    <a href="/admin/print/index">
                        <i class="fa fa-print fa-fw"></i> QR発行ラベル
                    </a>
                </li>
                <!-- ログイン -->
                <li>
                    <a href="#b">
                        <i class="fa fa-users fa-fw"></i> ユーザー<span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="/admin/user/index"> 一覧</a>
                        </li>
                        <li>
                            <a href="/admin/user/create"> 作成</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->