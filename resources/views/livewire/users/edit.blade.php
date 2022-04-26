<h3 class="tile-title">{{ trans('dashboard.edit_user') }}</h3>


<div class="clearfix"></div>
<div class="col-md-12">
    <div class="tile">
        <h3 class="tile-title">{{ trans('dashboard.users') }}</h3>
        <button wire:click="$set('edit_page',false)" type="submit" class="btn btn-danger">
            {{ trans('dashboard.back') }}
        </button>
        <form wire:submit.prevent="update">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">{{ trans('dashboard.name') }}</label>
                <input type="text" class="form-control" wire:model="name">

            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">{{ trans('dashboard.email') }}</label>
                <input type="email" class="form-control" wire:model="email">

            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">{{ trans('dashboard.password') }}</label>
                <input type="password" class="form-control" wire:model="password">
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">{{ trans('dashboard.roles') }}</label>
                <select class="form-control" wire:model="role_id">
                    <option class="form-control" selected>{{ trans('dashboard.please_select') }}</option>
                    @foreach ($roles as $role)
                        <option class="form-control" value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
                @error('role_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">
                {{ trans('dashboard.add') }}
            </button>
        </form>

    </div>
</div>
