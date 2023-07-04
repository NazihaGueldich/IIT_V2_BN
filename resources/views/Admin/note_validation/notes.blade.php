@include('Admin.layout.header')
<div class="container-xxl flex-grow-1 container-p-y">
    <br />
    <h1>Validation de notes</h1>
    <br />
    <div class="row">
        <div class="col-lg-3 col-md-12 col-6 mb-4">
        </div>
        <div class="col-lg-4 col-md-12 col-6 mb-4">
            <div class="card shadow-none bg-transparent border border-primary mb-3">
                <div class="card-body">
                    <p class="card-text"><strong>Année : </strong>{{ request()->year }}</p>
                    <p class="card-text"><strong>Spécialité : </strong>{{ $speciality->specialite }}</p>
                    <p class="card-text"><strong>Module : </strong>{{ $module->module }}</p>
                    <p class="card-text"><strong>Type : </strong>
                        @switch(request()->type)
                            @case('exa')
                                Examen
                            @break
                        @endswitch
                    </p>
                    <p class="card-text"><strong>Niveau : </strong>{{ request()->niveau }}</p>
                    <p class="card-text"><strong>Semester : </strong>{{ request()->semester }}</p>
                    <p class="card-text"><strong>Groupe : </strong>{{ request()->groupe }}</p>
                </div>
            </div>
        </div>
        <!-- Hoverable Table rows -->
        <div class="card">
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Code Etudient</th>
                            <th>Nom Et Prénom</th>
                            <th>Notes</th>
                            <th>Modifiables</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($students as $student)
                            <tr>
                                <td>{{ $student->code_etudiant }}</td>
                                <td>{{ $student->student->nom }} {{ $student->student->prenom }}</td>
                                <td>
                                    @if ($student->note != null)
                                        {{ $student->note->note }}
                                    @else
                                        No value
                                    @endif
                                </td>
                            </tr>
                            <td>{{ $student->note != null && $student->note->locked == 1 ? 'Non' : 'Oui' }}</td>
                            <td>
                                @if ($student->note != null)
                                    <div class="row">
                                        {{-- <col-md-6>
                                    <form action="{{route("admin.validationNote.validate")}}" method="get">
                                        <input type="hidden" name="grade" value="{{$student->note->id}}">
                                        <button class="btn btn-primary">Valider</button>
                                    </form>
                                </col-md-6> --}}
                                        @if ($student->note->locked)
                                            <col-md-6>
                                                <form action="{{ route('admin.validationNote.unlock') }}"
                                                    method="get">
                                                    <input type="hidden" name="grade"
                                                        value="{{ $student->note->id }}">
                                                    <button class="btn btn-danger">Débloquer</button>
                                                </form>
                                            </col-md-6>
                                        @endif
                                    </div>
                                @endif
                            </td>
                        @endforeach
                    </tbody>
                </table>
                @if ($nb > 0)
                    <form action="{{ route('admin.validationNote.validate') }}" method="get"
                        style="margin-top: 20px">
                        <input type="hidden" name="etd" value="{{ $students }}">
                        <button class="btn btn-primary"
                            style="margin-left:999px; margin-top:25px;padding-left:42px;padding-right:42px">Valider</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
    @include('Admin.layout.footer')
