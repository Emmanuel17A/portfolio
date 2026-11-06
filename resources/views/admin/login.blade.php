<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login — Portfolio</title>
    @vite(['resources/css/app.css'])
</head>
<body class="antialiased min-h-screen flex items-center justify-center bg-obsidian">

<div class="w-full max-w-sm px-6">
    <div class="text-center mb-10">
        <span class="font-display text-3xl text-sand-200">EM<span class="text-sand-500">.</span></span>
        <p class="text-xs text-sand-600 font-mono mt-2">Admin Panel</p>
    </div>

    <div class="service-card">
        <h1 class="font-display text-2xl text-sand-100 mb-6">Sign in</h1>

        <form method="POST" action="{{ route('admin.login.submit') }}" class="space-y-5">
            @csrf

            <div class="form-field">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email"
                       class="form-input {{ $errors->has('email') ? 'error' : '' }}"
                       value="{{ old('email') }}"
                       required autofocus autocomplete="email">
                @error('email')
                    <p class="text-xs text-red-400 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-field">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password"
                       class="form-input"
                       required autocomplete="current-password">
            </div>

            <label class="flex items-center gap-2 cursor-pointer">
                <input type="checkbox" name="remember" class="accent-sand-400">
                <span class="text-sand-500 text-sm">Remember me</span>
            </label>

            <button type="submit" class="btn-primary w-full justify-center">
                Sign In
            </button>
        </form>
    </div>

    <div class="mt-6 text-center">
        <a href="{{ route('home') }}" class="text-xs text-sand-700 hover:text-sand-500 transition-colors">
            ← Back to site
        </a>
    </div>
</div>

</body>
</html>
