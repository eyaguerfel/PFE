
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js" lang=""> <!--<![endif]-->
    <head>
    @include('layout.head')
    </head>

    <body>
        <!-- Left Panel -->
        <aside id="left-panel" class="left-panel">
            @include ('layout.nav')
        </aside>
        <!-- /#left-panel -->
        <!-- Right Panel -->
        <div id="right-panel" class="right-panel">
            <!-- Header-->
            @include('layout.header')
            <!-- /#header -->
            <!-- Content -->
            <div class="content">
                <!-- Animated -->
                <div class="animated fadeIn">
                    <!-- Widgets  -->
                    @include ('layout.widgets')
                    <!-- /Widgets -->
                    <!--  Traffic  -->
                    @include ('layout.traffic')
                    <!--  /Traffic -->
                    <div class="clearfix"></div>
                    <!-- Orders -->
                    @include('layout.orders')
                    <!-- /.orders -->
                    <!-- To Do and Live Chat -->
                    @include('layout.todoandchat')
                    <!-- /To Do and Live Chat -->
                    <!-- Calender Chart Weather  -->
                    @include('layout.my_calender')

                    <!-- /#add-category -->
                </div>
                <!-- .animated -->
            </div>
            <!-- /.content -->
            <div class="clearfix"></div>
            <!-- Footer -->
            @include('layout.footer')
            <!-- /.site-footer -->
        </div>
        <!-- /#right-panel -->
        <!-- Scripts -->
        @include('layout.script')
    </body>
</html>