<?php

namespace App\Jobs;

use App\Mail\SendOrderMail;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;
use Throwable;

class SendOrderEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $orderData;

    /**
     * Create a new job instance.
     */
    public function __construct(array $orderData)
    {
        $this->orderData = $orderData;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            Mail::to($this->orderData['email'])->send(new SendOrderMail($this->orderData));

            // Nếu muốn log thành công:
            // \Log::info('Email đã gửi đến: ' . $this->orderData['email']);

        } catch (Throwable $e) {
            // Ghi log lỗi nếu gửi mail thất bại
            Log::error('Lỗi gửi mail: ' . $e->getMessage());
        }
    }
}
?>