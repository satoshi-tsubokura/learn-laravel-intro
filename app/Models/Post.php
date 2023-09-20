<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected array $guarded = ['id'];

    public static $rules = [
        'person_id' => 'required|integer|min:1',
        'title' => 'required|max:255',
        'message' => 'required|max:1000'
    ];

    public function getData() {
        return "{$this->id}: {$this->title}";
    }
}
