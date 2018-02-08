USE `gman_db`;

/*Table structure for table `admin_meneger` */

DROP TABLE IF EXISTS `admin_meneger`;

CREATE TABLE `admin_meneger` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) COLLATE utf8_bin NOT NULL COMMENT '姓名',
  `number` varchar(64) COLLATE utf8_bin NOT NULL COMMENT '员工编号',
  `password` varchar(64) COLLATE utf8_bin NOT NULL COMMENT '密码',
  `phone` varchar(11) COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT '手机',
  `email` varchar(255) COLLATE utf8_bin NOT NULL COMMENT '员工邮箱',
  `picture` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT '图片',
  `desc` varchar(512) COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT '描述',
  `role_id` int(11) NOT NULL COMMENT '角色ID',
  `sex` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0女 1 男',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '组状态: 1 启用 0 停用',
  `add_time` datetime DEFAULT NULL COMMENT '创建时间',
  `del_time` datetime DEFAULT NULL COMMENT '停用时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `_number_index` (`number`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `admin_meneger` */

insert  into `admin_meneger`(`id`,`name`,`number`,`password`,`phone`,`email`,`picture`,`desc`,`role_id`,`sex`,`status`,`add_time`,`del_time`) values (1,'宋扬(600591)','600591','111111','','songyang600591@sf-express.com','','',2,0,1,'2015-12-10 15:17:05',NULL),(2,'黄中雷','686107','111111','','huangzhonglei@sf-express.com','','',2,0,1,'2015-12-10 16:42:27',NULL),(3,'余浩苗','698549','111111','','yu.haomiao@sf-express.com','','',2,0,1,'2015-12-20 22:22:07',NULL),(4,'admin','000000','96e79218965eb72c92a549dd5a330112','','admin@admin.com','','',1,0,1,'2016-02-22 11:10:49',NULL),(5,'周亚玲','824529','e3fa1c517aef0b557d03ce507d055e73','','zhou.yaling@sf-express.com','','',3,0,1,'2016-02-22 11:18:43',NULL),(6,'陈涛','696193','ddf3f248634e81954ad9d8813b0f35f0','','chentao696193@sf-express.com','','',3,0,1,'2016-02-22 11:19:52',NULL),(7,'王昀嫣','357085','77b52af23ec32342098a14423d364f20','','wangyunyan@sf-express.com','','',5,0,1,'2016-02-22 11:22:43',NULL),(8,'李泽明','717165','b2890856220545390be476b62431e40c','','lizeming@sf-express.com','','',4,0,1,'2016-02-22 11:23:39',NULL),(9,'周军龙','835038','442d8e51d7195b738ee9d73f600b9213','','zhoujunlong@sf-express.com','','',4,0,1,'2016-02-22 11:24:20',NULL),(13,'张祥凤(705943)','705943','111111','','ZHANGXIANGFENG1@sf-express.com','','',2,0,1,'2016-09-06 21:22:07',NULL),(15,'李晓亮(776364)','776364','111111','','lxiaoliang@sf-express.com','','',2,0,1,'2016-09-06 21:35:58',NULL),(16,'孙国梁(594290)','594290','111111','','sunguoliang@sf-express.com','','',2,0,1,'2016-09-08 14:27:21',NULL),(17,'乔文会(656406)','656406','111111','','qiaowenhui@sf-express.com','','',2,0,1,'2016-09-09 18:36:32',NULL),(18,'谭佐宸(348918)','348918','111111','','tanzuochen@sf-express.com','','',2,0,1,'2016-09-12 15:10:40',NULL),(19,'焦春香(594288)','594288','111111','','jiaochunxiang@sf-express.com','','',2,0,1,'2016-09-12 17:58:15',NULL),(20,'李岩(826045)','826045','111111','','li.yan@sf-express.com','','',2,0,1,'2016-09-13 11:52:29',NULL),(21,'郑稔珊(690530)','690530','111111','','zhengrenshan@sf-express.com','','',2,0,1,'2016-09-18 11:31:25',NULL),(22,'耿杨(346059)','346059','111111','','gengyang346059@sf-express.com','','',2,0,1,'2016-09-20 12:09:33',NULL),(23,'李信(804612)','804612','111111','','li.xin@sf-express.com','','',2,0,1,'2016-10-09 14:02:27',NULL),(24,'吴智斌(804447)','804447','111111','','wuzhibin@sf-express.com','','',2,0,1,'2016-10-09 14:09:51',NULL),(25,'刘馨远(807827)','807827','111111','','liu.xinyuan@sf-express.com','','',2,0,1,'2016-10-12 14:40:22',NULL),(26,'刘峰(821216)','821216','111111','','liu.feng@sf-express.com','','',2,0,1,'2016-10-12 15:52:37',NULL),(27,'王青腾(424555)','424555','111111','','wangqingteng@sf-express.com','','',2,0,1,'2016-10-17 11:41:02',NULL),(28,'郭洪亮(606114)','606114','111111','','guohongliang@sf-express.com','','',2,0,1,'2016-10-17 11:53:07',NULL),(30,'冯光耀(794299)','794299','111111','','fengguangyao@sf-express.com','','',2,0,1,'2016-11-04 11:28:32',NULL),(31,'王伟(01144430)','01144430','111111','','wang.wei2@sf-express.com','','',2,0,1,'2016-11-04 11:40:17',NULL),(32,'张红星(01189367)','01189367','111111','','zhang.hongxing@sf-express.com','','',2,0,1,'2016-11-04 11:41:02',NULL),(33,'皮庚才(01194954)','01194954','111111','','pi.gengcai1@sf-express.com','','',2,0,1,'2016-11-04 11:41:19',NULL),(34,'鲁楠(01178271)','01178271','111111','','lu.nan@sf-express.com','','',2,0,1,'2016-11-04 11:42:17',NULL),(35,'张卫涛(01195957)','01195957','111111','','zhang.weitao@sf-express.com','','',2,0,1,'2016-11-04 11:46:17',NULL),(36,'赵凤龙(01254542)','01254542','111111','','zhao.fenglong@sf-express.com','','',2,0,1,'2016-11-09 13:55:53',NULL),(37,'陈昌群(01242247)','01242247','111111','','chen.changqun@sf-express.com','','',2,0,1,'2016-11-15 10:35:37',NULL),(38,'杜秀兵(835599)','835599','111111','','duxiubing@sf-express.com','','',2,0,1,'2016-11-15 10:35:40',NULL),(39,'邵长江(01218376)','01218376','111111','','shao.changjiang@sf-express.com','','',2,0,1,'2016-11-15 10:35:55',NULL),(40,'耿婵媛(861051)','861051','111111','','gengchanyuan@sf-express.com','','',2,0,1,'2016-11-15 10:38:28',NULL),(41,'程龙(853032)','853032','111111','','chenglong22@sf-express.com','','',2,0,1,'2016-11-15 10:40:04',NULL),(42,'王冬冰(01192665)','01192665','111111','','wang.dongbing1@sf-express.com','','',2,0,1,'2016-11-15 10:43:31',NULL),(43,'王松辉(01213016)','01213016','111111','','wang.songhui@sf-express.com','','',2,0,1,'2016-11-16 11:00:01',NULL),(44,'房继新(01239875)','01239875','111111','','fang.jixin@sf-express.com','','',2,0,1,'2016-11-21 10:55:56',NULL),(45,'王拓(01237177)','01237177','111111','','wang.tuo@sf-express.com','','',2,0,1,'2016-11-21 11:00:30',NULL),(46,'王曙光(01213720)','01213720','111111','','wang.shuguang@sf-express.com','','',2,0,1,'2016-12-20 10:21:40',NULL),(47,'王晶(01319126)','01319126','111111','','wang.jing1@sf-express.com','','',2,0,1,'2017-01-04 13:53:19',NULL);

