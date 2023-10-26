<script setup>
import { ref ,computed} from 'vue';
import App from '@/Layouts/App.vue';
import { Head,usePage,useForm} from '@inertiajs/vue3';

const page = usePage();
const postUser = computed(() => page.props.auth.user.name);

// return Inertia::render()->with()の中身を表示
const saved = computed(()=> page.props.message);


const imageUrl = ref('/storage/backgroundimg.png');
const imageSelect = ref('写真を選択');

const loginUser = computed(()=> page.props.auth.user.id);

// 投稿出来るようにする場所
 const form = useForm({
  title: null,
  posts_name: null,
  posts_comment:null,
  prefecture_id: null,
  categories_id:null,
  address: null,
  posts_type:'0',
  src: null,
  stratTime:null,
  endTime:null,
  user_id: loginUser,
});

const submit = () => {
    form.post(route('kankouStore'));
}


// 入力された画像を表示するとこ
const handleImageUpload = (event) => {
  const fileInput = event.target ;
  if (fileInput.files) {
    const file = fileInput.files[0];
    // console.log(form.src);
    if (file) {
      // 選択されたファイルが画像であることを確認
      if (file.type.startsWith('image/')) {
        const reader = new FileReader();
        reader.onload = () => {
          if (reader.result) {
            imageUrl.value = reader.result;
          }
        };
        reader.readAsDataURL(file);
      } else {
        alert('画像ファイルを選択してください');
      }
    }
  }
};

</script>


<template>
    <Head title="kankouPost"></Head>
    <App></App>
    <input type="hidden" v-model="form.posts_type"/>
    <div  class=" text-red-600 text-xl font-semibold">
      {{ saved }}
    </div>
    <form @submit.prevent="submit" enctype="multipart/form-data">
    <div class="flex">
      <div class="left">
        <div class="sinkisakusei">新規投稿を作成</div>
        <input
          type="text"
          class="title-text"
          v-model="form.title"
          placeholder="ここにタイトルを入力"
          required
        />
        <div class="img-post" id="image-add">
          <img :src="imageUrl" name="image" class="photo-img" />
        </div>
        <label for="image" name="image" class="img-select"
          >{{ imageSelect }}
          <input
            type="file"
            name="img"
            @change="handleImageUpload"
            class="img-file"
            accept="image/*"
            id="image"
            @input=" form.src = $event.target.files[0]"
          />
        </label>
      </div>
      <div class="right">
        <div class="icon-nickname">
          <img src="/storage/icon.svg" class="icon" />
          <div class="nickname">{{ postUser }}</div>
        </div>
        <div class="komokumei">観光名所名</div>
        <input type="text" class="tourist_text" v-model="form.posts_name" required/>
        <div class="komokumei">コメント</div>
        <textarea class="comment_text" v-model="form.posts_comment"  required> </textarea>

        <div class="komokumei">住所</div>
        <select class="my-3" v-model="form.prefecture_id" required placeholder="都道府県選択">
        <option value="1">北海道</option>
        <option value="2">青森県</option>
        <option value="3">岩手県</option>
        <option value="4">宮城県</option>
        <option value="5">秋田県</option>
        <option value="6">山形県</option>
        <option value="7">福島県</option>
        <option value="8">茨城県</option>
        <option value="9">栃木県</option>
        <option value="10">群馬県</option>
        <option value="11">埼玉県</option>
        <option value="12">千葉県</option>
        <option value="13">東京都</option>
        <option value="14">神奈川県</option>
        <option value="15">新潟県</option>
        <option value="16">富山県</option>
        <option value="17">石川県</option>
        <option value="18">福井県</option>
        <option value="19">山梨県</option>
        <option value="20">長野県</option>
        <option value="21">岐阜県</option>
        <option value="22">静岡県</option>
        <option value="23">愛知県</option>
        <option value="24">三重県</option>
        <option value="25">滋賀県</option>
        <option value="26">京都府</option>
        <option value="27">大阪府</option>
        <option value="28">兵庫県</option>
        <option value="29">奈良県</option>
        <option value="30">和歌山県</option>
        <option value="31">鳥取県</option>
        <option value="32">島根県</option>
        <option value="33">岡山県</option>
        <option value="34">広島県</option>
        <option value="35">山口県</option>
        <option value="36">徳島県</option>
        <option value="37">香川県</option>
        <option value="38">愛媛県</option>
        <option value="39">高知県</option>
        <option value="40">福岡県</option>
        <option value="41">佐賀県</option>
        <option value="42">長崎県</option>
        <option value="43">熊本県</option>
        <option value="44">大分県</option>
        <option value="45">宮崎県</option>
        <option value="46">鹿児島県</option>
        <option value="47">沖縄県</option>
        </select>
        <input type="text" class="address_text" v-model="form.address" required />

        <div class="komokumei">営業時間</div>

        <input type="time" v-model="form.stratTime" id="" class="time_text" required/><span class="kara">～</span
        ><input type="time" v-model="form.endTime" id="" class="time_text" required/>

        <div class="komokumei">カテゴリー</div>
        <div class="radios">
          <input type="radio" v-model="form.categories_id" value="1" id="tosi"  />
          <label class="categorymei" for="tosi"
            ><img src="/storage/city.svg" class="komoku-img" /><span
              class="categorymei-moji"
              >都市</span
            ></label
          >
          <input type="radio" v-model="form.categories_id" value="4" class="radio-right" id="onsen" />
          <label class="categorymei" for="onsen"
            ><img src="/storage/onsen.svg" class="komoku-img" /><span
              class="categorymei-moji"
              >温泉</span
            ></label
          >
        </div>
        <div class="radios">
          <input type="radio"  v-model="form.categories_id" value="2" id="bae" />
          <label class="categorymei" for="bae"
            ><img src="/storage/shine.svg" class="komoku-img" /><span
              class="categorymei-moji"
              >映え</span
            ></label
          >
          <input type="radio" v-model="form.categories_id" value="5" class="radio-right" id="tera" />
          <label class="categorymei" for="tera"
            ><img src="/storage/temple.svg" class="komoku-img" /><span
              class="categorymei-moji"
              >神社・寺</span
            ></label
          >
        </div>
        <div class="radios">
          <input type="radio"  v-model="form.categories_id" value="3" id="sizen" />
          <label class="categorymei" for="sizen"
            ><img src="/storage/scenery.svg" class="komoku-img" /><span
              class="categorymei-moji"
              >自然風景</span
            ></label
          >
          <input type="radio"  v-model="form.categories_id" value="6" class="radio-right" id="burari" />
          <label class="categorymei" for="burari"
            ><img src="/storage/aimlessly.svg" class="komoku-img-burari" /><span
              class="categorymei-moji"
              >ぶらり</span
            ></label
          >
        </div>
      </div>
    </div>

    <div class="btn">
      <button class="back" type="button" onclick="history.back(-1);">＜戻る</button>
      <button class="sign-up" type="submit">投稿</button>
    </div>
  </form>
