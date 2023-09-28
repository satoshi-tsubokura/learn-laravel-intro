@props(['color' => 'gray'])
<ul {{$attributes->merge(['class' => 'bg-' . $color . '-100'])}}>
    {{$slot}}
</ul>