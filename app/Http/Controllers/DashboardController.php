<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Audit;
use App\Models\User;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function users(): View{
        return view('dashboard.users')->with('users', User::all());
    }
    public function articles(): View{
        return view('dashboard.articles')->with('articles', Article::all());
    }
    public function audit(): View{
        return view('dashboard.audit')->with('audit', Audit::all());
    }
}
