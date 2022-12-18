<?php

namespace App\Http\Middleware;

use App\Models\User;
<<<<<<< HEAD
use App\Models\UserInformation;
=======
>>>>>>> origin/database
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class hasPhoneNumber
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()){
<<<<<<< HEAD
            $user = UserInformation::where("user_id", Auth::id())->first();
=======
            $user = User::find(Auth::id());
>>>>>>> origin/database
            if($user->is_phone_verified == 1){
                return redirect()->route("home");
            }
        }else{
            return redirect()->route("home");
        }
        return $next($request);
    }
}
