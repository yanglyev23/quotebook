<template>
    <header>
        <div id="container_header">
            <button class="button" @click="showModal">Добавить цитату</button>
        </div>
        <modal
            v-show="isModalVisible"
            @close="closeModal"
        />
    </header>

</template>

<script>
import Modal from '../components/Modal.vue'

export default {
    name: "Header",
    components: {
        Modal
    },
    data () {
        return {
            isModalVisible: false,
        };
    },
    methods: {
        showModal() {
            this.isModalVisible = true;
        },
        closeModal() {
            this.isModalVisible = false;
        }
    },
}
</script>

<style scoped>

</style>
