<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('URL Info') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- {{ __("You're logged in!") }} -->
                    <ul>
                        <li><strong>Long URL:</strong> {{$urlInfo->long_url}}</li>
                        <li><strong>Short URL:</strong> {{$urlInfo->short_url}}</li>
                        <li><strong>Clicks:</strong> {{$urlInfo->click_count}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
