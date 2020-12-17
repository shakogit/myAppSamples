<?php
/*
    *** Define class : Address
*/
class Address
{
    // >> set class (Address) members -------|
    
    // create | stradd_1
    public $stradd_1;
    // create | stradd_2 >> (if exists)
    public $stradd_2;
    // create | city 
    public $cityName;
    // create | subdivision
    public $subdivision;
    // cteare | postal_code
    public $postal_code;
    // create | country
    public $countryName;
    
    // >> set class (Address) private members
    
    // create | card
    protected $_cardNumber;
    // create | Id
    protected $_id;
    // create | mobile
    private $_mobileNumber;
    
    //end of members ----------------------|
    
    /*
        *** Define Magic Methods
    */
    
    // >> set Magic methods ------------------|
    
    // create method __construct
    public function __construct($data = array())
    {
        // ensure that the address can be populated
        if(!is_array($data))
        {
            trigger_error('Unable to construct address with -> ' . get_class($name));
        }
        // if there is at least one Value populate
        if(count($data) > 0)
        {
            foreach($data as $name => $value)
            {
                // add spacial keys for protected properties
                if(in_array($name, array(
                    'cardName','id','mobileNumber',
                )))
                {
                    $name = '_' . $name;
                }
                $this->$name = $value;
            }
        }
    }
    // create method __set()
    public function __set($name , $value)
    {
        $this->{$name} = $value;
    }
    
    // create method __get()
    public function __get($name)
    {
        $this->name = $name;
    }
    // create method __toString()
    public function __toString()
    {
        return $this->display();
    }
    // end of magic methods ---------------|
    
    
    /*
        *** Define method : display()
    */
    
    // >> set method display --------------|
    
    // create | display()
    function display()
    {
        $output = '';
        // set public members
        $output .= $this->stradd_1 .'<br/>';
        // set addrese 2 if exists
        if($this->stradd_2)
        {
            $output .= $this->stradd_2;
        }
        $output .= '<br/>'. $this->cityName.' | '.$this->subdivision.' | '.$this->postal_code;
        $output .= '<br/>'.$this->countryName.'<br/>';
        // set private members
        $output .= $this->_cardNumber .'<br/>';
        $output .= $this->_id .'<br/>';
        $output .= $this->_mobileNumber .'<br/>';
        
        return $output;
    }
    //end of display() --------------------|
    
}

?>