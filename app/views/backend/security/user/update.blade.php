<section id="widget-grid" class="">
    <div class="row">
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="jarviswidget" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-collapsed="false" data-widget-sortable="false">
                <header>
                    <span class="widget-icon"> <i class="fa fa-user"></i> </span>
                    <h2>{{ Lang::get('users.h2_update', array('username' => $user->username)) }}</h2>
                </header>
                <div>
                    <div class="jarviswidget-editbox">
                    </div>
                    <div class="widget-body no-padding">
                        <form action="/backend/security/user/update/{{ $user->id }}" method="post" id="user-form" class="smart-form" novalidate="novalidate">
                            <fieldset>
                                <div class="row">
                                    <section class="col col-6">
                                        <label for="username">
                                            {{ Lang::get('users.label_username') }}
                                        </label>
                                        <label class="input">
                                            <i class="icon-prepend fa fa-user"></i>
                                            <input type="text" name="username" placeholder="{{ Lang::get('users.label_username') }}" value="{{ $user->username }}" />
                                        </label>
                                    </section>
                                    <section class="col col-6">
                                        <label for="password">
                                            {{ Lang::get('users.label_password') }}
                                        </label>
                                        <label class="input">
                                            <i class="icon-prepend fa fa-key"></i>
                                            <input type="password" name="password" placeholder="{{ Lang::get('users.label_password') }}" value="" />
                                        </label>
                                    </section>
                                </div>
                                <div class="row">
                                    <section class="col col-6">
                                        <label for="email">
                                            {{ Lang::get('users.label_email') }}
                                        </label>
                                        <label class="input">
                                            <i class="icon-prepend fa fa-envelope-o"></i>
                                            <input type="email" name="email" placeholder="{{ Lang::get('users.label_email') }}" value="{{ $user->email }}">
                                        </label>
                                    </section>
                                    <section class="col col-6">
                                        <label for="verified">
                                            {{ Lang::get('users.label_verified') }}
                                        </label>
                                        <div class="inline-group">
                                            <label class="radio">
                                                <input type="radio" name="verified" value="yes" @if ($user->verified == 1) checked="true" @endif>
                                                <i></i>{{ Lang::get('general.yes') }}
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="verified" value="no" @if ($user->verified == 0) checked="true" @endif>
                                                <i></i>{{ Lang::get('general.no') }}
                                            </label>
                                        </div>
                                    </section>
                                </div>
                                <div class="row">
                                    <section class="col col-6">
                                    </section>
                                    <section class="col col-6">
                                        <label for="disabled">
                                            {{ Lang::get('users.label_disabled') }}
                                        </label>
                                        <div class="inline-group">
                                            <label class="radio">
                                                <input type="radio" name="disabled" value="yes" @if ($user->disabled == 1) checked="true" @endif>
                                                <i></i>{{ Lang::get('general.yes') }}
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="disabled" value="no" @if ($user->disabled == 0) checked="true" @endif>
                                                <i></i>{{ Lang::get('general.no') }}
                                            </label>
                                        </div>
                                    </section>
                                </div>
                            </fieldset>
                            <footer>
                                <button type="submit" class="btn btn-primary">{{ Lang::get('general.save') }}</button>
                                <a class="btn btn-default" href="/backend#backend/security/user">{{ Lang::get('general.cancel') }}</a>
                            </footer>
                        </form>
                    </div>
                </div>
            </div>
        </article>
    </div>
    <div class="row">
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="jarviswidget" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-collapsed="false" data-widget-sortable="false">
                <header>
                    <span class="widget-icon"> <i class="fa fa-users"></i> </span>
                    <h2>{{ Lang::get('users.h2_map_user_to_roles') }}</h2>
                </header>
                <div>
                    <div class="jarviswidget-editbox">
                    </div>
                    <div class="widget-body no-padding">
                        <form action="/backend/security/user/update_role/{{ $user->id }}" method="post" id="user-form" novalidate="novalidate">
                            <div style="padding: 15px;">
                                <select multiple="multiple" name="roles[]" id="initializeDuallistbox">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id; }}"@if (in_array($role->id, $user_roles)) selected="true" @endif>{{ $role->description; }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="smart-form">
                                <footer>
                                    <button type="submit" class="btn btn-primary">{{ Lang::get('general.save') }}</button>
                                    <a class="btn btn-default" href="/backend#backend/security/user">{{ Lang::get('general.cancel') }}</a>
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
        var $checkoutForm = $('#user-form').validate({
            rules : {
                username : {
                    required : true
                },
                password : {
                    required : false
                },
                email : {
                    required : true,
                    email : true
                },
                verified : {
                    required : true
                },
                disabled : {
                    required : true
                },
            },
            messages : {
                username : {
                    required : 'Please enter your username'
                },
                password : {
                    required : 'Please enter your password'
                },
                email : {
                    required : 'Please enter your email address',
                    email : 'Please enter a VALID email address'
                },
                verified : {
                    required : 'Please enter your choice'
                },
                disabled : {
                    required : 'Please enter your choice'
                },
            },
            errorPlacement : function(error, element) {
                error.insertAfter(element.parent());
            }
        });
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
