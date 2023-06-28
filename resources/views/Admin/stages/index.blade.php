@include('Admin.layout.header')
<div class="container-xxl flex-grow-1 container-p-y">
    <br />
    <h1>Liste des demandes de stages</h1>
    <br />

    <div class="card">
        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Etudient</th>
                        <th>Filière</th>
                        <th>Niveau</th>
                        <th>Urgent</th>
                        <th>Etat</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($documents as $document)
                        <tr>
                            <td>{{ $document->student->nom . ' ' . $document->student->prenom }}</td>
                            <td>{{ $document->speciality }} </td>
                            <td> @switch($document->year)
                                    @case('1')
                                        1ère année
                                    @break

                                    @default
                                        {{ $document->year }} ème année
                                @endswitch
                            </td>
                            <td>
                                <input type="checkbox" class="rounded" onclick="return false;" readonly <?php $state=($document->urgent >0)?'checked': ''; echo($state); ?> /> 
                            </td>
                            <td>
                                @switch( $document->etat )
                                @case(0)
                                        <span class="badge bg-label-info me-1">En Cours</span>
                                    @break

                                    @case(1)
                                        <span class="badge bg-label-success me-1">Prêt</span>
                                    @break

                                    @case(2)
                                        <span class="badge bg-label-danger me-1">Refusé</span>
                                    @break

                                    @default
                                        <span class="badge bg-label-primary me-1">Etat inconnu</span>
                            @endswitch
                            </td>
                            <td>{{ date('d/m/Y', strtotime($document->date)) }}</td>
                            <td>
                                <a href="{{ route('stages.edit', $document->id) }}" data-method="get"
                                    data-token="{{ csrf_token() }}" class="btn btn-info">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                        viewBox="0 0 64 64" aria-labelledby="title" aria-describedby="desc"
                                        role="img" xmlns:xlink="http://www.w3.org/1999/xlink">

                                        <path data-name="layer2"
                                            d="M63.1 30.9C62.6 30.1 50 12.5 32 12.5S1.4 30.1.9 30.9L.1 32l.8 1.1c.5.8 13.1 18.4 31.1 18.4s30.6-17.6 31.1-18.4l.8-1.1zM32 47.5C18.5 47.5 8 35.8 5 32c3-3.8 13.5-15.5 27-15.5S56 28.2 59 32c-3 3.8-13.5 15.5-27 15.5z"
                                            fill="#1f1f1f"></path>
                                        <path data-name="layer1"
                                            d="M32 19.5a12 12 0 1 0 12 12 12 12 0 0 0-12-12zm0 18a6 6 0 0 1-5.2-9 2 2 0 0 1 3.5 2 2 2 0 0 0-.3 1 2 2 0 0 0 2 2 2 2 0 1 1 0 4z"
                                            fill="#1f1f1f"></path>
                                    </svg>
                                    <span style="padding-left: 10px;"> Affichage</span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @include('Admin.layout.footer')
