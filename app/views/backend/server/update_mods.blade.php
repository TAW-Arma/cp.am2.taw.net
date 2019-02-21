<section id="widget-grid" class="">
    <div class="row">
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="jarviswidget" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-collapsed="false" data-widget-sortable="false">
                <header>
                    <span class="widget-icon"> <i class="fa fa-package"></i> </span>
                    <h2>{{ Lang::get('server.h2_map_mods_to_server') }}</h2>
                </header>
                <div>
                    <div class="jarviswidget-editbox">
                    </div>
                    <div class="widget-body no-padding">
                        <form action="/backend/server/update_mods/{{ $server->id }}" method="post" id="mods-form" novalidate="novalidate">
                            <div style="padding: 15px;">
                                <select multiple="multiple" name="mods[]" id="initializeDuallistbox">
                                    @foreach ($mods as $mod)
                                        <option value="{{ $mod }}"@if (in_array($mod, unserialize($server->mods))) selected="true" @endif>{{ $mod; }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="smart-form">
                                <footer>
                                    <button type="submit" class="btn btn-primary">{{ Lang::get('general.save') }}</button>
                                    <a class="btn btn-default" href="/backend#backend/server">{{ Lang::get('general.cancel') }}</a>
                                </footer>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </article>
    </div>
</div>
<script type="text/javascript">
    pageSetUp();
    var pagefunction = function() {
    };
    loadScript("assets/js/plugin/jquery-form/jquery-form.min.js", pagefunction);
    function initializeDuallistbox()
    {
        var initializeDuallistbox = $('#initializeDuallistbox').bootstrapDualListbox(
        {
            nonSelectedListLabel:       '{{ Lang::get('general.label_non_selected') }}',
            selectedListLabel:          '{{ Lang::get('general.label_selected') }}',
            preserveSelectionOnMove:    'moved',
            moveOnSelect:               true,
            nonSelectedFilter:          ''
        });
    }
    loadScript("assets/js/plugin/bootstrap-duallistbox/jquery.bootstrap-duallistbox.min.js", initializeDuallistbox);
</script>
