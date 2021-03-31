<?php

namespace App\Notifications;

//use Illuminate\Bus\Queueable;
//use Illuminate\Contracts\Queue\ShouldQueue;
//use Illuminate\Notifications\Messages\MailMessage;
//use Illuminate\Notifications\Notification;
////custom
//use Illuminate\Support\Facades\Lang;
//use Illuminate\Auth\Notifications\ResetPassword;

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Lang;

//
class PasswordResetNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

    public $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
$urlToResetForm = "https://dnel-front-api/?token=".$this->token;
        return (new MailMessage)
            ->subject(Lang::get('Hey,Reset Password Notification'))
            ->line(Lang::get('Yourequested here you go.'))
            ->action(Lang::get('Reset Password'), $urlToResetForm)
            ->line(Lang::get('This password reset link will expire in :count minutes.', ['count' => config('auth.passwords.'.config('auth.defaults.passwords').'.expire')]))
            ->line(Lang::get('If you did not request a password reset, no further action is required. Token ==>'.$this->token));

    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}

//class PasswordResetNotification extends Notification
//{
//    use Queueable;
////    protected $pageUrl;
//    public $token;
//    /**
//     * Create a new notification instance.
//     *
//     * @return void
//     */
//    public function __construct()
//    {
//        parent::__construct($token);
////        $this->pageUrl = 'localhost:8080';
//// we can set whatever we want here, or use .env to set environmental variables
//    }
//    public function via($notifiable)
//    {
//        return ['mail'];
//    }
//    public function toMail($notifiable)
//    {
//        if (static::$toMailCallback) {
//            return call_user_func(static::$toMailCallback, $notifiable, $this->token);
//        }
//        return (new MailMessage)
//            ->subject(Lang::getFromJson('Reset application Password v1'))
//            ->line(Lang::getFromJson('You are receiving this email because we received a password reset request for your account.'))
//            ->action(Lang::getFromJson('Reset Password'), $this->pageUrl."?token=".$this->token)
//            ->line(Lang::getFromJson('This password reset link will expire in :count minutes.', ['count' => config('auth.passwords.users.expire')]))
//            ->line(Lang::getFromJson('If you did not request a password reset, no further action is required.'));
//    }
//}
