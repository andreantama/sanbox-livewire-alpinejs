<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;

class Welcome extends Component
{
    public $listSelected = 2;
    public $listOptions = [
        [
            'id' => 1,
            'name' => 'AAA',
        ],
        [
            'id' => 2,
            'name' => 'BBB',
        ],
        [
            'id' => 3,
            'name' => 'CCC',
        ],
        [
            'id' => 4,
            'name' => 'DDD',
        ],
        [
            'id' => 5,
            'name' => 'EEE',
        ]
    ];

    public $daterangepickerSelected;
    public function mount()
    {
        $this->daterangepickerSelected = Carbon::now()->format('m/d/Y'). " - ".Carbon::now()->addDay(7)->format('m/d/Y');
        // 12/10/2021 - 12/11/2021
    }
    public function resetDate()
    {
        $this->reset([
            'daterangepickerSelected' 
        ]);
    }
    public function remove()
    {
        $dataTemp = $this->listOptions;
        $this->listOptions = [];
        foreach($dataTemp as $index => $row) {
            if($dataTemp[$index]['id'] != 5) {
                array_push($this->listOptions, $dataTemp[$index]);
            }
        }
    }
    public function render()
    {
        return view('livewire.welcome');
    }
}
