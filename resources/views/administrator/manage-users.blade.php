@extends('layouts/adm')

@section('content')
    <div class="row m-4">
        <div class="table-responsive">
            <table class="table table-light table-striped table-borderless table-hover">
                <thead class="table-dark">
                    <th></th>
                    <th style="width: 20%">Pseudonyme</th>
                    <th style="width: 30%">Email</th>
                    <th style="width: 20%">Dernière connexion</th>
                    <th style="width: 30%"></th>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>@if ($user->isAdmin)<i class="fas fa-crown text-info"></i>@endif</td>
                            <td>
                                <span id="username-{{ $user->id }}">{{ $user->name }}</span>
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->connected }}</td>
                            <td class="text-right">
                                @if(Auth::user()->id != $user->id)        
                                    <span data-toggle="tooltip" data-placement="top" title="@if($user->isAdmin) Retrograder utilisateur @else Promouvoir administrateur @endif">
                                        <button class="btn btn-sm @if(!$user->isAdmin) btn-outline-info @else btn-info @endif user-manage-btn" id="promoteUser-{{ $user->id }}" data-toggle="modal" data-target="#promoteUser">
                                            <i class="fas fa-crown"></i>
                                        </button>
                                    </span>
                                    <span data-toggle="tooltip" data-placement="top" title="Supprimer l'utilisateur">
                                        <button type="button" class="btn btn-sm btn-danger delete-user user-manage-btn" id="removeUser-{{ $user->id }}" data-toggle="modal" data-target="#removeUser">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="removeUser" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Supprimer l'utilisateur <span class="usernameModal font-weight-bold"></span>?</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('administrator.users.delete') }}" method="POST" id="removeUserForm">
                    @csrf
                    @method('delete')
                    <div class="modal-body">
                        <label for="removeUserCheck" class="mb-2">Tapez <span class="usernameModal font-weight-bold"></span> pour confirmer</label>
                        <input type="text" class="form-control" id="removeUserCheck">
                        <div class="invalid-feedback">
                            Vous n'avez pas entré le bon nom d'utilisateur
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <button type="submit" id="confirmButton-removeUser" class="btn btn-danger">Supprimer <span class="usernameModal font-weight-bold"></span></a>  
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="promoteUser" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Promouvoir l'utilisateur <span class="usernameModal font-weight-bold"></span>?</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('administrator.users.promote') }}" method="POST" id="promoteUserForm">
                    @csrf
                    @method('patch')
                    <div class="modal-body">
                        <label for="promoteUserCheck" class="mb-2">Tapez <span class="usernameModal font-weight-bold"></span> pour confirmer</label>
                        <input type="text" class="form-control" id="promoteUserCheck">
                        <div class="invalid-feedback">
                            Vous n'avez pas entré le bon nom d'utilisateur
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <button type="submit" id="confirmButton-promoteUser" class="btn btn-info">Promouvoir <span class="usernameModal font-weight-bold"></span></a>  
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection