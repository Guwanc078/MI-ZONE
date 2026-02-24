<!DOCTYPE html>
<html>
<head>
    <title>Users Panel - Mi Zone</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100">
    @include('admin.partials.navbar')

    <div class="container mx-auto px-6 py-8">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-xl shadow p-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-bold text-gray-800">Users</h2>
                <a href="{{ route('admin.users.create') }}" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg transition">
                    <i class="fas fa-plus mr-2"></i>New - Users Add
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Role</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Create_At</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Invoice</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($users as $user)
                        <tr>
                            <td class="px-6 py-4">{{ $user->id }}</td>
                            <td class="px-6 py-4">{{ $user->name }}</td>
                            <td class="px-6 py-4">{{ $user->email }}</td>
                            <td class="px-6 py-4">
                                @if($user->role == 'admin')
                                    <span class="bg-red-600 text-white text-xs px-2 py-1 rounded-full">Admin</span>
                                @else
                                    <span class="bg-gray-600 text-white text-xs px-2 py-1 rounded-full">User</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">{{ $user->created_at->format('d.m.Y') }}</td>
                            <td class="px-6 py-4">
                                <a href="{{ route('admin.users.edit', $user) }}" class="text-blue-600 hover:text-blue-800 mr-3">
                                    <i class="fas fa-edit"></i>
                                </a>
                                @if($user->id !== Auth::id())
                                <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline" onsubmit="return confirm('?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>