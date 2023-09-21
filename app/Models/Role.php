<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    // 常にロードする必要があるリレーションをeagerローディングするための設定

    protected $with = ['people'];

    public function people() {
        return $this->belongsToMany(Person::class, 'people_roles', 'role_id', 'person_id')->withPivot('created_at', 'updated_at');
    }
}
