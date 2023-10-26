<script setup>
import { Link } from '@inertiajs/vue3';
import { defineEmits } from 'vue';

const emit = defineEmits({});

const closePost = () => {
  emit('close');
}
</script>

<template>
  <div class="modal-div" @click="closePost">
    <div class="modal-body">
      <div class="modal-kankou">
        <Link class="link-style" :href="route('kankouPost')">
          <p>観光名所投稿</p>
          <img src="/storage/post-kankou.svg" style="width: 6rem; height: 7rem margin-bottom:1.3rem ;" alt="" />
        </Link>
      </div>
      <div class="modal-food">
        <Link class="link-style-2" :href="route('restranPost')">
          <p>飲食店投稿</p>
          <img src="/storage/post-food.svg" style="width: 6rem; height: 7rem margin-bottom:1.3rem" alt="" />
        </Link>
      </div>
    </div>
  </div>
</template>

<style scoped>
.modal-div {
  position: absolute;
  top: 16%;
  left: 13.4%;
  display: flex;
  justify-content: center;
  align-items: center;
  width: 70%;
  height: 50vh;
  background-color: #f9f5eb;
  border-radius: 20px;
  z-index: 1;
  /* visibility: hidden; */
}
.modal-body {
  display: flex;
  justify-content: space-around;
  align-items: center;
  width: 80%;
  height: 30vh;
  background-color: #f9f5eb;
}
.modal-kankou {
  width: auto;
  height: 30vh;
  display: flex;
  align-items: center;
  flex-direction: column;
  background-color: #e4dccf;
  border-radius: 20px;
}
.modal-kankou > img {
  margin: 15% 0 0 0;
}
.modal-food {
  width: 23%;
  height: 30vh;
  display: flex;
  align-items: center;
  flex-direction: column;
  background-color: #e4dccf;
  border-radius: 20px;
}
.modal-food > p {
  font-size: 1.8rem;
}
.modal-food > img {
  margin: 0% 0 0 15%;
}
.link-style {
  text-decoration: none;
  color: black;
}
.link-style > p {
  margin-top: 1.3rem;
  font-size: 1.8rem;
}
.link-style > img {
  position: relative;
  top: 10%;
  left: 20%;
}
.link-style-2 {
  text-decoration: none;
  color: black;
}
.link-style-2 > p {
  margin-top: 1.3rem;
  font-size: 1.8rem;
}
.link-style-2 > img {
  position: relative;
  left: 26%;
}
</style>
