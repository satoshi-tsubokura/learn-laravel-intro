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

    public function post() {
        return $this->hasOne(Post::class);
    }

    public function posts() {
        return $this->hasMany(Post::class);
    }

    public function latestPost() {
        return $this->posts()->one()->ofMany([
            'created_at' => 'max',
            'id' => 'max',
        ], function (Builder $query) {
            $query->whereDate('created_at', '<', '2023-09-30');
        });
    }

    public function oldestPost() {
        return $this->posts()->one()->oldestOfMany();
    }

    public function evaluations() {
        return $this->hasManyThrough(Evaluation::class, Post::class);
    }

    public function countGood() {
        return $this->evaluations->sum('good');
    }

    public function roles() {
        return $this->belongsToMany(Role::class, 'people_roles', 'person_id', 'role_id')->withTimestamps();
    }
}
