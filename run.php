<?php
require('functions.php');

echo benchsh('1gb_la_vultr', 'thebench.log', 1);//for MYSQL INSERT
//echo json_encode(benchsh('server_name', 'thebench.log', 2));//for JSON output

//echo nench('512mb_la', 'thenench.log', 1);//for MYSQL INSERT
//echo json_encode(nench('512mb_la', 'thenench.log', 2));//for JSON output
