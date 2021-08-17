<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;
use Mail;
use App\Models\Messaging;

class MessagingJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $data;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        // $this->name = $data['name'];
        // $this->mail = $data['mail'];
        // $this->message = $data['message'];

        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::send([], [], function ($message) {
            $message->to($this->data['mail']);
            $message->from('cnahmetcn@gmail.com','Case');
            $message->subject('Case Mesajı');
            $message->setBody(
            'Merhaba, ben <strong>'.$this->data['name'].'</strong> <br />
            Bana bu mail adresinden ulaşabilirsiniz: <strong>'.$this->data['mail'].'</strong> <br />
            <strong>Mesaj</strong>: ' .$this->data['message'].'<br />
            <strong>Tarih</strong>: ' .now().'','text/html'
            );
        });
    }
}
