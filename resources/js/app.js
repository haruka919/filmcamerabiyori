import $ from 'jquery';


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
      .done(function () {
        $this.toggleClass('loved');
      })
      // Ajaxリクエストが失敗した場合
      .fail(function (data) {
        console.log('エラー');
        console.log(data);
      });
    });

  // MENU FIXED SP
  var $window = $(window),
    $header = $('.p-header'),
    headerBottom;

  $window.on('scroll', function () {
    headerBottom = $header.height();
    if ($window.scrollTop() > headerBottom) {
      $header.addClass('is-scroll');
    }
    else {
      $header.removeClass('is-scroll');
    }
  });
  $window.trigger('scroll');


  /* header */
  $('.js-humberger').on('click', function () {
    if($(this).hasClass('is-open')){
      $(this).removeClass('is-open');
      $('.p-header-menu-wrapper').fadeOut();
    }else{
      $(this).addClass('is-open');
      $('.p-header-menu-wrapper').fadeIn();
    }
  });

  //フッターを最下部に固定
  var $ftr = $('.js-footer');
  if( window.innerHeight > $ftr.offset().top + $ftr.outerHeight()){
    $ftr.attr({'style': 'position:fixed; top:' + (window.innerHeight - $ftr.outerHeight()) + 'px;'});
  }
