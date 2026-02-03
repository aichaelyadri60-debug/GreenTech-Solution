<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - Jardin Naturel</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>
    @include('layout.navbar')
    
    <div class="auth-container">
        <div class="form-wrapper">
            <div class="form-title">
                <h1>🌱 Inscription</h1>
                <p>Rejoignez notre communauté verte</p>
            </div>

            @if($errors->any())
            <div class="error-message">
                <ul class="error-list">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('Register') }}" method="POST">
                @csrf

                <div class="input-group">
                    <label for="name">Nom complet</label>
                    <input type="text" 
                           name="name" 
                           id="name" 
                           value="{{ old('name') }}"
                           placeholder="Votre nom complet" 
                           required 
                           autofocus>
                </div>

                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" 
                           name="email" 
                           id="email" 
                           value="{{ old('email') }}"
                           placeholder="votre@email.com" 
                           required>
                </div>

                <div class="input-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" 
                           name="password" 
                           id="password" 
                           placeholder="Minimum 8 caractères" 
                           required>
                </div>

                <div class="input-group">
                    <label for="password_confirmation">Confirmer le mot de passe</label>
                    <input type="password" 
                           name="password_confirmation" 
                           id="password_confirmation" 
                           placeholder="Retapez votre mot de passe" 
                           required>
                </div>

                <button type="submit">Créer mon compte</button>
            </form>

            <div class="form-footer">
                <p>Déjà un compte ? <a href="{{ route('login') }}">Se connecter</a></p>
            </div>
        </div>
    </div>

    @include('layout.footer')
</body>
</html>