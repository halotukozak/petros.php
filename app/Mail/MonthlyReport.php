<?php

namespace App\Mail;

use App\Models\Donate;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use function Symfony\Component\Translation\t;

class MonthlyReport extends Mailable
{
    use Queueable, SerializesModels;

    public string $date;
    public User $user;
    public $churchRecords;
    public $cemeteryRecords;
    public $parishRecords;

    public function __construct($date, User $user)
    {
        $this->date = $date;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $records = Donate::whereMonth('created_at', substr($this->date, 5, 2))->whereYear('created_at', substr($this->date, 0, 4))->get();
        $this->churchRecords = $records->where('purpose', 'church');
        $this->cemeteryRecords = $records->where('purpose', 'cemetery');
        $this->parishRecords = $records->where('purpose', 'parish');

        return $this->subject('Mηνιαία αναφορά ' . $this->date)->view('mails.report.monthly');
    }
}
