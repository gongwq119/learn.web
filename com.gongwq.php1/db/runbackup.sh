#!/bin/sh
#Run the mysqldump to backup the db
if [ -f "/Applications/XAMPP/xamppfiles/bin/mysqldump" ];then
echo "This is Macbook computer"
/Applications/XAMPP/xamppfiles/bin/mysqldump -uroot -ppassw0rd mydb > /Users/wenqianggong/git/learn.web/com.gongwq.php1/db/backup.sql
echo "backup db is done!!!"
elif [ -f "/opt/lampp/bin/mysqldump" ];then
echo "This is x61 computer"
/opt/lampp/bin/mysqldump -uroot -ppassw0rd mydb > /home/gongwq/site/php1/com.gongwq.php1/db/backup.sql
echo "backup db is done!!!"
fi
