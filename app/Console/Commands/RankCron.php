<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use App\Music;
use App\Week;
use App\Rank;
use App\Top;

class RankCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rank:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'top music';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //create new week into table weeks
        $week = new Week();
        $week->week = rand();
        $week->save();
        $new_week = Week::OrderBy('id', 'DESC')->limit(config('home.number.first'))->get();
        $id_new_week = $new_week[0]->id;

        $music = Music::all();
        //save to table ranks
        foreach ($music as $item) {
            $rank = new Rank();
            $rank->music_id = $item->id;
            $rank->week_id = $id_new_week;
            $rank->views = $item->view;
            $rank->save();
        }

        //get 2 tables 
        $two_week = DB::table('ranks')
            ->select('week_id')
            ->groupBy('week_id')
            ->OrderBy('week_id', 'DESC')
            ->limit(config('home.number.next_week'))
            ->get();
        $week_id_now = $two_week[0]->week_id;
        $week_id_before = $two_week[1]->week_id;

        $array_now = array();
        $song_now = DB::table('ranks')
            ->select('music_id', 'views')
            ->where('week_id', $week_id_now )
            ->OrderBy('music_id', 'DESC')
            ->get();

        foreach ($song_now as $item) {
            $array_now[$item->music_id] = $item->views;
        }

        $array_before = array();
        $song_before = DB::table('ranks')
            ->select('music_id', 'views')
            ->where('week_id', $week_id_before )
            ->OrderBy('music_id', 'DESC')
            ->get();

        foreach ($song_before as $item) {
            $array_before[$item->music_id] = $item->views;
        }
            
        $rank_arr = array();
        foreach ($array_now as $music_id_now => $view_now) {
            foreach ($array_before as $music_id_before => $view_before) { 
                if ($music_id_now == $music_id_before) {
                    $rank_arr[$music_id_now] = $view_now - $view_before;
                } else if (isset($music_id_now) && !isset($music_id_before)) {
                    $rank_arr[$music_id_now] = $view_now;
                } else if (!isset($music_id_now) && isset($music_id_before)) {
                    $rank_arr[$music_id_before] = 0;
                }
            }
        }
        arsort($rank_arr); 
        $top_song = array_chunk($rank_arr, config('home.number.top_music'), true)[0];
        foreach ($top_song as $music_id => $views) {
            $top = new Top();
            $top->music_id = $music_id;
            $top->views = $views;
            $top->week_id = $week_id_before;
            $top->save();
        }

        \Log::info($top);
    }
}
