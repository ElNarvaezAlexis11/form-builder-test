{{-- https://tailwindcomponents.com/component/responsive-table-5 --}}
<table {{$attributes}}>
    <thead>
        <x-table.trow type="rowHeader">
            {{$header}}
        </x-table.trow>
    </thead>
    <tbody class="bg-white">
            {{$content}}
    </tbody>
</table>
