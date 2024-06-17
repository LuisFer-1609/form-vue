<script>
import DefaultLayout from "@/Layouts/DefaultLayout.vue";

export default {
    components: {
        DefaultLayout,
    },

    data() {
        return {
            formCategorias: {
                categoria: null,
            },
        };
    },

    methods: {
        submitCategorias() {
            window.axios
                .post("/cascada/crearCategoria", {
                    data: this.formCategorias,
                })
                .then((response) => {
                    console.log(response.data.data);
                });
        },
    },
};
</script>

<template>
    <DefaultLayout>
        <template #main>
            <div
                class="w-full h-full grid grid-rows-3 grid-cols-2 gap-2 bg-gray-200 p-2"
            >
                <div class="bg-white rounded-xl">
                    <h1 class="text-center">Categorias</h1>
                    <div class="flex justify-between">
                        <form>
                            <div class="flex flex-col gap-3">
                                <input
                                    class="border-0 border-b-2 border-gray-200 focus:outline-0"
                                    type="text"
                                    placeholder="Categoría..."
                                    v-model="formCategorias.categoria"
                                />
                                <button
                                    @click="submitCategorias"
                                    type="button"
                                    class="py-2 bg-gray-900 text-white rounded-lg"
                                    id="buttonRegistrar"
                                >
                                    Registrar
                                </button>
                            </div>
                        </form>
                        <table class="border-separate border-spacing-x-4">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Categoría</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <div class="bg-white rounded-xl">
                    <h1 class="text-center">Escuderías</h1>
                    <div class="flex justify-between">
                        <form>
                            <div>
                                <input
                                    class="border-0 border-b-2 border-gray-200 focus:outline-0"
                                    type="text"
                                    placeholder="Categoría..."
                                />
                            </div>
                        </form>
                        <table class="border-separate border-spacing-x-4">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Categoría</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <div class="bg-white rounded-xl">
                    <h1 class="text-center">Motores</h1>
                    <div class="flex justify-between">
                        <form>
                            <div>
                                <input
                                    class="border-0 border-b-2 border-gray-200 focus:outline-0"
                                    type="text"
                                    placeholder="Categoría..."
                                />
                            </div>
                        </form>
                        <table class="border-separate border-spacing-x-4">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Categoría</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <div class="bg-white rounded-xl">
                    <h1 class="text-center">Pilotos</h1>
                    <div class="flex justify-between">
                        <form>
                            <div>
                                <input
                                    class="border-0 border-b-2 border-gray-200 focus:outline-0"
                                    type="text"
                                    placeholder="Categoría..."
                                />
                            </div>
                        </form>
                        <table class="border-separate border-spacing-x-4">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Categoría</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <div class="bg-white rounded-xl col-span-2">
                    <h1 class="text-center">Patrocinadores</h1>
                    <div class="flex justify-between">
                        <form>
                            <div>
                                <input
                                    class="border-0 border-b-2 border-gray-200 focus:outline-0"
                                    type="text"
                                    placeholder="Categoría..."
                                />
                            </div>
                        </form>
                        <table class="border-separate border-spacing-x-4">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Categoría</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </template>
    </DefaultLayout>
</template>

<style>
* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
</style>
