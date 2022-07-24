<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post Show') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             <!-- Validation Errors -->
             <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
   
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('post.index') }}">
                      {{ __('Post') }}
                    </a>

                    <div class="form__div" style="margin-top: 1rem">
                     
                        <div>
                          <x-label for="name" :value="__('Name')" />
          
                          <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{isset($post) ? $post['name'] : ''}}"  :disabled="true"/>
                        </div>
                        <div class="mt-4">
                          <x-label for="created_by" :value="__('Writter')" />
          
                          <x-input id="created_by" class="block mt-1 w-full" type="text" name="name" value="{{isset($post) ? $post['created_by'] : ''}}" :disabled="true" />
                        </div>
                        <div class="mt-4">
                          <x-label for="content" :value="__('Content')" />
          
                          <x-textarea id="content" rows="50" class="block mt-1 w-full" type="text" :disabled="true">{{isset($post) ? $post['content']:''}}</x-textarea>
                        </div>
                        
                      
                      
                    </div>
                   
                    
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
