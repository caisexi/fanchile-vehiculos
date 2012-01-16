CREATE TABLE [tbl_group] (
	[id] INTEGER  NOT NULL PRIMARY KEY AUTOINCREMENT,
	[name] VARCHAR(120)  NULL
);

CREATE TABLE [tbl_member] (
	[id] INTEGER  PRIMARY KEY AUTOINCREMENT NOT NULL,
	[groupid] INTEGER DEFAULT 0 REFERENCES tbl_group(id) ON DELETE CASCADE,
	[firstname] VARCHAR(40)  NULL,
	[lastname] VARCHAR(40)  NULL,
	[membersince] INTEGER  NULL,
	[position] INTEGER
);