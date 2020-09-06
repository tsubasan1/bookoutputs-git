<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checklist extends Model
{
    protected $fillable = ['checklist'];

    /**
     * このチェックリストを所有する本情報。（ Bookモデルとの関係を定義）
     */
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
    
    /**
     * このチェックリストが所有する読書追加情報。（ Changeモデルとの関係を定義）
     */
    public function changes()
    {
        return $this->hasMany(Change::class);
    }


}
