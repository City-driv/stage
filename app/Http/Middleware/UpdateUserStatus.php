<?php

namespace App\Http\Middleware;

use Closure;
use DateTime;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;
class UpdateUserStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        if (auth()->check()) {
            $user = auth()->user();
            if ($user->admin==0) {
                if ($user->date_cr !== null && $user->date_exp !== null) {
                    // $date_cr = new DateTime($user->date_cr);
                    $date_cr = now();
                    $date_exp = new DateTime($user->date_exp);
                    // $yearDifference = $date_cr->diff($date_exp)->y;
        
                    if (($date_cr >= $date_exp) || ($user->pack =='perso' && $user->num_doc >= 1000) || ($user->pack =='starter' && $user->num_doc >= 3000)) {
                        $userModel = User::find($user->id); // Charger le modèle complet depuis la base de données
                        $userModel->status = 'inactive';
                        $userModel->save();
                    }
                }
            }
        }
    
        return $response;
    }
}
