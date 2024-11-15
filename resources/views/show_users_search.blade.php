<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="../assets/css/style.css">
        <title>Utilisateurs</title>
    </head>

    <body>
        <div class="container">
            <div class="contenu">
                <div class="title">
                    <h1 class="title-content">LISTE DES UTILISATEURS</h1>
                </div>

                <form class="search-form" method="POST" action="{{route('search')}}">
                    <div class="research">
                        <input type="search" name="search_input" id="search_input">
                        <input type="submit" name="search_btn" id="search_btn">
                    </div>
                </form>


                <table border="1" class="table">
                    <tr>
                        <th>id</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Email</th>
                        <th>Telephone</th>
                    </tr>
                    @foreach ($users as $user)
                        <tr>

                            <td>{{ $user->user_id }}</td>
                            <td>{{ $user->lastname }}</td>
                            <td>{{ $user->firstname }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>

                        </tr>
                    @endforeach
                </table>
            </div>
        </div>


    </body>

</html>
