@props(['isHeading' => false])
@aware(['color' => 'gray'])
<li {{$attributes->class([
    'mt-2 mb-2',
    'text-' . $color . '-500',
    'bg-black text-white' => $isHeading
])}}>
    {{$slot}}
</li>