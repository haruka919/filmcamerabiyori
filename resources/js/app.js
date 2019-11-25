/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import $ from 'jquery';
require('./bootstrap');
window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
  el: '#app',
});

// 画像ライブプレビュー
var $dropArea = $('.js-form-pic');
var $fileInput = $('.js-form-picFile');

$fileInput.on('change', function(e){
  var file = this.files[0],            // 2. files配列にファイルが入っています
      $img = $(this).siblings('.js-form-preview'), // 3. jQueryのsiblingsメソッドで兄弟のimgを取得
      fileReader = new FileReader();   // 4. ファイルを読み込むFileReaderオブジェクト

  // 5. 読み込みが完了した際のイベントハンドラ。imgのsrcにデータをセット
  fileReader.onload = function(event) {
  // 読み込んだデータをimgに設定
  $img.attr('src', event.target.result).show();
  };

  // 6. 画像読み込み
  fileReader.readAsDataURL(file);
});


// modal
var $searchTags = $('.js-search-tags');
var $showTags = $('.js-show-tags');

//show-panelボタンをクリックしたらLightBoxを表示する
$searchTags.click(function () {
  $showTags.css('display', 'block');
});
// //CloseボタンをクリックしたらLightBoxを閉じる
// $(".fn_close-panel").click(function () {
//   $(".dogPanel").fadeOut(300);/*フェードアウトの速度は数値を調整*/
//   // $("#BlackWindow, #youkai-panel").fadeOut(300);/*フェードアウトの速度は数値を調整*/
// })
//背景の黒地をクリックしたらLightBoxを閉じる
$showTags.click(function () {
  $showTags.css('display', 'none');
});
