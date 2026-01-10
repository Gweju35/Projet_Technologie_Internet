@extends('layout')
@section('content')
<section class="flex h-[70dvh] flex-col justify-center">
    <div class="mx-auto max-w-screen-xl px-4 text-center">
        <h1 class="mb-8 font-grotesk text-5xl font-extrabold text-br-blue md:text-7xl lg:text-9xl">404</h1>
        <h2 class="mb-4 font-grotesk text-3xl font-bold text-br-blue md:text-4xl">Page introuvable</h2>
        <div class="mx-auto flex flex-row items-center justify-center gap-x-2">
            <a href="/home" class="text-xl mt-6 font-fira underline text-pj-blue">Retour à l'accueil</a>
        </div>
    </div>
</section>
@endsection