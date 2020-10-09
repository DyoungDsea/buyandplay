ALTER TABLE `dtransaction_history` ADD `dcredit` VARCHAR(100) NULL DEFAULT NULL AFTER `amount`, ADD `ddebit` VARCHAR(100) NULL DEFAULT NULL AFTER `dcredit`; 

ALTER TABLE `dtransaction_history` ADD `dwallet_balance` VARCHAR(100) NOT NULL AFTER `ddebit`; 
ALTER TABLE `dtransaction_history` CHANGE `dwallet_balance` `dwallet_balance` VARCHAR(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL; 

UPDATE `dtransaction_history` SET `dwallet_balance`=NULL 