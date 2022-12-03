<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log_Access extends Model
{
    protected $table = 'log_access';
    protected $fillable = [
        'ipaddress',
        'useragent',
        'url',
        'description',
        'details',
        'created_at',
        'updated_at'
    ];

    public static function saveData($description,$details){
        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        $save = Log_Access::create([
            "ipaddress"     =>$_SERVER['REMOTE_ADDR'],
            "useragent"     =>$_SERVER['HTTP_USER_AGENT'],
            "url"           => $actual_link,
            "created_at"    =>date('Y-m-d H:i:s'),
            "updated_at"    =>date('Y-m-d H:i:s'),
            "description"   =>$description,
            "details"       =>$details,
        ]);

        return $save;
    }
}
