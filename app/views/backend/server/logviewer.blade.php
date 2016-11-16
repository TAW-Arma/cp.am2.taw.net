<section id="widget-grid" class="">
    <div class="row">
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="jarviswidget" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-collapsed="false" data-widget-sortable="false">
                <header>
                    <span class="widget-icon"> <i class="fa fa-server"></i> </span>
                    <h2>{{ Lang::get('server.h2_logviewer', array('name' => $filename)) }}</h2>
                    <div class="widget-toolbar" role="menu">
                        <a href="/backend#backend/server/loglist/{{ $server->id; }}" class="btn btn-default">{{ Lang::get('general.back') }}</a>
                    </div>
                </header>
                <div>
                    <div class="jarviswidget-editbox">
                    </div>
                    <div class="widget-body no-padding">
                        <form class="smart-form">
                            <div style="padding-top: 4px;padding-left: 4px;padding-right: 4px;">
                                <code style="font-family: monospace; white-space: pre; background: transparent; color: black;">{{ $contents; }}</code>
                            </div>
                            <footer>
                                <a class="btn btn-default" href="/backend#backend/server/loglist/{{ $server->id; }}">{{ Lang::get('general.back') }}</a>
                            </footer>
                        </form>
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