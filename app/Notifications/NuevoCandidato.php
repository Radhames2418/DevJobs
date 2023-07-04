<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NuevoCandidato extends Notification
{
    use Queueable;

    public int $id_vacante;
    public string $nombre_vacante;
    public int $usuario_id;

    /**
     * Create a new notification instance.
     */
    public function __construct($id_vacante, $nombre_vacante, $usuario_id)
    {
        $this->id_vacante      = $id_vacante;
        $this->nombre_vacante  = $nombre_vacante;
        $this->usuario_id      = $usuario_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $url = url('/notificaciones');
        return (new MailMessage)
                    ->line('Has recibido un nuevo Archivo en tu vacante')
                    ->line('La vacante es: ' . $this->nombre_vacante)
                    ->action('Ver Notificación', $url)
                    ->line('Gracias por utilizar DevJobs!');
    }

    /**
     * Saves the notifiable object to the database.
     *
     * @param object $notifiable The object to be saved to the
     */
    public function toDatabase(object $notifiable)
    {

        return [
            'id_vacante'     => $this->id_vacante,
            'nombre_vacante' => $this->nombre_vacante,
            'usuario_id'     => $this->usuario_id
        ];
    }
}
