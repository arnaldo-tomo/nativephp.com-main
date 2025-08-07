<x-layout title="Laravel Lusophone - Localização Completa para o Mundo Lusófono">
    {{-- Hero --}}
    <section class="mt-10 px-5 md:mt-14" aria-labelledby="hero-title">
        {{-- Header --}}
        <header class="group/header relative isolate grid place-items-center gap-0.5 text-center dark:text-white/90">
            {{-- Laravel --}}
            <h1 id="hero-title" x-init="() => {
                motion.animate(
                    $el, {
                        opacity: [0, 1],
                        x: [-10, 0],
                    }, {
                        duration: 1,
                        ease: motion.easeOut,
                    },
                )
            }"
                class="truncate text-6xl md:mt-[100px] font-extrabold uppercase min-[400px]:text-7xl md:text-8xl">
                <span class="sr-only">Laravel</span>
            </h1>
            <div class="relative">
                <h1 x-init="() => {
                    motion.animate(
                        $el, {
                            opacity: [0, 1],
                            x: [10, 0],
                        }, {
                            duration: 1,
                            ease: motion.easeOut,
                        },
                    )
                }"
                    class="truncate text-6xl font-extrabold text-[#f53004] uppercase min-[400px]:text-7xl md:text-8xl"
                    aria-hidden="true">
                    Laravel
                </h1>

                {{-- Blurred circle --}}
                <div class="absolute -top-20 size-48 rounded-full bg-blue-200/60 blur-[100px] md:-right-32 md:size-60 dark:-top-80 dark:right-1/2 dark:-z-50 dark:size-80 dark:translate-x-1/2 dark:bg-blue-600/80"
                    aria-hidden="true"></div>

                {{-- Star --}}
                <div x-init="() => {
                    motion.animate(
                        $el, {
                            scale: [0, 1],
                            opacity: [0, 1],
                        }, {
                            duration: 1,
                            ease: motion.anticipate,
                        },
                    )
                }" class="absolute -top-10 -right-10">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40" fill="none"
                        class="size-8 dark:size-6" aria-hidden="true" x-init="() => {
                            motion.animate(
                                $el, {
                                    rotate: [0, -180],
                                }, {
                                    duration: 1.5,
                                    repeat: Infinity,
                                    repeatType: 'loop',
                                    ease: 'linear',
                                },
                            )
                        }">
                        <path
                            d="M25.66 17.636L40 20L25.66 22.364C23.968 22.644 22.64 23.968 22.364 25.66L20 40L17.636 25.66C17.356 23.968 16.032 22.64 14.34 22.364L0 20L14.34 17.636C16.032 17.356 17.36 16.032 17.636 14.34L20 0L22.364 14.34C22.644 16.032 23.968 17.36 25.66 17.636Z"
                            fill="#B3D4FF" />
                    </svg>
                </div>

                {{-- Glass shape --}}
                <div class="absolute top-16 -left-12 size-6 rounded-tl-3xl rounded-tr-xl rounded-br-3xl rounded-bl-xl bg-blue-100/10 ring-1 ring-white/50 backdrop-blur-xs min-[400px]:top-18 min-[400px]:-left-14 min-[400px]:size-8 md:top-[5.6rem] md:-left-18 md:size-10 dark:hidden dark:ring-gray-700/50"
                    x-init="() => {
                        motion.animate(
                            $el, {
                                rotate: [-90, 0],
                                scale: [0, 1],
                                opacity: [0, 1],
                            }, {
                                duration: 1.5,
                                ease: motion.anticipate,
                            },
                        )
                    }" aria-hidden="true"></div>

                {{-- Video introduction --}}
                <div x-init="() => {
                    motion.animate(
                        $el, {
                            y: [-10, 0],
                            x: [10, 0],
                        }, {
                            duration: 1.5,
                            ease: motion.circOut,
                        },
                    )
                }"
                    class="group absolute -top-[5.7rem] -right-76 hidden items-end gap-1 text-left text-sm lg:flex">
                    <div class="relative -top-1.5 -mr-6 flex items-end gap-1">
                        <div x-init="() => {
                            motion.animate(
                                $el, {
                                    scale: [0, 1],
                                }, {
                                    duration: 1,
                                    ease: motion.backOut,
                                },
                            )
                        }"
                            class="-mb-1.5 size-1 rounded-full bg-white ring-[3px] ring-black dark:bg-black/50 dark:ring-white"
                            aria-hidden="true"></div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="94" height="41" viewBox="0 0 94 41"
                            fill="none" aria-hidden="true">
                            <path x-init="() => {
                                motion.animate(
                                    $el, {
                                        strokeDashoffset: [0, 20],
                                    }, {
                                        duration: 1.5,
                                        repeat: Infinity,
                                        repeatType: 'loop',
                                        ease: 'linear',
                                    },
                                )
                            }"
                                d="M94 0.5H47.3449C41.942 0.5 36.7691 2.68588 33.0033 6.56012L0.5 40"
                                stroke="currentColor" stroke-dasharray="5 5" />
                        </svg>
                        <a href="https://www.youtube.com/@arnaldo-tomo" target="_blank" rel="noopener"
                            class="relative -top-5 grid size-10 place-items-center rounded-full bg-black/30 text-white ring-1 ring-white/10 backdrop-blur-sm transition duration-300 ease-in-out will-change-transform group-hover:scale-110 group-hover:text-[#7ABFFF]"
                            aria-label="Assistir vídeo de introdução do Laravel Lusophone no YouTube">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-6.305-3.633A1 1 0 007 8.366v7.268a1 1 0 001.447.894l6.305-3.633a1 1 0 000-1.788z" />
                            </svg>
                            <span class="sr-only">Reproduzir vídeo de introdução</span>
                        </a>
                    </div>
                    <div>
                        <div class="font-medium">Vídeo</div>
                        <div class="font-normal text-gray-600 dark:text-white/50">
                            Lusophone em Ação
                        </div>
                        <a href="#" target="_blank" rel="noopener"
                            aria-label="Assistir vídeo introdutório do Laravel Lusophone">
                            <img src="{{ asset('Idiomas.webp') }}"
                                alt="Arnaldo Tomo apresentando o Laravel Lusophone em conferência"
                                class="mt-2 w-40 rounded-xl" width="160" height="90" loading="lazy" />
                        </a>
                    </div>
                </div>
            </div>
            {{-- Lusophone --}}
            <h1 x-init="() => {
                motion.animate(
                    $el, {
                        opacity: [0, 1],
                        x: [-10, 0],
                    }, {
                        duration: 1,
                        ease: motion.easeOut,
                    },
                )
            }"
                class="truncate text-6xl sm:mx5 font-extrabold text-violet-600 uppercase min-[400px]:text-7xl md:text-8xl" aria-hidden="true">
                Lusophone
            </h1>

            {{-- Shiny line --}}
            <div class="absolute top-32 left-1/2 z-20 -translate-x-1/2 rotate-50 transition duration-500 ease-out will-change-transform group-hover/header:translate-x-[-55%] group-hover/header:opacity-0"
                aria-hidden="true">
                <div x-init="() => {
                    motion.animate(
                        $el, {
                            y: [-30, 0],
                            opacity: [0, 0, 1],
                        }, {
                            duration: 1.2,
                            ease: motion.easeOut,
                        },
                    )
                }"
                    class="h-2.5 w-104 bg-linear-to-r from-transparent to-blue-200/50 ring-1 ring-white/50 dark:hidden">
                </div>
            </div>
        </header>

        {{-- Video for mobile --}}
        <div class="grid place-items-center pt-4 lg:hidden">
            <a href="https://www.youtube.com/@arnaldo-tomo" target="_blank" rel="noopener" class="group relative"
                aria-label="Assistir vídeo introdutório do Laravel Lusophone">
                <div class="absolute top-1/2 right-1/2 grid size-16 translate-x-1/2 -translate-y-1/2 place-items-center rounded-full bg-white/10 text-white ring-1 ring-white/10 backdrop-blur-sm transition duration-300 ease-in-out will-change-transform group-hover:scale-110 group-hover:text-[#7ABFFF]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-6.305-3.633A1 1 0 007 8.366v7.268a1 1 0 001.447.894l6.305-3.633a1 1 0 000-1.788z" />
                    </svg>
                    <span class="sr-only">Reproduzir vídeo</span>
                </div>
                <img src="{{ asset('Idiomas.webp') }}"
                    alt="Arnaldo Tomo apresentando o Laravel Lusophone em conferência"
                    class="w-full max-w-[505px] rounded-xl" width="505" height="284" loading="lazy" />
            </a>
        </div>

        {{-- Description --}}
        <p x-init="() => {
            motion.animate(
                $el, {
                    opacity: [0, 1],
                    y: [10, 0],
                }, {
                    duration: 1,
                    ease: motion.easeOut,
                },
            )
        }"
            class="mx-auto max-w-4xl pt-5 text-center text-lg/relaxed text-gray-600 md:text-xl/relaxed dark:text-zinc-400"
            aria-describedby="hero-title">
            Traga suas aplicações
            <a href="https://laravel.com" target="_blank" rel="noopener"
                class="inline-block font-medium text-[#F53003] transition duration-200 will-change-transform hover:-translate-y-0.5"
                aria-label="Saiba mais sobre o framework Laravel">
                Laravel
            </a>
            para o mundo lusófono com <br class="hidden md:block" /> localização automática e culturalmente adaptada.
            {{-- <br class="hidden md:block" />
            Suporte para
            <span class="text-black dark:text-white">
                8 países de língua portuguesa
            </span>
            com validações, formatações e traduções prontas para uso. --}}
        </p>

        {{-- Call to Action Button --}}
        <div class="mt-10 flex flex-wrap-reverse items-center justify-center gap-4 sm:flex-nowrap"
            x-data="{ installHover: false, docsHover: false }">
            {{-- Install --}}
            <div x-init="() => {
                motion.animate(
                    $el, {
                        opacity: [0, 1],
                        x: [10, 0],
                    }, {
                        duration: 1,
                        ease: motion.easeOut,
                    },
                )
            }" class="w-full max-w-64">
                <div class="transition duration-300" :class="{ 'opacity-60 grayscale': docsHover }">
                    <a href="https://github.com/arnaldo-tomo/laravel-lusophone#instalação" target="_blank" rel="noopener"
                        class="group dark:bg-haiti relative isolate z-0 flex h-16 items-center justify-between gap-3 overflow-hidden rounded-2xl bg-[#EBEDF2] pr-6 pl-5 leading-snug transition duration-200 ease-in-out will-change-transform hover:bg-blue-100/60 dark:hover:bg-blue-900/60"
                        aria-label="Instalar o pacote Laravel Lusophone via Composer"
                        x-on:mouseenter="installHover = true" x-on:mouseleave="installHover = false">
                        <div class="flex items-center gap-1">
                            <div
                                class="size-1 rounded-full bg-current transition duration-500 ease-in-out will-change-transform group-hover:translate-x-2 group-hover:translate-y-1.5 group-hover:opacity-50">
                            </div>
                            <div class="flex flex-col gap-2">
                                <div
                                    class="size-1 rounded-full bg-current opacity-50 transition duration-500 ease-in-out will-change-transform group-hover:-translate-x-2 group-hover:translate-y-1.5 group-hover:opacity-100">
                                </div>
                                <div
                                    class="size-1 rounded-full bg-current opacity-50 transition duration-500 ease-in-out will-change-transform group-hover:-translate-y-3">
                                </div>
                            </div>
                        </div>
                        <div
                            class="flex items-center gap-3 duration-500 ease-in-out will-change-transform group-hover:-translate-x-1">
                            <div>Ver no GitHub</div>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 0C4.477 0 0 4.484 0 10.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0110 4.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.203 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.942.359.31.678.921.678 1.856 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0020 10.017C20 4.484 15.522 0 10 0z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </a>
                </div>
            </div>

            {{-- Documentation --}}
            <div x-init="() => {
                motion.animate(
                    $el, {
                        opacity: [0, 1],
                        x: [-10, 0],
                    }, {
                        duration: 1,
                        ease: motion.easeOut,
                    },
                )
            }" class="w-full max-w-64">
                <div class="transition duration-300" :class="{ 'opacity-60 grayscale': installHover }">
                    <a href="/docs/desktop/1" rel="noopener"
                        class="group dark:bg-haiti relative isolate z-0 flex h-16 items-center justify-between gap-3 overflow-hidden rounded-2xl bg-[#EBEDF2] pr-5 pl-6 leading-snug transition duration-200 ease-in-out will-change-transform hover:bg-blue-100/60 dark:hover:bg-blue-900/50"
                        aria-label="Explorar a documentação do Laravel Lusophone"
                        x-on:mouseenter="docsHover = true" x-on:mouseleave="docsHover = false">
                        <div class="flex items-center gap-1">
                            <div class="flex flex-col gap-2">
                                <div
                                    class="size-1 rounded-full bg-current opacity-50 transition duration-500 ease-in-out will-change-transform group-hover:translate-x-2 group-hover:translate-y-1.5 group-hover:opacity-100">
                                </div>
                                <div
                                    class="size-1 rounded-full bg-current opacity-50 transition duration-500 ease-in-out will-change-transform group-hover:-translate-y-3">
                                </div>
                            </div>
                            <div
                                class="size-1 rounded-full bg-current transition duration-500 ease-in-out will-change-transform group-hover:-translate-x-2 group-hover:translate-y-1.5 group-hover:opacity-50">
                            </div>
                        </div>
                        <div x-init="() => {
                            motion.animate(
                                $el, {
                                    x: [0, 20, -100, 0],
                                    y: [0, 5, 0],
                                    scale: [1, 0.7, 1],
                                    rotate: [0, 10, 0],
                                }, {
                                    duration: 10,
                                    repeat: Infinity,
                                    repeatType: 'loop',
                                    ease: motion.easeInOut,
                                },
                            )
                        }"
                            class="absolute -bottom-12 left-14 -z-10 h-20 w-44 rounded-full bg-blue-200/30 blur-xl will-change-transform dark:bg-blue-500/30">
                        </div>
                        <div x-init="() => {
                            motion.animate(
                                $el, {
                                    x: [0, -10, 0],
                                    y: [0, 10, 0],
                                    scale: [1, 1.2, 1],
                                }, {
                                    duration: 5,
                                    repeat: Infinity,
                                    repeatType: 'loop',
                                    ease: motion.easeInOut,
                                },
                            )
                        }"
                            class="absolute -bottom-12 -left-5 -z-20 h-20 w-44 rounded-full bg-green-200/30 blur-xl will-change-transform dark:bg-green-500/30">
                        </div>
                        <div
                            class="flex items-center gap-3 duration-500 ease-in-out will-change-transform group-hover:translate-x-1">
                            <div>Documentação</div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-7 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- Arnaldo Tomo Talk --}}
  {{-- Arnaldo Tomo Talk --}}
    <section class="mx-auto mt-20 max-w-5xl px-5" aria-labelledby="lusophone-talk-title">
        <div class="flex flex-col items-center gap-5 lg:flex-row lg:justify-between">
            {{-- Left side --}}
       {{-- Left side --}}
            <div class="text-center lg:max-w-96 lg:text-left">
                <div x-init="() => {
                    motion.inView($el, (element) => {
                        motion.animate(
                            $el, {
                                opacity: [0, 1],
                                x: [10, 0],
                            }, {
                                duration: 0.7,
                                ease: motion.circOut,
                            },
                        )
                    })
                }"
                    class="inline-block rounded-full px-3 py-1 text-sm font-medium uppercase ring-1 ring-green-600 text-green-600 dark:ring-green-400 dark:text-green-400">
                    🚀 Instalação Rápida
                </div>
                {{-- <h2 id="lusophone-talk-title" x-init="() => {
                    motion.inView($el, (element) => {
                        motion.animate(
                            $el, {
                                opacity: [0, 1],
                                x: [-10, 0],
                            }, {
                                duration: 0.7,
                                ease: motion.circOut,
                            },
                        )
                    })
                }"
                    class="pt-2.5 text-xl font-medium capitalize opacity-0">
                    Laravel Lusophone
                </h2> --}}
                <p x-init="() => {
                    motion.inView($el, (element) => {
                        motion.animate(
                            $el, {
                                opacity: [0, 1],
                                x: [10, 0],
                            }, {
                                duration: 0.7,
                                ease: motion.circOut,
                            },
                        )
                    })
                }" class="pt-1.5 leading-relaxed text-gray-500 opacity-0 dark:text-gray-400">
                    Desenvolvido por <strong>Arnaldo Tomo</strong>, o Laravel Lusophone oferece
                    <span class="text-green-600 font-medium">detecção automática</span> de região e
                    <span class="text-blue-600 font-medium">localização cultural</span> para toda a comunidade lusófona.
                    Instalação em 3 passos simples!
                </p>
            </div>

            {{-- Right side --}}
            <div class="grid place-items-center">
                <div class="w-full max-w-[600px] space-y-4">
                    {{-- Installation steps --}}
                    <div class="bg-gradient-to-br from-gray-900 to-gray-800 rounded-2xl p-6 shadow-2xl ring-1 ring-white/10">
                        {{-- Terminal header --}}
                        <div class="flex items-center gap-3 mb-6">
                            <div class="flex gap-1.5">
                                <div class="w-3 h-3 bg-red-500 rounded-full"></div>
                                <div class="w-3 h-3 bg-yellow-500 rounded-full"></div>
                                <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                            </div>
                            <span class="text-gray-400 text-sm font-mono flex items-center gap-2">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M2 5a2 2 0 012-2h12a2 2 0 012 2v10a2 2 0 01-2 2H4a2 2 0 01-2-2V5zm3.293 1.293a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 01-1.414-1.414L7.586 10 5.293 7.707a1 1 0 010-1.414zM11 12a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/>
                                </svg>
                                Terminal - Laravel Lusophone Setup
                            </span>
                        </div>

                        {{-- Step 1: Installation --}}
                        <div class="mb-6">

                            <div class="bg-black/50 rounded-lg p-4 relative group">
                                <pre class="text-green-400 font-mono text-sm overflow-x-auto"><code><span class="text-gray-500">$</span> <span class="text-yellow-400">composer require</span> <span class="text-blue-400">arnaldotomo/laravel-lusophone</span></code></pre>
                                <button class="absolute top-2 right-2 opacity-0 group-hover:opacity-100 transition-opacity p-1.5 bg-gray-700 hover:bg-gray-600 rounded text-xs text-white"
                                        onclick="navigator.clipboard.writeText('composer require arnaldotomo/laravel-lusophone')">
                                    📋
                                </button>
                            </div>
                        </div>




                    </div>


                </div>
            </div>
        </div>

        {{-- Code demonstration section --}}
        <div class="mt-12 grid gap-6 md:grid-cols-2">
            {{-- Code side --}}
            <div class="bg-gray-900 rounded-2xl p-6 overflow-hidden">
                <div class="flex items-center gap-3 mb-4">
                    <div class="flex gap-1.5">
                        <div class="w-3 h-3 bg-red-500 rounded-full"></div>
                        <div class="w-3 h-3 bg-yellow-500 rounded-full"></div>
                        <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                    </div>
                    <span class="text-gray-400 text-sm font-mono">Laravel Lusophone - Detecção Automática</span>
                </div>
                <pre class="text-sm font-mono text-green-400 overflow-x-auto"><code><span class="text-purple-400">use</span> <span class="text-blue-400">ArnaldoTomo\LaravelLusophone\Facades\Lusophone</span>;

