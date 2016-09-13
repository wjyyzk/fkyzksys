
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{ asset('/assets/js/jquery.js') }}"></script>
    <script src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>
    <script class="include" type="text/javascript" src="{{ asset('/assets/js/jquery.dcjqaccordion.2.7.js') }}"></script>
    <script src="{{ asset('/assets/js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ asset('/assets/js/jquery.nicescroll.js') }}" type="text/javascript"></script>

    <!--common script for all pages-->
    <script src="{{ asset('/assets/js/common-scripts.js') }}"></script>
    <script src="{{ asset('/assets/js/jquery-ui-1.9.2.custom.min.js') }}"></script>

    @stack('js-script')