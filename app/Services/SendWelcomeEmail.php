<?php 

namespace App\Services;

use App\Models\User;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;

class SendWelcomeEmail
{
    public function send(User $user)
    {
        Mail::to($user->email)->send(new WelcomeMail($user));
    }
}
