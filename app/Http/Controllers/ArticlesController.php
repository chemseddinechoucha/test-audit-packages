<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function destroy(Article $article): RedirectResponse
    {
        $article->delete();
        return redirect()->back(200);
    }
    public function edit(Article $user){}

    public function update(Request $request, Article $user){}
}
