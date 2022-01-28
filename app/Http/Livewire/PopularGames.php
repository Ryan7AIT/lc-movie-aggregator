<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;

class PopularGames extends Component
{

    public $popularGames= [];

    public function loadpopulargmaes() {

        $befor = Carbon::now()->subMonths(2)->timestamp;
        $after = Carbon::now()->addMonths(2)->timestamp;

        $this->popularGames = Http::withHeaders([
            'Client-ID' => 's6p5hps1ozlkh1ubf9150zlxzt56ed',
            'Authorization' => 'Bearer 515b5f8btghk7u3q3bnmn98ffn45cr'
        ])->withBody(
            'fields *, cover.* , platforms.*;
            where rating != null & platforms = {48,49,130,6}
            ;
            sort rating desc;
            limit 12;'
            ,'text/plain')
            ->post('https://api.igdb.com/v4/games/')
            ->json();


    }

    public function render()
    {
        return view('livewire.popular-games');
    }
}
