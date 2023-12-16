
## Model

```shell

php bin/hyperf.php gen:model users

php bin/hyperf.php gen:model rooms
php bin/hyperf.php gen:model room_applys
php bin/hyperf.php gen:model room_users

php bin/hyperf.php gen:model user_friends
php bin/hyperf.php gen:model user_friend_applys
php bin/hyperf.php gen:model user_friend_groups
php bin/hyperf.php gen:model user_session
php bin/hyperf.php gen:model user_session_groups


php bin/hyperf.php gen:model admin_menu





```

```sql
ALTER TABLE `rooms` CHANGE `created_at` `created_at` TIMESTAMP  COMMENT '创建时间';

ALTER TABLE `rooms` CHANGE `updated_at` `updated_at` TIMESTAMP NULL DEFAULT NULL COMMENT '更新时间'; 

```