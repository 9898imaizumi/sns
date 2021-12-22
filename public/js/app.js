// アコーディオンメニュー //
$(function () {
  $('.menu-trigger').click(function () { //メニューボタンタップ後の処理
    $(this).toggleClass('active'); //クリックした要素に「.active」要素を付与
    $('.gnavi').css('display', 'block');//「.gnavi」要素の非表示を表示する
    if ($(this).hasClass('active')) { //もしクリックした要素に「.active」要素があれば
      $('.gnavi').addClass('active');　 //「.active」要素を付与
      $('.accordion-title').addClass('open');
    } else {                            //「.active」要素が無ければ
      $('.gnavi').removeClass('active'); //「.active」要素を外す
      $('.gnavi').css('display', 'none');
      $('.accordion-title').removeClass('open');
    }
  });
});

// アップデート //
$(function () {
  $('.modalopen').each(function () {
    $(this).on('click', function () {
      var target = $(this).data('target');
      var modal = document.getElementById(target);
      console.log(modal);
      $(modal).fadeIn();
      return false;
    });
  });
  $('.modalClose').on('click', function () {
    $('.js-modal').fadeOut();
    return false;
  });
});
