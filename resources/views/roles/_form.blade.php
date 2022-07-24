
<div>
  <x-label for="name" :value="__('Name')" />

  <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{isset($role) ? old('name',$role['name']):''}}" required />
</div>
<br>
  
<div class="card card-primary">
  <div class="card-header">
    <h2 class="card-title">{{ __('Permissions') }}</h2>
  </div>
  <div class="card-body">
    <div class="row">
          @foreach($permissions as $permission)
            <div class="col-lg-6">
              <label for="{{$permission['name']}}">{{$permission['name']}}</label>
                <label class="switch">
                    <input type="checkbox" name="permissions[]" value="{{$permission['id']}}"
                        id="{{$permission['id']}}" >
                    <span class="slider round"></span>
                </label>
            </div>
        @endforeach
    </div>
  </div>
</div>


<script defer>
   @if(isset($rolePermissions))
    @foreach ($rolePermissions as $value)
        document.getElementById("{{$value}}").checked = true;
    @endforeach
  @endif
</script>
