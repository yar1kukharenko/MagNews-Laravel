<?php


namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DailyStatsMail extends Mailable
{
    use Queueable, SerializesModels;

    public $views;
    public $comments;
    public $registrations;

    public function __construct($views, $comments, $registrations)
    {
        $this->views = $views;
        $this->comments = $comments;
        $this->registrations = $registrations;
    }

    public function build()
    {
        return $this->from('m4gnews@yandex.ru', 'MagNews')
            ->subject('Daily Site Statistics')
            ->view('emails.daily_stats'); // Укажите ваш шаблон здесь
    }
}
