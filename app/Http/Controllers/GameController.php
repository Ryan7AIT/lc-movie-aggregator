<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $befor = Carbon::now()->subMonths(2)->timestamp;
        // $after = Carbon::now()->addMonths(2)->timestamp;

        $popularGames = Http::withHeaders([
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

            $recentliReviewed = Http::withHeaders([
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

            $mostanticipated = Http::withHeaders([
                'Client-ID' => 's6p5hps1ozlkh1ubf9150zlxzt56ed',
                'Authorization' => 'Bearer 515b5f8btghk7u3q3bnmn98ffn45cr'
            ])->withBody(
                'fields *, cover.* , platforms.*;
                where rating != null & platforms = {48,49,130,6} & rating_count > 5
                ;
                sort rating desc;
                limit 4;'
                ,'text/plain')
                ->post('https://api.igdb.com/v4/games/')
                ->json();


            $comingsoon = Http::withHeaders([
                'Client-ID' => 's6p5hps1ozlkh1ubf9150zlxzt56ed',
                'Authorization' => 'Bearer 515b5f8btghk7u3q3bnmn98ffn45cr'
            ])->withBody(
                'fields *, cover.* , platforms.*;
                where rating != null & platforms = {48,49,130,6} & rating_count > 5
                ;
                sort rating desc;
                limit 4;'
                ,'text/plain')
                ->post('https://api.igdb.com/v4/games/')
                ->json();




        return view('index' , [
            'popularGames' => $popularGames,
            'mostanticipated' => $mostanticipated,
            'comingsoon' => $comingsoon,
            'recentliReviewed' => $recentliReviewed, ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
