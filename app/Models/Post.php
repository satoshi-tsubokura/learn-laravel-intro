<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = ['person', 'evaluation'];

    public static $rules = [
        'person_id' => 'required|integer|min:1',
        'title' => 'required|max:255',
        'body' => 'required|max:1000'
    ];

    public function person() {
        // withDefaultで主テーブルに紐づくユーザーが存在しない場合の表示を指定できる。
        return $this->belongsTo(Person::class)->withDefault([
            'name' => 'delete user',
            'age' => '-1'
        ]);
    }

    // クエリビルだとしても機能する。
    public function evaluation() {
        return $this->hasOne(Evaluation::class);
    }

    public function getData() {
        return "{$this->id}: {$this->title}({$this->person?->id}: {$this->person?->name})";
    }
}
