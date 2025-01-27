-- MariaDB dump 10.19  Distrib 10.4.22-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: bhojan_db
-- ------------------------------------------------------
-- Server version	10.4.22-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Dumping data for table `acc_account_name`
--

LOCK TABLES `acc_account_name` WRITE;
/*!40000 ALTER TABLE `acc_account_name` DISABLE KEYS */;
/*!40000 ALTER TABLE `acc_account_name` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `acc_coa`
--

LOCK TABLES `acc_coa` WRITE;
/*!40000 ALTER TABLE `acc_coa` DISABLE KEYS */;
INSERT INTO `acc_coa` VALUES ('502020000001','145454-HmIsahaq','Account Payable',2,1,1,0,'L',0,0,0.00,'John Doe','2018-12-17 15:10:19','','0000-00-00 00:00:00'),('4021403','AC','Repair and Maintenance',3,1,1,0,'E',0,0,0.00,'admin','2015-10-15 19:33:55','','0000-00-00 00:00:00'),('50202','Account Payable','Current Liabilities',2,1,0,1,'L',0,0,0.00,'admin','2015-10-15 19:50:43','','0000-00-00 00:00:00'),('10203','Account Receivable','Current Asset',2,1,0,0,'A',0,0,0.00,'','0000-00-00 00:00:00','admin','2013-09-18 15:29:35'),('1020201','Advance','Advance, Deposit And Pre-payments',3,1,0,1,'A',0,0,0.00,'Zoherul','2015-05-31 13:29:12','admin','2015-12-31 16:46:32'),('102020103','Advance House Rent','Advance',4,1,1,0,'A',0,0,0.00,'admin','2016-10-02 16:55:38','admin','2016-10-02 16:57:32'),('10202','Advance, Deposit And Pre-payments','Current Asset',2,1,0,0,'A',0,0,0.00,'','0000-00-00 00:00:00','admin','2015-12-31 16:46:24'),('4020602','Advertisement and Publicity','Promonational Expence',3,1,1,0,'E',0,0,0.00,'admin','2015-10-15 18:51:44','','0000-00-00 00:00:00'),('1010410','Air Cooler','Others Assets',3,1,1,0,'A',0,0,0.00,'admin','2016-05-23 12:13:55','','0000-00-00 00:00:00'),('4020603','AIT Against Advertisement','Promonational Expence',3,1,1,0,'E',0,0,0.00,'admin','2015-10-15 18:52:09','','0000-00-00 00:00:00'),('1','Assets','COA',0,1,0,0,'A',0,0,0.00,'','0000-00-00 00:00:00','','0000-00-00 00:00:00'),('1010204','Attendance Machine','Office Equipment',3,1,1,0,'A',0,0,0.00,'admin','2015-10-15 15:49:31','','0000-00-00 00:00:00'),('40216','Audit Fee','Other Expenses',2,1,1,1,'E',0,0,0.00,'admin','2017-07-18 12:54:30','','0000-00-00 00:00:00'),('4021002','Bank Charge','Financial Expenses',3,1,1,0,'E',0,0,0.00,'admin','2015-10-15 19:21:03','','0000-00-00 00:00:00'),('30203','Bank Interest','Other Income',2,1,1,1,'I',0,0,0.00,'Obaidul','2015-01-03 14:49:54','admin','2016-09-25 11:04:19'),('1010104','Book Shelf','Furniture & Fixturers',3,1,1,0,'A',0,0,0.00,'admin','2015-10-15 15:46:11','','0000-00-00 00:00:00'),('1010407','Books and Journal','Others Assets',3,1,1,0,'A',0,0,0.00,'admin','2016-03-27 10:45:37','','0000-00-00 00:00:00'),('102010207','Brac Bank','Cash At Bank',4,1,1,0,'A',0,0,0.00,'2','2020-01-18 10:10:31','','0000-00-00 00:00:00'),('4020604','Business Development Expenses','Promonational Expence',3,1,1,0,'E',0,0,0.00,'admin','2015-10-15 18:52:29','','0000-00-00 00:00:00'),('4020606','Campaign Expenses','Promonational Expence',3,1,1,0,'E',0,0,0.00,'admin','2015-10-15 18:52:57','admin','2016-09-19 14:52:48'),('4020502','Campus Rent','House Rent',3,1,1,0,'E',0,0,0.00,'admin','2015-10-15 18:46:53','admin','2017-04-27 17:02:39'),('40212','Car Running Expenses','Other Expenses',2,1,0,1,'E',0,0,0.00,'admin','2015-10-15 19:28:43','','0000-00-00 00:00:00'),('10201','Cash & Cash Equivalent','Current Asset',2,1,0,1,'A',0,0,0.00,'','0000-00-00 00:00:00','admin','2015-10-15 15:57:55'),('1020102','Cash At Bank','Cash & Cash Equivalent',3,1,0,0,'A',0,0,0.00,'2','2018-07-19 13:43:59','admin','2015-10-15 15:32:42'),('1020101','Cash In Hand','Cash & Cash Equivalent',3,1,1,1,'A',0,0,0.00,'2','2018-07-31 12:56:28','admin','2016-05-23 12:05:43'),('30101','Cash Sale','Store Income',1,1,1,1,'I',0,0,0.00,'2','2018-07-08 07:51:26','','0000-00-00 00:00:00'),('1010207','CCTV','Office Equipment',3,1,1,0,'A',0,0,0.00,'admin','2015-10-15 15:51:24','','0000-00-00 00:00:00'),('102020102','CEO Current A/C','Advance',4,1,1,0,'A',0,0,0.00,'admin','2016-09-25 11:54:54','','0000-00-00 00:00:00'),('102010206','City Bank','Cash At Bank',4,1,1,0,'A',0,0,0.00,'2','2020-01-18 10:09:32','','0000-00-00 00:00:00'),('1010101','Class Room Chair','Furniture & Fixturers',3,1,1,0,'A',0,0,0.00,'admin','2015-10-15 15:45:29','','0000-00-00 00:00:00'),('4021407','Close Circuit Cemera','Repair and Maintenance',3,1,1,0,'E',0,0,0.00,'admin','2015-10-15 19:35:35','','0000-00-00 00:00:00'),('4020601','Commision on Admission','Promonational Expence',3,1,1,0,'E',0,0,0.00,'admin','2015-10-15 18:51:21','admin','2016-09-19 14:42:54'),('1010206','Computer','Office Equipment',3,1,1,0,'A',0,0,0.00,'admin','2015-10-15 15:51:09','','0000-00-00 00:00:00'),('4021410','Computer (R)','Repair and Maintenance',3,1,1,0,'E',0,0,0.00,'Zoherul','2016-03-24 12:38:52','Zoherul','2016-03-24 12:41:40'),('1010102','Computer Table','Furniture & Fixturers',3,1,1,0,'A',0,0,0.00,'admin','2015-10-15 15:45:44','','0000-00-00 00:00:00'),('301020401','Continuing Registration fee - UoL (Income)','Registration Fee (UOL) Income',4,1,1,0,'I',0,0,0.00,'admin','2015-10-15 17:40:40','','0000-00-00 00:00:00'),('4020904','Contratuall Staff Salary','Salary & Allowances',3,1,1,0,'E',0,0,0.00,'admin','2015-10-15 19:12:34','','0000-00-00 00:00:00'),('403','Cost of Sale','Expence',0,1,1,0,'E',0,0,0.00,'2','2018-07-08 10:37:16','','0000-00-00 00:00:00'),('30102','Credit Sale','Store Income',1,1,1,1,'I',0,0,0.00,'2','2018-07-08 07:51:34','','0000-00-00 00:00:00'),('4020709','Cultural Expense','Miscellaneous Expenses',3,1,1,0,'E',0,0,0.00,'nasmud','2017-04-29 12:45:10','','0000-00-00 00:00:00'),('102','Current Asset','Assets',1,1,0,0,'A',0,0,0.00,'2','2018-12-06 13:54:42','admin','2018-07-07 11:23:00'),('502','Current Liabilities','Liabilities',1,1,0,0,'L',0,0,0.00,'anwarul','2014-08-30 13:18:20','admin','2015-10-15 19:49:21'),('102030101','cusL-0001-Walkin','Customer Receivable',4,1,1,0,'A',0,0,0.00,'2','2019-01-08 09:14:48','','2020-11-17 11:41:07'),('102030108','cusL-0002-Jamil','Customer Receivable',4,1,1,0,'A',0,0,0.00,'2','2021-08-25 14:12:02','','0000-00-00 00:00:00'),('102030109','cusL-0004-Kabir khan','Customer Receivable',4,1,1,0,'A',0,0,0.00,'36','2021-08-31 14:03:18','','0000-00-00 00:00:00'),('102030115','cusL-0005-jaman','Customer Receivable',4,1,1,0,'A',0,0,0.00,'53','2023-07-03 15:50:20','','0000-00-00 00:00:00'),('102030116','cusL-0005-Ravi Kumar','Customer Receivable',4,1,1,0,'A',0,0,0.00,'2','2025-01-24 18:48:16','','0000-00-00 00:00:00'),('102030110','cusL-0007-jamil','Customer Receivable',4,1,1,0,'A',0,0,0.00,'39','2021-09-05 19:38:26','','0000-00-00 00:00:00'),('102030111','cusL-0008-kamal','Customer Receivable',4,1,1,0,'A',0,0,0.00,'40','2021-09-19 11:53:13','','0000-00-00 00:00:00'),('102030112','cusL-0009-shakil','Customer Receivable',4,1,1,0,'A',0,0,0.00,'41','2021-10-26 10:20:44','','0000-00-00 00:00:00'),('102030113','cusL-0010-shakil','Customer Receivable',4,1,1,0,'A',0,0,0.00,'42','2021-10-26 10:23:52','','0000-00-00 00:00:00'),('102030104','cusL-0018-jamildasd','Customer Receivable',4,1,1,0,'A',0,0,0.00,'20','2021-01-05 14:14:11','','0000-00-00 00:00:00'),('102030114','cusL-0019- ','Customer Receivable',4,1,1,0,'A',0,0,0.00,'0','2021-11-10 14:06:32','','0000-00-00 00:00:00'),('102030105','cusL-0021-jamil','Customer Receivable',4,1,1,0,'A',0,0,0.00,'25','2021-01-31 14:17:07','','0000-00-00 00:00:00'),('102030106','cusL-0022-Saiful Hassan','Customer Receivable',4,1,1,0,'A',0,0,0.00,'26','2021-01-31 18:18:33','','0000-00-00 00:00:00'),('102030107','cusL-0023-jamil','Customer Receivable',4,1,1,0,'A',0,0,0.00,'27','2021-02-03 10:12:50','','0000-00-00 00:00:00'),('1020301','Customer Receivable','Account Receivable',3,1,0,1,'A',0,0,0.00,'2','2019-01-08 09:15:08','admin','2018-07-07 12:31:42'),('40100002','cw-Chichawatni','Store Expenses',2,1,1,0,'E',0,0,0.00,'2','2018-08-02 16:30:41','','0000-00-00 00:00:00'),('1020202','Deposit','Advance, Deposit And Pre-payments',3,1,0,0,'A',0,0,0.00,'admin','2015-10-15 15:40:42','','0000-00-00 00:00:00'),('4020605','Design & Printing Expense','Promonational Expence',3,1,1,0,'E',0,0,0.00,'admin','2015-10-15 18:55:00','','0000-00-00 00:00:00'),('4020404','Dish Bill','Utility Expenses',3,1,1,0,'E',0,0,0.00,'admin','2015-10-15 18:58:21','','0000-00-00 00:00:00'),('40215','Dividend','Other Expenses',2,1,1,1,'E',0,0,0.00,'admin','2016-09-25 14:07:55','','0000-00-00 00:00:00'),('4020403','Drinking Water Bill','Utility Expenses',3,1,1,0,'E',0,0,0.00,'admin','2015-10-15 18:58:10','','0000-00-00 00:00:00'),('1010211','DSLR Camera','Office Equipment',3,1,1,0,'A',0,0,0.00,'admin','2015-10-15 15:53:17','admin','2016-01-02 16:23:25'),('102010205','Dutch-Bangla Bank','Cash At Bank',4,1,1,0,'A',0,0,0.00,'2','2020-01-18 09:49:13','','0000-00-00 00:00:00'),('502020000007','E3Y1WJMB-John Maria','Account Payable',2,1,1,0,'L',0,0,0.00,'John Doe','2019-01-27 05:55:58','','0000-00-00 00:00:00'),('502020000010','E4Y91CAX-onlineorder','Account Payable',2,1,1,0,'L',0,0,0.00,'John Doe','2019-02-03 11:20:44','','0000-00-00 00:00:00'),('502020000004','E97E9SJT-Manik Hassan','Account Payable',2,1,1,0,'L',0,0,0.00,'John Doe','2019-01-09 14:32:22','','0000-00-00 00:00:00'),('4020908','Earned Leave','Salary & Allowances',3,1,1,0,'E',0,0,0.00,'admin','2015-10-15 19:13:38','','0000-00-00 00:00:00'),('502020000006','EBK2UPRA-John Carlos','Account Payable',2,1,1,0,'L',0,0,0.00,'John Doe','2019-01-27 05:51:09','','0000-00-00 00:00:00'),('4020607','Education Fair Expenses','Promonational Expence',3,1,1,0,'E',0,0,0.00,'admin','2015-10-15 18:53:42','','0000-00-00 00:00:00'),('502020000011','EK9BYZVY-test sdafdssdfds','Account Payable',2,1,1,0,'L',0,0,0.00,'John Doe','2019-02-24 14:07:53','','0000-00-00 00:00:00'),('1010602','Electric Equipment','Electrical Equipment',3,1,1,0,'A',0,0,0.00,'admin','2016-03-27 10:44:51','','0000-00-00 00:00:00'),('1010203','Electric Kettle','Office Equipment',3,1,1,0,'A',0,0,0.00,'admin','2015-10-15 15:49:07','','0000-00-00 00:00:00'),('10106','Electrical Equipment','Non Current Assets',2,1,0,1,'A',0,0,0.00,'admin','2016-03-27 10:43:44','','0000-00-00 00:00:00'),('4020407','Electricity Bill','Utility Expenses',3,1,1,0,'E',0,0,0.00,'admin','2015-10-15 18:59:31','','0000-00-00 00:00:00'),('10202010501','employ','Salary',5,1,0,0,'A',0,0,0.00,'admin','2018-07-05 11:47:10','','0000-00-00 00:00:00'),('405','Entertainment','Expense',1,1,1,0,'E',1,1,1.00,'2','2020-01-18 07:49:00','','0000-00-00 00:00:00'),('502020000012','ENVBUZKE-kabirkhan','Account Payable',2,1,1,0,'L',0,0,0.00,'John Doe','2020-10-12 10:57:33','','0000-00-00 00:00:00'),('502020000002','EQLAJFUW-AinalHaque','Account Payable',2,1,1,0,'L',0,0,0.00,'John Doe','2018-12-17 15:08:43','','0000-00-00 00:00:00'),('2','Equity','COA',0,1,0,0,'L',0,0,0.00,'','0000-00-00 00:00:00','','0000-00-00 00:00:00'),('502020000009','EU3APTYY-JohnDoe','Account Payable',2,1,1,0,'L',0,0,0.00,'John Doe','2019-01-27 06:02:46','','0000-00-00 00:00:00'),('502020000005','EW9PM201-test emp','Account Payable',2,1,1,0,'L',0,0,0.00,'John Doe','2019-01-09 14:38:15','','0000-00-00 00:00:00'),('502020000008','EXL9WSCL-Mitchel Santner','Account Payable',2,1,1,0,'L',0,0,0.00,'John Doe','2019-01-27 05:58:55','','0000-00-00 00:00:00'),('4','Expense','COA',0,1,0,0,'E',0,0,0.00,'','0000-00-00 00:00:00','','0000-00-00 00:00:00'),('502020000003','EY2T1OWA-jahangirAhmad','Account Payable',2,1,1,0,'L',0,0,0.00,'John Doe','2018-12-17 15:11:13','','0000-00-00 00:00:00'),('502020000013','EZR0A9IB-DiMaria','Account Payable',2,1,1,0,'L',0,0,0.00,'John Doe','2021-11-14 10:54:22','','0000-00-00 00:00:00'),('4020903','Faculty,Staff Salary & Allowances','Salary & Allowances',3,1,1,0,'E',0,0,0.00,'admin','2015-10-15 19:12:21','','0000-00-00 00:00:00'),('4021404','Fax Machine','Repair and Maintenance',3,1,1,0,'E',0,0,0.00,'admin','2015-10-15 19:34:15','','0000-00-00 00:00:00'),('4020905','Festival & Incentive Bonus','Salary & Allowances',3,1,1,0,'E',0,0,0.00,'admin','2015-10-15 19:12:48','','0000-00-00 00:00:00'),('1010103','File Cabinet','Furniture & Fixturers',3,1,1,0,'A',0,0,0.00,'admin','2015-10-15 15:46:02','','0000-00-00 00:00:00'),('40210','Financial Expenses','Other Expenses',2,1,0,1,'E',0,0,0.00,'anwarul','2013-08-20 12:24:31','admin','2015-10-15 19:20:36'),('1010403','Fire Extingushier','Others Assets',3,1,1,0,'A',0,0,0.00,'admin','2016-03-27 10:39:32','','0000-00-00 00:00:00'),('4021408','Furniture','Repair and Maintenance',3,1,1,0,'E',0,0,0.00,'admin','2015-10-15 19:35:47','','0000-00-00 00:00:00'),('10101','Furniture & Fixturers','Non Current Assets',2,1,0,1,'A',0,0,0.00,'anwarul','2013-08-20 16:18:15','anwarul','2013-08-21 13:35:40'),('4020406','Gas Bill','Utility Expenses',3,1,1,0,'E',0,0,0.00,'admin','2015-10-15 18:59:20','','0000-00-00 00:00:00'),('20201','General Reserve','Reserve & Surplus',2,1,1,0,'L',0,0,0.00,'admin','2016-09-25 14:07:12','admin','2016-10-02 17:48:49'),('10105','Generator','Non Current Assets',2,1,1,1,'A',0,0,0.00,'Zoherul','2016-02-27 16:02:35','admin','2016-05-23 12:05:18'),('4021414','Generator Repair','Repair and Maintenance',3,1,1,0,'E',0,0,0.00,'Zoherul','2016-06-16 10:21:05','','0000-00-00 00:00:00'),('40213','Generator Running Expenses','Other Expenses',2,1,0,1,'E',0,0,0.00,'admin','2015-10-15 19:29:29','','0000-00-00 00:00:00'),('10103','Groceries and Cutleries','Non Current Assets',2,1,1,1,'A',0,0,0.00,'2','2018-07-12 10:02:55','','0000-00-00 00:00:00'),('1010408','Gym Equipment','Others Assets',3,1,1,0,'A',0,0,0.00,'admin','2016-03-27 10:46:03','','0000-00-00 00:00:00'),('4020907','Honorarium','Salary & Allowances',3,1,1,0,'E',0,0,0.00,'admin','2015-10-15 19:13:26','','0000-00-00 00:00:00'),('40205','House Rent','Other Expenses',2,1,0,1,'E',0,0,0.00,'anwarul','2013-08-24 10:26:56','','0000-00-00 00:00:00'),('40100001','HP-Hasilpur','Academic Expenses',2,1,1,0,'E',0,0,0.00,'2','2018-07-29 03:44:23','','0000-00-00 00:00:00'),('4020702','HR Recruitment Expenses','Miscellaneous Expenses',3,1,1,0,'E',0,0,0.00,'admin','2016-09-25 12:55:49','','0000-00-00 00:00:00'),('4020703','Incentive on Admission','Miscellaneous Expenses',3,1,1,0,'E',0,0,0.00,'admin','2016-09-25 12:56:09','','0000-00-00 00:00:00'),('3','Income','COA',0,1,0,0,'I',0,0,0.00,'','0000-00-00 00:00:00','','0000-00-00 00:00:00'),('5020302','Income Tax Payable','Liabilities for Expenses',3,1,0,1,'L',0,0,0.00,'admin','2016-09-19 11:18:17','admin','2016-09-28 13:18:35'),('102020302','Insurance Premium','Prepayment',4,1,1,0,'A',0,0,0.00,'admin','2016-09-19 13:10:57','','0000-00-00 00:00:00'),('4021001','Interest on Loan','Financial Expenses',3,1,1,0,'E',0,0,0.00,'admin','2015-10-15 19:20:53','admin','2016-09-19 14:53:34'),('4020401','Internet Bill','Utility Expenses',3,1,1,0,'E',0,0,0.00,'admin','2015-10-15 18:56:55','admin','2015-10-15 18:57:32'),('10107','Inventory','Non Current Assets',1,1,0,0,'A',0,0,0.00,'2','2018-07-07 15:21:58','','0000-00-00 00:00:00'),('102010309','iyzico','Online Payment',2,1,1,0,'A',0,0,0.00,'2','2020-10-18 14:32:35','','0000-00-00 00:00:00'),('10205010101','Jahangir','Hasan',1,1,0,0,'A',0,0,0.00,'2','2018-07-07 10:40:56','','0000-00-00 00:00:00'),('1010210','LCD TV','Office Equipment',3,1,1,0,'A',0,0,0.00,'admin','2015-10-15 15:52:27','','0000-00-00 00:00:00'),('30103','Lease Sale','Store Income',1,1,1,1,'I',0,0,0.00,'2','2018-07-08 07:51:52','','0000-00-00 00:00:00'),('5','Liabilities','COA',0,1,0,0,'L',0,0,0.00,'admin','2013-07-04 12:32:07','admin','2015-10-15 19:46:54'),('50203','Liabilities for Expenses','Current Liabilities',2,1,0,0,'L',0,0,0.00,'admin','2015-10-15 19:50:59','','0000-00-00 00:00:00'),('4020707','Library Expenses','Miscellaneous Expenses',3,1,1,0,'E',0,0,0.00,'admin','2017-01-10 15:34:54','','0000-00-00 00:00:00'),('4021409','Lift','Repair and Maintenance',3,1,1,0,'E',0,0,0.00,'admin','2015-10-15 19:36:12','','0000-00-00 00:00:00'),('50101','Long Term Borrowing','Non Current Liabilities',2,1,0,1,'L',0,0,0.00,'admin','2013-07-04 12:32:26','admin','2015-10-15 19:47:40'),('4020608','Marketing & Promotion Exp.','Promonational Expence',3,1,1,0,'E',0,0,0.00,'admin','2015-10-15 18:53:59','','0000-00-00 00:00:00'),('4020901','Medical Allowance','Salary & Allowances',3,1,1,0,'E',0,0,0.00,'admin','2015-10-15 19:11:33','','0000-00-00 00:00:00'),('1010411','Metal Ditector','Others Assets',3,1,1,0,'A',0,0,0.00,'Zoherul','2016-08-22 10:55:22','','0000-00-00 00:00:00'),('4021413','Micro Oven','Repair and Maintenance',3,1,1,0,'E',0,0,0.00,'Zoherul','2016-05-12 14:53:51','','0000-00-00 00:00:00'),('30202','Miscellaneous (Income)','Other Income',2,1,1,1,'I',0,0,0.00,'anwarul','2014-02-06 15:26:31','admin','2016-09-25 11:04:35'),('4020909','Miscellaneous Benifit','Salary & Allowances',3,1,1,0,'E',0,0,0.00,'admin','2015-10-15 19:13:53','','0000-00-00 00:00:00'),('4020701','Miscellaneous Exp','Miscellaneous Expenses',3,1,1,0,'E',0,0,0.00,'admin','2016-09-25 12:54:39','','0000-00-00 00:00:00'),('40207','Miscellaneous Expenses','Other Expenses',2,1,0,1,'E',0,0,0.00,'anwarul','2014-04-26 16:49:56','admin','2016-09-25 12:54:19'),('1010401','Mobile Phone','Others Assets',3,1,1,0,'A',0,0,0.00,'admin','2016-01-29 10:43:30','','0000-00-00 00:00:00'),('102020101','Mr Ashiqur Rahman','Advance',4,1,1,0,'A',0,0,0.00,'admin','2015-12-31 16:47:23','admin','2016-09-25 11:55:13'),('1010212','Network Accessories','Office Equipment',3,1,1,0,'A',0,0,0.00,'admin','2016-01-02 16:23:32','','0000-00-00 00:00:00'),('102020106','new head dfhgfh','Advance',3,1,0,0,'A',0,0,0.00,'2','2020-01-16 06:25:10','','0000-00-00 00:00:00'),('4020408','News Paper Bill','Utility Expenses',3,1,1,0,'E',0,0,0.00,'admin','2016-01-02 15:55:57','','0000-00-00 00:00:00'),('101','Non Current Assets','Assets',1,1,0,0,'A',0,0,0.00,'','0000-00-00 00:00:00','admin','2015-10-15 15:29:11'),('501','Non Current Liabilities','Liabilities',1,1,0,0,'L',0,0,0.00,'anwarul','2014-08-30 13:18:20','admin','2015-10-15 19:49:21'),('406','Office Accessories','Expense',1,1,1,0,'E',1,1,1.00,'2','2020-01-18 07:51:32','','0000-00-00 00:00:00'),('1010404','Office Decoration','Others Assets',3,1,1,0,'A',0,0,0.00,'admin','2016-03-27 10:40:02','','0000-00-00 00:00:00'),('10102','Office Equipment','Non Current Assets',2,1,0,1,'A',0,0,0.00,'anwarul','2013-12-06 18:08:00','admin','2015-10-15 15:48:21'),('4021401','Office Repair & Maintenance','Repair and Maintenance',3,1,1,0,'E',0,0,0.00,'admin','2015-10-15 19:33:15','','0000-00-00 00:00:00'),('30201','Office Stationary (Income)','Other Income',2,1,1,1,'I',0,0,0.00,'anwarul','2013-07-17 15:21:06','admin','2016-09-25 11:04:50'),('1020103','Online Payment','Cash & Cash Equivalent',2,1,0,1,'A',0,0,0.00,'2','2020-10-18 14:26:41','','0000-00-00 00:00:00'),('102010308','Orange Money payment','Online Payment',2,1,1,0,'A',0,0,0.00,'2','2020-10-18 14:32:11','','0000-00-00 00:00:00'),('402','Other Expenses','Expense',1,1,0,0,'E',0,0,0.00,'2','2018-07-07 14:00:16','admin','2015-10-15 18:37:42'),('302','Other Income','Income',1,1,0,0,'I',0,0,0.00,'2','2018-07-07 13:40:57','admin','2016-09-25 11:04:09'),('40211','Others (Non Academic Expenses)','Other Expenses',2,1,0,1,'E',0,0,0.00,'Obaidul','2014-12-03 16:05:42','admin','2015-10-15 19:22:09'),('30205','Others (Non-Academic Income)','Other Income',2,1,0,1,'I',0,0,0.00,'admin','2015-10-15 17:23:49','admin','2015-10-15 17:57:52'),('10104','Others Assets','Non Current Assets',2,1,0,1,'A',0,0,0.00,'admin','2016-01-29 10:43:16','','0000-00-00 00:00:00'),('4020910','Outstanding Salary','Salary & Allowances',3,1,1,0,'E',0,0,0.00,'Zoherul','2016-04-24 11:56:50','','0000-00-00 00:00:00'),('4021405','Oven','Repair and Maintenance',3,1,1,0,'E',0,0,0.00,'admin','2015-10-15 19:34:31','','0000-00-00 00:00:00'),('4021412','PABX-Repair','Repair and Maintenance',3,1,1,0,'E',0,0,0.00,'Zoherul','2016-04-24 14:40:18','','0000-00-00 00:00:00'),('4020902','Part-time Staff Salary','Salary & Allowances',3,1,1,0,'E',0,0,0.00,'admin','2015-10-15 19:12:06','','0000-00-00 00:00:00'),('102010301','Paypal','Online Payment',2,1,1,0,'A',0,0,0.00,'2','2020-10-18 14:27:41','','0000-00-00 00:00:00'),('102010306','Paystack Payments','Online Payment',2,1,1,0,'A',0,0,0.00,'2','2020-10-18 14:30:55','','0000-00-00 00:00:00'),('102010307','Paytm Payments','Online Payment',2,1,1,0,'A',0,0,0.00,'2','2020-10-18 14:31:23','','0000-00-00 00:00:00'),('1010202','Photocopy & Fax Machine','Office Equipment',3,1,1,0,'A',0,0,0.00,'admin','2015-10-15 15:47:27','admin','2016-05-23 12:14:40'),('4021411','Photocopy Machine Repair','Repair and Maintenance',3,1,1,0,'E',0,0,0.00,'Zoherul','2016-04-24 12:40:02','admin','2017-04-27 17:03:17'),('3020503','Practical Fee','Others (Non-Academic Income)',3,1,1,1,'I',0,0,0.00,'admin','2017-07-22 18:00:37','','0000-00-00 00:00:00'),('1020203','Prepayment','Advance, Deposit And Pre-payments',3,1,0,1,'A',0,0,0.00,'admin','2015-10-15 15:40:51','admin','2015-12-31 16:49:58'),('1010201','Printer','Office Equipment',3,1,1,0,'A',0,0,0.00,'admin','2015-10-15 15:47:15','','0000-00-00 00:00:00'),('407','Product Purchase','Expense',0,1,0,0,'E',0,0,0.00,'2','2020-01-23 07:09:10','','0000-00-00 00:00:00'),('3020502','Professional Training Course(Oracal-1)','Others (Non-Academic Income)',3,1,1,0,'I',0,0,0.00,'nasim','2017-06-22 13:28:05','','0000-00-00 00:00:00'),('30207','Professional Training Course(Oracal)','Other Income',2,1,0,1,'I',0,0,0.00,'nasim','2017-06-22 13:24:16','nasim','2017-06-22 13:25:56'),('1010208','Projector','Office Equipment',3,1,1,0,'A',0,0,0.00,'admin','2015-10-15 15:51:44','','0000-00-00 00:00:00'),('40206','Promonational Expense','Other Expenses',2,1,0,1,'E',0,0,0.00,'anwarul','2013-07-11 13:48:57','anwarul','2013-07-17 14:23:03'),('40214','Repair and Maintenance','Other Expenses',2,1,0,1,'E',0,0,0.00,'admin','2015-10-15 19:32:46','','0000-00-00 00:00:00'),('202','Reserve & Surplus','Equity',1,1,0,1,'L',0,0,0.00,'admin','2016-09-25 14:06:34','admin','2016-10-02 17:48:57'),('20102','Retained Earnings','Share Holders Equity',2,1,1,1,'L',0,0,0.00,'admin','2016-05-23 11:20:40','admin','2016-09-25 14:05:06'),('4020708','River Cruse','Miscellaneous Expenses',3,1,1,0,'E',0,0,0.00,'admin','2017-04-24 15:35:25','','0000-00-00 00:00:00'),('102010311','RMA PAYMENT GATEWAY','Online Payment',2,1,1,0,'A',0,0,0.00,'2','2020-10-18 14:33:12','','0000-00-00 00:00:00'),('102020105','Salary','Advance',4,1,0,0,'A',0,0,0.00,'admin','2018-07-05 11:46:44','','0000-00-00 00:00:00'),('40209','Salary & Allowances','Other Expenses',2,1,0,1,'E',0,0,0.00,'anwarul','2013-12-12 11:22:58','','0000-00-00 00:00:00'),('404','Sale Discount','Expense',1,1,1,0,'E',0,0,0.00,'2','2018-07-19 10:15:11','','0000-00-00 00:00:00'),('303','Sale Income','Income',0,1,1,1,'I',0,0,0.00,'2','2020-01-23 06:58:20','','0000-00-00 00:00:00'),('1010406','Security Equipment','Others Assets',3,1,1,0,'A',0,0,0.00,'admin','2016-03-27 10:41:30','','0000-00-00 00:00:00'),('30104','Service Charge Income','Store Income',1,1,1,0,'I',0,0,0.00,'2','2020-12-30 11:23:32','','0000-00-00 00:00:00'),('20101','Share Capital','Share Holders Equity',2,1,0,1,'L',0,0,0.00,'anwarul','2013-12-08 19:37:32','admin','2015-10-15 19:45:35'),('201','Share Holders Equity','Equity',1,1,0,0,'L',0,0,0.00,'','0000-00-00 00:00:00','admin','2015-10-15 19:43:51'),('50201','Short Term Borrowing','Current Liabilities',2,1,0,1,'L',0,0,0.00,'admin','2015-10-15 19:50:30','','0000-00-00 00:00:00'),('102010310','SIPS Office','Online Payment',2,1,1,0,'A',0,0,0.00,'2','2020-10-18 14:32:54','','0000-00-00 00:00:00'),('4020906','Special Allowances','Salary & Allowances',3,1,1,0,'E',0,0,0.00,'admin','2015-10-15 19:13:13','','0000-00-00 00:00:00'),('50102','Sponsors Loan','Non Current Liabilities',2,1,0,1,'L',0,0,0.00,'admin','2015-10-15 19:48:02','','0000-00-00 00:00:00'),('4020706','Sports Expense','Miscellaneous Expenses',3,1,1,0,'E',0,0,0.00,'nasmud','2016-11-09 13:16:53','','0000-00-00 00:00:00'),('102010304','Square Payments','Online Payment',2,1,1,0,'A',0,0,0.00,'2','2020-10-18 14:29:32','','0000-00-00 00:00:00'),('102010302','SSLCommerz','Online Payment',2,1,1,0,'A',0,0,0.00,'2','2020-10-18 14:28:06','','0000-00-00 00:00:00'),('401','Store Expenses','Expense',1,1,0,0,'E',0,0,0.00,'2','2018-07-07 13:38:59','admin','2015-10-15 17:58:46'),('301','Store Income','Income',1,1,0,0,'I',0,0,0.00,'2','2018-07-07 13:40:37','admin','2015-09-17 17:00:02'),('102010305','Stripe Payment','Online Payment',2,1,1,0,'A',0,0,0.00,'2','2020-10-18 14:29:59','','0000-00-00 00:00:00'),('3020501','Students Info. Correction Fee','Others (Non-Academic Income)',3,1,1,0,'I',0,0,0.00,'admin','2015-10-15 17:24:45','','0000-00-00 00:00:00'),('1010601','Sub Station','Electrical Equipment',3,1,1,0,'A',0,0,0.00,'admin','2016-03-27 10:44:11','','0000-00-00 00:00:00'),('502020501','sup_002-Kamal Hossain','Suppliers',4,1,1,0,'L',0,0,0.00,'2','2020-01-18 10:49:49','','0000-00-00 00:00:00'),('502020504','sup_002-Supplier_1','Suppliers',4,1,1,0,'L',0,0,0.00,'2','2020-09-08 14:26:40','','0000-00-00 00:00:00'),('502020502','sup_003-Maruf','Suppliers',4,1,1,0,'L',0,0,0.00,'2','2020-01-18 10:56:31','','0000-00-00 00:00:00'),('502020503','sup_004-Saiful','Suppliers',4,1,1,0,'L',0,0,0.00,'2','2020-01-18 10:57:04','2','2020-01-21 13:10:59'),('5020205','Suppliers','Account Payable',3,1,0,1,'L',0,0,0.00,'2','2018-12-15 06:50:12','','0000-00-00 00:00:00'),('4020704','TB Care Expenses','Miscellaneous Expenses',3,1,1,0,'E',0,0,0.00,'admin','2016-10-08 13:03:04','','0000-00-00 00:00:00'),('4020501','TDS on House Rent','House Rent',3,1,1,0,'E',0,0,0.00,'admin','2015-10-15 18:44:07','admin','2016-09-19 14:40:16'),('502030201','TDS Payable House Rent','Income Tax Payable',4,1,1,0,'L',0,0,0.00,'admin','2016-09-19 11:19:42','admin','2016-09-28 13:19:37'),('502030203','TDS Payable on Advertisement Bill','Income Tax Payable',4,1,1,0,'L',0,0,0.00,'admin','2016-09-28 13:20:51','','0000-00-00 00:00:00'),('502030202','TDS Payable on Salary','Income Tax Payable',4,1,1,0,'L',0,0,0.00,'admin','2016-09-28 13:20:17','','0000-00-00 00:00:00'),('4021402','Tea Kettle','Repair and Maintenance',3,1,1,0,'E',0,0,0.00,'admin','2015-10-15 19:33:45','','0000-00-00 00:00:00'),('4020402','Telephone Bill','Utility Expenses',3,1,1,0,'E',0,0,0.00,'admin','2015-10-15 18:57:59','','0000-00-00 00:00:00'),('1010209','Telephone Set & PABX','Office Equipment',3,1,1,0,'A',0,0,0.00,'admin','2015-10-15 15:51:57','admin','2016-10-02 17:10:40'),('102020104','Test','Advance',4,1,1,0,'A',0,0,0.00,'admin','2018-07-05 11:42:48','','0000-00-00 00:00:00'),('40203','Travelling & Conveyance','Other Expenses',2,1,1,1,'E',0,0,0.00,'admin','2013-07-08 16:22:06','admin','2015-10-15 18:45:13'),('4021406','TV','Repair and Maintenance',3,1,1,0,'E',0,0,0.00,'admin','2015-10-15 19:35:07','','0000-00-00 00:00:00'),('102010303','Two Checkout','Online Payment',2,1,1,0,'A',0,0,0.00,'2','2020-10-18 14:28:29','','0000-00-00 00:00:00'),('1010205','UPS','Office Equipment',3,1,1,0,'A',0,0,0.00,'admin','2015-10-15 15:50:38','','0000-00-00 00:00:00'),('40204','Utility Expenses','Other Expenses',2,1,0,1,'E',0,0,0.00,'anwarul','2013-07-11 16:20:24','admin','2016-01-02 15:55:22'),('4020503','VAT on House Rent Exp','House Rent',3,1,1,0,'E',0,0,0.00,'admin','2015-10-15 18:49:22','admin','2016-09-25 14:00:52'),('5020301','VAT Payable','Liabilities for Expenses',3,1,0,1,'L',0,0,0.00,'admin','2015-10-15 19:51:11','admin','2016-09-28 13:23:53'),('502030101','VAT- TAX','VAT Payable',3,1,1,0,'L',0,0,0.00,'2','2020-12-30 10:58:49','','0000-00-00 00:00:00'),('1010409','Vehicle A/C','Others Assets',3,1,1,0,'A',0,0,0.00,'Zoherul','2016-05-12 12:13:21','','0000-00-00 00:00:00'),('1010405','Voltage Stablizer','Others Assets',3,1,1,0,'A',0,0,0.00,'admin','2016-03-27 10:40:59','','0000-00-00 00:00:00'),('1010105','Waiting Sofa - Steel','Furniture & Fixturers',3,1,1,0,'A',0,0,0.00,'admin','2015-10-15 15:46:29','','0000-00-00 00:00:00'),('4020405','WASA Bill','Utility Expenses',3,1,1,0,'E',0,0,0.00,'admin','2015-10-15 18:58:51','','0000-00-00 00:00:00'),('1010402','Water Purifier','Others Assets',3,1,1,0,'A',0,0,0.00,'admin','2016-01-29 11:14:11','','0000-00-00 00:00:00'),('4020705','Website Development Expenses','Miscellaneous Expenses',3,1,1,0,'E',0,0,0.00,'admin','2016-10-15 12:42:47','','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `acc_coa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `acc_customer_income`
--

LOCK TABLES `acc_customer_income` WRITE;
/*!40000 ALTER TABLE `acc_customer_income` DISABLE KEYS */;
/*!40000 ALTER TABLE `acc_customer_income` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `acc_glsummarybalance`
--

LOCK TABLES `acc_glsummarybalance` WRITE;
/*!40000 ALTER TABLE `acc_glsummarybalance` DISABLE KEYS */;
/*!40000 ALTER TABLE `acc_glsummarybalance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `acc_income_expence`
--

LOCK TABLES `acc_income_expence` WRITE;
/*!40000 ALTER TABLE `acc_income_expence` DISABLE KEYS */;
/*!40000 ALTER TABLE `acc_income_expence` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `acc_temp`
--

LOCK TABLES `acc_temp` WRITE;
/*!40000 ALTER TABLE `acc_temp` DISABLE KEYS */;
/*!40000 ALTER TABLE `acc_temp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `acc_transaction`
--

LOCK TABLES `acc_transaction` WRITE;
/*!40000 ALTER TABLE `acc_transaction` DISABLE KEYS */;
INSERT INTO `acc_transaction` VALUES (1,'Sale0001','Sales Products','2025-01-24','1020101','Sale Income For Online paymentcusL-0001-Walkin',79.80,0.00,0,'1','2','2025-01-24 00:00:00',NULL,NULL,'1'),(2,'0001','CIV','2025-01-24','102030101','Customer debit for Product Invoice#0001',74.55,0.00,0,'1','2','2025-01-24 00:00:00',NULL,NULL,'1'),(3,'0001','CIV','2025-01-24','10107','Inventory Credit for Product Invoice#0001',0.00,74.55,0,'1','2','2025-01-24 00:00:00',NULL,NULL,'1'),(4,'0001','CIV','2025-01-24','102030101','Customer Credit for Product Invoice#0001',0.00,74.55,0,'1','2','2025-01-24 00:00:00',NULL,NULL,'1'),(5,'Sale0001','Sales Products','2025-01-24','303','Sale Income For cusL-0001-Walkin',0.00,74.55,0,'1','2','2025-01-24 00:00:00',NULL,NULL,'1'),(6,'Sale0002','Sales Products','2025-01-24','1020101','Sale Income For Online paymentcusL-0004-Kabir khan',119.70,0.00,0,'1','2','2025-01-24 00:00:00',NULL,NULL,'1'),(7,'0002','CIV','2025-01-24','102030109','Customer debit for Product Invoice#0002',111.83,0.00,0,'1','2','2025-01-24 00:00:00',NULL,NULL,'1'),(8,'0002','CIV','2025-01-24','10107','Inventory Credit for Product Invoice#0002',0.00,111.83,0,'1','2','2025-01-24 00:00:00',NULL,NULL,'1'),(9,'0002','CIV','2025-01-24','102030109','Customer Credit for Product Invoice#0002',0.00,111.83,0,'1','2','2025-01-24 00:00:00',NULL,NULL,'1'),(10,'Sale0002','Sales Products','2025-01-24','303','Sale Income For cusL-0004-Kabir khan',0.00,111.83,0,'1','2','2025-01-24 00:00:00',NULL,NULL,'1'),(11,'Sale0004','Sales Products','2025-01-24','1020101','Sale Income For Online paymentcusL-0005-Ravi Kumar',39.90,0.00,0,'1','2','2025-01-24 00:00:00',NULL,NULL,'1'),(12,'0004','CIV','2025-01-24','102030116','Customer debit for Product Invoice#0004',37.28,0.00,0,'1','2','2025-01-24 00:00:00',NULL,NULL,'1'),(13,'0004','CIV','2025-01-24','10107','Inventory Credit for Product Invoice#0004',0.00,37.28,0,'1','2','2025-01-24 00:00:00',NULL,NULL,'1'),(14,'0004','CIV','2025-01-24','102030116','Customer Credit for Product Invoice#0004',0.00,37.28,0,'1','2','2025-01-24 00:00:00',NULL,NULL,'1'),(15,'Sale0004','Sales Products','2025-01-24','303','Sale Income For cusL-0005-Ravi Kumar',0.00,37.28,0,'1','2','2025-01-24 00:00:00',NULL,NULL,'1'),(16,'Sale0003','Sales Products','2025-01-24','1020101','Sale Income For Online paymentcusL-0001-Walkin',119.70,0.00,0,'1','2','2025-01-24 00:00:00',NULL,NULL,'1'),(17,'0003','CIV','2025-01-24','102030101','Customer debit for Product Invoice#0003',111.83,0.00,0,'1','2','2025-01-24 00:00:00',NULL,NULL,'1'),(18,'0003','CIV','2025-01-24','10107','Inventory Credit for Product Invoice#0003',0.00,111.83,0,'1','2','2025-01-24 00:00:00',NULL,NULL,'1'),(19,'0003','CIV','2025-01-24','102030101','Customer Credit for Product Invoice#0003',0.00,111.83,0,'1','2','2025-01-24 00:00:00',NULL,NULL,'1'),(20,'Sale0003','Sales Products','2025-01-24','303','Sale Income For cusL-0001-Walkin',0.00,111.83,0,'1','2','2025-01-24 00:00:00',NULL,NULL,'1');
/*!40000 ALTER TABLE `acc_transaction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `accesslog`
--

LOCK TABLES `accesslog` WRITE;
/*!40000 ALTER TABLE `accesslog` DISABLE KEYS */;
INSERT INTO `accesslog` VALUES (1,'Add Category','Insert Data','Category is Created','John Doe','2025-01-23 16:50:07'),(2,'Category List','Update Data','Category Updated','John Doe','2025-01-23 16:59:40'),(3,'Category List','Update Data','Category Updated','John Doe','2025-01-24 12:08:01'),(4,'Category List','Update Data','Category Updated','John Doe','2025-01-24 12:14:07'),(5,'Category List','Update Data','Category Updated','John Doe','2025-01-24 12:14:10'),(6,'Category List','Update Data','Category Updated','John Doe','2025-01-24 12:15:24'),(7,'Category List','Update Data','Category Updated','John Doe','2025-01-24 12:15:30'),(8,'Category List','Update Data','Category Updated','John Doe','2025-01-24 12:15:37'),(9,'Category List','Update Data','Category Updated','John Doe','2025-01-24 12:15:44'),(10,'Category List','Update Data','Category Updated','John Doe','2025-01-24 12:16:13'),(11,'Category List','Update Data','Category Updated','John Doe','2025-01-24 12:16:21'),(12,'Category List','Update Data','Category Updated','John Doe','2025-01-24 12:16:38'),(13,'Category List','Update Data','Category Updated','John Doe','2025-01-24 12:16:45'),(14,'Category List','Update Data','Category Updated','John Doe','2025-01-24 12:16:54'),(15,'Category List','Update Data','Category Updated','John Doe','2025-01-24 12:17:03'),(16,'Category List','Update Data','Category Updated','John Doe','2025-01-24 12:17:15'),(17,'Category List','Update Data','Category Updated','John Doe','2025-01-24 12:17:24'),(18,'Category List','Update Data','Category Updated','John Doe','2025-01-24 12:18:43'),(19,'Category List','Update Data','Category Updated','John Doe','2025-01-24 12:19:42'),(20,'Category List','Update Data','Category Updated','John Doe','2025-01-24 12:20:29'),(21,'Category List','Update Data','Category Updated','John Doe','2025-01-24 12:21:42'),(22,'Category List','Update Data','Category Updated','John Doe','2025-01-24 12:22:12'),(23,'Category List','Update Data','Category Updated','John Doe','2025-01-24 12:22:36'),(24,'Category List','Update Data','Category Updated','John Doe','2025-01-24 12:23:24'),(25,'Category List','Update Data','Category Updated','John Doe','2025-01-24 12:24:08'),(26,'Category List','Update Data','Category Updated','John Doe','2025-01-24 12:24:12'),(27,'Category List','Update Data','Category Updated','John Doe','2025-01-24 12:24:35'),(28,'Category List','Update Data','Category Updated','John Doe','2025-01-24 12:24:58'),(29,'Category List','Update Data','Category Updated','John Doe','2025-01-24 12:25:21'),(30,'Category List','Update Data','Category Updated','John Doe','2025-01-24 12:26:39'),(31,'Category List','Update Data','Category Updated','John Doe','2025-01-24 12:26:46'),(32,'Category List','Update Data','Category Updated','John Doe','2025-01-24 12:27:32'),(33,'Category List','Update Data','Category Updated','John Doe','2025-01-24 12:28:00'),(34,'Category List','Update Data','Category Updated','John Doe','2025-01-24 12:28:14'),(35,'Category List','Update Data','Category Updated','John Doe','2025-01-24 12:28:29'),(36,'Category List','Update Data','Category Updated','John Doe','2025-01-24 12:29:46'),(37,'Category List','Update Data','Category Updated','John Doe','2025-01-24 12:30:28'),(38,'Category List','Update Data','Category Updated','John Doe','2025-01-24 12:30:38'),(39,'Category List','Update Data','Category Updated','John Doe','2025-01-24 12:31:02'),(40,'Category List','Update Data','Category Updated','John Doe','2025-01-24 12:31:24'),(41,'Category List','Update Data','Category Updated','John Doe','2025-01-24 12:31:44'),(42,'Category List','Update Data','Category Updated','John Doe','2025-01-24 12:32:07'),(43,'Category List','Update Data','Category Updated','John Doe','2025-01-24 16:54:27'),(44,'Category List','Update Data','Category Updated','John Doe','2025-01-24 16:55:50'),(45,'Category List','Update Data','Category Updated','John Doe','2025-01-24 16:56:24'),(46,'Category List','Update Data','Category Updated','John Doe','2025-01-24 16:56:45'),(47,'Category List','Update Data','Category Updated','John Doe','2025-01-24 16:57:01'),(48,'Category List','Update Data','Category Updated','John Doe','2025-01-24 16:57:06'),(49,'Category List','Update Data','Category Updated','John Doe','2025-01-24 16:58:13'),(50,'Category List','Update Data','Category Updated','John Doe','2025-01-24 16:58:30'),(51,'Category List','Update Data','Category Updated','John Doe','2025-01-24 16:58:37'),(52,'Category List','Update Data','Category Updated','John Doe','2025-01-24 16:58:53'),(53,'Category List','Update Data','Category Updated','John Doe','2025-01-24 16:59:17'),(54,'Category List','Update Data','Category Updated','John Doe','2025-01-24 17:00:52'),(55,'Category List','Update Data','Category Updated','John Doe','2025-01-24 17:01:26'),(56,'Category List','Update Data','Category Updated','John Doe','2025-01-24 17:01:48'),(57,'Category List','Update Data','Category Updated','John Doe','2025-01-24 17:02:12'),(58,'Category List','Update Data','Category Updated','John Doe','2025-01-24 17:03:04'),(59,'Category List','Update Data','Category Updated','John Doe','2025-01-24 17:03:48'),(60,'Category List','Update Data','Category Updated','John Doe','2025-01-24 17:04:11'),(61,'Category List','Update Data','Category Updated','John Doe','2025-01-24 17:04:28'),(62,'Category List','Update Data','Category Updated','John Doe','2025-01-24 17:05:08'),(63,'Category List','Update Data','Category Updated','John Doe','2025-01-24 17:06:20'),(64,'Category List','Update Data','Category Updated','John Doe','2025-01-24 17:06:40'),(65,'Category List','Update Data','Category Updated','John Doe','2025-01-24 17:06:57'),(66,'Category List','Update Data','Category Updated','John Doe','2025-01-24 17:07:21'),(67,'Category List','Update Data','Category Updated','John Doe','2025-01-24 17:07:41'),(68,'Category List','Update Data','Category Updated','John Doe','2025-01-24 17:07:52'),(69,'Category List','Update Data','Category Updated','John Doe','2025-01-24 17:08:22'),(70,'Category List','Update Data','Category Updated','John Doe','2025-01-24 17:08:50'),(71,'Category List','Update Data','Category Updated','John Doe','2025-01-24 17:09:04'),(72,'Category List','Update Data','Category Updated','John Doe','2025-01-24 17:09:18'),(73,'Category List','Update Data','Category Updated','John Doe','2025-01-24 17:09:32'),(74,'Category List','Update Data','Category Updated','John Doe','2025-01-24 17:09:42'),(75,'Category List','Update Data','Category Updated','John Doe','2025-01-24 17:10:23'),(76,'Kitchen List','Insert Data','New Kitchen Created','John Doe','2025-01-24 17:23:29'),(77,'Kitchen List','Insert Data','New Kitchen Created','John Doe','2025-01-24 17:23:42'),(78,'Kitchen List','Insert Data','New Kitchen Created','John Doe','2025-01-24 17:24:00'),(79,'Kitchen List','Insert Data','New Kitchen Created','John Doe','2025-01-24 17:24:16'),(80,'Kitchen List','Insert Data','New Kitchen Created','John Doe','2025-01-24 17:24:36'),(81,'Kitchen List','Insert Data','New Kitchen Created','John Doe','2025-01-24 17:24:52'),(82,'Add Food','Insert Data','New Food Added','John Doe','2025-01-24 17:28:05'),(83,'Varient List','Insert Data','New Varient Created','John Doe','2025-01-24 17:29:13'),(84,'Add New Order','Insert Data','Item New Order Created','John Doe','2025-01-24 17:30:54'),(85,'Order List','Insert Data','Order is Update','John Doe','2025-01-24 17:31:34'),(86,'Add New Order','Insert Data','Item New Order Created','John Doe','2025-01-24 17:33:09'),(87,'Order List','Insert Data','Order is Update','John Doe','2025-01-24 17:34:49'),(88,'Add New Order','Insert Data','Item New Order Created','John Doe','2025-01-24 18:47:57'),(89,'Add Customer','Insert Data','Customer is Created','John Doe','2025-01-24 18:48:16'),(90,'Add New Order','Insert Data','Item New Order Created','John Doe','2025-01-24 18:49:38'),(91,'Order List','Insert Data','Order is Update','John Doe','2025-01-24 18:49:42'),(92,'Order List','Insert Data','Order is Update','John Doe','2025-01-24 18:49:54');
/*!40000 ALTER TABLE `accesslog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `acn_account_transaction`
--

LOCK TABLES `acn_account_transaction` WRITE;
/*!40000 ALTER TABLE `acn_account_transaction` DISABLE KEYS */;
/*!40000 ALTER TABLE `acn_account_transaction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `add_ons`
--

LOCK TABLES `add_ons` WRITE;
/*!40000 ALTER TABLE `add_ons` DISABLE KEYS */;
/*!40000 ALTER TABLE `add_ons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `award`
--

LOCK TABLES `award` WRITE;
/*!40000 ALTER TABLE `award` DISABLE KEYS */;
/*!40000 ALTER TABLE `award` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `bank_summary`
--

LOCK TABLES `bank_summary` WRITE;
/*!40000 ALTER TABLE `bank_summary` DISABLE KEYS */;
/*!40000 ALTER TABLE `bank_summary` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `bill`
--

LOCK TABLES `bill` WRITE;
/*!40000 ALTER TABLE `bill` DISABLE KEYS */;
INSERT INTO `bill` VALUES (1,1,1,70,4.2,14,NULL,NULL,5.25,79.8,'2025-01-24','17:30:55','2025-01-24 17:31:34',1,4,2,'2025-01-24',0,'0000-00-00'),(2,36,2,105,6.3,21,NULL,NULL,7.875,119.7,'2025-01-24','17:33:10','2025-01-24 17:34:48',1,4,2,'2025-01-24',0,'0000-00-00'),(3,1,3,105,6.3,21,NULL,NULL,7.875,119.7,'2025-01-24','18:47:58','2025-01-24 18:49:54',1,4,2,'2025-01-24',0,'0000-00-00'),(4,54,4,35,2.1,7,NULL,NULL,2.625,39.9,'2025-01-24','18:49:38','2025-01-24 18:49:42',1,4,2,'2025-01-24',0,'0000-00-00');
/*!40000 ALTER TABLE `bill` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `bill_card_payment`
--

LOCK TABLES `bill_card_payment` WRITE;
/*!40000 ALTER TABLE `bill_card_payment` DISABLE KEYS */;
/*!40000 ALTER TABLE `bill_card_payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `candidate_basic_info`
--

LOCK TABLES `candidate_basic_info` WRITE;
/*!40000 ALTER TABLE `candidate_basic_info` DISABLE KEYS */;
/*!40000 ALTER TABLE `candidate_basic_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `candidate_education_info`
--

LOCK TABLES `candidate_education_info` WRITE;
/*!40000 ALTER TABLE `candidate_education_info` DISABLE KEYS */;
/*!40000 ALTER TABLE `candidate_education_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `candidate_interview`
--

LOCK TABLES `candidate_interview` WRITE;
/*!40000 ALTER TABLE `candidate_interview` DISABLE KEYS */;
/*!40000 ALTER TABLE `candidate_interview` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `candidate_selection`
--

LOCK TABLES `candidate_selection` WRITE;
/*!40000 ALTER TABLE `candidate_selection` DISABLE KEYS */;
/*!40000 ALTER TABLE `candidate_selection` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `candidate_shortlist`
--

LOCK TABLES `candidate_shortlist` WRITE;
/*!40000 ALTER TABLE `candidate_shortlist` DISABLE KEYS */;
/*!40000 ALTER TABLE `candidate_shortlist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `candidate_workexperience`
--

LOCK TABLES `candidate_workexperience` WRITE;
/*!40000 ALTER TABLE `candidate_workexperience` DISABLE KEYS */;
/*!40000 ALTER TABLE `candidate_workexperience` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `check_addones`
--

LOCK TABLES `check_addones` WRITE;
/*!40000 ALTER TABLE `check_addones` DISABLE KEYS */;
/*!40000 ALTER TABLE `check_addones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `common_setting`
--

LOCK TABLES `common_setting` WRITE;
/*!40000 ALTER TABLE `common_setting` DISABLE KEYS */;
INSERT INTO `common_setting` VALUES (1,'<p>Level 2, Crown Hotel, Port Moresby,</p>\r\n<p>Papua New Guinea</p>','accounts@adzguru.co','8582957232','+91 8582957232','assets/img/2021-01-02/b.png','assets/img/2021-01-02/b1.png',1,'Developed with ❤️ by Adzguru (PNG) Limited\r\n',1,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `common_setting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `currency`
--

LOCK TABLES `currency` WRITE;
/*!40000 ALTER TABLE `currency` DISABLE KEYS */;
INSERT INTO `currency` VALUES (1,'BDT','BDT',2,83.00),(2,'USD','$',1,1.00),(3,'INR','R',1,0.50);
/*!40000 ALTER TABLE `currency` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `custom_table`
--

LOCK TABLES `custom_table` WRITE;
/*!40000 ALTER TABLE `custom_table` DISABLE KEYS */;
INSERT INTO `custom_table` VALUES (52,'Chinese Cuisine',1,'coffee roastery located on a busy corner site in Farringdon\'s Exmouth Market. With glazed frontage on two sides ','EU3APTYY'),(54,'French Suicine',1,'coffee roastery located on a busy corner site in Farringdon\'s Exmouth Market. With glazed frontage on two sides ','EXL9WSCL'),(55,'Chinese Cuisine',1,'coffee roastery located on a busy corner site in Farringdon\'s Exmouth Market. With glazed frontage on two sides ','E3Y1WJMB'),(56,'Kitchen Lead',1,'coffee roastery located on a busy corner site in Farringdon\'s Exmouth Market. With glazed frontage on two sides ','EBK2UPRA');
/*!40000 ALTER TABLE `custom_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `customer_info`
--

LOCK TABLES `customer_info` WRITE;
/*!40000 ALTER TABLE `customer_info` DISABLE KEYS */;
INSERT INTO `customer_info` VALUES (1,'cusL-0001',NULL,2,'Walkin','test@gmail.com',NULL,'cO_Sa2fwscE:APA91bEFDD0sbV52pZPwJEl8MEUCcHBg2wIGjKfelfbiytAj4nJlPsKf8sSupfElBq-nm36DCkjYDEoUcA7qvtzKu4vDqjutF23f6Y_0uw4L_PlJIrtl61y4s-t5OKFAmdaU9OUQTtYS','dhaka','8801717426371',NULL,'ddd',NULL,1),(36,'cusL-0004',NULL,1,'Kabir khan','kabir@gmail.com','827ccb0eea8a706c4c34a16891f84e7b',NULL,'DDD sgfsrgrg','1732432434','assets/img/icons/2021-11-10/m.png',NULL,'2021-08-31',1),(54,'cusL-0005',NULL,0,'Ravi Kumar','php.ravikr84@gmail.com',NULL,NULL,'11A RAMESHWAR GUHA STREET, TIRUPATI TOWER\r\nRoom 12, Dumdum Canttonment, KOLKATA-28','07439272532',NULL,'11A RAMESHWAR GUHA STREET, TIRUPATI TOWER\r\nRoom 12, Dumdum Canttonment, KOLKATA-28',NULL,1);
/*!40000 ALTER TABLE `customer_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `customer_membership_map`
--

LOCK TABLES `customer_membership_map` WRITE;
/*!40000 ALTER TABLE `customer_membership_map` DISABLE KEYS */;
/*!40000 ALTER TABLE `customer_membership_map` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `customer_order`
--

LOCK TABLES `customer_order` WRITE;
/*!40000 ALTER TABLE `customer_order` DISABLE KEYS */;
INSERT INTO `customer_order` VALUES (1,'0001',NULL,1,4,0,NULL,166,NULL,'2025-01-24','17:30:54','01:00:00',0,'01',79.80,79.80,'',NULL,4,1,NULL,0,NULL,'1790-01-01 01:01:01',0,NULL),(2,'0002',NULL,36,4,0,NULL,166,NULL,'2025-01-24','17:33:09','00:15:00',0,'02',119.70,119.70,'',NULL,4,1,NULL,0,NULL,'1790-01-01 01:01:01',0,NULL),(3,'0003',NULL,1,4,0,NULL,166,NULL,'2025-01-24','18:47:57','00:15:00',0,'03',119.70,119.70,'',NULL,4,1,NULL,0,NULL,'1790-01-01 01:01:01',0,NULL),(4,'0004',NULL,54,4,0,NULL,166,NULL,'2025-01-24','18:49:38','01:00:00',0,'04',39.90,39.90,'',NULL,4,1,NULL,0,NULL,'1790-01-01 01:01:01',0,NULL);
/*!40000 ALTER TABLE `customer_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `customer_type`
--

LOCK TABLES `customer_type` WRITE;
/*!40000 ALTER TABLE `customer_type` DISABLE KEYS */;
INSERT INTO `customer_type` VALUES (1,'Walk In Customer',0),(2,'Online Customer',0),(3,'Third Party',0),(4,'Take Way',0),(99,'QR Customer',0);
/*!40000 ALTER TABLE `customer_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `department`
--

LOCK TABLES `department` WRITE;
/*!40000 ALTER TABLE `department` DISABLE KEYS */;
INSERT INTO `department` VALUES (8,'ACCOUNTING',0),(9,'Human Resource',0),(10,'Delivery department',0),(11,'Garage and Parking',0),(12,'Manager',0),(13,'Restaurant',0),(14,'Waiter',13),(15,'Senior Accountant',8),(16,'Kitchen Manager',12),(17,'Chef',13),(18,'Sales Manager',12);
/*!40000 ALTER TABLE `department` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `duty_type`
--

LOCK TABLES `duty_type` WRITE;
/*!40000 ALTER TABLE `duty_type` DISABLE KEYS */;
INSERT INTO `duty_type` VALUES (1,'Full Time'),(2,'Part Time'),(3,'Contructual'),(4,'Other');
/*!40000 ALTER TABLE `duty_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `email_config`
--

LOCK TABLES `email_config` WRITE;
/*!40000 ALTER TABLE `email_config` DISABLE KEYS */;
INSERT INTO `email_config` VALUES (1,'ssl://smtp.googlemail.com','465','123456','SMTP','/usr/sbin/sendmail','html','ainalcse@gmail.com','22c4c92a-e5a8-4293-b64c-befc9248521e',1);
/*!40000 ALTER TABLE `email_config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `emp_attendance`
--

LOCK TABLES `emp_attendance` WRITE;
/*!40000 ALTER TABLE `emp_attendance` DISABLE KEYS */;
/*!40000 ALTER TABLE `emp_attendance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `employee_benifit`
--

LOCK TABLES `employee_benifit` WRITE;
/*!40000 ALTER TABLE `employee_benifit` DISABLE KEYS */;
/*!40000 ALTER TABLE `employee_benifit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `employee_history`
--

LOCK TABLES `employee_history` WRITE;
/*!40000 ALTER TABLE `employee_history` DISABLE KEYS */;
INSERT INTO `employee_history` VALUES (162,'EY2T1OWA','4','jahangir',NULL,'Ahmad','jahangir@gmail.com','0195511016',NULL,NULL,NULL,'./application/modules/employee/assets/images/2018-09-20/pra.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,4,15,3,NULL,'New York','New',234234,0,1,'2018-09-19','2018-09-19','2018-09-19','sdfasdf',2,'2018-09-26',1,323,2,'234',324234,2523,'234','234532','','','1970-01-01',1,NULL,'0','dfasdfsdf','2018-09-19',1,'Bangladesh',2,'sunni','234324','23423',1,1,'u@gmail.com','b@gmail.com','dsfsdf','dsfdsf','sdfsdf','42342323','234234','234234','2343','234','324234','324324'),(165,'145454','6','Hm',NULL,'Isahaq','hmisahaq@gmail.com','2344098234',NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,14,6,NULL,'Alabama','deom',3243,0,1,'2018-09-20','2018-09-20','2018-09-29','fsdf',1,'2018-09-29',1,234,3,'234',0,0,'','','','','1970-01-01',1,NULL,'0','324','2018-09-29',1,'Bangladesh',1,'sdfsdf','','23423',1,1,'234','sd','82309423','','234','324234','34242','546456','','','',''),(166,'EQLAJFUW','6','Ainal','','Haque','ainal@gmail.com','01715234991',NULL,NULL,NULL,'./application/modules/hrm/assets/images/2019-01-22/u.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,14,0,NULL,'Alabama','',0,1,1,'2018-11-12','2018-11-12','2018-11-12','',1,'2018-11-12',1,100,1,'',0,0,'','','','','2018-11-12',1,NULL,'0','','2018-11-12',1,'Bangladesh',1,'','','3425',1,1,'','','017123657332','','017123657332','017123657332','017123657332','017123657332','','','',''),(168,'E97E9SJT','6','Manik ','','Hassan','manik@gmail.com','01913251229',NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,14,0,NULL,'Alabama','Dhaka',143325,1,1,'2019-01-01','2019-01-01','2021-01-31','sdfs',1,'2022-01-09',1,100,1,'',0,0,'','','','','2019-01-09',1,NULL,'0','','1970-01-01',1,'Bangladesh',1,'','','e4dfg',1,1,'','','34353636','','3636','345345','3453','3453','','','',''),(177,'EZR0A9IB','1','Di',NULL,'Maria','dimaria@gmail.com','25423456272',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,17,0,NULL,'Oklahoma','',0,1,1,'2021-07-01','2021-07-01','2022-02-28','',1,'2022-02-28',1,200,1,'',0,0,'','',NULL,NULL,NULL,NULL,NULL,'1','','2000-09-01',1,'United State',1,'','','',1,1,'','','457568234','','2323223','366879','889995454','234245654','','','','');
/*!40000 ALTER TABLE `employee_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `employee_performance`
--

LOCK TABLES `employee_performance` WRITE;
/*!40000 ALTER TABLE `employee_performance` DISABLE KEYS */;
/*!40000 ALTER TABLE `employee_performance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `employee_sal_pay_type`
--

LOCK TABLES `employee_sal_pay_type` WRITE;
/*!40000 ALTER TABLE `employee_sal_pay_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `employee_sal_pay_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `employee_salary_payment`
--

LOCK TABLES `employee_salary_payment` WRITE;
/*!40000 ALTER TABLE `employee_salary_payment` DISABLE KEYS */;
/*!40000 ALTER TABLE `employee_salary_payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `employee_salary_setup`
--

LOCK TABLES `employee_salary_setup` WRITE;
/*!40000 ALTER TABLE `employee_salary_setup` DISABLE KEYS */;
/*!40000 ALTER TABLE `employee_salary_setup` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `expense`
--

LOCK TABLES `expense` WRITE;
/*!40000 ALTER TABLE `expense` DISABLE KEYS */;
/*!40000 ALTER TABLE `expense` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `expense_item`
--

LOCK TABLES `expense_item` WRITE;
/*!40000 ALTER TABLE `expense_item` DISABLE KEYS */;
/*!40000 ALTER TABLE `expense_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `facebook_settings`
--

LOCK TABLES `facebook_settings` WRITE;
/*!40000 ALTER TABLE `facebook_settings` DISABLE KEYS */;
/*!40000 ALTER TABLE `facebook_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `foodvariable`
--

LOCK TABLES `foodvariable` WRITE;
/*!40000 ALTER TABLE `foodvariable` DISABLE KEYS */;
/*!40000 ALTER TABLE `foodvariable` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `gender`
--

LOCK TABLES `gender` WRITE;
/*!40000 ALTER TABLE `gender` DISABLE KEYS */;
INSERT INTO `gender` VALUES (1,'Male'),(2,'Female'),(3,'Other');
/*!40000 ALTER TABLE `gender` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `grand_loan`
--

LOCK TABLES `grand_loan` WRITE;
/*!40000 ALTER TABLE `grand_loan` DISABLE KEYS */;
/*!40000 ALTER TABLE `grand_loan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `ingredients`
--

LOCK TABLES `ingredients` WRITE;
/*!40000 ALTER TABLE `ingredients` DISABLE KEYS */;
/*!40000 ALTER TABLE `ingredients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `item_category`
--

LOCK TABLES `item_category` WRITE;
/*!40000 ALTER TABLE `item_category` DISABLE KEYS */;
INSERT INTO `item_category` VALUES (1,'Naan Item','./application/modules/itemmanage/assets/images/2025-01-23/C3.jpg',NULL,1,'0000-00-00','0000-00-00',0,0,0,2,0,'2025-01-24 10:30:52','2025-01-24 12:23:24','0000-00-00 00:00:00'),(2,'Garlic Naan','./application/modules/itemmanage/assets/images/2025-01-23/C3.jpg',NULL,1,'0000-00-00','0000-00-00',0,1,0,2,0,'2025-01-24 10:30:52','2025-01-24 12:24:08','0000-00-00 00:00:00'),(3,'Tawa Naan','./application/modules/itemmanage/assets/images/2025-01-23/C3.jpg',NULL,1,'0000-00-00','0000-00-00',0,1,0,2,0,'2025-01-24 10:30:52','2025-01-24 12:24:12','0000-00-00 00:00:00'),(4,'Juice','./application/modules/itemmanage/assets/images/2025-01-23/C3.jpg',NULL,1,'0000-00-00','0000-00-00',0,0,0,2,0,'2025-01-24 10:30:52','2025-01-24 12:24:35','0000-00-00 00:00:00'),(5,'Orange juice','./application/modules/itemmanage/assets/images/2025-01-23/C3.jpg',NULL,1,'0000-00-00','0000-00-00',0,4,0,2,0,'2025-01-24 10:30:52','2025-01-24 12:24:58','0000-00-00 00:00:00'),(6,'Special Summer','./application/modules/itemmanage/assets/images/2025-01-23/C3.jpg',NULL,1,'0000-00-00','0000-00-00',0,4,0,2,0,'2025-01-24 10:30:52','2025-01-24 12:25:21','0000-00-00 00:00:00'),(7,'Strawberry Juice','./application/modules/itemmanage/assets/images/2025-01-23/C3.jpg',NULL,1,'0000-00-00','0000-00-00',0,4,0,2,0,'2025-01-24 10:30:52','2025-01-24 12:26:46','0000-00-00 00:00:00'),(8,'Soup','./application/modules/itemmanage/assets/images/2025-01-23/C3.jpg',NULL,1,'0000-00-00','0000-00-00',0,0,0,2,0,'2025-01-24 10:30:52','2025-01-24 12:14:10','0000-00-00 00:00:00'),(9,'Minestrone Soup','./application/modules/itemmanage/assets/images/2025-01-23/C3.jpg',NULL,1,'0000-00-00','0000-00-00',0,8,0,2,0,'2025-01-24 10:30:52','2025-01-24 12:18:43','0000-00-00 00:00:00'),(10,'Creamy Potato Soup','./application/modules/itemmanage/assets/images/2025-01-23/C3.jpg',NULL,1,'0000-00-00','0000-00-00',0,8,0,2,0,'2025-01-24 10:30:52','2025-01-24 12:20:29','0000-00-00 00:00:00'),(11,'Kabab','./application/modules/itemmanage/assets/images/2025-01-23/C3.jpg',NULL,1,'0000-00-00','0000-00-00',0,0,0,2,0,'2025-01-24 10:30:52','2025-01-24 12:21:42','0000-00-00 00:00:00'),(12,'Chicken Angara Kabab','./application/modules/itemmanage/assets/images/2025-01-23/C3.jpg',NULL,1,'0000-00-00','0000-00-00',0,11,0,2,0,'2025-01-24 10:30:52','2025-01-24 12:22:12','0000-00-00 00:00:00'),(13,'Mutton Seekh Kebab','./application/modules/itemmanage/assets/images/2025-01-23/C3.jpg',NULL,1,'0000-00-00','0000-00-00',0,11,0,2,0,'2025-01-24 10:30:52','2025-01-24 12:22:36','0000-00-00 00:00:00'),(14,'Fast Food','./application/modules/itemmanage/assets/images/2025-01-23/C3.jpg',NULL,1,'0000-00-00','0000-00-00',0,0,0,2,0,'2025-01-24 10:30:52','2025-01-24 12:27:32','0000-00-00 00:00:00'),(15,'Burger+Potato Fries','./application/modules/itemmanage/assets/images/2025-01-23/C3.jpg',NULL,1,'0000-00-00','0000-00-00',0,14,0,2,0,'2025-01-24 10:30:52','2025-01-24 12:28:00','0000-00-00 00:00:00'),(16,'Hot Dog','./application/modules/itemmanage/assets/images/2025-01-23/C3.jpg',NULL,1,'0000-00-00','0000-00-00',0,14,0,2,0,'2025-01-24 10:30:52','2025-01-24 12:28:14','0000-00-00 00:00:00'),(17,'Hot Dog Sandwich','./application/modules/itemmanage/assets/images/2025-01-23/C3.jpg',NULL,1,'0000-00-00','0000-00-00',0,14,0,2,0,'2025-01-24 10:30:52','2025-01-24 12:28:29','0000-00-00 00:00:00'),(18,'Fried Chicken','./application/modules/itemmanage/assets/images/2025-01-23/C3.jpg',NULL,1,'0000-00-00','0000-00-00',0,14,0,2,0,'2025-01-24 10:30:52','2025-01-24 12:29:46','0000-00-00 00:00:00'),(19,'Dessert','./application/modules/itemmanage/assets/images/2025-01-23/S.png',NULL,1,'0000-00-00','0000-00-00',0,0,0,2,0,'2025-01-24 10:30:52','2025-01-24 12:30:28','0000-00-00 00:00:00'),(20,'Dessert Full Pack','./application/modules/itemmanage/assets/images/2025-01-24/S.jpg',NULL,1,'0000-00-00','0000-00-00',0,19,1,2,1,'2025-01-24 10:24:20','2025-01-24 12:30:38','2025-01-24 10:24:20'),(21,'Ice Creams','./application/modules/itemmanage/assets/images/2025-01-24/S.jpg',NULL,1,'0000-00-00','0000-00-00',0,0,1,2,1,'2025-01-24 10:24:20','2025-01-24 12:31:02','2025-01-24 10:24:20'),(22,'Ice Strawberry Cream','./application/modules/itemmanage/assets/images/2025-01-24/P.jpg',NULL,1,'0000-00-00','0000-00-00',0,21,1,2,1,'2025-01-24 10:24:20','2025-01-24 12:31:24','2025-01-24 10:24:20'),(23,'Butter Queen Vanilla','./application/modules/itemmanage/assets/images/2025-01-24/O.jpg',NULL,1,'0000-00-00','0000-00-00',0,21,1,2,1,'2025-01-24 10:24:20','2025-01-24 12:31:44','2025-01-24 10:24:20'),(24,'Ice Cream Ship','./application/modules/itemmanage/assets/images/2025-01-24/M1.jpg',NULL,1,'0000-00-00','0000-00-00',0,21,1,2,1,'2025-01-24 10:24:20','2025-01-24 12:32:07','2025-01-24 10:24:20'),(25,'Curry','./application/modules/itemmanage/assets/images/2025-01-24/M.jpg',NULL,1,'0000-00-00','0000-00-00',0,0,1,2,1,'2025-01-24 10:24:20','2025-01-24 16:55:50','2025-01-24 10:24:20'),(26,'Vegetarian Curry','./application/modules/itemmanage/assets/images/2025-01-24/L.jpg',NULL,1,'0000-00-00','0000-00-00',0,25,1,2,1,'2025-01-24 10:24:20','2025-01-24 16:56:24','2025-01-24 10:24:20'),(27,'Water','./application/modules/itemmanage/assets/images/2025-01-24/P.jpg',NULL,1,'0000-00-00','0000-00-00',0,0,1,2,1,'2025-01-24 10:24:20','2025-01-24 16:56:45','2025-01-24 10:24:20'),(28,'Mineral Water','./application/modules/itemmanage/assets/images/2025-01-24/I.jpg',NULL,1,'0000-00-00','0000-00-00',0,27,1,2,1,'2025-01-24 10:24:20','2025-01-24 16:57:01','2025-01-24 10:24:20'),(29,'Sparkling Water','./application/modules/itemmanage/assets/images/2025-01-24/H1.jpg',NULL,1,'0000-00-00','0000-00-00',0,27,1,2,1,'2025-01-24 10:24:20','2025-01-24 16:57:06','2025-01-24 10:24:20'),(30,'Tea','./application/modules/itemmanage/assets/images/2025-01-24/H.jpg',NULL,1,'0000-00-00','0000-00-00',0,0,1,2,1,'2025-01-24 10:24:20','2025-01-24 16:58:13','2025-01-24 10:24:20'),(31,'Masala Tea','./application/modules/itemmanage/assets/images/2025-01-24/M2.jpg',NULL,1,'0000-00-00','0000-00-00',0,30,1,2,1,'2025-01-24 10:24:20','2025-01-24 16:58:37','2025-01-24 10:24:20'),(32,'Lemon And Honey Tea','./application/modules/itemmanage/assets/images/2025-01-24/D.jpg',NULL,1,'0000-00-00','0000-00-00',0,30,1,2,1,'2025-01-24 10:24:20','2025-01-24 16:58:53','2025-01-24 10:24:20'),(33,'Sandwich','./application/modules/itemmanage/assets/images/2025-01-24/C4.jpg',NULL,1,'0000-00-00','0000-00-00',0,0,1,2,1,'2025-01-24 10:24:20','2025-01-24 17:00:52','2025-01-24 10:24:20'),(34,'Burger','./application/modules/itemmanage/assets/images/2025-01-24/C2.jpg',NULL,1,NULL,'0000-00-00',0,0,1,1,1,'2025-01-24 10:24:20','2025-01-24 10:24:20','2025-01-24 10:24:20'),(35,'Chicken Sub Sandwich','./application/modules/itemmanage/assets/images/2025-01-24/C1.jpg',NULL,1,'0000-00-00','0000-00-00',0,33,1,2,1,'2025-01-24 10:24:20','2025-01-24 17:01:26','2025-01-24 10:24:20'),(36,'Special Sub Sandwich','./application/modules/itemmanage/assets/images/2025-01-24/C.png',NULL,1,'0000-00-00','0000-00-00',0,33,1,2,1,'2025-01-24 10:24:20','2025-01-24 17:01:48','2025-01-24 10:24:20'),(37,'Egg Sandwich','./application/modules/itemmanage/assets/images/2025-01-24/C.jpg',NULL,1,'0000-00-00','0000-00-00',0,33,1,2,1,'2025-01-24 10:24:20','2025-01-24 17:02:12','2025-01-24 10:24:20'),(38,'Appetizer','./application/modules/itemmanage/assets/images/2025-01-24/B.jpg',NULL,1,'0000-00-00','0000-00-00',0,0,1,2,1,'2025-01-24 10:24:20','2025-01-24 17:04:11','2025-01-24 10:24:20'),(39,'Special Wonthon','./application/modules/itemmanage/assets/images/2025-01-24/A.jpg',NULL,1,'0000-00-00','0000-00-00',0,38,1,2,1,'2025-01-24 10:24:20','2025-01-24 17:03:48','2025-01-24 10:24:20'),(40,'Chicken Fry','./application/modules/itemmanage/assets/images/2025-01-23/C1.jpg',NULL,1,'0000-00-00','0000-00-00',0,38,2,2,2,'2025-01-23 16:50:07','2025-01-24 17:04:28','2025-01-23 16:50:07'),(41,'Chowmein & Noodles','./application/modules/itemmanage/assets/images/2025-01-23/D.jpg',NULL,1,'0000-00-00','0000-00-00',0,0,2,2,2,'2025-01-23 16:50:07','2025-01-24 17:06:20','2025-01-23 16:50:07'),(42,'Chicken Chowmein','./application/modules/itemmanage/assets/images/2025-01-23/C2.jpg',NULL,1,'0000-00-00','0000-00-00',0,41,2,2,2,'2025-01-23 16:50:07','2025-01-24 17:06:40','2025-01-23 16:50:07'),(43,'Mixed Chowmein','./application/modules/itemmanage/assets/images/2025-01-23/D1.jpg',NULL,1,'0000-00-00','0000-00-00',0,41,2,2,2,'2025-01-23 16:50:07','2025-01-24 17:06:57','2025-01-23 16:50:07'),(44,'Swarma','./application/modules/itemmanage/assets/images/2025-01-23/1.jpeg',NULL,1,'0000-00-00','0000-00-00',0,0,2,2,2,'2025-01-23 16:50:07','2025-01-24 17:07:21','2025-01-23 16:50:07'),(45,'Beef Swarma','./application/modules/itemmanage/assets/images/2025-01-23/b1.jpg',NULL,1,'0000-00-00','0000-00-00',0,44,2,2,2,'2025-01-23 16:50:07','2025-01-24 17:07:41','2025-01-23 16:50:07'),(46,'Chicken Swarma Roll','./application/modules/itemmanage/assets/images/2025-01-23/C3.jpg',NULL,1,'0000-00-00','0000-00-00',0,44,2,2,2,'2025-01-23 16:50:07','2025-01-24 17:07:52','2025-01-23 16:50:07'),(47,'Pizza','./application/modules/itemmanage/assets/images/2025-01-23/P.jpg',NULL,1,'0000-00-00','0000-00-00',0,0,2,2,2,'2025-01-23 16:50:07','2025-01-24 17:08:50','2025-01-23 16:50:07'),(48,'Vegetable Pizza','./application/modules/itemmanage/assets/images/2025-01-23/v.png',NULL,1,'0000-00-00','0000-00-00',0,47,2,2,2,'2025-01-23 16:50:07','2025-01-24 17:09:04','2025-01-23 16:50:07'),(49,'Cheese Loven Pizza','./application/modules/itemmanage/assets/images/2025-01-23/C1.png',NULL,1,'0000-00-00','0000-00-00',0,47,2,2,2,'2025-01-23 16:50:07','2025-01-24 17:09:18','2025-01-23 16:50:07'),(50,'Vegetable swarma','./application/modules/itemmanage/assets/images/2025-01-23/2.jpeg',NULL,1,'0000-00-00','0000-00-00',0,44,2,2,2,'2025-01-23 16:50:07','2025-01-24 17:08:22','2025-01-23 16:50:07'),(51,'Pasta','./application/modules/itemmanage/assets/images/2025-01-23/S2.jpg',NULL,1,'0000-00-00','0000-00-00',0,0,2,2,2,'2025-01-23 16:50:07','2025-01-24 17:09:32','2025-01-23 16:50:07'),(52,'Vegan Pasta Sauce','./application/modules/itemmanage/assets/images/2025-01-23/G.jpg',NULL,1,'0000-00-00','0000-00-00',0,51,2,2,2,'2025-01-23 16:50:07','2025-01-24 17:09:42','2025-01-23 16:50:07'),(53,'Squid Fry','./application/modules/itemmanage/assets/images/2025-01-23/S1.jpg',NULL,1,'0000-00-00','0000-00-00',0,38,2,2,2,'2025-01-23 16:50:07','2025-01-24 17:05:08','2025-01-23 16:50:07'),(54,'Vegetable Beef soup with Noodles','./application/modules/itemmanage/assets/images/2025-01-23/1.jpeg',NULL,1,'0000-00-00','0000-00-00',0,8,2,2,2,'2025-01-23 16:50:07','2025-01-24 12:19:42','2025-01-23 16:50:07'),(55,'Chineese','',NULL,1,'0000-00-00','0000-00-00',0,9,2,2,2,'2025-01-23 16:50:07','2025-01-24 17:10:23','2025-01-23 16:50:07');
/*!40000 ALTER TABLE `item_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `item_foods`
--

LOCK TABLES `item_foods` WRITE;
/*!40000 ALTER TABLE `item_foods` DISABLE KEYS */;
INSERT INTO `item_foods` VALUES (1,3,'Tawa Naan','application/modules/itemmanage/assets/images/Tawa_Naan.jpg','application/modules/itemmanage/assets/images/big/Tawa_Naan.jpg','application/modules/itemmanage/assets/images/medium/Tawa_Naan.jpg','application/modules/itemmanage/assets/images/small/Tawa_Naan.jpg','','','','5,2',0.000,0,0,0,'0000-00-00','0000-00-00',NULL,16,NULL,NULL,'00:00:00',1,2,2,2,'2025-01-24 17:28:05','2025-01-24 17:28:05','2025-01-24 17:28:05',NULL,NULL);
/*!40000 ALTER TABLE `item_foods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `job_advertisement`
--

LOCK TABLES `job_advertisement` WRITE;
/*!40000 ALTER TABLE `job_advertisement` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_advertisement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `language`
--

LOCK TABLES `language` WRITE;
/*!40000 ALTER TABLE `language` DISABLE KEYS */;
INSERT INTO `language` VALUES (2,'login','Login'),(3,'email','Email Address'),(4,'password','Password'),(5,'reset','Reset'),(6,'dashboard','Dashboard'),(7,'home','Home'),(8,'profile','Profile'),(9,'profile_setting','Profile Setting'),(10,'firstname','First Name'),(11,'lastname','Last Name'),(12,'about','About'),(13,'preview','Preview'),(14,'image','Image'),(15,'save','Save'),(16,'upload_successfully','Upload Successfully!'),(17,'user_added_successfully','User Added Successfully!'),(18,'please_try_again','Please Try Again...'),(19,'inbox_message','Inbox Messages'),(20,'sent_message','Sent Message'),(21,'message_details','Message Details'),(22,'new_message','New Message'),(23,'receiver_name','Receiver Name'),(24,'sender_name','Sender Name'),(25,'subject','Subject'),(26,'message','Message'),(27,'message_sent','Message Sent!'),(28,'ip_address','IP Address'),(29,'last_login','Last Login'),(30,'last_logout','Last Logout'),(31,'status','Status'),(33,'send','Send'),(34,'date','Date'),(35,'action','Action'),(36,'sl_no','SL No.'),(37,'are_you_sure','Are You Sure ? '),(38,'application_setting','Application Setting'),(39,'application_title','Application Title'),(41,'phone','Phone'),(42,'favicon','Favicon'),(43,'logo','Logo'),(44,'language','Language'),(45,'left_to_right','Left To Right'),(46,'right_to_left','Right To Left'),(47,'footer_text','Footer Text'),(48,'site_align','Application Alignment'),(49,'welcome_back','Welcome Back!'),(50,'please_contact_with_admin','Please Contact With Admin'),(51,'incorrect_email_or_password','Incorrect Email/Password'),(52,'select_option','Select Option'),(53,'ftp_setting','Data Synchronize [FTP Setting]'),(54,'hostname','Host Name'),(55,'username','User Name'),(56,'ftp_port','FTP Port'),(57,'ftp_debug','FTP Debug'),(58,'project_root','Project Root'),(59,'update_successfully','Update Successfully'),(60,'save_successfully','Save Successfully!'),(61,'delete_successfully','Delete Successfully!'),(62,'internet_connection','Internet Connection'),(63,'ok','Okay'),(64,'not_available','Not Available'),(65,'available','Available'),(66,'outgoing_file','Outgoing File'),(67,'incoming_file','Incoming File'),(68,'data_synchronize','Data Synchronize'),(69,'unable_to_upload_file_please_check_configuration','Unable to upload file! please check configuration'),(70,'please_configure_synchronizer_settings','Please configure synchronizer settings'),(71,'download_successfully','Download Successfully'),(72,'unable_to_download_file_please_check_configuration','Unable to download file! please check configuration'),(73,'data_import_first','Data Import First'),(74,'data_import_successfully','Data Import Successfully!'),(75,'unable_to_import_data_please_check_config_or_sql_file','Unable to Import Data! Please Check Configuration / SQL File.'),(76,'download_data_from_server','Download Data from Server'),(77,'data_import_to_database','Data Import To Database'),(79,'data_upload_to_server','Data Upload to Server'),(81,'ooops_something_went_wrong',' Ops Something Went Wrong...'),(82,'module_permission_list','Module Permission List'),(83,'user_permission','User Permission'),(84,'add_module_permission','Add Module Permission'),(85,'module_permission_added_successfully','Module Permission Added Successfully!'),(86,'update_module_permission','Update Module Permission'),(87,'download','Download'),(88,'module_name','Module Name'),(89,'create','Create'),(90,'read','Read'),(91,'update','Update'),(92,'delete','Delete'),(93,'module_list','Module List'),(94,'add_module','Add Module'),(95,'directory','Module Directory'),(96,'description','Description'),(97,'image_upload_successfully','Image Upload Successfully!'),(98,'module_added_successfully','Module Added Successfully'),(99,'inactive','Inactive'),(100,'active','Active'),(101,'user_list','User List'),(102,'see_all_message','See All Messages'),(103,'setting','Setting'),(104,'logout','Logout'),(105,'admin','Admin'),(106,'add_user','Add User'),(107,'user','User'),(108,'module','Module'),(109,'new','New'),(110,'inbox','Inbox'),(111,'sent','Sent'),(112,'synchronize','Synchronize'),(113,'data_synchronizer','Data Synchronizer'),(114,'module_permission','Module Permission'),(115,'backup_now','Backup Now!'),(116,'restore_now','Restore Now!'),(117,'backup_and_restore','Backup and Restore'),(118,'captcha','Captcha Word'),(119,'database_backup','Database Backup'),(120,'restore_successfully','Restore Successfully'),(121,'backup_successfully','Backup Successfully'),(122,'filename','File Name'),(123,'file_information','File Information'),(125,'backup_date','Backup Date'),(126,'overwrite','Overwrite'),(127,'invalid_file','Invalid File!'),(128,'invalid_module','Invalid Module'),(129,'remove_successfully','Remove Successfully!'),(130,'install','Install'),(131,'uninstall','Uninstall'),(132,'tables_are_not_available_in_database','Tables are not available in database.sql'),(133,'no_tables_are_registered_in_config','No tables are registered in config.php'),(134,'enquiry','Enquiry'),(135,'read_unread','Read/Unread'),(136,'enquiry_information','Enquiry Information'),(137,'user_agent','User Agent'),(138,'checked_by','Checked By'),(139,'new_enquiry','New Enquiry'),(140,'crud','Crud'),(141,'view','View'),(144,'ph','Phone'),(145,'cid','SL No'),(146,'view_atn','Attendance View'),(147,'mang','Employee Management'),(148,'designation','Designation'),(149,'test','Test'),(150,'sl','SL'),(151,'bdtask','BDTASK'),(152,'practice','Practice'),(153,'branch_name','Branch Name'),(154,'chairman_name','Chairman'),(155,'b_photo','Photo'),(156,'b_address','Address'),(157,'position','Designation'),(158,'advertisement','Advertisement'),(159,'position_name','Position'),(160,'position_details','Details'),(161,'circularprocess','Recruitment'),(162,'pos_id','Position'),(163,'adv_circular_date','Publish Date'),(164,'circular_dadeline','Deadline'),(165,'adv_file','Documents'),(166,'adv_details','Details'),(167,'attendance','Attendance'),(168,'employee','Employee'),(169,'emp_id','Employee Name'),(170,'sign_in','Sign In'),(171,'sign_out','Sign Out'),(172,'staytime','Stay Time'),(173,'abc','abc'),(174,'first_name','First Name'),(175,'last_name','Last Name'),(176,'alter_phone','Alternative Phone'),(177,'present_address','Present Address'),(178,'parmanent_address','Permanent Address'),(179,'candidateinfo','Candidate Info'),(180,'add_advertisement','Add Advertisement'),(181,'advertisement_list','Manage Advertisement '),(182,'candidate_basic_info','Candidate Information'),(183,'can_basicinfo_list','Manage Candidate'),(184,'add_canbasic_info','Add New Candidate'),(185,'candidate_education_info','Candidate Educational Info'),(186,'can_educationinfo_list','Candidate Edu Info List'),(187,'add_edu_info','Add Educational Info'),(188,'can_id','Candidate Id'),(189,'degree_name','Obtained Degree'),(190,'university_name','University'),(191,'cgp','CGPA'),(192,'comments','Comments'),(193,'signature','Signature'),(194,'candidate_workexperience','Candidate Work Experience'),(195,'can_workexperience_list','Work Experience List'),(196,'add_can_experience','Add Work Experience'),(197,'company_name','Company Name'),(198,'working_period','Working Period'),(199,'duties','Duties'),(200,'supervisor','Supervisor'),(201,'candidate_workexpe','Candidate Work Experience'),(202,'candidate_shortlist','Candidate Shortlist'),(203,'shortlist_view','Manage Shortlist'),(204,'add_shortlist','Add Shortlist'),(205,'date_of_shortlist','Shortlist Date'),(206,'interview_date','Interview Date'),(207,'submit','Submit'),(208,'candidate_id','Your ID'),(209,'job_adv_id','Job Position'),(210,'sequence','Sequence'),(211,'candidate_interview','Interview'),(212,'interview_list','Interview list'),(213,'add_interview','Add interview'),(214,'interviewer_id','Interviewer'),(215,'interview_marks','Viva Marks'),(216,'written_total_marks','Written Total Marks'),(217,'mcq_total_marks','MCQ Total Marks'),(218,'recommandation','Recommendation'),(219,'selection','Selection'),(220,'details','Details'),(221,'candidate_selection','Candidate Selection'),(222,'selection_list','Selection List'),(223,'add_selection','Add Selection'),(224,'employee_id','Employee Id'),(225,'position_id','1'),(226,'selection_terms','Selection Terms'),(227,'total_marks','Total Marks'),(228,'photo','Picture'),(229,'your_id','Your ID'),(230,'change_image','Change Photo'),(231,'picture','Photograph'),(232,'ad','Add'),(233,'write_y_p_info','Write Your Personal Information'),(234,'emp_position','Employee Position'),(235,'add_pos','Add Position'),(236,'list_pos','List of Position'),(237,'emp_salary_stup','Employee Salary Setup'),(238,'add_salary_stup','Add Salary Setup'),(239,'list_salarystup','List of Salary Setup'),(240,'emp_sal_name','Salary Name'),(241,'emp_sal_type','Salary Type'),(242,'emp_performance','Employee Performance'),(243,'add_performance','Add Performance'),(244,'list_performance','List of Performance'),(245,'note','Note'),(246,'note_by','Note By'),(247,'number_of_star','Number of Star'),(248,'updated_by','Updated By'),(249,'emp_sal_payment','Manage Employee Salary'),(250,'add_payment','Add Payment'),(251,'list_payment','List of payment'),(252,'total_salary','Total Salary'),(253,'total_working_minutes','Working Hour'),(254,'payment_due','Payment Type'),(255,'payment_date','Date'),(256,'paid_by','Paid By'),(257,'view_employee_payment','Employee Payment List'),(258,'sal_payment_type','Salary Payment Type'),(259,'add_payment_type','Add Payment Type'),(260,'list_payment_type','List of Payment Type'),(261,'payment_period','Payment Period'),(262,'payment_type','Payment Type'),(263,'time','Punch Time'),(264,'shift','Shift'),(265,'location','Location'),(266,'logtype','Log Type'),(267,'branch','Location'),(268,'student','Students'),(269,'csv','CSV'),(270,'save_successfull','Your Data Save Successfully'),(271,'successfully_updated','Your Data Successfully Updated'),(272,'atn_form','Attendance Form'),(273,'atn_report','Attendance Report'),(274,'end_date','To'),(275,'start_date','From'),(276,'done','Done'),(277,'employee_id_se','Write Employee Id or name here '),(278,'attendance_repor','Attendance Report'),(279,'e_time','End Time'),(280,'s_time','Start Time'),(281,'atn_datewiserer','Date Wise Report'),(282,'atn_report_id','Date And Id base Report'),(283,'atn_report_time','Date And Time report'),(284,'payroll','Payroll'),(285,'loan','Loan'),(286,'loan_grand','Grant Loan'),(287,'add_loan','Add Loan'),(288,'loan_list','List of Loan'),(289,'loan_details','Loan Details'),(290,'amount','Amount'),(291,'interest_rate','Interest Percentage'),(292,'installment_period','Installment Period'),(293,'repayment_amount','Repayment Total'),(294,'date_of_approve','Approved Date'),(295,'repayment_start_date','Repayment From'),(296,'permission_by','Permitted By'),(297,'grand','Grand'),(298,'installment','Installment'),(299,'loan_status','Status'),(300,'installment_period_m','Installment Period in Month'),(301,'successfully_inserted','Your loan Successfully Granted'),(302,'loan_installment','Loan Installment'),(303,'add_installment','Add Installment'),(304,'installment_list','List of Installment'),(305,'loan_id','Loan No'),(306,'installment_amount','Installment Amount'),(307,'payment','Payment'),(308,'received_by','Receiver'),(309,'installment_no','Install No'),(310,'notes','Notes'),(311,'paid','Paid'),(312,'loan_report','Loan Report'),(313,'e_r_id','Enter Your Employee ID'),(314,'leave','Leave'),(315,'add_leave','Add Leave'),(316,'list_leave','List of Leave'),(317,'dayname','Weekly Leave Day'),(318,'holiday','Holiday'),(319,'list_holiday','List of Holidays'),(320,'no_of_days','Number of Days'),(321,'holiday_name','Holiday Name'),(322,'set','Set'),(323,'tax','Tax'),(324,'tax_setup','Tax Setup'),(325,'add_tax_setup','Add Tax Setup'),(326,'list_tax_setup','List of Tax setup'),(327,'tax_collection','Tax collection'),(328,'start_amount','Start Amount'),(329,'end_amount','End Amount'),(330,'rate','Tax Rate'),(331,'date_start','Date Start'),(332,'amount_tax','Tax Amount'),(333,'collection_by','Collection By'),(334,'date_end','Date End'),(335,'income_net_period','Income  Net period'),(336,'default_amount','Default Amount'),(337,'add_sal_type','Add Salary Type'),(338,'list_sal_type','Salary Type List'),(339,'salary_type_setup','Salary Type Setup'),(340,'salary_setup','Salary Setup'),(341,'add_sal_setup','Add Salary Setup'),(342,'list_sal_setup','Salary Setup List'),(343,'salary_type_id','Salary Type'),(344,'salary_generate','Salary Generate'),(345,'add_sal_generate','Generate Now'),(346,'list_sal_generate','Generated Salary List'),(347,'gdate','Generate Date'),(348,'start_dates','Start Date'),(349,'generate','Generate '),(350,'successfully_saved_saletup',' Set up Successful'),(351,'s_date','Start Date'),(352,'e_date','End Date'),(353,'salary_payable','Payable Salary'),(354,'tax_manager','Tax'),(355,'generate_by','Generated By'),(356,'successfully_paid','Successfully Paid'),(357,'direct_empl',' Employee'),(358,'add_emp_info','Add New Employee'),(359,'new_empl_pos','Add New Employee Position'),(360,'manage','Manage Designation'),(361,'ad_advertisement','ADD POSITION'),(362,'moduless','Modules'),(363,'next','Next'),(364,'finish','Finish'),(365,'request','Request'),(366,'successfully_saved','Your Data Successfully Saved'),(367,'sal_type','Salary Type'),(368,'sal_name','Salary Name'),(369,'leave_application','Leave Application'),(370,'apply_strt_date','Application Start Date'),(371,'apply_end_date','Application End date'),(372,'leave_aprv_strt_date','Approved Start Date'),(373,'leave_aprv_end_date','Approved End Date'),(374,'num_aprv_day','Approved Day'),(375,'reason','Reason'),(376,'approve_date','Approved Date'),(377,'leave_type','Leave Type'),(378,'apply_hard_copy','Application Hard Copy'),(379,'approved_by','Approved By'),(380,'notice','Notice Board'),(381,'noticeboard','Notice Board'),(382,'notice_descriptiion','Description'),(383,'notice_date','Notice Date'),(384,'notice_type','Notice Type'),(385,'notice_by','Notice By'),(386,'notice_attachment','Attachment'),(387,'account_name','Account Name'),(388,'account_type','Account Type'),(389,'account_id','Account Name'),(390,'transaction_description','Description'),(391,'payment_id','Payment'),(392,'create_by_id','Created By'),(393,'account','Account'),(394,'account_add','Add Account'),(395,'account_transaction','Transaction'),(396,'award','Award'),(397,'new_award','New Award'),(398,'award_name','Award Name'),(399,'aw_description','Award Description'),(400,'awr_gift_item','Gift Item'),(401,'awarded_by','Award By'),(402,'employee_name','Employee Name'),(403,'employee_list','Atn List'),(404,'department','Department'),(405,'department_name','Department Name '),(406,'clockout','Clock Out'),(407,'se_account_id','Select Account Name'),(408,'division','Division'),(409,'add_division','Add Division'),(410,'update_division','Update Division'),(411,'division_name','Division Name'),(412,'division_list','Manage Division '),(413,'designation_list','Designation List'),(414,'manage_designation','Manage Designation'),(415,'add_designation','Add Designation'),(416,'select_division','Select Division'),(417,'select_designation','Select Designation'),(418,'asset','Asset'),(419,'asset_type','Asset Type'),(420,'add_type','Add Type'),(421,'type_list','Type List'),(422,'type_name','Type Name'),(423,'select_type','Select Type'),(424,'equipment_name','Equipment Name'),(425,'model','Model'),(426,'serial_no','Serial No'),(427,'equipment','Equipment'),(428,'add_equipment','Add Equipment'),(429,'equipment_list','Equipment List'),(430,'type','Type'),(431,'equipment_maping','Equipment Mapping'),(432,'add_maping','Add Mapping'),(433,'maping_list','Mapping List'),(434,'update_equipment','Update Equipment'),(435,'select_employee','Select Employee'),(436,'select_equipment','Select Equipment'),(437,'basic_info','Basic Information'),(438,'middle_name','Middle Name'),(441,'zip_code','Zip Code'),(442,'maiden_name','Maiden Name'),(443,'add_employee','Add Employee'),(444,'manage_employee','Manage Employee'),(445,'employee_update_form','Employee Update Form'),(446,'what_you_search','What You Search'),(448,'duty_type','Duty Type'),(449,'hire_date','Hire Date'),(450,'original_h_date','Original Hire Date'),(451,'voluntary_termination','Voluntary Termination'),(452,'termination_reason','Termination Reason'),(453,'termination_date','Termination Date'),(454,'re_hire_date','Re Hire Date'),(455,'rate_type','Rate Type'),(456,'pay_frequency','Pay Frequency'),(457,'pay_frequency_txt','Pay Frequency Text'),(458,'hourly_rate2','Hourly Rate2'),(459,'hourly_rate3','Hourly Rate3'),(460,'home_department','Home Department'),(461,'department_text','Department Text'),(462,'benifit_class_code','Benefit Class code'),(463,'benifit_desc','Benefit Description'),(464,'benifit_acc_date','Benefit Accrual Date'),(465,'benifit_sta','Benefit Status'),(466,'super_visor_name','Supervisor Name'),(467,'is_super_visor','Is Supervisor'),(468,'supervisor_report','Supervisor Report'),(469,'dob','Date of Birth'),(470,'gender','Gender'),(471,'marital_stats','Marital Status'),(472,'ethnic_group','Ethnic Group'),(473,'eeo_class_gp','EEO Class'),(474,'ssn','SSN'),(475,'work_in_state','Work in State'),(476,'live_in_state','Live in State'),(477,'home_email','Home Email'),(478,'business_email','Business Email'),(479,'home_phone','Home Phone'),(480,'business_phone','Business Phone'),(481,'cell_phone','Cell Phone'),(482,'emerg_contct','Emergency Contact'),(483,'emerg_home_phone','Emergency Home Phone'),(484,'emrg_w_phone','Emergency Work Phone'),(485,'emer_con_rela','Emergency Contact Relation'),(486,'alt_em_contct','Alter Emergency Contact'),(487,'alt_emg_h_phone','Alt Emergency Home Phone'),(488,'alt_emg_w_phone','Alt Emergency  Work Phone'),(489,'reports','Reports'),(490,'employee_reports','Employee Reports'),(491,'demographic_report','Demographic Report'),(492,'posting_report','Positional Report'),(493,'custom_report','Custom Report'),(494,'benifit_report','Benefit Report'),(495,'demographic_info','Demographical Information'),(496,'positional_info','Positional Info'),(497,'assets_info','Assets Information'),(498,'custom_field','Custom Field'),(499,'custom_value','Custom Data'),(500,'adhoc_report','Adhoc Report'),(501,'asset_assignment','Asset Assignment'),(502,'assign_asset','Assign Assets'),(503,'assign_list','Assign List'),(504,'update_assign','Update Assign'),(505,'citizenship','Citizenship'),(506,'class_sta','Class status'),(507,'class_acc_date','Class Accrual date'),(508,'class_descript','Class Description'),(509,'class_code','Class Code'),(510,'return_asset','Return Assets'),(511,'dept_id','Department ID'),(512,'parent_id','Parent ID'),(513,'equipment_id','Equipment ID'),(514,'issue_date','Issue Date'),(515,'damarage_desc','Damarage Description'),(516,'return_date','Return Date'),(517,'is_assign','Is Assign'),(518,'emp_his_id','Employee History ID'),(519,'damarage_descript','Damage Description'),(520,'return','Return'),(521,'return_successfull','Return Successful'),(522,'return_list','Return List'),(523,'custom_data','Custom Data'),(524,'passing_year','Passing Year'),(525,'is_admin','Is Admin'),(526,'zip','Zip Code'),(527,'original_hire_date','Original Hire Date'),(528,'rehire_date','Rehire Date'),(529,'class_code_desc','Class Code Description'),(530,'class_status','Class Status'),(531,'super_visor_id','Supervisor ID'),(532,'marital_status','Marital Status'),(533,'emrg_h_phone','Emergency Home Phone'),(534,'emgr_contct_relation','Emergency Contact Relation'),(535,'id','ID'),(536,'type_id','Equipment Type'),(537,'custom_id','Custom ID'),(538,'custom_data_type','Custom Data Type'),(539,'role_permission','Role Permission'),(540,'permission_setup','Permission Setup'),(541,'add_role','Add Role'),(542,'role_list','Role List'),(543,'user_access_role','User Access Role'),(544,'menu_item_list','Menu Item List'),(545,'ins_menu_for_application','Ins Menu  For Application'),(547,'page_url','Page URL'),(549,'role','Role'),(550,'role_name','Role Name'),(551,'single_checkin','Single Check In'),(552,'bulk_checkin','Bulk Check In'),(553,'manage_attendance','Manage Attendance'),(554,'attendance_list','Attendance List'),(557,'stay','Stay'),(558,'attendance_report','Attendance Report'),(559,'work_hour','Work Hour'),(560,'cancel','Cancel'),(561,'confirm_clock','Confirm Checkout'),(562,'add_attendance','Add Attendance'),(563,'upload_csv','Upload CSV'),(564,'import_attendance','Import Attendance'),(565,'manage_account','Manage Account'),(566,'add_account','Add Account'),(567,'add_new_account','Add New Account'),(568,'account_details','Account Details'),(569,'manage_transaction','Manage Transaction'),(570,'add_expence','Add Experience'),(571,'add_income','Add Income'),(572,'return_now','Return Now !!'),(573,'manage_award','Manage Award'),(574,'add_new_award','Add New Award'),(575,'personal_information','Personal Information'),(576,'educational_information','Educational Information'),(577,'past_experience','Past Experience'),(578,'basic_information','Basic Information'),(579,'result','Result'),(580,'institute_name','Institute Name'),(581,'education','Education'),(582,'manage_shortlist','Manage Short List'),(583,'manage_interview','Manage Interview'),(584,'manage_selection','Manage Selection'),(585,'add_new_dept','Add New Department'),(586,'manage_dept','Manage Department'),(587,'successfully_checkout','Checkout Successful !'),(588,'grant_loan','Grant Loan'),(589,'successfully_installed','Successfully Installed'),(590,'total_loan','Total Loan'),(591,'total_amount','Total Amount'),(592,'filter','Filter'),(593,'weekly_holiday','Weekly Holiday'),(594,'manage_application','Manage Application'),(595,'add_application','Add Application'),(596,'manage_holiday','Manage Holiday'),(597,'add_more_holiday','Add More Holiday'),(598,'manage_weekly_holiday','Manage Weekly Holiday'),(599,'add_weekly_holiday','Add Weekly Holiday'),(600,'manage_granted_loan','Manage Granted Loan'),(601,'manage_installment','Manage Installment'),(602,'add_new_notice','Add New Notice'),(603,'manage_notice','Manage Notice'),(604,'salary_type','Salary Type'),(605,'manage_salary_generate','Manage Salary Generate'),(606,'generate_now','Generate Now'),(607,'add_salary_setup','Add Salary Setup'),(608,'manage_salary_setup','Manage Salary Setup'),(609,'add_salary_type','Add Salary Type'),(610,'manage_salary_type','Manage Salary Type'),(611,'manage_tax_setup','Manage Tax Setup'),(612,'setup_tax','Setup Tax'),(613,'add_more','Add More'),(614,'tax_rate','Tax Rate'),(615,'no','No'),(616,'setup','Setup'),(617,'biographicalinfo','Bio-Graphical Information'),(618,'positional_information','Positional Information'),(620,'benifits','Benefits'),(621,'others_leave_application','Others Leave'),(622,'add_leave_type','Add Leave Type'),(623,'others_leave','Apply Leave'),(624,'number_of_leave_days','Number of Leave Days'),(627,'add_category','Add Category'),(630,'add_food','Add Food'),(634,'category_subtitle','Category Subtitle'),(635,'update_category','Update Category'),(636,'update_fooditem','Update Food Item'),(713,'food_list','Food List'),(717,'category_name','Category Name'),(718,'category_list','Category List'),(719,'itemmanage','Food Management'),(720,'manage_category','Manage Category'),(721,'manage_food','Manage Food'),(722,'offerdate','Offer Start Date'),(723,'manage_addons','Manage Add-ons'),(724,'add_adons','Add Add-ons'),(725,'menu_addons','Add-ons Menu'),(726,'addons_list','Add-ons List'),(727,'assign_adons','Add-ons Assign'),(728,'assign_adons_list','Add-ons Assign List'),(729,'update_adons','Update Add-ons'),(730,'item_name','Food Name'),(731,'price','Price'),(732,'offerenddate','Offer End Date'),(733,'units','Unit and Ingredients'),(734,'manage_unitmeasurement','Unit Measurement'),(735,'unit_list','Unit Measurement List'),(736,'unit_add','Add Unit'),(737,'unit_update','Unit Update'),(738,'unit_name','Unit Name'),(739,'manage_ingradient','Manage Ingredients'),(740,'ingradient_list','Ingredient List'),(741,'add_ingredient','Add Ingredient'),(742,'ingredient_name','Ingredient Name'),(743,'unit_short_name','Short Name'),(744,'update_ingredient','Update Ingredient'),(745,'component','Components'),(746,'vat_tax','Vat'),(748,'food_varient','Food Variant'),(749,'food_availablity','Food Availability'),(750,'add_varient','Add Variant'),(751,'varient_name','Variant Name'),(752,'variant_list','Variant List'),(753,'variant_edit','Update Variant'),(754,'food_availablelist','Food Available List'),(755,'add_availablity','Add Available Day & Time'),(756,'edit_availablity','Update Available Day & Time'),(757,'available_day','Available Day'),(758,'available_time','Available Time'),(759,'membership_management','Membership Management'),(760,'membership_list','Membership List'),(761,'membership_name','Membership Name'),(762,'discount','Discount'),(763,'other_facilities','Other Facilities'),(764,'membership_add','Add Membership'),(765,'membership_edit','Update Membership'),(766,'payment_setting','Payment Method Setting'),(767,'paymentmethod_list','Payment Method List'),(768,'payment_add','Add Payment Method'),(769,'payment_edit','Update Payment Method'),(770,'payment_name','Payment Method Name'),(771,'shipping_setting','Shipping Method Setting'),(772,'shipping_list','Shipping Method List'),(773,'shipping_name','Shipping Method Name'),(774,'shipping_add','Add Shipping Method'),(775,'shipping_edit','Update Shipping Method'),(776,'shippingrate','Shipping Rate'),(777,'supplier_manage','Supplier Manage'),(778,'supplier_name','Supplier Name'),(779,'supplier_list','Supplier List'),(780,'mobile','Mobile'),(781,'address','Address'),(782,'supplier_add','Add Supplier'),(783,'supplier_edit','Update Supplier'),(784,'purchase_item','Purchase Item'),(785,'purchase','Purchase Manage'),(786,'purchase_list','Purchase List'),(787,'purchase_add','Add Purchase'),(788,'purchase_edit','Update Purchase'),(789,'quantity','Quantity'),(790,'supplier_information','Supplier Information'),(791,'add_new_order','Add New Order'),(792,'pending_order','Pending Order'),(793,'processing_order','Processing Order'),(794,'cancel_order','Cancel Order'),(795,'complete_order','Complete Order'),(796,'pos_invoice','POS Invoice'),(797,'ordermanage','Manage Order'),(798,'table_manage','Manage Table'),(799,'table_edit','Update Table'),(800,'table_list','Table List'),(801,'table_name','Table Name'),(802,'customer_type','Customer Type'),(803,'customertype_list','Customer Type List'),(804,'production','Production'),(805,'add_table','Table Add'),(806,'table_add','Add Table'),(807,'add_new_table','Add Table'),(808,'order_list','Order List'),(809,'currency','Currency'),(810,'currency_list','Currency List'),(811,'currency_name','Currency Name'),(812,'currency_add','Add Currency'),(813,'currency_edit','Update Currency'),(814,'currency_icon','Currency Icon'),(815,'currency_rate','Conversion Rate'),(816,'report','Report'),(817,'purchase_report','Purchase Report'),(818,'purchase_report_ingredient','Stock Report (Kitchen)'),(819,'stock_report','Stock Report'),(820,'sell_report','Sales Report'),(821,'stock_report_product_wise','Stock Report (Food Items)'),(822,'accounts','Accounts'),(823,'c_o_a','Chart of Accounts'),(824,'debit_voucher','Debit Voucher'),(825,'credit_voucher','Credit Voucher'),(826,'contra_voucher','Contra Voucher'),(827,'journal_voucher','Journal Voucher'),(828,'voucher_approval','Voucher Approval'),(829,'account_report','Accounts Report'),(830,'voucher_report','Voucher Report'),(831,'cash_book','Cash Book'),(832,'bank_book','Bank Book'),(833,'general_ledger','General Ledger'),(834,'trial_balance','Trial Balance'),(835,'profit_loss','Profit Loss'),(836,'cash_flow','Cash Flow'),(837,'coa_print','COA Print'),(838,'in_quantity','In Quantity'),(839,'out_quantity','Out Quantity'),(840,'stock','Stock'),(841,'find','Find'),(842,'from_date','From'),(843,'to_date','To'),(844,'approved','Approved'),(845,'total_ammount','Total Amount'),(846,'total_purchase','Total Purchase'),(847,'total_sale','Total Sale'),(848,'csv_file_informaion','CSV File Information'),(849,'import_product_csv','Import product (CSV)'),(851,'production_set_list','Production Set List'),(852,'production_add','Add Production'),(853,'production_list','Production List'),(854,'billing_from','Billing From'),(855,'invoice','Invoice'),(856,'invoice_no','Invoice No'),(857,'billing_date','Billing Date'),(858,'billing_to','Billing To'),(859,'reservation','Reservation'),(860,'take_reservation','Take A Reservation'),(861,'update_table','Table Update'),(862,'reserve_time','Reservation Table'),(863,'reservation_table','Add Booking'),(864,'table_setting','Table Setting'),(865,'capacity','Capacity'),(866,'icon','Icon'),(867,'purchase_return','Purchase Return'),(868,'purchase_qty','Purchase Qty'),(869,'return_qty','Return Qty'),(870,'total','Total'),(871,'select','Select'),(872,'return_invoice','Return Invoice'),(873,'invoice_view','View Invoice'),(874,'grand_total','Grand Total'),(875,'supplier','Supplier'),(876,'po_no','Invoice No'),(877,'grant','Grant'),(878,'hrm','Human Resource'),(879,'departmentfrm','Add Department'),(880,'benefits','Benefits'),(881,'class','Class'),(882,'biographical_info','Biographical Info'),(883,'additional_address','Additional Address'),(884,'custom','Custom'),(885,'pay_now','Pay Now ??'),(886,'paymentmethod_setup','Payment Setup'),(887,'add_paymentsetup','Add New Payment Setup'),(888,'edit_setup','Update Setup'),(889,'marchantid','Marchant ID'),(890,'order_successfully','Your Payment was Completed!!!.'),(891,'order_fail','Payment Incomplete!!!'),(892,'voucher_no','Voucher No'),(893,'remark','Remark'),(894,'code','Code'),(895,'debit','Debit'),(896,'credit','Credit'),(897,'template_name','Template Name '),(898,'sms_template','SMS Template'),(899,'sms_template_warning','Please Use '),(900,'userid','User ID'),(901,'from','From'),(902,'opening_cash_and_equivalent','Opening Cash & Equivalent'),(903,'amount_in_Dollar','Amount In Dollar'),(904,'pre_balance','Pre Balance'),(905,'current_balance','Current Balance'),(906,'with_details','With Details'),(907,'credit_account_head','Credit Account Head'),(908,'gl_head','GL Head'),(909,'transaction_head','Transaction Head'),(910,'confirm','Confirm'),(911,'s_rate','Rate'),(912,'web_setting','Web Setting'),(913,'banner_setting','Banner Setting'),(914,'menu_setting','Menu Setting'),(915,'widget_setting','Widget Setting'),(916,'add_banner','Add Banner'),(917,'bannertype','Add Banner Type'),(918,'banner_list','Banner List'),(919,'title','Title'),(920,'subtitle','Sub Title'),(921,'banner_type','Banner Type'),(922,'link_url','Link URL'),(923,'banner_edit','Banner Update'),(924,'menu_name','Menu Name'),(925,'menu_url','Menu Slug'),(926,'sub_menu','Sub Menu'),(927,'add_menu','Add Menu'),(928,'parent_menu','Parent Menu'),(929,'widget_name','Widget Name'),(930,'widget_title','Widget Title'),(931,'widget_desc','Description'),(932,'add_widget','Add New'),(933,'common_setting','Common Setting'),(934,'bannersize','Banner Size'),(936,'height','Height'),(937,'exclusive','Exclusive'),(938,'best_Offers','Best Offer'),(939,'invalid_size','Invalid Size'),(940,'confirm_reservation','Confirm Reservation'),(941,'food_details','Food Details'),(942,'email_setting','Email Setting'),(943,'contact_email_list','Contact List'),(944,'subscribelist','Subscribe List'),(945,'contact_send','Your Contact Information Send Successfully.'),(946,'couponlist','Coupon List'),(947,'add_coupon','Add Coupon'),(948,'coupon_Code','Coupon Code'),(949,'coupon_rate','Coupon Value'),(950,'coupon_startdate','Start Date'),(951,'coupon_enddate','End Date'),(952,'coupon_edit','Update Coupon'),(953,'rating','Rating '),(954,'add_rating','Add Rating'),(955,'reviewtxt','Review Text'),(956,'rating_edit','Rating Update'),(957,'customer_rating','Customer Rating'),(958,'country_list','Country List'),(959,'countryname','Country Name'),(960,'add_country','Add Country'),(961,'edit_country','Update Country'),(962,'add_state','Add State'),(963,'edit_state','State Update'),(964,'state','State'),(965,'city','City'),(966,'add_city','Add City'),(967,'edit_city','City Update'),(968,'country','Country'),(969,'state_list','State List'),(970,'city_list','All City'),(971,'server_setting','App Setting'),(972,'netip','Your Local Host Full URL'),(974,'onlinebdname','Online Database Name'),(975,'dbuser','Database User'),(976,'dbpassword','Database Password'),(977,'dbhost','Database Host Name'),(978,'social_setting','Social Setting'),(979,'url_link','URL'),(980,'sicon','Select Icon'),(981,'ord_failed','Order Failed!!!'),(982,'failed_msg','Order not placed due to some reason. Please Try Again!!!. Thank You !!!'),(983,'ord_succ','Order Placed Successfully!!!'),(984,'succ_smg','Are you Sure to Print This Invoice????'),(985,'no_order_run','No Order Running'),(986,'thirdpartycustomer_list','Third-Party Customers'),(987,'3rd_customer_list','Third-Party Customers List'),(988,'3rdcompany_name','Company Name'),(989,'add_3rdparty_comapny','Add New Company'),(990,'update_3rdparty','Update Company'),(991,'commision','Commission'),(992,'list_of_card_terminal','Card Terminal List'),(993,'add_new_terminal','Add New Terminal'),(994,'update_terminal','Update Terminal'),(995,'card_terminal_name','Card Terminal Name'),(996,'list_of_bank','Bank List'),(997,'add_bank','Add New Bank'),(998,'update_bank','Update Bank'),(999,'bank_name','Bank Name'),(1000,'sell_report_filter','Sale Report Filtering'),(1001,'sms_setting','SMS Setting'),(1002,'sms_configuration','SMS Configuration'),(1003,'sms_temp','SMS Template'),(1004,'candidate_name','Candidate Name'),(1005,'assign1_role','Assign Role'),(1006,'customer_list','Customer List'),(1007,'customer_name','Customer Name'),(1008,'update_ord','Update Order'),(1009,'final_report','Final Report'),(1010,'ehrm','HRM'),(1011,'add_expense_item','Add Expense Item'),(1012,'manage_expense_item','Manage Expense Item'),(1013,'add_expense','Add Expense'),(1014,'manage_expense','Manage Expense'),(1015,'expense_statement','Expense Statement'),(1016,'expense_type','Expense Type'),(1017,'expense_item_name','Expense Item Name'),(1018,'expense','Expense'),(1020,'signature_pic','Signature Picture'),(1021,'branch1','Branch'),(1022,'ac_no','A/C Number'),(1023,'ac_name','A/C Name'),(1024,'bank_transaction','Bank Transaction'),(1025,'bank','Bank'),(1027,'bank_ledger','Bank Ledger'),(1028,'note_name','Note Name'),(1029,'balance','Balance'),(1030,'previous_balance','Previous Credit Balance'),(1031,'manage_supplier_ledger','Manage supplier Ledger'),(1032,'supplier_ledger','Supplier Ledger'),(1033,'print','Print'),(1034,'select_supplier','Select Supplier'),(1035,'deposite_id','Deposit ID'),(1036,'print_date','Print Date'),(1037,'manage_bank','Manage Bank'),(1038,'add_new_bank','Add New Bank'),(1039,'bank_list','Bank List'),(1040,'bank_edit','Bank Edit'),(1041,'debit_plus','Debit (+)'),(1042,'credit_minus','Credit (-)'),(1043,'withdraw_deposite_id','Withdraw / Deposit ID'),(1044,'cash_adjustment','Cash Adjustment'),(1045,'adjustment_type','Adjustment Type'),(1046,'supplier_payment','Supplier Payment'),(1047,'prepared_by','Prepared By'),(1048,'authorized_signature','Authorized Signature'),(1049,'chairman','Chairman'),(1050,'kitchen_dashboard','Kitchen Dashboard'),(1051,'counter_dashboard','Counter Dashboard'),(1052,'nw_order','New Order'),(1053,'ongoingorder','On Going Order'),(1054,'tdayorder','Today Order'),(1055,'onlineord','Online Order '),(1056,'table','Table'),(1057,'waiter','Waiter'),(1058,'del_company','Delivery Company'),(1059,'cookedtime','Cooking Time'),(1060,'ord_num','Order Number'),(1061,'cmplt','Complete'),(1062,'sl_payment','Select Your Payment Method'),(1063,'paymd','Payment Method'),(1064,'crd_terminal','Card Terminal'),(1065,'sl_bank','Select Bank'),(1066,'lstdigit','Last 4 Digit'),(1067,'cuspayment','Customer Payment'),(1068,'cng_amount','Changes Amount'),(1069,'pay_print','Pay Now & Print Invoice'),(1070,'payn','Pay Now'),(1071,'ordid','Order ID'),(1072,'can_reason','Cancel Reason'),(1073,'can_ord','Cancel Order'),(1074,'close','Close'),(1075,'add_customer','Add Customer'),(1076,'fav_addesrr','Favorite Address'),(1077,'tabltno','Table No'),(1078,'ordate','Order Date'),(1079,'payment_status','Payment Status'),(1080,'ordtcoun','Order Time Countdown Board'),(1081,'remtime','Remaining Time'),(1082,'ordtime','Order Time'),(1083,'ord','Order'),(1084,'tok','Token'),(1085,'view_ord','View Order'),(1086,'fdready','Food Ready'),(1087,'fdnready','Food Not Ready'),(1088,'foodrfs','Food is Ready for Served!!'),(1089,'foodnrfs','Food Not Ready for Served'),(1090,'ordready','Order Ready'),(1091,'sele_by_date','Sale By Date'),(1092,'withdetails','With Details'),(1093,'topeneqv','Total Opening Cash & Cash Equivalent'),(1094,'cashopen','Cashflow from Operating Activities'),(1095,'payact','Payment for Other Operating Activities'),(1096,'cash_gand_lie','Cash generated from Operating Activities before Changing in Operating Assets & Liabilities'),(1097,'casfactive','Cashflow from Non Operating Activities'),(1098,'cashnonlia','Cash generated from Non Operating Activities before Changing in Operating Assets & Liabilities'),(1099,'incdre','Increase/Decrease in Operating Assets & Liabilities'),(1100,'Tincdre','Total Increase/Decrease'),(1101,'netopenactv','Net Cash From Operating/Non Operating Activities'),(1102,'cfact','Cash Flow from Investing Activities'),(1103,'ncuia','Net Cash Used Investing Activities'),(1104,'cfffa','Cash Flow from Financing Activities'),(1105,'netcufa','Net  Cash Used Financing Activities'),(1106,'ncio','Net Cash Inflow/Outflow'),(1107,'pflos','Profit Loss'),(1108,'clcEq','Closing Cash & Cash Equivalent:'),(1109,'TcccE','Total Closing Cash & Cash Equivalent'),(1110,'pp_by','Prepared By'),(1111,'act','Accounts'),(1112,'ausig','Authorized Signature'),(1113,'particls','Particulars'),(1114,'back','Back'),(1115,'bk_vouchar','Bank Book Voucher'),(1116,'errorajdata','Error get data from ajax'),(1117,'reach_limit','You have reached the limit of adding'),(1118,'inpt','inputs'),(1119,'cantdel','There only one row you can\'t delete.'),(1120,'slsuplier','Select Supplier'),(1121,'ptype','Payment Type'),(1122,'casp','Cash Payment'),(1123,'bnkp','Bank Payment'),(1124,'slbank','Select Bank'),(1125,'cscrv','Cash Credit Voucher'),(1126,'ac_code','Account Code'),(1127,'ac_head','Account Head'),(1128,'iword','In word'),(1129,'ac_office','Accounts Officer'),(1130,'latestv','Latest version'),(1131,'after19','Auto Update Feature working On  after 1.9'),(1132,'crver','Current version'),(1133,'notesupdate','note: strongly recommended to backup your <b>SOURCE FILE</b> and <b>DATABASE</b> before update.'),(1134,'noupdates','No Update available'),(1135,'lic_pur_key','License/Purchase key'),(1136,'lifeord','Lifetime Orders'),(1137,'tdaysell','Today Sale'),(1138,'tcustomer','Total Customer'),(1139,'tdeliv','Total Delivered'),(1140,'treserv','Total Reservation'),(1141,'latestord','Latest Order'),(1142,'latest_reser','Latest Reservation'),(1143,'ord_number','Order No.'),(1144,'latestolorder','Latest Online Order'),(1145,'monsalamntorder','Monthly Sales Amount and Order'),(1146,'onlineofline','Online Vs Offline Order & Sales'),(1147,'pending_ord','Pending Order'),(1148,'onlinesamnt','Online Sale Amount'),(1149,'onlineordnum','Online Order Number'),(1150,'offsalamnt','Offline Sale Amount'),(1151,'offlordnum','Offline Order Number'),(1152,'saleamnt','Sale Amount'),(1153,'ordnumb','Order Number'),(1154,'store_name','Store Name'),(1155,'opent','Available On'),(1156,'closeTime','Closing Time'),(1157,'sldistype','Select Discount Type'),(1158,'distype','Discount Type'),(1159,'percent','Percent'),(1160,'sl_se_ch_ty','Select Service Charge Type'),(1161,'vatset','VAT Setting(%)'),(1162,'mindeltime','Min. Delivery Time'),(1163,'dateformat','Date Format'),(1164,'sedateformat','Seletet Date Format'),(1165,'add_menu_item','Add Menu Item'),(1166,'menu_title','Menu Title'),(1167,'can_create','Can Create'),(1168,'can_read','Can Read'),(1169,'can_edit','Can Edit'),(1170,'can_delete','Can Delete'),(1171,'smsrankgateway','To get <b>50</b> free SMS from smsrank.com click'),(1172,'ranktext',' and register in registration section click Already Envato user and put your envato purchase key and product id  after registration put your username and password into the password and user name field this form.'),(1173,'managementsection','This Section is Use Only for Store Management.'),(1174,'width','Width'),(1175,'protocal','Protocol'),(1176,'mailpath','Mail Path'),(1177,'Mail_type','Mail Type'),(1178,'smtp_host','SMTP Host'),(1179,'smtp_post','SMTP Port'),(1180,'sender_email','Sender Email'),(1181,'smtp_password','SMTP Password'),(1183,'powered_by','Powered By Text'),(1184,'item_information','Item Information'),(1185,'size','Size'),(1186,'qty','Quantity'),(1187,'addons_name','Add-ons Name '),(1188,'addons_qty','Add-ons Qty'),(1190,'item','Item'),(1191,'unit_price','Unit Price'),(1192,'total_price','Total Price'),(1193,'order_status','Order Status'),(1194,'served','Served'),(1195,'cancel_reason','Cancel Reason'),(1196,'customer_order','Customer Notes'),(1197,'customerpicktime','Customer Pick-up Date and time'),(1199,'service_chrg','Service Charge'),(1200,'customer_paid_amount','Customer Paid Amount'),(1201,'change_due','Change Due'),(1202,'total_due','Total Due'),(1203,'powerbybdtask','Powered  By: BDTASK, www.bdtask.com'),(1204,'recept','Receipt  No'),(1205,'orderno','Order No.'),(1206,'ref_page','Refresh Page'),(1207,'orderid','Order ID'),(1208,'all','All'),(1209,'vat_tax1','Vat/Tax'),(1210,'ord_uodate_success','Order Update Successfully!!!'),(1211,'do_print_token','Do you Want to Print Token No.???'),(1212,'req_failed','Request Failed, Please check your code and try again!'),(1213,'ord_places','Order Placed Successfully'),(1214,'do_print_in','Do you Want to Print Invoice???'),(1215,'ord_complte','Order Completed'),(1216,'ord_com_sucs','Order Completed Successfully'),(1217,'token_no','Token NO'),(1218,'qr-order','QR Order'),(1219,'cuschange','Customer Change'),(1220,'order_successfully_placed','Order Has Been Placed Successfully!'),(1221,'kitchen_setting','kitchen Setting'),(1222,'kitchen_name','Kitchen Name'),(1223,'kitchen_user_assign','Assign Kitchen User'),(1224,'kitchen_list','Kitchen List'),(1225,'add_kitchen','Add Kitchen'),(1226,'kitchen_assign','Kitchen Assign'),(1227,'kitchen_edit','Kitchen Edit'),(1228,'please_try_again_userassign','This user is already assign in this kitchen'),(1229,'select_kitchen','Select Kitchen'),(1230,'memberid','Member ID'),(1231,'member_name','Member Name'),(1232,'add_member','Add New Member'),(1233,'update_member','Update Member'),(1234,'member_list','Member List'),(1236,'meminfo','Member Manage'),(1237,'blocked','Blocked'),(1238,'memberid_exist','Member ID Already Exists. Please Try Another.'),(1239,'add_new_payment_type','Add New Payment Method'),(1240,'sell_report_items','Items Sales Report'),(1241,'sell_report_waiters','Waiters Sales Report'),(1242,'sell_report_delvirytype','Delivery Type Sales Report'),(1243,'sell_report_casher','Sale Report Cashier'),(1244,'ready_all_ietm','All Item Ready'),(1245,'unpaid_sell','Unpaid Sale'),(1246,'kitchen_sell','Kitchen Sales Report'),(1247,'order_total','Total Order '),(1248,'scharge_report','Service Charge Report '),(1249,'seo_setting','SEO Setting'),(1250,'seo_title','Title'),(1251,'seo_keyword','Keyword'),(1252,'seo_description','Description'),(1257,'buy_now','Buy Now'),(1264,'purchase_key','Purchase Key'),(1271,'kitchen_status','Kitchen Status'),(1278,'habittrack','Customer Habit List'),(1279,'review_rating','Review & Rating'),(1280,'pos_setting','POS Setting'),(1286,'month','Month'),(1287,'sl_option','Select Option'),(1288,'sl_product','Search Product'),(1289,'quickorder','Quick Order'),(1290,'placeorder','Place Order'),(1291,'type_slorder','Type and Select Order'),(1292,'mergeord','Merge Order'),(1293,'Processingod','Processing...'),(1294,'sLengthMenu','Display _MENU_ records per page'),(1295,'sInfo','Showing _START_ to _END_ of _TOTAL_ entries'),(1296,'sInfoEmpty','Showing 0 to 0 of 0 entries'),(1297,'sInfoFiltered','(Filtered from _MAX_ Total Records)'),(1298,'sLoadingRecords','Loading...'),(1299,'sZeroRecords','Nothing found - sorry'),(1300,'sEmptyTable','No Data Available in Table'),(1301,'sFirst','First'),(1302,'sLast','Last'),(1303,'sPrevious','Previous'),(1304,'sNext','Next'),(1305,'sSortAscending','Activate to sort column ascending'),(1306,'sSortDescending','Activate to Sort Column Descending'),(1307,'_sign','Show %d Rows'),(1308,'_0sign','No Row Selected'),(1309,'_1sign','1 Line Selected'),(1310,'copy','Copy'),(1312,'excel','Excel'),(1313,'pdf','Pdf'),(1314,'colvis','Column Visibility'),(1316,'no_orderfound','No Order Found!!!'),(1317,'prepared','Prepared'),(1318,'accept','Accept'),(1319,'reject','Reject'),(1320,'ready','Ready'),(1321,'processing','Processing'),(1322,'kitnotacpt','Kitchen Not Accept'),(1425,'person','Person'),(1426,'before_time','Running Time'),(1427,'select_this_table','Select This Table'),(1428,'seat','Seat'),(1429,'seat_time','Time'),(1430,'+','Add'),(1431,'clear','Clear'),(1432,'no_customer','No Customer'),(1433,'table_map','Table Map'),(1434,'add','Add'),(1435,'itemsincart','Item(s) in Cart'),(1436,'view_cart','View Cart'),(1437,'morderlist','My Order List'),(1438,'edit','Edit'),(1439,'foodde','Food Details'),(1440,'cartlist','Cart List'),(1441,'subtotal','Subtotal'),(1442,'ordnote','Order Notes'),(1443,'upsummery','Update Summery'),(1444,'upsumlist','Update Summery List'),(1445,'mkpayment','Make Payment'),(1446,'foodnote','Food Note'),(1447,'addnotesi','Add Note'),(1448,'thirdparty_orderid','Third-party Order ID'),(1456,'themes','Themes'),(1457,'menu_type','Menu Type'),(1458,'add_menu_type','Add Menu Type'),(1459,'menutype_edit','Menu Type Edit'),(1460,'menu_type_name','Menu Type'),(1461,'storetime','Manage Store Time'),(1462,'day_name','Day'),(1463,'saturday','Saturday'),(1464,'sunday','Sunday'),(1465,'monday','Monday'),(1466,'tuesday','Tuesday'),(1467,'wednesday','Wednesday'),(1468,'thursday','Thursday'),(1469,'friday','Friday'),(1470,'footer_logo','Footer Logo'),(1471,'contact_us','Contact Us'),(1472,'opening_time','Available On'),(1473,'ourstore','Our Store'),(1474,'call_reservation','Call for Reservations'),(1475,'item_available','Items Available'),(1479,'membership_card','Bar Code'),(1480,'barcode_start','From Barcode'),(1481,'barcode_end','To Barcode'),(1494,'commission','Commission'),(1495,'sale_by_table','Sale By Table'),(1496,'stock_limit','Re-Stock Level'),(1497,'ingredients','Ingredients'),(1498,'stock_out_ingredients','Stock Out Ingredients'),(1499,'office_addres1','Office Address'),(1500,'call_us','Call Us'),(1501,'email_us','Email Us'),(1502,'upload_theme','Upload Theme'),(1503,'discount_type','Discount Type'),(1504,'confirm_password','Confirm Password'),(1559,'wastemangment','Waste Management'),(1590,'add_group_item','Add Group Item'),(1591,'update_group_item','Update Group Item'),(1592,'production_setting','Production Setting'),(1593,'select_auto','Select auto Production'),(1594,'split','Split'),(1595,'tinvat','TIN OR VAT NUM.'),(1596,'bill','Bill'),(1597,'checkin','Check In'),(1598,'checkout','Check Out'),(1599,'totalpayment','Total payment'),(1600,'thanssuport','Thank You for Your Support'),(1601,'thanks_you','Thank you very much'),(1602,'opening_balance','Opening Balance'),(1603,'transaction_date','Date'),(1604,'voucher_type','Voucher Type'),(1605,'particulars','Head Name'),(1606,'total_empolyee','Total Employee'),(1607,'apply_day','Days'),(1608,'loan_no','Loan No.'),(1609,'add_floor','Add Floor'),(1610,'floor_name','Floor Name'),(1611,'edit_floor','Edit Floor'),(1612,'floor_list','Floor List'),(1613,'floor_select','Floor Select'),(1614,'add_to_cart_more','Add Multiple Variant'),(1615,'kitchen_printers','Kitchen printer Setting'),(1616,'printer_list','Printer List'),(1617,'add_printer','Add Printer'),(1618,'ip_port','Your Online URL'),(1625,'counter_list','Counter List'),(1626,'add_counter','Add Counter'),(1627,'edit_counter','Edit Counter'),(1628,'counter_no','Counter Number'),(1629,'add_opening_balance','Add Opening Balance'),(1630,'add_closing_balance','Add Closing Balance'),(1632,'sell_report_cashregister','Cash Register Report'),(1633,'closing_balance','Closing Balance'),(1634,'factory_reset','Factory Reset'),(1635,'fresettext','Note: Strongly recommended to backup your SOURCE file and DATABASE before resetting because all transactional data will be cleared after running the factory reset.'),(1636,'bill_by','Bill By'),(1640,'type_table','Type and Select Table'),(1648,'sound_setting','Sound Setting'),(1649,'is_sound','Is Sound Enable'),(1650,'upload_notify','Upload Notification Sound'),(1651,'upload_order','Upload order Add Sound'),(1655,'room_list','Room List'),(1656,'add_room','Add Room'),(1657,'room_no','Room No'),(1658,'room_qr','All Room QR'),(1659,'restaurant_closed','Restaurant is Closed!!'),(1660,'closed_msg','You order Only when restaurant is open. Our opening and closing Time is:'),(1661,'privactp','Privacy Policy'),(1662,'terms_condition','Terms & conditions'),(1663,'refundp','Refund Policies'),(1664,'reservation_on_off','Reservation On Off'),(1665,'unavailable_day','Unavailable Day'),(1666,'unavaildate','Unavailable Date'),(1667,'add_unavailablity','Add Unavailability'),(1668,'edit_unavailablity','Edit Unavailability'),(1669,'unavailable_time','Unavailable Time'),(1670,'max_reserveperson','Max Reserve Person'),(1671,'reservasetting','Reservation Setting'),(1672,'webon','Website ON'),(1673,'weboff','Website Off'),(1674,'webdisable','Web site ON/Off'),(1675,'placr_setting','Place order Setting'),(1676,'quick_ord','Quick Order Setting'),(1677,'shippingtime','Shipping Date & Time'),(1678,'search_food_item','Search Food Item'),(1679,'search_category','Search Category'),(1680,'check_availablity','Check Availability'),(1681,'subscribe_paragraph','Subscribe to Receive Our Weekly Promotion'),(1682,'shipping_method','Shipping Method'),(1683,'please_select_shipping_method','Please Select Shipping Method'),(1684,'autoupdate','Auto Update'),(1685,'coa_head','COA Head'),(1686,'apps_addons','Apps Add-ons'),(1687,'download_apps_playstore','Please Download Apps on Playstore'),(1688,'kitchen_app','Kitchen App'),(1689,'waiter_app','Waiter App'),(1690,'customer_app','Customer App'),(1691,'if_you_need_the_above_all_apps','If you need the above all apps, please feel free to contact us.'),(1692,'do_you_want_proceed','Do You Want to Proceed?'),(1693,'is_offer','Offer'),(1694,'is_special','Special'),(1695,'is_custome_quantity','Custom Quantity'),(1696,'kitchenitemsell','Kitchen Sell'),(1697,'due_marge','Due Merge'),(1698,'book_table','Book Table'),(1699,'reserve_table','Reserve Table'),(1700,'see_more','See More'),(1701,'food_name','Food Name'),(1702,'category','Category'),(1703,'search','Search'),(1704,'read_more','Read more'),(1705,'item_has_been_successfully_added','Item has been successfully added'),(1706,'add_to_cart','add to cart'),(1707,'view_full_menu','View Full Menu'),(1709,'subscribe_to_newsletter','Subscribe to Newsletter'),(1710,'subscribe','subscribe'),(1711,'get_directions','Get Directions'),(1712,'teams_of_use','Teams of use'),(1713,'privacy_policy','Privacy Policy'),(1714,'contact','Contact'),(1715,'please_enter_your_email','Please Enter Your email !!'),(1716,'please_enter_valid_email','Please enter a valid Email'),(1717,'thanks_for_subscription','Thanks for Subscription'),(1718,'note_added','Note Added'),(1719,'posting_failed','Posting failed'),(1720,'our_service_is_closed_on_this_date_and_time','Our service is Closed on this date and time !!!'),(1721,'reservation_time_closed_try_later','Reservation Time is closed!! Please try later.'),(1722,'select_date','Please select date'),(1723,'select_time','Please select Time'),(1724,'enter_number_of_people','Please enter the number of people'),(1725,'select_after_hour_current_time','Please select after 1 hour to Current time'),(1726,'no_free_seat_to_the_reservation','Currently, there is no free seat to the reservation'),(1727,'search_topics_or_keywords','Search topics or keywords'),(1728,'no_data_found','No Data Found'),(1729,'please_wait','Please Wait'),(1730,'reservation_contact','Contact No.'),(1731,'reservation_time','Expected Time'),(1732,'reservation_date','Expected Date'),(1733,'reservation_person','Total Person'),(1734,'deal_of_the_day','Deal of the day'),(1735,'cart','Cart'),(1736,'unavailable','Unavailable'),(1737,'write_comments','Write Your Comments'),(1738,'get_in_touch','Get In Touch'),(1739,'forgot_password','Forgot Password'),(1740,'shopping_details_information_msg','If you have shopped with us before, please enter your details in the boxes below.'),(1741,'remember_me','Remember Me'),(1742,'or','OR'),(1743,'register','Register'),(1744,'enter_your_phone_or_email','Please enter your Phone or Email.'),(1745,'password_not_empty','Password Not Empty.'),(1746,'failed_login_msg','Failed Login: Check your Email and password!'),(1747,'email_not_registered_msg','Failed: Email has not been registered yet.!!!'),(1748,'have_been_sent_email','Success: We have been sent an email to this'),(1749,'check_your_new_password','Email Address. Please check your New Password..!!!'),(1750,'profile_picture','Profile Picture'),(1751,'my_profile','My Profile'),(1752,'my_reservation','My Reservation'),(1753,'profile_update','Profile Update'),(1754,'name','Name'),(1755,'returning_customer','Returning customer?'),(1756,'click_login','Click here to login'),(1757,'checkout_msg','If you have shopped with us before, please enter your details in the boxes below. If you are a new customer, please proceed to the Billing & Shipping section.'),(1758,'username_or_email','Username or Email'),(1759,'billing_address','Billing Address'),(1760,'select_country','Select Country'),(1761,'select_state','Select State'),(1762,'town_city','Town / City'),(1763,'select_city','Select City'),(1764,'street_address','Street Address'),(1765,'postcode_zip','Postcode / ZIP'),(1766,'create_account','Create an Account?'),(1767,'create_account_password','Create account password'),(1768,'shipping_different_address','Ship to a Different Address?'),(1769,'your_order','Your Order'),(1770,'product','Product'),(1771,'total_vat','Total VAT'),(1772,'coupon_discount','Coupon Discount'),(1773,'service','Service'),(1774,'tag','Tag'),(1775,'review','Review'),(1776,'average_user_rating','Average User Rating'),(1777,'rating_breakdown','Rating Breakdown'),(1778,'complete_success','100% Complete (success)'),(1779,'80_complete_primary','80% Complete (primary)'),(1780,'60_complete_info','60% Complete (info)'),(1781,'40_complete_warning','40% Complete (warning)'),(1782,'20_complete_danger','20% Complete (danger)'),(1783,'rate_it','Rate It'),(1784,'french_chicken_burger_tomato_sauce','French Chicken Burger With Hot tomato Sauce'),(1785,'review_submit','Review Submit'),(1786,'related_items','Related Items'),(1787,'pickup','Pickup'),(1788,'dine_in','Dine-in'),(1789,'enter_coupon_code','Enter coupon code'),(1790,'00_15_min','00:15 MIN'),(1791,'go_to_checkout','Go to Checkout'),(1798,'timezone','Time Zome'),(1799,'discountrate','Discount Rate'),(1800,'vat','Vat'),(1801,'loan_issue_id','Loan Issue ID'),(1802,'repayment','Re-payment'),(1803,'loan_report_details','Loan Details'),(1804,'balance_sheet','Balance Sheet'),(1813,'purdate','Purchase Date'),(1814,'expdate','Expiry Date'),(1815,'parent_cat','Parent Category'),(1816,'set_productioncost','Set Production Cost Per Unit'),(1817,'set_productionunit','Set Production Unit'),(1818,'production_set','Production Set'),(1819,'production_set_for','Production Set For'),(1820,'serving_unit','Serving Unit'),(1821,'kit_dashoard_setting','Kitchen Dashboard Setting'),(1822,'kot_reftime','Kitchen Refresh time In Second'),(1823,'bulk_upload','Bulk Upload'),(1824,'upload_food_csv','Upload Food Item csv'),(2202,'appcartempty','Your Cart is empty!!!.Please add some food.'),(2203,'apporderempty','You Order List is empty!!! Please Place A Order First!!!'),(2244,'topselleingitem','Top selling Item'),(2252,'logininfo','Login Info'),(2253,'newuser','New User'),(2254,'orloginwith','or login with'),(2255,'registerinfo','Registration Info'),(2256,'register_txt','If you have shopped with us before, please enter your details in the boxes below.'),(2257,'customerinfo','Customer Info'),(2258,'delvtype','Delivery Type'),(2259,'delv_date','Delivery Date'),(2260,'delvtime','Delivery Time'),(2261,'yourcart','Your Cart'),(2262,'items','items'),(2263,'delivarycrg','Delivery charge'),(2264,'offercodegift','Offer code / gift card code'),(2265,'apply','Apply'),(2266,'proceedtocart','Proceed to Checkout'),(2267,'delv_address','Delivary address List'),(2268,'create_address','Create Address'),(2269,'seeallmenu','See all menu'),(2270,'sendymsg','Send Your Message'),(2271,'send_us','Send Us Message'),(2297,'number_of_tax','Number of tax'),(2300,'tax_name','Tax Name'),(2302,'closing_note','Closing Note'),(2304,'close_resister_and_print_summery','Close Resister and print Summery'),(2305,'previous','Previous'),(2306,'unpaid','Unpaid'),(2307,'check_item','Check Item'),(2308,'check_item_message','Please check at least one item!!'),(2309,'yes','Yes'),(2311,'time_over','Time Over'),(2312,'add_phrase','Add Phrase'),(2313,'crd_terminal_message','Please Select Card Terminal!!!'),(2314,'language_list','Language List'),(2315,'commission_setting','Commission Setting'),(2316,'pending','Pending'),(2317,'current_register','Current Register'),(2318,'due','Due'),(2319,'due_invoice','Due Invoice'),(2320,'payable_amount','Payable Amount'),(2321,'isinclusivetax','Is Tax Inclusive?'),(2322,'showhidevattin','Show/Hide(VAT/TIN)'),(2323,'custfldname','Custom Field Name'),(2324,'custfldtype','Custom Field Type'),(2325,'customvalue','Custom Value'),(2326,'cash_in_hand','Cash In Hand'),(2327,'booked','Booked'),(2328,'realease','Release\r\n'),(2329,'liveortest','Live Or Test'),(2330,'live','Live Mode'),(2331,'test_mode','Test Mode'),(2340,'facebooklogin','Facebook Login'),(2341,'add_facebook_app','Facebook Setting'),(2342,'api_key','Api Key'),(2343,'secret_key','Secret Key'),(2344,'facebook_api','Facebook Api'),(2345,'facebook_login','Facebook Login');
/*!40000 ALTER TABLE `language` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `leave_apply`
--

LOCK TABLES `leave_apply` WRITE;
/*!40000 ALTER TABLE `leave_apply` DISABLE KEYS */;
/*!40000 ALTER TABLE `leave_apply` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `leave_type`
--

LOCK TABLES `leave_type` WRITE;
/*!40000 ALTER TABLE `leave_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `leave_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `loan_installment`
--

LOCK TABLES `loan_installment` WRITE;
/*!40000 ALTER TABLE `loan_installment` DISABLE KEYS */;
/*!40000 ALTER TABLE `loan_installment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `marital_info`
--

LOCK TABLES `marital_info` WRITE;
/*!40000 ALTER TABLE `marital_info` DISABLE KEYS */;
INSERT INTO `marital_info` VALUES (1,'Single'),(2,'Married'),(3,'Divorced'),(4,'Widowed'),(5,'Other');
/*!40000 ALTER TABLE `marital_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `membership`
--

LOCK TABLES `membership` WRITE;
/*!40000 ALTER TABLE `membership` DISABLE KEYS */;
INSERT INTO `membership` VALUES (1,'Normal User',0,'',2,'2018-11-07',2,'2018-11-07',0,0),(2,'Premium Member',0,'',1,'2020-11-04',0,'0000-00-00',250,999),(3,'VIP',0,'',1,'2020-11-04',0,'0000-00-00',1001,5000000);
/*!40000 ALTER TABLE `membership` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `menu_add_on`
--

LOCK TABLES `menu_add_on` WRITE;
/*!40000 ALTER TABLE `menu_add_on` DISABLE KEYS */;
/*!40000 ALTER TABLE `menu_add_on` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `message`
--

LOCK TABLES `message` WRITE;
/*!40000 ALTER TABLE `message` DISABLE KEYS */;
/*!40000 ALTER TABLE `message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `module`
--

LOCK TABLES `module` WRITE;
/*!40000 ALTER TABLE `module` DISABLE KEYS */;
INSERT INTO `module` VALUES (1,'Facebook login customer','Facebook login customer','application/modules/facebooklogin/assets/images/thumbnail.jpg','facebooklogin',1);
/*!40000 ALTER TABLE `module` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `module_permission`
--

LOCK TABLES `module_permission` WRITE;
/*!40000 ALTER TABLE `module_permission` DISABLE KEYS */;
/*!40000 ALTER TABLE `module_permission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `module_purchase_key`
--

LOCK TABLES `module_purchase_key` WRITE;
/*!40000 ALTER TABLE `module_purchase_key` DISABLE KEYS */;
/*!40000 ALTER TABLE `module_purchase_key` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `multipay_bill`
--

LOCK TABLES `multipay_bill` WRITE;
/*!40000 ALTER TABLE `multipay_bill` DISABLE KEYS */;
INSERT INTO `multipay_bill` VALUES (1,1,NULL,4,79.8),(2,2,NULL,4,119.7),(3,4,NULL,4,39.9),(4,3,NULL,4,119.7);
/*!40000 ALTER TABLE `multipay_bill` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `order_menu`
--

LOCK TABLES `order_menu` WRITE;
/*!40000 ALTER TABLE `order_menu` DISABLE KEYS */;
INSERT INTO `order_menu` VALUES (1,1,1,35.000,0,'',2,'','',1,NULL,11,NULL,0,1,1,NULL),(2,2,1,35.000,0,'',3,'','',1,NULL,11,NULL,0,1,1,NULL),(3,3,1,35.000,0,'',3,'','',1,NULL,11,NULL,0,1,1,NULL),(4,4,1,35.000,0,'',1,'','',1,NULL,11,NULL,0,1,1,NULL);
/*!40000 ALTER TABLE `order_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `pay_frequency`
--

LOCK TABLES `pay_frequency` WRITE;
/*!40000 ALTER TABLE `pay_frequency` DISABLE KEYS */;
INSERT INTO `pay_frequency` VALUES (1,'Weekly'),(2,'Biweekly'),(3,'Annual'),(4,'Monthly');
/*!40000 ALTER TABLE `pay_frequency` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `payment_method`
--

LOCK TABLES `payment_method` WRITE;
/*!40000 ALTER TABLE `payment_method` DISABLE KEYS */;
INSERT INTO `payment_method` VALUES (1,'Card Payment',1,''),(2,'Two Checkout',1,''),(3,'Paypal',1,''),(4,'Cash Payment',1,''),(5,'SSLCommerz',1,''),(6,'SIPS Office',1,''),(7,'RMA PAYMENT GATEWAY',1,''),(8,'Square Payments',1,''),(9,'Stripe Payment',1,''),(10,'Paystack Payments',1,''),(11,'Paytm Payments',1,''),(12,'Orange Money payment',1,''),(13,'iyzico',1,'');
/*!40000 ALTER TABLE `payment_method` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `paymentsetup`
--

LOCK TABLES `paymentsetup` WRITE;
/*!40000 ALTER TABLE `paymentsetup` DISABLE KEYS */;
INSERT INTO `paymentsetup` VALUES (1,5,'bdtas5e772deb8ff87','bdtas5e772deb8ff87@ssl','ainalcse@gmail.com','BDT',0,1,NULL),(2,3,'','','tareq7500personal2@gmail.com','USD',0,1,NULL),(3,2,'901400787','','ainalcse@gmail.com','USD',0,1,NULL),(4,6,'002020000000001','002020000000001_KEY1','1','',0,1,NULL),(5,7,'BE10000072','BE10000072','karmadorji@gmail.com','BTN',0,1,NULL),(6,8,'sandbox-sq0idb-ShIOgPUIHSXxsjCPG4oh_A','EAAAEE3gxSvOVaHIq-5A5P_yFkUbkAfUM2-JiQju2FTxQ4n7epxmvKpaOhECxHcN','5SNY8GNKAZM00','AUD',0,1,NULL),(7,9,'sk_test_ol4WUcbGsqxNJItpeOi1ecDT00k5mDyC2G','pk_test_TrVFpmZBkgasCE6WTPkZgMPr00UzVVOqgp','ainalcse@gmail.com','USD',0,1,NULL),(8,10,'sk_test_71353c2613675acb967ea532f4c4c8105ea175b8','pk_test_328da55755b88b1aaed96c5cda215b2fd887edb9','ainalcse@gmail.com','NGN',0,1,NULL),(9,11,NULL,'','','',0,0,NULL),(10,12,'7BUkXCbuHDcx1ZyQqmcKVtsLnFxF0r3f','vmUIfeoHXpZSKc20Wt50d6hqeIY5FcWtFR6prg0Ubak8IvmmZEFDDpQr5ZMEdnoS','','XAF',0,1,NULL),(12,13,'sandbox-5rd4uUC2yAz7LWDaalyJAOEsH2rxrqVB','sandbox-FsKRCZpk0BpdUss3wVsNLhvs5Ty5PSpi','','BDT',0,1,NULL);
/*!40000 ALTER TABLE `paymentsetup` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `payroll_commission_setting`
--

LOCK TABLES `payroll_commission_setting` WRITE;
/*!40000 ALTER TABLE `payroll_commission_setting` DISABLE KEYS */;
/*!40000 ALTER TABLE `payroll_commission_setting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `payroll_holiday`
--

LOCK TABLES `payroll_holiday` WRITE;
/*!40000 ALTER TABLE `payroll_holiday` DISABLE KEYS */;
/*!40000 ALTER TABLE `payroll_holiday` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `payroll_tax_setup`
--

LOCK TABLES `payroll_tax_setup` WRITE;
/*!40000 ALTER TABLE `payroll_tax_setup` DISABLE KEYS */;
/*!40000 ALTER TABLE `payroll_tax_setup` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `position`
--

LOCK TABLES `position` WRITE;
/*!40000 ALTER TABLE `position` DISABLE KEYS */;
INSERT INTO `position` VALUES (1,'chef','Responsible for the pastry shop in a foodservice establishment. Ensures that the products produced in the pastry shop meet the quality standards in conjunction with the executive chef.'),(2,'HRM','Recruits and hires qualified employees, creates in-house job-training programs, and assists employees with their career needs.'),(3,'Kitchen manager','Supervises and coordinates activities concerning all back-of-the-house operations and personnel, including food preparation, kitchen and storeroom areas.'),(4,'Counter server','Responsible for providing quick and efficient service to customers. Greets customers, takes their food and beverage orders, rings orders into register, and prepares and serves hot and cold drinks.'),(6,'Waiter','Most waiters and waitresses, also called servers, work in full-service restaurants. They greet customers, take food orders, bring food and drinks to the tables and take payment and make change.'),(7,'Accounts','Play a key role in every restaurant. '),(8,'Salesman','A salesman is someone who works in sales, with the main function of selling products or services to others either by visiting locations');
/*!40000 ALTER TABLE `position` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `production`
--

LOCK TABLES `production` WRITE;
/*!40000 ALTER TABLE `production` DISABLE KEYS */;
/*!40000 ALTER TABLE `production` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `production_details`
--

LOCK TABLES `production_details` WRITE;
/*!40000 ALTER TABLE `production_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `production_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `purchase_details`
--

LOCK TABLES `purchase_details` WRITE;
/*!40000 ALTER TABLE `purchase_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `purchase_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `purchase_return`
--

LOCK TABLES `purchase_return` WRITE;
/*!40000 ALTER TABLE `purchase_return` DISABLE KEYS */;
/*!40000 ALTER TABLE `purchase_return` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `purchase_return_details`
--

LOCK TABLES `purchase_return_details` WRITE;
/*!40000 ALTER TABLE `purchase_return_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `purchase_return_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `purchaseitem`
--

LOCK TABLES `purchaseitem` WRITE;
/*!40000 ALTER TABLE `purchaseitem` DISABLE KEYS */;
/*!40000 ALTER TABLE `purchaseitem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `rate_type`
--

LOCK TABLES `rate_type` WRITE;
/*!40000 ALTER TABLE `rate_type` DISABLE KEYS */;
INSERT INTO `rate_type` VALUES (1,'Hourly'),(2,'Salary');
/*!40000 ALTER TABLE `rate_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `reservationofday`
--

LOCK TABLES `reservationofday` WRITE;
/*!40000 ALTER TABLE `reservationofday` DISABLE KEYS */;
/*!40000 ALTER TABLE `reservationofday` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `rest_table`
--

LOCK TABLES `rest_table` WRITE;
/*!40000 ALTER TABLE `rest_table` DISABLE KEYS */;
INSERT INTO `rest_table` VALUES (1,'1',2,'assets/img/icons/resttable/1.png',3,1),(2,'2',4,'assets/img/icons/resttable/4.png',1,1),(3,'3',2,'assets/img/icons/resttable/2.png',1,0),(6,'6',3,'assets/img/icons/resttable/3.png',1,0),(7,'7',8,'assets/img/icons/resttable/8.png',1,1),(8,'8',4,'assets/img/icons/resttable/4.png',3,1),(9,'9',3,'assets/img/icons/resttable/3.png',1,0),(10,'VIP',8,'assets/img/icons/resttable/7.png',2,1);
/*!40000 ALTER TABLE `rest_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `role_permission`
--

LOCK TABLES `role_permission` WRITE;
/*!40000 ALTER TABLE `role_permission` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_permission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `salary_setup_header`
--

LOCK TABLES `salary_setup_header` WRITE;
/*!40000 ALTER TABLE `salary_setup_header` DISABLE KEYS */;
/*!40000 ALTER TABLE `salary_setup_header` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `salary_sheet_generate`
--

LOCK TABLES `salary_sheet_generate` WRITE;
/*!40000 ALTER TABLE `salary_sheet_generate` DISABLE KEYS */;
/*!40000 ALTER TABLE `salary_sheet_generate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `salary_type`
--

LOCK TABLES `salary_type` WRITE;
/*!40000 ALTER TABLE `salary_type` DISABLE KEYS */;
INSERT INTO `salary_type` VALUES (1,'House Rent','1','',''),(2,'Medical','1','','');
/*!40000 ALTER TABLE `salary_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `sec_menu_item`
--

LOCK TABLES `sec_menu_item` WRITE;
/*!40000 ALTER TABLE `sec_menu_item` DISABLE KEYS */;
INSERT INTO `sec_menu_item` VALUES (1,'manage_category','','itemmanage',0,0,2,'2018-11-05 00:00:00'),(2,'category_list','item_category','itemmanage',0,0,2,'2018-11-05 00:00:00'),(3,'add_category','create','itemmanage',2,0,2,'2018-11-05 00:00:00'),(4,'manage_food','','itemmanage',0,0,2,'2018-11-05 00:00:00'),(5,'food_list','item_food','itemmanage',0,0,2,'2018-11-05 00:00:00'),(6,'add_food','index','itemmanage',5,0,2,'2018-11-05 00:00:00'),(7,'food_varient','foodvarientlist','itemmanage',5,0,2,'2018-11-07 00:00:00'),(8,'add_varient','addvariant','itemmanage',5,0,2,'2018-11-07 00:00:00'),(9,'food_availablity','availablelist','itemmanage',5,0,2,'2018-11-07 00:00:00'),(10,'add_availablity','addavailable','itemmanage',5,0,2,'2018-11-07 00:00:00'),(11,'manage_addons','','itemmanage',0,0,2,'2018-11-05 00:00:00'),(12,'addons_list','menu_addons','itemmanage',0,0,2,'2018-11-05 00:00:00'),(13,'add_adons','create','itemmanage',8,0,2,'2018-11-05 00:00:00'),(14,'manage_unitmeasurement','','units',0,0,2,'2018-11-05 00:00:00'),(15,'unit_list','unitmeasurement','units',0,0,2,'2018-11-05 00:00:00'),(16,'unit_add','create','units',12,0,2,'2018-11-05 00:00:00'),(17,'manage_ingradient','','units',0,0,2,'2018-11-05 00:00:00'),(18,'ingradient_list','ingradient','units',0,0,2,'2018-11-05 00:00:00'),(19,'add_ingredient','create','units',15,0,2,'2018-11-05 00:00:00'),(20,'assign_adons_list','assignaddons','itemmanage',8,0,2,'2018-11-06 00:00:00'),(21,'assign_adons','assignaddonscreate','itemmanage',8,0,2,'2018-11-06 00:00:00'),(28,'membership_management','','setting',0,0,2,'2018-11-12 00:00:00'),(29,'membership_list','index','setting',28,0,2,'2018-11-12 00:00:00'),(30,'membership_add','create','setting',29,0,2,'2018-11-12 00:00:00'),(31,'payment_setting','','setting',0,0,2,'2018-11-12 00:00:00'),(32,'paymentmethod_list','index','setting',31,0,2,'2018-11-12 00:00:00'),(33,'payment_add','create','setting',32,0,2,'2018-11-12 00:00:00'),(34,'shipping_setting','','setting',0,0,2,'2018-11-12 00:00:00'),(35,'shipping_list','index','setting',34,0,2,'2018-11-12 00:00:00'),(36,'shipping_add','create','setting',35,0,2,'2018-11-12 00:00:00'),(37,'supplier_manage','','setting',0,0,2,'2018-11-12 00:00:00'),(38,'supplier_list','index','setting',37,0,2,'2018-11-12 00:00:00'),(39,'supplier_add','create','setting',38,0,2,'2018-11-12 00:00:00'),(40,'purchase_item','index','purchase',0,0,2,'2018-11-12 00:00:00'),(41,'purchase_add','create','purchase',40,0,2,'2018-11-12 00:00:00'),(42,'table_manage','','setting',0,0,2,'2018-11-13 00:00:00'),(43,'add_new_table','create','setting',44,0,2,'2018-11-13 00:00:00'),(44,'table_list','restauranttable','setting',42,0,2,'2018-11-13 00:00:00'),(45,'ordermanage','index','ordermanage',0,0,2,'2018-11-22 00:00:00'),(46,'add_new_order','neworder','ordermanage',45,0,2,'2018-11-22 00:00:00'),(47,'order_list','orderlist','ordermanage',45,0,2,'2018-11-22 00:00:00'),(48,'pending_order','pendingorder','ordermanage',45,0,2,'2018-11-22 00:00:00'),(49,'processing_order','processing','ordermanage',45,0,2,'2018-11-22 00:00:00'),(50,'complete_order','completelist','ordermanage',45,0,2,'2018-11-22 00:00:00'),(51,'cancel_order','cancellist','ordermanage',45,0,2,'2018-11-22 00:00:00'),(52,'pos_invoice','pos_invoice','ordermanage',45,0,2,'2018-11-22 00:00:00'),(53,'c_o_a','treeview','accounts',0,0,2,'2018-12-17 00:00:00'),(54,'debit_voucher','debit_voucher','accounts',0,0,2,'2018-12-17 00:00:00'),(55,'credit_voucher','credit_voucher','accounts',0,0,2,'2018-12-17 00:00:00'),(56,'contra_voucher','contra_voucher','accounts',0,0,2,'2018-12-17 00:00:00'),(57,'journal_voucher','journal_voucher','accounts',0,0,2,'2018-12-17 00:00:00'),(58,'voucher_approval','voucher_approval','accounts',0,0,2,'2018-12-17 00:00:00'),(59,'account_report','','accounts',0,0,2,'2018-12-17 00:00:00'),(60,'voucher_report','coa','accounts',59,0,2,'2018-12-17 00:00:00'),(61,'cash_book','cash_book','accounts',59,0,2,'2018-12-17 00:00:00'),(62,'bank_book','bank_book','accounts',59,0,2,'2018-12-17 00:00:00'),(63,'general_ledger','general_ledger','accounts',59,0,2,'2018-12-17 00:00:00'),(64,'trial_balance','trial_balance','accounts',59,0,2,'2018-12-17 00:00:00'),(65,'profit_loss','profit_loss_report','accounts',59,0,2,'2018-12-17 00:00:00'),(66,'cash_flow','cash_flow_report','accounts',59,0,2,'2018-12-17 00:00:00'),(67,'coa_print','coa_print','accounts',59,0,2,'2018-12-17 00:00:00'),(68,'hrm','','hrm',0,0,2,'2018-12-18 00:00:00'),(69,'attendance','Home','hrm',0,0,2,'2018-12-18 00:00:00'),(70,'atn_form','atnview','hrm',69,0,2,'2018-12-18 00:00:00'),(71,'atn_report','attendance_list','hrm',69,0,2,'2018-12-18 00:00:00'),(72,'award','Award_controller','hrm',0,0,2,'2018-12-18 00:00:00'),(73,'new_award','create_award','hrm',72,0,2,'2018-12-18 00:00:00'),(74,'circularprocess','Candidate','hrm',0,0,2,'2018-12-18 00:00:00'),(75,'add_canbasic_info','caninfo_create','hrm',74,0,2,'2018-12-18 00:00:00'),(76,'can_basicinfo_list','canInfoview','hrm',74,0,2,'2018-12-18 00:00:00'),(77,'candidate_basic_info','Candidate_select','hrm',0,0,2,'2018-12-18 00:00:00'),(78,'candidate_shortlist','shortlist_form','hrm',77,0,2,'2018-12-18 00:00:00'),(79,'candidate_interview','interview_form','hrm',77,0,2,'2018-12-18 00:00:00'),(80,'candidate_selection','selection_form','hrm',77,0,2,'2018-12-18 00:00:00'),(81,'department','Department_controller','hrm',0,0,2,'2018-12-18 00:00:00'),(82,'departmentfrm','create_dept','hrm',81,0,2,'2018-12-18 00:00:00'),(83,'division','Division_controller','hrm',0,0,2,'2018-12-18 00:00:00'),(84,'add_division','division_form','hrm',83,0,2,'2018-12-18 00:00:00'),(85,'ehrm','Employees','hrm',0,0,2,'2018-12-18 00:00:00'),(86,'division_list','position_form','hrm',87,0,2,'2018-12-18 00:00:00'),(87,'designation','create_position','hrm',87,0,2,'2018-12-18 00:00:00'),(88,'add_employee','viewEmhistory','hrm',87,0,2,'2018-12-18 00:00:00'),(89,'manage_employee','manageemployee','hrm',87,0,2,'2018-12-18 00:00:00'),(91,'emp_sal_payment','paymentview','hrm',87,0,2,'2018-12-18 00:00:00'),(92,'leave','leave','hrm',0,0,2,'2018-12-18 00:00:00'),(93,'weekly_holiday','weeklyform','hrm',92,0,2,'2018-12-18 00:00:00'),(94,'holiday','holiday_form','hrm',92,0,2,'2018-12-18 00:00:00'),(95,'others_leave_application','others_leave','hrm',92,0,2,'2018-12-18 00:00:00'),(96,'add_leave_type','leave_type_form','hrm',92,0,2,'2018-12-18 00:00:00'),(97,'leave_application','others_leave','hrm',92,0,2,'2018-12-18 00:00:00'),(98,'loan','loan','hrm',0,0,2,'2018-12-18 00:00:00'),(99,'loan_grand','create_grandloan','hrm',98,0,2,'2018-12-18 00:00:00'),(100,'loan_installment','create_installment','hrm',98,0,2,'2018-12-19 00:00:00'),(101,'manage_installment','installmentView','hrm',98,0,2,'2018-12-19 00:00:00'),(102,'manage_granted_loan','loan_view','hrm',98,0,2,'2018-12-19 00:00:00'),(103,'loan_report','loan_report','hrm',98,0,2,'2018-12-19 00:00:00'),(104,'payroll','Payroll','hrm',0,0,2,'2018-12-19 00:00:00'),(105,'salary_type_setup','create_salary_setup','hrm',104,0,2,'2018-12-19 00:00:00'),(106,'manage_salary_setup','emp_salary_setup_view','hrm',104,0,2,'2018-12-19 00:00:00'),(107,'salary_setup','create_s_setup','hrm',104,0,2,'2018-12-19 00:00:00'),(108,'manage_salary_type','salary_setup_view','hrm',104,0,2,'2018-12-19 00:00:00'),(109,'salary_generate','create_salary_generate','hrm',104,0,2,'2018-12-19 00:00:00'),(110,'manage_salary_generate','salary_generate_view','hrm',104,0,2,'2018-12-19 00:00:00'),(111,'purchase_return','return_form','purchase',40,0,2,'2018-12-19 00:00:00'),(112,'return_invoice','return_invoice','purchase',40,0,2,'2018-12-19 00:00:00'),(113,'report','reports','report',0,0,2,'2018-12-19 00:00:00'),(114,'purchase_report','index','report',113,0,2,'2018-12-19 00:00:00'),(115,'stock_report_product_wise','productwise','report',113,0,2,'2018-12-19 00:00:00'),(116,'purchase_report_ingredient','ingredientwise','report',113,0,2,'2018-12-19 00:00:00'),(117,'sell_report','sellrpt','report',113,0,2,'2018-12-19 00:00:00'),(118,'table_setting','tablesetting','setting',44,0,2,'2018-12-19 00:00:00'),(119,'customer_type','','setting',0,0,2,'2018-12-19 00:00:00'),(120,'customertype_list','customertype','setting',0,0,2,'2018-12-19 00:00:00'),(121,'add_type','create','setting',120,0,2,'2018-12-19 00:00:00'),(122,'currency','','setting',0,0,2,'2018-12-19 00:00:00'),(123,'currency_list','currency','setting',0,0,2,'2018-12-19 00:00:00'),(124,'currency_add','create','setting',123,0,2,'2018-12-19 00:00:00'),(125,'production','','production',0,0,2,'2018-12-19 00:00:00'),(126,'production_set_list','production','production',0,0,2,'2018-12-19 00:00:00'),(127,'set_productionunit','productionunit','production',126,0,2,'2018-12-19 00:00:00'),(128,'production_add','create','production',126,0,2,'2018-12-19 00:00:00'),(129,'production_list','addproduction','production',126,0,2,'2018-12-19 00:00:00'),(130,'reservation','','reservation',0,0,2,'2018-12-19 00:00:00'),(131,'reservation_table','tablebooking','reservation',130,0,2,'2018-12-19 00:00:00'),(132,'update_ord','updateorder','ordermanage',45,0,2,'2019-12-11 00:00:00'),(133,'kitchen_dashboard','kitchen','ordermanage',45,0,2,'2020-02-13 00:00:00'),(134,'counter_dashboard','counterboard','ordermanage',45,0,2,'2020-02-16 00:00:00'),(191,'counter_list','counterlist','ordermanage',45,0,2,'2021-03-28 00:00:00'),(192,'pos_setting','possetting','ordermanage',45,0,2,'2021-03-28 00:00:00'),(193,'sound_setting','soundsetting','ordermanage',45,0,2,'2021-03-28 00:00:00'),(194,'supplier_ledger','supplier_ledger_report','purchase',38,0,2,'2021-03-28 00:00:00'),(195,'stock_out_ingredients','stock_out_ingredients','purchase',40,0,2,'2021-03-28 00:00:00'),(196,'sell_report_items','sellrptItems','report',117,0,2,'2021-01-21 00:00:00'),(197,'scharge_report','servicerpt','report',113,0,2,'2021-01-21 00:00:00'),(198,'sell_report_waiters','sellrptwaiter','report',113,0,2,'2021-01-21 00:00:00'),(199,'kitchen_sell','kichansrpt','report',113,0,2,'2021-01-21 00:00:00'),(200,'sell_report_delvirytype','sellrptdelvirytype','report',113,0,2,'2021-01-21 00:00:00'),(201,'sell_report_casher','sellrptCasher','report',113,0,2,'2021-01-21 00:00:00'),(202,'unpaid_sell','unpaid_sell','report',113,0,2,'2021-01-21 00:00:00'),(203,'sell_report_filter','sellrpt2','report',113,0,2,'2021-01-21 00:00:00'),(204,'sele_by_date','sellrptbydate','report',113,0,2,'2021-01-21 00:00:00'),(205,'production_setting','possetting','production',125,0,2,'2021-03-28 00:00:00'),(206,'kitchen_setting','kitchensetting','setting',0,0,2,'2021-03-28 00:00:00'),(207,'kitchen_assign','assignkitchen','setting',206,0,2,'2021-03-28 00:00:00'),(208,'sms_setting','smsetting','setting',0,0,2,'2021-03-28 00:00:00'),(209,'sms_configuration','sms_configuration','setting',208,0,2,'2021-03-28 00:00:00'),(210,'sms_temp','sms_template','setting',208,0,2,'2021-03-28 00:00:00'),(211,'bank','bank_list','setting',0,0,2,'2021-03-28 00:00:00'),(212,'list_of_bank','index','setting',211,0,2,'2021-03-28 00:00:00'),(213,'language','language','setting',0,0,2,'2021-03-28 00:00:00'),(214,'application_setting','setting','setting',0,0,2,'2021-03-28 00:00:00'),(215,'server_setting','serversetting','setting',0,0,2,'2021-03-28 00:00:00'),(216,'factory_reset','factoryreset','setting',214,0,2,'2021-03-28 00:00:00'),(217,'country','country_city_list','setting',0,0,2,'2021-03-28 00:00:00'),(218,'state','statelist','setting',217,0,2,'2021-03-28 00:00:00'),(219,'city','citylist','setting',217,0,2,'2021-03-28 00:00:00'),(220,'commission','Commissionsetting/payroll_commission','setting',0,0,2,'2021-03-28 00:00:00'),(221,'supplier_payment','supplier_payments','accounts',59,0,2,'2021-03-28 00:00:00'),(222,'cash_adjustment','cash_adjustment','accounts',59,0,2,'2021-03-28 00:00:00'),(223,'balance_sheet','balance_sheet','accounts',59,0,2,'2021-03-28 00:00:00'),(224,'expense','Cexpense','hrm',0,0,2,'2021-03-28 00:00:00'),(225,'unavailable_day','unavailablelist','reservation',130,0,2,'2021-03-28 00:00:00'),(226,'reservasetting','setting','reservation',130,0,2,'2021-03-28 00:00:00'),(1388,'dashboard','home','dashboard',0,0,2,'2021-09-02 00:00:00'),(1520,'add_facebook_app','facebookloginback','facebooklogin',0,0,3,'2020-12-03 00:00:00'),(1521,'facebook_api','showsetting','facebooklogin',1520,0,3,'2020-12-03 00:00:00');
/*!40000 ALTER TABLE `sec_menu_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `sec_role_permission`
--

LOCK TABLES `sec_role_permission` WRITE;
/*!40000 ALTER TABLE `sec_role_permission` DISABLE KEYS */;
INSERT INTO `sec_role_permission` VALUES (520,3,53,0,0,0,0,2,'2021-09-02 05:42:45'),(521,3,54,0,0,0,0,2,'2021-09-02 05:42:45'),(522,3,55,0,0,0,0,2,'2021-09-02 05:42:45'),(523,3,56,0,0,0,0,2,'2021-09-02 05:42:45'),(524,3,57,0,0,0,0,2,'2021-09-02 05:42:45'),(525,3,58,0,0,0,0,2,'2021-09-02 05:42:45'),(526,3,59,0,0,0,0,2,'2021-09-02 05:42:45'),(527,3,60,0,0,0,0,2,'2021-09-02 05:42:45'),(528,3,61,0,0,0,0,2,'2021-09-02 05:42:45'),(529,3,62,0,0,0,0,2,'2021-09-02 05:42:45'),(530,3,63,0,0,0,0,2,'2021-09-02 05:42:45'),(531,3,64,0,0,0,0,2,'2021-09-02 05:42:45'),(532,3,65,0,0,0,0,2,'2021-09-02 05:42:45'),(533,3,66,0,0,0,0,2,'2021-09-02 05:42:45'),(534,3,67,0,0,0,0,2,'2021-09-02 05:42:45'),(535,3,221,0,0,0,0,2,'2021-09-02 05:42:45'),(536,3,222,0,0,0,0,2,'2021-09-02 05:42:45'),(537,3,223,0,0,0,0,2,'2021-09-02 05:42:45'),(538,3,1388,1,1,1,1,2,'2021-09-02 05:42:45'),(539,3,68,0,0,0,0,2,'2021-09-02 05:42:45'),(540,3,69,0,0,0,0,2,'2021-09-02 05:42:45'),(541,3,70,0,0,0,0,2,'2021-09-02 05:42:45'),(542,3,71,0,0,0,0,2,'2021-09-02 05:42:45'),(543,3,72,0,0,0,0,2,'2021-09-02 05:42:45'),(544,3,73,0,0,0,0,2,'2021-09-02 05:42:45'),(545,3,74,0,0,0,0,2,'2021-09-02 05:42:45'),(546,3,75,0,0,0,0,2,'2021-09-02 05:42:45'),(547,3,76,0,0,0,0,2,'2021-09-02 05:42:45'),(548,3,77,0,0,0,0,2,'2021-09-02 05:42:45'),(549,3,78,0,0,0,0,2,'2021-09-02 05:42:45'),(550,3,79,0,0,0,0,2,'2021-09-02 05:42:45'),(551,3,80,0,0,0,0,2,'2021-09-02 05:42:45'),(552,3,81,0,0,0,0,2,'2021-09-02 05:42:45'),(553,3,82,0,0,0,0,2,'2021-09-02 05:42:45'),(554,3,83,0,0,0,0,2,'2021-09-02 05:42:45'),(555,3,84,0,0,0,0,2,'2021-09-02 05:42:45'),(556,3,85,0,0,0,0,2,'2021-09-02 05:42:45'),(557,3,86,0,0,0,0,2,'2021-09-02 05:42:45'),(558,3,87,0,0,0,0,2,'2021-09-02 05:42:45'),(559,3,88,0,0,0,0,2,'2021-09-02 05:42:45'),(560,3,89,0,0,0,0,2,'2021-09-02 05:42:45'),(561,3,90,0,0,0,0,2,'2021-09-02 05:42:45'),(562,3,91,0,0,0,0,2,'2021-09-02 05:42:45'),(563,3,92,0,0,0,0,2,'2021-09-02 05:42:45'),(564,3,93,0,0,0,0,2,'2021-09-02 05:42:45'),(565,3,94,0,0,0,0,2,'2021-09-02 05:42:45'),(566,3,95,0,0,0,0,2,'2021-09-02 05:42:45'),(567,3,96,0,0,0,0,2,'2021-09-02 05:42:45'),(568,3,97,0,0,0,0,2,'2021-09-02 05:42:45'),(569,3,98,0,0,0,0,2,'2021-09-02 05:42:45'),(570,3,99,0,0,0,0,2,'2021-09-02 05:42:45'),(571,3,100,0,0,0,0,2,'2021-09-02 05:42:45'),(572,3,101,0,0,0,0,2,'2021-09-02 05:42:45'),(573,3,102,0,0,0,0,2,'2021-09-02 05:42:45'),(574,3,103,0,0,0,0,2,'2021-09-02 05:42:45'),(575,3,104,0,0,0,0,2,'2021-09-02 05:42:45'),(576,3,105,0,0,0,0,2,'2021-09-02 05:42:45'),(577,3,106,0,0,0,0,2,'2021-09-02 05:42:45'),(578,3,107,0,0,0,0,2,'2021-09-02 05:42:45'),(579,3,108,0,0,0,0,2,'2021-09-02 05:42:45'),(580,3,109,0,0,0,0,2,'2021-09-02 05:42:45'),(581,3,110,0,0,0,0,2,'2021-09-02 05:42:45'),(582,3,224,0,0,0,0,2,'2021-09-02 05:42:45'),(583,3,1,1,1,1,1,2,'2021-09-02 05:42:45'),(584,3,2,1,1,1,1,2,'2021-09-02 05:42:45'),(585,3,3,1,1,1,1,2,'2021-09-02 05:42:45'),(586,3,4,1,1,1,1,2,'2021-09-02 05:42:45'),(587,3,5,0,0,0,0,2,'2021-09-02 05:42:45'),(588,3,6,1,1,0,0,2,'2021-09-02 05:42:45'),(589,3,7,1,1,0,0,2,'2021-09-02 05:42:45'),(590,3,8,1,1,0,0,2,'2021-09-02 05:42:45'),(591,3,9,1,1,0,0,2,'2021-09-02 05:42:45'),(592,3,10,1,1,0,0,2,'2021-09-02 05:42:45'),(593,3,11,1,1,0,0,2,'2021-09-02 05:42:45'),(594,3,12,1,1,0,0,2,'2021-09-02 05:42:45'),(595,3,13,1,1,0,0,2,'2021-09-02 05:42:45'),(596,3,20,1,1,0,0,2,'2021-09-02 05:42:45'),(597,3,21,1,1,0,0,2,'2021-09-02 05:42:45'),(598,3,1382,0,0,0,0,2,'2021-09-02 05:42:45'),(599,3,1383,0,0,0,0,2,'2021-09-02 05:42:45'),(600,3,1384,0,0,0,0,2,'2021-09-02 05:42:45'),(601,3,1385,0,0,0,0,2,'2021-09-02 05:42:45'),(602,3,1386,0,0,0,0,2,'2021-09-02 05:42:45'),(603,3,1387,0,0,0,0,2,'2021-09-02 05:42:45'),(604,3,45,1,1,1,0,2,'2021-09-02 05:42:45'),(605,3,46,1,1,1,0,2,'2021-09-02 05:42:45'),(606,3,47,1,1,1,0,2,'2021-09-02 05:42:45'),(607,3,48,1,1,1,0,2,'2021-09-02 05:42:45'),(608,3,49,1,1,1,0,2,'2021-09-02 05:42:45'),(609,3,50,1,1,1,0,2,'2021-09-02 05:42:45'),(610,3,51,1,1,1,0,2,'2021-09-02 05:42:45'),(611,3,52,1,1,1,0,2,'2021-09-02 05:42:45'),(612,3,132,1,1,1,0,2,'2021-09-02 05:42:45'),(613,3,133,1,1,1,0,2,'2021-09-02 05:42:45'),(614,3,134,1,1,1,0,2,'2021-09-02 05:42:45'),(615,3,191,1,1,1,0,2,'2021-09-02 05:42:45'),(616,3,192,1,1,1,0,2,'2021-09-02 05:42:45'),(617,3,193,1,1,1,0,2,'2021-09-02 05:42:45'),(618,3,125,0,0,0,0,2,'2021-09-02 05:42:45'),(619,3,126,0,0,0,0,2,'2021-09-02 05:42:45'),(620,3,127,0,0,0,0,2,'2021-09-02 05:42:45'),(621,3,128,0,0,0,0,2,'2021-09-02 05:42:45'),(622,3,129,0,0,0,0,2,'2021-09-02 05:42:45'),(623,3,205,0,0,0,0,2,'2021-09-02 05:42:45'),(624,3,40,1,1,0,0,2,'2021-09-02 05:42:45'),(625,3,41,1,1,0,0,2,'2021-09-02 05:42:45'),(626,3,111,1,1,0,0,2,'2021-09-02 05:42:45'),(627,3,112,1,1,0,0,2,'2021-09-02 05:42:45'),(628,3,194,1,1,0,0,2,'2021-09-02 05:42:45'),(629,3,195,1,1,0,0,2,'2021-09-02 05:42:45'),(630,3,227,0,0,0,0,2,'2021-09-02 05:42:45'),(631,3,228,0,0,0,0,2,'2021-09-02 05:42:45'),(632,3,229,0,0,0,0,2,'2021-09-02 05:42:45'),(633,3,113,0,0,0,0,2,'2021-09-02 05:42:45'),(634,3,114,0,0,0,0,2,'2021-09-02 05:42:45'),(635,3,115,0,0,0,0,2,'2021-09-02 05:42:45'),(636,3,116,0,0,0,0,2,'2021-09-02 05:42:45'),(637,3,117,0,0,0,0,2,'2021-09-02 05:42:45'),(638,3,196,0,0,0,0,2,'2021-09-02 05:42:45'),(639,3,197,0,0,0,0,2,'2021-09-02 05:42:45'),(640,3,198,0,0,0,0,2,'2021-09-02 05:42:45'),(641,3,199,0,0,0,0,2,'2021-09-02 05:42:45'),(642,3,200,0,0,0,0,2,'2021-09-02 05:42:45'),(643,3,201,0,0,0,0,2,'2021-09-02 05:42:45'),(644,3,202,0,0,0,0,2,'2021-09-02 05:42:45'),(645,3,203,0,0,0,0,2,'2021-09-02 05:42:45'),(646,3,204,0,0,0,0,2,'2021-09-02 05:42:45'),(647,3,130,0,0,0,0,2,'2021-09-02 05:42:45'),(648,3,131,0,0,0,0,2,'2021-09-02 05:42:45'),(649,3,225,0,0,0,0,2,'2021-09-02 05:42:45'),(650,3,226,0,0,0,0,2,'2021-09-02 05:42:45'),(651,3,28,0,0,0,0,2,'2021-09-02 05:42:45'),(652,3,29,0,0,0,0,2,'2021-09-02 05:42:45'),(653,3,30,0,0,0,0,2,'2021-09-02 05:42:45'),(654,3,31,0,0,0,0,2,'2021-09-02 05:42:45'),(655,3,32,0,0,0,0,2,'2021-09-02 05:42:45'),(656,3,33,0,0,0,0,2,'2021-09-02 05:42:45'),(657,3,34,0,0,0,0,2,'2021-09-02 05:42:45'),(658,3,35,0,0,0,0,2,'2021-09-02 05:42:45'),(659,3,36,0,0,0,0,2,'2021-09-02 05:42:45'),(660,3,37,0,0,0,0,2,'2021-09-02 05:42:45'),(661,3,38,0,0,0,0,2,'2021-09-02 05:42:45'),(662,3,39,0,0,0,0,2,'2021-09-02 05:42:45'),(663,3,42,0,0,0,0,2,'2021-09-02 05:42:45'),(664,3,43,0,0,0,0,2,'2021-09-02 05:42:45'),(665,3,44,0,0,0,0,2,'2021-09-02 05:42:45'),(666,3,118,0,0,0,0,2,'2021-09-02 05:42:45'),(667,3,119,0,0,0,0,2,'2021-09-02 05:42:45'),(668,3,120,0,0,0,0,2,'2021-09-02 05:42:45'),(669,3,121,0,0,0,0,2,'2021-09-02 05:42:45'),(670,3,122,0,0,0,0,2,'2021-09-02 05:42:45'),(671,3,123,0,0,0,0,2,'2021-09-02 05:42:45'),(672,3,124,0,0,0,0,2,'2021-09-02 05:42:45'),(673,3,206,0,0,0,0,2,'2021-09-02 05:42:45'),(674,3,207,0,0,0,0,2,'2021-09-02 05:42:45'),(675,3,208,0,0,0,0,2,'2021-09-02 05:42:45'),(676,3,209,0,0,0,0,2,'2021-09-02 05:42:45'),(677,3,210,0,0,0,0,2,'2021-09-02 05:42:45'),(678,3,211,0,0,0,0,2,'2021-09-02 05:42:45'),(679,3,212,0,0,0,0,2,'2021-09-02 05:42:45'),(680,3,213,0,0,0,0,2,'2021-09-02 05:42:45'),(681,3,214,0,0,0,0,2,'2021-09-02 05:42:45'),(682,3,215,0,0,0,0,2,'2021-09-02 05:42:45'),(683,3,216,0,0,0,0,2,'2021-09-02 05:42:45'),(684,3,217,0,0,0,0,2,'2021-09-02 05:42:45'),(685,3,218,0,0,0,0,2,'2021-09-02 05:42:45'),(686,3,219,0,0,0,0,2,'2021-09-02 05:42:45'),(687,3,220,0,0,0,0,2,'2021-09-02 05:42:45'),(688,3,14,0,0,0,0,2,'2021-09-02 05:42:45'),(689,3,15,0,0,0,0,2,'2021-09-02 05:42:45'),(690,3,16,0,0,0,0,2,'2021-09-02 05:42:45'),(691,3,17,0,0,0,0,2,'2021-09-02 05:42:45'),(692,3,18,0,0,0,0,2,'2021-09-02 05:42:45'),(693,3,19,0,0,0,0,2,'2021-09-02 05:42:45'),(694,3,230,0,0,0,0,2,'2021-09-02 05:42:45'),(695,3,231,0,0,0,0,2,'2021-09-02 05:42:45');
/*!40000 ALTER TABLE `sec_role_permission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `sec_role_tbl`
--

LOCK TABLES `sec_role_tbl` WRITE;
/*!40000 ALTER TABLE `sec_role_tbl` DISABLE KEYS */;
INSERT INTO `sec_role_tbl` VALUES (1,'kitchen','manage kitchen',2,'2020-10-12 10:27:03',1),(2,'Counter','Display Order timing',2,'2020-10-12 10:27:45',1),(3,'Waiter','Order Taken and served food',2,'2020-10-12 10:29:13',1);
/*!40000 ALTER TABLE `sec_role_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `sec_user_access_tbl`
--

LOCK TABLES `sec_user_access_tbl` WRITE;
/*!40000 ALTER TABLE `sec_user_access_tbl` DISABLE KEYS */;
INSERT INTO `sec_user_access_tbl` VALUES (1,3,172);
/*!40000 ALTER TABLE `sec_user_access_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `setting`
--

LOCK TABLES `setting` WRITE;
/*!40000 ALTER TABLE `setting` DISABLE KEYS */;
INSERT INTO `setting` VALUES (2,'Punjabi Palace Restaurant','Punjabi Palace Restaurant','135, Melbourne Street, South Brisbane, QLD','info@PunjabiPalace.com.au','(07) 3846 3884\n','assets/img/icons/2019-10-29/h.png',NULL,'assets/img/icons/m.png','9:00AM','10:00PM',7.50,NULL,'23457586',1,1,5.000,20,1,2,'1:00 Hour','english','Asia/Dhaka','d/m/Y','LTR',15,'Powered By: BDTASK, www.bdtask.com\r\n','2020','09:00:00','22:00:00',20,2);
/*!40000 ALTER TABLE `setting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `shipping_method`
--

LOCK TABLES `shipping_method` WRITE;
/*!40000 ALTER TABLE `shipping_method` DISABLE KEYS */;
INSERT INTO `shipping_method` VALUES (1,'Home Delivary',60.00,'9, 8, 5, 4, 3, 1',1,3),(2,'Pickup',0.00,'4, 3, 1',1,2),(3,'Dine-in',0.00,'9, 8, 5, 4, 3',1,1);
/*!40000 ALTER TABLE `shipping_method` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `sms_configuration`
--

LOCK TABLES `sms_configuration` WRITE;
/*!40000 ALTER TABLE `sms_configuration` DISABLE KEYS */;
INSERT INTO `sms_configuration` VALUES (1,'http://smsrank.com/','SMS Rank','rabbani','123456','smsrank','',1),(2,'https://www.nexmo.com/','nexmo','50489b88','z1cBmtrDeQrOaqhg','restaurant','',0),(3,'https://www.budgetsms.net/','budgetsms','user1','1e753da74','budgetsms','21547',0);
/*!40000 ALTER TABLE `sms_configuration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `sms_template`
--

LOCK TABLES `sms_template` WRITE;
/*!40000 ALTER TABLE `sms_template` DISABLE KEYS */;
INSERT INTO `sms_template` VALUES (1,'one','your Order {id} is cancel for some reason.','Cancel',0,0,'2018-12-30 12:38:07','0000-00-00 00:00:00'),(2,'two','your order {id} is completed','CompleteOrder',0,1,'2018-12-30 14:28:19','0000-00-00 00:00:00'),(3,'three','your order {id} is processing','Processing',0,1,'2018-11-06 12:30:46','0000-00-00 00:00:00'),(8,'four','Your Order Has been Placed Successfully.','Neworder',1,0,'2018-12-30 14:29:32','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `sms_template` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `sub_order`
--

LOCK TABLES `sub_order` WRITE;
/*!40000 ALTER TABLE `sub_order` DISABLE KEYS */;
INSERT INTO `sub_order` VALUES (1,2,NULL,NULL,0.00,NULL,NULL,0,NULL,NULL,NULL,NULL),(2,2,NULL,NULL,0.00,NULL,NULL,0,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `sub_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `subscribe_emaillist`
--

LOCK TABLES `subscribe_emaillist` WRITE;
/*!40000 ALTER TABLE `subscribe_emaillist` DISABLE KEYS */;
/*!40000 ALTER TABLE `subscribe_emaillist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `supplier`
--

LOCK TABLES `supplier` WRITE;
/*!40000 ALTER TABLE `supplier` DISABLE KEYS */;
/*!40000 ALTER TABLE `supplier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `supplier_ledger`
--

LOCK TABLES `supplier_ledger` WRITE;
/*!40000 ALTER TABLE `supplier_ledger` DISABLE KEYS */;
/*!40000 ALTER TABLE `supplier_ledger` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `synchronizer_setting`
--

LOCK TABLES `synchronizer_setting` WRITE;
/*!40000 ALTER TABLE `synchronizer_setting` DISABLE KEYS */;
INSERT INTO `synchronizer_setting` VALUES (8,'70.35.198.244','softest3bdtask','Ux5O~MBJ#odK','21','true','./public_html/');
/*!40000 ALTER TABLE `synchronizer_setting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `table_details`
--

LOCK TABLES `table_details` WRITE;
/*!40000 ALTER TABLE `table_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `table_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `table_setting`
--

LOCK TABLES `table_setting` WRITE;
/*!40000 ALTER TABLE `table_setting` DISABLE KEYS */;
INSERT INTO `table_setting` VALUES (1,2,'position: relative; left: 186px; top: 231px;'),(2,4,'position: relative; left: 87px; top: 17px;'),(3,3,'position: relative; left: -126px; top: 129px;'),(4,1,'position: relative; left: 15px; top: 28px;'),(5,8,'position: relative; left: -336px; top: 224px;'),(6,6,'position: relative; left: -184px; top: 113px;'),(7,5,'position: relative; left: -153px; top: 85px;'),(8,7,'position: relative; left: -372px; top: 223px;'),(9,9,'position: relative; left: -744px; top: 14px;'),(10,10,'position: relative; left: -448px; top: 226px;');
/*!40000 ALTER TABLE `table_setting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tbl_assign_kitchen`
--

LOCK TABLES `tbl_assign_kitchen` WRITE;
/*!40000 ALTER TABLE `tbl_assign_kitchen` DISABLE KEYS */;
INSERT INTO `tbl_assign_kitchen` VALUES (2,1,177),(3,15,177);
/*!40000 ALTER TABLE `tbl_assign_kitchen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tbl_bank`
--

LOCK TABLES `tbl_bank` WRITE;
/*!40000 ALTER TABLE `tbl_bank` DISABLE KEYS */;
INSERT INTO `tbl_bank` VALUES (1,'Dutch-Bangla Bank','Ainal Haque','110535764655','Mirpur 10','./application/modules/hrm/assets/images/2020-01-18/c.jpg'),(2,'City Bank','Kamal Hassan','3869583','Uttara','./application/modules/hrm/assets/images/2020-01-18/e.jpg'),(3,'Brac Bank','Robiul Islam','9356346','Motijeel','./application/modules/hrm/assets/images/2020-01-18/f.jpg');
/*!40000 ALTER TABLE `tbl_bank` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tbl_billingaddress`
--

LOCK TABLES `tbl_billingaddress` WRITE;
/*!40000 ALTER TABLE `tbl_billingaddress` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_billingaddress` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tbl_cancelitem`
--

LOCK TABLES `tbl_cancelitem` WRITE;
/*!40000 ALTER TABLE `tbl_cancelitem` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_cancelitem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tbl_card_terminal`
--

LOCK TABLES `tbl_card_terminal` WRITE;
/*!40000 ALTER TABLE `tbl_card_terminal` DISABLE KEYS */;
INSERT INTO `tbl_card_terminal` VALUES (1,'Nexus Terminal'),(2,'Brac Bank Terminal'),(3,'Visa-Master Terminal');
/*!40000 ALTER TABLE `tbl_card_terminal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tbl_cashcounter`
--

LOCK TABLES `tbl_cashcounter` WRITE;
/*!40000 ALTER TABLE `tbl_cashcounter` DISABLE KEYS */;
INSERT INTO `tbl_cashcounter` VALUES (1,1),(2,2);
/*!40000 ALTER TABLE `tbl_cashcounter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tbl_cashregister`
--

LOCK TABLES `tbl_cashregister` WRITE;
/*!40000 ALTER TABLE `tbl_cashregister` DISABLE KEYS */;
INSERT INTO `tbl_cashregister` VALUES (1,2,1,14000.000,0.000,'2025-01-23','2025-01-23 15:40:46','1970-01-01 00:00:00',0,'','');
/*!40000 ALTER TABLE `tbl_cashregister` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tbl_city`
--

LOCK TABLES `tbl_city` WRITE;
/*!40000 ALTER TABLE `tbl_city` DISABLE KEYS */;
INSERT INTO `tbl_city` VALUES (3,1,12,'Savar',1),(4,1,12,'Gajipur',1),(5,1,12,'Mirpur',1);
/*!40000 ALTER TABLE `tbl_city` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tbl_country`
--

LOCK TABLES `tbl_country` WRITE;
/*!40000 ALTER TABLE `tbl_country` DISABLE KEYS */;
INSERT INTO `tbl_country` VALUES (1,'Bangladesh',1),(2,'United State',1),(3,'United Kingdom',1),(4,'India',1),(5,'Vietnam',1);
/*!40000 ALTER TABLE `tbl_country` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tbl_delivaritime`
--

LOCK TABLES `tbl_delivaritime` WRITE;
/*!40000 ALTER TABLE `tbl_delivaritime` DISABLE KEYS */;
INSERT INTO `tbl_delivaritime` VALUES (1,'10:00-10:30'),(2,'10:30-11:00'),(3,'11:00-11:30'),(4,'11:30-12:00'),(5,'12:00-12:30'),(6,'12:30-13:00'),(7,'13:00-13:30'),(8,'13:30-14:00'),(9,'14:00-14:30'),(10,'14:30-15:00'),(11,'15:00-15:30'),(12,'15:30-16:00'),(13,'16:00-16:30'),(14,'16:30-17:00'),(15,'17:00-17:30'),(16,'17:30-18:00'),(17,'18:00-18:30'),(18,'18:30-19:00'),(19,'19:00-19:30'),(20,'19:30-20:00'),(21,'20:00-20:30'),(22,'20:30-21:00');
/*!40000 ALTER TABLE `tbl_delivaritime` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tbl_delivaryaddress`
--

LOCK TABLES `tbl_delivaryaddress` WRITE;
/*!40000 ALTER TABLE `tbl_delivaryaddress` DISABLE KEYS */;
INSERT INTO `tbl_delivaryaddress` VALUES (1,'Uttara,Road#7,Dhaka-Bangladesh.'),(2,'Uttara,Road#5,Dhaka'),(3,'Uttara,Road#2,Dhaka'),(4,'Uttara,Road#4,Dhaka'),(5,'Gulsion Circle,Dhaka-Bangladesh'),(6,'Banani, Dhaka-Bangladesh'),(7,'Dhanmondi,Road#15 Dhaka-Bangladesh'),(8,'Dhanmondi,Road#27 Dhaka-Bangladesh'),(9,'Elephantroad, Dhaka-Bangladesh'),(10,'Badda,Road#15 Dhaka-Bangladesh'),(11,'Rampura,Road#15 Dhaka-Bangladesh'),(12,'Khilkhet,Road#15 Dhaka-Bangladesh'),(13,'Mohammadpur,Road#15 Dhaka-Bangladesh'),(14,'Motijeel,Road#15 Dhaka-Bangladesh'),(15,'komlapur,Road#15 Dhaka-Bangladesh'),(16,'Newmarket,Road#15 Rajshahi-Bangladesh'),(17,'Road#15, Khulna-Bangladesh'),(18,'Road#15, Chittagong-Bangladesh'),(19,'Agrabad, Chittagong-Bangladesh'),(20,'Potengha, Chittagong-Bangladesh'),(21,'Kadirgonj,Rail Gate,Nogor Bhabon, Rajshahi.');
/*!40000 ALTER TABLE `tbl_delivaryaddress` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tbl_generatedreport`
--

LOCK TABLES `tbl_generatedreport` WRITE;
/*!40000 ALTER TABLE `tbl_generatedreport` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_generatedreport` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tbl_groupitems`
--

LOCK TABLES `tbl_groupitems` WRITE;
/*!40000 ALTER TABLE `tbl_groupitems` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_groupitems` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tbl_itemaccepted`
--

LOCK TABLES `tbl_itemaccepted` WRITE;
/*!40000 ALTER TABLE `tbl_itemaccepted` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_itemaccepted` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tbl_kitchen`
--

LOCK TABLES `tbl_kitchen` WRITE;
/*!40000 ALTER TABLE `tbl_kitchen` DISABLE KEYS */;
INSERT INTO `tbl_kitchen` VALUES (1,'Common Kitchen','192.168.1.87','9100',1),(11,'Kabab',NULL,NULL,1),(12,'Juice',NULL,NULL,1),(13,'Fast Food',NULL,NULL,1),(14,'Soup',NULL,NULL,1),(15,'Dessert',NULL,NULL,1),(16,'Italian',NULL,NULL,1);
/*!40000 ALTER TABLE `tbl_kitchen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tbl_kitchen_order`
--

LOCK TABLES `tbl_kitchen_order` WRITE;
/*!40000 ALTER TABLE `tbl_kitchen_order` DISABLE KEYS */;
INSERT INTO `tbl_kitchen_order` VALUES (1,16,1,1,1,NULL),(2,16,2,1,1,NULL),(3,16,4,1,1,NULL),(4,16,3,1,1,NULL);
/*!40000 ALTER TABLE `tbl_kitchen_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tbl_menutype`
--

LOCK TABLES `tbl_menutype` WRITE;
/*!40000 ALTER TABLE `tbl_menutype` DISABLE KEYS */;
INSERT INTO `tbl_menutype` VALUES (1,'Breakfast','./application/modules/itemmanage/assets/images/2020-11-21/b.png',1),(2,'Launch','./application/modules/itemmanage/assets/images/2020-11-21/l1.png',1),(3,'Dinner','./application/modules/itemmanage/assets/images/2020-11-21/d.png',1),(4,'Coffee','./application/modules/itemmanage/assets/images/2020-11-21/c.png',1),(5,'Party','./application/modules/itemmanage/assets/images/2020-11-21/p.png',1);
/*!40000 ALTER TABLE `tbl_menutype` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tbl_module_purchasekey`
--

LOCK TABLES `tbl_module_purchasekey` WRITE;
/*!40000 ALTER TABLE `tbl_module_purchasekey` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_module_purchasekey` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tbl_notificationsetting`
--

LOCK TABLES `tbl_notificationsetting` WRITE;
/*!40000 ALTER TABLE `tbl_notificationsetting` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_notificationsetting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tbl_openclose`
--

LOCK TABLES `tbl_openclose` WRITE;
/*!40000 ALTER TABLE `tbl_openclose` DISABLE KEYS */;
INSERT INTO `tbl_openclose` VALUES (1,'Saturday','08:00','21:00'),(2,'Sunday','08:00','20:00'),(3,'Monday','08:00','20:00'),(4,'Tuesday','08:00','20:00'),(5,'Wednesday','08:00','20:00'),(6,'Thursday','08:00','20:00'),(7,'Friday','Closed','Closed');
/*!40000 ALTER TABLE `tbl_openclose` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tbl_orderprepare`
--

LOCK TABLES `tbl_orderprepare` WRITE;
/*!40000 ALTER TABLE `tbl_orderprepare` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_orderprepare` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tbl_posetting`
--

LOCK TABLES `tbl_posetting` WRITE;
/*!40000 ALTER TABLE `tbl_posetting` DISABLE KEYS */;
INSERT INTO `tbl_posetting` VALUES (1,1,1,1,0,1,0);
/*!40000 ALTER TABLE `tbl_posetting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tbl_quickordersetting`
--

LOCK TABLES `tbl_quickordersetting` WRITE;
/*!40000 ALTER TABLE `tbl_quickordersetting` DISABLE KEYS */;
INSERT INTO `tbl_quickordersetting` VALUES (1,1,1,1,0,1);
/*!40000 ALTER TABLE `tbl_quickordersetting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tbl_rating`
--

LOCK TABLES `tbl_rating` WRITE;
/*!40000 ALTER TABLE `tbl_rating` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_rating` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tbl_room`
--

LOCK TABLES `tbl_room` WRITE;
/*!40000 ALTER TABLE `tbl_room` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_room` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tbl_seoption`
--

LOCK TABLES `tbl_seoption` WRITE;
/*!40000 ALTER TABLE `tbl_seoption` DISABLE KEYS */;
INSERT INTO `tbl_seoption` VALUES (1,'Bhojon Home page','home','restaurant,food,reservation','Best Restautant Management Software'),(3,'Menu','menu','Desert,Meet,fish,meet,bevarage','Menu Page'),(4,'Food Details','food_details','Meet,solt','Details food├é┬á information'),(5,'Reservation','reservation','Table,booking,reservation','Table Reservation'),(6,'Cart Page','cart_page','food,menu','Cart Page'),(7,'Checkout','checkout','Checkout','Checkout'),(8,'Login','login','Login','Login'),(9,'Registration','registration','Registration','Registration'),(10,'Payment information','payment_information','Online Payment information','Payment information'),(11,'Stripe Payment information','stripe_payment_information','Stripe Payment','Stripe Payment information'),(12,'About us','about_us','About restaurant','About us'),(13,'Contact Us','contact_us','Contact Us','Contact Us'),(14,'Privacy Policy','privacy_policy','privacy','Privacy Policy'),(15,'Our Terms','our_terms','Our Terms','Our Terms'),(16,'My Profile','my_profile','My Profile','My Profile'),(17,'My Order List','my_order_list','My Order List','My Order List'),(18,'View Order','view_order','View Order','View Order'),(19,'My Reservation','my_reservation','My Reservation','My Reservation');
/*!40000 ALTER TABLE `tbl_seoption` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tbl_shippingaddress`
--

LOCK TABLES `tbl_shippingaddress` WRITE;
/*!40000 ALTER TABLE `tbl_shippingaddress` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_shippingaddress` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tbl_slider`
--

LOCK TABLES `tbl_slider` WRITE;
/*!40000 ALTER TABLE `tbl_slider` DISABLE KEYS */;
INSERT INTO `tbl_slider` VALUES (1,1,'Welcome To','Book <span>Your</span> Table','','#',1,0,1920,902),(2,1,'Find Your','Best <span>Cafe</span> Deals','','#',1,0,1920,902),(3,1,'Exclusive','Coffee <span>Shop</span>','','#',1,0,1920,902),(4,2,'Discover','OUR STORY','','#',1,0,263,332),(5,2,'Discover','OUR STORY','','#',1,0,263,332),(6,3,'Discover','OUR MENU','','#',1,0,263,332),(7,3,'Discover','OUR MENU','','#',1,0,263,177),(8,3,'Discover','OUR MENU','','#',1,0,263,177),(9,4,'right','ads','','#',1,0,252,621),(10,5,'OUR AWESOME STREET','FOOD HISTORY','','#',1,0,541,516),(11,6,'Reservation','BOOK YOUR TABLE','dummyimage/463x540.jpg','#',1,0,470,548),(12,7,'Our Gallery','CHEF SELECTION','','#',1,0,340,277),(13,7,'Our Gallery','CHEF SELECTION','','#',1,0,340,277),(14,7,'Our Gallery','CHEF SELECTION','','#',1,0,340,277),(15,7,'Our Gallery','CHEF SELECTION','','#',1,0,340,277),(16,7,'Our Gallery','CHEF SELECTION','','#',1,0,340,277),(17,7,'Our Gallery','CHEF SELECTION','','#',1,0,340,277),(18,8,'Offer','item offer','','#',1,0,250,533),(19,9,'Offer','food offer','','#',1,0,250,553),(20,10,'contact us','contact','','#',1,0,475,633);
/*!40000 ALTER TABLE `tbl_slider` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tbl_slider_type`
--

LOCK TABLES `tbl_slider_type` WRITE;
/*!40000 ALTER TABLE `tbl_slider_type` DISABLE KEYS */;
INSERT INTO `tbl_slider_type` VALUES (1,'Home Top Slider',0),(2,'Home our story',0),(3,'Home our menu',0),(4,'Menu Page right Banner',0),(5,'Classic theme Home story',0),(6,'Classic theme Home reservation',0),(7,'Classic theme Home gallery',0),(8,'Menu Page Offer Banner Right',0),(9,'Cart Page Offer Banner Right',0),(10,'Contact Us',0);
/*!40000 ALTER TABLE `tbl_slider_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tbl_sociallink`
--

LOCK TABLES `tbl_sociallink` WRITE;
/*!40000 ALTER TABLE `tbl_sociallink` DISABLE KEYS */;
INSERT INTO `tbl_sociallink` VALUES (1,'Facebook','https://www.facebook.com','fab fa-facebook',1),(2,'Twitter','https://www.twitter.com','fab fa-twitter',1),(3,'Google Plus','https://plus.google.com','fab fa-google-plus',1),(4,'Pinterest','https://www.pinterest.com/','fab fa-pinterest',1),(6,'Linkedin','https://linkedin.com','fab fa-linkedin',1);
/*!40000 ALTER TABLE `tbl_sociallink` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tbl_soundsetting`
--

LOCK TABLES `tbl_soundsetting` WRITE;
/*!40000 ALTER TABLE `tbl_soundsetting` DISABLE KEYS */;
INSERT INTO `tbl_soundsetting` VALUES (1,'assets/2021-03-21/b1.mp3','h');
/*!40000 ALTER TABLE `tbl_soundsetting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tbl_state`
--

LOCK TABLES `tbl_state` WRITE;
/*!40000 ALTER TABLE `tbl_state` DISABLE KEYS */;
INSERT INTO `tbl_state` VALUES (1,2,'Alabama',1),(2,2,'Alaska',1),(3,2,'Arizona',1),(4,2,'Arkansas',1),(5,2,'California',1),(6,2,'Florida',1),(7,2,'New Mexico',1),(8,2,'New York',1),(9,2,'Oklahoma',1),(10,2,'Texas',1),(11,2,'Virginia',1),(12,1,'Dhaka',1),(13,1,'Chittagong',1),(14,1,'Rajshahi',1),(15,1,'Khulna',1),(16,1,'Sylhet',1),(17,1,'Barishal',1),(18,1,'Rangpur',1),(19,1,'Mymensingh',1),(20,4,'West Bengal',1),(21,4,'Uttar Pradesh',1),(22,4,'Tripura',1),(23,4,'Telangana',1),(24,4,'Tamil Nadu',1),(25,4,'Sikkim',1),(26,4,'Rajasthan',1),(27,4,'Punjab',1),(28,4,'Odisha',1),(29,4,'Nagaland',1),(30,4,'Kerala',1),(31,4,'Haryana',1);
/*!40000 ALTER TABLE `tbl_state` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tbl_tablefloor`
--

LOCK TABLES `tbl_tablefloor` WRITE;
/*!40000 ALTER TABLE `tbl_tablefloor` DISABLE KEYS */;
INSERT INTO `tbl_tablefloor` VALUES (1,'First Floor'),(2,'VIP Floor'),(3,'Second Floor');
/*!40000 ALTER TABLE `tbl_tablefloor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tbl_thirdparty_customer`
--

LOCK TABLES `tbl_thirdparty_customer` WRITE;
/*!40000 ALTER TABLE `tbl_thirdparty_customer` DISABLE KEYS */;
INSERT INTO `tbl_thirdparty_customer` VALUES (1,'Food Panda','Dhaka',5.00),(2,'pathao','Dhaka',8.00),(3,'Hungrynaki','Dhaka',5.00),(4,'Foodmart','Dhaka',5.00);
/*!40000 ALTER TABLE `tbl_thirdparty_customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tbl_token`
--

LOCK TABLES `tbl_token` WRITE;
/*!40000 ALTER TABLE `tbl_token` DISABLE KEYS */;
INSERT INTO `tbl_token` VALUES (1,'ABCD',10.00,'2021-08-28','2021-12-30',1);
/*!40000 ALTER TABLE `tbl_token` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tbl_updateitems`
--

LOCK TABLES `tbl_updateitems` WRITE;
/*!40000 ALTER TABLE `tbl_updateitems` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_updateitems` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tbl_version_checker`
--

LOCK TABLES `tbl_version_checker` WRITE;
/*!40000 ALTER TABLE `tbl_version_checker` DISABLE KEYS */;
INSERT INTO `tbl_version_checker` VALUES (1,'2.8',0);
/*!40000 ALTER TABLE `tbl_version_checker` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tbl_waiterappcart`
--

LOCK TABLES `tbl_waiterappcart` WRITE;
/*!40000 ALTER TABLE `tbl_waiterappcart` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_waiterappcart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tbl_widget`
--

LOCK TABLES `tbl_widget` WRITE;
/*!40000 ALTER TABLE `tbl_widget` DISABLE KEYS */;
INSERT INTO `tbl_widget` VALUES (1,'Footer left','','<p class=\"text-justify\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard.</p>',1),(2,'footermiddle','Available On','<p><strong>Monday - Wednesday</strong>├é┬á10:00 AM - 7:00 PM</p>\r\n<p><strong>Thursday - Friday</strong>├é┬á10:00 AM - 11:00 PM</p>\r\n<p><strong>Saturday</strong>├é┬á12:00 PM - 6:00 PM</p>\r\n<p><strong>Sunday</strong>├é┬áOff</p>',1),(3,'Footer right','Contact Us','<p>356, Mannan Plaza ( 4th Floar ) Khilkhet Dhaka</p>\r\n<p><a href=\"../../hungry\">support@bdtask.com</a></p>\r\n<p><a href=\"../../hungry\">+88 01715 222 333</a></p>',1),(4,'Our Store','Our Store','<address>123 Suspendis matti,&nbsp;<br />Visaosang Building VST District,&nbsp;<br />NY Accums, North American</address>\r\n<p><a class=\"d-block\" href=\"http://soft9.bdtask.com/hungry-v1/\">0123-456-78910</a><a class=\"d-block\" href=\"http://soft9.bdtask.com/hungry-v1/\">support@domain.com</a></p>',1),(6,'Reservation','BOOK YOUR TABLE','<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>',1),(7,'Our Menu text','Our Menu ','<p>Rosa is a restaurant, bar and coffee roastery located on a busy corner site in Farringdon\'s Exmouth Market. With glazed frontage on two sides of the building, overlooking the market and a bustling London inteon.</p>',1),(8,'Specials','FOOD MENU','<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The</p>',1),(9,'story text','OUR STORY','<p>Rosa is a restaurant, bar and coffee roastery located on a busy corner site in Farringdon\'s Exmouth Market. With glazed frontage on two sides of the building, overlooking the market and a bustling London inteon.</p>',1),(10,'Professional','OUR EXPERT CHEFS','',1),(11,'Need Help Booking?','Need Help Booking?','<p class=\"mb-2\">Just call our customer services at any time, we are waiting 24 hours to recieve your calls.</p>\r\n<p><a href=\"#\">+880 1712 123 123</a></p>',1),(12,'Privacy','Privacy Policy','<h2>What is Lorem Ipsum</h2>\r\n<p>Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<h3>Contacting us :</h3>\r\n<p>If you have any questions about this Privacy Policy, the practices of this site, or your dealings with this site, please contact us.</p>',1),(13,'termscondition','Terms of Use','<h3>Web browser cookies</h3>\r\n<p>Our Site may use cache┬áand \"cookies\" to enhance User experience. User\'s web browser places cookies on their hard drive for record-keeping purposes and sometimes to track information about them. User may choose to set their web browser to refuse cookies, or to alert you when cookies are being sent. If they do so, note that some parts of the Site may not function properly.</p>\r\n<h3>How we use collected information bdtask may collect and use Users personal information for the following purposes:</h3>\r\n<p>To run and operate our Site We may need your information display content on the Site correctly. To improve customer service Information you provide helps us respond to your customer service requests and support needs more efficiently. To personalize user experience We may use information in the aggregate to understand how our Users as a group use the services and resources provided on our Site. To improve our Site We may use feedback you provide to improve our products and services. To run a promotion, contest, survey or other Site feature To send Users information they agreed to receive about topics we think will be of interest to them. To send periodic emails We may use the email address to send User information and updates pertaining to their order. It may also be used to respond to their inquiries, questions, and/or other requests.</p>',1),(14,'map','Google Map','<p>&lt;iframe style=\"border: 0;\" src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14599.578237069936!2d90.3654215!3d23.8223482!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1583411739085!5m2!1sen!2sbd\" width=\"300\" height=\"150\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\"&gt;&lt;/iframe&gt;</p>',1),(15,'carousal1','carousal','<p>show</p>',1),(16,'TASTY MENU TODAY','CHEF SELECTION','',1),(17,'FOOD HISTORY','OUR AWESOME STREET','<p class=\"mb-4\">Thing lesser replenish evening called void a sea blessed meat fourth called moveth place behold night own night third in they abundant and don\'t you\'re the upon fruit. Divided open divided appear also saw may fill. whales seed creepeth. Open lessegether he also morning land i saw Man</p>\r\n<p><a class=\"simple_btn\" href=\"#\">Our Story</a></p>',1),(21,'Our Gallery','Restaurant Photo Gallery','',1),(22,'subfooter','','',1),(23,'Get In Touch','contact','<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>',1),(24,'Refund Policies','Refund Policies','<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard.</p>',1);
/*!40000 ALTER TABLE `tbl_widget` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tblreservation`
--

LOCK TABLES `tblreservation` WRITE;
/*!40000 ALTER TABLE `tblreservation` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblreservation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tblserver`
--

LOCK TABLES `tblserver` WRITE;
/*!40000 ALTER TABLE `tblserver` DISABLE KEYS */;
INSERT INTO `tblserver` VALUES (1,'http://localhost/restaurant_v2','http://soft14.bdtask.com/restaurant_v2');
/*!40000 ALTER TABLE `tblserver` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `themes`
--

LOCK TABLES `themes` WRITE;
/*!40000 ALTER TABLE `themes` DISABLE KEYS */;
INSERT INTO `themes` VALUES (1,'defaults',NULL,0,'2020-11-19'),(3,'classic',NULL,1,NULL);
/*!40000 ALTER TABLE `themes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `top_menu`
--

LOCK TABLES `top_menu` WRITE;
/*!40000 ALTER TABLE `top_menu` DISABLE KEYS */;
INSERT INTO `top_menu` VALUES (1,'Home','home',0,'2021-09-19',1),(2,'Reservation','reservation',0,'2019-02-20',1),(3,'Menu','menu',0,'2021-10-18',1),(4,'About Us','about',0,'2019-11-25',1),(5,'Contact Us','contact',0,'2019-01-26',1),(6,'Pages','pages',0,'2019-11-28',1),(7,'Cart','cart',6,'2019-01-26',1),(8,'Details','details',7,'2020-01-15',1),(9,'Logout','hungry/logout',6,'2019-02-03',1),(10,'My Profile','myprofile',0,'2019-10-16',1);
/*!40000 ALTER TABLE `top_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `unit_of_measurement`
--

LOCK TABLES `unit_of_measurement` WRITE;
/*!40000 ALTER TABLE `unit_of_measurement` DISABLE KEYS */;
INSERT INTO `unit_of_measurement` VALUES (1,'Kilogram','kg.',1),(2,'Liter','ltr.',1),(3,'Gram','grm.',1),(4,'tonne','tn.',1),(5,'milligram','mg.',1),(6,'carat','carat',1),(7,'Per Pieces','pcs',1),(8,'Per Cup','cup',1),(9,'Pound','pnd.',1),(10,'tablespoon','tspoon',1),(11,'Milliliter','ML',1);
/*!40000 ALTER TABLE `unit_of_measurement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `usedcoupon`
--

LOCK TABLES `usedcoupon` WRITE;
/*!40000 ALTER TABLE `usedcoupon` DISABLE KEYS */;
/*!40000 ALTER TABLE `usedcoupon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (2,'John','Doe','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum','','admin@example.com','827ccb0eea8a706c4c34a16891f84e7b','','./assets/img/user/m2.png','2025-01-27 10:25:21','2025-01-24 17:59:19','::1',NULL,1,1),(165,'Hm','Isahaq',NULL,NULL,'hmisahaq@gmail.com','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,NULL,NULL,NULL,NULL,1,0),(166,'Ainal','Haque',NULL,NULL,'ainal@gmail.com','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,'2020-12-17 12:30:42','2020-12-17 12:30:31','::1',NULL,1,0),(168,'Manik ','Hassan',NULL,NULL,'manik@gmail.com','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,NULL,NULL,NULL,NULL,1,0),(177,'Di','Maria',NULL,NULL,'dimaria@gmail.com','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,NULL,NULL,NULL,NULL,1,0);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `variant`
--

LOCK TABLES `variant` WRITE;
/*!40000 ALTER TABLE `variant` DISABLE KEYS */;
INSERT INTO `variant` VALUES (1,1,'Tawa Naan',35.00);
/*!40000 ALTER TABLE `variant` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `weekly_holiday`
--

LOCK TABLES `weekly_holiday` WRITE;
/*!40000 ALTER TABLE `weekly_holiday` DISABLE KEYS */;
INSERT INTO `weekly_holiday` VALUES (1,'Friday,Satarday,Sunday');
/*!40000 ALTER TABLE `weekly_holiday` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-01-27 10:08:00
