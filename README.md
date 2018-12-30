# Note: This a demo branch forked from the original repo (found at https://github.com/dynematic/D0018E_Group1 (might be private)), the code and the feautres should still be complete though.

# E-Commerce and relational database

A minimalistic website with a e-commerce system were you can buy products, a shoping cart and rating system. Database built on MariaDB.

## Group 1, Authors

* **Hugo Wangler**, hugwan-6
* **Aron Strandberg**, arostr-5
* **Martin Terneborg**, termar-5
* **Robin Vernström Persson**, robper-6

See the list of [contributors](https://github.com/dynematic/D0018E_Group1/graphs/contributors) who participated in this project.

### Scrum board backlog

![zube](https://imgur.com/mqRmTZ2.jpg)


### Database tables

![db tables](https://i.imgur.com/bCzyxLf.png)


### The front page of the website
![frontpage](https://imgur.com/PMDlnwX.png)

## Getting Started

These instructions will step through how to implement this project.

### Prerequisites on Linux
Install apache2, PHP7 and MariaDB
```
sudo apt-get install apache2 apache2-utils
```

Permissions
```
sudo chown www-data /var/www/yourWebsitefiles/ -R
```


```
sudo apt-get install mariadb-server mariadb-client
```

Setup mysql
```
sudo mysql_secure_installation
```

Install PHP7
```
sudo apt-get install php7.0-fpm php7.0-mysql php7.0-common php7.0-gd php7.0-json php7.0-cli php7.0-curl libapache2-mod-php7.0
```

Enable PHP7
```
sudo a2enmod php7.0
```

### Built With

* [HTTP] (https://httpd.apache.org/) - The web server
* [MariaDB] (https://mariadb.com/) - Relational SQL database
* [PHP] (http://www.php.net/) - Hypertext Preprocessor

## License

This project is licensed under the ? ? ? - see the [LICENSE.md](LICENSE.md) file for details
