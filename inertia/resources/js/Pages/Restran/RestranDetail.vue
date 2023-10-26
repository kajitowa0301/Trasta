<script setup>
import App from '@/Layouts/App.vue';
import { Head, Link,usePage } from '@inertiajs/vue3';

const {restran} = usePage().props;
</script>

<template>
  <Head title="restranList"></Head>
    <App></App>
  <nav>
    <ol class="breadcrumb">
      <li class="list"><Link class="list-style" :href="route('index')">Home</Link></li>
      >
      <li class="list"><Link class="list-style" :href="route('restranList')">飲食店一覧</Link></li>
      >
      <li class="list">飲食店詳細</li>
    </ol>
  </nav>
  <div class="flex">
    <div class="left">
      <div class="title-img">
        <div class="dtitle" id="title">{{ restran.title }}</div>
      </div>
      <div class="image"><img :src="'/storage/'+restran.src" class="imgsize" /></div>
    </div>
    <div class="right">
      <div class="icon-nickname">
        <img src="/storage/icon.svg" class="icon" />
        <div class="nickname">{{ restran.user.name }}</div>
      </div>
      <div class="komokumei">飲食店名</div>
      <div class="hyoji-area" id="Restaurant_name">{{ restran.posts_name }}</div>

      <div class="komokumei">コメント</div>
      <div class="hyoji-area-comment" id="Restaurant_comment">{{ restran.posts_comment }}</div>

      <div class="komokumei">住所</div>
      <div class="hyoji-area-address" id="Restaurant_address">{{ restran.address }}</div>

      <div class="komokumei">営業時間</div>
      <div class="hyoji-area">
        <span id="first-time" class=" text-3xl">{{ restran.stratTime }}</span><span class=" text-3xl font-semibold mx-10">~</span><span id="last-time" class=" text-3xl">{{ restran.endTime }}</span>
      </div>
        <div class="category">
          <div class="komokumei">カテゴリー</div>
          <div class="hyoji-area-yo-ca" id="category">{{restran.category.category_name}}</div>
        </div>
    </div>
  </div>

  <div class="btn">
    <!-- <button class="good" type="button" ><img src="images/good.svg" class="good-img">いいね</button> -->
    <button class="back" type="button" onclick="history.back(-1);">＜戻る</button>
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
  margin-left: 1%;
  margin-right: 1%;
  padding-left: 1.5%;
  padding-right: 1.5%;
  background-color: #e4dccf;
  text-decoration: none;
  border-radius: 10px;
  list-style: none;
}
a,
a:visited,
a:hover,
a:active {
  color: black;
}
.list a {
  text-decoration: none;
}
.pop {
  color: black;
}
.flex {
  display: flex;
  justify-content: space-around;
  margin-top: 3%;
}
.left {
  width: 50%;
}
.right {
  width: 40%;
}

.dtitle {
  display: flex;
  width: 70%;
  height: 3rem;
  font-size: 1.3em;
  background-color: #e4dccf;
  margin: auto;
  align-items: center;
  justify-content: center;
}
.image {
  margin-top: 2%;
  width: 90%;
  height: 85vh;
  background-color: #e4dccf;
  margin-left: auto;
  margin-right: auto;
}

.icon-nickname {
  display: flex;
  margin-left: 15%;
  align-items: center;
}
.icon {
  width: 10%;
  height: 10%;
}
.nickname {
  font-size: 2.5em;
  margin-left: 3%;
  color: #002b5b;
}
.komokumei {
  font-size: 1.5em;
  margin-top: 1%;
}

.hyoji-area {
  width: 80%;
  height: 3rem;
  font-size: 1.5em;
  background-color: #e4dccf;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 10px;
  margin-bottom: 2%;
}

.hyoji-area-comment {
  width: 80%;
  height: auto;
  font-size: 1.2rem;
  background-color: #e4dccf;
  border-radius: 10px;
  margin-bottom: 2%;
  white-space: normal;
  line-break: normal;
  word-wrap: normal;
}
.hyoji-area-address {
  width: 80%;
  height: 6rem;
  font-size: 1.5rem;
  background-color: #e4dccf;
  border-radius: 10px;
  margin-bottom: 2%;
  display: flex;
  align-items: center;
}

.yosan-category {
  display: flex;
}
.yosan {
  width: 45%;
}
.category {
  width: 45%;
}
.hyoji-area-yo-ca {
  width: 80%;
  height: 3rem;
  font-size: 1.5em;
  background-color: #e4dccf;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 10px;
}
.btn {
  display: flex;
  width: 100%;
  height: 10vh;
  justify-content: center;
  align-items: center;
  margin: 2rem 0;
}
.back {
  width: 13vw;
  height: 10vh;
  background: #e4dccf;
  font-size: 2em;
  padding-right: 1%;
  border-radius: 10px;
  color: #002b5b;
  border: none;
}
.imgsize {
  height: 100%;
  width: 100%;
}
.list-style{
  text-decoration: none;
  color: black;
}
</style>
