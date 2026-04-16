<?php

namespace App\Jobs;

use App\Mail\NewArticleMail;
use App\Models\Article;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class VeryLongJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $article;
    protected $email;

    public function __construct(Article $article, $email)
    {
        $this->article = $article;
        $this->email = $email;
    }

    public function handle(): void
    {
        Mail::to($this->email)->send(new NewArticleMail($this->article));
    }
}