            2 Connect
		    2 Query	select id from ws_request where status = 'QUEUED' order by id limit 1 for update
		    2 Query	update ws_request set status = 'RUNNING' where id = NULL
            2 Connect
