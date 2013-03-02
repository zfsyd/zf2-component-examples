SydZfc - Zend/Db
=======================

How to proceed
------------
Setup the DB Schema if you want to actually test each example.  Then follow each step through each controller below. 

Deployment Scripts
------------
```sql
CREATE SCHEMA `SydZfComponents` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
CREATE  TABLE `SydZfComponents`.`animal` (
  `animalId` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(64) NULL ,
  `description` TEXT NULL ,
  `viewCount` INT NULL ,
  `username` VARCHAR(32) NULL ,
  PRIMARY KEY (`animalId`) )
ENGINE = InnoDB;

INSERT INTO `animal` (`animalId`, `name`, `description`, `viewCount`, `username`)
    VALUES  (1, 'Horse', 'Four legs and a tail', 0, 'user1');
INSERT INTO `animal` (`animalId`, `name`, `description`, `viewCount`, `username`)
    VALUES  (2, 'Cow', 'Black, white, spots', 0, 'user2');
INSERT INTO `animal` (`animalId`, `name`, `description`, `viewCount`, `username`)
    VALUES  (3, 'Dog', 'Likes to bark', 0, 'user3');
INSERT INTO `animal` (`animalId`, `name`, `description`, `viewCount`, `username`)
    VALUES  (4, 'Sheep', 'White fluff with black legs', 0, 'user4');
INSERT INTO `animal` (`animalId`, `name`, `description`, `viewCount`, `username`)
    VALUES  (5, 'Horse', 'Tall and runs fast', 0, 'user5');

CREATE  TABLE `SydZfComponents`.`user` (
  `username` VARCHAR(32) NOT NULL ,
  `firstName` VARCHAR(32) NULL ,
  PRIMARY KEY (`username`) );

INSERT INTO `user` (`username`, `firstName`)
    VALUES  ('user1', 'Fred');
INSERT INTO `user` (`username`, `firstName`)
    VALUES  ('user2', 'George');
INSERT INTO `user` (`username`, `firstName`)
    VALUES  ('user3', 'Mitch');
INSERT INTO `user` (`username`, `firstName`)
    VALUES  ('user4', 'Paul');
INSERT INTO `user` (`username`, `firstName`)
    VALUES  ('user5', 'Phil');
```

Steps
----------------------------

**Application/Controller/ServiceManagerController.php**
The simplest way to get data out a table. Use the service manager and just fetchAll.
As simple as this method is, it is pretty restricted.

**Application/Controller/AdapterController.php**
Setup the DB Adapter first.  Two methods, use the ServiceLocator or if you really want, do it manually.

**Applicatoin/Controller/SqlSelectStatementController.php**
Using \Zend\Db\Sql\Sql you can easily select data from the DB regardless of SQL specifics.

**Applicatoin/Controller/SqlCommandStatementController.php**
Using \Zend\Db\Sql\Sql you can easily manipulate data using Update/Insert/Delete.
