<?php

namespace App\Http\Livewire\Forms;

use App\Models\AnswerForm;
use Livewire\Component;

class StoreHidden extends Component
{
    protected $listeners = ['saveInformation' => 'store'];

    public function store($args)
    {
        AnswerForm::create([
            'form_id' => $args['form_id'],
            'data' => json_encode($args['data']),
            'metadata' => json_encode($args['metadata']),
        ]);
        return redirect()->route('forms.index'); 
    }

    public function render()
    {
        return view('livewire.forms.store-hidden');
    }
}
