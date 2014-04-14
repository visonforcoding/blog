$(function() {
    $('#sub_comment').attr('disabled', true);
    $('#comment').keyup(function() {
        var inlen = $('#comment').val().length;
        var nums = 150 - inlen;
        $('#input_nums').text(nums);
        if (nums < 1 || inlen < 1) {
            $('#sub_comment').attr('disabled', true);
        } else {
            $('#sub_comment').attr('disabled', false);
        }
    });
    $('.carousel').carousel({
        interval: 4000
    });
//回到顶部插件
    $.scrollUp({
        scrollName: 'scrollUp', // Element ID
        topDistance: '300', // Distance from top before showing element (px)
        topSpeed: 300, // Speed back to top (ms)
        animation: 'fade', // Fade, slide, none
        animationInSpeed: 200, // Animation in speed (ms)
        animationOutSpeed: 200, // Animation out speed (ms)
        scrollText: '', // Text for element
        activeOverlay: false // Set CSS color to display scrollUp active point, e.g '#00FFFF'
    });
    /****************login page**********************/
    /*******************form submit*****************************/
    $('#comment_form form').submit(function() {

    });







});
/**
 *
 *微博关注按钮
 *
 */

/**
 * 
 * QQ空间分享按钮
 */
function setQzoneBtn() {
    var p = {
        url: location.href,
        showcount: '1', /*是否显示分享总数,显示：'1'，不显示：'0' */
        desc: 'ffff', /*默认分享理由(可选)*/
        summary: 'fdddd', /*分享摘要(可选)*/
        title: 'eeee', /*分享标题(可选)*/
        site: '小绾的博客', /*分享来源 如：腾讯网(可选)*/
        pics: '', /*分享图片的路径(可选)*/
        style: '102',
        width: 145,
        height: 24
    };
    var s = [];
    for (var i in p) {
        s.push(i + '=' + encodeURIComponent(p[i] || ''));
    }
    document.write(['<a version="1.0" class="qzOpenerDiv" \n\
      href="http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?', s.join('&'),
        '" target="_blank">分享</a>'].join(''));
}
function loadQzoneScript() {
    var script = document.createElement("script");
    script.src = "http://qzonestyle.gtimg.cn/qzone/app/qzlike/qzopensl.js#jsdate=20111201";
    document.body.appendChild(script);
}  