"use strict";

jQuery(function ($) {
  // この中であればWordpressでも「$」が使用可能になる
  $(".js-hamburger, .js-drawerClose").on("click", function () {
    if ($(".js-hamburger").hasClass("is-active")) {
        closeDrawer();
    } else {
        openDrawer();
    }
});

// ページ内スクロール
$(function () {
    // ヘッダーの高さ取得
    const headerHeight = $(".header").outerHeight();
    if (headerHeight) {
        console.log(`Header height: ${headerHeight}px`);
    } else {
        console.log("Header element does not exist or its height could not be retrieved.");
    }
    
    const hash = location.hash;
    if (hash) {
        $("html, body").stop().scrollTop(0);
        scroll(hash, headerHeight);
    }

    $('a[href*="#"]').click(function () {
        // ヘッダーの高さ分下げる
        $(".js-hamburger").removeClass("is-active"); // ハンバーガーボタンの状態をリセット
        $(".js-drawer").removeClass("is-active"); // メニューを非表示状態にする
        $(".js-drawer").css("display", "none"); // メニューコンテナを非表示に設定
        
        var href = $(this).attr("href");
        scroll(href, headerHeight);
        return false;
    });
});

function scroll(href, headerHeight) {
    var speed = 600;
    href = '#' + href.split('#')[1];
    console.log(href);
    
    let target = $(href == "#" || href == "" ? "html" : href);
    var position = target.offset().top - headerHeight;
    
    $("html, body").animate(
        {
            scrollTop: position,
        },
        speed,
        "swing"
    );
}

  // resizeイベント
  $(window).resize(function () {
    if (window.matchMedia("(min-width: 768px)").matches) {
      closeDrawer();
    }
  });
  
  // 新しい関数: openDrawer
  function openDrawer() {
    $(".js-drawer").fadeIn();
    $(".js-hamburger").addClass("is-active");
    $("body").addClass("no-scroll"); // スクロールを無効化
  }
  
  // 新しい関数: closeDrawer
  function closeDrawer() {
    $(".js-drawer").fadeOut();
    $(".js-hamburger").removeClass("is-active");
    $("body").removeClass("no-scroll"); // スクロールを無効化
  }

var topBtn = $(".cycle__button");
topBtn.hide();
$(window).scroll(function () {
  if ($(this).scrollTop() > 800) {
    topBtn.fadeIn();
  } else {
    topBtn.fadeOut();
  }
});
});
document.addEventListener("DOMContentLoaded", function () {
  // mvセクション用のSwiper
  var mvSwiper = new Swiper(".js-mv-swiper", {
    loop: true,
    effect: "fade",
    speed: 3000,
    allowTouchMove: false,
    autoplay: {
      delay: 3000,
    },
  });
    
  // キャンペーンセクション用のSwiper
  var campaignSwiper = new Swiper(".js-campaign-swiper", {
    loop: true,
    // 無限ループ
    slidesPerView: "auto",
    // 一度に表示するスライド数
    slidesPerGroup: 1,
    // 一度に移動するスライド数
    initialSlide: 1,
    // 初期表示スライド
    spaceBetween: 24,
    // スライド間のスペース
    autoplay: {
      delay: 2000,
      // 2秒ごとに自動でスライド
      disableOnInteraction: false, // ユーザーが操作しても自動再生を止めない
    },

    pagination: {
      el: ".swiper-pagination",
      // ページネーションの要素
      clickable: true, // ページネーションをクリック可能にする
    },

    navigation: {
      nextEl: ".swiper-button-next",
      // 次へボタン
      prevEl: ".swiper-button-prev", // 前へボタン
    },

    breakpoints: {
      // タブレットおよびPC用（768px以上）
      768: {
        slidesPerView: "auto",
        // 一度に表示するスライド数
        slidesPerGroup: 1,
        // 一度に移動するスライド数
        initialSlide: 1,
        // 初期表示スライド
        spaceBetween: 40, // スライド間のスペース
      },
    },
  });
  //要素の取得とスピードの設定
  var box = $(".colorbox"),
    speed = 700;

  //.colorboxの付いた全ての要素に対して下記の処理を行う
  box.each(function () {
    $(this).append('<div class="color"></div>');
    var color = $(this).find($(".color")),
      image = $(this).find("img");
    var counter = 0;
    image.css("opacity", "0");
    color.css("width", "0%");
    //inviewを使って背景色が画面に現れたら処理をする
    color.on("inview", function () {
      if (counter == 0) {
        $(this)
          .delay(200)
          .animate(
            {
              width: "100%",
            },
            speed,
            function () {
              image.css("opacity", "1");
              $(this).css({
                left: "auto",
                right: "0",
              });
              $(this).animate(
                {
                  width: "0%",
                },
                speed
              );
            }
          );
        counter = 1;
      }
    });
  });
  // ページトップに戻るボタン
  $(function () {
    var pageTop = $(".js-page-top");
    pageTop.hide();
    $(window).scroll(function () {
      if ($(this).scrollTop() > 200) {
        pageTop.fadeIn();
      } else {
        pageTop.fadeOut();
      }
    });
    pageTop.click(function () {
      $("body, html").animate(
        {
          scrollTop: 0,
        },
        300
      );
      return false;
    });
  });
});

