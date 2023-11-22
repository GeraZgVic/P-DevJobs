<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificacionController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // Para traer las notificaciones que el user no ha leído
        $notificaciones = auth()->user()->unreadNotifications;

        // Limpiar notificaciones leidas
        auth()->user()->unreadNotifications->markAsRead();
        
        return view('notificaciones.index',[
            'notificaciones' => $notificaciones
        ]);
    }
}
