-- 标题重复检查开关：模块独立配置，默认关闭
-- 开启后，后台新增/编辑内容时同一栏目下标题重复会被拦截（仅后台提交生效）
INSERT INTO ha_system_config_group (title, sys_show, module, status)
SELECT '模块设置', 0, 'article', 1
FROM DUAL
WHERE NOT EXISTS (SELECT 1 FROM ha_system_config_group g WHERE g.module = 'article');

INSERT INTO ha_system_config (name, type, title, group_id, options, help, value, module, status, create_time, update_time)
SELECT 'content_title_repeat_check', 'switchs', '标题重复检查', g.id, '', '开启后，后台新增或编辑内容时，同一栏目下标题重复将被拦截（仅后台提交生效）', '0', 'article', 1, UNIX_TIMESTAMP(), UNIX_TIMESTAMP()
FROM ha_system_config_group g
WHERE g.module = 'article'
  AND NOT EXISTS (SELECT 1 FROM ha_system_config c WHERE c.module = 'article' AND c.name = 'content_title_repeat_check')
ORDER BY g.id
LIMIT 1;
