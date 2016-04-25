<section id="widget-grid" class="">
    <div class="row">
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="jarviswidget" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-collapsed="false" data-widget-sortable="false">
                <header>
                    <span class="widget-icon"> <i class="fa fa-users"></i> </span>
                    <h2>{{ Lang::get('squad.h2_overview') }}</h2>
                </header>
                <div>
                    <div class="jarviswidget-editbox">
                    </div>
                    <div class="widget-body no-padding">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>{{ Lang::get('squad.label_nickname') }}</th>
                                        <th>{{ Lang::get('squad.label_name') }}</th>
                                        <th>{{ Lang::get('squad.label_email') }}</th>
                                        <th>{{ Lang::get('squad.label_web') }}</th>
                                        <th>{{ Lang::get('squad.label_title') }}</th>
                                        <th>{{ Lang::get('squad.label_picture') }}</th>
                                        <td style="width: 120px;">
                                            @if ($can_create)
                                                <a class="btn btn-success btn-xs" href="/backend#backend/squad/create"><i class="fa fa-plus"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($squads as $squad)
                                        <tr>
                                            <td>{{ $squad->nickname }}</td>
                                            <td>{{ $squad->name }}</td>
                                            <td>{{ $squad->email }}</td>
                                            <td>{{ $squad->web }}</td>
                                            <td>{{ $squad->title }}</td>
                                            <td><img src="{{ $squad->picture }}" /></td>
                                            <td style="width: 120px;">
                                                <a class="btn btn-success btn-xs" target="_BLANK" href="/squads/{{ $squad->nickname }}/squad.xml"><i class="fa fa-file"></i></a>
                                                @if ($can_manage)
                                                    <a class="btn btn-success btn-xs"  href="/backend#backend/squad/members/{{ $squad->id }}"><i class="fa fa-pencil"></i></a>
                                                @endif
                                                @if ($can_update)
                                                    <a class="btn btn-warning btn-xs" href="/backend#backend/squad/update/{{ $squad->id }}"><i class="fa fa-pencil"></i></a>
                                                @endif
                                                @if ($can_delete)
                                                    <a class="btn btn-danger btn-xs"  href="/backend#backend/squad/delete/{{ $squad->id }}"><i class="fa fa-times"></i></a>
                                                @endif
                                            </td>
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