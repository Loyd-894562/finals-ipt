<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <x-link-button href="{{ route('post.create') }}">
                        {{ __('Create') }}
                    </x-link-button>

                    <div class="table py-2">
                        <table class="table-auto" width="100%">
                            <thead style="background-color: rgb(167, 121, 121);">
                              <tr >
                                <th class="text-center" width="10%">Id</th>  
                                <th class="text-center" width="50%">Post Name</th>
                                <th class="text-center" width="30%">Writter</th>
                                <th class="text-center" width="20%">Action</th>
                              </tr>
                            </thead>
                            <tbody class="border" style="text-align: center">
                                @foreach ($posts as $post)
                                <tr>
                                    <td>{{$post['id']}}</td>
                                    <td>{{$post['name']}}</td>
                                    <td>{{$post['created_by']}}</td>
                                    <td>
                                        <div style="display: flex;aline-items:center;justify-content: center;margin:.2rem 0rem">
                                            <x-link-button href="{{ route('post.edit',$post['id']) }}" style="background-color: rgb(103, 103, 192)">
                                                {{ __('Edit') }}
                                            </x-link-button>

                                            <x-link-button href="{{ route('post.show',$post['id']) }}" style="background-color: rgb(57, 197, 213); margin-left:.4rem">
                                                {{ __('Show') }}
                                            </x-link-button>
    
                                            <form method="POST" action="{{ route('post.destroy',$post['id']) }}">
                                                @csrf
                                                @method("DELETE")
                                                <x-button class="ml-3" style="background-color: rgb(244, 75, 75)">
                                                    {{ __('Delete') }}
                                                </x-button>
                                            </form>    
    
                                        </div>
                                        
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                          </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
