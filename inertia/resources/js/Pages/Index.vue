<script setup>
import App from '@/Layouts/App.vue';
import { Head, Link, usePage } from '@inertiajs/vue3';

const { posts } = usePage().props;
const { restran } = usePage().props;
// console.log(restran);
</script>
<template >
  <Head title="Top"></Head>
  <App></App>
  <div class="img-div">
    <img src="/storage/backgroundimg.png" class="backimg" alt="" />
  </div>
  <div class="post-select">
    <div class="kankou-div">
        <Link class=" no-underline" :href="route('kankouPost')">
        <img src="/storage/post-kankou.svg" class="img-position" alt="" /><span class="post-font">観光名所の投稿</span>
        </Link>
    </div>
    <div class="food-div">
      <Link class=" no-underline" :href="route('restranPost')">
      <img src="/storage/post-food.svg" class="img-position-2" alt="" /><span class="post-font">飲食店の投稿</span>
      </Link>
    </div>
  </div>

  <div id="card">
    <h1 class="favorite-font">
      <Link class=" text-Indigo-color no-underline text-4xl font-semibold hover:text-blue-600"
        :href="route('kankouList')">最新の観光地投稿</Link>
    </h1>
    <div class="container-plan" id="tourist">
      <div class="container-plan" v-for="post in posts" :key="post.posts_id">
        <div class="card-ele" style="width: 100%">
          <Link class="underline" :href="route('kankouDetail', { post: post.posts_id })">
          <img id="aaa" :src="'/storage/' + post.src" class="img-top" alt="投稿された画像" />
          <div class="text-body">
            <p class=" text-2xl mb-9">{{ post.title }}</p>
            <p class=" text-xxl text-Indigo-color">#{{ post.prefectures.prefectures_name }}</p>
            <p class=" text-xl text-Indigo-color">#{{ post.category.category_name }}</p>
            <p class=" text-right font-medium text-xl text-Indigo-color mr-20 mb-20">user:{{ post.user.name }}</p>
          </div>
          </Link>
        </div>
      </div>
    </div>
    <h1 class="favorite-font">
      <Link class=" text-Indigo-color no-underline text-4xl font-semibold hover:text-blue-600"
        :href="route('restranList')">最新の飲食店投稿</Link>
    </h1>
    <div class="container-plan" id="restran">
      <div class="container-plan" v-for="post in restran" :key="post.posts_id">
        <div class="card-ele" style="width: 100%">
          <Link class="underline" :href="route('restranDetail', { post: post.posts_id })">
          <img id="aaa" :src="'/storage/' + post.src" class="img-top" alt="投稿された画像" />
          <div class="text-body">
            <p class=" text-2xl mb-9">title:{{ post.title }}</p>
            <p class=" text-xl text-Indigo-color">#{{ post.prefectures.prefectures_name }}</p>
            <p class=" text-xl text-Indigo-color">#{{ post.category.category_name }}</p>
            <p class=" text-right font-medium text-xl text-Indigo-color mr-20">user:{{ post.user.name }}</p>
          </div>
          </Link>
        </div>
      </div>
    </div>
  </div>
</template>
<style scoped>
.img-position {
  position: relative;
  top: 30%;
  left: -30%;
}

.img-position-2 {
  position: relative;
  top: 20%;
  left: -30%;
}

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  overflow-x: hidden;
}

.img-div {
  position: relative;
  width: 100%;
  height: 300px;
  margin: 0;
  padding: 0;
}

.img-div>img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

/* ↑↑大きい画像の部分 */
.post-select {
  display: flex;
  justify-content: space-evenly;
  align-items: center;
  width: 100%;
  height: 25vh;
  background-color: #e4dccf;
}

.kankou-div {
  width: calc(100% / 2);
  display: flex;
  justify-content: center;
}

.kankou-div>img {
  position: relative;
  left: 0px;
}

.food-div {
  width: calc(100% / 2);
  display: flex;
  justify-content: center;
  border-left: 2px solid black;
}

.food-div>img {
  position: relative;
  top: -15px;
  left: -20px;
}

.post-font {
  position: relative;
  top: -20%;
  font-size: 2.5rem;
  color: #002b5b;
  text-decoration: none;
}

/* ↑↑投稿選択の部分 */
.favorite-font {
  margin: 3rem 2rem 0 2rem;
  color: #002b5b;
}

#card {
  margin-bottom: 1.2rem;
  padding: 0 10px;
  width: 100%;
}

.container-plan {
  display: flex;
  width: 100%;
  height: 60vh;
  margin: 1rem 0 0 0;
}

.card-ele {
  width: 100%;
  height: auto;
  margin: 0 10px;
  display: -webkit-box;
  -webkit-box-orient: vertical;
  -webkit-line-clamp: 5;
  overflow: hidden;
  background-color: #f9f5eb;
  border-radius: 10px 10px 0 0;
}

.card-ele:hover {
  transition: all 0.2s linear;
  transform: translateY(-10px);
  transform: translateX(-2px);
  box-shadow: 4px 4px 10px #666;
}

.img-top {
  width: 100%;
  height: 35vh;
  object-fit: cover;
  object-position: 30% 0%;
  border-radius: 10px 10px 0 0;
}

.text-body {
  height: auto;
  background-color: #f9f5eb;
  border-radius: 0 0 10px 10px;
}

.text_style {
  margin: 3rem 2rem 0 2rem;
  text-decoration: none;
  color: hsl(212, 100%, 18%);
}

/* カードのスタイル */
.link-style {
  text-decoration: none;
  color: #002b5b;
  font-size: 2.5rem;
}

/* ↑↑RouteLinkのスタイル */
.modal-div-post {
  position: absolute;
  top: 16%;
  left: 13.4%;
  display: flex;
  justify-content: center;
  align-items: center;
  width: 70%;
  height: 50vh;
  background-color: #F9F5EB;
  border-radius: 20px;
  z-index: 1;
  visibility: hidden;
}

.modal-div-post.post-active {
  position: absolute;
  top: 16%;
  left: 13.4%;
  display: flex;
  justify-content: center;
  align-items: center;
  width: 70%;
  height: 50vh;
  background-color: #F9F5EB;
  border-radius: 20px;
  z-index: 1;
  visibility: inherit;
}

.modal-body-post {
  display: flex;
  justify-content: space-around;
  align-items: center;
  width: 80%;
  height: 30vh;
  background-color: #F9F5EB;
}

.modal-kankou-post {
  width: 23%;
  height: 30vh;
  display: flex;
  align-items: center;
  flex-direction: column;
  background-color: #E4DCCF;
  border-radius: 20px;
}

.modal-kankou-post>p {
  font-size: 1.5rem;
}

.modal-kankou-post>img {
  margin: 15% 0 0 0;
}

.modal-food-post {
  width: 23%;
  height: 30vh;
  display: flex;
  align-items: center;
  flex-direction: column;
  background-color: #E4DCCF;
  border-radius: 20px;
}

.modal-food-post>p {
  font-size: 1.8rem;
}

.modal-food-post>img {
  margin: 0% 0 0 15%;
}

.underline {
  text-decoration: none;
}

/* ↑↑モーダルのスタイル */
</style>