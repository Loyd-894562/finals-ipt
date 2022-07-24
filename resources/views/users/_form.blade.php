
<div>
    <x-label for="name" :value="__('Name')" />
  
    <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{isset($user) ? old('name',$user['name']):old('name')}}" required />
</div>

<div>
    <x-label for="email" :value="__('Email')" class="mt-2" />
  
    <x-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{isset($user) ? old('email',$user['email']):old('email')}}" required />
</div>

<div>
    <x-label for="password" :value="__('Password')" class="mt-2" />
  
    <input type="password" name="password" id="password" class="block mt-1 w-full" {{!isset($user) ? "required":""}}>
</div>

<div>
    <x-label for="roles" :value="__('Roles')" class="mt-2" />
  
    <select name="roles[]" id="roles" placeholder="{{__('Roles')}}" class="block mt-1 w-full" multiple required>
        @foreach($roles as $role)          
             <option value="{{$role['id']}}" id="role_{{$role['id']}}">{{$role['name']}}</option>
        @endforeach
    </select>
</div>

