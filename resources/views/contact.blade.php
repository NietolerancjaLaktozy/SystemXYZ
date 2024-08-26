<link rel="stylesheet" href="{{ asset('css/Style_contact.css') }}"> <!--unikatowy css -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{__('Contact')}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('contact.submit') }}">
                        <div class="form">
                        @csrf {{-- Cross-Site Request Forgery protection --}}
                        {{__('FName')}}:<input type="text" id="name" name="name" required><br>

                        Email:<input type="email" id="email" name="email" required><br>

                        {{__('FMessage')}}:<textarea id="message" name="message" required></textarea><br>

                        <input type="submit" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
