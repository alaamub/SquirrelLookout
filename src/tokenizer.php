<?php

class PHPSQLLexer {

    var $handle = null;
    
    // statements 
    public static $querysections = array('alter','create','drop', 
                                         'select', 'delete', 'insert', 
                                         'update', 'from', 'where', 
                                         'limit', 'order');
    // open parens, tokens, and brackets
    public static $startparens = array('{', '(');
    public static $endparens = array('}', ')');
    public static $tokens = array(',', ' ');
    private $query = '';

    // constructor (placeholder only)
    public function __construct() {
        
    }

    /**
     * Simple SQL Tokenizer
     *
     * @param string $sqlQuery
     * @return token array
     */
    public static function Tokenize($sqlQuery, $cleanWhitespace = true) {

        /**
         * Strip extra whitespace from the query
         */
        if ($cleanWhitespace === true) {
            $sqlQuery = ltrim(preg_replace('/[\\s]{2,}/', ' ', $sqlQuery));
        }

        /**
         * Regular expression parsing.
         * Inspired/Based on the Perl SQL::Tokenizer by Igor Sutton Lopes
         */
        
        // begin group
        $regex = '(';
        
        // inline comments
        $regex .= '(?:--|\\#)[\\ \\t\\S]*';
        
        // logical operators
        $regex .= '|(?:<>|<=>|>=|<=|==|=|!=|!|<<|>>|<|>|\\|\\||\\||&&|&|-';
        $regex .= '|\\+|\\*(?!\/)|\/(?!\\*)|\\%|~|\\^|\\?)';
        
        // empty quotes
        $regex .= '|[\\[\\]\\(\\),;`]|\\\'\\\'(?!\\\')|\\"\\"(?!\\"")';
        
        // string quotes
        $regex .= '|".*?(?:(?:""){1,}"';
        $regex .= '|(?<!["\\\\])"(?!")|\\\\"{2})';
        $regex .= '|\'.*?(?:(?:\'\'){1,}\'';
        $regex .= '|(?<![\'\\\\])\'(?!\')';
        $regex .= '|\\\\\'{2})';
        
        // c comments
        $regex .= '|\/\\*[\\ \\t\\n\\S]*?\\*\/';
        
        // wordds, column strings, params
        $regex .= '|(?:[\\w:@]+(?:\\.(?:\\w+|\\*)?)*)';
        $regex .= '|[\t\ ]+';
        
        // period and whitespace
        $regex .= '|[\.]'; 
        $regex .= '|[\s]'; 

        $regex .= ')'; # end group
        
        // perform a global match
        preg_match_all('/' . $regex . '/smx', $sqlQuery, $result);

        // return tokens
        return $result[0];
    }

    /**
     * Simple SQL Parser
     *
     * @return SqlParser Object
     */
    public static function ParseString($sqlQuery, $cleanWhitespace = true) {

        // instantiate if called statically
        if (!isset($this)) {
            $handle = new SqlParser();
        } else {
            $handle = $this;
        }

        // copy and tokenize the query
        $tokens = self::Tokenize($sqlQuery, $cleanWhitespace);
        $tokenCount = count($tokens);
        $queryParts = array();
        if (isset($tokens[0])===true) {
            $section = $tokens[0];
        }

        // parse the tokens
        for ($t = 0; $t < $tokenCount; $t++) {

            // if is paren
            if (in_array($tokens[$t], self::$startparens)) {

                // read until closed
                $sub = $handle->readsub($tokens, $t);
                $handle->query[$section].= $sub;
                
            } else {

                if (in_array(strtolower($tokens[$t]), self::$querysections) && !isset($handle->query[$tokens[$t]])) {
                    $section = strtolower($tokens[$t]);
                }

                // rebuild the query in sections
                if (!isset($handle->query[$section]))
                    $handle->query[$section] = '';
                $handle->query[$section] .= $tokens[$t];
            }
        }

        return $handle;
    }

    /**
     * Parses a sub-section of a query
     *
     * @param array $tokens
     * @param int $position
     * @return string section
     */
    private function readsub($tokens, &$position) {

        $sub = $tokens[$position];
        $tokenCount = count($tokens);
        $position++;
        while (!in_array($tokens[$position], self::$endparens) && $position < $tokenCount) {

            if (in_array($tokens[$position], self::$startparens)) {
                $sub.= $this->readsub($tokens, $position);
                $subs++;
            } else {
                $sub.= $tokens[$position];
            }
            $position++;
        }
        $sub.= $tokens[$position];
        return $sub;
    }
}

