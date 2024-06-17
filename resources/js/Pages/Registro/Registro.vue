<script>
import DefaultLayout from "@/Layouts/DefaultLayout.vue";
import { router } from "@inertiajs/vue3";

export default {
    components: {
        DefaultLayout,
        router,
    },

    props: {
        errors: Object,
    },

    data() {
        return {
            formBackground: "../images/image_register.webp",

            form: {
                nombres: null,
                apPaterno: null,
                apMaterno: null,
            },
        };
    },

    methods: {
        submit() {
            router.post("/registro/crear", this.form, {
                onBefore: (visit) => {
                    let buttonRegistrar =
                        document.getElementById("buttonRegistrar");

                    buttonRegistrar.innerText = "Registrando...";
                },
            });
        },
    },
};
</script>

<template>
    <body>
        <DefaultLayout>
            <template #main>
                <div class="flex items-center m-auto">
                    <div class="hidden md:block">
                        <img
                            :src="formBackground"
                            alt="Imagen que representa el registro "
                            width="500px"
                            height="400px"
                        />
                    </div>
                    <form
                        action=""
                        class="w-full max-w-[400px] h-auto flex flex-col justify-center gap-6 rounded-lg p-10"
                    >
                        <h1
                            class="text-gray-900 text-2xl font-semibold text-center"
                        >
                            Formulario de registro
                        </h1>

                        <div class="flex flex-col gap-3 jutify-center">
                            <div>
                                <input
                                    :class="[
                                        errors.nombres
                                            ? 'border-red-700 text-red-700'
                                            : '',
                                    ]"
                                    class="w-full border-transparent focus:outline-0"
                                    type="text"
                                    placeholder="Nombres"
                                    v-model="form.nombres"
                                />
                                <ul class="m-auto" v-if="errors.nombres">
                                    <li
                                        class="text-red-700 font-semibold list-disc"
                                        v-if="errors.nombres"
                                    >
                                        {{ errors.nombres }}
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <input
                                    :class="[
                                        errors.apPaterno
                                            ? 'border-red-700 text-red-700'
                                            : '',
                                    ]"
                                    class="w-full border-transparent focus:outline-0"
                                    type="text"
                                    placeholder="Apellido Paterno"
                                    v-model="form.apPaterno"
                                />
                                <ul class="m-auto" v-if="errors.apPaterno">
                                    <li
                                        class="text-red-700 font-semibold list-disc"
                                        v-if="errors.apPaterno"
                                    >
                                        {{ errors.apPaterno }}
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <input
                                    :class="[
                                        errors.apMaterno
                                            ? 'border-red-700 text-red-700'
                                            : '',
                                    ]"
                                    class="w-full border-transparent focus:outline-0"
                                    type="text"
                                    placeholder="Apellido Materno"
                                    v-model="form.apMaterno"
                                />
                                <ul class="m-auto" v-if="errors.apMaterno">
                                    <li
                                        class="text-red-700 font-semibold list-disc"
                                        v-if="errors.apMaterno"
                                    >
                                        {{ errors.apMaterno }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <button
                            @click="submit"
                            type="button"
                            class="py-2 bg-gray-900 text-white rounded-lg"
                            id="buttonRegistrar"
                        >
                            Registrar
                        </button>
                    </form>
                </div>
            </template>
        </DefaultLayout>
    </body>
</template>
