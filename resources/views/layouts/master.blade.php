<!DOCTYPE html>
<html>
    <head>
        {{-- Head section --}}
        @include('partials._head')
    </head>


    <body class="fixed-left">
        {!! Toastr::render() !!}
        <!-- Begin page -->
        <div id="wrapper">
            {{-- topbar section --}}
            @include('partials._header')

            {{-- left sidebar section --}}
            @include('partials._sidebar')

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">
                                                
                        <!-- error of success messages -->
                        @include('partials._messages')

                        <!-- content body -->
                        @yield('content')
                        <!-- content body -->
                            
                    </div> <!-- container -->
                </div> <!-- content -->

                {{-- footer section here --}}
                @include('partials._footer')

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->
            

        </div>
        <!-- END wrapper -->

        {{-- scripts section here --}}
        @include('partials._scripts')

    </body>
</html>