document.addEventListener("DOMContentLoaded", function () {
  // 年ボタンと月リストを取得
  const yearButtons = document.querySelectorAll(".archive-list__year");
  const archiveMonths = document.querySelectorAll(".archive-list__months");

  // 最新の年を取得
  let latestYearButton = null;
  let latestYear = null;

  if (yearButtons.length > 0) {
    latestYearButton = yearButtons[0]; // 最初のボタンが最新の年（降順で出力されている前提）
    latestYear = latestYearButton.getAttribute("data-year"); // 最新の年を取得
  }

  // 最新の年のトグルボタンをアクティブにして月アーカイブを展開
  if (latestYearButton) {
    const monthsList = latestYearButton.parentElement.nextElementSibling;
    latestYearButton.setAttribute("aria-expanded", "true");
    latestYearButton.classList.add("is-active"); // トグルボタンをアクティブに
    monthsList.style.display = "block"; // 最新年の月アーカイブを表示
  }

  // 他の年の月アーカイブを非表示
  archiveMonths.forEach(function (monthsList) {
    const parentYearButton = monthsList.previousElementSibling.querySelector(
      ".archive-list__year"
    );
    if (parentYearButton.getAttribute("data-year") !== latestYear) {
      monthsList.style.display = "none";
      parentYearButton.setAttribute("aria-expanded", "false");
      parentYearButton.classList.remove("is-active");
    }
  });

  // 年ボタンクリック時のトグル動作
  yearButtons.forEach(function (button) {
    button.addEventListener("click", function () {
      const isExpanded = button.getAttribute("aria-expanded") === "true";
      const monthsList = button.parentElement.nextElementSibling;

      if (isExpanded) {
        // トグルを閉じる
        button.setAttribute("aria-expanded", "false");
        button.classList.remove("is-active");
        monthsList.style.display = "none";
      } else {
        // 他の年の月アーカイブを閉じる
        yearButtons.forEach(function (otherButton) {
          otherButton.setAttribute("aria-expanded", "false");
          otherButton.classList.remove("is-active");
          otherButton.parentElement.nextElementSibling.style.display = "none";
        });

        // 現在の年の月アーカイブを展開
        button.setAttribute("aria-expanded", "true");
        button.classList.add("is-active");
        monthsList.style.display = "block";
      }
    });
  });
});

// コース画像モーダル表示イベント
$(".gallery-list__item picture").click(function () {
  // クリックした画像の HTML(<img>タグ全体)を#grayDisplay内にコピー
  $("#grayDisplay").html($(this).prop("outerHTML"));

  // ページ全体のスクロールを無効にする（bodyのoverflowをhiddenに）
  $("body").css("overflow", "hidden");

  // #grayDisplayをフェードインし、固定表示にする
  $("#grayDisplay")
    .css({
      // モーダル背景を黒っぽくする
    })
    .fadeIn(200); // 200ミリ秒でフェードイン

  return false; // デフォ ルトのリンク動作を防止
});

