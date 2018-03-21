# reinfo
laravel的论坛
关于企业招聘信息的甄别系统
识别虚假招聘
---------------------------------
#技术-laravel框架
目前实现：1、laravel关于RABC的auth认证！详见中间件SupperAuth.php
2、敏感词汇过滤详见AuditController、CompanyController
###注意
    关于laravel自带的用户注册系统中如果mysql版本低于5.7.7时
    在数据库迁移时会出错Syntax error or access violation: 1071 Specified key was too long; max key length is 1000 bytes
    需要：：编辑：\app\Providers \AppServiceProvider.php
    修改方法boot() 添加 Schema::defaultStringLength(191);