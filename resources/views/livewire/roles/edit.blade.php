<h3 class="tile-title">{{ trans('dashboard.edit_role') }}</h3>
<form wire:submit.prevent="create">
    <div class="form-group col-md-12">
        <label for="">{{ trans('dashboard.role_name') }}</label>
        <input class="form-control" id="" type="text" wire:model="role_name">
        @error('role_name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="clearfix"></div>
    <div class="col-md-12">
        <div class="tile">
            <h3 class="tile-title">{{ trans('dashboard.permissions') }}</h3>
            <button wire:click.prevent="back()" type="submit" class="btn btn-danger">
                Back
            </button>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Model</th>
                            <th>{{ trans('dashboard.permissions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($models as $model)
                            <tr>
                                <td>
                                    {{ $model }}
                                </td>
                                <td>
                                    {{-- <label for="">
                                        <input wire:click="selectAllStatus" type="checkbox" value="1"
                                        class="form-check-input mx-2" />
                                        
                                        <span class="mx-4">{{ __('dashboard.all') }}</span> 
                                    </label> --}}
                                    @foreach ($cruds as $index => $crud)
                                        <label for="">
                                            <input type="checkbox" wire:model="permissions"
                                                value="{{ $crud . '_' . $model }}" class="form-check-input mx-2">
                                            <span class="mx-4">{{ __('dashboard.' . $crud) }}</span>
                                        </label>
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                <button wire:click.prevent="update" type="submit" class="btn btn-success">
                    {{ trans('dashboard.update') }}
                </button>
            </div>
        </div>
    </div>
</form>
