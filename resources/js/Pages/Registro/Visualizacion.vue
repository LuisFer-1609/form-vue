<script>
import DefaultLayout from "@/Layouts/DefaultLayout.vue";
import xMarkSvg from "@/Components/xMarkSvg.vue";
import { Link } from "@inertiajs/vue3";
import { router } from "@inertiajs/vue3";

export default {
    components: {
        DefaultLayout,
        router,
        xMarkSvg,
        Link,
    },

    props: {
        registros: Object,
        errors: Object,
    },

    data() {
        return {
            formEdit: {
                idEditar: null,
                nombresEditar: null,
                apPaternoEditar: null,
                apMaternoEditar: null,
            },

            showSuccess: true,

            showModal: false,
        };
    },

    watch: {
        "$page.props.flash.message"(newValue) {
            if (newValue && this.showSuccess) {
                this.ocultarFlash();
            }
        },
    },

    methods: {
        ocultarFlash() {
            this.showSuccess = true;
            setTimeout(() => {
                this.showSuccess = false;
            }, 2000);
        },

        eliminar(id) {
            router.delete("eliminar/" + id);
        },

        editar() {
            router.put("editar", this.formEdit, {
                onSuccess: (page) => {
                    this.showModal = false;
                },
            });
        },

        hiddenModal() {
            this.showModal = false;
        },

        showModalEdit(persona) {
            this.showModal = true;
            this.formEdit.idEditar = btoa(persona.id);
            this.formEdit.nombresEditar = persona.nombres;
            this.formEdit.apPaternoEditar = persona.apPaterno;
            this.formEdit.apMaternoEditar = persona.apMaterno;
        },
    },
};
</script>

