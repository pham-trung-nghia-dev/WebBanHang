<?php


namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendOrderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $orderData;

    /**
     * Create a new message instance.
     */
    public function __construct(array $orderData)
    {
        $this->orderData = $orderData;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->from(config('mail.from.address'), config('mail.from.name'))
                    ->subject('Xác nhận đơn hàng #' . ($this->orderData['order_id'] ?? $this->orderData['DonHang'] ?? ''))
                    ->view('emails.order_confirmation')
                    ->with([
                        'orderData' => $this->orderData
                    ]);
    }
}
