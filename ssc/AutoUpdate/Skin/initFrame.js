function initFrame() {
    // 首页
    $("#branch").append('<a id="home" href="javascript:;"><span class="icon iconfont">&#xe608;</span>首页</a>')
    $("#home").click(function () {
        sendMessage('GoTo', 'http://www.yituyun.com');
    });
    // 图库
    $("#branch").append('<a id="images" href="javascript:;"><span class="iconfont">&#xe60f;</span>图库</a>')
    $("#images").click(function () {
        sendMessage('GoTo', 'http://tuku.yituyun.com');
    });
    // 软件
    $("#branch").append('<a id="softwares" href="javascript:;"><span class="iconfont">&#xe623;</span>软件</a>')
    $("#softwares").click(function () {
        sendMessage('GoTo', 'http://app.yituyun.com');
    });
    // 应用商城
    $("#branch").append('<a id="apps" href="javascript:;"><span class="iconfont">&#xe60c;</span>应用商城</a>');
    $("#apps").click(function () {
        sendMessage('GoTo', 'http://app.yituyun.com/charge/index');
    });
    // 工作室
    $("#branch").append('<a id="studio" href="javascript:;"><span class="iconfont">&#xe60d;</span>工作室</a>');
    $("#studio").click(function () {
        sendMessage('GoTo', 'http://team.yituyun.com/studio');
    });
    // 社区
    $("#branch").append('<a id="shequ" href="javascript:;"><span class="iconfont">&#xe610;</span>社区</a>');
    $("#shequ").click(function () {
        sendMessage('GoTo', 'http://shequ.yituyun.com');
    });
    // 用户中心
    $("#branch").append('<a id="userCenter" href="javascript:;"><span class="iconfont">&#xe624;</span>用户中心</a>');
    $("#userCenter").click(function () {
        sendMessage('GoTo', 'http://team.yituyun.com/users/index');
    });

    // 头像
    $("#avatar").click(function () {
        sendMessage('GoTo', 'http://team.yituyun.com/users/index')
    });
}