<template>
    <DefaultLayout>
        <template #main>
            <div
                v-if="$page.props.flash.message && showSuccess"
                class="h-auto w-auto absolute bottom-[50px] left-[50%] translate-x-[-50%] text-gray-500 font-bold px-4 py-2 bg-green-300 border-2 border-green-500 rounded-lg select-none"
            >
                {{ $page.props.flash.message }}
            </div>

            <div class="max-h-[400px] pt-1 overflow-auto m-auto">
                <Link
                    href="/registro/index"
                    class="px-3 py-1 bg-gray-900 text-white font-semibold rounded-lg"
                    >Registrar persona</Link
                >
                <table class="border-separate border-spacing-7">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombres</th>
                            <th>Apellido paterno</th>
                            <th>Apellido materno</th>
                            <th>Fecha de creación</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="tbodyResultSearch">
                        <tr v-for="registro in registros">
                            <td class="text-center">{{ registro.id }}</td>
                            <td class="text-center">{{ registro.nombres }}</td>
                            <td class="text-center">
                                {{ registro.apPaterno }}
                            </td>
                            <td class="text-center">
                                {{ registro.apMaterno }}
                            </td>
                            <td class="text-center">
                                {{ registro.created_at }}
                            </td>
                            <td :title="'Borrar registro: ' + registro.id">
                                <form>
                                    <button
                                        @click="eliminar(registro.id)"
                                        type="button"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="24"
                                            height="24"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="1"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-trash hover:text-red-700 cursor-pointer select-none"
                                        >
                                            <path
                                                stroke="none"
                                                d="M0 0h24v24H0z"
                                                fill="none"
                                            />
                                            <path d="M4 7l16 0" />
                                            <path d="M10 11l0 6" />
                                            <path d="M14 11l0 6" />
                                            <path
                                                d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"
                                            />
                                            <path
                                                d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"
                                            />
                                        </svg>
                                    </button>
                                </form>
                            </td>
                            <td
                                :title="'Editar registro: ' + registro.id"
                                id="editarRegistros"
                            >
                                <label
                                    @click="showModalEdit(registro)"
                                    for="closeModalEdit"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="24"
                                        height="24"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="1"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-edit-circle hover:text-blue-700 cursor-pointer select-none"
                                    >
                                        <path
                                            stroke="none"
                                            d="M0 0h24v24H0z"
                                            fill="none"
                                        />
                                        <path
                                            d="M12 15l8.385 -8.415a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3z"
                                        />
                                        <path d="M16 5l3 3" />
                                        <path
                                            d="M9 7.07a7 7 0 0 0 1 13.93a7 7 0 0 0 6.929 -6"
                                        />
                                    </svg>
                                </label>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div
                v-if="showModal"
                class="absolute top-0 left-0 w-full h-full bg-black/40 content-center"
            >
                <label
                    @click="hiddenModal"
                    class="absolute top-0 left-0 w-full h-full"
                >
                    <xMarkSvg class="" />
                </label>
                <div class="w-[400px] relative m-auto bg-white rounded-lg">
                    <label @click="hiddenModal" class="select-none">
                        <xMarkSvg
                            class="absolute top-[10px] right-[10px] text-gray-600 hover:text-gray-900 hover:scale-[1.2] cursor-pointer"
                        />
                    </label>
                    <form
                        action=""
                        class="w-full max-w-[400px] h-auto flex flex-col justify-center gap-6 rounded-lg p-10"
                    >
                        <h1
                            class="text-gray-900 text-2xl font-semibold text-center"
                        >
                            Editar
                        </h1>

                        <div class="flex flex-col gap-5 jutify-center">
                            <div>
                                <input
                                    class="hidden border-transparent focus:outline-0"
                                    type="text"
                                    placeholder="id"
                                    v-model="formEdit.idEditar"
                                    id="formEditId"
                                />
                            </div>
                            <div>
                                <input
                                    :class="[
                                        errors.nombresEditar
                                            ? 'border-red-700 text-red-700'
                                            : '',
                                    ]"
                                    class="w-full border-transparent focus:outline-0"
                                    type="text"
                                    placeholder="Nombres"
                                    v-model="formEdit.nombresEditar"
                                    id="formEditNombres"
                                />
                                <ul class="m-auto" v-if="errors.nombresEditar">
                                    <li
                                        class="text-red-700 font-semibold list-disc"
                                        v-if="errors.nombresEditar"
                                    >
                                        {{ errors.nombresEditar }}
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <input
                                    :class="[
                                        errors.apPaternoEditar
                                            ? 'border-red-700 text-red-700'
                                            : '',
                                    ]"
                                    class="w-full border-transparent focus:outline-0"
                                    type="text"
                                    placeholder="Apellido Paterno"
                                    v-model="formEdit.apPaternoEditar"
                                    id="formEditApPaterno"
                                />
                                <ul
                                    class="m-auto"
                                    v-if="errors.apPaternoEditar"
                                >
                                    <li
                                        class="text-red-700 font-semibold list-disc"
                                        v-if="errors.apPaternoEditar"
                                    >
                                        {{ errors.apPaternoEditar }}
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <input
                                    :class="[
                                        errors.apMaternoEditar
                                            ? 'border-red-700 text-red-700'
                                            : '',
                                    ]"
                                    class="w-full border-transparent focus:outline-0"
                                    type="text"
                                    placeholder="Apellido Materno"
                                    v-model="formEdit.apMaternoEditar"
                                    id="formEditApMaterno"
                                />
                                <ul
                                    class="m-auto"
                                    v-if="errors.apMaternoEditar"
                                >
                                    <li
                                        class="text-red-700 font-semibold list-disc"
                                        v-if="errors.apMaternoEditar"
                                    >
                                        {{ errors.apMaternoEditar }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <button
                            @click="editar()"
                            type="button"
                            class="py-2 bg-gray-900 text-white rounded-lg"
                            id="buttonRegistrar"
                        >
                            Editar
                        </button>
                    </form>
                </div>
            </div>
        </template>
    </DefaultLayout>
</template>

<style>
#closeModalEdit:checked ~ #showModal {
    display: block;
}
</style>
