!
function() {
    function a() {
        var b = $("div.wrap"),
        c = $("div.main", b),
        d = $("p.page-bg", b);
        c.off().on("mouseenter", "div.change-handle",
        function() {
            var a = $(this),
            c = a.attr("data-bg"),
            e = $("p." + c, b);
            "block" !== e.css("display") && (d.fadeOut(500), e.fadeIn(500))
        })
    }
    a()
} (window);



        console.log("%c%s",
            "color: #4fb4f7; font-size: 14px; font-weight: bold;font-family:microsoft yahei",
            "诶你居然在看Console！( · ω · )\nwww看来你也懂点技术呢(*￣▽￣*)ブ\n来吧，如果你是技术宅，如果你对我们的网页及开源项目感兴趣，欢迎加入我们！\n项目主页▶https://github.com/zhxsu\n联系或加入我们欢迎致函df7c5117@gmail.com");

