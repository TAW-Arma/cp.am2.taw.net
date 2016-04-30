<section id="widget-grid" class="">
    <div class="row">
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="jarviswidget" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-collapsed="false" data-widget-sortable="false">
                <header>
                    <span class="widget-icon"> <i class="fa fa-server"></i> </span>
                    <h2>{{ Lang::get('server.h2_overview') }}</h2>
                </header>
                <div>
                    <div class="jarviswidget-editbox">
                    </div>
                    <div class="widget-body no-padding">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover" style="margin-bottom: 100px;">
                                <thead>
                                    <tr>
                                        <th style="width: 40px">{{ Lang::get('server.label_status') }}</th>
                                        <th style="width: 98px">{{ Lang::get('server.label_instance_name') }}</th>
                                        <th>{{ Lang::get('server.label_hostname') }}</th>
                                        <th style="width: 50px">{{ Lang::get('server.label_port') }}</th>
                                        <th style="width: 220px">{{ Lang::get('server.label_template') }}</th>
                                        <th style="width: 60px">{{ Lang::get('server.label_dificulty') }}</th>
                                        <th style="width: 120px">{{ Lang::get('server.label_players') }}</th>
                                        <th style="width: 120px">{{ Lang::get('server.label_cpu') }}</th>
                                        <th style="width: 120px">{{ Lang::get('server.label_memory') }}</th>
                                        <th style="width: 120px">{{ Lang::get('server.label_network') }}</th>
                                        @if ( $can_create == false and $can_update == false and $can_service == false and $can_mission == false and $can_server_cfg == false and $can_basic_cfg == false and $can_profile_cfg == false)
                                        @else
                                            <th style="width: 182px;">
                                                @if ($can_create)
                                                    <a class="btn btn-success btn-xs" href="/backend#backend/server/create"><i class="fa fa-plus"></i></a>
                                                @endif
                                            </th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($servers as $server)
                                        <tr>
                                            <td style="width: 40px; text-align: center;" id="{{ $server->id }}-status"></td>
                                            <td style="width: 90px">@if(isset($server->name)) {{ $server->name }} @endif</td>
                                            <td>@if(isset($server->hostname)) {{ $server->hostname }} @endif</td>
                                            <td style="width: 50px">@if(isset($server->port)) {{ $server->port }}2 @endif</td>
                                            <td style="width: 220px; font-size: 10px;">@if(isset($server->server_cfg->template)) {{ $server->server_cfg->template }} @endif</td>
                                            <td style="width: 60px">@if(isset($server->server_cfg->difficulty)) {{ $server->server_cfg->difficulty }} @endif</td>
                                            <td style="width: 120px">
                                                <a href="javascript:void(0);" data-toggle="modal" data-target="#{{ $server->id }}modal">
                                                    <div class="progress" style="margin: 0; padding: 0;">
                                                        <div id="{{ $server->id }}-players" class="progress-bar" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: %;" rel="tooltip" data-original-title="%" data-placement="top"></div>
                                                    </div>
                                                </a>
                                            </td>
                                            <td style="width: 120px">
                                                <div class="progress" style="margin: 0; padding: 0;">
                                                    <div id="{{ $server->id }}-cpu" class="progress-bar" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: %;" rel="tooltip" data-original-title="%" data-placement="top"></div>
                                                </div>
                                            </td>
                                            <td style="width: 120px">
                                                <div class="progress" style="margin: 0; padding: 0;">
                                                    <div id="{{ $server->id }}-memory" class="progress-bar" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: %;" rel="tooltip" data-original-title="%" data-placement="top"></div>
                                                </div>
                                            </td>
                                            <td style="width: 120px" id="{{ $server->id }}-network">
                                            </td>
                                            @if ( $can_create == false and $can_update == false and $can_service == false and $can_mission == false and $can_server_cfg == false and $can_basic_cfg == false and $can_profile_cfg == false)
                                            @else
                                                <td style="width: 182px;">
                                                    @if ($can_service)
                                                        <div class="btn-group" role="group" aria-label="...">
                                                            <a class="start_server btn btn-xs btn-default" href="/backend#backend/server/start/{{ $server->id }}" alt="{{ $server->id }}"><i class="fa fa-play"></i></a>
                                                            <a class="restart_server btn btn-xs btn-default" href="/backend#backend/server/restart/{{ $server->id }}" alt="{{ $server->id }}"><i class="fa fa-repeat"></i></a>
                                                            <a class="stop_server btn btn-xs btn-default" href="/backend#backend/server/stop/{{ $server->id }}" alt="{{ $server->id }}"><i class="fa fa-stop"></i></a>
                                                        </div>
                                                    @endif
                                                    @if ( $can_update == false and $can_mission == false and $can_server_cfg == false and $can_basic_cfg == false and $can_profile_cfg == false)
                                                    @else
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-warning btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                {{ Lang::get('server.options') }} <span class="caret"></span>
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                @if ($can_update)
                                                                    <li><a href="/backend#backend/server/logviewer/{{ $server->id }}">{{ Lang::get('server.options_logviewer') }}</a></li>
                                                                @endif
                                                                @if ($can_update)
                                                                    <li><a href="/backend#backend/server/update/{{ $server->id }}">{{ Lang::get('server.options_general') }}</a></li>
                                                                @endif
                                                                @if ($can_server_cfg)
                                                                    <li><a href="/backend#backend/server/update_server_cfg/{{ $server->id }}">{{ Lang::get('server.options_server') }}</a></li>
                                                                @endif
                                                                @if ($can_basic_cfg)
                                                                    <li><a href="/backend#backend/server/update_basic_cfg/{{ $server->id }}">{{ Lang::get('server.options_basic') }}</a></li>
                                                                @endif
                                                                @if ($can_profile_cfg)
                                                                    <li><a href="/backend#backend/server/update_profile/{{ $server->id }}">{{ Lang::get('server.options_profile') }}</a></li>
                                                                @endif
                                                            </ul>
                                                        </div>
                                                    @endif
                                                    @if ($can_delete)
                                                        <a class="btn btn-danger btn-xs"  href="/backend#backend/server/delete/{{ $server->id }}"><i class="fa fa-times"></i></a>
                                                    @endif
                                                    <div class="modal fade" id="{{ $server->id }}modal" tabindex="-1" role="dialog" aria-labelledby="{{ $server->name }}Label">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                    <h4 class="modal-title" id="{{ $server->id }}-model-title"></h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <table class="table table-bordered table-striped table-hover">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>{{ Lang::get('server.status_name') }}</th>
                                                                                <th>{{ Lang::get('server.status_score') }}</th>
                                                                                <th>{{ Lang::get('server.status_time') }}</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody id="{{ $server->id }}-model-content">
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ Lang::get('general.close') }}</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            @endif
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
</div>
<script type="text/javascript">
    pageSetUp();
    var pagefunction = function()
    {
    };
    pagefunction();
    function get_server_stats()
    {
        $.ajax(
        {
            type:   "GET",
            url:    "/api/server/server_stats",
            data:   { format: 'json' },
        }).done(function(result)
        {
            var data = result;

            @foreach ($servers as $server)

                $('#{{ $server->id }}-cpu').attr('aria-valuenow', data["cpu"]["127.0.0.1:{{ $server->port }}2"]["percentage"]);
                $('#{{ $server->id }}-cpu').attr('data-original-title', data["cpu"]["127.0.0.1:{{ $server->port }}2"]["percentage"] + '%');
                $('#{{ $server->id }}-cpu').attr('style', 'width: ' + data["cpu"]["127.0.0.1:{{ $server->port }}2"]["percentage"] + '%');

                $('#{{ $server->id }}-memory').attr('aria-valuenow', data["mem"]["127.0.0.1:{{ $server->port }}2"]["percentage"]);
                $('#{{ $server->id }}-memory').attr('data-original-title', data["mem"]["127.0.0.1:{{ $server->port }}2"]["percentage"] + '%');
                $('#{{ $server->id }}-memory').attr('style', 'width: ' + data["mem"]["127.0.0.1:{{ $server->port }}2"]["percentage"] + '%');

                $('#{{ $server->id }}-network').html(data["net"]["127.0.0.1:{{ $server->port }}2"] + " kbps");

            @endforeach
        });
    };
    function get_player_stats()
    {
        $.ajax(
        {
            type:   "GET",
            url:    "/api/server/player_stats",
            data:   { format: 'json' },
        }).done(function(result)
        {
            var data = result;

            @foreach ($servers as $server)

                var serverAddress = '127.0.0.1:{{ $server->port }}2';
                if(data[serverAddress]['online'] == 1)
                {
                    $('#{{ $server->id }}-status').html('<i class="fa fa-circle" style="color: green;"></i>');
                }
                else
                {
                    $('#{{ $server->id }}-status').html('<i class="fa fa-circle" style="color: red;"></i>');
                }

                $('#{{ $server->id }}-players').attr('aria-valuenow', data[serverAddress]["players_percentage"]);
                $('#{{ $server->id }}-players').attr('data-original-title', data[serverAddress]["players_percentage"] + '%');
                $('#{{ $server->id }}-players').attr('style', 'width: ' + data[serverAddress]["players_percentage"] + '%');

                $('#{{ $server->id }}-model-title').html('{{ Lang::get('server.status_list') }} ( ' + data[serverAddress]["players_num"] + ' / ' + data[serverAddress]["players_max"] + ' )');
                
                $('#{{ $server->id }}-model-content').html('');
                if(data[serverAddress]['online'] == 1)
                {
                    $.each(data[serverAddress]["players"], function() {
                        $('#{{ $server->id }}-model-content').append('<tr><td>' + this["name"] + '</td><td>' + this["score"] + '</td><td>' + Math.round(this["time"] / 60) + '</td></tr>');
                    });
                }

            @endforeach
        });
    };
    $(document).ready(function()
    {
        get_player_stats();
        get_server_stats();
        $("a.start_server").unbind().click(function(event)
        {
            event.preventDefault();
            $.ajax({
                type:   "GET",
                url:    "/api/server/start/" + $(this).attr("alt"),
                data:   { },
                success: function(msg)
                {
                    alert(msg + " Started");
                }
             });
        });
        $("a.stop_server").unbind().click(function(event)
        {
            event.preventDefault();
            $.ajax({
                type:   "GET",
                url:    "/api/server/stop/" + $(this).attr("alt"),
                data:   { },
                success: function(msg)
                {
                    alert(msg + " Stop");
                }
             });
        });
        $("a.restart_server").unbind().click(function(event)
        {
            event.preventDefault();
            $.ajax({
                type:   "GET",
                url:    "/api/server/restart/" + $(this).attr("alt"),
                data:   { },
                success: function(msg)
                {
                    alert(msg + " Restarted");
                }
             });
        });
    });
    window.setInterval(function()
    {
        get_player_stats();
        get_server_stats();
    }, 5000);
</script>