<section id="widget-grid" class="">
    <div class="row">
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="jarviswidget" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-collapsed="false" data-widget-sortable="false">
                <header>
                    <span class="widget-icon"> <i class="fa fa-folder-open-o"></i> </span>
                    <h2>{{ Lang::get('server.h2_missions') }}</h2>
                </header>
                <div>
                    <div class="jarviswidget-editbox">
                    </div>
                    <div class="widget-body no-padding">
                        @if ($message)
                            <p class="alert alert-{{ $message_type }}">{{ $message }}</p>
                        @endif
                        <form action="/backend/server/missions" method="post" id="missions-form" class="smart-form" novalidate="novalidate" enctype="multipart/form-data">
                            <footer>
                                <button type="submit" class="btn btn-primary">{{ Lang::get('general.upload_mission') }}</button>
                                <label for="mission" class="input input-file pull-right" style="margin-top: 9px;">
                                   <input type="file" name="mission" value="Choose a Mission file" />
                                </label>                                
                            </footer>
                        </form>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>{{ Lang::get('server.missions_name') }}</th>
                                        @if ($can_delete)
                                            <th style="width: 70px;"></th>
                                        @else
                                            <th style="width: 32px;"></th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($missions as $mission)
                                        <tr>
                                            <td>{{ $mission['name'] }}</td>
                                            @if ($can_delete)
                                                <td style="width: 70px;">
                                                    <a class="btn btn-success btn-xs"  href="/backend/server/download_mission/{{ $mission['url'] }}" target="_BLANK"><i class="fa fa-arrow-down"></i></a>
                                                    <a class="btn btn-danger btn-xs"  href="/backend#backend/server/delete_mission/{{ $mission['url'] }}"><i class="fa fa-times"></i></a>
                                                </td>
                                            @else
                                                <td style="width: 32px;">
                                                    <a class="btn btn-success btn-xs"  href="/backend/server/download_mission/{{ $mission['url'] }}" target="_BLANK"><i class="fa fa-arrow-down"></i></a>
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <form action="/backend/server/missions" method="post" id="missions-form" class="smart-form" novalidate="novalidate" enctype="multipart/form-data">
                            <footer>
                                <button type="submit" class="btn btn-primary">{{ Lang::get('general.upload_mission') }}</button>
                                <label for="mission" class="input input-file pull-right" style="margin-top: 9px;">
                                   <input type="file" name="mission" value="Choose a Mission file" />
                                </label>
                            </footer>
                        </form>
                    </div>
                </div>
            </div>
        </article>
    </div>
</section>
<script type="text/javascript">
    pageSetUp();
    var pagefunction = function()
    {
    };
    pagefunction();
</script>