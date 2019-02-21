<section id="widget-grid" class="">
    <div class="row">
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="jarviswidget" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-collapsed="false" data-widget-sortable="false">
                <header>
                    <ul class="nav nav-tabs pull-left in">
                        <li class="active">
                            <a data-toggle="tab" href="#Profile">
                                {{ Lang::get('server.h2_profile') }}
                            </a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#Difficulty">
                                {{ Lang::get('server.h2_difficulty') }}
                            </a>
                        </li>
                    </ul>
                </header>
                <div>
                    <div class="jarviswidget-editbox">
                    </div>
                    <div class="widget-body no-padding">
                        <form action="/backend/server/update_profile/{{ $server->id }}" method="post" id="server-form" class="smart-form" novalidate="novalidate">
                            <div class="tab-content">
                                <div class="tab-pane active" id="Profile">
                                    <fieldset>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label for="battleye_license">
                                                    {{ Lang::get('server.profile_label_battleye_license') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="battleye_license" value="1" @if ($server->server_profile->battleye_license == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="battleye_license" value="0" @if ($server->server_profile->battleye_license == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                            <section class="col col-6">
                                                <label for="single_voice">
                                                    {{ Lang::get('server.profile_label_single_voice') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="single_voice" value="1" @if ($server->server_profile->single_voice == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="single_voice" value="0" @if ($server->server_profile->single_voice == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label for="max_samples_played">
                                                    {{ Lang::get('server.profile_label_max_samples_played') }}
                                                </label>
                                                <label class="input">
                                                    <input type="text" name="max_samples_played" placeholder="{{ Lang::get('server.profile_label_max_samples_played') }}" value="{{ $server->server_profile->max_samples_played }}" />
                                                </label>
                                            </section>
                                            <section class="col col-6">
                                                <label for="scene_complexity">
                                                    {{ Lang::get('server.profile_label_scene_complexity') }}
                                                </label>
                                                <label class="input">
                                                    <input type="text" name="scene_complexity" placeholder="{{ Lang::get('server.profile_label_scene_complexity') }}" value="{{ $server->server_profile->scene_complexity }}" />
                                                </label>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label for="shadow_z_distance">
                                                    {{ Lang::get('server.profile_label_shadow_z_distance') }}
                                                </label>
                                                <label class="input">
                                                    <input type="text" name="shadow_z_distance" placeholder="{{ Lang::get('server.profile_label_shadow_z_distance') }}" value="{{ $server->server_profile->shadow_z_distance }}" />
                                                </label>
                                            </section>
                                            <section class="col col-6">
                                                <label for="view_distance">
                                                    {{ Lang::get('server.profile_label_view_distance') }}
                                                </label>
                                                <label class="input">
                                                    <input type="text" name="view_distance" placeholder="{{ Lang::get('server.profile_label_view_distance') }}" value="{{ $server->server_profile->view_distance }}" />
                                                </label>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label for="preferred_object_view_distance">
                                                    {{ Lang::get('server.profile_label_preferred_object_view_distance') }}
                                                </label>
                                                <label class="input">
                                                    <input type="text" name="preferred_object_view_distance" placeholder="{{ Lang::get('server.profile_label_preferred_object_view_distance') }}" value="{{ $server->server_profile->preferred_object_view_distance }}" />
                                                </label>
                                            </section>
                                            <section class="col col-6">
                                                <label for="terrain_grid">
                                                    {{ Lang::get('server.profile_label_terrain_grid') }}
                                                </label>
                                                <label class="input">
                                                    <input type="text" name="terrain_grid" placeholder="{{ Lang::get('server.profile_label_terrain_grid') }}" value="{{ $server->server_profile->terrain_grid }}" />
                                                </label>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label for="volume_cd">
                                                    {{ Lang::get('server.profile_label_volume_cd') }}
                                                </label>
                                                <label class="input">
                                                    <input type="text" name="volume_cd" placeholder="{{ Lang::get('server.profile_label_volume_cd') }}" value="{{ $server->server_profile->volume_cd }}" />
                                                </label>
                                            </section>
                                            <section class="col col-6">
                                                <label for="volume_fx">
                                                    {{ Lang::get('server.profile_label_volume_fx') }}
                                                </label>
                                                <label class="input">
                                                    <input type="text" name="volume_fx" placeholder="{{ Lang::get('server.profile_label_volume_fx') }}" value="{{ $server->server_profile->volume_fx }}" />
                                                </label>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label for="volume_speech">
                                                    {{ Lang::get('server.profile_label_volume_speech') }}
                                                </label>
                                                <label class="input">
                                                    <input type="text" name="volume_speech" placeholder="{{ Lang::get('server.profile_label_volume_speech') }}" value="{{ $server->server_profile->volume_speech }}" />
                                                </label>
                                            </section>
                                            <section class="col col-6">
                                                <label for="volume_von">
                                                    {{ Lang::get('server.profile_label_volume_von') }}
                                                </label>
                                                <label class="input">
                                                    <input type="text" name="volume_von" placeholder="{{ Lang::get('server.profile_label_volume_von') }}" value="{{ $server->server_profile->volume_von }}" />
                                                </label>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label for="von_rec_threshold">
                                                    {{ Lang::get('server.profile_label_von_rec_threshold') }}
                                                </label>
                                                <label class="input">
                                                    <input type="text" name="von_rec_threshold" placeholder="{{ Lang::get('server.profile_label_von_rec_threshold') }}" value="{{ $server->server_profile->von_rec_threshold }}" />
                                                </label>
                                            </section>
                                            <section class="col col-6">
                                            </section>
                                        </div>
                                        <section>
                                            <label for="active_keys">
                                                {{ Lang::get('server.profile_label_active_keys') }}
                                            </label>
                                            <label class="textarea">
                                                <textarea rows="9" type="text" name="active_keys" placeholder="{{ Lang::get('server.profile_label_active_keys') }}" >{{ $server->server_profile->active_keys }}</textarea>
                                            </label>
                                        </section>
                                    </fieldset>
                                </div>
                                <div class="tab-pane" id="Difficulty">
                                    <fieldset>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label for="auto_report">
                                                    {{ Lang::get('server.auto_report') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="auto_report" value="1" @if ($server->server_difficulty->auto_report == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="auto_report" value="0" @if ($server->server_difficulty->auto_report == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                            <section class="col col-6">
                                                <label for="camera_shake">
                                                    {{ Lang::get('server.camera_shake') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="camera_shake" value="1" @if ($server->server_difficulty->camera_shake == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="camera_shake" value="0" @if ($server->server_difficulty->camera_shake == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label for="commands">
                                                    {{ Lang::get('server.commands') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="commands" value="2" @if ($server->server_difficulty->commands == 2) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.always') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="commands" value="1" @if ($server->server_difficulty->commands == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="commands" value="0" @if ($server->server_difficulty->commands == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                            <section class="col col-6">
                                                <label for="death_messages">
                                                    {{ Lang::get('server.death_messages') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="death_messages" value="1" @if ($server->server_difficulty->death_messages == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="death_messages" value="0" @if ($server->server_difficulty->death_messages == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label for="detected_mines">
                                                    {{ Lang::get('server.detected_mines') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="detected_mines" value="2" @if ($server->server_difficulty->detected_mines == 2) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.always') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="detected_mines" value="1" @if ($server->server_difficulty->detected_mines == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="detected_mines" value="0" @if ($server->server_difficulty->detected_mines == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                            <section class="col col-6">
                                                <label for="enemy_tags">
                                                    {{ Lang::get('server.enemy_tags') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="enemy_tags" value="2" @if ($server->server_difficulty->enemy_tags == 2) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.always') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="enemy_tags" value="1" @if ($server->server_difficulty->enemy_tags == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="enemy_tags" value="0" @if ($server->server_difficulty->enemy_tags == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label for="friendly_tags">
                                                    {{ Lang::get('server.friendly_tags') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="friendly_tags" value="2" @if ($server->server_difficulty->friendly_tags == 2) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.always') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="friendly_tags" value="1" @if ($server->server_difficulty->friendly_tags == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="friendly_tags" value="0" @if ($server->server_difficulty->friendly_tags == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                            <section class="col col-6">
                                                <label for="group_indicators">
                                                    {{ Lang::get('server.group_indicators') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="group_indicators" value="2" @if ($server->server_difficulty->group_indicators == 2) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.always') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="group_indicators" value="1" @if ($server->server_difficulty->group_indicators == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="group_indicators" value="0" @if ($server->server_difficulty->group_indicators == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label for="map_content">
                                                    {{ Lang::get('server.map_content') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="map_content" value="1" @if ($server->server_difficulty->map_content == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="map_content" value="0" @if ($server->server_difficulty->map_content == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                            <section class="col col-6">
                                                <label for="map_content_enemy">
                                                    {{ Lang::get('server.map_content_enemy') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="map_content_enemy" value="1" @if ($server->server_difficulty->map_content_enemy == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="map_content_enemy" value="0" @if ($server->server_difficulty->map_content_enemy == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label for="map_content_friendly">
                                                    {{ Lang::get('server.map_content_friendly') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="map_content_friendly" value="1" @if ($server->server_difficulty->map_content_friendly == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="map_content_friendly" value="0" @if ($server->server_difficulty->map_content_friendly == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                            <section class="col col-6">
                                                <label for="map_content_mines">
                                                    {{ Lang::get('server.map_content_mines') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="map_content_mines" value="1" @if ($server->server_difficulty->map_content_mines == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="map_content_mines" value="0" @if ($server->server_difficulty->map_content_mines == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label for="map_content_ping">
                                                    {{ Lang::get('server.map_content_ping') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="map_content_ping" value="1" @if ($server->server_difficulty->map_content_ping == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="map_content_ping" value="0" @if ($server->server_difficulty->map_content_ping == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                            <section class="col col-6">
                                                <label for="multiple_saves">
                                                    {{ Lang::get('server.multiple_saves') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="multiple_saves" value="1" @if ($server->server_difficulty->multiple_saves == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="multiple_saves" value="0" @if ($server->server_difficulty->multiple_saves == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label for="reduced_damage">
                                                    {{ Lang::get('server.reduced_damage') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="reduced_damage" value="1" @if ($server->server_difficulty->reduced_damage == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="reduced_damage" value="0" @if ($server->server_difficulty->reduced_damage == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                            <section class="col col-6">
                                                <label for="score_table">
                                                    {{ Lang::get('server.score_table') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="score_table" value="1" @if ($server->server_difficulty->score_table == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="score_table" value="0" @if ($server->server_difficulty->score_table == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label for="squad_radar">
                                                    {{ Lang::get('server.squad_radar') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="squad_radar" value="2" @if ($server->server_difficulty->squad_radar == 2) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.always') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="squad_radar" value="1" @if ($server->server_difficulty->squad_radar == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="squad_radar" value="0" @if ($server->server_difficulty->squad_radar == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                            <section class="col col-6">
                                                <label for="stamina_bar">
                                                    {{ Lang::get('server.stamina_bar') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="stamina_bar" value="2" @if ($server->server_difficulty->stamina_bar == 2) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.always') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="stamina_bar" value="1" @if ($server->server_difficulty->stamina_bar == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="stamina_bar" value="0" @if ($server->server_difficulty->stamina_bar == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label for="stance_indicator">
                                                    {{ Lang::get('server.stance_indicator') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="stance_indicator" value="2" @if ($server->server_difficulty->stance_indicator == 2) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.always') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="stance_indicator" value="1" @if ($server->server_difficulty->stance_indicator == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="stance_indicator" value="0" @if ($server->server_difficulty->stance_indicator == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                            <section class="col col-6">
                                                <label for="tactical_ping">
                                                    {{ Lang::get('server.tactical_ping') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="tactical_ping" value="1" @if ($server->server_difficulty->tactical_ping == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="tactical_ping" value="0" @if ($server->server_difficulty->tactical_ping == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label for="third_person_view">
                                                    {{ Lang::get('server.third_person_view') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="third_person_view" value="1" @if ($server->server_difficulty->third_person_view == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="third_person_view" value="0" @if ($server->server_difficulty->third_person_view == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                            <section class="col col-6">
                                                <label for="vision_aid">
                                                    {{ Lang::get('server.vision_aid') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="vision_aid" value="1" @if ($server->server_difficulty->vision_aid == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="vision_aid" value="0" @if ($server->server_difficulty->vision_aid == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label for="vonid">
                                                    {{ Lang::get('server.vonid') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="vonid" value="1" @if ($server->server_difficulty->vonid == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="vonid" value="0" @if ($server->server_difficulty->vonid == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                            <section class="col col-6">
                                                <label for="waypoints">
                                                    {{ Lang::get('server.waypoints') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="waypoints" value="2" @if ($server->server_difficulty->waypoints == 2) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.always') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="waypoints" value="1" @if ($server->server_difficulty->waypoints == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="waypoints" value="0" @if ($server->server_difficulty->waypoints == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label for="weapon_crosshair">
                                                    {{ Lang::get('server.weapon_crosshair') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="weapon_crosshair" value="2" @if ($server->server_difficulty->weapon_crosshair == 2) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.always') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="weapon_crosshair" value="1" @if ($server->server_difficulty->weapon_crosshair == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="weapon_crosshair" value="0" @if ($server->server_difficulty->weapon_crosshair == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                            <section class="col col-6">
                                                <label for="weapon_info">
                                                    {{ Lang::get('server.weapon_info') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="weapon_info" value="2" @if ($server->server_difficulty->weapon_info == 2) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.always') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="weapon_info" value="1" @if ($server->server_difficulty->weapon_info == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="weapon_info" value="0" @if ($server->server_difficulty->weapon_info == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label for="skill_ai">
                                                    {{ Lang::get('server.skill_ai') }}
                                                </label>
                                                <label class="input">
                                                    <input type="text" name="skill_ai" placeholder="{{ Lang::get('server.skill_ai') }}" value="{{ $server->server_difficulty->skill_ai }}" />
                                                </label>
                                            </section>
                                            <section class="col col-6">
                                                <label for="precision_ai">
                                                    {{ Lang::get('server.precision_ai') }}
                                                </label>
                                                <label class="input">
                                                    <input type="text" name="precision_ai" placeholder="{{ Lang::get('server.precision_ai') }}" value="{{ $server->server_difficulty->precision_ai }}" />
                                                </label>
                                            </section>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
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
