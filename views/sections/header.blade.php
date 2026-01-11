{{--border-b border-white border-opacity-10--}}
<header id="header" class="js-header header fixed z-50 w-full bg-pj-greyblue">
    <section>
        {{-- Navigation Desktop --}}
        @include("sections.header.desktop-navigation")

        {{-- Navigation Mobile --}}
        @include("sections.header.mobile-navigation")
    </section>
</header>

{{-- Div qui permet de ne pas avoir de contenu partiellement caché sous le header --}}
<div class="pt-16"></div>