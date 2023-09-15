<?php

namespace App\Observers;

use App\Models\User;
use App\Mail\MyTestMail;
use Illuminate\Support\Facades\Mail;

class UserObserver
{
    /**
     * Handle the User "created" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function created(User $user)
    {
        //
    }

    /**
     * Handle the User "updated" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        //
        // \Mail::raw('Hello, Your record in user table is deleted.', function ($message) {
        //     $message->from('bhalalajanvi15@gmail.com', 'bhalalajanvi15');
        //     $message->to('janvibhalala15@gmail.com');
        //     $message->subject('Register again..!');
        // });
    }
    public function deleting(User $user)
    {
        $details = [
            'subject' => 'Mail from mailFun function mail queueeeee from mail',
            'body' => 'This is for testing email using queue'
        ];
        $recipientEmail = 'janvibhalala15@gmail.com';
        $email = new MyTestMail($details);

        // Push the email sending task onto the Redis queue
        dispatch(function () use ($recipientEmail, $email) {
            Mail::to($recipientEmail)->queue($email);
        });

    }

    /**
     * Handle the User "restored" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}