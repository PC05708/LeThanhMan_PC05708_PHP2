<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Core\BaseRender;

class HomeController extends BaseController
{

    private $_renderBase;
    function __construct()
    {
        parent::__construct();
        $this->_renderBase = new BaseRender();
    }

    function HomeController()
    {
        $this->homePage();
    }

    function homePage()
    {
        $data = [];
        $this->_renderBase->renderHeader();
        $this->load->render('layouts/home', $data);
        $this->_renderBase->renderFooter();
    }

    function detail($id)
    {
    }
}
