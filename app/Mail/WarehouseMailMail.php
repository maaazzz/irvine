<?php

namespace App\Mail;

use App\Model\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WarehouseMailMail extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $order;
    public $url;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, Order $order, $url)
    {
        $this->user = $user;
        $this->order = $order;
        $this->url = $url;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.orders.warehouse')->with('order', $this->order, 'url', $this->url);
    }
}