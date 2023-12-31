$('.img-custom-effect').click(function(){
    var imgSrc = $(this).attr("src");
    $('#modal-img').attr("src",imgSrc);
})


// 瀑布流
document.addEventListener("DOMContentLoaded", function() {
        var container = document.querySelector("#masonry-container");
        var masonry = new Masonry(container, {
            itemSelector: "img",
            columnWidth: auto,
            gutter: 10
        });
    });

// 打字机效果
const lines = [
        "Hi! </br> I am Yuanzhou Song, a coder. </br> I am looking for a remote job now..."
];
const speed = 100; // 每个字符的打字速度，单位为毫秒
let currentLine = 0; // 当前显示的行号
let index = 0; // 当前字符的下标
let timer; // 定时器

function typeWriter() {
    if (index <= lines[currentLine].length) {
        $(".synopsis").html(lines[currentLine].substring(0, index) + "|");
        index++;
        timer = setTimeout(typeWriter, speed);
    } else {
        clearTimeout(timer);
        $(".synopsis").html($(".synopsis").html().replace("|", ""));
        currentLine++;
        index = 0;
        if (currentLine < lines.length) {
            setTimeout(startType, 1000);
        }
    }
}
function startType() {
    typeWriter();
}
startType();


//一键回页顶
$(document).ready(function(){
    $('#scrollToTopBtn').fadeOut();
    $(window).scroll(function(){
    if ($(this).scrollTop() > $(window).height()) {
      $('#scrollToTopBtn').fadeIn();
    } else {
      $('#scrollToTopBtn').fadeOut();
    }
  });
})

function scrollToTop() {
  window.scrollTo({
    top: 0,
    behavior: "smooth"
  });
}


// 获取所有回复按钮，并添加点击事件监听器
$('.reply-btn').click(function(){
    var comment_id = $(this).data('info');
    var comment_name = $(this).data('cname');
    $('#parent-val').val(comment_id);
    $('#reply-to-name').text('Reply to '+comment_name);
})
