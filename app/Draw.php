<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Prize;
use App\Code;

class Draw extends Model
{
    protected $table = 'draw';

    public static function updateData($prize_id,$code,$rotation){

        $_prize = Prize::where('id',$prize_id)->first();

        // MENGECEK APAKAH DAPAT FREE SPIN
        if($_prize->try_again == 1){
            $check = Code::where('code',$code)->update([
                'used'=> 0,
            ]);

            //JIKA MENDAPATKAN FREESPIN, DATA SELANJUTNYA MENDAPATKAN ZONK

            $_zonk = Prize::where('winner',0)->first();
            

            $check = Draw::where('code',$code)->update([
                'sent'       => 1,
                'rotation'   => $rotation,
                'retry_used' => $_prize->try_again,
                'prize_id'   => $_zonk->id,
            ]);

        }else{
            $check = Code::where('code',$code)->update([
                'used'=> 1,
            ]);

            $check = Draw::where('code',$code)->update([
                'sent'       => 1,
                'rotation'   => $rotation,
                'retry_used' => $_prize->try_again,
            ]);
        }

        return $check;
    }

    public static function getData(){
        $data = Draw::join('prize','draw.prize_id','=','prize.id')
                ->select('draw.*','prize.label as prize')
                ->get();
        
        return $data->toArray();
    }
}
