USE bizflycloud_w1;
CREATE TABLE user (
    id int NOT NULL AUTO_INCREMENT,
    fullname varchar(255),
    username varchar(255) NOT NULL,
    password varchar(255),
    role varchar(255),
    PRIMARY KEY (id)
);
ALTER TABLE user
ADD UNIQUE (username);

CREATE TABLE status (
    id int NOT NULL AUTO_INCREMENT,
    content varchar(255) NOT NULL,
    title varchar(255) NOT NULL,
    user_id int,
    PRIMARY KEY (id),
    FOREIGN KEY (user_id) REFERENCES user(id)
);



