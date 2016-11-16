<section id="widget-grid" class="">
    <div class="row">
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="jarviswidget" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-collapsed="false" data-widget-sortable="false">
                <header>
                    <span class="widget-icon"> <i class="fa fa-server"></i> </span>
                    <h2>{{ Lang::get('server.h2_create') }}</h2>
                </header>
                <div>
                    <div class="jarviswidget-editbox">
                    </div>
                    <div class="widget-body no-padding">
                        <form action="/backend/server/create" method="post" id="server-form" class="smart-form" novalidate="novalidate">
                            <fieldset>
                                <div class="row">
                                    <section class="col col-6">
                                        <label for="name">
                                            {{ Lang::get('server.label_instance_name') }}
                                        </label>
                                        <label class="input">
                                            <input type="text" name="name" placeholder="{{ Lang::get('server.label_instance_name') }}" />
                                        </label>
                                    </section>
                                    <section class="col col-6">
                                        <label for="hostname">
                                            {{ Lang::get('server.label_hostname') }}
                                        </label>
                                        <label class="input">
                                            <input type="text" name="hostname" placeholder="{{ Lang::get('server.label_hostname') }}" value="TAW.net - EU - " />
                                        </label>
                                    </section>
                                </div>
                                <div class="row">
                                    <section class="col col-6">
                                        <label for="cpu_count">
                                            {{ Lang::get('server.label_cpu_count') }}
                                        </label>
                                        <label class="select">
                                            <select class="input-sm" name="cpu_count">
                                                <option value="0" selected="true">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                            <i></i>
                                        </label>
                                    </section>
                                    <section class="col col-6">
                                        <label for="ex_threads">
                                            {{ Lang::get('server.label_ex_threads') }}
                                        </label>
                                        <label class="select">
                                            <select class="input-sm" name="ex_threads">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7" selected="true">7</option>
                                            </select>
                                            <i></i>
                                        </label>
                                    </section>
                                </div>
                                <div class="row">
                                    <section class="col col-6">
                                        <label for="memory">
                                            {{ Lang::get('server.label_memory') }}
                                        </label>
                                        <label class="select">
                                            <select class="input-sm" name="memory">
                                                <option value="256">256</option>
                                                <option value="512">512</option>
                                                <option value="768">768</option>
                                                <option value="1024">1024</option>
                                                <option value="1536">1536</option>
                                                <option value="2047" selected="true">2047</option>
                                            </select>
                                            <i></i>
                                        </label>
                                    </section>
                                    <section class="col col-6">
                                        <label for="port">
                                            {{ Lang::get('server.label_port') }}
                                        </label>
                                        <label class="input">
                                            <input type="text" name="port" placeholder="{{ Lang::get('server.label_port') }}" value="230" />
                                        </label>
                                    </section>
                                </div>
                                <div class="row">
                                    <section class="col col-6">
                                        <label for="private_password">
                                            {{ Lang::get('server.label_private_password') }}
                                        </label>
                                        <label class="input">
                                            <input type="text" name="private_password" placeholder="{{ Lang::get('server.label_private_password') }}" value="education" />
                                        </label>
                                    </section>
                                    <section class="col col-6">
                                        <label for="admin_password">
                                            {{ Lang::get('server.label_admin_password') }}
                                        </label>
                                        <label class="input">
                                            <input type="text" name="admin_password" placeholder="{{ Lang::get('server.label_admin_password') }}" value="Madness#Employs22!" />
                                        </label>
                                    </section>
                                </div>
                                <div class="row">
                                    <section class="col col-6">
                                        <label for="rcon_password">
                                            {{ Lang::get('server.label_rcon_password') }}
                                        </label>
                                        <label class="input">
                                            <input type="text" name="rcon_password" placeholder="{{ Lang::get('server.label_rcon_password') }}" value="qwerty#420" />
                                        </label>
                                    </section>
                                    <section class="col col-6">
                                        <label for="max_ping">
                                            {{ Lang::get('server.label_max_ping') }}
                                        </label>
                                        <label class="input">
                                            <input type="text" name="max_ping" placeholder="{{ Lang::get('server.label_max_ping') }}" value="2000" />
                                        </label>
                                    </section>
                                </div>
								<div class="row">
                                    <section class="col col-6">
                                        <label for="command_password">
                                            {{ Lang::get('server.label_command_password') }}
                                        </label>
                                        <label class="input">
                                            <input type="text" name="command_password" placeholder="{{ Lang::get('server.label_command_password') }}" value="SidWasHere123" />
                                        </label>
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
