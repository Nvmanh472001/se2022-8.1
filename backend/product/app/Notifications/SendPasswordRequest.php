<?php
namespace App\Notifications;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
class SendPasswordRequest extends Notification implements ShouldQueue
{
    use Queueable;
    protected $password;
    protected $email;
    
    /**
    * Create a new notification instance.
    *
    * @return void
    */
    public function __construct($password,$email)
    {
        $this->password = $password;
        $this->email = $email;
    }
    /**
    * Get the notification's delivery channels.
    *
    * @param  mixed  $notifiable
    * @return array
    */
    public function via($notifiable)
    {
        return ['mail'];
    }
     /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
     public function toMail($notifiable)
     {
        $url = url('admins');
        
        return (new MailMessage)
            ->line('Tài khoản của bạn vừa được đặt lại mật khẩu.')
            ->line('Tên đăng nhập: '. $this->email)
            ->line('Password: '. $this->password)
            ->action('Đăng nhập', url($url))
            ->line('Đăng nhập để thay đổi mật khẩu.');
    }
}
