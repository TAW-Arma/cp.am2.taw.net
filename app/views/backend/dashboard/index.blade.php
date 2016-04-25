<section id="widget-grid" class="">
    <div class="row">
        <article class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <div class="jarviswidget" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-collapsed="false" data-widget-sortable="false">
                <header>
                    <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                    <h2>{{ Lang::get('dashboard.cpu') }}</h2>
                </header>
                <div>
                    <div class="jarviswidget-editbox">
                    </div>
                    <div class="widget-body no-padding">
                        <img class="img-responsive" src="https://observium.jaapjolman.nl/graph.php?device=123&height=250&width=700&legend=no&type=device_processor" />
                    </div>
                </div>
            </div>
        </article>
        <article class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <div class="jarviswidget" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-collapsed="false" data-widget-sortable="false">
                <header>
                    <span class="widget-icon"> <i class="fa fa-exchange"></i> </span>
                    <h2>{{ Lang::get('dashboard.network') }}</h2>
                </header>
                <div>
                    <div class="jarviswidget-editbox">
                    </div>
                    <div class="widget-body no-padding">
                        <img class="img-responsive" src="https://observium.jaapjolman.nl/graph.php?device=123&height=250&width=700&legend=no&type=device_bits" />
                    </div>
                </div>
            </div>
        </article>
    </div>
    <div class="row">
        <article class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <div class="jarviswidget" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-collapsed="false" data-widget-sortable="false">
                <header>
                    <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                    <h2>{{ Lang::get('dashboard.memory') }}</h2>
                </header>
                <div>
                    <div class="jarviswidget-editbox">
                    </div>
                    <div class="widget-body no-padding">
                        <img class="img-responsive" src="https://observium.jaapjolman.nl/graph.php?device=123&height=250&width=700&legend=yes&type=device_mempool"/>
                    </div>
                </div>
            </div>
        </article>
        <article class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <div class="jarviswidget" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-collapsed="false" data-widget-sortable="false">
                <header>
                    <span class="widget-icon"> <i class="fa fa-hdd-o"></i> </span>
                    <h2>{{ Lang::get('dashboard.filesystem') }}</h2>
                </header>
                <div>
                    <div class="jarviswidget-editbox">
                    </div>
                    <div class="widget-body no-padding">
                        <img class="img-responsive" src="https://observium.jaapjolman.nl/graph.php?device=123&height=250&width=700&legend=yes&type=device_storage" />
                    </div>
                </div>
            </div>
        </article>
    </div>
</div>
<script type="text/javascript">
    pageSetUp();
    var pagefunction = function()
    {
    };
    pagefunction();
</script>
