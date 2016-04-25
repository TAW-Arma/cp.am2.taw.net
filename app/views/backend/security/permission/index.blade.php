<section id="widget-grid" class="">
    <div class="row">
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="jarviswidget" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-collapsed="false" data-widget-sortable="false">
                <header>
                    <span class="widget-icon"> <i class="fa fa-key"></i> </span>
                    <h2>{{ Lang::get('permissions.h2_overview') }}</h2>
                </header>
                <div>
                    <div class="jarviswidget-editbox">
                    </div>
                    <div class="widget-body no-padding">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>{{ Lang::get('permissions.label_description') }}</th>
                                        <th>{{ Lang::get('permissions.label_name') }}</th>
                                        @if ( $can_create != false and $can_update != false and $can_delete != false )
                                            <td style="width: 70px;">
                                                @if ($can_create)
                                                    <a class="btn btn-success btn-xs" href="/backend#backend/security/permission/create"><i class="fa fa-plus"></i></a>
                                                @endif
                                            </td>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($permissions as $permission)
                                        <tr>
                                            <td>{{ $permission->description }}</td>
                                            <td>{{ $permission->name }}</td>
                                            @if ( $can_create != false and $can_update != false and $can_delete != false )
                                                <td style="width: 70px;">
                                                    @if ($can_update)
                                                        <a class="btn btn-warning btn-xs" href="/backend#backend/security/permission/update/{{ $permission->id }}"><i class="fa fa-pencil"></i></a>
                                                    @endif
                                                    @if ($can_delete)
                                                        <a class="btn btn-danger btn-xs"  href="/backend#backend/security/permission/delete/{{ $permission->id }}"><i class="fa fa-times"></i></a>
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
