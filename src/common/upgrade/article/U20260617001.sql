alter table ha_article_column
    add type int default 1 null comment '栏目类型 1正常栏目 2节点链接 3外部链接';

alter table ha_article_column
    add node varchar(128) default '' null comment '节点';

alter table ha_article_column
    add params varchar(512) default '' null comment '节点参数';

alter table ha_article_column
    add url varchar(512) default '' null comment '链接';
