<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Change extends Model
{
    protected $fillable = ['now' , 'future' , 'effect' , 'why' , 'result'];

    /**
     * この読書追加情報を所有するチェックリスト。（ Checklistモデルとの関係を定義）
     */
    public function checklist()
    {
        return $this->belongsTo(Checklist::class);
    }

}