</template>

<style scoped>
.flex {
  display: flex;
  justify-content: space-around;
  margin-left: 3%;
}
.left {
  width: 50%;
}
.right {
  width: 40%;
  margin-top: 2%;
}
.sinkisakusei {
  color: #002b5b;
  font-size: 1.5em;
}
.koukai-img {
  text-align: center;
}
.koukai_check {
  transform: scale(2.5);
  margin-right: 2%;
}

.koukai {
  font-size: 1.5em;
}

.title-text {
  width: 55%;
  height: 3rem;
  font-size: 2em;
  background-color: #e4dccf;
  margin-left: 20%;
  border-radius: 10px;
  border: none;
}
.title-text::placeholder {
  text-align: center;
}

.img-post {
  width: 90%;
  height: 85vh;
  background-color: #e4dccf;
  background-repeat: no-repeat;
  border: 2px dashed black;
  display: flex;
  justify-content: center;
  align-items: center;
  margin-top: 2%;
  margin-bottom: 3%;
  flex-direction: column;
  background-size: 100% 100%;
}

.photo-img {
  width: 100%;
  height: 100%;
}
label > input {
  display: none;
}
.img-select {
  font-size: 1.3em;
  color: #0080ff;
  text-align: center;
  background-color: #e4dccf;
  border-radius: 10px;
  padding: 2% 3%;
}

.icon-nickname {
  display: flex;
  margin-left: 20%;
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
.tourist_text {
  width: 85%;
  height: 5%;
  background-color: #e4dccf;
  border: none;
  border-radius: 10px;
  font-size: 1.5em;
}
.comment_text {
  width: 85%;
  height: 25%;
  background-color: #e4dccf;
  border: none;
  border-radius: 10px;
  font-size: 1.2em;
}

select {
  width: 10vw;
  height: 7vh;
  background-color: #e4dccf;
  text-align: center;
  border: none;
  border-radius: 10px;
  font-size: 1.2em;
}
.address_text {
  height: 5vh;
  width: 65%;
  background-color: #e4dccf;
  border: none;
  border-radius: 10px;
  font-size: 1.2em;
  margin-left: 1%;
}

.time_text {
  height: 5vh;
  width: 42%;
  background-color: #e4dccf;
  border: none;
  border-radius: 10px;
  font-size: 1.5em;
  text-align: center;
}
.kara {
  font-size: 1.5em;
}

.radios {
  width: 90%;
  display: flex;
  justify-content: space-around;
  margin: 2%;
}

.categorymei {
  background-color: #e4dccf;
  width: 35%;
  height: 5vh;
  font-size: 1.5em;
  border-radius: 10px;
  text-align: center;
}
.komoku-img {
  float: left;
  margin-top: 2%;
  width: 25px;
  height: 25px;
  margin-left: 5%;
}
.komoku-img-burari {
  float: left;
  width: 30px;
  height: 30px;
  margin-left: 5%;
}

/* input[type='radio'] {
  display: none;
} */

.btn {
  width: 100%;
  height: 10vh;
  display: flex;
  justify-content: center;
  align-items: center;
  margin: 2rem 0;
  margin-top: 5%;
  margin-bottom: 5%;
}

.back {
  width: 13vw;
  height: 10vh;
  background: #e4dccf;
  font-size: 2.3em;
  padding-right: 1%;
  border-radius: 10px;
  color: #002b5b;
  border: none;
}
.sign-up {
  margin-left: 15%;
  width: 13vw;
  height: 10vh;
  background: #002b5b;
  font-size: 2em;
  border-radius: 10px;
  color: #ffffff;
  border: none;
}
</style>
