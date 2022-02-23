<x-app-layout>
  <x-slot name="header">
    {{ __('Tasks') }}
  </x-slot>

  <div class="p-4 bg-white rounded-lg shadow-xs">
    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
      Create Task
    </h4>
    <form id="sample_form" action="{{route('task.store')}}" method="post">
      @csrf
      <label class="block mt-4 text-sm">
        <span class="text-gray-700 dark:text-gray-400">Title</span>
        <input name="title" type="text" class="form-control form-input block w-full mt-1 text-sm dark:border-gray-300 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray " placeholder="Enter task title">
      </label>
      <label class="block mt-4 text-sm">
        <span class="text-gray-700 dark:text-gray-400">
          Assign To
        </span>
        <select name="assign_to" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
          @foreach ($user as $u)
          <option value="{{ $u['id'] }}">{{ $u['name'] }}</option>
          @endforeach
        </select>
      </label>

      <label class="block mt-4 text-sm">
        <span class="text-gray-700 dark:text-gray-400">Feedback</span>
        <textarea name="feedback" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" rows="3" placeholder="Enter remarks for task."></textarea>
      </label>
      <div>
        <button type="submit" class="px-4 py-2 mt-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
          Submit
        </button>
      </div>
    </form>
  </div>
</x-app-layout>