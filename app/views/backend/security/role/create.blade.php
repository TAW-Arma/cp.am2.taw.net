<section id="widget-grid" class="">
    <div class="row">
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="jarviswidget" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-collapsed="false" data-widget-sortable="false">
                <header>
                    <span class="widget-icon"> <i class="fa fa-users"></i> </span>
                    <h2>{{ Lang::get('roles.h2_create') }}</h2>
                </header>
                <div>
                    <div class="jarviswidget-editbox">
                    </div>
                    <div class="widget-body no-padding">
                        <form action="/backend/security/role/create" method="post" id="role-form" class="smart-form" novalidate="novalidate">
                            <fieldset>
                                <div class="row">
                                    <section class="col col-6">
                                        <label for="name">
                                            {{ Lang::get('roles.label_name') }}
                                        </label>
                                        <label class="input">
                                            <input type="text" name="name" placeholder="{{ Lang::get('roles.label_name') }}" />
                                        </label>
                                    </section>
                                    <section class="col col-6">
                                        <label for="level">
                                            {{ Lang::get('roles.label_level') }}
                                        </label>
                                        <label class="select">
                                            <select name="level">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7" selected="true">7</option>
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
                                            <textarea name="description" placeholder="{{ Lang::get('roles.label_description') }}"></textarea>
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
</div>
<script type="text/javascript">
    pageSetUp();
    var pagefunction = function() {
        var $checkoutForm = $('#role-form').validate({
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
    };
    loadScript("assets/js/plugin/jquery-form/jquery-form.min.js", pagefunction);
</script>
