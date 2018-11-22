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
Laravel 更换服务器需要重新生成app_key
        _命令：php artisan key:generate_
        之后要把Crypt生成的密钥重新生成要不然解密无法成功。
        Laravel的Crypt在项目迁移中不太友好，可以考虑使用sha1加密