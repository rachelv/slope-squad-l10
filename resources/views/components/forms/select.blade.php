<select {!! $attributes->merge([
    'class' => 'rounded-lg placeholder-black-400 border-black-400 shadow-sm'
]) !!}>
    {{ $slot }}
</select>