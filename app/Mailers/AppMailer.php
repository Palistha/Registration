<?php
namespace App\Mailers;
use App\User;
use Illuminate\Contracts\Mail\Mailer;
class AppMailer
{
    /**
     * The Laravel Mailer instance.
     *
     * @var Mailer
     */
    protected $mailer;
    /**
     * The sender of the email.
     *
     * @var string
     */
    protected $from = 'admin@example.com';
    /**
     * The recipient of the email.
     *
     * @var string
     */
    protected $to;
    /**
     * The view for the email.
     *
     * @var string
     */
    protected $view;
    /**
     * The data associated with the view for the email.
     *
     * @var array
     */
    protected $data = [];
    /**
     * Create a new app mailer instance.
     *
     * @param Mailer $mailer
     */
    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }
    /**
     * Deliver the email confirmation.
     *
     * @param  User $user
     * @return void
     */
    public function sendEmailConfirmationTo(User $register)
    {
        $this->to = $register->email;
        $this->view = 'page.verify';
        $this->data = compact('register');
        $this->deliver();
    }
    /**
     * Deliver the email.
     *
     * @return void
     */
    public function deliver()
    {
        $this->mailer->send($this->view, $this->data, function ($message) {
            $message->from($this->from, 'Administrator')
                    ->to($this->to);
        });
    }
}