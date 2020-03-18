<?php

class anagrams{

    protected $varText1 , $varText2;

    public function __construct($varText1 ='',$varText2 =''){
        $this->varText1 = $varText1;
        $this->varText2 = $varText2;
    }

    public function check_if_variables_have_the_same_chars() {
        // Split the two text valibles into array
        $arrValues1 = str_split(trim(strtolower($this->varText1)));
        $arrValues2 = str_split(trim(strtolower($this->varText2)));
    
        // sorting Arrays
        sort($arrValues1);
        sort($arrValues2);
	
        // implode Array variables to be text variables with the same values
        $varText1 = implode('', $arrValues1);
        $varText2 = implode('', $arrValues2);
        
		if ($varText1 == $varText2): return "Two Text Variables Have The Same Characters"; else: return "Not The Same"; endif;
    }
}

$compareTexts = new anagrams('xyz','zyx');
echo $compareTexts->check_if_variables_have_the_same_chars();