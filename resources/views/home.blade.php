<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <main>
        <livewire:home.hero>
    </main>
    <section>
        <livewire:home.stats>    
    </section>        
    <section>
        <livewire:home.testimonials>
    </section>
    <footer>
        <livewire:general.footer>
    </footer>
</x-guest-layout>