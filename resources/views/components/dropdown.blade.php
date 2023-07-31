<div x-data="{ show: false }" @click.away="show=false" class="relative">
    {{-- trigger --}}

    {{$trigger}}
    {{-- links --}}
    <div x-show="show" class="absolute bg-gray-100 w-full py-2 mt-2 rounded-xl z-50" style="display: none">
        {{$slot}}
    </div>
</div>
