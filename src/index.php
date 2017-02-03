<?php
error_reporting(0);
require_once dirname(__FILE__) . "/keywords.php";
require_once dirname(__FILE__) . "/tokenizer.php";

class Squirrel {
    function lexing($sql) {

        global $state_to_char, $functions, $operators, $keywords;
	$start = microtime(true);

	$tokens =  PHPSQLLexer::Tokenize($sql);
	
	$finish = microtime(true);
	$total = $finish - $start;
	if($total > "0.1") {
		#echo $total;	
		#print "\n";
		//echo $sql;
		//print "\n";
	}

	$states = array();
        $state_sig = '';
        $query_sig = '';

        foreach($tokens as $idx => $token){
            $utoken = strtoupper($token);

            if( is_numeric($token)) {
                array_push($states, T_NUMBER);
                $state_sig .= $state_to_char[T_NUMBER];
                $query_sig .= '[N]';
            } elseif ( $token == ' ' ) {
                array_push($states, T_SPACE);
                $state_sig .= $state_to_char[T_SPACE];
                $query_sig .= ' ';
            } elseif ( $token[0] == '"' || $token[0] == "'" || $token[0] == '`' ) {
                array_push($states, T_STRING);
                $state_sig .= $state_to_char[T_STRING];
                $query_sig .= '[S]';
            } elseif (( $token[0] == '/' && $token[1] == "*" ) or ( $token[0] == '-' && $token[1] == "-" )) {
                /* TODO - if there is an ! in comment, it is something suspicious. */
                array_push($states, T_COMMENT);
                $state_sig .= $state_to_char[T_COMMENT];
                $query_sig .= '[C]';
            } elseif ( in_array($utoken, $operators)) {
                array_push($states, T_OPERATOR);
                $state_sig .= $state_to_char[T_OPERATOR];
                $query_sig .= $token;
            } elseif ( in_array($utoken, $functions)) {
                array_push($states, T_FUNCTION);
                $state_sig .= $state_to_char[T_FUNCTION];
                $query_sig .= $token;
            } elseif ( in_array($utoken, $keywords)) {
                array_push($states, T_KEYWORD);
                $state_sig .= $state_to_char[T_KEYWORD];
                $query_sig .= $token;
            } else {
                array_push($states, T_UNKNOWN);
                $state_sig .= $state_to_char[T_UNKNOWN];
                $query_sig .= '[U:'.$token.']';
            }
        }
	return $state_sig;
    }
}

/*
* Main function 
*
*/
$squirrel = new Squirrel();
$total_time = 0;
$i = 0;
$c = 0;
$line = '';
$type = '';
$stack = array();
while($f = fgets(STDIN)){

    $f = trim($f);
    
    /* handle multi lines */
    $pcs = preg_split("/[\t]/", $f, 3);
    if(preg_match('/^[0-9]{6} [0-9:]{8}$/', $pcs[0])) {
        array_shift($pcs);
    }

    if(preg_match('/^\s*[0-9]+/', $pcs[0])) {

        /* this is a new sql query */
        $type = array_shift($pcs);

        /* handle the previous line. */
        if( !empty($line)) {
            $c++;
            $line = trim($line);
            $start_time = microtime(TRUE);
            $sig = $squirrel->lexing($line);
	    // remove spaces ..
	    $result = preg_replace('/\s+/', '', $sig);
	    // split strings
	    $data = str_split($result);
	    // remove duplicates
	    $data = implode('',$data);
	    print $data;
	    print "\n";
            $end_time = microtime(TRUE);
            $total_time += ($end_time - $start_time);
            $line = '';
	    $result;
        }
    } 
    if( preg_match('/Query/', $type) and preg_match('/[^\s]/', $pcs[0])) {
        $line .= $pcs[0] . "\n";
    }
}
