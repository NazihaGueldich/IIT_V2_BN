@include('Admin.layout.header')
<div class="container-xxl flex-grow-1 container-p-y">
    <br />
    <h1>Détails du stage demandé</h1>
    <br />
    <div class="row">
        <div class="col-md-6 col-xl-1">
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card shadow-none bg-transparent border border-primary mb-3">
                <div class="card-body">
                    <p class="card-text">
                        <strong>Etat : </strong>
                        @switch($document[0]->etat)
                            @case(0)
                                En cours
                            @break

                            @case(1)
                                Prêt
                            @break

                            @case(2)
                                Refusé
                            @break

                            @default
                                Etat inconnu
                        @endswitch
                    </p>
                    @if ($document[0]->year > 0)
                        <p class="card-text">
                            <strong>Année scolaire : </strong>
                            @switch($document[0]->year)
                                @case(1)
                                    1ére année
                                @break

                                @case(2)
                                    2éme Année
                                @break

                                @case(3)
                                    3éme Année
                                @break

                                @default
                                    0
                            @endswitch
                        </p>
                    @endif
                    <p class="card-text">
                        <strong>Urgent : </strong>
                        @if ($document[0]->urgent > 0)
                            Oui
                        @else
                            Non
                        @endif
                    </p>
                    @if (!empty($document[0]->justification))
                        <p class="card-text">
                            <strong>Justification : </strong>
                            {{ $document[0]->justification }}
                        </p>
                    @endif
                    <p class="card-text">
                        <strong>Date : </strong>
                        {{ date('d/m/Y', strtotime($document[0]->date)) }}
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-2">
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card shadow-none bg-transparent border border-warning mb-3">
                <div class="card-body" style="height: 190px;">
                    <br/>
                    <h4 class="card-title">Mettre à jour l'état :</h4>
                    @switch($document[0]->etat)
                        @case(0)
                            <form action="{{ route('documents.update', ['document' => $document[0]->id, 'etat' => '1']) }}"
                                method="post" style="display: inline; padding-left: 20px">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-success">Prêt</button>
                            </form>
                            <form action="{{ route('documents.update', ['document' => $document[0]->id, 'etat' => '2']) }}"
                                method="post" style="display: inline; padding-left: 20px">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-danger">Refusé</button>
                            </form>
                        @break

                        @case(1)
                            <form action="{{ route('documents.update', ['document' => $document[0]->id, 'etat' => '0']) }}"
                                method="post" style="display: inline; padding-left: 20px">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-info">En cours</button>
                            </form>
                            <form action="{{ route('documents.update', ['document' => $document[0]->id, 'etat' => '2']) }}"
                                method="post" style="display: inline; padding-left: 20px">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-danger">Refusé</button>
                            </form>
                        @break

                        @case(2)
                            <form action="{{ route('documents.update', ['document' => $document[0]->id, 'etat' => '0']) }}"
                                method="post" style="display: inline; padding-left: 20px">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-info">En cours</button>
                            </form>
                            <form action="{{ route('documents.update', ['document' => $document[0]->id, 'etat' => '1']) }}"
                                method="post" style="display: inline; padding-left: 20px">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-success">Prêt</button>
                            </form>
                        @break

                        @default
                            Etat inconnu
                    @endswitch
                    <form action=" {{ route('affectStage.show', ['affectStage' => $document[0]->id]) }} "
                        style="display: inline;padding-left: 20px">
                        @csrf
                        <button type="submit" class="btn btn-warning">Print</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br />
    <h2>Information de l'étudiant</h2>
    <br />
    <div class="row">
        <div class="col-md-6 col-xl-2">
        </div>
        <div class="col-md-6 col-xl-6">
            <div class="card shadow-none bg-transparent border border-secondary mb-3">
                <div class="card-body">
                    <p class="card-text">
                        <strong>Code étudiant :</strong>
                        {{ $document[0]->code_etudiant }}
                    </p>
                    <p class="card-text">
                        <strong>Nom :</strong>
                        {{ $document[0]->nom }}
                    </p>
                    <p class="card-text">
                        <strong>Prénom :</strong>
                        {{ $document[0]->prenom }}
                    </p>
                    <p class="card-text">
                        <strong>Nationalité :</strong>
                        {{ $document[0]->nationalite }}
                    </p>
                    <p class="card-text">
                        <strong>Email :</strong>
                        {{ $document[0]->email }}
                    </p>
                    <p class="card-text">
                        <strong>Télephone :</strong>
                        {{ $document[0]->tel_mobile }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

@include('Admin.layout.footer')
