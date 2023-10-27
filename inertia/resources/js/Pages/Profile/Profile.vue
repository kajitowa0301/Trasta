<script setup>
import App from '@/Layouts/App.vue';
import { Head, Link,usePage } from '@inertiajs/vue3';
import{computed ,ref} from 'vue';

const page = usePage();
const user = computed(()=> page.props.auth.user);

// 総投稿数
const {count} = usePage().props;
// const count = ref(20);
const {kankou_count} = usePage().props;
const {restran_count} = usePage().props;

// 最新の観光名所・飲食店
const {kankou} = usePage().props;
const {restran} = usePage().props;
</script>

<template>
    <Head title="Profile"></Head>
    <App></App>
  <div class="profille-container">
    <div class="center-profille">
      <div class="profille-left">
        <img v-if="count <= 15 && count >= 0" src="/storage/bronze.png" class=" w-2/4 h-5/6 " alt="" />
        <img v-else-if="count <= 30 && count >= 16" src="/storage/silver.png" class=" w-2/4 h-5/6 " alt="" />
        <img v-else src="/storage/gold.png" class=" w-2/4 h-5/6 " alt="" />
        <!-- <div class="like-list"onclick="location.href='./liked-list.php'"><span>いいね一覧</span></div> -->
        <div class=" bg-Thin-skin-color py-5 px-6 rounded-xl text-xl"><Link :href="route('profile.edit')">プロフィール編集</Link></div>
      </div>
      <div class="profille-right">
        <div class="titles-name">
          <div id="name" class="nickname"><span class=" font-semibold ">{{ user.name }}</span></div>
          <div v-if="count <=15 && count >=0"  class="title-holder"><span class=" font-semibold">旅行初心者！</span></div>
          <div v-else-if="count <= 30 && count >= 16" class="title-holder"><span class=" font-semibold">旅行マスター！！</span></div>
          <div v-else class="title-holder"><span class=" font-semibold">旅行レジェンド！！！</span></div>
        </div>
        <div class="comment-div"><span class=" font-semibold">{{ user.comment }}</span></div>
      </div>
    </div>
  </div>
  <!-- 旅行日記部分 -->
  <div class="trip-container">
    <div class="center-trip">
        <div class="trip-left"> 
                <img src="/storage/trip-memory.svg" alt="" />
                <router-link class="link-style" to="/profile/ProfileDetail"><span>旅行日記</span></router-link>
        </div>
        <div class="trip-right">
          <div class="total-post">
            <span class="total-font">総投稿数<span class="total-font">{{ count }}</span>件</span>
           <div class=" ml-4">
            <p class=" mb-5 text-lg text-Indigo-color font-medium">観光名所:{{ kankou_count }}件</p>
            <p class=" text-lg text-Indigo-color font-medium">飲食店:{{ restran_count }}件</p>
           </div>
          </div>
        </div>
    </div>
  </div>
  <!-- 最近の投稿を表示する部分 -->
  <div class="new-container" v-if="kankou !== null && restran !== null">
    <div class="center-post">
      <div class="new-title-delete">
        <div class="new-post"><span>最新の投稿</span></div>
        <!-- <div class="post-delete" onclick="location.href='./post-delete.php'">
          <span>投稿削除</span>
        </div> -->
      </div>
      <div class="new-posts">
        <div class="post-card">
          <div class="post-type">観光名所:{{ kankou.title }}</div>
          <div class="new-img">
            <Link :href="route('kankouDetail',{post:kankou.posts_id})">
            <img :src="'/storage/'+ kankou.src" class=" w-full h-full rounded-2xl">
            </Link>
          </div>
        </div>
        <div class="post-card">
          <div class="post-type">飲食店:{{ restran.title }}</div>
          <div class="new-img">
            <Link :href="route('restranDetail',{post:restran.posts_id})">
            <img :src="'/storage/'+ restran.src" class=" w-full h-full rounded-2xl">
            </Link>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="back-button">
    <button class="back" onclick="history.back(-1);">＜戻る</button>
  </div>
</template>

