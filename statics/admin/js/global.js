$(function () {

	$('.aw-content-wrap .md-tip').tooltip('hide');
    // 顶部按钮收缩左侧菜单
    $('.aw-header .mod-head-btn').click(function ()
    {
        if ($('#aw-side').is(':visible'))
        {
            $('#aw-side').hide();

            $('.aw-content-wrap, .aw-footer').addClass('active');
        }
        else
        {
            $('#aw-side').show();

            $('.aw-content-wrap, .aw-footer').removeClass('active');
        }
    });

    // 左侧导航模拟滚动条
    $("#aw-side").perfectScrollbar({
        wheelSpeed: 20,
        wheelPropagation: true,
        minScrollbarLength: 20
    });

    // 左侧导航菜单的折叠与展开
    $('.mod-bar > li > a').click(function ()
    {
        if ($(this).next().is(':visible'))
        {
            $(this).next().slideUp('');

            $(this).removeClass('active');
        }
        else
        {
            $('#aw-side').find('li').children('ul').slideUp('slow');

            $(this).addClass('active').parent().siblings().find('a').removeClass('active');

            $(this).next().slideDown('');
        }

        $("#aw-side").perfectScrollbar('update');
    });

    // 日期选择
    if (typeof (DateInput) != 'undefined')
    {
        $('input.mod-data').date_input();
    }

    // 单选框 input checked radio 初始化
    $('.aw-content-wrap').find("input").iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%'
    });

    // input 菜单折叠，展开、拖动
    $('.aw-nav-menu li .mod-set-head').click(function ()
    {
        if ($(this).parents('li').find('.mod-set-body').is(':visible'))
        {
            $(this).parents('li').find('.mod-set-body').slideUp();
        }
        else
        {
            $(this).parents('li').find('.mod-set-body').slideDown();

            $(this).parents('li').siblings('li').find('.mod-set-body').slideUp();
        }
    });

    $(".aw-nav-menu").find('ul:first').dragsort({
        dragEnd: function () {
            var arr = [];
            $.each($('.aw-nav-menu ul li'), function (i, e) {
                arr.push($(this).attr('data-sort'));
            });
            $('#nav_sort').val(arr.join(','));

        }
    });


    // input 单选框全选or 全取消
    $('.aw-content-wrap .table').find(".check-all").on('ifChecked', function (e)
    {
        e.preventDefault();

        $(this).parents('table').find(".icheckbox_square-blue").iCheck('check');
    });

    $('.aw-content-wrap .table').find(".check-all").on('ifUnchecked', function (e)
    {
        e.preventDefault();

        $(this).parents('table').find(".icheckbox_square-blue").iCheck('uncheck');
    });

	// input 单选框全选or 全取消
    $('.aw-content-wrap .table').find(".check-list").on('ifChecked', function (e)
    {
        e.preventDefault();

        $(this).parents('tr').find(".icheckbox_square-blue").iCheck('check');
    });

    $('.aw-content-wrap .table').find(".check-list").on('ifUnchecked', function (e)
    {
        e.preventDefault();

        $(this).parents('tr').find(".icheckbox_square-blue").iCheck('uncheck');
    });

	// input 单选框全选or 全取消
    $('.aw-content-wrap .table').find(".check-list-list").on('ifChecked', function (e)
    {
        e.preventDefault();

        $(this).parents('div[class="row"]').find(".icheckbox_square-blue").iCheck('check');
    });

    $('.aw-content-wrap .table').find(".check-list-list").on('ifUnchecked', function (e)
    {
        e.preventDefault();

        $(this).parents('div[class="row"]').find(".icheckbox_square-blue").iCheck('uncheck');
    });

    $('#sorttable thead td:eq(2)').click();

});