// モーダルクリック時の動作
$("#grayDisplay").click(function () {
  // モーダルをフェードアウトし、スクロールを元に戻す
  $("#grayDisplay").fadeOut(200, function () {
    $("body").css("overflow", "auto"); // スクロールを元に戻す
  });

  return false;
});

document.addEventListener("DOMContentLoaded", function () {
  // 最初のチェックボックスに自動でチェックを入れる
  var firstCheckbox = document.querySelector(
    ".form__checkbox input[type='checkbox']"
  );
  if (firstCheckbox) {
    firstCheckbox.checked = true;
  }
  // すべてのチェックボックスを取得
  var checkboxes = document.querySelectorAll(
    '.form__checkbox input[type="checkbox"]'
  );
  // 各チェックボックスにイベントリスナーを追加
  checkboxes.forEach(function (checkbox) {
    checkbox.addEventListener("change", function () {
      // 現在チェックされたチェックボックス以外のチェックを外す
      checkboxes.forEach(function (box) {
        if (box !== checkbox) {
          box.checked = false;
        }
      });
    });
  });
});

document.addEventListener("DOMContentLoaded", function () {
  // タブボタンとコンテンツを取得
  var tabs = document.querySelectorAll(".information-lower__tab-button");
  var contents = document.querySelectorAll(
    ".information-lower__contents-content"
  );

  // URLパラメータからタブIDを取得
  var urlParams = new URLSearchParams(window.location.search);
  var initialTab = urlParams.get("tab") || "tab01"; // パラメータがない場合は "tab01"

  // 初期表示: URLパラメータに基づいて表示
  tabs.forEach(function (tab) {
    if (tab.getAttribute("data-number") === initialTab) {
      tab.classList.add("is-active");
    } else {
      tab.classList.remove("is-active");
    }
  });
  contents.forEach(function (content) {
    if (content.id === initialTab) {
      content.classList.add("is-active");
    } else {
      content.classList.remove("is-active");
    }
  });

  // タブクリックイベント
  tabs.forEach(function (tab) {
    tab.addEventListener("click", function (e) {
      e.preventDefault();
      var targetTab = this.getAttribute("data-number");

      // タブのアクティブ状態を更新
      tabs.forEach(function (t) {
        t.classList.remove("is-active");
      });
      this.classList.add("is-active");

      // 対応するコンテンツを表示
      contents.forEach(function (content) {
        if (content.id === targetTab) {
          content.classList.add("is-active");
        } else {
          content.classList.remove("is-active");
        }
      });

      // URLを更新（履歴に追加）
      var newUrl = new URL(window.location);
      newUrl.searchParams.set("tab", targetTab);
      history.pushState(null, "", newUrl);
    });
  });
});

$(document).ready(function () {
  // クリックイベントでトグル
  $(".faq-list__item-question").on("click", function () {
    const $content = $(this).next();

    if (!$(this).hasClass("is-active")) {
      $content.stop().slideDown(300); // 0.3秒で表示
      $(this).addClass("is-active");
    } else {
      $content.stop().slideUp(300); // 0.3秒で隠す
      $(this).removeClass("is-active");
    }
  });
});

// //   // WordPressキャンペーンのタブ切り替え
// // タブクリック時の切り替え処理
// tabs.forEach(function (tab) {
//   tab.addEventListener("click", function (e) {
//     e.preventDefault();
//     var targetTab = this.getAttribute("data-number");

//     // タブのアクティブ状態を更新
//     tabs.forEach(function (t) {
//       return t.classList.remove("is-active");
//     });
//     this.classList.add("is-active");

//     // コンテンツのアクティブ状態を更新
//     tabContents.forEach(function (content) {
//       content.classList.toggle("is-active", content.id === targetTab);
//     });

//     // URLクエリーパラメーターを更新
//     var newUrl = "".concat(window.location.pathname, "?tab=").concat(targetTab);
//     history.pushState(null, "", newUrl);
//   });
// });
