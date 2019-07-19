
# SQL Injectable website

I created this website to get an idea of how SQL injection works. With a couple of commands I was able to look through other databases on my local SQL server. This really suprised me as it was really easy to do and will definintely make me think next time I create webapps with sql database connections.

I chose php for this example as I believe it's probably the easiest to setup. If you want some more info on what SQL injection is, I highly recommend [Tom Scott's](https://www.youtube.com/watch?v=_jKylhJtPmI) and [Mike Pound's](https://www.youtube.com/watch?v=ciNHn38EyRc) video on SQL injection.

## How to use

To start this example you'll have to setup a mysql database and a table to store some dummy data. Here's the sql table you'll need to run this example:

```sql
    CREATE TABLE products (
        id MEDIUMINT NOT NULL AUTO_INCREMENT,
        name VARCHAR(30),
        description VARCHAR(50),
        PRIMARY KEY(id)
    );
```

After creating the table and inserting some dummy data into it you will need to set the following environment variables to allow php to connect to your sql database with the dummy data:

- `SERVER_NAME`
- `MYSQL_USERNAME`
- `MYSQL_PASSWORD`
- `DB_NAME`

You will then be able to start a php server with the following command:

```bash
php -S localhost:8080
```

This will start a built in php server on `localhost:8080`. The extremely buggy webapp will be under `localhost:8080/search.php`
