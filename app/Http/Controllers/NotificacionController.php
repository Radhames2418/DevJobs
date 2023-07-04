<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificacionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //
        $notificaciones = auth()->user()->unreadNotifications;

        //limpiar notificaciones previa
        auth()->user()->unreadNotifications->markAsRead();

        return view('notificaciones.index', [
            'notificaciones' => $notificaciones
        ]);
    }
}
