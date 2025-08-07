<footer
    class="mx-auto max-w-5xl px-5 pb-5 pt-20 xl:max-w-7xl 2xl:max-w-360"
    aria-labelledby="footer-heading"
>
    <h2
        id="footer-heading"
        class="sr-only"
    >
        Footer
    </h2>
    <div
        class="flex flex-col flex-wrap items-center gap-x-6 gap-y-4 md:flex-row md:justify-between"
    >
        {{-- Left side --}}
        <div class="flex flex-col items-center gap-6 md:items-start">
            {{-- Logo --}}
            <div
                x-init="
                    () => {
                        motion.inView($el, (element) => {
                            motion.animate(
                                $el,
                                {
                                    opacity: [0, 1],
                                    x: [-10, 0],
                                },
                                {
                                    duration: 0.7,
                                    ease: motion.circOut,
                                },
                            )
                        })
                    }
                "
                class="opacity-0"
            >
                <a
                    href="/"
                    class="transition duration-200 will-change-transform hover:scale-[1.02]"
                    aria-label="Laravel Lusophone homepage"
                >
                    <x-logo
                        class="h-6"
                        aria-hidden="true"
                        alt="Laravel Lusophone Logo"
                    />
                    <span class="sr-only">Laravel Lusophone homepage</span>
                </a>
            </div>
            {{-- Arnaldo's Social links --}}
            <nav
                x-init="
                    () => {
                        motion.inView($el, (element) => {
                            motion.animate(
                                Array.from($el.children),
                                {
                                    y: [10, 0],
                                    opacity: [0, 1],
                                },
                                {
                                    duration: 0.7,
                                    ease: motion.backOut,
                                    delay: motion.stagger(0.1),
                                },
                            )
                        })
                    }
                "
                class="flex flex-wrap items-center justify-center gap-2.5 *:opacity-0"
                aria-label="Arnaldo Tomo - Redes Sociais"
            >
                {{-- GitHub --}}
                <a
                    href="https://github.com/arnaldo-tomo"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="flex size-10 items-center justify-center rounded-full bg-gray-100 text-gray-600 transition duration-200 hover:bg-gray-200 hover:text-gray-900 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-200"
                    aria-label="GitHub do Arnaldo Tomo"
                >
                    <svg class="size-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                    </svg>
                </a>

                {{-- LinkedIn --}}
                <a
                    href="https://linkedin.com/in/arnaldo-tomo"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="flex size-10 items-center justify-center rounded-full bg-gray-100 text-gray-600 transition duration-200 hover:bg-gray-200 hover:text-gray-900 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-200"
                    aria-label="LinkedIn do Arnaldo Tomo"
                >
                    <svg class="size-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                    </svg>
                </a>

                {{-- Twitter/X --}}
                <a
                    href="https://twitter.com/Arnaldo_j_tomo"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="flex size-10 items-center justify-center rounded-full bg-gray-100 text-gray-600 transition duration-200 hover:bg-gray-200 hover:text-gray-900 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-200"
                    aria-label="Twitter do Arnaldo Tomo"
                >
                    <svg class="size-4" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                    </svg>
                </a>

                {{-- Website --}}
                <a
                    href="http://arnaldotomo.dev"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="flex size-10 items-center justify-center rounded-full bg-gray-100 text-gray-600 transition duration-200 hover:bg-gray-200 hover:text-gray-900 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-200"
                    aria-label="Website do Arnaldo Tomo"
                >
                    <svg class="size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s1.343-9 3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/>
                    </svg>
                </a>
            </nav>
        </div>

        {{-- Newsletter --}}
        <div
            x-init="
                () => {
                    motion.inView($el, (element) => {
                        motion.animate(
                            $el,
                            {
                                opacity: [0, 1],
                                x: [10, 0],
                            },
                            {
                                duration: 0.7,
                                ease: motion.circOut,
                            },
                        )
                    })
                }
            "
        >
            <a
                href="#/"
                class="group relative z-0 flex items-center gap-6 overflow-hidden rounded-2xl bg-cyan-50/50 py-5 pl-6 pr-7 ring-1 ring-black/5 transition duration-300 ease-in-out hover:bg-cyan-50 hover:ring-black/10 md:max-w-lg dark:bg-mirage dark:hover:bg-haiti dark:hover:ring-cloud"
            >
                {{-- Decorative circle --}}
                <div
                    class="absolute left-3 top-1/2 -z-10 size-16 -translate-y-1/2 rounded-full bg-cyan-400/60 blur-2xl dark:block"
                    aria-hidden="true"
                ></div>

                {{-- Content --}}
                <div class="flex items-center gap-5 text-sm">
                    <div class="flex flex-col items-center gap-2">
                        {{-- Icon --}}
                        <x-icons.email-document class="size-7 shrink-0" />

                        {{-- Title --}}
                        <h2
                            class="transition duration-300 will-change-transform group-hover:scale-105"
                        >
                            Newsletter
                        </h2>
                    </div>

                    {{-- Message --}}
                    <p
                        class="leading-relaxed opacity-50 transition duration-300 will-change-transform group-hover:translate-x-0.5"
                    >
                        Receba as últimas atualizações do  Lusophone
                    </p>
                </div>

                {{-- Right arrow --}}
                <x-icons.right-arrow
                    x-init="
                        () => {
                            motion.animate(
                                $el,
                                {
                                    x: [0, 10],
                                },
                                {
                                    repeat: Infinity,
                                    repeatType: 'reverse',
                                    type: 'spring',
                                    stiffness: 100,
                                    damping: 20
                                },
                            )
                        }
                    "
                    class="size-4 shrink-0"
                />
            </a>
        </div>
    </div>

    {{-- Divider --}}
    <div
        class="flex items-center pb-3 pt-3"
        aria-hidden="true"
    >
        <div class="size-1.5 rotate-45 bg-gray-200/90 dark:bg-[#242734]"></div>
        <div class="h-0.5 w-full bg-gray-200/90 dark:bg-[#242734]"></div>
        <div class="size-1.5 rotate-45 bg-gray-200/90 dark:bg-[#242734]"></div>
    </div>

    {{-- Copyright --}}
    <section
        class="flex flex-col flex-wrap items-center gap-x-5 gap-y-3 text-center text-sm text-gray-500 md:flex-row md:justify-between md:text-left dark:text-gray-400/80"
        aria-label="Créditos e informações de copyright"
    >
        <div
            x-init="
                () => {
                    motion.inView($el, (element) => {
                        motion.animate(
                            $el,
                            {
                                opacity: [0, 1],
                                x: [-10, 0],
                            },
                            {
                                duration: 0.7,
                                ease: motion.circOut,
                            },
                        )
                    })
                }
            "
            class="flex flex-col flex-wrap items-center gap-2 opacity-0 md:flex-row"
        >
            <div class="flex gap-1">
                <div>Website desenvolvido por</div>
                <a
                    href="https://github.com/arnaldo-tomo"
                    target="_blank"
                    class="group relative font-medium text-black/80 transition duration-200 hover:text-black dark:text-white/80 dark:hover:text-white"
                    aria-label="GitHub do Arnaldo Tomo"
                >
                    Arnaldo Tomo
                    <div
                        class="absolute -bottom-0.5 left-0 h-px w-full origin-right scale-x-0 bg-current transition duration-300 ease-out will-change-transform group-hover:origin-left group-hover:scale-x-100"
                    ></div>
                </a>
            </div>
            <div
                class="hidden h-3 w-0.5 bg-gray-300 md:block dark:bg-[#242734]"
            ></div>
            <div class="flex gap-1">
                <div>Laravel Lusophone por</div>
                <a
                    href="http://arnaldotomo.dev"
                    target="_blank"
                    class="group relative font-medium text-black/80 transition duration-200 hover:text-black dark:text-white/80 dark:hover:text-white"
                    aria-label="Website do Arnaldo Tomo"
                    rel="noopener noreferrer"
                >
                    Arnaldo Tomo
                    <div
                        class="absolute -bottom-0.5 left-0 h-px w-full origin-right scale-x-0 bg-current transition duration-300 ease-out will-change-transform group-hover:origin-left group-hover:scale-x-100"
                    ></div>
                </a>
            </div>
        </div>
        <div
            x-init="
                () => {
                    motion.inView($el, (element) => {
                        motion.animate(
                            $el,
                            {
                                opacity: [0, 1],
                                x: [10, 0],
                            },
                            {
                                duration: 0.7,
                                ease: motion.circOut,
                            },
                        )
                    })
                }
            "
            class="opacity-0"
        >
            <span>© {{ date('Y') }} Laravel Lusophone - Arnaldo Tomo</span>
        </div>
    </section>
</footer>
