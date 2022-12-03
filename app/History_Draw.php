<?php

namespace App;
use CRUDBooster;
use Illuminate\Database\Eloquent\Model;

class History_Draw extends Model
{
    protected $table = 'history_draw';
    protected $fillable = ['nama','code','rotation','date','prize_id','draw_id'];

    public static function saveData($request){
        $check = History_Draw::create([
            'draw_id'   => $request['draw_id'],
            'nama'      => $request['nama'],
            'code'      => $request['code'],
            'rotation'  => $request['rotation'],
            'date'      => $request['date'],
            'prize_id'  => $request['prize_id'],
        ]);

        return $check;
    }

    public static function getData(){
        $data = History_Draw::join('prize','history_draw.prize_id','=','prize.id')
                ->select('history_draw.*','prize.label as prize')
                ->get();
        
                return $data->toArray();
    }

    public static function getDataPaginate($paginate){
        $data = History_Draw::join('prize','history_draw.prize_id','=','prize.id')
                ->select('history_draw.*','prize.label as prize')
                ->orderBy('history_draw.created_at','desc')
                ->paginate($paginate);
        
                return $data;
    }
}
