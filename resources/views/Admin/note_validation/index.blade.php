@include('Admin.layout.header')
<div class="container-xxl flex-grow-1 container-p-y">
    <br />
    <h1>Validation de notes</h1>
    <br />
    <div class="row">
        <div class="col-lg-2 col-md-12 col-6 mb-4">
        </div>
        <div class="col-lg-8 col-md-12 col-6 mb-4">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="mt-2 mb-3">
                        <label for="largeSelect" class="form-label">Niveau</label>
                        <select name="niveau" id="niveau" class="form-select form-select-lg" required>
                            <option>Choisire un niveau</option>
                            @foreach ($levels as $level)
                                <option value="{{ $level->id }}">{{ $level->niveau }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-2 mb-3">
                        <label for="largeSelect" class="form-label">Specialité</label>
                        <select id="specialty" class="form-select form-select-lg" name="specialty" required>
                            <option>Choisire une spécialité</option>
                            @foreach($specialities as $speciality)
                                <option value="{{$speciality->id}}">{{$speciality->specialite .' - '.$speciality->abreviation}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-2 mb-3">
                        <label for="largeSelect" class="form-label">Semester (1->9)</label>
                        <input class="form-control" type="number"id="semester" name="semester" min="1" max="9" value="1" required />
                    </div>
                    <div class="mt-2 mb-3">
                        <label for="largeSelect" class="form-label">Modules</label>
                        <select id="module" class="form-select form-select-lg" name="module" required>
                            <option>Choisire un module</option>
                            @foreach($modules as $module)
                                <option  value="{{$module->id}}">{{$module->module}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-2 mb-3">
                        <label for="largeSelect" class="form-label">Année </label>
                        <input class="form-control" type="number"name="year" value="{{ date('Y') }}" id="year" required/>
                    </div>
                    <div class="mt-2 mb-3">
                        <label for="largeSelect" class="form-label">Matiére</label>
                        <select id="modulesList" class="form-select form-select-lg" name="modulesList" required>
                            <option>Choisire une matiére</option>
                            @foreach($modules as $module)
                                <option  value="{{$module->id}}">{{$module->module}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-2 mb-3">
                        <label for="largeSelect" class="form-label">Type</label>
                        <select id="type" class="form-select form-select-lg" name="type" required>
                            <option>Choisire un type d'évaluation</option>
                            @foreach($typeEvaluation as $evaluation)
                            <option value="{{$evaluation->id}}">{{$evaluation->type_evaluation}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="mt-2 mb-3">
                        <label for="largeSelect" class="form-label">Groupe</label>
                        <input class="form-control"name="groupe" id="groupe" type="number" min="1" value="1" required />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('Admin.layout.footer')
