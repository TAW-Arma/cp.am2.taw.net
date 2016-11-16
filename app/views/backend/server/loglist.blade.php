<section id="widget-grid" class="">
    <div class="row">
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="jarviswidget" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-collapsed="false" data-widget-sortable="false">
                <header>
                    <span class="widget-icon"> <i class="fa fa-folder-open-o"></i> </span>
                    <h2>{{ Lang::get('server.h2_loglist_console') }}</h2>
                    <div class="widget-toolbar" role="menu">
                        <a href="/backend#backend/server" class="btn btn-default">{{ Lang::get('general.back') }}</a>
                    </div>
                </header>
                <div>
                    <div class="jarviswidget-editbox">
                    </div>
                    <div class="widget-body no-padding">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>{{ Lang::get('server.logfile_name') }}</th>
                                        <th style="width: 32px;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($console_logs as $log)
                                        <tr>
                                            <td>{{ basename($log) }}</td>
                                            <td style="width: 32px;">
                                                <a class="btn btn-success btn-xs" href="backend#backend/server/logviewer/{{ $server->id; }}/{{ base64_encode($log); }}"><i class="fa fa-arrow-down"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </div>

    <div class="row">
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="jarviswidget" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-collapsed="false" data-widget-sortable="false">
                <header>
                    <span class="widget-icon"> <i class="fa fa-folder-open-o"></i> </span>
                    <h2>{{ Lang::get('server.h2_loglist_rpt') }}</h2>
                    <div class="widget-toolbar" role="menu">
                        <a href="/backend#backend/server" class="btn btn-default">{{ Lang::get('general.back') }}</a>
                    </div>
                </header>
                <div>
                    <div class="jarviswidget-editbox">
                    </div>
                    <div class="widget-body no-padding">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>{{ Lang::get('server.logfile_name') }}</th>
                                        <th style="width: 32px;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rpt_logs as $log)
                                        <tr>
                                            <td>{{ basename($log) }}</td>
                                            <td style="width: 32px;">
                                                <a class="btn btn-success btn-xs" href="backend#backend/server/logviewer/{{ $server->id; }}/{{ base64_encode($log); }}"><i class="fa fa-arrow-down"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </div>

</section>
<script type="text/javascript">
    pageSetUp();
    var pagefunction = function()
    {
    };
    pagefunction();
</script>