<?php

namespace App\Models;

use App\Models\Scopes\PersonScope;
use App\Models\Traits\WhereLikeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Database\Eloquent\Builder;

class Person extends Model
{
    use HasFactory, WhereLikeTrait;

    protected $guarded = ['id'];

    public static $rules = [
        'name' => 'required',
        'mail' => 'email',
        'age' => 'integer|min:0|max:150'
    ];

    protected static function booted(): void {
        static::addGlobalScope(new PersonScope);
    }

    public function getData() {
        return "{$this->id}: {$this->name}({$this->age})";
    }

    // ローカルスコープ作成
    public function scopeNameEqual(Builder $query, string $name) {
        $query->where('name', $name);
    }

    public function scopeAgeGreaterThan(Builder $query, int $age) {
        $query->where('age', '>=', $age);
    }

    public function scopeAgeLessThan(Builder $query, int $age) {
        $query->where('age', '<=', $age);
    }
}
