<section id="widget-grid" class="">
    <div class="row">
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="jarviswidget" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-collapsed="false" data-widget-sortable="false">
                <header>
                    <span class="widget-icon"> <i class="fa fa-users"></i> </span>
                    <h2>{{ Lang::get('squad.h2_update', array('nickname' => $squad->nickname)) }}</h2>
                </header>
                <div>
                    <div class="jarviswidget-editbox">
                    </div>
                    <div class="widget-body no-padding">
                        <form action="/backend/squad/update/{{ $squad->id }}" method="post" id="squad-form" class="smart-form" novalidate="novalidate" enctype="multipart/form-data">
                            <fieldset>
                                <div class="row">
                                    <section class="col col-6">
                                        <label class="label" for="nickname">
                                            {{ Lang::get('squad.label_nickname') }}
                                        </label>
                                        <label class="input">
                                            <input type="text" name="nickname" placeholder="{{ Lang::get('squad.label_nickname') }}" value="{{ $squad->nickname }}" />
                                        </label>
                                    </section>
                                    <section class="col col-6">
                                        <label class="label" for="name">
                                            {{ Lang::get('squad.label_name') }}
                                        </label>
                                        <label class="input">
                                            <input type="text" name="name" placeholder="{{ Lang::get('squad.label_name') }}" value="{{ $squad->name }}" />
                                        </label>
                                    </section>
                                </div>
                                <div class="row">
                                    <section class="col col-6">
                                        <label class="label" for="email">
                                            {{ Lang::get('squad.label_email') }}
                                        </label>
                                        <label class="input">
                                            <input type="text" name="email" placeholder="{{ Lang::get('squad.label_email') }}" value="{{ $squad->email }}" />
                                        </label>
                                    </section>
                                    <section class="col col-6">
                                        <label class="label" for="web">
                                            {{ Lang::get('squad.label_web') }}
                                        </label>
                                        <label class="input">
                                            <input type="text" name="web" placeholder="{{ Lang::get('squad.label_web') }}" value="{{ $squad->web }}" />
                                        </label>
                                    </section>
                                </div>
                                <div class="row">
                                    <section class="col col-6">
                                        <label class="label" for="title">
                                            {{ Lang::get('squad.label_title') }}
                                        </label>
                                        <label class="input">
                                            <input type="text" name="title" placeholder="{{ Lang::get('squad.label_title') }}" value="{{ $squad->title }}" />
                                        </label>
                                    </section>
                                    <section class="col col-6">
                                        <label class="label">
                                            {{ Lang::get('squad.label_picture') }}
                                        </label>
                                        <label for="picture" class="input input-file">
                                            <div class="button"><input type="file" name="picture" onchange="this.parentNode.nextSibling.value = this.value" />Browse</div><input type="text" placeholder="Picture" readonly="">
                                        </label>
                                    </section>
                                </div>
                            </fieldset>
                            <footer>
                                <button type="submit" class="btn btn-primary">{{ Lang::get('general.save') }}</button>
                                <a class="btn btn-default" href="/backend#backend/squad">{{ Lang::get('general.cancel') }}</a>
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
                        <h2>{{ Lang::get('squad.h2_map_squad_to_users') }}</h2>
                    </header>
                    <div>
                        <div class="jarviswidget-editbox">
                        </div>
                        <div class="widget-body no-padding">
                            <form action="/backend/squad/update_management/{{ $squad->id }}" method="post" id="user-form" novalidate="novalidate">
                                <div style="padding: 15px;">
                                    <select multiple="multiple" name="users[]" id="initializeDuallistbox">
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id; }}"@if (in_array($user->id, $squad_users)) selected="true" @endif>{{ $user->username; }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="smart-form">
                                    <footer>
                                        <button type="submit" class="btn btn-primary">{{ Lang::get('general.save') }}</button>
                                        <a class="btn btn-default" href="/backend#backend/squad">{{ Lang::get('general.cancel') }}</a>
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
        var $checkoutForm = $('#squad-form').validate({
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
