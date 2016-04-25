<section id="widget-grid" class="">
    <div class="row">
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="jarviswidget" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-collapsed="false" data-widget-sortable="false">
                <header>
                    <span class="widget-icon"> <i class="fa fa-user"></i> </span>
                    <h2>{{ Lang::get('users.h2_overview') }}</h2>
                </header>
                <div>
                    <div class="jarviswidget-editbox">
                    </div>
                    <div class="widget-body no-padding">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>{{ Lang::get('users.label_username') }}</th>
                                        <th>{{ Lang::get('users.label_email') }}</th>
                                        <th style="width: 70px; text-align: center;">{{ Lang::get('users.label_verified') }}</th>
                                        <th style="width: 70px; text-align: center;">{{ Lang::get('users.label_disabled') }}</th>
                                        @if ( $can_create != false and $can_update != false and $can_delete != false )
                                            <td style="width: 70px;">
                                                @if ($can_create)
                                                    <a class="btn btn-success btn-xs" href="/backend#backend/security/user/create"><i class="fa fa-plus"></i></a>
                                                @endif
                                            </td>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->username }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td style="width: 70px; text-align: center;">
                                                @if ($user->verified == 1)
                                                    <i class="fa fa-check"></i>
                                                @else
                                                    <i class="fa fa-times"></i>
                                                @endif
                                            </td>
                                            <td style="width: 70px; text-align: center;">
                                                @if ($user->disabled == 1)
                                                    <i class="fa fa-check"></i>
                                                @else
                                                    <i class="fa fa-times"></i>
                                                @endif
                                            </td>
                                            @if ( $can_create != false and $can_update != false and $can_delete != false )
                                                <td style="width: 70px;">
                                                    @if ($can_update)
                                                        <a class="btn btn-warning btn-xs" href="/backend#backend/security/user/update/{{ $user->id }}"><i class="fa fa-pencil"></i></a>
                                                    @endif
                                                    @if ($can_delete)
                                                        <a class="btn btn-danger btn-xs"  href="/backend#backend/security/user/delete/{{ $user->id }}"><i class="fa fa-times"></i></a>
                                                    @endif
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </div>
</div>
<script type="text/javascript">
    pageSetUp();
    var pagefunction = function()
    {
    };
    pagefunction();
</script>