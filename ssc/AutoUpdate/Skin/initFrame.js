function initFrame() {
    // ��ҳ
    $("#branch").append('<a id="home" href="javascript:;"><span class="icon iconfont">&#xe608;</span>��ҳ</a>')
    $("#home").click(function () {
        sendMessage('GoTo', 'http://www.yituyun.com');
    });
    // ͼ��
    $("#branch").append('<a id="images" href="javascript:;"><span class="iconfont">&#xe60f;</span>ͼ��</a>')
    $("#images").click(function () {
        sendMessage('GoTo', 'http://tuku.yituyun.com');
    });
    // ���
    $("#branch").append('<a id="softwares" href="javascript:;"><span class="iconfont">&#xe623;</span>���</a>')
    $("#softwares").click(function () {
        sendMessage('GoTo', 'http://app.yituyun.com');
    });
    // Ӧ���̳�
    $("#branch").append('<a id="apps" href="javascript:;"><span class="iconfont">&#xe60c;</span>Ӧ���̳�</a>');
    $("#apps").click(function () {
        sendMessage('GoTo', 'http://app.yituyun.com/charge/index');
    });
    // ������
    $("#branch").append('<a id="studio" href="javascript:;"><span class="iconfont">&#xe60d;</span>������</a>');
    $("#studio").click(function () {
        sendMessage('GoTo', 'http://team.yituyun.com/studio');
    });
    // ����
    $("#branch").append('<a id="shequ" href="javascript:;"><span class="iconfont">&#xe610;</span>����</a>');
    $("#shequ").click(function () {
        sendMessage('GoTo', 'http://shequ.yituyun.com');
    });
    // �û�����
    $("#branch").append('<a id="userCenter" href="javascript:;"><span class="iconfont">&#xe624;</span>�û�����</a>');
    $("#userCenter").click(function () {
        sendMessage('GoTo', 'http://team.yituyun.com/users/index');
    });

    // ͷ��
    $("#avatar").click(function () {
        sendMessage('GoTo', 'http://team.yituyun.com/users/index')
    });
}