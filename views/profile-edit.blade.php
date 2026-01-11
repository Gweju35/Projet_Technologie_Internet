@extends('layout')
@section('content')
    <section class="profile-edit-section py-8 md:py-16 px-0 min-h-[70vh]">
        <div class="container max-w-3xl mx-auto">
            <div class="bg-pj-white p-6 md:p-10 rounded-lg shadow-md">
                <h2 class="text-2xl md:text-3xl font-bold text-pj-blue mb-6">Modifier mon profil</h2>

                @if(isset($success))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ $success }}
                    </div>
                @endif

                @if(isset($error))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        {{ $error }}
                    </div>
                @endif

                <form action="{{ $baseUrl }}/profile/edit" method="POST" class="flex flex-col gap-6">

                    <!-- Informations de base -->
                    <div class="form-section">
                        <h3 class="text-lg font-semibold text-pj-grey mb-4 pb-2 border-b border-pj-blue">Informations personnelles</h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="form-group">
                                <label for="prenom" class="block mb-2 font-semibold text-pj-greyblue">Prénom</label>
                                <input type="text" id="prenom" name="prenom" value="{{ $user['prenom'] }}" required
                                       class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:border-pj-blue">
                            </div>

                            <div class="form-group">
                                <label for="nom" class="block mb-2 font-semibold text-pj-greyblue">Nom</label>
                                <input type="text" id="nom" name="nom" value="{{ $user['nom'] }}" required
                                       class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:border-pj-blue">
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <label for="email" class="block mb-2 font-semibold text-pj-greyblue">Email</label>
                            <input type="email" id="email" name="email" value="{{ $user['mail'] }}" required
                                   class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:border-pj-blue">
                        </div>

                        <div class="form-group mt-4">
                            <label for="telephone" class="block mb-2 font-semibold text-pj-greyblue">Téléphone</label>
                            <input type="tel" id="telephone" name="telephone" value="{{ $user['telephone'] ?? '' }}"
                                   class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:border-pj-blue">
                        </div>

                        <div class="form-group mt-4">
                            <label for="date_naissance" class="block mb-2 font-semibold text-pj-greyblue">Date de naissance</label>
                            <input type="date" id="date_naissance" name="date_naissance" value="{{ $user['date_naissance'] ?? '' }}"
                                   class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:border-pj-blue">
                        </div>
                    </div>

                    <!-- Localisation -->
                    <div class="form-section">
                        <h3 class="text-lg font-semibold text-pj-grey mb-4 pb-2 border-b border-pj-blue">Localisation</h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="form-group">
                                <label for="ville" class="block mb-2 font-semibold text-pj-greyblue">Ville</label>
                                <input type="text" id="ville" name="ville" value="{{ $user['ville'] ?? '' }}"
                                       class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:border-pj-blue">
                            </div>

                            <div class="form-group">
                                <label for="pays" class="block mb-2 font-semibold text-pj-greyblue">Pays</label>
                                <input type="text" id="pays" name="pays" value="{{ $user['pays'] ?? 'France' }}"
                                       class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:border-pj-blue">
                            </div>
                        </div>
                    </div>

                    <!-- Bio -->
                    <div class="form-section">
                        <h3 class="text-lg font-semibold text-pj-grey mb-4 pb-2 border-b border-pj-blue">À propos de moi</h3>

                        <div class="form-group">
                            <label for="bio" class="block mb-2 font-semibold text-pj-greyblue">Biographie</label>
                            <textarea id="bio" name="bio" rows="4"
                                      class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:border-pj-blue">{{ $user['bio'] ?? '' }}</textarea>
                        </div>
                    </div>

                    <!-- Langue (remplace le thème) -->
                    <div class="form-section">
                        <h3 class="text-lg font-semibold text-pj-grey mb-4 pb-2 border-b border-pj-blue">Préférences</h3>

                        <div class="form-group">
                            <label for="langue_preference" class="block mb-2 font-semibold text-pj-greyblue">Langue préférée</label>
                            <select id="langue_preference" name="langue_preference"
                                    class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:border-pj-blue">
                                <option value="fr" {{ ($user['langue_preference'] ?? 'fr') == 'fr' ? 'selected' : '' }}>Français</option>
                                <option value="en" {{ ($user['langue_preference'] ?? 'fr') == 'en' ? 'selected' : '' }}>English</option>
                                <option value="es" {{ ($user['langue_preference'] ?? 'fr') == 'es' ? 'selected' : '' }}>Español</option>
                                <option value="de" {{ ($user['langue_preference'] ?? 'fr') == 'de' ? 'selected' : '' }}>Deutsch</option>
                            </select>
                        </div>
                    </div>

                    <!-- Boutons -->
                    <div class="flex gap-4 justify-end mt-6">
                        <a href="{{ $baseUrl }}/dashboard" class="flex items-center px-6 py-3 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 transition-all cursor-pointer">
                            Annuler
                        </a>
                        <button type="submit" class="px-6 py-3 bg-pj-blue text-white rounded-md hover:bg-[#2980b9] transition-all cursor-pointer">
                            Enregistrer les modifications
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection