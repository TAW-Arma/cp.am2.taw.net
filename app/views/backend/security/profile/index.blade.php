<section id="widget-grid" class="">
    <div class="row">
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="jarviswidget" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-collapsed="false" data-widget-sortable="false">
                <header>
                    <span class="widget-icon"> <i class="fa fa-user"></i> </span>
                    <h2>{{ Lang::get('profile.h2_index') }}</h2>
                </header>
                <div>
                    <div class="jarviswidget-editbox">
                    </div>
                    <div class="widget-body no-padding">
                        <form action="/backend/my-profile" method="post" id="user-form" class="smart-form" novalidate="novalidate" enctype="multipart/form-data">
                            <fieldset>
                                <div class="row">
                                    <section class="col col-6">
                                        <label for="password">
                                            {{ Lang::get('users.label_password') }}
                                        </label>
                                        <label class="input">
                                            <i class="icon-prepend fa fa-key"></i>
                                            <input type="password" name="password" placeholder="{{ Lang::get('users.label_password') }}" value="" />
                                        </label>
                                    </section>
                                    <section class="col col-6">			 
                                        <label for="picture">
                                            {{ Lang::get('squad.label_picture') }}
                                        </label>
										<label for="picture" class="input input-file">
                                            <div class="button"></i><input type="file" name="picture" onchange="this.parentNode.nextSibling.value = this.value" />Browse</div><input type="text" placeholder="Picture" readonly="">
										</label>
                                    </section>
                                </div>
                            </fieldset>
                            <footer>
                                <button type="submit" class="btn btn-primary">{{ Lang::get('general.save') }}</button>
                                <a class="btn btn-default" href="/backend#backend/dashboard">{{ Lang::get('general.cancel') }}</a>
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
        var $checkoutForm = $('#user-form').validate({
            rules : {
                password : {
                    required : false
                }
            },
            messages : {
                password : {
                    required : 'Please enter your password'
                }
            },
            errorPlacement : function(error, element) {
                error.insertAfter(element.parent());
            }
        });
    };
    loadScript("assets/js/plugin/jquery-form/jquery-form.min.js", pagefunction);
</script>
