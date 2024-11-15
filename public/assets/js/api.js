$(document).ready(function() {
    // Ajoute un écouteur d'événements sur l'input de recherche
    $('#search_input').on('input', function() {
        search();
    });

    // Fonction pour effectuer la recherche
    function search() {
        var keyword = $('#search_input').val(); // Récupère la valeur de l'input de recherche
        // Envoie une requête POST pour la recherche
        $.post('{{ route("search") }}', // Assurez-vous que la route est correcte
            {
                _token: $('meta[name="csrf-token"]').attr('content'), // Récupère le token CSRF
                keyword: keyword
            },
            function(data) {
                table_post_row(data); // Met à jour la table avec les résultats
                console.log(data); // Affiche les données dans la console pour débogage
            });
    }

    // Fonction pour mettre à jour la table avec les résultats de recherche
    function table_post_row(res) {
        let htmlView = '';
        if (res.length <= 0) { // Vérifie si aucun utilisateur n'a été trouvé
            htmlView += `
                <tr>
                    <td colspan="5">Aucune donnée.</td>
                </tr>`;
        } else {
            // Parcourt les résultats et génère les lignes de la table
            for (let i = 0; i < res.length; i++) {
                htmlView += `
                    <tr>
                        <td>${res[i].user_id}</td>
                        <td>${res[i].lastname}</td>
                        <td>${res[i].firstname}</td>
                        <td>${res[i].email}</td>
                        <td>${res[i].phone}</td>
                    </tr>`;
            }
        }
        $('#usersTableBody').html(htmlView); // Met à jour le corps de la table avec les nouvelles lignes
    }
});
