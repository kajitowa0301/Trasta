<script setup>
import { Link } from '@inertiajs/vue3';
import { defineEmits } from 'vue'

const emit = defineEmits({});
const closeModal = () => {
  emit('close');
};
</script>

<template>
     <div class="modal-div" @click="closeModal">
            <div class="modal-body" >
                <div class="modal-kankou">
                    <Link class="link-style" :href="route('kankouSearch')">
                     <p>観光名所検索</p>
                     <img src="/storage/search-kankou.svg" style="width: 5rem; height: 6rem; position: relative; top: 0%; margin-left: 1rem;" alt="">
                    </Link>
                </div>
                 <div class="modal-food" >
                  <Link class="link-style-2" :href="route('restranSearch')">
                     <p>飲食店検索</p>
                    <img src="/storage/search-food.svg" style="width: 5rem; height: 6rem;margin-left: 0.4rem;" alt="">
                  </Link>
                </div>
            </div>
        </div>
</template>

<style scoped>
.modal-div{
    position: absolute;
    top: 16%;
    left: 13.4%;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 70%;
    height:50vh;
    background-color:#F9F5EB;
    border-radius: 20px;
    z-index: 1;
    /* visibility: hidden; */
}
.modal-body{
    display: flex;
    justify-content: space-around;
    align-items: center;
    width: 80%;
    height: 30vh;
    background-color:#F9F5EB;
}
.modal-kankou{
    width: auto;
    height:30vh;
    display: flex;
    align-items: center;
    flex-direction: column;
    background-color: #E4DCCF;
    border-radius: 20px;
}
.modal-kankou > p{
    font-size: 1.5rem;
}
.modal-kankou > img{
    margin: 15% 0 0 0;
}
.modal-food{
    width: 23%;
    height:30vh;
    display: flex;
    align-items: center;
    flex-direction: column;
    background-color: #E4DCCF;
    border-radius: 20px;
}
.modal-food > p{
    font-size: 1.8rem;
}
.modal-food >img{
    margin:0% 0 0 15%;
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