/*Table structure for table `admin_menu` */

DROP TABLE IF EXISTS `admin_menu`;

CREATE TABLE `admin_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL DEFAULT '0' COMMENT '上级ID',
  `sort` tinyint(4) NOT NULL DEFAULT '1' COMMENT '排序',
  `name` varchar(32) COLLATE utf8_bin NOT NULL COMMENT '菜单名称',
  `icon` varchar(32) COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT '图标',
  `link` varchar(128) COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT '连接',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '状态: 1 启用 0 停用',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `admin_menu` */

insert  into `admin_menu`(`id`,`pid`,`sort`,`name`,`icon`,`link`,`status`) values (1,0,1,'用户管理','&#xe62d;','',0),(2,1,1,'管理员列表','','/User/Manager/Index',0),(3,1,2,'角色管理','','/User/Manager/Role',0),(4,1,3,'权限管理','','/User/Manager/Permission',0),(5,0,2,'系统管理','&#xe62e;','',1),(6,5,2,'系统图标','','/Index/System/Icon',1),(7,0,3,'会员管理','&#xe60d;','',0),(8,7,1,'会员列表','','/User/User/Index',1),(9,0,4,'内容管理','&#xe616;','',1),(10,9,1,'资讯管理','','/Cms/Article/Index',1),(11,0,5,'图片管理','&#xe613;','',1),(12,11,1,'图片管理','','/Cms/Picture/Index',1),(13,0,7,'评论管理','&#xe622;','',1),(14,13,1,'意见反馈','','/Cms/Article/Feedback',1),(15,0,6,'产品管理','&#xe620;','',1),(16,15,1,'产品管理','','/Product/Product/Index',1),(17,15,2,'分类管理','','/Product/Category/Index',1),(18,15,3,'品牌管理','','/Product/Brand/Index',1),(19,5,1,'菜单管理','','/Index/System/Menu',1);

/*Table structure for table `admin_role` */

DROP TABLE IF EXISTS `admin_role`;

CREATE TABLE `admin_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(32) COLLATE utf8_bin NOT NULL COMMENT '角色类型',
  `menu_ids` varchar(512) COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT '权限菜单',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '状态 0、禁用 1、启用',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `admin_role` */

insert  into `admin_role`(`id`,`role_name`,`menu_ids`,`status`) values (1,'管理员','2,3,4,19,6,8,10,12,16,17,18,14',1),(2,'研发组','',1),(3,'测试组','',1),(4,'运维组','',1),(5,'数据组','',1),(6,'运营组','',1),(16,'办公室','8,10,12,16,17,18,14',1);
