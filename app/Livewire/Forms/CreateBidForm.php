<?php

namespace App\Livewire\Forms;

use App\Models\Bid;
use Illuminate\Support\Facades\Notification;
use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Notifications\BidReceived;

class CreateBidForm extends Form
{
    public int $lot_id;

    public float $highestAmount;

    #[Validate('required')]
    public string $firstname = '';

    #[Validate('required')]
    public string $lastname = '';

    #[Validate('required|email|string|min:4')]
    public string $email = '';

    #[Validate('required|string|min:7')]
    public string $phone = '';

    #[Validate('required|decimal:2')]
    public string $amount = '';

    public function setLotId(int $lotId)
    {
        $this->lot_id = $lotId;
    }

    public function setHighestAmount($amount)
    {
        $this->highestAmount = $amount;
    }

    public function store()
    {
        $this->validate([
            'amount' => 'gt:' . $this->highestAmount
        ]);

        $bid = Bid::create($this->all());

        Notification::route('mail', $bid->email)
            ->notify(new BidReceived($bid));

        $this->reset('amount');
    }
}
