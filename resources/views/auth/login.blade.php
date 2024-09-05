 <!DOCTYPE html>
 @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="main">
            <input type="checkbox" id="chk" aria-hidden="true">

            <div class="login">
                <form class="form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <label for="chk" aria-hidden="true">Se connecter</label>
                    <input class="input" type="email" name="email" placeholder="Email" required>
                    <input class="input" type="password" name="password" placeholder="Password" required>
                    <button type="submit">Connexion</button>
                </form>
            </div>

            <div class="register">
                <form class="form" method="POST" action="{{ route('register') }}">
                    @csrf
                    <label for="chk" aria-hidden="true">S'inscrire</label>
                    <input class="input" type="text" name="name" placeholder="Nom & Prénoms" required>
                    <input class="input" type="email" name="email" placeholder="Email" required>
                    <input class="input" type="password" name="password" placeholder="Mot de Passe" required>
                    <input class="input" type="password" name="password_confirmation" placeholder="Confirmer le Mot de Passe" required>
                    <button type="submit">S'inscrire</button>
                </form>

            </div>

        </div>
    </div>
</body>
</html>
