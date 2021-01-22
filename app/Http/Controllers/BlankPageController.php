<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of welcome
 *
 * @author Asip Hamdi
 * Github : axxpxmd
 */

namespace App\Http\Controllers;

class BlankPageController extends Controller
{
    public function index()
    {
        return view('layouts.blankPage');
    }
}
