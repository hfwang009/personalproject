<?php
return array(
	'app' => array(
		1 => array(
			'subject' => '基本设置',
			'column' => 'setting',
			'icon' => 'icon-setting',
			'submenu' => array(
				array('subject' => '站点信息设置', 'link' => 'admin/adminSettingPanel/index', 'controller'=>'adminSettingPanel'),
			),
		),
		2 => array(
			'subject' => '产品',
			'column' => 'product',
			'icon' => 'icon-user',
			'submenu' => array(
				array('subject' => '套餐列表', 'link' => 'admin/adminPackage/index', 'controller'=>'adminPackage'),
			),
		),
		3 => array(
			'subject' => '门店',
			'column' => 'store',
			'icon' => 'icon-signup',
			'submenu' => array(
				array('subject' => '门店列表', 'link' => 'admin/adminStore/index', 'controller'=>'adminStore'),
			),
		),
		4 => array(
				'subject' => '质保',
				'column' => 'warranty',
				'icon' => 'icon-order',
				'submenu' => array(
                    array('subject' => '品牌列表', 'link' => 'admin/adminBrand/index', 'controller'=>'adminBrand'),
                    array('subject' => '型号列表', 'link' => 'admin/adminModel/index', 'controller'=>'adminModel'),
                    array('subject' => '产品列表', 'link' => 'admin/adminProduct/index', 'controller'=>'adminProduct'),
					array('subject' => '质保列表', 'link' => 'admin/adminWarranty/index', 'controller'=>'adminWarranty'),
					array('subject' => '质保出入明细列表', 'link' => 'admin/adminWarrantyDetail/index', 'controller'=>'adminWarrantyDetail'),
				),
		),
        5 => array(
            'subject' => '资讯',
            'column' => 'news',
            'icon' => 'icon-reply',
            'submenu' => array(
                array('subject' => '资讯列表', 'link' => 'admin/adminNews/index', 'controller'=>'adminNews'),
                array('subject' => '文章列表', 'link' => 'admin/adminArticle/index', 'controller'=>'adminArticle'),
            ),
        ),
        6 => array(
            'subject' => '管理员管理',
            'column' => 'admin',
            'icon' => 'icon-reply',
            'submenu' => array(
                array('subject' => '管理员设置', 'link' => 'admin/adminList/index', 'controller'=>'adminList'),
                array('subject' => '管理员角色设置', 'link' => 'admin/adminRole/index', 'controller'=>'adminRole'),
                array('subject' => '管理员权限设置', 'link' => 'admin/adminPrivilieges/index', 'controller'=>'adminPrivilieges'),
            ),
        ),
		7 => array(
			'subject' => '工具设置',
			'column' => 'tools',
			'icon' => 'icon-reply',
			'submenu' => array(
					array('subject' => '缓存清理工具', 'link' => 'admin/adminTools/index', 'controller'=>'adminTools'),
			),
		)
	)
);
?>
