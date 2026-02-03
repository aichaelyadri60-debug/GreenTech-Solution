<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Jardin Naturel</title>
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
                <h1>🌿 Connexion</h1>
                <p>Accédez à votre espace personnel</p>
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

            @if(session('success'))
            <div class="success-message">
                ✓ {{ session('success') }}
            </div>
            @endif

            <script>
                const erreur =document.querySelector('.error-message');
                const succes =document.querySelector('.success-message');
                setTimeout(() => {
                    erreur.style.display='none';
                    succes.style.display='none';
                }, 4000);


            </script>
            <form action="{{ route('login') }}" method="POST">
                @csrf



                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" 
                           name="email" 
                           id="email" 
                           value="{{ old('email') }}"
                           placeholder="votre@email.com" 
                           required 
                           autofocus>
                </div>

                <div class="input-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" 
                           name="password" 
                           id="password" 
                           placeholder="Votre mot de passe" 
                           required>
                </div>

                <div class="remember-me">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember" style="font-weight: 500;">Se souvenir de moi</label>
                </div>

                <button type="submit">Se connecter</button>
            </form>

            <div class="form-footer">
                <p>Pas encore de compte ? <a href="{{ route('registerform') }}">Créer un compte</a></p>
            </div>
        </div>
    </div>
     @include('layout.footer')
</body>
</html>