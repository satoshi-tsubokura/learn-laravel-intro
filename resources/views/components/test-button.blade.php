{{-- class属性以外をマージすると、上書きされる。つまり、mergeメソッドに指定した値はデフォルト値とみなされる --}}
<button {{$attributes->class(['p-4'])->merge(['type' => 'button'])}}> 
    {{$slot}}
</button>