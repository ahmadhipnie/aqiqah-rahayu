<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvoiceTransaksiMail extends Mailable
{
    use Queueable, SerializesModels;

    public $transaksi;
    public $produkList;

    public function __construct($transaksi, $produkList)
    {
        $this->transaksi = $transaksi;
        $this->produkList = $produkList;
    }

    public function build()
    {
        return $this->subject('Invoice Pembayaran Aqiqah Rahayu')
            ->view('emails.invoice_transaksi');
    }
}
