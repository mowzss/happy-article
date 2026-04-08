alter table ha_article_tag
    add spy varchar(1) default '' not null comment '首拼音' after title;
