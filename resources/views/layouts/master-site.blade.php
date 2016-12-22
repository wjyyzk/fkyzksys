<!DOCTYPE html>
<html lang="ja">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="深谷在庫システム">
    <meta name="author" content="矢崎部品大東工場-技術管理">

    <title>深谷在庫システム - @yield('title')</title>

    @include('shared.site.css-script')

  </head>

  <body>

    <div id="wrapper">

      <!-- Navigation -->
      <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">

        @include('shared.site.header')

        @include('shared.site.sidebar')

      </nav>

      @yield('content')

      @include('shared.site.footer')

    </div>
    <!-- /#wrapper -->

    @include('shared.site.js-script')

  </body>

</html>