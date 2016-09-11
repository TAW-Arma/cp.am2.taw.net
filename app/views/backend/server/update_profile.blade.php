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
                            <a data-toggle="tab" href="#Recruit">
                                {{ Lang::get('server.h2_recruit') }}
                            </a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#Regular">
                                {{ Lang::get('server.h2_regular') }}
                            </a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#Veteran">
                                {{ Lang::get('server.h2_veteran') }}
                            </a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#Mercenary">
                                {{ Lang::get('server.h2_mercenary') }}
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
                                                <label for="version">
                                                    {{ Lang::get('server.profile_label_version') }}
                                                </label>
                                                <label class="input">
                                                    <input type="text" name="version" placeholder="{{ Lang::get('server.profile_label_version') }}" value="{{ $server->server_profile->version }}" />
                                                </label>
                                            </section>
                                            <section class="col col-6">
                                                <label for="blood">
                                                    {{ Lang::get('server.profile_label_blood') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="blood" value="1" @if ($server->server_profile->blood == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="blood" value="0" @if ($server->server_profile->blood == 0) checked="true" @endif />
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
                                                <label for="scene_complexity">
                                                    {{ Lang::get('server.profile_label_scene_complexity') }}
                                                </label>
                                                <label class="input">
                                                    <input type="text" name="scene_complexity" placeholder="{{ Lang::get('server.profile_label_scene_complexity') }}" value="{{ $server->server_profile->scene_complexity }}" />
                                                </label>
                                            </section>
                                            <section class="col col-6">
                                                <label for="gamma">
                                                    {{ Lang::get('server.profile_label_gamma') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="gamma" value="1" @if ($server->server_profile->gamma == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="gamma" value="0" @if ($server->server_profile->gamma == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
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
                                                <label for="brightness">
                                                    {{ Lang::get('server.profile_label_brightness') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="brightness" value="1" @if ($server->server_profile->brightness == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="brightness" value="0" @if ($server->server_profile->brightness == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label for="view_distance">
                                                    {{ Lang::get('server.profile_label_view_distance') }}
                                                </label>
                                                <label class="input">
                                                    <input type="text" name="view_distance" placeholder="{{ Lang::get('server.profile_label_view_distance') }}" value="{{ $server->server_profile->view_distance }}" />
                                                </label>
                                            </section>
                                            <section class="col col-6">
                                                <label for="preferred_object_view_distance">
                                                    {{ Lang::get('server.profile_label_preferred_object_view_distance') }}
                                                </label>
                                                <label class="input">
                                                    <input type="text" name="preferred_object_view_distance" placeholder="{{ Lang::get('server.profile_label_preferred_object_view_distance') }}" value="{{ $server->server_profile->preferred_object_view_distance }}" />
                                                </label>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label for="terrain_grid">
                                                    {{ Lang::get('server.profile_label_terrain_grid') }}
                                                </label>
                                                <label class="input">
                                                    <input type="text" name="terrain_grid" placeholder="{{ Lang::get('server.profile_label_terrain_grid') }}" value="{{ $server->server_profile->terrain_grid }}" />
                                                </label>
                                            </section>
                                            <section class="col col-6">
                                                <label for="volume_cd">
                                                    {{ Lang::get('server.profile_label_volume_cd') }}
                                                </label>
                                                <label class="input">
                                                    <input type="text" name="volume_cd" placeholder="{{ Lang::get('server.profile_label_volume_cd') }}" value="{{ $server->server_profile->volume_cd }}" />
                                                </label>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label for="volume_fx">
                                                    {{ Lang::get('server.profile_label_volume_fx') }}
                                                </label>
                                                <label class="input">
                                                    <input type="text" name="volume_fx" placeholder="{{ Lang::get('server.profile_label_volume_fx') }}" value="{{ $server->server_profile->volume_fx }}" />
                                                </label>
                                            </section>
                                            <section class="col col-6">
                                                <label for="volume_speech">
                                                    {{ Lang::get('server.profile_label_volume_speech') }}
                                                </label>
                                                <label class="input">
                                                    <input type="text" name="volume_speech" placeholder="{{ Lang::get('server.profile_label_volume_speech') }}" value="{{ $server->server_profile->volume_speech }}" />
                                                </label>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label for="volume_von">
                                                    {{ Lang::get('server.profile_label_volume_von') }}
                                                </label>
                                                <label class="input">
                                                    <input type="text" name="volume_von" placeholder="{{ Lang::get('server.profile_label_volume_von') }}" value="{{ $server->server_profile->volume_von }}" />
                                                </label>
                                            </section>
                                            <section class="col col-6">
                                                <label for="von_rec_threshold">
                                                    {{ Lang::get('server.profile_label_von_rec_threshold') }}
                                                </label>
                                                <label class="input">
                                                    <input type="text" name="von_rec_threshold" placeholder="{{ Lang::get('server.profile_label_von_rec_threshold') }}" value="{{ $server->server_profile->von_rec_threshold }}" />
                                                </label>
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
                                <div class="tab-pane" id="Recruit">
                                    <fieldset>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label for="recruit_skill_friendly">
                                                    {{ Lang::get('server.skill_friendly') }}
                                                </label>
                                                <label class="input">
                                                    <input type="text" name="recruit_skill_friendly" placeholder="{{ Lang::get('server.skill_friendly') }}" value="{{ $server->server_dificulty_recruit->skill_friendly }}" />
                                                </label>
                                            </section>
                                            <section class="col col-6">
                                                <label for="recruit_skill_enemy">
                                                    {{ Lang::get('server.skill_enemy') }}
                                                </label>
                                                <label class="input">
                                                    <input type="text" name="recruit_skill_enemy" placeholder="{{ Lang::get('server.skill_enemy') }}" value="{{ $server->server_dificulty_recruit->skill_enemy }}" />
                                                </label>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label for="recruit_precision_friendly">
                                                    {{ Lang::get('server.precision_friendly') }}
                                                </label>
                                                <label class="input">
                                                    <input type="text" name="recruit_precision_friendly" placeholder="{{ Lang::get('server.precision_friendly') }}" value="{{ $server->server_dificulty_recruit->precision_friendly }}" />
                                                </label>
                                            </section>
                                            <section class="col col-6">
                                                <label for="recruit_precision_enemy">
                                                    {{ Lang::get('server.precision_enemy') }}
                                                </label>
                                                <label class="input">
                                                    <input type="text" name="recruit_precision_enemy" placeholder="{{ Lang::get('server.precision_enemy') }}" value="{{ $server->server_dificulty_recruit->precision_enemy }}" />
                                                </label>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label for="recruit_armor">
                                                    {{ Lang::get('server.armor') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="recruit_armor" value="1" @if ($server->server_dificulty_recruit->armor == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="recruit_armor" value="0" @if ($server->server_dificulty_recruit->armor == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                            <section class="col col-6">
                                                <label for="recruit_friendly_tag">
                                                    {{ Lang::get('server.friendly_tag') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="recruit_friendly_tag" value="1" @if ($server->server_dificulty_recruit->friendly_tag == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="recruit_friendly_tag" value="0" @if ($server->server_dificulty_recruit->friendly_tag == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label for="recruit_enemy_tag">
                                                    {{ Lang::get('server.enemy_tag') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="recruit_enemy_tag" value="1" @if ($server->server_dificulty_recruit->enemy_tag == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="recruit_enemy_tag" value="0" @if ($server->server_dificulty_recruit->enemy_tag == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                            <section class="col col-6">
                                                <label for="recruit_mine_tag">
                                                    {{ Lang::get('server.mine_tag') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="recruit_mine_tag" value="1" @if ($server->server_dificulty_recruit->mine_tag == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="recruit_mine_tag" value="0" @if ($server->server_dificulty_recruit->mine_tag == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label for="recruit_hud">
                                                    {{ Lang::get('server.hud') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="recruit_hud" value="1" @if ($server->server_dificulty_recruit->hud == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="recruit_hud" value="0" @if ($server->server_dificulty_recruit->hud == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                            <section class="col col-6">
                                                <label for="recruit_hud_perm">
                                                    {{ Lang::get('server.hud_perm') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="recruit_hud_perm" value="1" @if ($server->server_dificulty_recruit->hud_perm == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="recruit_hud_perm" value="0" @if ($server->server_dificulty_recruit->hud_perm == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label for="recruit_hud_wp">
                                                    {{ Lang::get('server.hud_wp') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="recruit_hud_wp" value="1" @if ($server->server_dificulty_recruit->hud_wp == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="recruit_hud_wp" value="0" @if ($server->server_dificulty_recruit->hud_wp == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                            <section class="col col-6">
                                                <label for="recruit_hud_wp_perm">
                                                    {{ Lang::get('server.hud_wp_perm') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="recruit_hud_wp_perm" value="1" @if ($server->server_dificulty_recruit->hud_wp_perm == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="recruit_hud_wp_perm" value="0" @if ($server->server_dificulty_recruit->hud_wp_perm == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label for="recruit_hud_group_info">
                                                    {{ Lang::get('server.hud_group_info') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="recruit_hud_group_info" value="1" @if ($server->server_dificulty_recruit->hud_group_info == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="recruit_hud_group_info" value="0" @if ($server->server_dificulty_recruit->hud_group_info == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                            <section class="col col-6">
                                                <label for="recruit_auto_spot">
                                                    {{ Lang::get('server.auto_spot') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="recruit_auto_spot" value="1" @if ($server->server_dificulty_recruit->auto_spot == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="recruit_auto_spot" value="0" @if ($server->server_dificulty_recruit->auto_spot == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label for="recruit_map">
                                                    {{ Lang::get('server.map') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="recruit_map" value="1" @if ($server->server_dificulty_recruit->map == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="recruit_map" value="0" @if ($server->server_dificulty_recruit->map == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                            <section class="col col-6">
                                                <label for="recruit_weapon_cursor">
                                                    {{ Lang::get('server.weapon_cursor') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="recruit_weapon_cursor" value="1" @if ($server->server_dificulty_recruit->weapon_cursor == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="recruit_weapon_cursor" value="0" @if ($server->server_dificulty_recruit->weapon_cursor == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label for="recruit_auto_guide_at">
                                                    {{ Lang::get('server.auto_guide_at') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="recruit_auto_guide_at" value="1" @if ($server->server_dificulty_recruit->auto_guide_at == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="recruit_auto_guide_at" value="0" @if ($server->server_dificulty_recruit->auto_guide_at == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                            <section class="col col-6">
                                                <label for="recruit_clock_indicator">
                                                    {{ Lang::get('server.clock_indicator') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="recruit_clock_indicator" value="1" @if ($server->server_dificulty_recruit->clock_indicator == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="recruit_clock_indicator" value="0" @if ($server->server_dificulty_recruit->clock_indicator == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label for="recruit_third_person_view">
                                                    {{ Lang::get('server.third_person_view') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="recruit_third_person_view" value="1" @if ($server->server_dificulty_recruit->third_person_view == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="recruit_third_person_view" value="0" @if ($server->server_dificulty_recruit->third_person_view == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                            <section class="col col-6">
                                                <label for="recruit_ultra_ai">
                                                    {{ Lang::get('server.ultra_ai') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="recruit_ultra_ai" value="1" @if ($server->server_dificulty_recruit->ultra_ai == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="recruit_ultra_ai" value="0" @if ($server->server_dificulty_recruit->ultra_ai == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label for="recruit_camera_shake">
                                                    {{ Lang::get('server.camera_shake') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="recruit_camera_shake" value="1" @if ($server->server_dificulty_recruit->camera_shake == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="recruit_camera_shake" value="0" @if ($server->server_dificulty_recruit->camera_shake == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                            <section class="col col-6">
                                                <label for="recruit_unlimited_saves">
                                                    {{ Lang::get('server.unlimited_saves') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="recruit_unlimited_saves" value="1" @if ($server->server_dificulty_recruit->unlimited_saves == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="recruit_unlimited_saves" value="0" @if ($server->server_dificulty_recruit->unlimited_saves == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label for="recruit_death_messages">
                                                    {{ Lang::get('server.death_messages') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="recruit_death_messages" value="1" @if ($server->server_dificulty_recruit->death_messages == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="recruit_death_messages" value="0" @if ($server->server_dificulty_recruit->death_messages == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                            <section class="col col-6">
                                                <label for="recruit_net_stats">
                                                    {{ Lang::get('server.net_stats') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="recruit_net_stats" value="1" @if ($server->server_dificulty_recruit->net_stats == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="recruit_net_stats" value="0" @if ($server->server_dificulty_recruit->net_stats == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label for="recruit_von_id">
                                                    {{ Lang::get('server.von_id') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="recruit_von_id" value="1" @if ($server->server_dificulty_recruit->von_id == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="recruit_von_id" value="0" @if ($server->server_dificulty_recruit->von_id == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                            <section class="col col-6">
                                                <label for="recruit_extended_info_type">
                                                    {{ Lang::get('server.extended_info_type') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="recruit_extended_info_type" value="1" @if ($server->server_dificulty_recruit->extended_info_type == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="recruit_extended_info_type" value="0" @if ($server->server_dificulty_recruit->extended_info_type == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="tab-pane" id="Regular">
                                    <fieldset>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label for="regular_skill_friendly">
                                                    {{ Lang::get('server.skill_friendly') }}
                                                </label>
                                                <label class="input">
                                                    <input type="text" name="regular_skill_friendly" placeholder="{{ Lang::get('server.regular_label_') }}" value="{{ $server->server_dificulty_regular->skill_friendly }}" />
                                                </label>
                                            </section>
                                            <section class="col col-6">
                                                <label for="regular_skill_enemy">
                                                    {{ Lang::get('server.skill_enemy') }}
                                                </label>
                                                <label class="input">
                                                    <input type="text" name="regular_skill_enemy" placeholder="{{ Lang::get('server.regular_label_') }}" value="{{ $server->server_dificulty_regular->skill_enemy }}" />
                                                </label>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label for="regular_precision_friendly">
                                                    {{ Lang::get('server.precision_friendly') }}
                                                </label>
                                                <label class="input">
                                                    <input type="text" name="regular_precision_friendly" placeholder="{{ Lang::get('server.regular_label_') }}" value="{{ $server->server_dificulty_regular->precision_friendly }}" />
                                                </label>
                                            </section>
                                            <section class="col col-6">
                                                <label for="regular_precision_enemy">
                                                    {{ Lang::get('server.precision_enemy') }}
                                                </label>
                                                <label class="input">
                                                    <input type="text" name="regular_precision_enemy" placeholder="{{ Lang::get('server.regular_label_') }}" value="{{ $server->server_dificulty_regular->precision_enemy }}" />
                                                </label>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label for="regular_armor">
                                                    {{ Lang::get('server.armor') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="regular_armor" value="1" @if ($server->server_dificulty_regular->armor == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="regular_armor" value="0" @if ($server->server_dificulty_regular->armor == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                            <section class="col col-6">
                                                <label for="regular_friendly_tag">
                                                    {{ Lang::get('server.friendly_tag') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="regular_friendly_tag" value="1" @if ($server->server_dificulty_regular->friendly_tag == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="regular_friendly_tag" value="0" @if ($server->server_dificulty_regular->friendly_tag == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label for="regular_enemy_tag">
                                                    {{ Lang::get('server.enemy_tag') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="regular_enemy_tag" value="1" @if ($server->server_dificulty_regular->enemy_tag == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="regular_enemy_tag" value="0" @if ($server->server_dificulty_regular->enemy_tag == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                            <section class="col col-6">
                                                <label for="regular_mine_tag">
                                                    {{ Lang::get('server.mine_tag') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="regular_mine_tag" value="1" @if ($server->server_dificulty_regular->mine_tag == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="regular_mine_tag" value="0" @if ($server->server_dificulty_regular->mine_tag == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label for="regular_hud">
                                                    {{ Lang::get('server.hud') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="regular_hud" value="1" @if ($server->server_dificulty_regular->hud == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="regular_hud" value="0" @if ($server->server_dificulty_regular->hud == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                            <section class="col col-6">
                                                <label for="regular_hud_perm">
                                                    {{ Lang::get('server.hud_perm') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="regular_hud_perm" value="1" @if ($server->server_dificulty_regular->hud_perm == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="regular_hud_perm" value="0" @if ($server->server_dificulty_regular->hud_perm == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label for="regular_hud_wp">
                                                    {{ Lang::get('server.hud_wp') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="regular_hud_wp" value="1" @if ($server->server_dificulty_regular->hud_wp == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="regular_hud_wp" value="0" @if ($server->server_dificulty_regular->hud_wp == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                            <section class="col col-6">
                                                <label for="regular_hud_wp_perm">
                                                    {{ Lang::get('server.hud_wp_perm') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="regular_hud_wp_perm" value="1" @if ($server->server_dificulty_regular->hud_wp_perm == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="regular_hud_wp_perm" value="0" @if ($server->server_dificulty_regular->hud_wp_perm == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label for="regular_hud_group_info">
                                                    {{ Lang::get('server.hud_group_info') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="regular_hud_group_info" value="1" @if ($server->server_dificulty_regular->hud_group_info == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="regular_hud_group_info" value="0" @if ($server->server_dificulty_regular->hud_group_info == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                            <section class="col col-6">
                                                <label for="regular_auto_spot">
                                                    {{ Lang::get('server.auto_spot') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="regular_auto_spot" value="1" @if ($server->server_dificulty_regular->auto_spot == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="regular_auto_spot" value="0" @if ($server->server_dificulty_regular->auto_spot == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label for="regular_map">
                                                    {{ Lang::get('server.map') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="regular_map" value="1" @if ($server->server_dificulty_regular->map == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="regular_map" value="0" @if ($server->server_dificulty_regular->map == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                            <section class="col col-6">
                                                <label for="regular_weapon_cursor">
                                                    {{ Lang::get('server.weapon_cursor') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="regular_weapon_cursor" value="1" @if ($server->server_dificulty_regular->weapon_cursor == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="regular_weapon_cursor" value="0" @if ($server->server_dificulty_regular->weapon_cursor == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label for="regular_auto_guide_at">
                                                    {{ Lang::get('server.auto_guide_at') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="regular_auto_guide_at" value="1" @if ($server->server_dificulty_regular->auto_guide_at == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="regular_auto_guide_at" value="0" @if ($server->server_dificulty_regular->auto_guide_at == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                            <section class="col col-6">
                                                <label for="regular_clock_indicator">
                                                    {{ Lang::get('server.clock_indicator') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="regular_clock_indicator" value="1" @if ($server->server_dificulty_regular->clock_indicator == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="regular_clock_indicator" value="0" @if ($server->server_dificulty_regular->clock_indicator == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label for="regular_third_person_view">
                                                    {{ Lang::get('server.third_person_view') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="regular_third_person_view" value="1" @if ($server->server_dificulty_regular->third_person_view == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="regular_third_person_view" value="0" @if ($server->server_dificulty_regular->third_person_view == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                            <section class="col col-6">
                                                <label for="regular_ultra_ai">
                                                    {{ Lang::get('server.ultra_ai') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="regular_ultra_ai" value="1" @if ($server->server_dificulty_regular->ultra_ai == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="regular_ultra_ai" value="0" @if ($server->server_dificulty_regular->ultra_ai == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label for="regular_camera_shake">
                                                    {{ Lang::get('server.camera_shake') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="regular_camera_shake" value="1" @if ($server->server_dificulty_regular->camera_shake == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="regular_camera_shake" value="0" @if ($server->server_dificulty_regular->camera_shake == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                            <section class="col col-6">
                                                <label for="regular_unlimited_saves">
                                                    {{ Lang::get('server.unlimited_saves') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="regular_unlimited_saves" value="1" @if ($server->server_dificulty_regular->unlimited_saves == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="regular_unlimited_saves" value="0" @if ($server->server_dificulty_regular->unlimited_saves == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label for="regular_death_messages">
                                                    {{ Lang::get('server.death_messages') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="regular_death_messages" value="1" @if ($server->server_dificulty_regular->death_messages == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="regular_death_messages" value="0" @if ($server->server_dificulty_regular->death_messages == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                            <section class="col col-6">
                                                <label for="regular_net_stats">
                                                    {{ Lang::get('server.net_stats') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="regular_net_stats" value="1" @if ($server->server_dificulty_regular->net_stats == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="regular_net_stats" value="0" @if ($server->server_dificulty_regular->net_stats == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label for="regular_von_id">
                                                    {{ Lang::get('server.von_id') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="regular_von_id" value="1" @if ($server->server_dificulty_regular->von_id == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="regular_von_id" value="0" @if ($server->server_dificulty_regular->von_id == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                            <section class="col col-6">
                                                <label for="regular_extended_info_type">
                                                    {{ Lang::get('server.extended_info_type') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="regular_extended_info_type" value="1" @if ($server->server_dificulty_regular->extended_info_type == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="regular_extended_info_type" value="0" @if ($server->server_dificulty_regular->extended_info_type == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="tab-pane" id="Veteran">
                                    <fieldset>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label for="veteran_skill_friendly">
                                                    {{ Lang::get('server.skill_friendly') }}
                                                </label>
                                                <label class="input">
                                                    <input type="text" name="veteran_skill_friendly" placeholder="{{ Lang::get('server.veteran_label_') }}" value="{{ $server->server_dificulty_veteran->skill_friendly }}" />
                                                </label>
                                            </section>
                                            <section class="col col-6">
                                                <label for="veteran_skill_enemy">
                                                    {{ Lang::get('server.skill_enemy') }}
                                                </label>
                                                <label class="input">
                                                    <input type="text" name="veteran_skill_enemy" placeholder="{{ Lang::get('server.veteran_label_') }}" value="{{ $server->server_dificulty_veteran->skill_enemy }}" />
                                                </label>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label for="veteran_precision_friendly">
                                                    {{ Lang::get('server.precision_friendly') }}
                                                </label>
                                                <label class="input">
                                                    <input type="text" name="veteran_precision_friendly" placeholder="{{ Lang::get('server.veteran_label_') }}" value="{{ $server->server_dificulty_veteran->precision_friendly }}" />
                                                </label>
                                            </section>
                                            <section class="col col-6">
                                                <label for="veteran_precision_enemy">
                                                    {{ Lang::get('server.precision_enemy') }}
                                                </label>
                                                <label class="input">
                                                    <input type="text" name="veteran_precision_enemy" placeholder="{{ Lang::get('server.veteran_label_') }}" value="{{ $server->server_dificulty_veteran->precision_enemy }}" />
                                                </label>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label for="veteran_armor">
                                                    {{ Lang::get('server.armor') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="veteran_armor" value="1" @if ($server->server_dificulty_veteran->armor == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="veteran_armor" value="0" @if ($server->server_dificulty_veteran->armor == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                            <section class="col col-6">
                                                <label for="veteran_friendly_tag">
                                                    {{ Lang::get('server.friendly_tag') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="veteran_friendly_tag" value="1" @if ($server->server_dificulty_veteran->friendly_tag == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="veteran_friendly_tag" value="0" @if ($server->server_dificulty_veteran->friendly_tag == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label for="veteran_enemy_tag">
                                                    {{ Lang::get('server.enemy_tag') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="veteran_enemy_tag" value="1" @if ($server->server_dificulty_veteran->enemy_tag == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="veteran_enemy_tag" value="0" @if ($server->server_dificulty_veteran->enemy_tag == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                            <section class="col col-6">
                                                <label for="veteran_mine_tag">
                                                    {{ Lang::get('server.mine_tag') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="veteran_mine_tag" value="1" @if ($server->server_dificulty_veteran->mine_tag == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="veteran_mine_tag" value="0" @if ($server->server_dificulty_veteran->mine_tag == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label for="veteran_hud">
                                                    {{ Lang::get('server.hud') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="veteran_hud" value="1" @if ($server->server_dificulty_veteran->hud == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="veteran_hud" value="0" @if ($server->server_dificulty_veteran->hud == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                            <section class="col col-6">
                                                <label for="veteran_hud_perm">
                                                    {{ Lang::get('server.hud_perm') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="veteran_hud_perm" value="1" @if ($server->server_dificulty_veteran->hud_perm == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="veteran_hud_perm" value="0" @if ($server->server_dificulty_veteran->hud_perm == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label for="veteran_hud_wp">
                                                    {{ Lang::get('server.hud_wp') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="veteran_hud_wp" value="1" @if ($server->server_dificulty_veteran->hud_wp == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="veteran_hud_wp" value="0" @if ($server->server_dificulty_veteran->hud_wp == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                            <section class="col col-6">
                                                <label for="veteran_hud_wp_perm">
                                                    {{ Lang::get('server.hud_wp_perm') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="veteran_hud_wp_perm" value="1" @if ($server->server_dificulty_veteran->hud_wp_perm == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="veteran_hud_wp_perm" value="0" @if ($server->server_dificulty_veteran->hud_wp_perm == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label for="veteran_hud_group_info">
                                                    {{ Lang::get('server.hud_group_info') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="veteran_hud_group_info" value="1" @if ($server->server_dificulty_veteran->hud_group_info == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="veteran_hud_group_info" value="0" @if ($server->server_dificulty_veteran->hud_group_info == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                            <section class="col col-6">
                                                <label for="veteran_auto_spot">
                                                    {{ Lang::get('server.auto_spot') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="veteran_auto_spot" value="1" @if ($server->server_dificulty_veteran->auto_spot == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="veteran_auto_spot" value="0" @if ($server->server_dificulty_veteran->auto_spot == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label for="veteran_map">
                                                    {{ Lang::get('server.map') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="veteran_map" value="1" @if ($server->server_dificulty_veteran->map == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="veteran_map" value="0" @if ($server->server_dificulty_veteran->map == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                            <section class="col col-6">
                                                <label for="veteran_weapon_cursor">
                                                    {{ Lang::get('server.weapon_cursor') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="veteran_weapon_cursor" value="1" @if ($server->server_dificulty_veteran->weapon_cursor == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="veteran_weapon_cursor" value="0" @if ($server->server_dificulty_veteran->weapon_cursor == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label for="veteran_auto_guide_at">
                                                    {{ Lang::get('server.auto_guide_at') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="veteran_auto_guide_at" value="1" @if ($server->server_dificulty_veteran->auto_guide_at == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="veteran_auto_guide_at" value="0" @if ($server->server_dificulty_veteran->auto_guide_at == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                            <section class="col col-6">
                                                <label for="veteran_clock_indicator">
                                                    {{ Lang::get('server.clock_indicator') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="veteran_clock_indicator" value="1" @if ($server->server_dificulty_veteran->clock_indicator == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="veteran_clock_indicator" value="0" @if ($server->server_dificulty_veteran->clock_indicator == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label for="veteran_third_person_view">
                                                    {{ Lang::get('server.third_person_view') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="veteran_third_person_view" value="1" @if ($server->server_dificulty_veteran->third_person_view == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="veteran_third_person_view" value="0" @if ($server->server_dificulty_veteran->third_person_view == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                            <section class="col col-6">
                                                <label for="veteran_ultra_ai">
                                                    {{ Lang::get('server.ultra_ai') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="veteran_ultra_ai" value="1" @if ($server->server_dificulty_veteran->ultra_ai == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="veteran_ultra_ai" value="0" @if ($server->server_dificulty_veteran->ultra_ai == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label for="veteran_camera_shake">
                                                    {{ Lang::get('server.camera_shake') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="veteran_camera_shake" value="1" @if ($server->server_dificulty_veteran->camera_shake == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="veteran_camera_shake" value="0" @if ($server->server_dificulty_veteran->camera_shake == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                            <section class="col col-6">
                                                <label for="veteran_unlimited_saves">
                                                    {{ Lang::get('server.unlimited_saves') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="veteran_unlimited_saves" value="1" @if ($server->server_dificulty_veteran->unlimited_saves == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="veteran_unlimited_saves" value="0" @if ($server->server_dificulty_veteran->unlimited_saves == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label for="veteran_death_messages">
                                                    {{ Lang::get('server.death_messages') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="veteran_death_messages" value="1" @if ($server->server_dificulty_veteran->death_messages == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="veteran_death_messages" value="0" @if ($server->server_dificulty_veteran->death_messages == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                            <section class="col col-6">
                                                <label for="veteran_net_stats">
                                                    {{ Lang::get('server.net_stats') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="veteran_net_stats" value="1" @if ($server->server_dificulty_veteran->net_stats == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="veteran_net_stats" value="0" @if ($server->server_dificulty_veteran->net_stats == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label for="veteran_von_id">
                                                    {{ Lang::get('server.von_id') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="veteran_von_id" value="1" @if ($server->server_dificulty_veteran->von_id == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="veteran_von_id" value="0" @if ($server->server_dificulty_veteran->von_id == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                            <section class="col col-6">
                                                <label for="veteran_extended_info_type">
                                                    {{ Lang::get('server.extended_info_type') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="veteran_extended_info_type" value="1" @if ($server->server_dificulty_veteran->extended_info_type == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="veteran_extended_info_type" value="0" @if ($server->server_dificulty_veteran->extended_info_type == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="tab-pane" id="Mercenary">
                                    <fieldset>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label for="mercenary_skill_friendly">
                                                    {{ Lang::get('server.skill_friendly') }}
                                                </label>
                                                <label class="input">
                                                    <input type="text" name="mercenary_skill_friendly" placeholder="{{ Lang::get('server.mercenary_label_') }}" value="{{ $server->server_dificulty_mercenary->skill_friendly }}" />
                                                </label>
                                            </section>
                                            <section class="col col-6">
                                                <label for="mercenary_skill_enemy">
                                                    {{ Lang::get('server.skill_enemy') }}
                                                </label>
                                                <label class="input">
                                                    <input type="text" name="mercenary_skill_enemy" placeholder="{{ Lang::get('server.mercenary_label_') }}" value="{{ $server->server_dificulty_mercenary->skill_enemy }}" />
                                                </label>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label for="mercenary_precision_friendly">
                                                    {{ Lang::get('server.precision_friendly') }}
                                                </label>
                                                <label class="input">
                                                    <input type="text" name="mercenary_precision_friendly" placeholder="{{ Lang::get('server.mercenary_label_') }}" value="{{ $server->server_dificulty_mercenary->precision_friendly }}" />
                                                </label>
                                            </section>
                                            <section class="col col-6">
                                                <label for="mercenary_precision_enemy">
                                                    {{ Lang::get('server.precision_enemy') }}
                                                </label>
                                                <label class="input">
                                                    <input type="text" name="mercenary_precision_enemy" placeholder="{{ Lang::get('server.mercenary_label_') }}" value="{{ $server->server_dificulty_mercenary->precision_enemy }}" />
                                                </label>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label for="mercenary_armor">
                                                    {{ Lang::get('server.armor') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="mercenary_armor" value="1" @if ($server->server_dificulty_mercenary->armor == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="mercenary_armor" value="0" @if ($server->server_dificulty_mercenary->armor == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                            <section class="col col-6">
                                                <label for="mercenary_friendly_tag">
                                                    {{ Lang::get('server.friendly_tag') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="mercenary_friendly_tag" value="1" @if ($server->server_dificulty_mercenary->friendly_tag == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="mercenary_friendly_tag" value="0" @if ($server->server_dificulty_mercenary->friendly_tag == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label for="mercenary_enemy_tag">
                                                    {{ Lang::get('server.enemy_tag') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="mercenary_enemy_tag" value="1" @if ($server->server_dificulty_mercenary->enemy_tag == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="mercenary_enemy_tag" value="0" @if ($server->server_dificulty_mercenary->enemy_tag == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                            <section class="col col-6">
                                                <label for="mercenary_mine_tag">
                                                    {{ Lang::get('server.mine_tag') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="mercenary_mine_tag" value="1" @if ($server->server_dificulty_mercenary->mine_tag == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="mercenary_mine_tag" value="0" @if ($server->server_dificulty_mercenary->mine_tag == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label for="mercenary_hud">
                                                    {{ Lang::get('server.hud') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="mercenary_hud" value="1" @if ($server->server_dificulty_mercenary->hud == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="mercenary_hud" value="0" @if ($server->server_dificulty_mercenary->hud == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                            <section class="col col-6">
                                                <label for="mercenary_hud_perm">
                                                    {{ Lang::get('server.hud_perm') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="mercenary_hud_perm" value="1" @if ($server->server_dificulty_mercenary->hud_perm == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="mercenary_hud_perm" value="0" @if ($server->server_dificulty_mercenary->hud_perm == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label for="mercenary_hud_wp">
                                                    {{ Lang::get('server.hud_wp') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="mercenary_hud_wp" value="1" @if ($server->server_dificulty_mercenary->hud_wp == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="mercenary_hud_wp" value="0" @if ($server->server_dificulty_mercenary->hud_wp == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                            <section class="col col-6">
                                                <label for="mercenary_hud_wp_perm">
                                                    {{ Lang::get('server.hud_wp_perm') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="mercenary_hud_wp_perm" value="1" @if ($server->server_dificulty_mercenary->hud_wp_perm == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="mercenary_hud_wp_perm" value="0" @if ($server->server_dificulty_mercenary->hud_wp_perm == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label for="mercenary_hud_group_info">
                                                    {{ Lang::get('server.hud_group_info') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="mercenary_hud_group_info" value="1" @if ($server->server_dificulty_mercenary->hud_group_info == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="mercenary_hud_group_info" value="0" @if ($server->server_dificulty_mercenary->hud_group_info == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                            <section class="col col-6">
                                                <label for="mercenary_auto_spot">
                                                    {{ Lang::get('server.auto_spot') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="mercenary_auto_spot" value="1" @if ($server->server_dificulty_mercenary->auto_spot == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="mercenary_auto_spot" value="0" @if ($server->server_dificulty_mercenary->auto_spot == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label for="mercenary_map">
                                                    {{ Lang::get('server.map') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="mercenary_map" value="1" @if ($server->server_dificulty_mercenary->map == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="mercenary_map" value="0" @if ($server->server_dificulty_mercenary->map == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                            <section class="col col-6">
                                                <label for="mercenary_weapon_cursor">
                                                    {{ Lang::get('server.weapon_cursor') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="mercenary_weapon_cursor" value="1" @if ($server->server_dificulty_mercenary->weapon_cursor == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="mercenary_weapon_cursor" value="0" @if ($server->server_dificulty_mercenary->weapon_cursor == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label for="mercenary_auto_guide_at">
                                                    {{ Lang::get('server.auto_guide_at') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="mercenary_auto_guide_at" value="1" @if ($server->server_dificulty_mercenary->auto_guide_at == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="mercenary_auto_guide_at" value="0" @if ($server->server_dificulty_mercenary->auto_guide_at == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                            <section class="col col-6">
                                                <label for="mercenary_clock_indicator">
                                                    {{ Lang::get('server.clock_indicator') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="mercenary_clock_indicator" value="1" @if ($server->server_dificulty_mercenary->clock_indicator == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="mercenary_clock_indicator" value="0" @if ($server->server_dificulty_mercenary->clock_indicator == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label for="mercenary_third_person_view">
                                                    {{ Lang::get('server.third_person_view') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="mercenary_third_person_view" value="1" @if ($server->server_dificulty_mercenary->third_person_view == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="mercenary_third_person_view" value="0" @if ($server->server_dificulty_mercenary->third_person_view == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                            <section class="col col-6">
                                                <label for="mercenary_ultra_ai">
                                                    {{ Lang::get('server.ultra_ai') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="mercenary_ultra_ai" value="1" @if ($server->server_dificulty_mercenary->ultra_ai == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="mercenary_ultra_ai" value="0" @if ($server->server_dificulty_mercenary->ultra_ai == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label for="mercenary_camera_shake">
                                                    {{ Lang::get('server.camera_shake') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="mercenary_camera_shake" value="1" @if ($server->server_dificulty_mercenary->camera_shake == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="mercenary_camera_shake" value="0" @if ($server->server_dificulty_mercenary->camera_shake == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                            <section class="col col-6">
                                                <label for="mercenary_unlimited_saves">
                                                    {{ Lang::get('server.unlimited_saves') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="mercenary_unlimited_saves" value="1" @if ($server->server_dificulty_mercenary->unlimited_saves == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="mercenary_unlimited_saves" value="0" @if ($server->server_dificulty_mercenary->unlimited_saves == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label for="mercenary_death_messages">
                                                    {{ Lang::get('server.death_messages') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="mercenary_death_messages" value="1" @if ($server->server_dificulty_mercenary->death_messages == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="mercenary_death_messages" value="0" @if ($server->server_dificulty_mercenary->death_messages == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                            <section class="col col-6">
                                                <label for="mercenary_net_stats">
                                                    {{ Lang::get('server.net_stats') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="mercenary_net_stats" value="1" @if ($server->server_dificulty_mercenary->net_stats == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="mercenary_net_stats" value="0" @if ($server->server_dificulty_mercenary->net_stats == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label for="mercenary_von_id">
                                                    {{ Lang::get('server.von_id') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="mercenary_von_id" value="1" @if ($server->server_dificulty_mercenary->von_id == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="mercenary_von_id" value="0" @if ($server->server_dificulty_mercenary->von_id == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                            <section class="col col-6">
                                                <label for="mercenary_extended_info_type">
                                                    {{ Lang::get('server.{0}') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="mercenary_extended_info_type" value="1" @if ($server->server_dificulty_mercenary->extended_info_type == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="mercenary_extended_info_type" value="0" @if ($server->server_dificulty_mercenary->extended_info_type == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
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
