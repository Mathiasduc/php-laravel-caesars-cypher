<?php 

/**
 * Encrypt or Decrypt message based on offset
 *
 * @param string $msg to encrypt 
 * @param int $offset how much offset to apply
 * @return string: crypted message
 **/
function caesarCrypting($msg, $offset)
{
	$alphaLower = range('a','z');
	$alphaUpper = range('A','Z');
	$msgLen = strLen($msg);
	$i = 0;
	while ($i < $msgLen){
		if(in_array($msg[$i], $alphaLower)){
			$asciiValue = ord($msg[$i]) + $offset;		
			if($asciiValue > ord('z')){
				$asciiValue = $asciiValue - ord('z') + 96;
			}elseif($asciiValue < ord('a')){
				$asciiValue = $asciiValue + ord('z') - 96;
			}
			$msg[$i] = chr($asciiValue);
		}elseif(in_array($msg[$i], $alphaUpper)){
			$asciiValue = ord($msg[$i]) + $offset;
			if($asciiValue > ord('Z')){
				$asciiValue = $asciiValue - ord('Z') + 64;
			}elseif($asciiValue < ord('A')){
				$asciiValue = $asciiValue + ord('Z') - 64;
			}
			$msg[$i] = chr($asciiValue);
		}
		$i++;
	}
	return $msg;
}

var_dump('-----> le resultat est: '.caesarCrypting('z',1), "z offset de 1 : devrait etre 'a'");
var_dump('--->'.caesarCrypting('salut',20));
var_dump('--->'.caesarCrypting('trux',4));
var_dump('--->'.caesarCrypting('SaLut',20));
var_dump('--->'.caesarCrypting('mufon',-20));
var_dump('--->'.caesarCrypting('MuFOn',-20));
var_dump('--->'.caesarCrypting('MuFOn ." 325',-20). '----> devrait etre SaLUt ." 325');
?>	