<style scoped>
.aaa{
  width:20%;
  height:20%;
  background-color:black;
}
.profille-container {
  width: 100%;
  height: 50vh;
  display: flex;
  justify-content: center;
  align-items: center;
  margin-top: 1rem;
}
.center-profille {
  width: 90%;
  display: flex;
  justify-content: center;
  align-items: center;
}
.profille-left {
  width: 45%;
  height: 50vh;
  display: flex;
  align-items: center;
  flex-direction: column;
}
.top-img {
  width: 35%;
  height: 40vh;
  margin: 2rem 0;
}
.like-list {
  width: 50%;
  height: 10vh;
  display: flex;
  justify-content: center;
  align-items: center;
  border-radius: 20px;
  background-color: #e4dccf;
}
.profille-right {
  width: 45%;
  display: flex;
  flex-direction: column;
}
.titles-name {
  width: 100%;
  height: 25vh;
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.nickname {
  width: 45%;
  height: 10vh;
  border-radius: 20px;
  background-color: #e4dccf;
  display: flex;
  justify-content: center;
  align-items: center;
}
.title-holder {
  width: 45%;
  height: 10vh;
  border-radius: 20px;
  background-color: #e4dccf;
  display: flex;
  justify-content: center;
  align-items: center;
}
.comment-div {
  width: 100%;
  height: 25vh;
  border-radius: 20px;
  display: flex;
  /* align-items: center; */
  background-color: #e4dccf;
}
.comment-div > span {
  padding: 3% 0 0 3%;
  text-align: start;
}
.trip-container {
  margin: 1.4rem 0;
  width: 100%;
  height: 30vh;
  display: flex;
  justify-content: center;
  align-items: center;
}
.center-trip {
  width: 90%;
  height: 30vh;
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: #e4dccf;
  border-radius: 20px;
}
.trip-left {
  width: 40%;
  height: 30vh;
  display: flex;
  justify-content: center;
  align-items: center;
}
.trip-left > img {
  width: 15%;
  height: 15vh;
}
.link-style > span {
  font-size: 2rem;
  color: #002b5b;
}
.trip-right {
  width: 60%;
  height: 30vh;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
}
.total-post {
  width: 100%;
  height: 10vh;
  display: flex;
  justify-content: center;
  align-items: center;
}
.total-font {
  font-size: 2rem;
  color: #002b5b;
}
.place-visite {
  width: 100%;
  height: 10vh;
  display: flex;
  justify-content: center;
  align-items: center;
}
.new-container {
  margin: 2rem 0;
  width: 100%;
  height: 50vh;
  display: flex;
  justify-content: center;
  align-items: center;
}
.center-post {
  width: 90%;
  height: 55vh;
  display: flex;
  align-items: center;
  background-color: #e4dccf;
  flex-direction: column;
  border-radius: 20px;
}
.new-title-delete {
  width: 100%;
  height: 15vh;
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.new-post {
  padding-left: 4rem;
  font-size: 2rem;
  color: #002b5b;
}
.post-delete {
  margin-right: 4rem;
  width: 10%;
  height: 7.5vh;
  color: #f9f5eb;
  background-color: #ea5455;
  border-radius: 20px;
  display: flex;
  justify-content: center;
  align-items: center;
}
.new-posts {
  width: 100%;
  height: 35vh;
  display: flex;
  justify-content: space-around;
  align-items: center;
}
.post-card {
  width: 100%;
  height: 35vh;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
}
.post-type {
  font-size: 1.4rem;
  color: #002b5b;
}
.new-img {
  width: 70%;
  height: 30vh;
  background-color: #f9f5eb;
  border-radius: 20px;
}
.back-button {
  width: 100%;
  height: 10vh;
  display: flex;
  justify-content: center;
  align-items: center;
  margin: 3rem 0;
}
.back {
  width: 20%;
  height: 10vh;
  color: #002b5b;
  font-size: 1.4rem;
  background-color: #e4dccf;
  border-radius: 20px;
  border: 2px solid #e4dccf;
}
.back:hover {
  transition: all 0.5s linear;
  transform: translateY(-10px);
  box-shadow: 9px 9px 10px #aaa;
}
</style>
