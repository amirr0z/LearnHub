<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        $op = str_split($role, 1)[0];
        if ($op == '!') {
            $role = explode('!', $role)[1];
            if (Auth::check() and Auth::user()->role != $role)
                return $next($request);
        } else {
            if (Auth::check() and Auth::user()->role == $role)
                return $next($request);
        }

        if ($request->wantsJson()) {
            return response()->json(['status' => false, 'message' => __('Unauthorized')], 401);
        } else {
            session()->flash('message', 'Unauthorized.');
            session()->flash('title', 'error');
            session()->flash('type', 'error');
            return redirect()->back();
        }
    }
}
