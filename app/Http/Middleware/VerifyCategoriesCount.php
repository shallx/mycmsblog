<?php

namespace App\Http\Middleware;

use Closure;
use App\Category;

class VerifyCategoriesCount
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $cats = Category::all();
        if($cats->count() == 0){
            session()->flash('error', 'You need to create some categories first');
            return redirect(route('categories.create'));
        }
        return $next($request);
    }
}
