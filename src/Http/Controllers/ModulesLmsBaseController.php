<?php

namespace Lms\ModulesLmsBase\Http\Controllers;

use App\Http\Controllers\Controller;

class ModulesLmsBaseController extends Controller
{
    public function index()
    {
        return view('modules-lms-base::base.dashboard');
    }

    public function settings()
    {
        return view('modules-lms-base::base.settings');
    }

    public function management()
    {
        return view('modules-lms-base::base.learner-management');
    }
}
