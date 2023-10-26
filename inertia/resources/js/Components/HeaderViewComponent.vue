<script setup>
import { Link } from '@inertiajs/vue3';
import { computed, defineEmits,defineProps } from 'vue';
import { usePage } from '@inertiajs/vue3'
import ApplicationLogo from '@/Components/ApplicationLogo.vue';

const page = usePage();
const isLoggedIn = computed(() => page.props.auth.user); 

const emits = defineEmits(['show-modal', 'show']);

const openModal = () => {
  emits('show-modal');
};

const open = () => {
  emits('show');
};
</script>

<style scoped>
/* スタイルの定義 */
</style>

<template>
  <div class="header">
    <div class="title-logo"> 
      <span class="title"><Link class="top" :href="route('index')"><ApplicationLogo class="m-3"></ApplicationLogo></Link></span>
      <img src="/storage/plean_img.svg" class="logo" alt="飛行機のロゴ" />
    </div>
    <div class="header-button">
      <Link class="link-style" :href="route('TrastaProfile')">
        <img src="/storage/profile.svg" class="logo" alt="" />
      </Link>
      <img src="/storage/search.svg" @click="openModal" alt="" />
      <img src="/storage/square-plus.svg" @click="open" alt="" />
      <Link v-if="isLoggedIn" :href="route('logout')" method="post">
        <div class="login-div">
          <img src="/storage/login.svg" alt="" /><span>LogOut</span>
        </div>
      </Link>
      <Link v-else :href="route('login')">
        <div class="login-div">
          <img src="/storage/login.svg" alt="" /><span id="kari">Login</span>
        </div>
      </Link>
    </div>
  </div>
</template>


<style scoped>
.header {
  display: flex;
  justify-content: space-between;
  width: 100%;
  height: 15vh;
  background-color: #e4dccf;
}
.top{
  color: #002b5b;
  text-decoration:none;
}
.title-logo {
  display: flex;
  justify-content: flex-start;
  align-items: center;
  width: 20vw;
  height: 15vh;
}
.title {
  font-size: 2rem;
  color: #002b5b;
  margin-left: 1rem;
}
.logo {
  width: 50px;
  height: 50px;
}
.header-button {
  display: flex;
  justify-content: flex-end;
  align-items: center;
  width: 60vw;
  height: 15vh;
}
.header-button > img {
  width: 50px;
  height: 50px;
  margin: 0 1rem;
}
.header-button > a {
  text-decoration: none;
}
.header-button > .logo:hover {
  transition: all 0.7s linear;
  transform: scale(1.4);
}
.header-button > img:nth-child(2):hover {
  transition: all 0.7s linear;
  transform: scale(1.4);
}
.header-button > img:nth-child(3):hover {
  transition: all 0.7s linear;
  transform: scale(1.4);
}
.login-div {
  display: flex;
  align-items: center;
  border-radius: 20px;
}
.login-div:hover {
  transition: all 0.7s linear;
  transform: scale(1.2);
  animation: back-color 5s linear infinite;
}
.login-div > img {
  width: 50px;
  height: 50px;
  margin: 0 0 0 1rem;
}
.login-div > span {
  font-size: 2rem;
  color: #002b5b;
  margin-right: 20px;
}
.link-style{
  width: 50px;
  height: 50px;
  margin: 0 1rem;
  text-decoration: none;
  color: #002b5b;
}
.link-style:hover{
  transition: all 0.7s linear;
  transform: scale(1.4);
}
</style>