<span class="text-gray-500">// Forçar região específica (útil para testes)</span>
<span class="text-yellow-400">Lusophone::forceRegion</span>(<span class="text-red-400">'MZ'</span>);

<span class="text-gray-500">// Obter região detectada</span>
<span class="text-purple-400">$region</span> = <span class="text-yellow-400">Lusophone::detectRegion()</span>;
<span class="text-gray-500">// 'MZ', 'PT', 'AO', 'BR'</span>

<span class="text-gray-500">// Obter informações do país</span>
<span class="text-purple-400">$info</span> = <span class="text-yellow-400">Lusophone::getCountryInfo</span>(<span class="text-red-400">'MZ'</span>);

<span class="text-gray-500">// Limpar cache de detecção</span>
<span class="text-yellow-400">Lusophone::clearDetectionCache()</span>;</code></pre>
            </div>

            {{-- Result side --}}
            <div class="bg-gradient-to-br from-green-50 to-blue-50 dark:from-gray-800 dark:to-gray-900 rounded-2xl p-6">
                <h3 class="text-lg font-semibold mb-4 flex items-center gap-2">
                    <span class="text-2xl">🇲🇿</span>
                    Resultado para Moçambique
                </h3>
                <div class="bg-white dark:bg-gray-800 rounded-lg p-4 font-mono text-sm">
                    <div class="text-gray-600 dark:text-gray-400">Array (</div>
                    <div class="ml-4 space-y-1">
                        <div><span class="text-blue-600">'name'</span> => <span class="text-green-600">'Moçambique'</span>,</div>
                        <div><span class="text-blue-600">'currency'</span> => <span class="text-green-600">'MZN'</span>,</div>
                        <div><span class="text-blue-600">'currency_symbol'</span> => <span class="text-green-600">'MT'</span>,</div>
                        <div><span class="text-blue-600">'phone_prefix'</span> => <span class="text-green-600">'+258'</span>,</div>
                        <div><span class="text-blue-600">'formality'</span> => <span class="text-green-600">'mixed'</span></div>
                    </div>
                    <div class="text-gray-600 dark:text-gray-400">)</div>
                </div>

                {{-- Countries supported --}}
                <div class="mt-4 pt-4 border-t border-gray-200 dark:border-gray-700">
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-3">Países Suportados:</p>
                    <div class="flex flex-wrap gap-2">
                        <span class="inline-flex items-center gap-1 px-2 py-1 bg-white dark:bg-gray-700 rounded text-xs">
                            🇧🇷 Brasil
                        </span>
                        <span class="inline-flex items-center gap-1 px-2 py-1 bg-white dark:bg-gray-700 rounded text-xs">
                            🇵🇹 Portugal
                        </span>
                        <span class="inline-flex items-center gap-1 px-2 py-1 bg-green-100 dark:bg-green-900 rounded text-xs font-medium">
                            🇲🇿 Moçambique
                        </span>
                        <span class="inline-flex items-center gap-1 px-2 py-1 bg-white dark:bg-gray-700 rounded text-xs">
                            🇦🇴 Angola
                        </span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Stats section --}}
        <div class="mt-8 text-center">
            <div class="inline-flex items-center gap-6 px-6 py-4 bg-gradient-to-r from-green-100 to-blue-100 dark:from-green-900/30 dark:to-blue-900/30 rounded-2xl">
                <div class="text-center">
                    <div class="text-2xl font-bold text-green-600">260M+</div>
                    <div class="text-sm text-gray-600 dark:text-gray-400">Falantes</div>
                </div>
                <div class="w-px h-8 bg-gray-300 dark:bg-gray-600"></div>
                <div class="text-center">
                    <div class="text-2xl font-bold text-blue-600">8</div>
                    <div class="text-sm text-gray-600 dark:text-gray-400">Países</div>
                </div>
                <div class="w-px h-8 bg-gray-300 dark:bg-gray-600"></div>
                <div class="text-center">
                    <div class="text-2xl font-bold text-purple-600">🌍</div>
                    <div class="text-sm text-gray-600 dark:text-gray-400">Lusófono</div>
                </div>
            </div>
        </div>
    </section>

    {{-- Supported Countries --}}
    <section class="mx-auto mt-20 max-w-5xl px-5" aria-labelledby="countries-title">
        <h2 id="countries-title" class="text-center text-2xl font-medium capitalize"
            x-init="() => {
                motion.inView($el, (element) => {
                    motion.animate(
                        $el, {
                            opacity: [0, 1],
                            y: [-10, 0],
                        }, {
                            duration: 0.7,
                            ease: motion.circOut,
                        },
                    )
                })
            }">
            Países Lusófonos Suportados
        </h2>
        <div class="mt-8 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4"
             x-init="() => {
                motion.inView($el, (element) => {
                    motion.animate(
                        $refAll('country'), {
                            scale: [0, 1],
                            opacity: [0, 1],
                        }, {
                            duration: 0.7,
                            ease: motion.backOut,
                            delay: motion.stagger(0.1),
                        },
                    )
                })
             }">
            @foreach([
                ['flag' => '🇵🇹', 'name' => 'Portugal', 'currency' => 'EUR (€)', 'tax_id' => 'NIF'],
                ['flag' => '🇧🇷', 'name' => 'Brasil', 'currency' => 'BRL (R$)', 'tax_id' => 'CPF'],
                ['flag' => '🇲🇿', 'name' => 'Moçambique', 'currency' => 'MZN (MT)', 'tax_id' => 'NUIT'],
                ['flag' => '🇦🇴', 'name' => 'Angola', 'currency' => 'AOA (Kz)', 'tax_id' => 'NIF'],
                ['flag' => '🇨🇻', 'name' => 'Cabo Verde', 'currency' => 'CVE (Esc)', 'tax_id' => 'NIF'],
                ['flag' => '🇬🇼', 'name' => 'Guiné-Bissau', 'currency' => 'XOF (CFA)', 'tax_id' => 'NIF'],
                ['flag' => '🇸🇹', 'name' => 'São Tomé', 'currency' => 'STN (Db)', 'tax_id' => 'NIF'],
                ['flag' => '🇹🇱', 'name' => 'Timor-Leste', 'currency' => 'USD ($)', 'tax_id' => 'ID'],
            ] as $country)
                <div x-ref="country" class="rounded-xl bg-gray-100 p-4 dark:bg-gray-800"
                     aria-label="Informações sobre suporte para {{ $country['name'] }}">
                    <div class="flex items-center gap-2">
                        <span class="text-2xl">{{ $country['flag'] }}</span>
                        <h3 class="text-lg font-medium">{{ $country['name'] }}</h3>
                    </div>
                    <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                        <strong>Moeda:</strong> {{ $country['currency'] }}<br>
                        <strong>Validação:</strong> {{ $country['tax_id'] }}
                    </p>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Sponsors --}}
    <section class="mx-auto mt-20 max-w-5xl px-5" aria-labelledby="sponsors-title">
        <h2 id="sponsors-title" class="sr-only">
            Patrocinadores Laravel Lusophone
        </h2>
        <div class="divide-y divide-[#242A2E]/20 *:py-8">
            {{-- Community Contributors --}}
            <div class="flex flex-col items-center justify-between gap-x-10 gap-y-5 md:flex-row md:items-start"
                aria-labelledby="community-contributors-title">
                <h3 id="community-contributors-title" x-init="() => {
                    motion.inView($el, (element) => {
                        motion.animate(
                            $el, {
                                opacity: [0, 1],
                                x: [-10, 0],
                            }, {
                                duration: 0.7,
                                ease: motion.circOut,
                            },
                        )
                    })
                }"
                    class="shrink-0 text-xl font-medium opacity-0">
                    Contribuidores da Comunidade
                </h3>
                <div x-init="() => {
                    motion.inView($el, (element) => {
                        motion.animate(
                            $refAll('contributor'), {
                                scale: [0, 1],
                                opacity: [0, 1],
                            }, {
                                duration: 0.7,
                                ease: motion.backOut,
                                delay: motion.stagger(0.1),
                            },
                        )
                    })
                }"
                    class="flex grow flex-wrap items-center justify-center gap-5 md:justify-end"
                    aria-label="Contribuidores da comunidade do projeto Laravel Lusophone">
                    <a href="https://github.com/arnaldo-tomo" target="_blank" rel="noopener" x-ref="contributor" class="flex items-center gap-2 text-sm font-medium">
                        <img src="https://github.com/arnaldo-tomo.png" alt="Arnaldo Tomo" class="w-10 h-10 rounded-full" loading="lazy">
                        <span>Arnaldo Tomo</span>
                    </a>

                </div>
            </div>
            {{-- Corporate Sponsors --}}
            {{-- <div class="flex flex-col items-center justify-between gap-x-10 gap-y-5 md:flex-row md:items-start"
                aria-labelledby="corporate-sponsors-title">
                <h3 id="corporate-sponsors-title" x-init="() => {
                    motion.inView($el, (element) => {
                        motion.animate(
                            $el, {
                                opacity: [0, 1],
                                x: [-10, 0],
                            }, {
                                duration: 0.7,
                                ease: motion.circOut,
                            },
                        )
                    })
                }"
                    class="shrink-0 text-xl font-medium opacity-0">
                    Patrocinadores Corporativos
                </h3>
                <div x-init="() => {
                    motion.inView($el, (element) => {
                        motion.animate(
                            $refAll('sponsor'), {
                                scale: [0, 1],
                                opacity: [0, 1],
                            }, {
                                duration: 0.7,
                                ease: motion.backOut,
                                delay: motion.stagger(0.1),
                            },
                        )
                    })
                }"
                    class="flex grow flex-wrap items-center justify-center gap-5 md:justify-end"
                    aria-label="Patrocinadores corporativos do projeto Laravel Lusophone">
                    <a href="https://example.com" target="_blank" rel="noopener" x-ref="sponsor" class="flex items-center gap-2 text-sm font-medium">
                        <img src="{{ Vite::asset('resources/images/sponsor-logo-placeholder.png') }}" alt="Empresa X" class="w-10 h-10 rounded-full" loading="lazy">
                        <span>Empresa X</span>
                    </a>
                    <a href="https://example.com" target="_blank" rel="noopener" x-ref="sponsor" class="flex items-center gap-2 text-sm font-medium">
                        <img src="{{ Vite::asset('resources/images/sponsor-logo-placeholder.png') }}" alt="Empresa Y" class="w-10 h-10 rounded-full" loading="lazy">
                        <span>Empresa Y</span>
                    </a>
                </div>
            </div> --}}
        </div>
        <div x-init="() => {
            motion.inView(
                $el,
                (element) => {
                    motion.animate(
                        $el, {
                            opacity: [0, 1],
                            x: [-50, 0],
                        }, {
                            duration: 0.7,
                            ease: motion.circOut,
                        },
                    )
                }, {
                    amount: 0.5,
                },
            )
        }" class="opacity-0 will-change-transform">
            <a href="https://github.com/arnaldo-tomo/laravel-lusophone#contribuição"
                class="group dark:bg-mirage dark:hover:bg-haiti dark:hover:ring-cloud flex flex-wrap items-center justify-center gap-x-5 gap-y-3 rounded-3xl bg-gray-100 px-8 py-8 transition duration-200 ease-in-out hover:ring-1 hover:ring-black/60 md:justify-between md:px-12 md:py-10"
                aria-label="Saiba mais sobre como contribuir com o projeto Laravel Lusophone">
                <div class="inline-flex shrink-0 flex-col-reverse items-center gap-x-5 gap-y-3 md:flex-row">
                    <div class="space-y-2 text-2xl font-medium">
                        <span>Queres</span>
                        <span>contribuir</span>
                        <span>conosco?</span>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        class="w-12 -rotate-45 transition duration-300 ease-out will-change-transform group-hover:translate-x-0.5 group-hover:-translate-y-0.5 md:w-16 md:rotate-0"
                        aria-hidden="true">
                        <path class="text-blue-200 dark:text-blue-600/30" fill="currentColor"
                            d="M12 22c5.5228 0 10 -4.4772 10 -10 0 -5.52285 -4.4772 -10 -10 -10C6.47715 2 2 6.47715 2 12c0 5.5228 4.47715 10 10 10Z"
                            stroke-width="1"></path>
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            d="M14.499 2.49707h7v7" stroke-width="1"></path>
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            d="M21.499 2.49707 5.49902 18.4971" stroke-width="1"></path>
                    </svg>
                </div>
                <div class="text-center font-light opacity-50 md:max-w-xs md:text-left md:text-lg">
                    Junte-se à comunidade lusófona e contribua com código, traduções ou ideias para conectar 260M+ falantes de português.
                </div>
            </a>
        </div>
    </section>
</x-layout>

