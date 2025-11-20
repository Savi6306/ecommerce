<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="bg-white shadow-lg rounded-xl overflow-hidden max-w-4xl w-full md:flex">

        <!-- Left side image for style -->
        <div class="hidden md:block md:w-1/2 bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center">
            <img src="https://images.unsplash.com/photo-1612832020925-9b0aa9b6bcd3?auto=format&fit=crop&w=400&q=80" 
                 alt="Reset Password" class="w-3/4 rounded-lg shadow-lg">
        </div>

        <!-- Form side -->
        <div class="w-full md:w-1/2 p-8">
            <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Reset Your Password</h2>

            <!-- Display Errors -->
            @if ($errors->any())
                <div class="mb-4 bg-red-100 text-red-700 p-3 rounded">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Success Message -->
            @if(session('success'))
                <div class="mb-4 bg-green-100 text-green-700 p-3 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.update') }}" class="space-y-4">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <div>
                    <label for="email" class="block text-gray-700 font-medium mb-1">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required
                        class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label for="password" class="block text-gray-700 font-medium mb-1">New Password</label>
                    <input type="password" name="password" id="password" required
                        class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label for="password_confirmation" class="block text-gray-700 font-medium mb-1">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required
                        class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white p-3 rounded font-semibold transition">
                    Reset Password
                </button>
            </form>

            <p class="mt-4 text-center text-gray-600 text-sm">
                <a href="{{ route('user.login') }}" class="text-blue-600 hover:underline">Back to login</a>
            </p>
        </div>
    </div>

</body>
</html>
