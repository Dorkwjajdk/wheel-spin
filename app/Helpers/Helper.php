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

        $putaran = $start + (360 * 10);

        return $putaran;
    }

    public static function content(){
        $content = DB::table('content')->where('name','!=',null)->first();

        if($content){
        return[
            "wheel"=>url($content->wheel),
            "outwheel"=>url($content->outwheel),
            "logo"=>url($content->logo),
            "name"=>$content->name,
            "background"=>url($content->background),
            "favicon"=>url($content->favicon),
            "music"=>url($content->music),
        ];
        }else{
            return[
                "wheel"=>'',
                "outwheel"=>'',
                "logo"=>'',
                "name"=>'',
                "background"=>'',
                "favicon"=>'',
                "music"=>'',
            ];
        }

    }
    
}