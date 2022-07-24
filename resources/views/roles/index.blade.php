<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Role') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <x-link-button href="{{ route('roles.create') }}">
                        {{ __('Create') }}
                    </x-link-button>

                    <div class="table py-2">
                        <table class="table-auto" width="100%">
                            <thead style="background-color: rgb(167, 121, 121);">
                              <tr >
                                <th class="text-center" width="10%">Id</th>  
                                <th class="text-center" width="70%">Role Name</th>
                                <th class="text-center" width="20%">Action</th>
                              </tr>
                            </thead>
                            <tbody class="border" style="text-align: center">
                                @if(isset($roles) && count($roles)>0)
                                    @foreach ($roles as $role)
                                    <tr>
                                        <td>{{$role['id']}}</td>
                                        <td>{{$role['name']}}</td>
                                        
                                        <td>
                                            <div style="display: flex;aline-items:center;justify-content: center;margin:.2rem 0rem">
                                                <x-link-button href="{{ route('roles.edit',$role['id']) }}" style="background-color: rgb(103, 103, 192)">
                                                    {{ __('Edit') }}
                                                </x-link-button>

                                    
        
                                                <form method="POST" action="{{ route('roles.destroy',$role['id']) }}">
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
                                @else
                                    <tr>
                                        <td colspan="3" align="center">
                                            <p>No Data Found !!</p>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                          </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
