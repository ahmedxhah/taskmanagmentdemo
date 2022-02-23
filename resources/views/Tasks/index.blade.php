<x-app-layout>
    <x-slot name="header">
        {{ __('Tasks') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">
        <div class="col-sm-12" style="margin-bottom: 10px;">
        @if (auth()->user()->role)
            <a href="{{route('task.create')}}" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                Create New
            </a>
            @endif
        </div>
        <div class="w-full mt-4 overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
              <table class="w-full whitespace-no-wrap mt-4" id="datatable">
                <thead> 
                  <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50  ">
                    <th class="px-4 py-3">ID</th>
                    <th class="px-4 py-3">Title</th>
                    <th class="px-4 py-3">Created By</th>
                    <th class="px-4 py-3">Assign To</th>
                    <th class="px-4 py-3">completed</th>
                    <th class="px-4 py-3">Feedback</th>
                    @if (!auth()->user()->role)
                        <th>Action</th>
                    @endif
                  </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700">
                  @foreach($tasks as $task)
                    <tr class="text-gray-700 ">
                      <td class="px-4 py-3 text-sm">
                      {{$task->id}}
                      </td>
                      <td class="px-4 py-3 text-sm">
                      {{$task->title}}
                      </td>
                      <td class="px-4 py-3 text-sm">
                      {{$task->created_by->name}}
                      </td>
                      <td class="px-4 py-3 text-sm">
                      {{$task->assign_to->name}}
                      </td>
                      <td class="px-4 py-3 text-xs" >
                        <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                        {{$task->completed?'complete':'pending'}}
                        </span>
                      </td>
                      <td class="px-4 py-3 text-sm">
                      {{$task->feedback}}
                      </td>
                      @if (!auth()->user()->role)
                      <td class="px-4 py-3">
                        <div class="flex items-center space-x-4 text-sm">
                        <a href="{{ route('task.edit',$task['id']) }}" class="btn btn-primary">
                          <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg  focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                              <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                            </svg>
                          </button>
                        </a>
                        
                        </div>
                      </td>
                      @endif

                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            
            <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50">
            {{ $tasks->links() }} 
            
            </div>
          </div>
    </div>
</x-app-layout>
