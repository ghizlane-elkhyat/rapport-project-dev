<?php

namespace App\Mail;

use App\Models\Report;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class ReportMail extends Mailable
{
    use Queueable;
    use SerializesModels;

    public $report;

    public function __construct(Report $report)
    {
        $this->report = $report;
    }

    public function build()
    {
        return $this->subject('Rapport ')
            ->view('emails.report')
            ->attach(Storage::path($this->report->chemin_pdf));
    }
}
