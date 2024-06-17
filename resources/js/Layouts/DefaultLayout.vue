<script>
import Navbar from "@/Components/Navbar.vue";
import LogoSvg from "@/Components/LogoSvg.vue";
import ArrowDownNavbar from "@/Components/ArrowDownNavbar.vue";
import { Link } from "@inertiajs/vue3";

export default {
    components: {
        Navbar,
        Link,
        LogoSvg,
        ArrowDownNavbar,
    },
};
</script>

<template>
    <div class="h-[100vh] flex flex-col">
        <Navbar
            class="w-full h-[40px] items-center bg-gray-900 text-white text-[15px]"
        >
            <template #header>
                <nav class="max-w-[1400px] w-[90%] m-auto flex gap-7">
                    <div class="h-[40px]">
                        <LogoSvg class="h-full" />
                    </div>
                    <div class="flex gap-3">
                        <Link
                            href="/"
                            class="h-full flex items-center hover:bg-white/40 px-3 transition duration-300 ease-out"
                            >Inicio</Link
                        >
                        <span
                            class="h-full relative flex items-center gap-2 hover:bg-white/40 cursor-pointer px-3 nav-personas transition duration-300 ease-out"
                        >
                            Personas
                            <ArrowDownNavbar class="rotate-hover" />
                            <div
                                class="absolute w-full h-0 left-0 top-[100%] flex flex-col bg-gray-900 options-person-nav rounded-b-lg overflow-hidden"
                            >
                                <Link
                                    class="p-3 text-center hover:bg-white/40 transition duration-300 ease-out"
                                    href="/registro/index"
                                >
                                    Registrar
                                </Link>
                                <Link
                                    class="p-3 text-center hover:bg-white/40 transition duration-300 ease-out"
                                    href="/registro/visualizacion"
                                >
                                    Visualizar
                                </Link>
                            </div>
                        </span>
                        <span
                            class="h-full relative flex items-center gap-2 hover:bg-white/40 cursor-pointer px-3 nav-personas transition duration-300 ease-out"
                        >
                            Cascada
                            <ArrowDownNavbar class="rotate-hover" />
                            <div
                                class="absolute w-full h-0 left-0 top-[100%] flex flex-col bg-gray-900 options-person-nav rounded-b-lg overflow-hidden"
                            >
                                <Link
                                    class="p-3 text-center hover:bg-white/40 transition duration-300 ease-out"
                                    href="/cascada/index"
                                >
                                    Categoría
                                </Link>
                            </div>
                        </span>
                    </div>
                </nav>
            </template>
        </Navbar>
        <main class="flex flex-1">
            <slot name="main" />
        </main>
    </div>
</template>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.rotate-hover {
    transition: rotate 0.15s ease-out;
}

.nav-personas:hover .rotate-hover {
    rotate: 180deg;
}

.options-person-nav {
    transition: height 0.3s ease-out;
}

.nav-personas:hover .options-person-nav {
    height: 93px;
}
</style>
