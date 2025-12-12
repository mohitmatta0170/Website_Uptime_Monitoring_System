
<?php
namespace App\Mail;

use Illuminate\Mail\Mailable;

class WebsiteDownMail extends Mailable
{
    public function __construct(public string $url) {}

    public function build() {
        return $this->subject($this->url.' is down!')
            ->view('emails.website_down');
    }
}
