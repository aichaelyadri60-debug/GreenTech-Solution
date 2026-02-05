<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Contact - Jardin Naturel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #e8f5e9 0%, #f1f8f4 100%);
            color: #1b5e20;
            line-height: 1.6;
        }      


        .contact-box {
            max-width: 500px;
            margin: 60px auto;
            background: white;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.06);
        }

        h1 {
            color: #2f6f4e;
            margin-bottom: 20px;
        }

        input, textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border-radius: 10px;
            border: 1px solid #ccc;
        }

        button {
            background: #2f6f4e;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 10px;
            width: 100%;
            cursor: pointer;
        }

        .success {
            background: #e6f4ee;
            color: #2f6f4e;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

@include('layout.navbar')

<div class="contact-box">
    <h1>📩 Contactez-nous</h1>

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('contact.send') }}">
        @csrf

        <input type="email" name="email" placeholder="Votre email *" required>

        <textarea name="message" rows="5" placeholder="Votre message *" required></textarea>

        <button type="submit">Envoyer</button>
    </form>
</div>

</body>
</html>
