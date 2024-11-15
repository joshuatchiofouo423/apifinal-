<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Formulaire d'enregistrement</title>
</head>
<body>
    <div class="container">
        <div class="contenu">
            <div class="title">
                <h1 class="title-content">FORMULAIRE D'ENREGISTREMENT</h1>
            </div>
            <form action="http://127.0.0.1:8000/api/apiUsers/storeUsers" method="POST" class="form">
                @csrf
                <div class="input-group">
                    <label for="firstname">Nom<span style="color: red">*</span></label>
                    <input type="text" name="firstname" id="firstname" required>
                    @error('firstname')
                        <strong class="invalid-feedback">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="input-group">
                    <label for="lastname">Prénom<span style="color: red">*</span></label>
                    <input type="text" name="lastname" id="lastname" required>
                    @error('lastname')
                        <strong class="invalid-feedback">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="input-group">
                    <label for="email">Email<span style="color: red">*</span></label>
                    <input type="text" name="email" id="email" required>
                    @error('email')
                        <strong class="invalid-feedback">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="input-group">
                    <label for="phone">Téléphone<span style="color: red">*</span></label>
                    <input type="text" name="phone" id="phone" required>
                    @error('phone')
                        <strong class="invalid-feedback">{{ $message }}</strong>
                    @enderror
                </div>
                <button type="submit" class="btn">Envoyer</button>
            </form>
        </div>
    </div>
</body>
</html>
