<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Categories;
use App\Models\Gallery;

class FrontController extends Controller
{
    protected $data = [];
    public function __construct()
    {
        $model = new Menu();
        $cat = new Categories();
        $gallery = new Gallery();

        $categories = $cat->getCategories();
        $menu = $model->getAllMenu();
        $this->data['meni'] = $menu;
        $this->data['kategorije'] = $categories;
    }
}
