<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Core\BaseRender;
use App\Models\Product;

class StatisticsController extends BaseController
{

    private $_renderBase;
    private $_model;
    function __construct()
    {
        parent::__construct();
        $this->_renderBase = new BaseRender();
        $this->_model = new Product();
    }

    function index()
    {
        $data = $this->_model->countProductsByCategory();
        $this->_renderBase->renderHeader();
        $this->load->render('layouts/statistics/index', $data);
        $this->_renderBase->renderFooter();
    }
}
