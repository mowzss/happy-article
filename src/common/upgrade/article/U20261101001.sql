-- 栏目列表页每页条数配置：默认 20 条，模板不可单独指定，仅模块配置可调整
INSERT INTO ha_system_config (name, type, title, group_id, options, help, value, module, status, create_time, update_time)
SELECT 'column_list_rows', 'text', '栏目列表页条数', g.id, '', '栏目列表页每页显示的内容条数，默认20条，模板不可单独指定', '20', 'article', 1, UNIX_TIMESTAMP(), UNIX_TIMESTAMP()
FROM ha_system_config_group g
WHERE g.module = 'article'
  AND NOT EXISTS (SELECT 1 FROM ha_system_config c WHERE c.module = 'article' AND c.name = 'column_list_rows')
ORDER BY g.id
LIMIT 1;
