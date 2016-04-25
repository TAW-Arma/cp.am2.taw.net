<section id="widget-grid" class="">
    <div class="row">
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="jarviswidget" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-collapsed="false" data-widget-sortable="false">
                <header>
                    <span class="widget-icon"> <i class="fa fa-users"></i> </span>
                    <h2>{{ Lang::get('roles.h2_update', array('description' => $role->description)) }}</h2>
                </header>
                <div>
                    <div class="jarviswidget-editbox">
                    </div>
                    <div class="widget-body no-padding">
                        <form action="/backend/security/role/update/{{ $role->id }}" method="post" id="role-form" class="smart-form" novalidate="novalidate">
                            <fieldset>
                                <div class="row">
                                    <section class="col col-6">
                                        <label for="name">
                                            {{ Lang::get('roles.label_name') }}
                                        </label>
                                        <label class="input">
                                            <input type="text" name="name" placeholder="{{ Lang::get('roles.label_name') }}" value="{{ $role->name }}" />
                                        </label>
                                    </section>
                                    <section class="col col-6">
                                        <label for="level">
                                            {{ Lang::get('roles.label_level') }}
                                        </label>
                                        <label class="select">
                                            <select name="level">
                                                <option value="1" @if ($role->level == 1) selected="true" @endif >1</option>
                                                <option value="2" @if ($role->level == 2) selected="true" @endif >2</option>
                                                <option value="3" @if ($role->level == 3) selected="true" @endif >3</option>
                                                <option value="4" @if ($role->level == 4) selected="true" @endif >4</option>
                                                <option value="5" @if ($role->level == 5) selected="true" @endif >5</option>
                                                <option value="6" @if ($role->level == 6) selected="true" @endif >6</option>
                                                <option value="7" @if ($role->level == 7) selected="true" @endif >7</option>
                                            </select>
                                        </label>
                                    </section>
                                </div>
                                <div class="row">
                                    <section class="col col-6">
                                        <label for="description">
                                            {{ Lang::get('roles.label_description') }}
                                        </label>
                                        <label class="textarea">
                                            <textarea name="description" placeholder="{{ Lang::get('roles.label_description') }}">{{ $role->description }}</textarea>
                                        </label>
                                    </section>
                                    <section class="col col-6">
                                    </section>
                                </div>
                            </fieldset>
                            <footer>
                                <button type="submit" class="btn btn-primary">{{ Lang::get('general.save') }}</button>
                                <a class="btn btn-default" href="/backend#backend/security/role">{{ Lang::get('general.cancel') }}</a>
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
                    <span class="widget-icon"> <i class="fa fa-key"></i> </span>
                    <h2>{{ Lang::get('roles.h2_map_role_to_permissions') }}</h2>
                </header>
                <div>
                    <div class="jarviswidget-editbox">
                    </div>
                    <div class="widget-body no-padding">
                        <form action="/backend/security/role/update_permission/{{ $role->id }}" method="post" id="role-form" novalidate="novalidate">
                            <div style="padding: 15px;">
                                <select multiple="multiple" name="permissions[]" id="initializeDuallistbox">
                                    @foreach ($permissions as $permission)
                                        <option value="{{ $permission->id; }}"@if (in_array($permission->id, $role_permissions)) selected="true" @endif>{{ $permission->description; }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="smart-form">
                                <footer>
                                    <button type="submit" class="btn btn-primary">{{ Lang::get('general.save') }}</button>
                                    <a class="btn btn-default" href="/backend#backend/security/role">{{ Lang::get('general.cancel') }}</a>
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
        var $RoleForm = $('#role-form').validate({
            rules : {
                name : {
                    required : true
                },
                level : {
                    required : true
                },
                description : {
                    required : true
                },
            },
            messages : {
                name : {
                    required : 'Please enter your name'
                },
                level : {
                    required : 'Please enter your level'
                },
                description : {
                    required : 'Please enter your description',
                },
            },
            errorPlacement : function(error, element) {
                error.insertAfter(element.parent());
            }
        });
        var $PermissionForm = $('#permission-form').validate({
            rules : {
            },
            messages : {
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
