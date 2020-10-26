@extends('layouts/adm')

@section('content')
    <div class="row m-4">
        <div class="table-responsive">
            <table class="table table-light">
                <thead>
                    <th style="width: 20%">Pseudonyme</th>
                    <th style="width: 30%">Email</th>
                    <th style="width: 20%">Dernière connexion</th>
                    <th style="width: 30%"></th>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td id="username-{{ $user->id }}">{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>Last con</td>
                            <td class="text-right">
                                <span data-toggle="tooltip" data-placement="top" title="Supprimer l'utilisateur">
                                    <button type="button" class="btn btn-sm btn-danger delete-user" id="{{ $user->id }}" data-toggle="modal" data-target="#removeUser">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </span>
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
                    <h5 class="modal-title" id="exampleModalLabel">Supprimer l'utilisateur <span class="usernameModal font-weight-bold"></span>?</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('administrator.users.delete') }}" method="POST" id="deleteUserForm">
                    @csrf
                    @method('delete');
                    <div class="modal-body">
                        <label for="checkUser" class="mb-2">Tapez <span class="usernameModal font-weight-bold"></span> pour confirmer</label>
                        <input type="text" class="form-control" id="checkUser">
                        <div class="invalid-feedback">
                            Vous n'avez pas entré le bon nom d'utilisateur
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <button type="submit" id="deleteUserLink" class="btn btn-danger">Supprimer <span class="usernameModal font-weight-bold"></span></a>  
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection