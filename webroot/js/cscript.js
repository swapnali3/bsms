// $(document).on("click", ".ftimage", function () {
//   if ($(".ft_rect_logo").data('image') == 1) {
//     $(".ft_rect_logo").attr('src', baseurl+'img/icon.png').attr('style', 'width: 2.7vw;').data('image', '2');
//   }
//   else {
//     $(".ft_rect_logo").attr('src', baseurl+'img/icon.png').attr('style','width: 2.6vw;').data('image', '1');
//   }
// });
$(".ftimage").trigger("click");
let parent = document.getElementById('id_sidebar');
parent.onmouseover = parent.onmouseout = handler;

function handler(event) {
    $(".ftimage").trigger("click");
}