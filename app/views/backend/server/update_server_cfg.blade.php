<section id="widget-grid" class="">
    <div class="row">
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="jarviswidget" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-collapsed="false" data-widget-sortable="false">
                <header>
                    <span class="widget-icon"> <i class="fa fa-server"></i> </span>
                    <h2>{{ Lang::get('server.h2_server', array('name' => $server->name)) }}</h2>
                </header>
                <div>
                    <div class="jarviswidget-editbox">
                    </div>
                    <div class="widget-body no-padding">
                        <form action="/backend/server/update_server_cfg/{{ $server->id }}" method="post" id="server-form" class="smart-form" novalidate="novalidate">
                            <fieldset>
                                @if ($is_admin)
                                    <div class="row">
                                        <div class="col col-6">
                                            <section>
                                                <label for="motd">
                                                    {{ Lang::get('server.server_label_motd') }}
                                                </label>
                                                <label class="textarea">
                                                    <textarea rows="9" class="custom-scroll" name="motd" placeholder="{{ Lang::get('server.server_label_motd') }}">{{ $server->server_cfg->motd }}</textarea>
                                                </label>
                                            </section>
                                            <section>
                                                <label for="motd_interval">
                                                    {{ Lang::get('server.server_label_motd_interval') }}
                                                </label>
                                                <label class="input">
                                                    <input type="text" name="motd_interval" placeholder="{{ Lang::get('server.server_label_motd_interval') }}" value="{{ $server->server_cfg->motd_interval }}" />
                                                </label>
                                            </section>
                                            <section>
                                                <label for="onUnsignedData">
                                                    {{ Lang::get('server.server_label_onUnsignedData') }}
                                                </label>
                                                <label class="textarea">
                                                    <textarea rows="1" class="custom-scroll" name="onUnsignedData" placeholder="{{ Lang::get('server.server_label_onUnsignedData') }}">{{ $server->server_cfg->onUnsignedData }}</textarea>
                                                </label>
                                            </section>
                                            <section>
                                                <label for="onHackedData">
                                                    {{ Lang::get('server.server_label_onHackedData') }}
                                                </label>
                                                <label class="textarea">
                                                    <textarea rows="1" class="custom-scroll" name="onHackedData" placeholder="{{ Lang::get('server.server_label_onHackedData') }}">{{ $server->server_cfg->onHackedData }}</textarea>
                                                </label>
                                            </section>
                                            <section>
                                                <label for="onDifferentData">
                                                    {{ Lang::get('server.server_label_onDifferentData') }}
                                                </label>
                                                <label class="textarea">
                                                    <textarea rows="1" class="custom-scroll" name="onDifferentData" placeholder="{{ Lang::get('server.server_label_onDifferentData') }}">{{ $server->server_cfg->onDifferentData }}</textarea>
                                                </label>
                                            </section>
                                            <!-- Outdated - replaced by verifySignatures!
                                            <section>
                                                <label for="checkfiles">
                                                    {{ Lang::get('server.server_label_checkfiles') }}
                                                </label>
                                                <label class="input">
                                                    <input type="text" name="checkfiles" placeholder="{{ Lang::get('server.server_label_checkfiles') }}" value="{{ $server->server_cfg->checkfiles }}" />
                                                </label>
                                            </section>
                                            -->
                                            <section>
                                                <label for="reporting_ip">
                                                    {{ Lang::get('server.server_label_reporting_ip') }}
                                                </label>
                                                <label class="input">
                                                    <input type="text" name="reporting_ip" placeholder="{{ Lang::get('server.server_label_reporting_ip') }}" value="{{ $server->server_cfg->reporting_ip }}" />
                                                </label>
                                            </section>
                                            <section>
                                                <label for="voteMission">
                                                    {{ Lang::get('server.server_label_voteMission') }}
                                                </label>
                                                <label class="input">
                                                    <input type="text" name="voteMission" placeholder="{{ Lang::get('server.server_label_voteMission') }}" value="{{ $server->server_cfg->voteMission }}" />
                                                </label>
                                            </section>
                                            <section>
                                                <label for="voteThreshold">
                                                    {{ Lang::get('server.server_label_voteThreshold') }}
                                                </label>
                                                <label class="input">
                                                    <input type="text" name="voteThreshold" placeholder="{{ Lang::get('server.server_label_voteThreshold') }}" value="{{ $server->server_cfg->voteThreshold }}" />
                                                </label>
                                            </section>
                                            <section>
                                                <label for="verifySignatures">
                                                    {{ Lang::get('server.server_label_verifySignatures') }}
                                                </label>
                                                <label class="select">
                                                    <select class="input-sm" name="verifySignatures">
                                                        <option value="0"@if ($server->server_cfg->verifySignatures == 0) selected="true"@endif>{{ Lang::get('general.no') }}</option>
                                                        <!-- From Arma 3 use only level 2 (level 1 is outdated and not efficent)  
                                                        <option value="1"@if ($server->server_cfg->verifySignatures == 1) selected="true"@endif>1</option>
                                                        -->
                                                        <option value="2"@if ($server->server_cfg->verifySignatures == 2) selected="true"@endif>{{ Lang::get('general.yes') }}</option>
                                                    </select>
                                                    <i></i>
                                                </label>
                                            </section>
                                            <section>
                                                <label for="vonCodecQuality">
                                                    {{ Lang::get('server.server_label_vonCodecQuality') }}
                                                </label>
                                                <label class="select">
                                                    <select class="input-sm" name="vonCodecQuality">
                                                        @for ($i = 0; $i <= 30; $i++)
                                                            <option value="{{ $i }}"@if ($server->server_cfg->vonCodecQuality == $i) selected="true"@endif>{{ $i }}</option>
                                                        @endfor
                                                    </select>
                                                    <!--
                                                    <select class="input-sm" name="vonCodecQuality">
                                                        <option value="0"@if ($server->server_cfg->vonCodecQuality == 0) selected="true"@endif>0</option>
                                                        <option value="1"@if ($server->server_cfg->vonCodecQuality == 1) selected="true"@endif>1</option>
                                                        <option value="2"@if ($server->server_cfg->vonCodecQuality == 2) selected="true"@endif>2</option>
                                                        <option value="3"@if ($server->server_cfg->vonCodecQuality == 3) selected="true"@endif>3</option>
                                                        <option value="4"@if ($server->server_cfg->vonCodecQuality == 4) selected="true"@endif>4</option>
                                                        <option value="5"@if ($server->server_cfg->vonCodecQuality == 5) selected="true"@endif>5</option>
                                                        <option value="6"@if ($server->server_cfg->vonCodecQuality == 6) selected="true"@endif>6</option>
                                                        <option value="7"@if ($server->server_cfg->vonCodecQuality == 7) selected="true"@endif>7</option>
                                                        <option value="8"@if ($server->server_cfg->vonCodecQuality == 8) selected="true"@endif>8</option>
                                                        <option value="9"@if ($server->server_cfg->vonCodecQuality == 9) selected="true"@endif>9</option>
                                                        <option value="10"@if ($server->server_cfg->vonCodecQuality == 10) selected="true"@endif>10</option>
                                                    </select>
                                                    -->
                                                    <i></i>
                                                </label>
                                            </section>
                                        </div>
                                        <div class="col col-6">
                                            <section>
                                                <label for="difficulty">
                                                    {{ Lang::get('server.server_label_difficulty') }}
                                                </label>
                                                <label class="select">
                                                    <select class="input-sm" name="difficulty">
                                                        <option value="recruit"@if ($server->server_cfg->difficulty == 'recruit') selected="true"@endif>Recruit</option>
                                                        <option value="regular"@if ($server->server_cfg->difficulty == 'regular') selected="true"@endif>Regular</option>
                                                        <option value="veteran"@if ($server->server_cfg->difficulty == 'veteran') selected="true"@endif>Veteran</option>
                                                        <option value="mercenary"@if ($server->server_cfg->difficulty == 'mercenary') selected="true"@endif>Mercenary</option>
                                                    </select>
                                                    <i></i>
                                                </label>
                                            </section>
                                            <section>
                                                <label for="template">
                                                    {{ Lang::get('server.server_label_template') }}
                                                </label>
                                                <label class="select">
                                                    <select class="input-sm" name="template">
                                                        @foreach($missions as $mission)
                                                            {{ $mission = str_replace('.pbo', '', $mission) }}
                                                            <option value="{{ $mission }}"@if ($server->server_cfg->template == $mission) selected="true"@endif>{{ $mission }}</option>
                                                        @endforeach
                                                    </select>
                                                    <i></i>
                                                </label>
                                            </section>
                                            <section>
                                                <label for="maxPlayers">
                                                    {{ Lang::get('server.server_label_maxPlayers') }}
                                                </label>
                                                <label class="input">
                                                    <input type="text" name="maxPlayers" placeholder="{{ Lang::get('server.server_label_maxPlayers') }}" value="{{ $server->server_cfg->maxPlayers }}" />
                                                </label>
                                            </section>
                                            <section>
                                                <label for="timeStampFormat">
                                                    {{ Lang::get('server.server_label_timeStampFormat') }}
                                                </label>
                                                <label class="select">
                                                    <select class="input-sm" name="timeStampFormat">
                                                        <option value="none"@if ($server->server_cfg->timeStampFormat == 'none') selected="true"@endif>None</option>
                                                        <option value="short"@if ($server->server_cfg->timeStampFormat == 'short') selected="true"@endif>Short</option>
                                                        <option value="full"@if ($server->server_cfg->timeStampFormat == 'full') selected="true"@endif>Full</option>
                                                    </select>
                                                    <i></i>
                                                </label>
                                            </section>
                                            <section>
                                                <label for="battleye">
                                                    {{ Lang::get('server.server_label_battleye') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="battleye" value="1" @if ($server->server_cfg->battleye == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="battleye" value="0" @if ($server->server_cfg->battleye == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                            <!-- NON EXISTENT PARAM <section>
                                                <label for="third_person_view">
                                                    {{ Lang::get('server.server_label_third_person_view') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="third_person_view" value="1" @if ($server->server_cfg->third_person_view == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="third_person_view" value="0" @if ($server->server_cfg->third_person_view == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section> -->
                                            <section>
                                                <label for="force_rotor_lib_simulation">
                                                    {{ Lang::get('server.server_label_force_rotor_lib_simulation') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="force_rotor_lib_simulation" value="1" @if ($server->server_cfg->force_rotor_lib_simulation == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="force_rotor_lib_simulation" value="0" @if ($server->server_cfg->force_rotor_lib_simulation == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                            <section>
                                                <label for="kickDuplicate">
                                                    {{ Lang::get('server.server_label_kickDuplicate') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="kickDuplicate" value="1" @if ($server->server_cfg->kickDuplicate == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="kickDuplicate" value="0" @if ($server->server_cfg->kickDuplicate == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                            <!-- Outdated - replaced by verifySignatures!
                                            <section>
                                                <label for="equalModRequired">
                                                    {{ Lang::get('server.server_label_equalModRequired') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="equalModRequired" value="1" @if ($server->server_cfg->equalModRequired == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="equalModRequired" value="0" @if ($server->server_cfg->equalModRequired == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                            -->
                                            <section>
                                                <label for="requiredSecureId">
                                                    {{ Lang::get('server.server_label_requiredSecureId') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="requiredSecureId" value="1" @if ($server->server_cfg->requiredSecureId == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="requiredSecureId" value="0" @if ($server->server_cfg->requiredSecureId == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                            <section>
                                                <label for="disableVoN">
                                                    {{ Lang::get('server.server_label_disableVoN') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="disableVoN" value="1" @if ($server->server_cfg->disableVoN == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="disableVoN" value="0" @if ($server->server_cfg->disableVoN == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                            <section>
                                                <label for="persistent">
                                                    {{ Lang::get('server.server_label_persistent') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="persistent" value="1" @if ($server->server_cfg->persistent == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="persistent" value="0" @if ($server->server_cfg->persistent == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
											<section>
                                                <label for="drawingInMap">
                                                    {{ Lang::get('server.server_label_drawingInMap') }}
                                                </label>
                                                <div class="inline-group">
                                                    <label class="radio">
                                                        <input type="radio" name="drawingInMap" value="1" @if ($server->server_cfg->drawingInMap == 1) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.yes') }}
                                                    </label>
                                                    <label class="radio">
                                                        <input type="radio" name="drawingInMap" value="0" @if ($server->server_cfg->drawingInMap == 0) checked="true" @endif />
                                                        <i></i>{{ Lang::get('general.no') }}
                                                    </label>
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                    <section>
                                        <label for="mission_parameters">
                                            {{ Lang::get('server.label_mission_parameters') }}
                                        </label>
                                        <label class="textarea">
                                            <textarea rows="9" class="custom-scroll" name="mission_parameters" placeholder="{{ Lang::get('server.label_mission_parameters') }}">{{ $server->server_cfg->mission_parameters }}</textarea>
                                        </label>
                                    </section>
                                @else
                                    <div class="row">
                                        <section class="col col-6">
                                            <label for="difficulty">
                                                {{ Lang::get('server.server_label_difficulty') }}
                                            </label>
                                            <label class="select">
                                                <select class="input-sm" name="difficulty">
                                                    <option value="recruit"@if ($server->server_cfg->difficulty == 'recruit') selected="true"@endif>Recruit</option>
                                                    <option value="regular"@if ($server->server_cfg->difficulty == 'regular') selected="true"@endif>Regular</option>
                                                    <option value="veteran"@if ($server->server_cfg->difficulty == 'veteran') selected="true"@endif>Veteran</option>
                                                    <option value="mercenary"@if ($server->server_cfg->difficulty == 'mercenary') selected="true"@endif>Mercenary</option>
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                        <section class="col col-6">
                                            <label for="template">
                                                {{ Lang::get('server.server_label_template') }}
                                            </label>
                                            <label class="select">
                                                <select class="input-sm" name="template">
                                                    @foreach($missions as $mission)
                                                        {{ $mission = str_replace('.pbo', '', $mission) }}
                                                        <option value="{{ $mission }}"@if ($server->server_cfg->template == $mission) selected="true"@endif>{{ $mission }}</option>
                                                    @endforeach
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                    </div>
                                    <section>
                                        <label for="mission_parameters">
                                            {{ Lang::get('server.label_parameters') }}
                                        </label>
                                        <label class="textarea">
                                            <textarea class="custom-scroll" name="mission_parameters" placeholder="{{ Lang::get('server.label_parameters') }}">{{ $server->server_cfg->mission_parameters }}</textarea>
                                        </label>
                                    </section>
                                @endif
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

    var autosizefunction = function() {
        var autosizefunction = autosize($('textarea'));
    };
    loadScript("assets/js/autosize.min.js", autosizefunction);
</script>
