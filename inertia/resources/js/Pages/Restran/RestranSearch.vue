<script setup>
import App from '@/Layouts/App.vue';
import { Head, Link,useForm } from '@inertiajs/vue3';

const form = useForm({
    keyword: null,
    categories: [],
});
const submit = ()=>{
 form.post(route('restran.result'));
}
</script>

<template>
    <Head title="restranSearch"></Head>
    <App></App>
  <form @submit.prevent="submit">
    <div class="search">
      <input type="text" name="search-name" v-model="form.keyword" class="search-text" placeholder="例:福岡県福岡市" />
      <button
        type="submit"
        class="search-button"
      >検索</button>
    </div>
    <div class="check-container">
      <div class="check-div">
        <input type="checkbox" v-model="form.categories" value="7" name="kankou" id="breakfast" /><label
          for="breakfast"
          id="breakfast"
          class="label-style"
          ><span class=" flex"><img src="/storage/breakfast.svg" alt="" />朝食</span></label
        >
        <input type="checkbox" v-model="form.categories"  value="8" name="kankou" id="lunch" /><label
          for="lunch"
          id="lunch"
          class="label-style"
          ><span class=" flex"><img src="/storage/lunch.svg" alt="" />昼食</span></label
        >
      </div>
      <div class="check-div">
        <input type="checkbox" v-model="form.categories" value="9" name="kankou" id="dinner" /><label
          for="dinner"
          id="dinner"
          class="label-style"
          ><span class=" flex"
            ><img
              src="/storage/dinner.svg"
              style="width: 25px; height: 25px"
              alt=""
            />夕食</span
          ></label
        >
        <input type="checkbox" v-model="form.categories" value="10" name="kankou" id="snack" /><label
          for="snack"
          id="snack"
          class="label-style"
          ><span class=" flex"><img src="/storage/snack.svg" alt="" />軽食</span></label
        >
      </div>
      <div class="check-div">
        <input type="checkbox" v-model="form.categories" value="11" name="kankou" id="specialty" /><label
          for="specialty"
          id="specialty"
          class="label-style"
          ><span class=" flex"><img src="/storage/specialty.svg" alt="" />名物</span></label
        >
        <input type="checkbox" v-model="form.categories" value="12" name="kankou" id="local-food" /><label
          for="local-food"
          id="local-food"
          class="label-style"
          ><span class=" flex"><img src="/storage/local-food.svg" alt="" />地元飯</span></label
        >
      </div>
    </div>
  </form>
  <div class="back-div">
    <button class="back-button" type="button" onclick="history.back(-1);">＜戻る</button>
  </div>
</template>

<style scoped>
.search {
  margin-top: 5rem;
  width: 100%;
  height: 20vh;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}
.search-text {
  width: 45%;
  height: 20vh;
  background-color: #e4dccf;
  border-style: solid;
  border-color: #e4dccf;
  text-align: center;
  border-radius: 20px;
  font-size: 1.4rem;
}
.search-text:focus {
  border: 1px solid #e4dccf;
  outline: 0;
}
.search-text::placeholder {
  font-size: 1.4rem;
  text-align: center;
}
.search-button {
  position: relative;
  top: -50.1%;
  left: 17.5%;
  height: 20vh;
  width: 10%;
  background-color: #002b5b;
  color: white;
  font-size: 1.1rem;
  border: 1px solid #002b5b;
  border-radius: 20px;
}
.back-div {
  width: 100%;
  height: 10vh;
  display: flex;
  justify-content: center;
  align-items: center;
  margin-bottom: 3rem;
}
.back-button {
  width: 20%;
  height: 10vh;
  background-color: #e4dccf;
  border-radius: 10px;
  border: 1px solid #e4dccf;
  font-size: 1.2rem;
  color: #002b5b;
}
.check-container {
  width: 100%;
  height: 40vh;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  margin-bottom: 3rem;
}
.check-div {
  width: 80%;
  height: 10vh;
  display: flex;
  justify-content: space-around;
  align-items: center;
  margin: 1rem 0;
}
.label-style {
  width: 40%;
  height: 10vh;
  background-color: #e4dccf;
  border: 1px solid #e4dccf;
  border-radius: 10px;
  display: flex;
  justify-content: center;
  align-items: center;
}
.label-style > span {
  font-size: 1.5rem;
}
input[type='checkbox'][id='city']:checked ~ #city {
  transition: all 0.5s linear;
  transform: translateY(-5px);
  box-shadow: 2px 2px 10px #444;
  border: 2px solid #002b5b;
}
input[type='checkbox'][id='onsen']:checked ~ #onsen {
  transition: all 0.5s linear;
  transform: translateY(-5px);
  box-shadow: 2px 2px 10px #444;
  border: 2px solid #002b5b;
}
input[type='checkbox'][id='shine']:checked ~ #shine {
  transition: all 0.5s linear;
  transform: translateY(-5px);
  box-shadow: 2px 2px 10px #444;
  border: 2px solid #002b5b;
}
input[type='checkbox'][id='temple']:checked ~ #temple {
  transition: all 0.5s linear;
  transform: translateY(-5px);
  box-shadow: 2px 2px 10px #444;
  border: 2px solid #002b5b;
}
input[type='checkbox'][id='scenery']:checked ~ #scenery {
  transition: all 0.5s linear;
  transform: translateY(-5px);
  box-shadow: 2px 2px 10px #444;
  border: 2px solid #002b5b;
}
input[type='checkbox'][id='aimlessly']:checked ~ #aimlessly {
  transition: all 0.5s linear;
  transform: translateY(-5px);
  box-shadow: 2px 2px 10px #444;
  border: 2px solid #002b5b;
}
input[type='checkbox'][id='breakfast']:checked ~ #breakfast {
  transition: all 0.5s linear;
  transform: translateY(-5px);
  box-shadow: 2px 2px 10px #444;
  border: 2px solid #002b5b;
}
input[type='checkbox'][id='lunch']:checked ~ #lunch {
  transition: all 0.5s linear;
  transform: translateY(-5px);
  box-shadow: 2px 2px 10px #444;
  border: 2px solid #002b5b;
}
input[type='checkbox'][id='dinner']:checked ~ #dinner {
  transition: all 0.5s linear;
  transform: translateY(-5px);
  box-shadow: 2px 2px 10px #444;
  border: 2px solid #002b5b;
}
input[type='checkbox'][id='snack']:checked ~ #snack {
  transition: all 0.5s linear;
  transform: translateY(-5px);
  box-shadow: 2px 2px 10px #444;
  border: 2px solid #002b5b;
}
input[type='checkbox'][id='specialty']:checked ~ #specialty {
  transition: all 0.5s linear;
  transform: translateY(-5px);
  box-shadow: 2px 2px 10px #444;
  border: 2px solid #002b5b;
}
input[type='checkbox'][id='local-food']:checked ~ #local-food {
  transition: all 0.5s linear;
  transform: translateY(-5px);
  box-shadow: 2px 2px 10px #444;
  /* background-color: #EA5455; */
  border: 2px solid #002b5b;
}
.link-font{
  text-decoration: none;
  color: white;
}
</style>
