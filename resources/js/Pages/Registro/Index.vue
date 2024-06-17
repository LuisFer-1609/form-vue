<script>
import DefaultLayout from "@/Layouts/DefaultLayout.vue";

export default {
    components: {
        DefaultLayout,
    },
};
</script>

<template>
    <DefaultLayout>
        <template #main>
            <span class="m-auto text-2xl text-gray-400"> Bienvenido </span>
        </template>
    </DefaultLayout>
</template>
