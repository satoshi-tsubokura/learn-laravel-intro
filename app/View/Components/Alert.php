<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert extends Component
{
    public $default_message = 'これは、コンポーネントクラスで定義されている定数です。';
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $alertType,
        public string $message = "",
    )
    {
        //
    }

    public function addClassByType(string $type = "info"): string {
        return match($type) {
            'info' => 'border-blue-200',
            'success' => 'border-green-400',
            'warning' => 'border-yellow-400',
            'danger' => 'border-red-400',
            default => 'border-gray-700'
        };
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        // return function (array $data) {
        //     // dd($data);
        //     return '
        //        <div class="alert alert-{{ $alertType }}">
        //             {{ $message }}
        //         </div>
        //     ';
        // };
        return view('components.alert');
    }
}
