@props(['type' => ''])
@switch ($type)
    @case('rowHeader')
        <tr {{ $attributes->merge(['class' => 'text-base font-medium tracking-wide text-left text-gray-900 bg-gray-100 border-b border-gray-600']) }}>
            {{$slot}}
        </tr>
    @break
    @default
        <tr {{ $attributes->merge(['class' => 'text-gray-600']) }}>
            {{$slot}}
        </tr>
@endswitch
