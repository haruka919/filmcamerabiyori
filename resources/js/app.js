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

  /* footer */
  $('.js-footer-menu a').each(function () {
    var $href = $(this).attr('href');
    if (location.href.match($href)) {
      $(this).addClass('is-active');
    } else {
      $(this).removeClass('is-active');
    }
  });

  /* Modal */
  $('.js-setting__open').on('click', function () {
    $('.js-setting__wrapper').fadeIn();
  });

  $('.js-setting__close, .js-setting__wrapper').on('click', function () {
    $('.js-setting__wrapper').fadeOut();
  });
  $('.js-setting__container').on('click', function (e) {
    e.stopPropagation();
  });

  /* SearchTags */
  $('.js-search__open').on('click', function () {
    $('.js-search__wrapper').fadeIn();
  });

  $('.js-search__close').on('click', function () {
    $('.js-search__wrapper').fadeOut();
  });
  $('.js-search__wrapper').on('click', function (e) {
    e.stopPropagation();
  });

  // LOADING ANIMETION
  var h = $(window).height();

  $(window).ready(function () {
    $('#is-loading').delay(900).fadeOut(800);
    $('#loading').delay(600).fadeOut(300);
  });

  $(function () {
    setTimeout(stopload, 10000);
  });

  function stopload() {
    $('#loading__wrapper').css('display', 'block');
    $('#is-loading').delay(900).fadeOut(800);
    $('#loading').delay(600).fadeOut(300);
  }


  //like
  var $like = $('.js-like-change');
  var likePostId;
    $like.on('click', function () {
      var $this = $(this);
      likePostId = $this.data('postid'); 
      $.ajax({
    　　headers: {
    　　　'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    　　},
        url: '/posts/ajaxlike',
        type: 'POST',
        dataType: "json",
        data: { 'post_id': likePostId },
      })
      // Ajaxリクエストが成功した場合
      .done(function (data) {
        console.log('成功');
        console.log(data);
        $this.toggleClass('loved');
      })
      // Ajaxリクエストが失敗した場合
      .fail(function (data) {
        console.log('エラー');
        console.log(data);
      });
    });