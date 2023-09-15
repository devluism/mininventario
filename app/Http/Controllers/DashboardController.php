<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Database\Eloquent\Collection;
use Yajra\DataTables\Facades\Datatables;

use App\Models\User;
use App\Models\Project;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $filter = new \stdClass();
        if (Auth::user()->role != 0) {
            $projects = Project::where('user_id', Auth::user()->id)->get();
            $filter->object = 'proyecto';
            $filter->options = $projects;
        }
        else {
            $users = User::where('role', 1)->get();
            $filter = new \stdClass();
            $filter->object = 'jefe de proyecto';
            $filter->options = $users;
        }

        return view('dashboard', compact('filter'));
    }
}
