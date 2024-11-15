<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}"> <!-- Ajout du token CSRF -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Utilisateurs</title>
</head>

<body>
    <div class="container">
        <div class="contenu">
            <div class="title">
                <h1 class="title-content">LISTE DES UTILISATEURS</h1>
            </div>

            <div class="research">
                <input type="search" class="search_input" name="search_input" id="search_input" placeholder="Rechercher...">

            </div>

            <table border="1" class="table">
                <thead>
                    <tr>
                        <th>user_id</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Email</th>
                        <th>Telephone</th>
                    </tr>
                </thead>
                <tbody id="usersTableBody">
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->user_id }}</td>
                        <td>{{ $user->lastname }}</td>
                        <td>{{ $user->firstname }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('#search_input').on('input', function() {
            search();
        });


        function search() {
            var keyword = $('#search_input').val();
            $.post('{{ route("search") }}',
                {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    keyword: keyword
                },
                function(data) {
                    if (data && Array.isArray(data)) {
                        table_post_row(data);
                    } else {
                        console.error('Erreur dans la réponse de recherche:', data);
                    }
                });
        }

        function table_post_row(users) {
            let htmlView = '';
            if (users.length <= 0) {
                htmlView += `
                    <tr>
                        <td colspan="5">Aucune donnée.</td>
                    </tr>`;
            } else {
                users.forEach(user => {
                    htmlView += `
                        <tr>
                            <td>${user.user_id}</td>
                            <td>${user.lastname}</td>
                            <td>${user.firstname}</td>
                            <td>${user.email}</td>
                            <td>${user.phone}</td>
                        </tr>`;
                });
            }
            $('#usersTableBody').html(htmlView);
        }
    </script>
</body>

</html>
