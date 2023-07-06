<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NavigationController extends Controller
{
    public function openPage($page){

        switch($page) {
            case 'todoList' :
                $view = 'todoList';
                break;
            case 'calculator' :
                $view = 'calculator';
                break;
            case 'numberConverter' :
                $view = 'numberConverter';
                break;
            case 'sortNumber' :
                $view = 'sortNumber';
                break;
            case 'sortString' :
                $view = 'sortString';
                break;
            default:
                $view = 'todoList';
                break;
        }
        return view($view);
    }
}
