<h3>Informations principales de M. {{ strtoupper($employe->nom) }}</h3>
<table class="info-table">
    <tr>
        <th>Nom</th>
        <td>{{ strtoupper($employe->nom) }}</td>
    </tr>
    <tr>
        <th>Prénom</th>
        <td>{{ $employe->prenom }}</td>
    </tr>
    <tr>
        <th>Email</th>
        <td>{{ $employe->email }}</td>
    </tr>
    <tr>
        <th>NbVoiture</th>
        <td>{{ $employe->compterVoitures() }}</td>
    </tr>
</table>