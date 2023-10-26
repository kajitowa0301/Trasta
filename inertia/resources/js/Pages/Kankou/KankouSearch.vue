<script setup>
import { ref, computed } from 'vue';
import App from '@/Layouts/App.vue';
import { Head, Link, usePage, useForm } from '@inertiajs/vue3';

const form = useForm({
    keyword: null,
    categories: [],
});
console.log(form.categories);
const submit = () => {
    form.post(route('kankou.result'));
}

</script>

<template>
    <Head title="kankouSearch"></Head>
    <App></App>
    <form @submit.prevent="submit">
        <div class="search">
            <input type="text" name="search-name" v-model="form.keyword" class="search-text" placeholder="例:福岡県福岡市"><button type="submit"
                class="search-button">検索</button>
        </div>
        <div class="check-container">
            <div class="check-div">
                <input type="checkbox" name="kankou" value="1" id="city" v-model="form.categories"><label for="city"
                    id="city" class="label-style"><span class=" flex"><img src="/storage/city.svg" alt="">都市</span></label>
                <input type="checkbox" name="kankou" value="4" id="onsen" v-model="form.categories"><label for="onsen"
                    id="onsen" class="label-style"><span class=" flex"><img src="/storage/onsen.svg"
                            alt="">温泉</span></label>
            </div>
            <div class="check-div">
                <input type="checkbox" name="kankou" value="2" id="shine" v-model="form.categories"><label for="shine"
                    id="shine" class="label-style"><span class=" flex"><img src="/storage/shine.svg"
                            alt="">映え</span></label>
                <input type="checkbox" name="kankou" value="5" id="temple" v-model="form.categories"><label for="temple"
                    id="temple" class="label-style"><span class=" flex"><img src="/storage/temple.svg"
                            alt="">神社・寺</span></label>
            </div>
            <div class="check-div">
                <input type="checkbox" name="kankou" value="3" id="scenery" v-model="form.categories"><label for="scenery"
                    id="scenery" class="label-style"><span class=" flex"><img src="/storage/scenery.svg"
                            alt="">自然風景</span></label>
                <input type="checkbox" name="kankou" value="6" id="aimlessly" v-model="form.categories"><label
                    for="aimlessly" id="aimlessly" class="label-style"><span class=" flex"><img src="/storage/aimlessly.svg"
                            alt="">ぶらり</span></label>
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
    background-color: #E4DCCF;
    border-style: solid;
    border-color: #E4DCCF;
    text-align: center;
    border-radius: 20px;
    font-size: 1.4rem;
}

.search-text:focus {
    border: 1px solid #E4DCCF;
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
    background-color: #002B5B;
    color: white;
    font-size: 1.1rem;
    border: 1px solid #002B5B;
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
    background-color: #E4DCCF;
    border-radius: 10px;
    border: 1px solid #E4DCCF;
    font-size: 1.2rem;
    color: #002B5B;
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
    background-color: #E4DCCF;
    border: 1px solid #E4DCCF;
    border-radius: 10px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.label-style>span {
    font-size: 1.5rem;
}

input[type="checkbox"][id="city"]:checked~#city {
    transition: all 0.5s linear;
    transform: translateY(-5px);
    box-shadow: 2px 2px 10px #444;
    border: 2px solid #002B5B;
}

input[type="checkbox"][id="onsen"]:checked~#onsen {
    transition: all 0.5s linear;
    transform: translateY(-5px);
    box-shadow: 2px 2px 10px #444;
    border: 2px solid #002B5B;
}

input[type="checkbox"][id="shine"]:checked~#shine {
    transition: all 0.5s linear;
    transform: translateY(-5px);
    box-shadow: 2px 2px 10px #444;
    border: 2px solid #002B5B;
}

input[type="checkbox"][id="temple"]:checked~#temple {
    transition: all 0.5s linear;
    transform: translateY(-5px);
    box-shadow: 2px 2px 10px #444;
    border: 2px solid #002B5B;
}

input[type="checkbox"][id="scenery"]:checked~#scenery {
    transition: all 0.5s linear;
    transform: translateY(-5px);
    box-shadow: 2px 2px 10px #444;
    border: 2px solid #002B5B;
}

input[type="checkbox"][id="aimlessly"]:checked~#aimlessly {
    transition: all 0.5s linear;
    transform: translateY(-5px);
    box-shadow: 2px 2px 10px #444;
    border: 2px solid #002B5B;
}

input[type="checkbox"][id="breakfast"]:checked~#breakfast {
    transition: all 0.5s linear;
    transform: translateY(-5px);
    box-shadow: 2px 2px 10px #444;
    border: 2px solid #002B5B;
}

input[type="checkbox"][id="lunch"]:checked~#lunch {
    transition: all 0.5s linear;
    transform: translateY(-5px);
    box-shadow: 2px 2px 10px #444;
    border: 2px solid #002B5B;
}

input[type="checkbox"][id="dinner"]:checked~#dinner {
    transition: all 0.5s linear;
    transform: translateY(-5px);
    box-shadow: 2px 2px 10px #444;
    border: 2px solid #002B5B;
}

input[type="checkbox"][id="snack"]:checked~#snack {
    transition: all 0.5s linear;
    transform: translateY(-5px);
    box-shadow: 2px 2px 10px #444;
    border: 2px solid #002B5B;
}

input[type="checkbox"][id="specialty"]:checked~#specialty {
    transition: all 0.5s linear;
    transform: translateY(-5px);
    box-shadow: 2px 2px 10px #444;
    border: 2px solid #002B5B;
}

input[type="checkbox"][id="local-food"]:checked~#local-food {
    transition: all 0.5s linear;
    transform: translateY(-5px);
    box-shadow: 2px 2px 10px #444;
    /* background-color: #EA5455; */
    border: 2px solid #002B5B;
}

.link-font {
    text-decoration: none;
    color: white;
}</style>