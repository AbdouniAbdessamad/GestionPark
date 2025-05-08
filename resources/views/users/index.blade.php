@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-semibold text-gray-800">Liste des Utilisateurs</h2>
                    <a href="{{ route('users.create') }}" class="btn btn-primary">
                        Ajouter un Utilisateur
                    </a>
                </div>

                <div class="rounded-lg shadow overflow-hidden">
                    <table class="table-rounded w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                                <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Téléphone</th>
                                <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Grade</th>
                                <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rôle</th>
                                <th class="px-3 py-2 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($users as $user)
                            <tr class="hover:bg-gray-50">
                                <td style="text-align: center;" class="px-3 py-2 whitespace-nowrap text-sm text-gray-900">{{ $user->name }}</td>
                                <td style="text-align: center;" class="px-3 py-2 whitespace-nowrap text-sm text-gray-900">{{ $user->email }}</td>
                                <td style="text-align: center;" class="px-3 py-2 whitespace-nowrap text-sm text-gray-900">{{ $user->num_tel }}</td>
                                <td style="text-align: center;" class="px-3 py-2 whitespace-nowrap text-sm text-gray-900">{{ $user->grade }}</td>
                                <td style="text-align: center;" class="px-3 py-2 whitespace-nowrap text-sm text-gray-900">{{ $user->role }}</td>
                                <td style="text-align: center;" class="px-3 py-2 whitespace-nowrap text-sm text-gray-900 text-center">
                                    <div class="flex justify-center space-x-4">
                                        <a href="{{ route('users.show', $user) }}" class="text-gray-400 hover:text-blue-600 transition-colors duration-200" title="Voir">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </a>
                                        <a href="{{ route('users.edit', $user) }}" class="text-gray-400 hover:text-blue-600 transition-colors duration-200" title="Modifier">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>
                                        <form action="{{ route('users.destroy', $user) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-gray-400 hover:text-blue-600 transition-colors duration-200" title="Supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
<script>
function dismissMessage() {
    document.getElementById('success-message').style.display = 'none';
}
</script>

@endsection 