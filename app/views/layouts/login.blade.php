<!DOCTYPE html>
<html lang="en-us" id="extr-page">
    <head>
        @include('layouts.login.assets')
        <style type="text/css">
            html, body
            {
                 height: 100%;
                 min-height: 100%;
            }
        </style>
    </head>
    <body class="animated fadeInDown">
        <div class="container" style="height: 100%;">
            <div class="row" style="height: 100%;">
                <div class="col-md-4 col-md-offset-4" style="height: 100%; -webkit-transform-style: preserve-3d; -moz-transform-style: preserve-3d; transform-style: preserve-3d;">
                    <div class="well no-padding" style="position: relative; top: 50%; transform: translateY(-50%);">
                        <form action="login" method="post" id="login-form" class="smart-form client-form">
                            <header>
                                Login to the panel
                            </header>
                            <fieldset>
                                <section>
                                    <label class="label">Username (Without @taw.net)</label>
                                    <label class="input">
                                        <i class="icon-append fa fa-user"></i>
                                        <input type="text" name="username" />
                                        <b class="tooltip tooltip-top-right">
                                            <i class="fa fa-user txt-color-teal"></i>
                                            Please enter email address/username
                                        </b>
                                    </label>
                                </section>
                                <section>
                                    <label class="label">Password</label>
                                    <label class="input">
                                        <i class="icon-append fa fa-lock"></i>
                                        <input type="password" name="password" />
                                        <b class="tooltip tooltip-top-right">
                                            <i class="fa fa-lock txt-color-teal"></i>
                                            Enter your password
                                        </b>
                                    </label>
                                </section>
                            </fieldset>
                            <footer>
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>
                            </footer>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.login.scripts')
    </body>
</html>