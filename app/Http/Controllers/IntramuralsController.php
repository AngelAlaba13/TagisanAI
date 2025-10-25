<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IntramuralsController extends Controller
{
    public function departmentPoints()
    {
        return view('intramurals.Department Points.department-points');
    }

    public function manageDepartments()
    {
        return view('intramurals.Manage Departments.manage-departments');
    }

    public function manageEvents()
    {
        return view('intramurals.Manage Events.manage-events');
    }

    public function customize()
    {
        return view('intramurals.Intramurals Customize.intramurals-customize');
    }
}
