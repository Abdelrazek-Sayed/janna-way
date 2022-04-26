<main class="app-content">
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($edit_page == true)
        @include('livewire.users.edit')
    @else
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">{{ trans('dashboard.users') }}</h3>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ trans('dashboard.user_name') }}</th>
                            <th>{{ trans('dashboard.email') }}</th>
                            <th>{{ trans('dashboard.role') }}</th>
                            <th>{{ trans('dashboard.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                             
                                <td>{{ $user->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @foreach ($user->roles as $object)
                                   <p>{{ $object->name }}</p>     
                                    @endforeach
                                </td>
                                <td>
                                    <button wire:click="edit({{ $user->id }})" class="btn btn-success"><i
                                            class="fa fa-edit"></i></button>

                                    <button type="button" wire:click="$set('deleteModal',true)" class="btn btn-danger"
                                        data-toggle="modal" data-target="#exampleModal"><i
                                            class="fa fa-trash"></i></button>
                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                    {{ $users->links() }}
                </table>
            </div>
        </div>
        @include('livewire.users.create')

        @if ($deleteModal == true)
            @include('livewire.users.delete_modal')
        @endif
    @endif




</main>
