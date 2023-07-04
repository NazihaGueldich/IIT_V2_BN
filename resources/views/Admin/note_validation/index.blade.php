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
                <form class="input-group" action="{{ route('validationNote.filter') }}" method="get">
                    <div class="card-body">
                        {{-- Part 1 --}}
                        <div class="alert alert-warning" role="alert" id='alert1' style="display: block;">Veuillez
                            sélectionner un niveau et une
                            spécialité !</div>
                        <div class="mt-2 mb-3" id='niv' style="display: block;">
                            <label for="largeSelect" class="form-label">Niveau</label>
                            <select name="niveau" id="niveau" class="form-select" required>
                                <option value="null">Choisire un niveau</option>
                                @foreach ($levels as $level)
                                    <option value="{{ $level->id }}">{{ $level->niveau }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-2 mb-3" id='spec' style="display: block;">
                            <label for="largeSelect" class="form-label">Specialité</label>
                            <select id="specialty" class="form-select" name="specialty" required>
                                <option value="null">Choisire une spécialité</option>
                                @foreach ($specialities as $speciality)
                                    <option value="{{ $speciality->id }}">
                                        {{ $speciality->specialite . ' - ' . $speciality->abreviation }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="alert alert-info" role="alert" id='NivSpec' style="display: none"></div>
                        {{-- Part 2 --}}
                        <div class="alert alert-warning" role="alert" id='alert2' style="display: none;">Veuillez
                            sélectionner un semestre et un
                            module !</div>
                        <div class="mt-2 mb-3" id='sem' style="display: none;">
                            <label for="largeSelect" class="form-label">Semester (1->9)</label>
                            <input type="number" id="semester" class="form-control phone-mask" name="semester"
                                aria-describedby="basic-icon-default-phone2" min="1" max="9" required />
                        </div>
                        <div class="mt-2 mb-3" id='mod' style="display: none;">
                            <label for="largeSelect" class="form-label">Modules</label>
                            <select name="groupeModules" id="groupeModules" class="form-select" required>
                                <option value="null">Choisire un semester</option>
                            </select>
                        </div>
                        <div class="alert alert-secondary" role="alert" id='ModSem' style="display: none"></div>
                        {{-- Part 3 --}}
                        <div class="alert alert-warning" role="alert" id='alert3' style="display: none;">Veuillez
                            sélectionner une année, une matière, un type d'évaluation et un groupe !</div>
                        <div class="mt-2 mb-3" id='annee' style="display: none;">
                            <label for="largeSelect" class="form-label">Année</label>
                            <input type="number" class="form-control phone-mask" name="year"
                                value="{{ date('Y') }}" id="year" required
                                aria-describedby="basic-icon-default-phone2" />
                        </div>
                        <div class="mt-2 mb-3" id='mat' style="display: none;">
                            <label for="largeSelect" class="form-label">Matière</label>
                            <select name="module" id="module" class="form-select" required>
                                <option value="null">Choisire une matiére</option>
                            </select>
                        </div>
                        <div class="mt-2 mb-3" id='grp' style="display: none;">
                            <label for="largeSelect" class="form-label">Groupe</label>
                            <input type="number" class="form-control phone-mask" name="groupe" id="groupe"
                                type="number" min="1" required
                                aria-describedby="basic-icon-default-phone2" />
                        </div>
                        <div class="mt-2 mb-3" id='eval' style="display: none;">
                            <label for="largeSelect" class="form-label">Type</label>
                            <select  id="type" name="type" class="form-select" required>
                                <option value="null">Choisire une matiére</option>
                            </select>
                        </div>
                        <div class="alert alert-success" role="alert" id='AnnMatTypGrp' style="display: none">
                        </div>
                        <button type="submit" class="btn btn-primary" style="display: none; margin-left: 680px;"
                            id='btn'>Filtrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    //part1
    var selectLevel = document.getElementById("niveau");
    var selectSpeciality = document.getElementById("specialty");
    var alertElement = document.getElementById("alert1");

    var levelValue = 0;
    var specialtyValue = 0;
    //lissner 3ala les select 
    selectLevel.addEventListener("change", checkSelection);
    selectSpeciality.addEventListener("change", checkSelection);


    function checkSelection() {
        levelValue = selectLevel.value;
        specialtyValue = selectSpeciality.value;

        if (levelValue === "null" && specialtyValue === "null") {
            alertElement.style.display = "block";
            alertElement.innerHTML = 'Veuillez sélectionner un niveau et une spécialité !';
        } else if (levelValue === "null") {
            alertElement.className = "alert alert-danger";
            alertElement.innerHTML = "Veuillez sélectionner un niveau !";
        } else if (specialtyValue === "null") {
            alertElement.className = "alert alert-danger";
            alertElement.innerHTML = "Veuillez sélectionner une spécialité !";
        } else {
            document.getElementById("niv").style.display = "none";
            document.getElementById("spec").style.display = "none";
            alertElement.style.display = "none";
            var NivSpec = document.getElementById("NivSpec");
            NivSpec.style.display = "none";

            //msg alert NivSpec
            var selectedOption = selectLevel.options[selectLevel.selectedIndex];
            var niveau = selectedOption.textContent;
            var selectedOption = selectSpeciality.options[selectSpeciality.selectedIndex];
            var specialite = selectedOption.textContent;
            NivSpec.innerHTML = "Niveau : " + niveau + "<br> Spécialité : " + specialite;
            NivSpec.style.display = "block";

            //part2
            var alert2 = document.getElementById("alert2");
            alert2.style.display = "block";
            var res1;
            $.ajax({
                url: '{{ route('validationNote.part2') }}',
                type: 'GET',
                data: {
                    niveau: levelValue,
                    specialty: specialtyValue
                },
                dataType: 'json',
                async: false,
                success: function(data) {
                    res1 = data;
                }
            });
            Sem = document.getElementById("sem");
            Sem.style.display = "block";
            Mod = document.getElementById("mod");
            selectMod = document.getElementById("groupeModules");
            selectMod.innerHTML = '';
            $('#groupeModules').append('<option value="null">Choisire un module</option>');
            $.each(res1, function(key, value) {
                $('#groupeModules').append('<option value="' + value.id + '">' + value.groupe_module +
                    '</option>');
            });
            Mod.style.display = "block";
        }
    }

    //teb3a partie 2
    var selectSemester = document.getElementById("semester");
    var selectModule = document.getElementById("groupeModules");
    var alert2 = document.getElementById("alert2");

    var SemesterValue = 0;
    var ModuleValue = 0;

    //lissner 3ala les select 
    selectSemester.addEventListener("change", checkSelection2);
    selectModule.addEventListener("change", checkSelection2);

    function checkSelection2() {
        SemesterValue = selectSemester.value;
        ModuleValue = selectModule.value;
        if (SemesterValue === "" && ModuleValue === "null") {
            alert2.style.display = "block";
            alert2.innerHTML = 'Veuillez sélectionner un module et un semester !';
        } else if (SemesterValue < 1 || SemesterValue > 9) {
            alert2.className = "alert alert-danger";
            alert2.innerHTML = "La semestre doit étre entre 1 et 9 !";
        } else if (ModuleValue === "null") {
            alert2.className = "alert alert-danger";
            alert2.innerHTML = "Veuillez sélectionner un module !";
        } else if (SemesterValue === "null") {
            alert2.className = "alert alert-danger";
            alert2.innerHTML = "Veuillez sélectionner un semester !";
        } else {
            document.getElementById("mod").style.display = "none";
            document.getElementById("sem").style.display = "none";
            alert2.style.display = "none";
            var ModSem = document.getElementById("ModSem");
            ModSem.style.display = "none";

            //msg alert ModSem
            var selectedOption = selectModule.options[selectModule.selectedIndex];
            var modulee = selectedOption.textContent;
            ModSem.innerHTML = "Semester : " + SemesterValue + "<br> Module : " + modulee;
            ModSem.style.display = "block";

            //part 3
            alert2.style.display = "none";
            var alert3 = document.getElementById("alert3");
            alert3.style.display = "block";
            var res2;
            $.ajax({
                url: '{{ route('validationNote.part3') }}',
                type: 'GET',
                data: {
                    semester: SemesterValue,
                    niveau: levelValue,
                    specialty: specialtyValue,
                    groupeModules: ModuleValue,
                },
                dataType: 'json',
                async: false,
                success: function(data) {
                    res2 = data;
                }
            });
            annee = document.getElementById("annee");
            annee.style.display = "block";
            mat = document.getElementById("mat");
            selectmodule = document.getElementById("module");
            selectmodule.innerHTML = '';
            $('#module').append('<option value="null">Choisire une matière</option>');
            $.each(res2[0], function(key, value) {
                $('#module').append('<option value="' + value.id + '">' + value.module +
                    '</option>');
            });
            mat.style.display = "block";

            grp = document.getElementById("grp");
            grp.style.display = "block";
            selecttype = document.getElementById("type");
            selecttype.innerHTML = '';
            $('#type').append('<option value="null">Choisire un type évaluation</option>');
            $.each(res2[1], function(key, value) {
                $('#type').append('<option value="' + value.id + '">' + value.type_evaluation +
                    '</option>');
            });
        }
        document.getElementById("eval").style.display = "block";
    }

    //teb3a partie 3
    var selectyear = document.getElementById("year");
    var selectmodule = document.getElementById("module");
    var selecttype = document.getElementById("type");
    var selectgroupe = document.getElementById("groupe");
    var alert2 = document.getElementById("alert2");

    var yearValue = 0;
    var moduleValue = 0;
    var typeValue = 0;
    var groupeValue = 0;

    //lissner 3ala les select 
    selectyear.addEventListener("change", checkSelection3);
    selectmodule.addEventListener("change", checkSelection3);
    selectgroupe.addEventListener("change", checkSelection3);
    selecttype.addEventListener("change", checkSelection3);

    function checkSelection3() {
        yearValue = selectyear.value;
        moduleValue = selectmodule.value;
        typeValue = selecttype.value;
        groupeValue = selectgroupe.value;
        if (yearValue === "" && moduleValue === "null" &&
            groupeValue === "" && typeValue === "null") {
            alert3.style.display = "block";
            alert3.innerHTML = "Veuillez sélectionner une année, une matière, un type d'évaluation et un groupe !";
        } else if (yearValue === "") {
            alert3.className = "alert alert-danger";
            alert3.innerHTML = "Veuillez sélectionner une année !";
        } else if (yearValue < 2010) {
            alert3.className = "alert alert-danger";
            alert3.innerHTML = "Année incorrecte !";
        } else if (moduleValue === "null") {
            alert3.className = "alert alert-danger";
            alert3.innerHTML = "Veuillez sélectionner une  matière!";
        } else if (typeValue === "null") {
            alert3.className = "alert alert-danger";
            alert3.innerHTML = "Veuillez sélectionner un type d'évaluation !";
        } else if (groupeValue === "") {
            alert3.className = "alert alert-danger";
            alert3.innerHTML = "Veuillez sélectionner un groupe !";
        } else if (groupeValue < 1) {
            alert3.className = "alert alert-danger";
            alert3.innerHTML = "Le groupe doit supérieure à 0 !";
        } else {
            alert3.style.display = "none";
            document.getElementById("annee").style.display = "none";
            document.getElementById("mat").style.display = "none";
            document.getElementById("eval").style.display = "none";
            document.getElementById("grp").style.display = "none";
            //msg alert AnnMatTypGrp
            var selectedOption = selectmodule.options[selectmodule.selectedIndex];
            var matiére = selectedOption.textContent;
            var selectedOption = selecttype.options[selecttype.selectedIndex];
            var typeSel = selectedOption.textContent;
            var alert4 = document.getElementById("AnnMatTypGrp");
            alert4.innerHTML = "Année : " + yearValue + " <br> Matière : " + matiére + " <br>Type d'évaluation : " +
            typeSel + "<br>Groupe : " + groupeValue;
            alert4.style.display = "block";
            document.getElementById("btn").style.display = "block";
        }
    }
</script>
@include('Admin.layout.footer')
