<?php
class myerror
{
	function __construct()
	{		
		date_default_timezone_set('Europe/London');
		set_error_handler(array($this, 'myErrorHandler'));
	}

	function myErrorHandler($errno, $errstr, $errfile, $errline)
	{
	    if (!(error_reporting() & $errno))
	    {
	        return;
	    }
	    switch ($errno)
	    {
	    	 case E_ERROR:
		        $s = 'ERROR';		        
		        break;
		    case E_WARNING:
		        $s = 'WARNING';		        
		        break;
		    case E_USER_ERROR:
		        $s = 'ERROR';
		        break;
		    case E_USER_WARNING:
		        $s = 'WARNING';
		        break;
		    case E_USER_NOTICE:
		        $s = 'NOTICE';
		        break;
		    case E_USER_ERROR:
		    	$s = 'ERROR';
		    	break;
		    case E_USER_WARNING:
		    	$s = 'WARNING';
		    	break;
		    case E_STRICT:
		    	$s = 'NOT STRICT';
		    	break;
		    case E_RECOVERABLE_ERROR:
		    	$s = 'ERROR';
		    	break;		    
		    default:
		        $s = 'UNKNOWN ERROR TYPE';
		        break;
	    }
	    echo '<br /><strong>'.$s.' : </strong>'.[$errno].' '.$errstr.' on line '.$errline.' in file '.$errfile.'<br />';
	    $ls = date('H:i:s d:m:Y').' '.$s.' : '.[$errno].' '.$errstr.' on line '.$errline.' in file '.$errfile.PHP_EOL;
	    error_log($ls, 3, 'errors.log');	    
	    return true;
	}

	// function to test the error handling
	function scale_by_log($vect, $scale)
	{
	    if (!is_numeric($scale) || $scale <= 0)
	    {
	        trigger_error("log(x) for x <= 0 is undefined, you used: scale = $scale", E_USER_ERROR);
	    }

	    if (!is_array($vect))
	    {
	        trigger_error("Incorrect input vector, array of values expected", E_USER_WARNING);
	        return null;
	    }

	    $temp = array();
	    foreach($vect as $pos => $value)
	    {
	        if (!is_numeric($value))
	        {
	            trigger_error("Value at position $pos is not a number, using 0 (zero)", E_USER_NOTICE);
	            $value = 0;
	        }
	        $temp[$pos] = log($scale) * $value;
	    }
	    return $temp;
	}

	function __destruct()
	{
	
	}
}
?>