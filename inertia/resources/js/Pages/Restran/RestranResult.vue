<script setup>
import App from '@/Layouts/App.vue';
import { Head, Link,usePage } from '@inertiajs/vue3';

const {restran} = usePage().props;
console.log(restran.length);
const ArrayNull = restran.length;
</script>

<template>
    <Head title="restranList"></Head>
    <App></App>
   
    <nav>
        <ol class="breadcrumb">
            <li class="list"><Link class="list-text" :href="route('index')">Home</Link></li>>
            <li class="list">飲食店一覧</li>
        </ol>
    </nav>
    <div v-if="ArrayNull === 0" class=" font-semibold text-red-600 text-2xl">投稿が見つかりません</div>
    <div id="card">
    <div class="container-plan">
      <div class="flex flex-wrap">
        <div class="card-ele" v-for="post in restran" :key="post.posts_id">
          <Link class="underline" :href="route('restranDetail',{post:post.posts_id})">
            <img :src="'/storage/'+ post.src" class="img-top w-full h-auto object-cover" />
            <div class="text-body bg-white p-5">
              <p class="text-xl  mb-9">{{ post.title }}</p>
              <p class="text-2xl text-gray-800 mb-5">#{{ post.prefectures.prefectures_name }}</p>
              <p class="text-xl text-gray-800">#{{ post.category.category_name }}</p>
              <p class="text-right font-medium text-xl text-gray-800 mr-20">user:{{ post.user.name }}</p>
            </div>
          </Link>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
.breadcrumb {
  margin-top: 2%;
  display: flex;
  flex-wrap: wrap;
  font-size: 1.5em;
  text-decoration: none;
}

.list {
  margin: 0 1%;
  padding: 0 1.5%;
  background-color: #e4dccf;
  text-decoration: none;
  border-radius: 10px;
  list-style: none;
}
.after_add{
    text-decoration: none;
    color: black;
}
.underline{
  text-decoration: none;
  color: black;
}
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }
  body{
    overflow-x:hidden ;
  }
  #card {
    margin-left: 20px;
    padding: 0;
    width: 100%;
    display: flex;
    overflow-x:none;
  }
  .card-ele {
  width: 18%; /* 幅を狭める */
  height: auto; /* 高さを可変にする */
  margin: 1.3rem 0.6rem;
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
    height: 40vh;
    object-fit: cover;
    object-position: 30% 0%;
    border-radius: 10px 10px 0 0;
  }
  .text-body {
    height: 20vh;
    background-color: #f9f5eb;
    border-radius: 0 0 10px 10px;
  }
  .text_style {
    margin: 3rem 2rem 0 2rem;
    text-decoration: none;
    color: #002b5b;
  }
  /* カードのスタイル */
  .link-style{
      text-decoration: none;
      color: #002b5b;
      font-size:2.5rem;
  }
  /* ↑↑RouteLinkのスタイル */
  .modal-div-post{
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
    visibility: hidden;
  }
  .modal-div-post.post-active{
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
    visibility: inherit;
  }
  .modal-body-post{
    display: flex;
    justify-content: space-around;
    align-items: center;
    width: 80%;
    height: 30vh;
    background-color:#F9F5EB;
  }
  .modal-kankou-post{
    width: 23%;
    height:30vh;
    display: flex;
    align-items: center;
    flex-direction: column;
    background-color: #E4DCCF;
    border-radius: 20px;
  }
  .modal-kankou-post > p{
    font-size: 1.5rem;
  }
  .modal-kankou-post > img{
    margin: 15% 0 0 0;
  }
  .modal-food-post{
    width: 23%;
    height:30vh;
    display: flex;
    align-items: center;
    flex-direction: column;
    background-color: #E4DCCF;
    border-radius: 20px;
  }
  .modal-food-post > p{
    font-size: 1.8rem;
  }
  .modal-food-post >img{
    margin:0% 0 0 15%;
  }
</style>
