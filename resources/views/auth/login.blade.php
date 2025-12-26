<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - SANTUN RIAU</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]">

    <div class="w-full max-w-md bg-white rounded-xl shadow-2xl overflow-hidden">
        <div class="bg-[#064E3B] p-8 text-center border-b-4 border-[#F59E0B]">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/0b/Coat_of_arms_of_Riau.svg/960px-Coat_of_arms_of_Riau.svg.png" 
                 alt="Logo Riau" class="w-16 h-auto mx-auto mb-4 bg-white rounded-full p-1 shadow-lg">
            <h2 class="text-2xl font-bold text-white tracking-widest font-serif">SANTUN RIAU</h2>
            <p class="text-[#F59E0B] text-sm uppercase tracking-wide font-semibold">Login Administrator</p>
        </div>

        <div class="p-8">
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4 text-sm">
                    <strong class="font-bold">Login Gagal!</strong>
                    <span class="block sm:inline">{{ $errors->first() }}</span>
                </div>
            @endif

            <form action="{{ route('login.post') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2 ml-1">Email</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <input type="email" name="email" value="{{ old('email') }}" required autofocus
                            class="w-full pl-10 pr-3 py-3 rounded-lg border-2 border-gray-200 outline-none focus:border-[#047857] transition"
                            placeholder="admin@riau.go.id">
                    </div>
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2 ml-1">Password</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500">
                            <i class="fas fa-lock"></i>
                        </span>
                        <input type="password" name="password" required
                            class="w-full pl-10 pr-3 py-3 rounded-lg border-2 border-gray-200 outline-none focus:border-[#047857] transition"
                            placeholder="••••••••">
                    </div>
                </div>

                <button type="submit" 
                    class="w-full bg-[#047857] text-white font-bold py-3 rounded-lg hover:bg-[#064E3B] transition shadow-lg transform active:scale-95">
                    Login
                </button>
            </form>
        </div>
        
        <div class="bg-gray-50 p-4 text-center border-t">
            <p class="text-xs text-gray-500">&copy; 2025 Raihan Fathurrahman. All Rights Reserved.</p>
        </div>
    </div>

</body>
</html>