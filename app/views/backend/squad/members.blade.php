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
                        <form action="/backend/squad/members/{{ $squad->id }}" method="post" id="squad-form" class="smart-form" novalidate="novalidate" enctype="multipart/form-data">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" id="members">
                                    <thead>
                                        <tr>
                                            <th>{{ Lang::get('squad.label_member_id') }}</th>
                                            <th>{{ Lang::get('squad.label_player_id') }}</th>
                                            <th>{{ Lang::get('squad.label_nickname') }}</th>
                                            <th>{{ Lang::get('squad.label_name') }}</th>
                                            <th>{{ Lang::get('squad.label_email') }}</th>
                                            <th>{{ Lang::get('squad.label_icq') }}</th>
                                            <th>{{ Lang::get('squad.label_remark') }}</th>
                                            <th>
                                                <label class="input">
                                                    <input name="button_add" id="button_add" value="+" class="btn btn-default btn-md member-add" type="button" />
                                                </label>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($members as $member): ?>
                                            <tr>
                                                <td>
                                                    <label class="input">
                                                        <input name="row[]" id="row_<?php echo $member->id; ?>" value="<?php echo $member->id; ?>" type="text" readonly="true" />
                                                    </label>
                                                </td>
                                                <td>
                                                    <label class="input">
                                                        <input name="player_id[]" id="player_id_<?php echo $member->id; ?>" value="<?php echo $member->player_id; ?>" placeholder="" type="text" />
                                                    </label>
                                                </td>
                                                <td>
                                                    <label class="input">
                                                        <input name="nickname[]" id="nickname_<?php echo $member->id; ?>" value="<?php echo $member->nickname; ?>" placeholder="" type="text" />
                                                    </label>
                                                </td>
                                                <td>
                                                    <label class="input">
                                                        <input name="name[]" id="name_<?php echo $member->id; ?>" value="<?php echo $member->name; ?>" placeholder="" type="text" />
                                                    </label>
                                                </td>
                                                <td>
                                                    <label class="input">
                                                        <input name="email[]" id="email_<?php echo $member->id; ?>" value="<?php echo $member->email; ?>" placeholder="" type="text" />
                                                    </label>
                                                </td>
                                                <td>
                                                    <label class="input">
                                                        <input name="icq[]" id="icq_<?php echo $member->id; ?>" value="<?php echo $member->icq; ?>" placeholder="" type="text" />
                                                    </label>
                                                </td>
                                                <td>
                                                    <label class="input">
                                                        <input name="remark[]" id="remark_<?php echo $member->id; ?>" value="<?php echo $member->remark; ?>" placeholder="" type="text" />
                                                    </label>
                                                </td>
                                                <td>
                                                    <label class="input">
                                                        <input name="button_edit[]" id="button_edit_<?php echo $member->id; ?>" value="-" class="btn btn-default btn-md member-remove" type="button" />
                                                    </label>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
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
</section>
<script type="text/javascript">
    $(function ()
    {
        $(document).on("click", ".member-remove" ,function(e){
            e.preventDefault();
            var row         = $(this).parent().parent().parent();
            row.remove();
        });
        $('.member-add').click(function(e)
        {
            e.preventDefault();
            
            if($('.row-member').length == null || $('.row-member').length == 0)
            {
                var row_count = '0';
            }
            else
            {
                var row_count = $('.row-member').length;
            }
            $('#members').find('tbody').append('<tr><td><label class="input"><input name="row[]" id="row_0" value="0" type="text" readonly="true" /></label></td><td><label class="input"><input name="player_id[]" id="player_id_0" placeholder="{{ Lang::get('squad.label_player_id') }}" type="text" /></label></td><td><label class="input"><input name="nickname[]" id="nickname_0" placeholder="{{ Lang::get('squad.label_nickname') }}" type="text" /></label></td><td><label class="input"><input name="name[]" id="name_0" placeholder="{{ Lang::get('squad.label_name') }}" type="text" /></label></td><td><label class="input"><input name="email[]" id="email_0" placeholder="{{ Lang::get('squad.label_email') }}" type="text" /></label></td><td><label class="input"><input name="icq[]" id="icq_0" placeholder="{{ Lang::get('squad.label_icq') }}" type="text" /></label></td><td><label class="input"><input name="remark[]" id="remark_0" placeholder="{{ Lang::get('squad.label_remark') }}" type="text" /></label></td><td><label class="input"><input name="button_edit[]" id="button_edit_0" value="-" class="btn btn-default btn-md member-remove" type="button" /></label></td></tr>');
        });
    });
</script>