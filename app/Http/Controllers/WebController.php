<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prize;
use App\Draw;
use App\History_Draw;
use App\Code;
use App\Faq;
use Helper;

class WebController extends Controller
{
    public function index(){
        $data['title']   = 'Draw Spin';
        $data['faq']     = Faq::all();
        $data['history'] = History_Draw::getData();
        $data['prize']   = Prize::orderBy('sorter','asc')->get();
        $data['total']   = Prize::count();
        $data['spin' ]   = "false";
        return view('web.index',$data);
    }

    public function create(Request $request){

        $request->validate([
            'code'   => 'required|string',
            'nama'   => 'required|string',
        ]);

        $_code = Code::join('draw','code.code','=','draw.code')
                ->where('draw.code',$request->code)->first();

        // MENGECEK APAKAH KODE TERSEDIA
        if($_code){
            // MENGECEK APAKAH KODE SUDAH DIGUNAKAN
            if($_code->used == 0){

                $_draw = Draw::where('code',$request->code)->first();
                // MENYIMPAN HISTORY SPIN WHEEL
                if($_draw->sent == 0 || $_draw->retry_used == 1){
                    $data = [
                        "draw_id"   =>$_draw->id,
                        "code"      =>$request->code,
                        "nama"      =>$request->nama,
                        "rotation"  =>Helper::wheel_rotation($_draw->prize_id),
                        "date"      =>date('Y-m-d'),
                        "prize_id"  =>$_draw->prize_id,
                    ];
                    History_Draw::saveData($data);

                    //UPDATE DATA TO DRAW
                    Draw::updateData($_draw->prize_id,$request->code,Helper::wheel_rotation($_draw->prize_id));

                    $data['history'] = History_Draw::getData();
                    $data['faq']     = Faq::all();
                    $data['prize']   = Prize::orderBy('sorter','asc')->get();
                    $data['total']   = Prize::count();
                    $data['spin' ]   = "true";
                    $data['rotation']  = Helper::wheel_rotation($_draw->prize_id);
                    $data['result']  = $_draw->prize_id;
                    $data['id_draw'] = $_draw->id;

                    return view('web.index',$data);
                }else{

                    return redirect()->back()->with('message','code expired atau sudah digunakan')
                       ->with('message_type','danger');

                }

            }else{
                return redirect()->back()->with('message','code expired atau sudah digunakan')
                       ->with('message_type','danger');
            }
        }else{
            return redirect()->back()->with('message','code tidak ditemukan')->with('message_type','danger');
        }

    }


    public function draw_result($id_draw,$id_prize){

        $data['prize']          = Prize::orderBy('sorter','asc')->get();
        $data['total']          = Prize::count();
        $data['result_prize']   = prize::where('id',$id_prize)->first();;
        $data['result_draw']    = Draw::where('id',$id_draw)->first();;

        return view('web.draw',$data);
    }
}
