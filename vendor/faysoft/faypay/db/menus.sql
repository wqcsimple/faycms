INSERT INTO `{{$prefix}}menus` (`id`, `parent`, `alias`, `title`, `css_class`, `link`) VALUES ('3000', '100', '', '支付方式', 'fa fa-dollar', 'javascript:');
INSERT INTO `{{$prefix}}menus` (`id`, `parent`, `alias`, `title`, `css_class`, `link`) VALUES ('3001', '3000', '', '所有支付方式', '', 'faypay/admin/method/index');
INSERT INTO `{{$prefix}}menus` (`id`, `parent`, `alias`, `title`, `css_class`, `link`) VALUES ('3002', '3000', '', '添加支付方式', '', 'faypay/admin/method/create');