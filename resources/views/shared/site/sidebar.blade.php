    <!-- ナビゲーション -->
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <!-- 在庫リスト -->
                <li {{ Helper::set_active('storage') }}>
                    <a href="/storage/index"><i class="fa fa-cubes fa-fw"></i> 在庫リスト</a>
                </li>
                <!-- 入庫 -->
                <li {{ Helper::set_active('storage') }}>
                    <a href="/storage/in/create"><i class="fa fa-arrow-circle-up fa-fw"></i> 入庫</a>
                </li>
                <!-- 出庫 -->
                <li {{ Helper::set_active('storage') }}>
                    <a href="/storage/out/create"><i class="fa fa-arrow-circle-down fa-fw"></i> 出庫</a>
                </li>
                <!-- 履歴 -->
                <li {{ Helper::set_active('history') }}>
                    <a href="/history"><i class="fa fa-history fa-fw"></i> 在庫履歴</a>
                </li>
                <!-- アップロード -->
                <li {{ Helper::set_active('upload') }}>
                    <a href="/ht/upload"><i class="fa fa-cloud-upload fa-fw"></i> アップロード</a>
                </li>
                <!-- ログイン -->
                <li {{ Helper::set_active('login') }}>
                    <a href="/login"><i class="fa fa-shield fa-fw"></i> ログイン</a>
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->