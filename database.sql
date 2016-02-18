#
# Table structure for table 'members'
#

CREATE TABLE `members` (
  `member_id` int(11) unsigned NOT NULL auto_increment,
  `firstname` varchar(100) default NULL,
  `lastname` varchar(100) default NULL,
  `login` varchar(100) NOT NULL default '',
  `passwd` varchar(32) NOT NULL default '',
  PRIMARY KEY  (`member_id`)
) TYPE=MyISAM;



#
# Dumping data for table 'members'
#

INSERT INTO `members` (`member_id`, `firstname`, `lastname`, `login`, `passwd`) VALUES("1", "Admin", "Thind", "phpsense", "21232f297a57a5a743894a0e4a801fc3");



CREATE TABLE `m_roles` (
  role_id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  role_name VARCHAR(50) NOT NULL,

  PRIMARY KEY (role_id)
);

CREATE TABLE `m_permissions` (
  perm_id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  perm_desc VARCHAR(50) NOT NULL,

  PRIMARY KEY (perm_id)
);

CREATE TABLE `m_role_perm` (
  role_id INTEGER UNSIGNED NOT NULL,
  perm_id INTEGER UNSIGNED NOT NULL,

  FOREIGN KEY (role_id) REFERENCES m_roles(role_id),
  FOREIGN KEY (perm_id) REFERENCES m_permissions(perm_id)
);

CREATE TABLE `member_role` (
  member_id INTEGER UNSIGNED NOT NULL,
  role_id INTEGER UNSIGNED NOT NULL,

  FOREIGN KEY (member_id) REFERENCES members(member_id),
  FOREIGN KEY (role_id) REFERENCES m_roles(role_id)
);
