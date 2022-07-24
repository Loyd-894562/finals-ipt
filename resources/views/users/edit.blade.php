<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Edit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             <!-- Validation Errors -->
             <x-auth-validation-errors class="mb-4" :errors="$errors" />
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
   
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('users.index') }}">
                      {{ __('Users') }}
                    </a>

                    <div class="form__div" style="margin-top: 1rem">
                      <form method="POST" action="{{ route('users.update', $user['id']) }}">
                        @csrf
                        @method("PUT")
                        @include('users._form')

                        <x-button class="mt-4">
                          {{ __('Save') }}
                        </x-button>
                      </form>
                    </div>
                   
                    
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

<script defer>
    @if(isset($user))
        @foreach ($user['roles'] as $user_roles)
            document.getElementById("role_{{$user_roles['id']}}").selected = true;
        @endforeach
    @endif    
</script>