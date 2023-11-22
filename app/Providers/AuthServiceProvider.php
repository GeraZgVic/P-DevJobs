<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use Illuminate\Support\Facades\Lang;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\HtmlString;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        VerifyEmail::toMailUsing(function ($notifiable, $url){
            return (new MailMessage)
            ->subject('Verificar Cuenta')
            ->greeting(Lang::get('Hola! ') .$notifiable->name)
            ->line('Tu cuenta ya está casi lista, solo debes presionar el enlace a continuación:')
            ->action('Confirmar Cuneta', $url)
            ->line('Si no creaste esta cuenta puedes ignorar el mensaje.')
            ->salutation(new HtmlString(
                Lang::get("Saludos,") . '<br>' . '<strong>' . Lang::get("DevJobs.") . '</strong>'
            ));
        });
    }
}
