
--
-- Table structure for table `ha_article_column`
--

DROP TABLE IF EXISTS `ha_article_column`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ha_article_column` (
                                     `id` int(11) NOT NULL AUTO_INCREMENT,
                                     `pid` int(11) DEFAULT '0' COMMENT '父栏目',
                                     `mid` int(11) DEFAULT '0' COMMENT '所属模型',
                                     `title` varchar(128) DEFAULT '' COMMENT '名称',
                                     `image` text COMMENT '栏目图片',
                                     `icon` varchar(255) DEFAULT '',
                                     `seo_title` varchar(2000) DEFAULT '' COMMENT 'SEO标题',
                                     `seo_keywords` varchar(200) DEFAULT '' COMMENT '关键词',
                                     `seo_description` text COMMENT '描述',
                                     `list` int(11) DEFAULT '0' COMMENT '排序',
                                     `view_file` varchar(128) DEFAULT '' COMMENT '模板路径',
                                     `status` int(11) DEFAULT '1' COMMENT '状态',
                                     `create_time` int(11) DEFAULT '0' COMMENT '创建时间',
                                     `update_time` int(11) DEFAULT '0' COMMENT '更新时间',
                                     PRIMARY KEY (`id`),
                                     KEY `article_column_pid_index` (`pid`),
                                     KEY `article_column_title_index` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COMMENT='分类表';
/*!40101 SET character_set_client = @saved_cs_client */;


--
-- Table structure for table `ha_article_content`
--

DROP TABLE IF EXISTS `ha_article_content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ha_article_content` (
                                      `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键ID',
                                      `mid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '模型ID',
                                      `cid` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '栏目ID',
                                      `title` varchar(256) NOT NULL DEFAULT '' COMMENT '标题',
                                      `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户ID',
                                      `view` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '浏览量',
                                      `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '状态：0未审 1已审 2推荐',
                                      `list` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序值',
                                      `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
                                      `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '修改时间',
                                      `delete_time` int(11) DEFAULT NULL,
                                      PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COMMENT='测试';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ha_article_content_1`
--

