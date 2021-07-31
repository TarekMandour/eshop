<?php
#App\Plugins\Payment\Telr\Admin\AdminController.php

namespace App\Plugins\Payment\Telr\Admin;

use SCart\Core\Front\Controllers\Controller;
use App\Plugins\Payment\Telr\AppConfig;

class AdminController extends Controller
{
    public $plugin;

    public function __construct()
    {
        $this->plugin = new AppConfig;
    }
    public function index()
    {
        return view($this->plugin->pathPlugin.'::Admin',
            [
                
            ]
        );
    }
}
