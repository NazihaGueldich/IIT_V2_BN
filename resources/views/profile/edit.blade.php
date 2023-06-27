@include('Admin.layout.header')
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">

        <!-- Tabs -->
        <h1 class="py-3 my-4">Profile</h1>

        <div class="row">
            <div class="row mb-4">
                <div class="col-md-6 col-lg-4 mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <img class="card-img-top" src="https://cdn-icons-png.flaticon.com/512/2995/2995459.png"
                                alt="Card image cap" />
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="nav-align-top mb-4">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                                    data-bs-target="#navs-top-home" aria-controls="navs-top-home" aria-selected="true">
                                    Informations du profil
                                </button>
                            </li>
                            <li class="nav-item">
                                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                    data-bs-target="#navs-top-profile" aria-controls="navs-top-profile"
                                    aria-selected="false">
                                    Mot de passe
                                </button>
                            </li>

                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="navs-top-home" role="tabpanel">
                                <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                                    @csrf
                                    @method('patch')


                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label"
                                            for="basic-icon-default-email">E-mail</label>
                                        <div class="col-sm-10">
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                                                <input type="text" id="email" name="email"
                                                    :value="old('email', $user->email)"
                                                    placeholder="Saisir votre e-mail s'il vous plaît..."
                                                    class="form-control" aria-describedby="basic-icon-default-email2"
                                                    required autocomplete="username" />
                                                <x-input-error class="mt-2" :messages="$errors->get('email')" />
                                                <span id="basic-icon-default-email2"
                                                    class="input-group-text">@example.com</span>
                                            </div>
                                            <div class="form-text">Vous pouvez utiliser des lettres, des chiffres et des
                                                points</div>
                                        </div>
                                    </div>
                                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                                        <div>
                                            <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                                                {{ __('Your email address is unverified.') }}

                                                <button form="send-verification"
                                                    class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                                    {{ __('Click here to re-send the verification email.') }}
                                                </button>
                                            </p>

                                            @if (session('status') === 'verification-link-sent')
                                                <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                                                    {{ __('A new verification link has been sent to your email address.') }}
                                                </p>
                                            @endif
                                        </div>
                                    @endif
                                    <div class="row justify-content-end">
                                        <div class="col-sm-10">
                                            <button type="submit" class="btn btn-primary">Modifier</button>
                                        </div>
                                        @if (session('status') === 'profile-updated')
                                            <div class="alert alert-success alert-dismissible" role="alert">
                                                E-mail Modifier
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close"></button>
                                            </div>
                                        @endif
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="navs-top-profile" role="tabpanel">
                                <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                                    @csrf
                                    @method('patch')
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-phone">Mot de passe actuel
                                            No</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="basic-default-phone"
                                                class="form-control phone-mask" placeholder="Saisir votre mot de passe  s'il vous plaît..."
                                                 aria-describedby="basic-default-phone" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-phone">Nouveau mot de passe
                                            No</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="basic-default-phone"
                                                class="form-control phone-mask" placeholder="Saisir votre nouveau mot de passe  s'il vous plaît..."
                                                 aria-describedby="basic-default-phone" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-phone">Confirmez le mot de passe
                                            </label>
                                        <div class="col-sm-10">
                                            <input type="text" id="basic-default-phone"
                                                class="form-control phone-mask" placeholder="Confirmer votre mot de passe  s'il vous plaît..."
                                                 aria-describedby="basic-default-phone" />
                                        </div>
                                    </div>
                                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                                        <div>
                                            <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                                                {{ __('Your email address is unverified.') }}

                                                <button form="send-verification"
                                                    class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                                    {{ __('Click here to re-send the verification email.') }}
                                                </button>
                                            </p>

                                            @if (session('status') === 'verification-link-sent')
                                                <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                                                    {{ __('A new verification link has been sent to your email address.') }}
                                                </p>
                                            @endif
                                        </div>
                                    @endif
                                    <div class="row justify-content-end">
                                        <div class="col-sm-10">
                                            <button type="submit" class="btn btn-primary">Modifier</button>
                                        </div>
                                        @if (session('status') === 'profile-updated')
                                            <div class="alert alert-success alert-dismissible" role="alert">
                                                E-mail Modifier
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close"></button>
                                            </div>
                                        @endif
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <!-- Tabs -->



        </div>
        <!-- / Content -->
        @include('Admin.layout.footer')
