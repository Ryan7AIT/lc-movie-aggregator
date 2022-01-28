<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\Http;

class RecentliReviewed extends Component
{

    public $recentliReviewed= [];

    public function loadrecentli() {

        $befor = Carbon::now()->subMonths(2)->timestamp;
        $after = Carbon::now()->addMonths(2)->timestamp;

        $this->recentliReviewed = Http::withHeaders([
            'Client-ID' => 's6p5hps1ozlkh1ubf9150zlxzt56ed',
            'Authorization' => 'Bearer 515b5f8btghk7u3q3bnmn98ffn45cr'
        ])->withBody(
            'fields *, cover.* , platforms.*;
            where rating != null & platforms = {48,49,130,6} & rating_count > 5
            ;
            sort rating desc;
            limit 3;'
            ,'text/plain')
            ->post('https://api.igdb.com/v4/games/')
            ->json();

    }

    public function render()
    {
        return view('livewire.recentli-reviewed');
    }
}
