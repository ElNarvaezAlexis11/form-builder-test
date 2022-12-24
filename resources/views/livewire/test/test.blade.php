<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class="container">
        <h1 class="text-2xl">Server</h1>
        {{json_encode($props)}}
    </div>
    <section x-data="{props: @entangle('props') }">
        <h1 class="text-xl">Client</h1>
        <x-jet-button @click="props.push({
            name: 'test',
            values: []
        })">
            Add property
        </x-jet-button>
        <section>
            <h3 class="text-lg">Object values</h3>
            <div class="flex flex-col">
                @foreach ($props as $index => $prop)
                <div class="flex flex-row">
                    <x-jet-label>Selector :</x-jet-label>
                    <!-- INICIO DEL SELECTOR -->
                    <x-multi-select :id="$index" :selecteds="$prop['values']" >
                        <select class="hidden" id="multi-select-{{$index}}">
                            <option value="te_1" data-search="arsenal">Arsenal</option>
                            <option value="te_2" data-search="aston villa">Aston Villa</option>
                            <option value="te_3" data-search="Brentford">Brentford</option>
                            <option value="te_4" data-search="323223">323223</option>
                            <option value="te_5" data-search="sdcsdcsdc">sdcsdc</option>
                        </select>
                    </x-multi-select>
                    <!-- FIN DEL SELECTOR -->
                </div>
                @endforeach
            </div>
        </section>
    </section>
</div>