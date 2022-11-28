<?php
namespace App\Helpers;
 
use Illuminate\Support\Facades\DB;
use App\Prize;
 
class Helper {

    public static function wheel_rotation($prize_id){

        $prize = Prize::where('id',$prize_id)->first();

        $total = Prize::count();

        $pie = 360 / $total;

        if($prize->sorter == 1){

            $rotation = Self::rumus_rotasi_start();
        }else{
            $rumus = 360 - ( ( $prize->sorter - 1 ) * $pie );
            $rotation = Self::rumus_rotasi_start() + $rumus ;
        }

        return $rotation;

    }

    public static function rumus_rotasi_start(){
        // (360/total_prize)*(total_prize - 1) - (360/total_prize)
        $total = Prize::count();


        // MENGHITUNG NILAI 0 PUTARAN POSISI START
        $start = (360/$total)*($total - 1) - (360/$total);

        //MENGHITUNG KELIPATAN

        // $putaran = $start + (360 * 10);
        $putaran = (360 - 90) + (360 * 100);

        return $putaran;
    }

    public static function content(){
        $content = DB::table('content')->where('name','!=',null)->first();

        if($content){

        if($content->wheel){
            $wheel = url($content->wheel);
        }else{
            $wheel = url('default/wheel.png');
        }

        if($content->outwheel){
            $outwheel = url($content->outwheel);
        }else{
            $outwheel = url('default/outwheel.png');
        }

        if($content->logo){
            $logo = url($content->logo);
        }else{
            $logo = url('default/logo.png');
        }

        if($content->name){
            $name = $content->name;
        }else{
            $name = 'Spin Wheel';
        }

        if($content->background){
            $background = url($content->background);
        }else{
            $background = url('default/home.png');
        }

        if($content->favicon){
            $favicon = url($content->favicon);
        }else{
            $favicon = url('default/favicon.ico');
        }

        if($content->music){
            $music = url($content->music);
        }else{
            $music = url('default/home.mp3');
        }

        if($content->music_win){
            $music_win = url($content->music_win);
        }else{
            $music_win = url('default/win.mp3');
        }

        if($content->music_lose){
            $music_lose = url($content->music_lose);
        }else{
            $music_lose = url('default/lose.mp3');
        }

        if($content->music_spin){
            $music_spin = url($content->music_spin);
        }else{
            $music_spin = url('default/spin.mp3');
        }



        return[
            "wheel"=>$wheel,
            "outwheel"=>$outwheel,
            "logo"=>$logo,
            "name"=>$name,
            "background"=>$background,
            "favicon"=>$favicon,
            "music"=>$music,
            "music_win"=>$music_win,
            "music_lose"=>$music_lose,
            "music_spin"=>$music_spin,

        ];
        }else{
            return[
                "wheel"=>url('default/wheel.png'),
                "outwheel"=>url('default/outwheel.png'),
                "logo"=>url('default/logo.png'),
                "name"=>'spin wheel',
                "background"=>url('default/home.png'),
                "favicon"=>url('default/favicon.ico'),
                "music"=>url('default/home.mp3'),
                "music_win"=>url('default/win.mp3'),
                "music_lose"=>url('default/lose.mp3'),
                "music_spin"=>url('default/spin.mp3'),
            ];
        }

    }
    
}