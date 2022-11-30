<span {{ 
        $attributes->merge(
            ['class' => 
                'inline-flex items-center px-4 
                    py-1
                    rounded-md font-extrabold text-xs 
                    text-red-400 uppercase tracking-widest 
                    bg-red-100
                    hover:bg-red-200 active:bg-red-200
                    transition']) 
        }}>
    <!-- It is not the man who has too little, but the man who craves more, that is poor. - Seneca -->
    {{$slot}}
</span>