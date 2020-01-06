<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Lavary\Menu\Facade as Menu;

class DefineMenus
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        Menu::make('primary', function ($menu) {
            $menu->add('Home', 'dashboard')
                ->prepend('<i class="far fa-home"></i> ');
            $menu->add('Monitors', 'monitors')
                ->prepend('<i class="far fa-browser"></i> ');
            $menu->add('Servers', 'servers')
                ->prepend('<i class="far fa-server"></i> ');
            $menu->add('Status Pages', 'monitors')
                ->prepend('<i class="far fa-check-circle"></i> ');
            $menu->add('Admin', 'admin/users')
                ->prepend('<i class="far fa-crown"></i> ');
        });

        return $next($request);
    }
}
