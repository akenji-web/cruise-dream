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

  // blogのスライダー
  var blogswiper = new Swiper(".js-blog-swiper", {
    loop: true,
    //繰り返しをする
    loopedSlides: 4,
    // slidesPerView: 1.2, //一度に表示するスライド枚数
    centeredSlides: true,
    centeredSlidesBounds: true,
    //アクティブなスライドを中央に配置
    speed: 500,
    spaceBetween: 24,
    //スライド間の距離を24px
    effect: "slide",
    autoplay: {
      delay: 10000,
      waitForTransition: false
    },
    navigation: {
      prevEl: '.swiper-button-next',
      nextEl: '.swiper-button-prev'
    },
    breakpoints: {
      // when window width is >= 450px
      450: {
        slidesPerView: 1.5 //一度に表示するスライド枚数
      },

      // when window width is >= 600px
      600: {
        slidesPerView: 1.8 //一度に表示するスライド枚数
      },

      // when window width is >= 760px
      768: {
        slidesPerView: 3,
        //一度に表示するスライド枚数
        spaceBetween: 40 //スライド間の距離を40px
      }
    }
  });

  // フェードインアニメーション
  function delayScrollAnime() {
    var time = 0.3; //遅延時間を増やす秒数の値
    var value = time;
    $('.delayScroll').each(function () {
      var parent = this; //親要素を取得
      var elemPos = $(this).offset().top; //要素の位置まで来たら
      var scroll = $(window).scrollTop(); //スクロール値を取得
      var windowHeight = $(window).height(); //画面の高さを取得
      var childs = $(this).children(); //子要素を取得

      if (scroll >= elemPos - windowHeight && !$(parent).hasClass("play")) {
        //指定領域内にスクロールが入ったらまた親要素にクラスplayがなければ
        $(childs).each(function () {
          if (!$(this).hasClass("js-fade__up")) {
            //アニメーションのクラス名が指定されているかどうかをチェック
            $(parent).addClass("play"); //親要素にクラス名playを追加
            $(this).css("animation-delay", value + "s"); //アニメーション遅延のCSS animation-delayを追加し
            $(this).addClass("js-fade__up"); //アニメーションのクラス名を追加
            value = value + time; //delay時間を増加させる

            //全ての処理を終わったらplayを外す
            var index = $(childs).index(this);
            if (childs.length - 1 == index) {
              $(parent).removeClass("play");
            }
          }
        });
      } else {
        $(childs).removeClass("js-fade__up"); //アニメーションのクラス名を削除
        value = time; //delay初期値の数値に戻す
      }
    });
  }

  // 画面をスクロールをしたら動かしたい場合の記述
  $(window).scroll(function () {
    delayScrollAnime(); /* アニメーション用の関数を呼ぶ*/
  }); // ここまで画面をスクロールをしたら動かしたい場合の記述

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
    // $(".js-accordion-title").on("click", function () {
    //   $(this).toggleClass("is-close");
    //   $(this).next().slideToggle(300);
    // });
    $(".js-accordion:first-child .accordion__title").addClass("is-open");
    $(".js-accordion:first-child .accordion__content").css("display", "block");
    $(".js-accordion-title").on("click", function () {
      $(this).toggleClass("is-open");
      $(this).next().slideToggle(300);
    });
  });

  // wave
  var unit = 100,
    canvasList,
    // キャンバスの配列
    info = {},
    // 全キャンバス共通の描画情報
    colorList; // 各キャンバスの色情報

  /**
   * Init function.
   * 
   * Initialize variables and begin the animation.
   */
  function init() {
    info.seconds = 0;
    info.t = 0;
    canvasList = [];
    colorList = [];
    // canvas1個めの色指定
    canvasList.push(document.getElementById("waveCanvas"));
    colorList.push(['#333', '#666', '#111']); //重ねる波の色設定
    // 各キャンバスの初期化
    for (var canvasIndex in canvasList) {
      var canvas = canvasList[canvasIndex];
      canvas.width = document.documentElement.clientWidth; //Canvasのwidthをウィンドウの幅に合わせる
      canvas.height = 200; //波の高さ
      canvas.contextCache = canvas.getContext("2d");
    }
    // 共通の更新処理呼び出し
    update();
  }
  function update() {
    for (var canvasIndex in canvasList) {
      var canvas = canvasList[canvasIndex];
      // 各キャンバスの描画
      draw(canvas, colorList[canvasIndex]);
    }
    // 共通の描画情報の更新
    info.seconds = info.seconds + .014;
    info.t = info.seconds * Math.PI;
    // 自身の再起呼び出し
    setTimeout(update, 35);
  }

  /**
   * Draw animation function.
   * 
   * This function draws one frame of the animation, waits 20ms, and then calls
   * itself again.
   */
  function draw(canvas, color) {
    // 対象のcanvasのコンテキストを取得
    var context = canvas.contextCache;
    // キャンバスの描画をクリア
    context.clearRect(0, 0, canvas.width, canvas.height);

    //波の重なりを描画 drawWave(canvas, color[数字（波の数を0から数えて指定）], 透過, 波の幅のzoom,波の開始位置の遅れ )
    drawWave(canvas, color[0], 0.5, 3, 0); //0.5⇒透過具合50%、3⇒数字が大きいほど波がなだらか
    drawWave(canvas, color[1], 0.4, 2, 250);
    drawWave(canvas, color[2], 0.2, 1.6, 100);
  }

  /**
  * 波を描画
  * drawWave(色, 不透明度, 波の幅のzoom, 波の開始位置の遅れ)
  */
  function drawWave(canvas, color, alpha, zoom, delay) {
    var context = canvas.contextCache;
    context.fillStyle = color; //塗りの色
    context.globalAlpha = alpha;
    context.beginPath(); //パスの開始
    drawSine(canvas, info.t / 0.5, zoom, delay);
    context.lineTo(canvas.width + 10, canvas.height); //パスをCanvasの右下へ
    context.lineTo(0, canvas.height); //パスをCanvasの左下へ
    context.closePath(); //パスを閉じる
    context.fill(); //波を塗りつぶす
  }

  /**
   * Function to draw sine
   * 
   * The sine curve is drawn in 10px segments starting at the origin. 
   * drawSine(時間, 波の幅のzoom, 波の開始位置の遅れ)
   */
  function drawSine(canvas, t, zoom, delay) {
    var xAxis = Math.floor(canvas.height / 2);
    var yAxis = 0;
    var context = canvas.contextCache;
    // Set the initial x and y, starting at 0,0 and translating to the origin on
    // the canvas.
    var x = t; //時間を横の位置とする
    var y = Math.sin(x) / zoom;
    context.moveTo(yAxis, unit * y + xAxis); //スタート位置にパスを置く

    // Loop to draw segments (横幅の分、波を描画)
    for (i = yAxis; i <= canvas.width + 10; i += 10) {
      x = t + (-yAxis + i) / unit / zoom;
      y = Math.sin(x - delay) / 3;
      context.lineTo(i, unit * y + xAxis);
    }
  }
  init();
});