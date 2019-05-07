CREATE TABLE `users` (
  `user_id` varchar(20) NOT NULL COMMENT '身份证号',
  `username` varchar(6) NOT NULL COMMENT '姓名',
  `password` varchar(255) NOT NULL COMMENT '初始值为身份证后六位',
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `wage_content` (
  `dept` varchar(100) DEFAULT NULL,
  `staff_name` varchar(18) DEFAULT NULL,
  `team` varchar(18) DEFAULT NULL,
  `lsr1` varchar(12) DEFAULT NULL,
  `lsr2` varchar(12) DEFAULT NULL,
  `total_income` varchar(18) DEFAULT NULL,
  `manager_level` varchar(18) DEFAULT NULL,
  `base_salary` varchar(18) DEFAULT NULL,
  `charge` varchar(18) DEFAULT NULL,
  `kpi` varchar(18) DEFAULT NULL,
  `yff_charge` varchar(18) DEFAULT NULL,
  `hff_charge` varchar(18) DEFAULT NULL,
  `gw_charge` varchar(18) DEFAULT NULL,
  `cl_charge` varchar(18) DEFAULT NULL,
  `qf_charge` varchar(18) DEFAULT NULL,
  `other1` varchar(18) DEFAULT NULL,
  `other2` varchar(18) DEFAULT NULL,
  `other3` varchar(18) DEFAULT NULL,
  `other4` varchar(18) DEFAULT NULL,
  `end_charge` varchar(18) DEFAULT NULL,
  `remark` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `daily_account` (
  `user_id` varchar(50) NOT NULL COMMENT '用户编码',
  `phone_number` varchar(50) NOT NULL COMMENT '电话号码',
  `charge` float(30) NOT NULL COMMENT '出账金额',
  `dept_id` varchar(50) NOT NULL COMMENT '发展部门编码',
  `fgs` varchar(50) NOT NULL COMMENT '分公司',
  `product_id` varchar(50) NOT NULL COMMENT '产品编码',
  `product_name` varchar(50) NOT NULL COMMENT '产品名称',
  `staff_id` varchar(50) NOT NULL COMMENT '员工编号',
  `staff_name` varchar(50) NOT NULL COMMENT '员工姓名',
  `account_type` varchar(50) NOT NULL COMMENT '分类/线条',
  `develop_dept` varchar(50) NOT NULL COMMENT '第三季度计划休假数',
  `vip_id` varchar(50) NOT NULL COMMENT '集团编码',
  `vip_name` varchar(50) NOT NULL COMMENT '集团名称',
  `activity` varchar(200) NOT NULL COMMENT '活动名称',
  `activity_date` varchar(200) NOT NULL COMMENT '活动办理时间',
  `in_time` varchar(50) NOT NULL COMMENT '入网时间',
  `in_date` varchar(50) NOT NULL COMMENT '入网年月',
  `status` varchar(50) NOT NULL COMMENT '状态/开通',
  `customer_name` varchar(50) NOT NULL COMMENT '客户姓名',
  `celler_type1` varchar(50) NOT NULL COMMENT '移网类型1',
  `celler_type2` varchar(50) NOT NULL COMMENT '移网类型2',   
  `celler_product_type` varchar(50) NOT NULL COMMENT '产品大类'
) ENGINE=InnoDB DEFAULT CHARSET=utf8; 


CREATE TABLE `super_user` (
  `user_id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `permission` varchar(255) NOT NULL COMMENT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `super_user`
--

INSERT INTO `super_user` (`user_id`, `password`, `permission`) VALUES
('tvwswgnp', md5('123456'), '')
