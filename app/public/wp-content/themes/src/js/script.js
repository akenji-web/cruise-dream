
jQuery(function ($) { // この中であればWordpressでも「$」が使用可能になる
  // ハンバーガーメニュー
  $(".js-hamburger, .js-drawer").click(function () {
    $(".js-hamburger").toggleClass("is-active");
    $(".js-header").toggleClass("is-active");
    $(".js-drawer").fadeToggle();
  });

  // リサイズ時にドロワーメニュー解除
  $(window).resize(function(){
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
      $("body").css({ height: "", overflow: "" });
    } else {
      // bodyにheight: 100%とoverflow: hiddenを設定し、スクロールを無効にする
      $("body").css({ height: "100%", overflow: "hidden" });
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
  const mainviewswiper = new Swiper(".js-mainview-swiper", {
    loop: true,
    effect: "fade",
    speed: 1500,
    allowTouchMove: false,
    autoplay: {
      delay: 3000,
    },
  });

  // blogのスライダー
  const blogswiper = new Swiper(".js-blog-swiper", {
    loop: true, //繰り返しをする
    loopedSlides: 4,
    // slidesPerView: 1.2, //一度に表示するスライド枚数
    centeredSlides: true,
    centeredSlidesBounds: true, //アクティブなスライドを中央に配置
    speed: 500,
    spaceBetween: 24, //スライド間の距離を24px
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
        slidesPerView: 1.5, //一度に表示するスライド枚数
      },
      // when window width is >= 600px
      600: {
        slidesPerView: 1.8, //一度に表示するスライド枚数
      },
      // when window width is >= 760px
      768: {
        slidesPerView: 3, //一度に表示するスライド枚数
        spaceBetween: 40, //スライド間の距離を40px
      },
    }
  });


  // フェードインアニメーション
  function delayScrollAnime() {
    var time = 0.3;//遅延時間を増やす秒数の値
    var value = time;
    $('.delayScroll').each(function () {
      var parent = this;					//親要素を取得
      var elemPos = $(this).offset().top;//要素の位置まで来たら
      var scroll = $(window).scrollTop();//スクロール値を取得
      var windowHeight = $(window).height();//画面の高さを取得
      var childs = $(this).children();	//子要素を取得

      if (scroll >= elemPos - windowHeight && !$(parent).hasClass("play")) {//指定領域内にスクロールが入ったらまた親要素にクラスplayがなければ
        $(childs).each(function () {
          if (!$(this).hasClass("js-fade__up")) {//アニメーションのクラス名が指定されているかどうかをチェック
            $(parent).addClass("play");	//親要素にクラス名playを追加
            $(this).css("animation-delay", value + "s");//アニメーション遅延のCSS animation-delayを追加し
            $(this).addClass("js-fade__up");//アニメーションのクラス名を追加
            value = value + time;//delay時間を増加させる

            //全ての処理を終わったらplayを外す
            var index = $(childs).index(this);
            if((childs.length-1) == index){
              $(parent).removeClass("play");
            }
          }
        })
      }else {
        $(childs).removeClass("js-fade__up");//アニメーションのクラス名を削除
        value = time;//delay初期値の数値に戻す
      }
    })
  }

  // 画面をスクロールをしたら動かしたい場合の記述
    $(window).scroll(function (){
      delayScrollAnime();/* アニメーション用の関数を呼ぶ*/
    });// ここまで画面をスクロールをしたら動かしたい場合の記述


  // 画像表示のアニメーション

  //要素の取得とスピードの設定
  var box = $('.js-color-box'),
  speed = 700;

  //.colorboxの付いた全ての要素に対して下記の処理を行う
  box.each(function(){
    $(this).append('<div class="color"></div>')
    var color = $(this).find($('.color')),
    image = $(this).find('img');
    var counter = 0;

    image.css('opacity','0');
    color.css('width','0%');
    //inviewを使って背景色が画面に現れたら処理をする
    color.on('inview', function(){
      if(counter == 0){
        $(this).delay(200).animate({'width':'100%'},speed,function(){
            image.css('opacity','1');
            $(this).css({'left':'0' , 'right':'auto'});
            $(this).animate({'width':'0%'},speed);
        })
        counter = 1;
      }
    });
  });

  // トップへ戻るボタン
  $(function () {
    const returnTop = $(".js-return-top");
    returnTop.hide();
    $(window).scroll(function () {
      if ($(this).scrollTop() > 20) {
        returnTop.fadeIn(100);
      } else {
        returnTop.fadeOut(10);
      }
    });
    returnTop.click(function () {
      $("body, html").animate(
        {
          scrollTop: 0,
        },
        300
      );
      return false;
    });
    // フッター手前でストップ
    returnTop.hide();
    $(window).on("scroll", function () {
      const scrollHeight = $(document).height();
      const scrollPosition = $(window).height() + $(window).scrollTop();
      const footHeight = $("footer").innerHeight();
      if (scrollHeight - scrollPosition <= footHeight) {
        // ページトップボタンがフッター手前に来たらpositionとfixedからabsoluteに変更
        returnTop.css({
          position: "absolute",
          bottom: footHeight,
        });
      } else {
        returnTop.css({
          position: "fixed",
          bottom: "50px",
        });
      }
    });
  });

  // Informationのタブ切り替え
  const urlParams = new URLSearchParams(window.location.search); // URLパラメーターを取得する関数
  // パラメーターの値を取得、パラメータがない場合はデフォルトの1を返す
  const tabId = urlParams.get('tab') || '1';
  // tabIdの値からタブとコンテンツを切り替える
  const tabId_query = document.querySelector(`#tab${tabId}`);
  const tabContent_query = document.querySelector(`#tab-content${tabId}`);
  if (tabId_query) {
    tabId_query.classList.add('is-active');
  }
  if (tabContent_query) {
    tabContent_query.classList.add('is-active');
  }

  // ページがロードされたときにスクロール位置をトップに戻す
  window.addEventListener('load', () => {
    window.scrollTo(0, 0);
  });


  // モーダルウィンドウ
  $(function () {
    const open = $(".js-modal-open");
    const modal = $(".js-modal");
    // モーダルの表示
    open.on("click", function () {
      // クリックされた番号を取得
      const index = open.index(this);
      // クリックされた番号のモーダルにis-openを付与
      modal.eq(index).addClass("is-open");
      // 背景の固定
      $("body").css({ height: "100%", overflow: "hidden" });
    });
    // モーダルを再度クリックしたら閉じる
    modal.on("click", function () {
      modal.removeClass("is-open");
      // 背景の固定解除
      $("body").css({ height: "", overflow: "" });
    });
  });

  // アーカイブの矢印トグル
  $(function () {
    // リロード時先頭だけ開く
    // $(".js-side-archive__item:first-child .js-side-archive__month-list").css(
    //   "display",
    //   "block"
    // );
    // $(".js-side-archive__item:first-child .js-side-archive__year").addClass("is-open");
    $(".js-side-archive__year").on("click", function () {
      $(this).toggleClass("is-open");
      $(this).next().slideToggle(300);
    });
  });

  // faqのアコーディオン
  $(function () {
    $(".js-accordion:first-child .accordion__title").addClass("is-open");
    $(".js-accordion:first-child .accordion__content").css(
      "display",
      "block"
    );
    $(".js-accordion-title").on("click", function () {
      $(this).toggleClass("is-open");
      $(this).next().slideToggle(300);
    });
  });
});
