    <!-- ナビゲーション -->
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <!-- 在庫リスト -->
                <li>
                    <a href="#a">
                        <i class="fa fa-cubes fa-fw"></i> 在庫リスト<span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="/admin/storage/index"> 一覧</a>
                        </li>
                        @if ( Auth::user()->role == '管理者')
                            <li>
                                <a href="/admin/storage/create"> 作成</a>
                            </li>
                        @endif
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                @if ( Auth::user()->role == '管理者')
                <!-- QR発行ラベル -->
                <li>
                    <a href="/admin/print/index">
                        <i class="fa fa-print fa-fw"></i> QR発行ラベル
                    </a>
                </li>
                @endif
                @if ( Auth::user()->role == '管理者')
                <!-- 業者 -->
                <li>
                    <a href="#b">
                        <i class="fa fa-truck fa-fw"></i> 業者<span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="/admin/merchant/index"> 一覧</a>
                        </li>
                        <li>
                            <a href="/admin/merchant/create"> 作成</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                @endif
                @if ( Auth::user()->role == '管理者')
                <!-- 担当者 -->
                <li>
                    <a href="#b">
                        <i class="fa fa-user fa-fw"></i> 担当者<span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="/admin/pic/index"> 一覧</a>
                        </li>
                        <li>
                            <a href="/admin/pic/create"> 作成</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                @endif
                @if ( Auth::user()->role == '管理者')
                <!-- ユーザー -->
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
                @endif
                <!-- 深谷画面 -->
                <li>
                    <a href="/storage/index">
                        <i class="fa fa-reply fa-fw"></i> 入出庫画面
                    </a>
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->