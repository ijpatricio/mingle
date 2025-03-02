@props([
    'showcase'
])
@php /** @var \App\Showcase $showcase */ @endphp
<div
    class="flex justify-between items-center
        rounded-br-lg rounded-bl-lg bg-white p-6 pb-12 text-[13px] leading-[20px]
        shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)]
        lg:rounded-tl-lg lg:rounded-br-none lg:p-6 dark:bg-[#161615]
        dark:text-[#EDEDEC] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d]
    "
>
    <div>
        <p class="mb-2 text-lg text-[#706f6c] dark:text-[#A1A09A]">
            {{ $showcase->title }}
        </p>
        <p class="mb-2 text-[#706f6c] dark:text-[#A1A09A]">
            {{ $showcase->description }}
        </p>
    </div>

    <div>
        <a
            href="{{ route($showcase->routeName) }}"
            class="inline-block rounded-sm border border-black bg-[#1b1b18] px-5 py-1.5
                    text-sm leading-normal text-white hover:border-black hover:bg-black dark:border-[#eeeeec]
                    dark:bg-[#eeeeec] dark:text-[#1C1C1A] dark:hover:border-white dark:hover:bg-white
                "
        >
            Visit
        </a>
    </div>
</div>
