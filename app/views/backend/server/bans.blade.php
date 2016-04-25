<section id="widget-grid" class="">
    <div class="row">
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="jarviswidget" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-collapsed="false" data-widget-sortable="false">
                <header>
                    <span class="widget-icon"> <i class="fa fa-minus-circle"></i> </span>
                    <h2>{{ Lang::get('server.h2_bans') }}</h2>
                </header>
                <div>
                    <div class="jarviswidget-editbox">
                    </div>
                    <div class="widget-body no-padding">
                        <form action="/backend/server/bans" method="post" id="bans-form" class="smart-form" novalidate="novalidate" enctype="multipart/form-data">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" id="bans">
                                    <thead>
                                        <tr>
                                            <th>{{ Lang::get('server.bans_ban_id') }}</th>
                                            <th>{{ Lang::get('server.bans_guid') }}</th>
                                            <th>{{ Lang::get('server.bans_time') }}</th>
                                            <th>{{ Lang::get('server.bans_reason') }}</th>
                                            <th>
                                                <label class="input">
                                                    <input name="button_add" id="button_add" value="+" class="btn btn-default btn-md ban-add" type="button" />
                                                </label>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($bans as $ban): ?>
                                            <tr>
                                                <td>
                                                    <label class="input">
                                                        <input name="row[]" id="row_<?php echo $ban->id; ?>" value="<?php echo $ban->id; ?>" type="text" readonly="true" />
                                                    </label>
                                                </td>
                                                <td>
                                                    <label class="input">
                                                        <input name="guid[]" id="guid_<?php echo $ban->id; ?>" value="<?php echo $ban->guid; ?>" placeholder="" type="text" />
                                                    </label>
                                                </td>
                                                <td>
                                                    <label class="input">
                                                        <input name="time[]" id="time_<?php echo $ban->id; ?>" value="<?php echo $ban->time; ?>" placeholder="" type="text" />
                                                    </label>
                                                </td>
                                                <td>
                                                    <label class="input">
                                                        <input name="reason[]" id="reason_<?php echo $ban->id; ?>" value="<?php echo $ban->reason; ?>" placeholder="" type="text" />
                                                    </label>
                                                </td>
                                                <td>
                                                    <label class="input">
                                                        <input name="button_edit[]" id="button_edit_<?php echo $ban->id; ?>" value="-" class="btn btn-default btn-md ban-remove" type="button" />
                                                    </label>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
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
</section>
<script type="text/javascript">
    $(function ()
    {
        $(document).on("click", ".ban-remove" ,function(e){
            e.preventDefault();
            var row         = $(this).parent().parent().parent();
            row.remove();
        });
        $('.ban-add').click(function(e)
        {
            e.preventDefault();
            
            if($('.row-ban').length == null || $('.row-ban').length == 0)
            {
                var row_count = '0';
            }
            else
            {
                var row_count = $('.row-ban').length;
            }
            $('#bans').find('tbody').append('<tr><td><label class="input"><input name="row[]" id="row_0" value="0" type="text" readonly="true" /></label></td><td><label class="input"><input name="guid[]" id="guid_0" value="" placeholder="{{ Lang::get('server.bans_guid') }}" type="text" /></label></td><td><label class="input"><input name="time[]" id="time_0" value="-1" placeholder="{{ Lang::get('server.bans_time') }}" type="text" /></label></td><td><label class="input"><input name="reason[]" id="reason_0" value="" placeholder="{{ Lang::get('server.bans_reason') }}" type="text" /></label></td><td><label class="input"><input name="button_edit[]" id="button_edit_0" value="-" class="btn btn-default btn-md ban-remove" type="button" /></label></td></tr>');
        });
    });
    pageSetUp();
    var pagefunction = function()
    {
    };
    pagefunction();
</script>