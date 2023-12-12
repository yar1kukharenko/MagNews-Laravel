<?php

namespace App\Console\Commands;

use App\Mail\DailyStatsMail;
use App\Models\Article;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendDailyStats extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'stats:daily';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send daily stats to moderators';


    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $views = Article::sum('views_count');
        $comments = Comment::whereDate('created_at', now()->toDateString())->count();
        $registrations = User::whereDate('created_at', now()->toDateString())->count();
        $moderators = User::where('role', User::ROLE_ADMIN)->get();

        foreach ($moderators as $moderator) {
            Mail::to($moderator->email)->send(new DailyStatsMail($views, $comments, $registrations));
        }

        $this->info('Daily stats sent to all moderators.');

    }
}
