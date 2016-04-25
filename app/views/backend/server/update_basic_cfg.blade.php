<section id="widget-grid" class="">
    <div class="row">
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="jarviswidget" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-collapsed="false" data-widget-sortable="false">
                <header>
                    <span class="widget-icon"> <i class="fa fa-server"></i> </span>
                    <h2>{{ Lang::get('server.h2_basic', array('name' => $server->name)) }}</h2>
                </header>
                <div>
                    <div class="jarviswidget-editbox">
                    </div>
                    <div class="widget-body no-padding">
                        <form action="/backend/server/update_basic_cfg/{{ $server->id }}" method="post" id="server-form" class="smart-form" novalidate="novalidate">
                            <fieldset>
                                <div class="row">
                                    <section class="col col-6">
                                        <label for="language">
                                            {{ Lang::get('server.basic_label_language') }}
                                        </label>
                                        <label class="input">
                                            <input type="text" name="language" placeholder="{{ Lang::get('server.basic_label_language') }}" value="{{ $server->server_basic_cfg->language }}" />
                                        </label>
                                    </section>
                                    <section class="col col-6">
                                        <label for="adapter">
                                            {{ Lang::get('server.basic_label_adapter') }}
                                        </label>
                                        <label class="input">
                                            <input type="text" name="adapter" placeholder="{{ Lang::get('server.basic_label_adapter') }}" value="{{ $server->server_basic_cfg->adapter }}" />
                                        </label>
                                    </section>
                                </div>
                                <div class="row">
                                    <section class="col col-6">
                                        <label for="performance_3d">
                                            {{ Lang::get('server.basic_label_performance_3d') }}
                                        </label>
                                        <label class="input">
                                            <input type="text" name="performance_3d" placeholder="{{ Lang::get('server.basic_label_performance_3d') }}" value="{{ $server->server_basic_cfg->performance_3d }}" />
                                        </label>
                                    </section>
                                    <section class="col col-6">
                                        <label for="resolution_w">
                                            {{ Lang::get('server.basic_label_resolution_w') }}
                                        </label>
                                        <label class="input">
                                            <input type="text" name="resolution_w" placeholder="{{ Lang::get('server.basic_label_resolution_w') }}" value="{{ $server->server_basic_cfg->resolution_w }}" />
                                        </label>
                                    </section>
                                </div>
                                <div class="row">
                                    <section class="col col-6">
                                        <label for="resolution_h">
                                            {{ Lang::get('server.basic_label_resolution_h') }}
                                        </label>
                                        <label class="input">
                                            <input type="text" name="resolution_h" placeholder="{{ Lang::get('server.basic_label_resolution_h') }}" value="{{ $server->server_basic_cfg->resolution_h }}" />
                                        </label>
                                    </section>
                                    <section class="col col-6">
                                        <label for="resolution_bpp">
                                            {{ Lang::get('server.basic_label_resolution_bpp') }}
                                        </label>
                                        <label class="input">
                                            <input type="text" name="resolution_bpp" placeholder="{{ Lang::get('server.basic_label_resolution_bpp') }}" value="{{ $server->server_basic_cfg->resolution_bpp }}" />
                                        </label>
                                    </section>
                                </div>
                                <div class="row">
                                    <section class="col col-6">
                                        <label for="windowed">
                                            {{ Lang::get('server.basic_label_windowed') }}
                                        </label>
                                        <div class="inline-group">
                                            <label class="radio">
                                                <input type="radio" name="windowed" value="1" @if ($server->server_basic_cfg->windowed == 1) checked="true" @endif />
                                                <i></i>{{ Lang::get('general.yes') }}
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="windowed" value="0" @if ($server->server_basic_cfg->windowed == 0) checked="true" @endif />
                                                <i></i>{{ Lang::get('general.no') }}
                                            </label>
                                        </div>
                                    </section>
                                    <section class="col col-6">
                                        <label for="min_bandwidth">
                                            {{ Lang::get('server.basic_label_min_bandwidth') }}
                                        </label>
                                        <label class="input">
                                            <input type="text" name="min_bandwidth" placeholder="{{ Lang::get('server.basic_label_min_bandwidth') }}" value="{{ $server->server_basic_cfg->min_bandwidth }}" />
                                        </label>
                                    </section>
                                </div>
                                <div class="row">
                                    <section class="col col-6">
                                        <label for="max_bandwidth">
                                            {{ Lang::get('server.basic_label_max_bandwidth') }}
                                        </label>
                                        <label class="input">
                                            <input type="text" name="max_bandwidth" placeholder="{{ Lang::get('server.basic_label_max_bandwidth') }}" value="{{ $server->server_basic_cfg->max_bandwidth }}" />
                                        </label>
                                    </section>
                                    <section class="col col-6">
                                        <label for="max_msg_send">
                                            {{ Lang::get('server.basic_label_max_msg_send') }}
                                        </label>
                                        <label class="input">
                                            <input type="text" name="max_msg_send" placeholder="{{ Lang::get('server.basic_label_max_msg_send') }}" value="{{ $server->server_basic_cfg->max_msg_send }}" />
                                        </label>
                                    </section>
                                </div>
                                <div class="row">
                                    <section class="col col-6">
                                        <label for="max_size_guaranteed">
                                            {{ Lang::get('server.basic_label_max_size_guaranteed') }}
                                        </label>
                                        <label class="input">
                                            <input type="text" name="max_size_guaranteed" placeholder="{{ Lang::get('server.basic_label_max_size_guaranteed') }}" value="{{ $server->server_basic_cfg->max_size_guaranteed }}" />
                                        </label>
                                    </section>
                                    <section class="col col-6">
                                        <label for="max_size_non_guaranteed">
                                            {{ Lang::get('server.basic_label_max_size_non_guaranteed') }}
                                        </label>
                                        <label class="input">
                                            <input type="text" name="max_size_non_guaranteed" placeholder="{{ Lang::get('server.basic_label_max_size_non_guaranteed') }}" value="{{ $server->server_basic_cfg->max_size_non_guaranteed }}" />
                                        </label>
                                    </section>
                                </div>
                                <div class="row">
                                    <section class="col col-6">
                                        <label for="min_error_to_send_near">
                                            {{ Lang::get('server.basic_label_min_error_to_send_near') }}
                                        </label>
                                        <label class="input">
                                            <input type="text" name="min_error_to_send_near" placeholder="{{ Lang::get('server.basic_label_min_error_to_send_near') }}" value="{{ $server->server_basic_cfg->min_error_to_send_near }}" />
                                        </label>
                                    </section>
                                    <section class="col col-6">
                                        <label for="min_error_to_send">
                                            {{ Lang::get('server.basic_label_min_error_to_send') }}
                                        </label>
                                        <label class="input">
                                            <input type="text" name="min_error_to_send" placeholder="{{ Lang::get('server.basic_label_min_error_to_send') }}" value="{{ $server->server_basic_cfg->min_error_to_send }}" />
                                        </label>
                                    </section>
                                </div>
                                <div class="row">
                                    <section class="col col-6">
                                        <label for="max_custom_file_size">
                                            {{ Lang::get('server.basic_label_max_custom_file_size') }}
                                        </label>
                                        <label class="input">
                                            <input type="text" name="max_custom_file_size" placeholder="{{ Lang::get('server.basic_label_max_custom_file_size') }}" value="{{ $server->server_basic_cfg->max_custom_file_size }}" />
                                        </label>
                                    </section>
                                    <section class="col col-6">
                                        <label for="server_longitude">
                                            {{ Lang::get('server.basic_label_server_longitude') }}
                                        </label>
                                        <label class="input">
                                            <input type="text" name="server_longitude" placeholder="{{ Lang::get('server.basic_label_server_longitude') }}" value="{{ $server->server_basic_cfg->server_longitude }}" />
                                        </label>
                                    </section>
                                </div>
                                <div class="row">
                                    <section class="col col-6">
                                        <label for="server_latitude">
                                            {{ Lang::get('server.basic_label_server_latitude') }}
                                        </label>
                                        <label class="input">
                                            <input type="text" name="server_latitude" placeholder="{{ Lang::get('server.basic_label_server_latitude') }}" value="{{ $server->server_basic_cfg->server_latitude }}" />
                                        </label>
                                    </section>
                                    <section class="col col-6">
                                        <label for="server_longitude_auto">
                                            {{ Lang::get('server.basic_label_server_longitude_auto') }}
                                        </label>
                                        <label class="input">
                                            <input type="text" name="server_longitude_auto" placeholder="{{ Lang::get('server.basic_label_server_longitude_auto') }}" value="{{ $server->server_basic_cfg->server_longitude_auto }}" />
                                        </label>
                                    </section>
                                </div>
                                <div class="row">
                                    <section class="col col-6">
                                        <label for="server_latitude_auto">
                                            {{ Lang::get('server.basic_label_server_latitude_auto') }}
                                        </label>
                                        <label class="input">
                                            <input type="text" name="server_latitude_auto" placeholder="{{ Lang::get('server.basic_label_server_latitude_auto') }}" value="{{ $server->server_basic_cfg->server_latitude_auto }}" />
                                        </label>
                                    </section>
                                    <section class="col col-6">
                                    </section>
                                </div>
                            </fieldset>
                            <footer>
                                <button type="submit" class="btn btn-primary">{{ Lang::get('general.save') }}</button>
                                <a class="btn btn-default" href="/backend#backend/server">{{ Lang::get('general.cancel') }}</a>
                            </footer>
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
        var $checkoutForm = $('#server-form').validate({
            rules : {
                name : {
                    required : true
                },
            },
            messages : {
                name : {
                    required : 'Please enter a name'
                },
            },
            errorPlacement : function(error, element) {
                error.insertAfter(element.parent());
            }
        });
    };
    loadScript("assets/js/plugin/jquery-form/jquery-form.min.js", pagefunction);
</script>
