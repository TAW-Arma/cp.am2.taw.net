<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Log Viewer</title>
        <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" />
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
        <link rel="stylesheet" type="text/css" href="/assets/css/elfinder.min.css">
        <link rel="stylesheet" type="text/css" href="/assets/css/theme.css">
        <script src="/assets/js/elfinder.min.js"></script>
        <script src="/js/i18n/elfinder.en.js"></script>
        <script type="text/javascript" charset="utf-8">
            $().ready(function() {
                $('#elfinder').elfinder({
                    lang: 'en',
                    url : '/backend/server/filemanager/connector/{{ $server->id }}/'
                });
            });
        </script>
        <style>
        html, body
        {
            padding: 0;
            margin: 0;
        }
        </style>
    </head>
    <body>
        <div id="elfinder"></div>
    </body>
</html>
