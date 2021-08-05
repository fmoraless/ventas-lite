<?php

namespace App\Http\Livewire;

use App\Models\Denomination;
use Livewire\Component;

class PosComponent extends Component
{
    public $total, $cart =[], $itemsQuantity=5, $denominations=[], $efectivo, $change;

    public function render()
    {
        $this->denominations = Denomination::all();
        return view('livewire.pos.component')
            ->extends('layouts.theme.app')
            ->section('content');
    }
}
