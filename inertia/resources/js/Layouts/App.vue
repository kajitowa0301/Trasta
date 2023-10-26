<script setup>
import HeaderViewComponent from '@/Components/HeaderViewComponent.vue';
import ModelPost from '@/Components/ModelPost.vue';
import ModelSearch from '@/Components/ModelSearch.vue';
import { ref } from 'vue';

// データの定義
const isModalVisible = ref(false);
const isModalPostVisible = ref(false);

// メソッドの定義
const showModal = () => {
  isModalVisible.value = true;
};

const closeModal = () => {
  isModalVisible.value = false;
};

const showPost = () => {
  isModalPostVisible.value = true;
};

const closePost = () => {
  isModalPostVisible.value = false;
}
</script>

<template>
    <header>
        <HeaderViewComponent @show-modal="showModal" @show="showPost"></HeaderViewComponent>
        <ModelSearch v-if="isModalVisible" @close="closeModal"></ModelSearch>
        <ModelPost v-if="isModalPostVisible" @close="closePost"></ModelPost>
    </header>

</template>

<style>

</style>