<?php

define("T_PUNCTUATION", 0);
define("T_SPACE",       1);
define("T_KEYWORD",    11);
define("T_FUNCTION",   12);
define("T_OPERATOR",   13);
define("T_COMMENT",    14);
define("T_NUMBER",    101);
define("T_STRING",    102);
#define("T_EOL",       998);
define("T_UNKNOWN",   999);

$state_to_char = array();
$state_to_char[T_PUNCTUATION] = 'P';
$state_to_char[T_SPACE]       = ' ';
$state_to_char[T_KEYWORD]     = 'K';
$state_to_char[T_FUNCTION]    = 'F';
$state_to_char[T_OPERATOR]    = 'O';
$state_to_char[T_COMMENT]     = 'C';
$state_to_char[T_NUMBER]      = 'N';
$state_to_char[T_STRING]      = 'S';
#$state_to_char[T_EOL]         = 'E';
$state_to_char[T_UNKNOWN]     = 'U';

$keywords = array(
    "ACCESSIBLE",
    "ACTION",
    "ADD",
    "AFTER",
    "AGAINST",
    "AGGREGATE",
    "ALL",
    "ALGORITHM",
    "ALTER",
    "ANALYZE",
    "AND",
    "ANY",
    "AS",
    "ASC",
    "ASCII",
    "ASENSITIVE",
    "AT",
    "AUTHORS",
    "AUTO_INCREMENT",
    "AUTOEXTEND_SIZE",
    "AVG",
    "AVG_ROW_LENGTH",
    "BACKUP",
    "BEFORE",
    "BEGIN",
    "BETWEEN",
    "BIGINT",
    "BINARY",
    "BINLOG",
    "BIT",
    "BLOB",
    "BLOCK",
    "BOOL",
    "BOOLEAN",
    "BOTH",
    "BTREE",
    "BY",
    "BYTE",
    "CACHE",
    "CALL",
    "CASCADE",
    "CASCADED",
    "CASE",
    "CATALOG_NAME",
    "CHAIN",
    "CHANGE",
    "CHANGED",
    "CHAR",
    "CHARACTER",
    "CHARSET",
    "CHECK",
    "CHECKSUM",
    "CIPHER",
    "CLASS_ORIGIN",
    "CLIENT",
    "CLIENT_STATISTICS",
    "CLOSE",
    "COALESCE",
    "CODE",
    "COLLATE",
    "COLLATION",
    "COLUMN",
    "COLUMN_NAME",
    "COLUMNS",
    "COMMENT",
    "COMMIT",
    "COMMITTED",
    "COMPACT",
    "COMPLETION",
    "COMPRESSED",
    "CONCURRENT",
    "CONDITION",
    "CONNECTION",
    "CONSISTENT",
    "CONSTRAINT",
    "CONSTRAINT_CATALOG",
    "CONSTRAINT_NAME",
    "CONSTRAINT_SCHEMA",
    "CONTAINS",
    "CONTEXT",
    "CONTINUE",
    "CONTRIBUTORS",
    "CONVERT",
    "CPU",
    "CREATE",
    "CROSS",
    "CUBE",
    "CURRENT_DATE",
    "CURRENT_TIME",
    "CURRENT_TIMESTAMP",
    "CURRENT_USER",
    "CURSOR",
    "CURSOR_NAME",
    "DATA",
    "DATABASE",
    "DATABASES",
    "DATAFILE",
    "DATE",
    "DATETIME",
    "DAY",
    "DAY_HOUR",
    "DAY_MICROSECOND",
    "DAY_MINUTE",
    "DAY_SECOND",
    "DEALLOCATE",
    "DEC",
    "DECIMAL",
    "DECLARE",
    "DEFAULT",
    "DEFINER",
    "DELAYED",
    "DELAY_KEY_WRITE",
    "DELETE",
    "DESC",
    "DESCRIBE",
    "DES_KEY_FILE",
    "DETERMINISTIC",
    "DIRECTORY",
    "DISABLE",
    "DISCARD",
    "DISK",
    "DISTINCT",
    "DISTINCTROW",
    "DIV",
    "DO",
    "DOUBLE",
    "DROP",
    "DUAL",
    "DUMPFILE",
    "DUPLICATE",
    "DYNAMIC",
    "EACH",
    "ELSE",
    "ELSEIF",
    "ENABLE",
    "ENCLOSED",
    "END",
    "ENDS",
    "ENGINE",
    "ENGINES",
    "ENGINE_CONTROL",
    "ENUM",
    "ERROR",
    "ERRORS",
    "ESCAPE",
    "ESCAPED",
    "EVENT",
    "EVENTS",
    "EVERY",
    "EXECUTE",
    "EXISTS",
    "EXIT",
    "EXPANSION",
    "EXPLAIN",
    "EXTENDED",
    "EXTENT_SIZE",
    "FALSE",
    "FAST",
    "FAULTS",
    "FETCH",
    "FIELDS",
    "FILE",
    "FIRST",
    "FIXED",
    "FLOAT",
    "FLOAT4",
    "FLOAT8",
    "FLUSH",
    "FOR",
    "FORCE",
    "FOREIGN",
    "FOUND",
    "FROM",
    "FULL",
    "FULLTEXT",
    "FUNCTION",
    "GENERAL",
    "GEOMETRY",
    "GEOMETRYCOLLECTION",
    "GET_FORMAT",
    "GLOBAL",
    "GRANT",
    "GRANTS",
    "GROUP",
    "HANDLER",
    "HASH",
    "HAVING",
    "HELP",
    "HIGH_PRIORITY",
    "HOST",
    "HOSTS",
    "HOUR",
    "HOUR_MICROSECOND",
    "HOUR_MINUTE",
    "HOUR_SECOND",
    "IDENTIFIED",
    "IF",
    "IGNORE",
    "IGNORE_SERVER_IDS",
    "IMPORT",
    "IN",
    "INDEX",
    "INDEXES",
    "INDEX_STATISTICS",
    "INFILE",
    "INITIAL_SIZE",
    "INNER",
    "INOUT",
    "INSENSITIVE",
    "INSERT",
    "INSERT_METHOD",
    "INSTALL",
    "INT",
    "INT1",
    "INT2",
    "INT3",
    "INT4",
    "INT8",
    "INTEGER",
    "INTERVAL",
    "INTO",
    "IO",
    "IO_THREAD",
    "IPC",
    "IS",
    "ISOLATION",
    "ISSUER",
    "ITERATE",
    "INVOKER",
    "JOIN",
    "KEY",
    "KEYS",
    "KEY_BLOCK_SIZE",
    "KILL",
    "LANGUAGE",
    "LAST",
    "LEADING",
    "LEAVE",
    "LEAVES",
    "LEFT",
    "LESS",
    "LEVEL",
    "LIKE",
    "LIMIT",
    "LINEAR",
    "LINES",
    "LINESTRING",
    "LIST",
    "LOAD",
    "LOCAL",
    "LOCALTIME",
    "LOCALTIMESTAMP",
    "LOCK",
    "LOCKS",
    "LOGFILE",
    "LOGGING",
    "LOGS",
    "LONG",
    "LONGBLOB",
    "LONGTEXT",
    "LOOP",
    "LOW_PRIORITY",
    "MASTER",
    "MASTER_CONNECT_RETRY",
    "MASTER_HOST",
    "MASTER_LOG_FILE",
    "MASTER_LOG_POS",
    "MASTER_PASSWORD",
    "MASTER_PORT",
    "MASTER_SERVER_ID",
    "MASTER_SSL",
    "MASTER_SSL_CA",
    "MASTER_SSL_CAPATH",
    "MASTER_SSL_CERT",
    "MASTER_SSL_CIPHER",
    "MASTER_SSL_KEY",
    "MASTER_SSL_VERIFY_SERVER_CERT",
    "MASTER_USER",
    "MASTER_HEARTBEAT_PERIOD",
    "MATCH",
    "MAX_CONNECTIONS_PER_HOUR",
    "MAX_QUERIES_PER_HOUR",
    "MAX_STATEMENT_TIME",
    "MAX_ROWS",
    "MAX_SIZE",
    "MAX_UPDATES_PER_HOUR",
    "MAX_USER_CONNECTIONS",
    "MAXVALUE",
    "MEDIUM",
    "MEDIUMBLOB",
    "MEDIUMINT",
    "MEDIUMTEXT",
    "MEMORY",
    "MERGE",
    "MESSAGE_TEXT",
    "MICROSECOND",
    "MIDDLEINT",
    "MIGRATE",
    "MINUTE",
    "MINUTE_MICROSECOND",
    "MINUTE_SECOND",
    "MIN_PAGES",
    "MIN_ROWS",
    "MOD",
    "MODE",
    "MODIFIES",
    "MODIFY",
    "MONTH",
    "MULTILINESTRING",
    "MULTIPOINT",
    "MULTIPOLYGON",
    "MUTEX",
    "MYSQL_ERRNO",
    "NAME",
    "NAMES",
    "NATIONAL",
    "NATURAL",
    "NDB",
    "NDBCLUSTER",
    "NCHAR",
    "NEW",
    "NEXT",
    "NO",
    "NO_WAIT",
    "NODEGROUP",
    "NONE",
    "NOT",
    "NO_WRITE_TO_BINLOG",
    "NULL",
    "NUMERIC",
    "NVARCHAR",
    "OFFSET",
    "OLD_PASSWORD",
    "ON",
    "ONE",
    "ONE_SHOT",
    "OPEN",
    "OPTIMIZE",
    "OPTIONS",
    "OPTION",
    "OPTIONALLY",
    "OR",
    "ORDER",
    "OUT",
    "OUTER",
    "OUTFILE",
    "OWNER",
    "PACK_KEYS",
    "PARSER",
    "PAGE",
    "PARTIAL",
    "PARTITION",
    "PARTITIONING",
    "PARTITIONS",
    "PASSWORD",
    "PHASE",
    "PLUGIN",
    "PLUGINS",
    "POINT",
    "POLYGON",
    "PORT",
    "PRECISION",
    "PREPARE",
    "PRESERVE",
    "PREV",
    "PRIMARY",
    "PRIVILEGES",
    "PROCEDURE",
    "PROCESS", 
    "PROCESSLIST",
    "PROFILE",
    "PROFILES",
    "PROXY",
    "PURGE",
    "QUARTER",
    "QUERY",
    "QUICK",
    "RANGE",
    "READ",
    "READ_ONLY",
    "READ_WRITE",
    "READS",
    "REAL",
    "REBUILD",
    "RECOVER",
    "REDO_BUFFER_SIZE",
    "REDOFILE",
    "REDUNDANT",
    "REFERENCES",
    "REGEXP",
    "RELAY",
    "RELAYLOG",
    "RELAY_LOG_FILE",
    "RELAY_LOG_POS",
    "RELAY_THREAD",
    "RELEASE",
    "RELOAD",
    "REMOVE",
    "RENAME",
    "REORGANIZE",
    "REPAIR",
    "REPEATABLE",
    "REPLACE",
    "REPLICATION",
    "REPEAT",
    "REQUIRE",
    "RESET",
    "RESIGNAL",
    "RESTORE",
    "RESTRICT",
    "RESUME",
    "RETURN",
    "RETURNS",
    "REVOKE",
    "RIGHT",
    "RLIKE",
    "ROLLBACK",
    "ROLLUP",
    "ROUTINE",
    "ROW",
    "ROWS",
    "ROW_FORMAT",
    "RTREE",
    "SAVEPOINT",
    "SCHEDULE",
    "SCHEMA",
    "SCHEMA_NAME",
    "SCHEMAS",
    "SECOND",
    "SECOND_MICROSECOND",
    "SECURITY",
    "SELECT",
    "SENSITIVE",
    "SEPARATOR",
    "SERIAL",
    "SERIALIZABLE",
    "SESSION",
    "SERVER",
    "SET",
    "SHARE",
    "SHOW",
    "SHUTDOWN",
    "SIGNAL",
    "SIGNED",
    "SIMPLE",
    "SLAVE",
    "SLOW",
    "SNAPSHOT",
    "SMALLINT",
    "SOCKET",
    "SOME",
    "SONAME",
    "SOUNDS",
    "SOURCE",
    "SPATIAL",
    "SPECIFIC",
    "SQL",
    "SQLEXCEPTION",
    "SQLSTATE",
    "SQLWARNING",
    "SQL_BIG_RESULT",
    "SQL_BUFFER_RESULT",
    "SQL_CACHE",
    "SQL_CALC_FOUND_ROWS",
    "SQL_NO_CACHE",
    "SQL_SMALL_RESULT",
    "SQL_THREAD",
    "SQL_TSI_SECOND",
    "SQL_TSI_MINUTE",
    "SQL_TSI_HOUR",
    "SQL_TSI_DAY",
    "SQL_TSI_WEEK",
    "SQL_TSI_MONTH",
    "SQL_TSI_QUARTER",
    "SQL_TSI_YEAR",
    "SSL",
    "START",
    "STARTING",
    "STARTS",
    "STATUS",
    "STOP",
    "STORAGE",
    "STRAIGHT_JOIN",
    "STRING",
    "SUBCLASS_ORIGIN",
    "SUBJECT",
    "SUBPARTITION",
    "SUBPARTITIONS",
    "SUPER",
    "SUSPEND",
    "SWAPS",
    "SWITCHES",
    "TABLE",
    "TABLE_NAME",
    "TABLES",
    "TABLESPACE",
    "TABLE_CHECKSUM",
    "TABLE_STATISTICS",
    "TEMPORARY",
    "TEMPTABLE",
    "TERMINATED",
    "TEXT",
    "THAN",
    "THEN",
    "THREAD_STATISTICS",
    "TIME",
    "TIMESTAMP",
    "TIMESTAMPADD",
    "TIMESTAMPDIFF",
    "TINYBLOB",
    "TINYINT",
    "TINYTEXT",
    "TO",
    "TRAILING",
    "TRANSACTION",
    "TRIGGER",
    "TRIGGERS",
    "TRUE",
    "TRUNCATE",
    "TYPE",
    "TYPES",
    "UNCOMMITTED",
    "UNDEFINED",
    "UNDO_BUFFER_SIZE",
    "UNDOFILE",
    "UNDO",
    "UNICODE",
    "UNION",
    "UNIQUE",
    "UNKNOWN",
    "UNLOCK",
    "UNINSTALL",
    "UNSIGNED",
    "UNTIL",
    "UPDATE",
    "UPGRADE",
    "USAGE",
    "USE",
    "USER",
    "USER_RESOURCES",
    "USER_STATISTICS",
    "USE_FRM",
    "USING",
    "UTC_DATE",
    "UTC_EXTRACT",
    "UTC_TIME",
    "UTC_TIMESTAMP",
    "VALUE",
    "VALUES",
    "VARBINARY",
    "VARCHAR",
    "VARCHARACTER",
    "VARIABLES",
    "VARYING",
    "WAIT",
    "WARNINGS",
    "WEEK",
    "WHEN",
    "WHERE",
    "WHILE",
    "VIEW",
    "WITH",
    "WORK",
    "WRAPPER",
    "WRITE",
    "X509",
    "XOR",
    "XA",
    "XML",
    "YEAR",
    "YEAR_MONTH",
    "YEAR_MONTH_DAY",
    "YEAR_MONTH_DAY_HOUR",
    "ZEROFILL",
);

$functions = array(
    "ADDDATE",
    "BIT_AND",
    "BIT_OR",
    "BIT_XOR",
    "CAST",
    "COUNT",
    "CURDATE",
    "CURTIME",
    "DATE_ADD",
    "DATE_SUB",
    "EXTRACT",
    "GROUP_CONCAT",
    "MAX",
    "MID",
    "MIN",
    "NOW",
    "POSITION",
    "SESSION_USER",
    "STD",
    "STDDEV",
    "STDDEV_POP",
    "STDDEV_SAMP",
    "SUBDATE",
    "SUBSTR",
    "SUBSTRING",
    "SUM",
    "SYSDATE",
    "SYSTEM_USER",
    "TRIM",
    "VARIANCE",
    "VAR_POP",
    "VAR_SAMP"
);

$operators = array(
    # added by our own.
    "(",
    ")",
    ",",
    "+",
    "-",
    "*",
    "/",
    # below are from mysql lex.h 
    "&&",
    "<",
    "<=",
    "<>",
    "!=",
    "=",
    ">",
    ">=",
    "<<",
    ">>",
    "<=>",
    "||"
);



