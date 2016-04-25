<?php

class DashboardController extends BaseController
{
    public function GetIndex()
    {
        if ( ! Auth::user()->can('see_dashboard'))
            return Redirect::to('login');

        return View::make('backend.dashboard.index');
    }
}
