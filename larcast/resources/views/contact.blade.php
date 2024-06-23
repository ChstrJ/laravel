<x-layout>

    <x-slot:title>
        Contact
    </x-slot:title>

    <div
        class="container mx-auto flex items-center justify-center w-[100%] md:w-[50%] shadow-md bg-white p-4 rounded-lg">
        <form action="{{ route('contact.store') }}" method="POST" class="w-full" novalidate>
            @csrf

            @if ($errors->any())
                <div class="border border-red-500 rounded-md p-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-red-500 text-sm font-bold list-disc ml-4">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="mb-6 mt-2">
                <label for="name" class="block mb-2 text-sm font-medium text-slate-700">Sender</label>
                <input type="text" name="name" id="name"
                    class="bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-500 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required value="{{ old('name') }}" />
            </div>

            <div class="mb-6">
                <label for="email" class="block mb-2 text-sm font-medium text-slate-700">Email address</label>
                <input type="email" name="email" id="email"
                    class="bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-500 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required value="{{ old('email') }}" />
            </div>


            <div class="mb-6">
                <label for="message" class="block mb-2 text-sm font-medium text-slate-700">Message</label>
                <input type="text" name="message" id="message"
                    class="bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-500 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required value="{{ old('message') }}" />
            </div>

            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Send</button>
        </form>
    </div>
</x-layout>
