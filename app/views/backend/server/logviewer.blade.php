<section id="widget-grid" class="">
    <div class="row">
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="jarviswidget" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-collapsed="false" data-widget-sortable="false">
                <header>
                    <span class="widget-icon"> <i class="fa fa-server"></i> </span>
                    <h2>{{ Lang::get('server.h2_logviewer', array('name' => $server->name)) }} - console log - {{ $console_log_file }}</h2>
                </header>
                <div>
                    <div class="jarviswidget-editbox">
                    </div>
                    <div class="widget-body no-padding">
                    	<form class="smart-form">
                    		<div style="padding-top: 4px;padding-left: 4px;padding-right: 4px;">
                            <code style="font-family: monospace; white-space: pre; background: transparent; color: black;">{{ $console_log_contents }}</code>
                                <!--<iframe src="/backend/server/filemanager/view/{{ $server->id }}" style="width: 100%; height: 402px; border: none;" scrolling="false">
		                    	</iframe>-->
	                    	</div>
	                        <footer>
	                            <a class="btn btn-default" href="/backend#backend/server">{{ Lang::get('general.cancel') }}</a>
	                        </footer>
                    	</form>
                    </div>
                </div>
            </div>
        </article>
    </div>

    <div class="row">
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="jarviswidget" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-collapsed="false" data-widget-sortable="false">
                <header>
                    <span class="widget-icon"> <i class="fa fa-server"></i> </span>
                    <h2>{{ Lang::get('server.h2_logviewer', array('name' => $server->name)) }} - rpt log - {{ $rpt_log_file }}</h2>
                </header>
                <div>
                    <div class="jarviswidget-editbox">
                    </div>
                    <div class="widget-body no-padding">
                        <form class="smart-form">
                            <div style="padding-top: 4px;padding-left: 4px;padding-right: 4px;">
                            <code style="font-family: monospace; white-space: pre; background: transparent; color: black;">{{ $rpt_log_contents }}</code>
                                <!--<iframe src="/backend/server/filemanager/view/{{ $server->id }}" style="width: 100%; height: 402px; border: none;" scrolling="false">
                                </iframe>-->
                            </div>
                            <footer>
                                <a class="btn btn-default" href="/backend#backend/server">{{ Lang::get('general.cancel') }}</a>
                            </footer>
                        </form>
                    </div>
                </div>
            </div>
        </article>
    </div>

</section>
<!--
<script type="text/javascript">
    pageSetUp();
    var pagefunction = function()
    {
    };
    pagefunction();
</script>
-->