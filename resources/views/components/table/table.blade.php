{{-- https://tailwindcomponents.com/component/responsive-table-5 --}}
<table {{$attributes}}>
    <thead class="rounded-tl-md rounded-tr-md">
        <x-table.trow type="rowHeader" class="shadow-xl border-t">
            {{$header}}
        </x-table.trow>
    </thead>
    <tbody class="bg-white">
            {{$content}}
    </tbody>
</table>