DROP TABLE IF EXISTS `ha_article_content_1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ha_article_content_1` (
                                        `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键ID',
                                        `mid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '模型ID',
                                        `cid` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '栏目ID',
                                        `title` varchar(256) NOT NULL DEFAULT '' COMMENT '标题',
                                        `is_pic` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否带组图',
                                        `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户ID',
                                        `view` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '浏览量',
                                        `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '状态：0未审 1已审 2推荐',
                                        `replynum` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '评论数',
                                        `description` text COMMENT '简介',
                                        `list` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序值',
                                        `images` text NOT NULL COMMENT '组图',
                                        `keywords` varchar(500) NOT NULL DEFAULT '' COMMENT '关键词',
                                        `extend` text COMMENT '扩展字段',
                                        `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
                                        `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '修改时间',
                                        `delete_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '软删除',
                                        PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COMMENT='测试';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ha_article_content_1s`
--

DROP TABLE IF EXISTS `ha_article_content_1s`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ha_article_content_1s` (
                                         `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键ID',
                                         `content` longtext COMMENT '内容',
                                         PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COMMENT='测试';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ha_article_field`
--

DROP TABLE IF EXISTS `ha_article_field`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ha_article_field` (
                                    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                                    `mid` int(11) DEFAULT '0' COMMENT '所属模型',
                                    `name` varchar(64) DEFAULT '' COMMENT '字段名称',
                                    `type` varchar(64) DEFAULT '' COMMENT '字段类型',
                                    `title` varchar(256) DEFAULT '' COMMENT '标签名称',
                                    `options` text,
                                    `help` text COMMENT '表单说明',
                                    `required` int(11) DEFAULT '0' COMMENT '是否必填',
                                    `list` int(11) DEFAULT '100' COMMENT '排序',
                                    `edit` int(11) DEFAULT '1' COMMENT '是否能修改 1可以修改 0不能修改',
                                    `extend` longtext COMMENT '扩展参数',
                                    `status` int(11) DEFAULT '1' COMMENT '状态',
                                    `create_time` int(11) DEFAULT '0' COMMENT '创建时间',
                                    `update_time` int(11) DEFAULT '0' COMMENT '更新时间',
                                    `is_search` int(11) DEFAULT NULL COMMENT '是否搜索 1搜索 0不启动',
                                    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COMMENT='字段设计';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ha_article_field`
--

LOCK TABLES `ha_article_field` WRITE;
/*!40000 ALTER TABLE `ha_article_field` DISABLE KEYS */;
INSERT INTO `ha_article_field` VALUES (1,1,'title','text','标题','',NULL,1,1000,1,'{\"field\":{\"type\":\"VARCHAR\",\"length\":\"256\",\"unsigned\":\"0\",\"null\":\"0\",\"default\":\"\'\'\"},\"search\":{\"is_open\":\"1\",\"linq\":\"like\"},\"tables\":{\"is_show\":\"1\",\"templet\":\"\",\"switch\":{\"name\":\"\"},\"edit\":\"0\"},\"add\":{\"is_show\":\"1\"}}',1,1735613014,1735613014,NULL),(2,1,'keywords','text','关键词','',NULL,0,100,1,'{\"field\":{\"type\":\"VARCHAR\",\"length\":\"2000\",\"unsigned\":\"0\",\"null\":\"0\",\"default\":\"\'\'\"},\"search\":{\"is_open\":\"0\",\"linq\":\"\"},\"tables\":{\"is_show\":\"0\",\"templet\":\"\",\"switch\":{\"name\":\"\"},\"edit\":\"0\"},\"add\":{\"is_show\":\"0\"}}',1,1735613014,1735613014,NULL),(3,1,'description','textarea','简介','',NULL,0,100,1,'{\"field\":{\"type\":\"TEXT\",\"length\":\"\",\"unsigned\":\"0\",\"null\":\"0\",\"default\":\"\"},\"search\":{\"is_open\":\"0\",\"linq\":\"\"},\"tables\":{\"is_show\":\"0\",\"templet\":\"\",\"switch\":{\"name\":\"\"},\"edit\":\"0\"},\"add\":{\"is_show\":\"1\"}}',1,1735613014,1735613014,NULL),(4,1,'content','editor','内容','',NULL,1,1,1,'{\"field\":{\"type\":\"LONGTEXT\",\"length\":\"\",\"unsigned\":\"0\",\"null\":\"0\",\"default\":\"\"},\"search\":{\"is_open\":\"0\",\"linq\":\"\"},\"tables\":{\"is_show\":\"0\",\"templet\":\"\",\"switch\":{\"name\":\"\"},\"edit\":\"0\"},\"add\":{\"is_show\":\"1\"}}',1,1735613014,1735613014,NULL),(5,1,'images','images','组图','',NULL,0,80,1,'{\"field\":{\"type\":\"TEXT\",\"length\":\"\",\"unsigned\":\"0\",\"null\":\"0\",\"default\":\"\"},\"search\":{\"is_open\":\"0\",\"linq\":\"\"},\"tables\":{\"is_show\":\"1\",\"templet\":\"image\",\"switch\":{\"name\":\"\"},\"edit\":\"0\"},\"add\":{\"is_show\":\"1\"}}',1,1735613014,1735662989,NULL);
/*!40000 ALTER TABLE `ha_article_field` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ha_article_model`
--

DROP TABLE IF EXISTS `ha_article_model`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ha_article_model` (
                                    `id` int(11) NOT NULL AUTO_INCREMENT,
                                    `title` varchar(64) DEFAULT '' COMMENT '名称',
                                    `info` varchar(512) DEFAULT '' COMMENT '描述',
                                    `list` int(11) DEFAULT '100' COMMENT '排序',
                                    `is_del` int(11) DEFAULT '1' COMMENT '可否删除',
                                    PRIMARY KEY (`id`),
                                    KEY `article_model_title_index` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ha_article_model`
--

LOCK TABLES `ha_article_model` WRITE;
/*!40000 ALTER TABLE `ha_article_model` DISABLE KEYS */;
INSERT INTO `ha_article_model` VALUES (-1,'栏目','栏目模型，内置字段不可修改，仅支持扩展字段',-100,0),(1,'文章模型','',100,1);
/*!40000 ALTER TABLE `ha_article_model` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ha_article_reply`
--

DROP TABLE IF EXISTS `ha_article_reply`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ha_article_reply` (
                                    `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键ID',
                                    `pid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '引用回复上级ID',
                                    `aid` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '内容页ID',
                                    `ispic` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否带组图 (0:否, 1:是)',
                                    `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户ID',
                                    `agree` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '支持数',
                                    `disagree` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '反对数',
                                    `list` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序值',
                                    `picurl` varchar(255) NOT NULL DEFAULT '' COMMENT '封面图URL',
                                    `content` text NOT NULL COMMENT '评论内容',
                                    `reply_count` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '回复数',
                                    `phone_type` varchar(30) NOT NULL DEFAULT '' COMMENT '发表来自什么手机',
                                    `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '状态：1审核通过，0未审核',
                                    `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间戳',
                                    PRIMARY KEY (`id`),
                                    KEY `idx_pid` (`pid`),
                                    KEY `idx_aid` (`aid`),
                                    KEY `idx_uid` (`uid`),
                                    KEY `idx_status_create_time` (`status`,`create_time`),
                                    KEY `idx_sort_order` (`list`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='回复内容表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ha_article_reply`
--

LOCK TABLES `ha_article_reply` WRITE;
/*!40000 ALTER TABLE `ha_article_reply` DISABLE KEYS */;
/*!40000 ALTER TABLE `ha_article_reply` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ha_article_tag`
--

DROP TABLE IF EXISTS `ha_article_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ha_article_tag` (
                                  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
                                  `title` varchar(256) NOT NULL DEFAULT '' COMMENT '标题',
                                  `view` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '浏览量',
                                  `count` int(11) NOT NULL DEFAULT '0' COMMENT '内容总数',
                                  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '状态：0未审 1已审 2推荐',
                                  `list` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序值',
                                  `uid` int(11) NOT NULL DEFAULT '1',
                                  `image` text COMMENT '封面图',
                                  `seo_description` mediumtext COMMENT '文章内容',
                                  `seo_title` varchar(128) DEFAULT NULL COMMENT 'SEO标题',
                                  `seo_keyword` varchar(128) DEFAULT NULL COMMENT '关键词',
                                  `create_time` int(10) unsigned DEFAULT NULL,
                                  `update_time` int(10) unsigned DEFAULT NULL,
                                  PRIMARY KEY (`id`),
                                  KEY `count` (`count`),
                                  KEY `list` (`list`),
                                  KEY `status` (`status`),
                                  KEY `view` (`view`),
                                  KEY `create_time` (`create_time`),
                                  KEY `update_time` (`update_time`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COMMENT='tag';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ha_article_tag_info`
--

DROP TABLE IF EXISTS `ha_article_tag_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ha_article_tag_info` (
                                       `id` int(11) NOT NULL AUTO_INCREMENT,
                                       `aid` bigint(22) DEFAULT NULL COMMENT '内容id',
                                       `tid` int(11) DEFAULT NULL COMMENT 'tag id',
                                       `mid` int(11) NOT NULL DEFAULT '0' COMMENT '模型id',
                                       PRIMARY KEY (`id`),
                                       KEY `astro_tag_info_aid_index` (`aid`),
                                       KEY `astro_tag_info_tid_index` (`tid`),
                                       KEY `mid` (`mid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COMMENT='tag关联信息';
/*!40101 SET character_set_client = @saved_cs_client */;
