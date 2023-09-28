<div {{$attributes}}>
    <div {{$attributes->class(['alert', $addClassByType($alertType),'bg-red-700' => $alertType === 'danger'])}} >
        {{ $slot }}

        <div {{$message->attributes->class(['mt-2'])}}>
            {{$message}}
        </div>
    </div>
</div>