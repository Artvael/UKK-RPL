<!DOCTYPE html>
<html lang="id" class="h-full bg-slate-900">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 - Akses Ditolak (Forbidden) | UKK RPL 2026</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>body { font-family: 'Plus Jakarta Sans', sans-serif; }</style>
</head>
<body class="h-full flex items-center justify-center p-6 text-slate-100">
    <div class="max-w-lg w-full bg-slate-800/90 border border-slate-700/80 rounded-3xl p-8 md:p-10 text-center shadow-2xl backdrop-blur-xl relative overflow-hidden">
        <div class="absolute -top-12 -right-12 w-40 h-40 bg-rose-500/10 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-12 -left-12 w-40 h-40 bg-brand-500/10 rounded-full blur-3xl pointer-events-none"></div>

        <div class="w-20 h-20 mx-auto rounded-3xl bg-rose-500/10 border border-rose-500/20 text-rose-400 flex items-center justify-center text-3xl shadow-lg shadow-rose-500/10 mb-6">
            <i class="fa-solid fa-shield-halved"></i>
        </div>

        <span class="px-3.5 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-rose-500/20 text-rose-300 border border-rose-500/30 inline-block mb-3">
            Error 403 • Privilege Restricted
        </span>

        <h1 class="text-2xl md:text-3xl font-extrabold text-white tracking-tight mb-2">
            Akses Ditolak (Forbidden)
        </h1>

        <p class="text-slate-400 text-sm leading-relaxed mb-8">
            {{ $exception->getMessage() ?: 'Maaf, akun Anda tidak memiliki hak akses yang memadai untuk membuka fitur atau URL ini.' }}
        </p>

        <div class="p-4 bg-slate-900/60 border border-slate-700/50 rounded-2xl mb-8 text-left text-xs space-y-2">
            <div class="flex items-center justify-between text-slate-400">
                <span>Pengguna Aktif:</span>
                <span class="font-bold text-white">{{ Auth::check() ? Auth::user()->name : 'Guest' }}</span>
            </div>
            <div class="flex items-center justify-between text-slate-400">
                <span>Hak Akses Saat Ini:</span>
                <span class="font-bold text-amber-400 uppercase">{{ Auth::check() ? Auth::user()->role : 'None' }}</span>
            </div>
            <div class="flex items-center justify-between text-slate-400">
                <span>Status Keamanan:</span>
                <span class="font-bold text-emerald-400"><i class="fa-solid fa-lock mr-1"></i> Role-Based Guard Active</span>
            </div>
        </div>

        <a href="{{ route('dashboard') }}" class="inline-flex items-center justify-center space-x-2 w-full py-3 px-6 bg-gradient-to-r from-emerald-600 to-emerald-500 hover:from-emerald-500 hover:to-emerald-400 text-white font-bold text-sm rounded-xl shadow-lg shadow-emerald-600/30 transition-all">
            <i class="fa-solid fa-house"></i>
            <span>Kembali ke Dashboard Utama</span>
        </a>
    </div>
</body>
</html>
