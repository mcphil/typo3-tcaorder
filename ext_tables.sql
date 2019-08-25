#
# Table structure for table 'tx_tcaorder_domain_model_house'
#
CREATE TABLE tx_tcaorder_domain_model_house (

	name varchar(255) DEFAULT '' NOT NULL,
	floors_in_the_house text,

);

#
# Table structure for table 'tx_tcaorder_domain_model_floor'
#
CREATE TABLE tx_tcaorder_domain_model_floor (

	house int(11) unsigned DEFAULT '0' NOT NULL,

	name varchar(255) DEFAULT '' NOT NULL,

);

#
# Table structure for table 'tx_tcaorder_domain_model_floor'
#
CREATE TABLE tx_tcaorder_domain_model_floor (

	house int(11) unsigned DEFAULT '0' NOT NULL,

);
