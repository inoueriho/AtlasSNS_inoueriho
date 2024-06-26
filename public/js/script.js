$(function () {
  $('.menu-btn').click(function () {
    $(this).toggleClass('active');
    $(this).next('.menu').slideToggle();
  });
})

// $(function () {
//   // 編集ボタン(class="js-modal-open")が押されたら発火
//   $('.js-modal-open').on('click', function () {
//     // モーダルの中身(class="js-modal")の表示
//     $('.js-modal').fadeIn();
//     // 押されたボタンから投稿内容を取得し変数へ格納
//     var post = $(this).attr('post');
//     // 押されたボタンから投稿のidを取得し変数へ格納（どの投稿を編集するか特定するのに必要な為）
//     var post_id = $(this).attr('post_id');

//     // 取得した投稿内容をモーダルの中身へ渡す
//     $('.modal_post').text(post);
//     // 取得した投稿のidをモーダルの中身へ渡す
//     $('.modal_id').val(post_id);
//     return false;
//   });

//   // 背景部分や閉じるボタン(js-modal-close)が押されたら発火
//   $('.js-modal-close').on('click', function () {
//     // モーダルの中身(class="js-modal")を非表示
//     $('.js-modal').fadeOut();
//     return false;
//   });
// });

//モーダルを開く処理
$(function () {
  $('.js-modal-open').on('click', function () {
    $('.js-modal').fadeIn();
    var post = $(this).children('.edit-img').attr('post');
    // index.blade.phpに書いてる$listとかは使えないから新たに記述。
    // まず、thisにはクリックした値が入る。
    // ここではつまりjs-modal-open。
    // js-modal-openの子要素のedit-imgにあるpostという属性をpostにします。
    // attrというのは属性という意味。
    console.log(post);
    var post_id = $(this).children('.edit-img').attr('post_id');
    console.log(post_id);

    $('.edit-post').val(post);
    $('.modal_id').val(post_id);
    return false;
  });

  $('.js-modal-close').on('click', function () {
    $('.js-modal').fadeOut();
    return false;
  });
});
