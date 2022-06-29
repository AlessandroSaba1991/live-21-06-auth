<?php

namespace App\Mail;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PostUpdateAdminMessage extends Mailable
{
    use Queueable, SerializesModels;
    protected $post;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.markdown.admin-postupdate')->with([
            'postSlug' => $this->post->slug,
            'postTitle' => $this->post->title,
            'postUrl' => env('APP_URL') . ':8000' . '/admin/posts/' . $this->post->slug

        ]);
    }
}
