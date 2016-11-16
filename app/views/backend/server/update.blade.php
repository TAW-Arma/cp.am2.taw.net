<section id="widget-grid" class="">
    <div class="row">
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="jarviswidget" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-collapsed="false" data-widget-sortable="false">
                <header>
                    <span class="widget-icon"> <i class="fa fa-server"></i> </span>
                    <h2>{{ Lang::get('server.h2_update', array('name' => $server->name)) }}</h2>
                </header>
                <div>
                    <div class="jarviswidget-editbox">
                    </div>
                    <div class="widget-body no-padding">
                        <form action="/backend/server/update/{{ $server->id }}" method="post" id="server-form" class="smart-form" novalidate="novalidate">
                            <fieldset>
                                <div class="row">
                                    <section class="col col-6">
                                        <label for="name">
                                            {{ Lang::get('server.label_instance_name') }}
                                        </label>
                                        <label class="input">
                                            <input type="text" name="name" placeholder="{{ Lang::get('server.label_instance_name') }}" value="{{ $server->name }}" />
                                        </label>
                                    </section>
                                    <section class="col col-6">
                                        <label for="hostname">
                                            {{ Lang::get('server.label_hostname') }}
                                        </label>
                                        <label class="input">
                                            <input type="text" name="hostname" placeholder="{{ Lang::get('server.label_hostname') }}" value="{{ $server->hostname }}" />
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
                                                <option value="0"@if ($server->cpu_count == 0) selected="true"@endif>0</option>
                                                <option value="1"@if ($server->cpu_count == 1) selected="true"@endif>1</option>
                                                <option value="2"@if ($server->cpu_count == 2) selected="true"@endif>2</option>
                                                <option value="3"@if ($server->cpu_count == 3) selected="true"@endif>3</option>
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
                                                <option value="1"@if ($server->ex_threads == 1) selected="true"@endif>1</option>
                                                <option value="2"@if ($server->ex_threads == 2) selected="true"@endif>2</option>
                                                <option value="3"@if ($server->ex_threads == 3) selected="true"@endif>3</option>
                                                <option value="4"@if ($server->ex_threads == 4) selected="true"@endif>4</option>
                                                <option value="5"@if ($server->ex_threads == 5) selected="true"@endif>5</option>
                                                <option value="6"@if ($server->ex_threads == 6) selected="true"@endif>6</option>
                                                <option value="7"@if ($server->ex_threads == 7) selected="true"@endif>7</option>
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
                                                <option value="256"@if ($server->memory == 256) selected="true"@endif>256</option>
                                                <option value="512"@if ($server->memory == 512) selected="true"@endif>512</option>
                                                <option value="768"@if ($server->memory == 768) selected="true"@endif>768</option>
                                                <option value="1024"@if ($server->memory == 1024) selected="true"@endif>1024</option>
                                                <option value="1536"@if ($server->memory == 1536) selected="true"@endif>1536</option>
                                                <option value="2047"@if ($server->memory == 2047) selected="true"@endif>2047</option>
                                            </select>
                                            <i></i>
                                        </label>
                                    </section>
                                    <section class="col col-6">
                                        <label for="port">
                                            {{ Lang::get('server.label_port') }}
                                        </label>
                                        <label class="input">
                                            <input type="text" name="port" placeholder="{{ Lang::get('server.label_port') }}" value="{{ $server->port }}" />
                                        </label>
                                    </section>
                                </div>
                                <div class="row">
                                    <section class="col col-6">
                                        <label for="private_password">
                                            {{ Lang::get('server.label_private_password') }}
                                        </label>
                                        <label class="input">
                                            <input type="text" name="private_password" placeholder="{{ Lang::get('server.label_private_password') }}" value="{{ $server->private_password }}" />
                                        </label>
                                    </section>
                                    <section class="col col-6">
                                        <label for="admin_password">
                                            {{ Lang::get('server.label_admin_password') }}
                                        </label>
                                        <label class="input">
                                            <input type="text" name="admin_password" placeholder="{{ Lang::get('server.label_admin_password') }}" value="{{ $server->admin_password }}" />
                                        </label>
                                    </section>
                                </div>
                                <div class="row">
                                    <section class="col col-6">
                                        <label for="rcon_password">
                                            {{ Lang::get('server.label_rcon_password') }}
                                        </label>
                                        <label class="input">
                                            <input type="text" name="rcon_password" placeholder="{{ Lang::get('server.label_rcon_password') }}" value="{{ $server->rcon_password }}" />
                                        </label>
                                    </section>
                                    <section class="col col-6">
                                        <label for="max_ping">
                                            {{ Lang::get('server.label_max_ping') }}
                                        </label>
                                        <label class="input">
                                            <input type="text" name="max_ping" placeholder="{{ Lang::get('server.label_max_ping') }}" value="{{ $server->max_ping }}" />
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
                                <section>
                                    <label for="parameters">
                                        {{ Lang::get('server.label_startup_parameters') }}
                                    </label>
                                    <label class="textarea">
                                        <textarea rows="9" class="custom-scroll" name="parameters" placeholder="{{ Lang::get('server.label_startup_parameters') }}">{{ $server->parameters }}</textarea>
                                    </label>
                                </section>
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
    @if ($is_admin)
        <div class="row">
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="jarviswidget" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-collapsed="false" data-widget-sortable="false">
                    <header>
                        <span class="widget-icon"> <i class="fa fa-key"></i> </span>
                        <h2>{{ Lang::get('server.h2_map_server_to_users') }}</h2>
                    </header>
                    <div>
                        <div class="jarviswidget-editbox">
                        </div>
                        <div class="widget-body no-padding">
                            <form action="/backend/server/update_admin/{{ $server->id }}" method="post" id="user-form" novalidate="novalidate">
                                <div style="padding: 15px;">
                                    <select multiple="multiple" name="users[]" id="initializeDuallistbox">
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id; }}"@if (in_array($user->id, $server_users)) selected="true" @endif>{{ $user->username; }}</option>
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
    @endif
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
    
    @if ($is_admin)
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
    @endif
</script>
