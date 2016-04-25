<!DOCTYPE html>
<html lang="en-us">
    <head>
        @include('layouts.backend.assets')
    </head>
    <body class="fixed-header fixed-navigation fixed-ribbon fixed-page-footer">
       @include('layouts.backend.header')
        <aside id="left-panel">
            @include('layouts.backend.user-info')
            @include('layouts.backend.navigation')
        </aside>
        <div id="main" role="main">
            <div id="ribbon">
                <span class="ribbon-button-alignment"> 
                    <span id="refresh" class="btn btn-ribbon" data-action="resetWidgets" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings." data-html="true">
                        <i class="fa fa-refresh"></i>
                    </span> 
                </span>
                <ol class="breadcrumb"></ol>
            </div>
            <div id="content">
            </div>
        </div>
        @include('layouts.backend.footer')
        @include('layouts.backend.shortcuts')
        @include('layouts.backend.scripts')
    </body>
</html>