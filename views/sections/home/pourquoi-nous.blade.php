<section class="bg-pj-greyblue/5 py-12 md:py-20">
    <div class="container grid md:grid-cols-2 gap-10 items-center">

        <!-- Texte -->
        <div>
            <h2 class="text-2xl md:text-4xl mb-6 text-pj-greyblue font-grotesk font-semibold">
                Pourquoi nous choisir ?
            </h2>

            <ul class="space-y-4">
                <li class="flex gap-3">
                    <span class="text-pj-blue font-bold">✓</span>
                    <p class="text-pj-greyblue">Expertise reconnue dans les projets web modernes.</p>
                </li>
                <li class="flex gap-3">
                    <span class="text-pj-blue font-bold">✓</span>
                    <p class="text-pj-greyblue">Solutions personnalisées selon vos objectifs.</p>
                </li>
                <li class="flex gap-3">
                    <span class="text-pj-blue font-bold">✓</span>
                    <p class="text-pj-greyblue">Support technique rapide et humain.</p>
                </li>
            </ul>
        </div>

        <!-- Visuel -->
        <div class="relative">
            <div class="bg-pj-blue/10 rounded-xl h-64 md:h-80"></div>

            <div class="absolute inset-6 bg-pj-white rounded-xl shadow-lg overflow-hidden flex items-center justify-center">
                <video
                        class="w-full h-full object-cover rounded-xl"
                        src="{{ $baseUrl }}/public/videos/website_video.mp4"
                        autoplay
                        muted
                        loop
                        playsinline
                ></video>
            </div>
        </div>


    </div>
</section>