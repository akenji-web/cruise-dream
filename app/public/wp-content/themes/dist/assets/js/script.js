"use strict";

jQuery(function ($) {
  // この中であればWordpressでも「$」が使用可能になる
  // ハンバーガーメニュー
  $(".js-hamburger, .js-drawer").click(function () {
    $(".js-hamburger").toggleClass("is-active");
    $(".js-header").toggleClass("is-active");
    $(".js-drawer").fadeToggle();
  });

  // リサイズ時にドロワーメニュー解除
  $(window).resize(function () {
    if (window.matchMedia("(min-width: 768px)").matches) {
      $(".js-hamburger").removeClass("is-active");
      $(".js-header").removeClass("is-active");
      $(".js-drawer").fadeOut();
    }
  });

  // ハンバーガーメニューがクリックされたときに背景固定
  $(".js-hamburger, .js-drawer").click(function () {
    if ($("body").css("overflow") === "hidden") {
      // overflowがhiddenなら、bodyのスタイルを元に戻す
      $("body").css({
        height: "",
        overflow: ""
      });
    } else {
      // bodyにheight: 100%とoverflow: hiddenを設定し、スクロールを無効にする
      $("body").css({
        height: "100%",
        overflow: "hidden"
      });
    }
  });

  // スクロール時にヘッダーメニューの背景色を変更
  $(window).on('scroll', function () {
    if ($('.mainview').height() < $(this).scrollTop()) {
      $('.js-header').addClass('change-color');
    } else {
      $('.js-header').removeClass('change-color');
    }
  });

  // メインビューのスライダー
  var mainviewswiper = new Swiper(".js-mainview-swiper", {
    loop: true,
    effect: "fade",
    speed: 1500,
    allowTouchMove: false,
    autoplay: {
      delay: 3000
    }
  });

  // Campaignのスライダー
  var campaignswiper = new Swiper(".js-campaign-swiper", {
    loop: true,
    //繰り返しをする
    loopedSlides: 4,
    speed: 500,
    spaceBetween: 24,
    //スライド間の距離を24px
    width: 280,
    effect: "slide",
    autoplay: {
      delay: 4000,
      waitForTransition: false
    },
    navigation: {
      prevEl: '.swiper-button-next',
      nextEl: '.swiper-button-prev'
    },
    // when window width is >= 768px
    breakpoints: {
      768: {
        spaceBetween: 40,
        //スライド間の距離を40px
        width: 333
      }
    }
  });

  // 画像表示のアニメーション

  //要素の取得とスピードの設定
  var box = $('.js-color-box'),
    speed = 700;

  //.colorboxの付いた全ての要素に対して下記の処理を行う
  box.each(function () {
    $(this).append('<div class="color"></div>');
    var color = $(this).find($('.color')),
      image = $(this).find('img');
    var counter = 0;
    image.css('opacity', '0');
    color.css('width', '0%');
    //inviewを使って背景色が画面に現れたら処理をする
    color.on('inview', function () {
      if (counter == 0) {
        $(this).delay(200).animate({
          'width': '100%'
        }, speed, function () {
          image.css('opacity', '1');
          $(this).css({
            'left': '0',
            'right': 'auto'
          });
          $(this).animate({
            'width': '0%'
          }, speed);
        });
        counter = 1;
      }
    });
  });

  // トップへ戻るボタン
  $(function () {
    var returnTop = $(".js-return-top");
    returnTop.hide();
    $(window).scroll(function () {
      if ($(this).scrollTop() > 20) {
        returnTop.fadeIn(100);
      } else {
        returnTop.fadeOut(10);
      }
    });
    returnTop.click(function () {
      $("body, html").animate({
        scrollTop: 0
      }, 300);
      return false;
    });
    // フッター手前でストップ
    returnTop.hide();
    $(window).on("scroll", function () {
      var scrollHeight = $(document).height();
      var scrollPosition = $(window).height() + $(window).scrollTop();
      var footHeight = $("footer").innerHeight();
      if (scrollHeight - scrollPosition <= footHeight) {
        // ページトップボタンがフッター手前に来たらpositionとfixedからabsoluteに変更
        returnTop.css({
          position: "absolute",
          bottom: footHeight
        });
      } else {
        returnTop.css({
          position: "fixed",
          bottom: "10px"
        });
      }
    });
  });

  // Informationのタブ切り替え
  var urlParams = new URLSearchParams(window.location.search); // URLパラメーターを取得する関数
  // パラメーターの値を取得、パラメータがない場合はデフォルトの1を返す
  var tabId = urlParams.get('tab') || '1';
  // tabIdの値からタブとコンテンツを切り替える
  var tabId_query = document.querySelector("#tab".concat(tabId));
  var tabContent_query = document.querySelector("#tab-content".concat(tabId));
  if (tabId_query) {
    tabId_query.classList.add('is-active');
  }
  if (tabContent_query) {
    tabContent_query.classList.add('is-active');
  }

  // ページがロードされたときにスクロール位置をトップに戻す
  window.addEventListener('load', function () {
    window.scrollTo(0, 0);
  });

  // モーダルウィンドウ
  $(function () {
    var open = $(".js-modal-open");
    var modal = $(".js-modal");
    // モーダルの表示
    open.on("click", function () {
      // クリックされた番号を取得
      var index = open.index(this);
      // クリックされた番号のモーダルにis-openを付与
      modal.eq(index).addClass("is-open");
      // 背景の固定
      $("body").css({
        height: "100%",
        overflow: "hidden"
      });
    });
    // モーダルを再度クリックしたら閉じる
    modal.on("click", function () {
      modal.removeClass("is-open");
      // 背景の固定解除
      $("body").css({
        height: "",
        overflow: ""
      });
    });
  });

  // アーカイブの矢印トグル
  $(function () {
    $(".js-side-archive__item:first-child .js-side-archive__month-list").css("display", "block");
    $(".js-side-archive__item:first-child .js-side-archive__year").addClass("is-open");
    $(".js-side-archive__year").on("click", function () {
      $(this).toggleClass("is-open");
      $(this).next().slideToggle(300);
    });
  });

  // faqのアコーディオン
  $(function () {
    $(".js-accordion-title").on("click", function () {
      $(this).toggleClass("is-close");
      $(this).next().slideToggle(300);
    });
  });
});