<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use App\Models\Property;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $propertyTotal = Property::count();
        $ownerTotal = Owner::count();

        return view('dashboard', compact('propertyTotal', 'ownerTotal'));
    }
}