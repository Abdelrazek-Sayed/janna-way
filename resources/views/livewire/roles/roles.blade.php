<main class="app-content">
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($edit_page == true)
        @include('livewire.roles.edit')
    @else
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">{{ trans('dashboard.roles') }}</h3>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ trans('dashboard.role_name') }}</th>
                            <th>{{ trans('dashboard.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $role->name }}</td>
                                <td>
                                    <button wire:click="edit({{ $role->id }})" class="btn btn-success"><i
                                            class="fa fa-edit"></i></button>
                                   
                                    <button type="button" wire:click="$set('deleteModal',true)" class="btn btn-danger"
                                        data-toggle="modal" data-target="#exampleModal"><i
                                            class="fa fa-trash"></i></button>
                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                    {{ $roles->links() }}
                </table>
            </div>
        </div>
        @include('livewire.roles.create')

        @if ($deleteModal == true)
            @include('livewire.roles.delete_modal')
        @endif
    @endif




</main>
