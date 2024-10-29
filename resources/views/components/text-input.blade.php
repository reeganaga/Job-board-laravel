<div class="relative">
    @if ($formRef)
        <button type="button" class="absolute right-0 top-0 p-2 text-slate-500 flex items-center h-full"
            @click="console.log('test'); $refs['input-{{ $name }}'].value = ''; $refs['{{ $formRef }}'].submit();">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
        </button>
    @endif
    <input x-ref="input-{{ $name }}" type="{{ $type }}" name="{{ $name }}"
        value="{{ $value }}" placeholder="{{ $placeholder }}" id="{{ $name }}"
        class="w-full rounded-md border-0 pr-8 py-1.5 px-2.5 text-sm ring-1 ring-slate-300 placeholder:text-slate-400 focus:ring-2">

</div>
