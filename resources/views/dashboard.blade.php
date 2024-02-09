<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- {{ __("You're logged in!") }} -->
                    <div>
                        <div>
                            <label for="enterUrl" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">URL</label>
                            <input type="text" name="enterUrl" id="enterUrl" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter URL" required="">
                        </div>
                        <div id="errorSuccessMsg"></div>
                        <div id="newShortUrl"></div>
                        <input type="hidden" id="userId" value="{{$userId}}">

                        <button id="submitUrl" class="w-full bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800" style="border: 1px solid #000;margin-top: 20px;">Shorten URL</button>
                        
                    </div>

                    <div style="margin-top: 20px;">
                        <h1 class="text-2xl font-bold mb-4">User URLs</h1>

                        @if(count($userUrls) > 0)
                            <table class="min-w-full bg-white border border-gray-300">
                                <thead>
                                    <tr>
                                        <th>Serial</th>
                                        <th class="py-2 px-4 border-b">Long URL</th>
                                        <th class="py-2 px-4 border-b">Short URL</th>
                                        <th class="py-2 px-4 border-b">Clicks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($userUrls as $index => $url)
                                        <tr>
                                            <td>{{$index + 1}}</td>
                                            <td class="py-2 px-4 border-b">{{ $url->long_url }}</td>
                                            <td class="py-2 px-4 border-b"><a href="{{ $url->long_url }}" style="text-decoration: underline;">{{ $url->short_url }}</a></td>
                                            <td class="py-2 px-4 border-b">{{ $url->click_count }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p class="text-gray-600">No URLs found for this user.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
