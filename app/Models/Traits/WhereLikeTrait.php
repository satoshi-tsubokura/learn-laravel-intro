<?php

namespace App\Models\Traits;

use Illuminate\Contracts\Database\Eloquent\Builder;

trait WhereLikeTrait {
  // ローカルスコープ　呼び出すときはModel::whereLike('column', 'keyword')->get()のような形になる
  public function scopeWhereLike(Builder $query, string $column, string $keyword): void {

    // like検索時に%_\が入ったレコードを取得できないため
    $query->where($column, 'like', '%' . addcslashes($keyword, '%_\\') . '%');
  }
}