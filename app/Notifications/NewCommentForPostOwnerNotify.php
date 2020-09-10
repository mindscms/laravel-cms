<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewCommentForPostOwnerNotify extends Notification implements ShouldQueue, ShouldBroadcast
{
    use Queueable;

    protected $comment;


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($comment)
    {
        $this->comment = $comment;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        $arr = ['database', 'broadcast'];

        if ($notifiable->receive_email == 1) {
            $arr[] = 'mail';
        }

        return $arr;

    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('There is new comment from ' . $this->comment->name . ' on your post ' . $this->comment->post->title . '.')
                    ->action('Go to your post', route('users.comment.edit', $this->comment->id))
                    ->line('Thank you for using Bloggi System');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'id'                => $this->comment->id,
            'name'              => $this->comment->name,
            'email'             => $this->comment->email,
            'url'               => $this->comment->url,
            'comment'           => $this->comment->comment,
            'post_id'           => $this->comment->post_id,
            'post_title'        => $this->comment->post->title,
            'post_slug'         => $this->comment->post->slug,
            'created_at'        => $this->comment->created_at->format('d M, Y h:i a'),
        ];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'data' => [
                'id'            => $this->comment->id,
                'name'          => $this->comment->name,
                'email'         => $this->comment->email,
                'url'           => $this->comment->url,
                'comment'       => $this->comment->comment,
                'post_id'       => $this->comment->post_id,
                'post_title'    => $this->comment->post->title,
                'post_slug'     => $this->comment->post->slug,
                'created_at'    => $this->comment->created_at->format('d M, Y h:i a'),
            ]
        ]);
    }
}
