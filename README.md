# qrcode
一个PHP的qrcode服务。

```
sudo apt install php7.2-cli
sudo apt install php-gd
git clone https://github.com/geek2pm/qrcode.git
cd qrcode
composer install
cd public
php -S 0.0.0.0:3000
```

```
http://localhost:3000/create?text=hello
```

or

```
http://localhost:3000/create/text/hello
```
