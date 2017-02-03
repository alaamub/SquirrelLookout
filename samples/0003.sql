            2 Connect
		 1831 Query	CREATE TABLE IF NOT EXISTS `ferret_db`.`ws_scantype` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `ws_request_id` INT NOT NULL,
  `scan_type_id` INT NOT NULL,
  `plugin_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_ws_scantype_ws_request1`
    FOREIGN KEY (`ws_request_id`)
    REFERENCES `ferret_db`.`ws_request` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ws_scantype_plugin1`
    FOREIGN KEY (`plugin_id`)
    REFERENCES `ferret_db`.`plugin` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ws_scantype_scan_type1`
    FOREIGN KEY (`scan_type_id`)
    REFERENCES `ferret_db`.`scan_type` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
		 1831 Query	UPDATE ferret_config SET key_value=16 WHERE key_name='VERSION'
		 1831 Query	commit
		 1831 Query	set autocommit=1
		 1831 Quit	
140417 20:58:32	 1832 Connect	vaultscan@ferret-dev2.paranoids.corp.bf1.yahoo.com on ferret_db
		 1832 Query	set names utf8
		 1825 Quit	
		 1832 Query	set autocommit=0
		 1832 Query	select id from ws_request where status = 'QUEUED' order by id limit 1 for update
		 1832 Query	update ws_request set status = 'RUNNING' where id = NULL
		 1832 Query	commit
		 1832 Query	set autocommit=1
		 1832 Query	select a.*, b.path, c.scan_type_name from ws_request a, repo b, scan_type c where a.id = NULL and a.repo_id = b.id and a.scan_type_id = c.id
140417 20:58:36	 1092 Query	SELECT w.*,r.id AS rid,r.path AS path FROM ws_request w, repo r WHERE w.status in ('COMPLETE', 'ABORTED') AND w.repo_id = r.id order by id
140417 20:58:37	 1832 Quit	
		 1833 Connect	vaultscan@ferret-dev2.paranoids.corp.bf1.yahoo.com on ferret_db
		 1833 Query	set names utf8
		 1833 Query	set autocommit=0
            2 Connect
