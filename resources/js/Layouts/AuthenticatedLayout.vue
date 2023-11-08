<template>
    <div class="leading-normal tracking-normal" id="main-body">
        <div class="flex flex-wrap">

        <Sidebar />

        <div class="w-full main-bg pl-0 lg:pl-64 min-h-screen" :class="sideBarOpen ? 'overlay' : ''">

            <Navbar />

            <slot />
            <Footer />

        </div>
        </div>
    </div>
</template>

<script>
import { mapState } from 'vuex'

import Sidebar from '@/Components/Sidebar.vue'
import Navbar from '@/Components/Navbar.vue'
import Footer from '@/Components/Footer.vue'
import { inject, onMounted } from 'vue'

export default {
    computed: {
        ...mapState(['sideBarOpen'])
    },

    components: {
        Sidebar,
        Navbar,
        Footer
    },



}
</script>
