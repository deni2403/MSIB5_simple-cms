<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Session\Store;

class InactivityTimeout
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    protected $session;
    protected $timeout = 15;

    public function __construct(Store $session)
    {
        $this->session = $session;
    }

    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return $next($request);
        }

        $user = Auth::user();
        $lastActivity = $this->session->get('last_activity');

        if ($lastActivity && time() - $lastActivity > $this->timeout * 60) {
            Auth::logout();
            $this->session->flush();
            return redirect('/login')->with('timeout', 'Anda telah logout karena tidak ada aktivitas selama ' . $this->timeout . ' menit.');
        }

        $this->session->put('last_activity', time());

        return $next($request);
    }
}
