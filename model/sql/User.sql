CREATE TABLE IF NOT EXISTS User
(
id int(11) NOT NULL AUTO_INCREMENT,
username varchar(255) NOT NULL,
password varchar(255) NOT NULL,
PRIMARY KEY (id),
UNIQUE KEY username (username)
);

# username: admin
# password: uwbfindit
# Usage: admin login
