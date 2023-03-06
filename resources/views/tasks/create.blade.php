<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Tasks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-base font-semibold leading-6 text-gray-900">Tasks</h3>
                            <p class="mt-1 text-sm text-gray-600">Hier erstellst du die Tasks mit der Kategorie</p>
                        </div>
                    </div>
                    <div class="mt-5 md:col-span-2 md:mt-0">
                        <form action="{{ route('tasks.store') }}" method="POST">
                            @csrf
                            <div class="shadow sm:overflow-hidden sm:rounded-md">
                                <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                                    <div class="sm:col-span-6">
                                        <x-label for="name" :value="__('Name')" />
                                        <x-input type="text"
                                                 id="name"
                                                 name="name"
                                                 class="block w-full"
                                                 value="{{ old('name', $task->name) }}"
                                                 required />
                                        <x-input-error for="name" class="mt-2" />
                                    </div>
                                    <div class="sm:col-span-6">
                                        <x-label for="category_id" :value="__('Category')" />
                                        <select name="category_id" id="category_id" class="mt-2 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            @foreach($categories as $id => $name)
                                                <option value="{{ $id }}" @selected(old('category_id', $task->category_id) == $id)>{{ $name }}</option>
                                            @endforeach
                                        </select>
                                        <x-input-error for="category_id" class="mt-2" />
                                    </div>
                                </div>
                                <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                                    <x-button class="inline-flex justify-center rounded-md bg-indigo-600 py-2 px-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                                        {{ __('Submit') }}
                                    </x-button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
