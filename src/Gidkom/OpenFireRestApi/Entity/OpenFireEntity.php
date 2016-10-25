<?php
    
namespace Gidkom\OpenFireRestApi\Entity;

abstract class OpenFireEntity implements \JsonSerializable
{
    const TYPE             = 0;
    const ISREQUIRED       = 1;
    const ISARRAY          = 2;
    const ARRAYELEMNAME    = 3;
    
    const TYPEBOOLEAN         = 0;
    const TYPEINTEGER         = 1;
    const TYPEFLOAT           = 2;
    const TYPESTRING          = 3;
    const TYPEDATE            = 4;
    
    private $data = array();
    
    private static function convertPhpValueToOpenFireXml($type, $value)
    {
             if( $type == self::TYPEBOOLEAN)     { return ($value ? '1' : '0'); } 
        else if( $type == self::TYPEINTEGER)     { return $value; } 
        else if( $type == self::TYPEFLOAT)       { return $value; } 
        else if( $type == self::TYPESTRING)      { return $value; } 
        else if( $type == self::TYPEDATE)        { return $value; } 
    }
    
    private static function convertOpenFireXmlValueToPhp($type, $value_str)
    {
             if( $type == self::TYPEBOOLEAN)     { return ($value_str ? true : false); } 
        else if( $type == self::TYPEINTEGER)     { return (int)$value_str; } 
        else if( $type == self::TYPEFLOAT)       { return (float)$value_str; } 
        else if( $type == self::TYPESTRING)      { return $value_str; } 
        else if( $type == self::TYPEDATE)        { return new \DateTime($value_str); } 
    }
    
    private static function checkValueType($type, $value)
    {
        if( ($type == self::TYPEBOOLEAN && !  is_bool($value)) ||
            ($type == self::TYPEINTEGER && !   is_int($value)) ||
            ($type == self::TYPEFLOAT   && ! is_float($value)) ||
            ($type == self::TYPESTRING  && !is_string($value)) ||
            ($type == self::TYPEDATE    && !     is_a($value, 'DateTimeInterface') ) ) {
            throw new \Exception("Value type mismatch");
        }
    }
    
    public function __construct()
    {
        foreach( static::$properties as $name => $infos  ) {
            $type        = $infos[self::TYPE];
            $isArray     = $infos[self::ISARRAY];
            $isRequired  = $infos[self::ISREQUIRED];
                
            $value = NULL;
            if($isRequired) {
                     if($isArray)                        { $value = array(); } 
                else if( $type == self::TYPEBOOLEAN)     { $value = false; } 
                else if( $type == self::TYPEINTEGER)     { $value = 0; } 
                else if( $type == self::TYPEFLOAT)       { $value = 0.; } 
                else if( $type == self::TYPESTRING)      { $value = ''; } 
                else if( $type == self::TYPEDATE)        { $value = false; } 
            }
            $this->data[$name] = $value;
        }
    }
     
    public function __set($name, $value)
    {
        if( !array_key_exists($name, static::$properties) ) {
            throw new \Exception("Wrong preperty name");
        }
        
        $infos       = static::$properties[$name];
        $type        = $infos[self::TYPE];
        $isArray     = $infos[self::ISARRAY];
        $isRequired  = $infos[self::ISREQUIRED];
        
        if( $isRequired && is_null($value) ) {
            throw new \Exception("This value is not optional and can not be reset to default value");
        }
        if($isArray) {
            if(! is_array($value) ) {
                throw new \Exception("Value must be an array");
            }
            foreach($value as $item) {
                self::checkValueType($type, $item);
            }
        } else {
            self::checkValueType($type, $value);
        }
        
        $this->data[$name] = $value;
    }
    
    public function __get($name)
    {
        if( !array_key_exists($name, static::$properties) ) {
            throw new \Exception("Wrong property name");
        }
        return $this->data[$name];
    }
    
    public function jsonSerialize() {
        $result = array();
        foreach( static::$properties as $name => $infos  ) {
            $result[$name] = $this->__get($name);
        }
        return $result;
    }
    
    public function openfireGetEntityName()
    {
        return static::$name;
    }
    
    public function openfireSerialize( $xmlElement )
    {
        $document = $xmlElement->ownerDocument;
        
        foreach( static::$properties as $name => $infos  ) {
            $type        = $infos[self::TYPE];
            $isArray     = $infos[self::ISARRAY];
            $isRequired  = $infos[self::ISREQUIRED];
            
            $value = NULL;
            if( array_key_exists($name, $this->data) ) {
                $value = $this->data[$name];
            }
             
            if( $value === NULL ) {
                if($isRequired) {
                    throw new \Exception("Required property has not been filled");
                } else {
                    continue;
                }
            }
            if($isArray) {
                $newArray = $document->createElement( $name );
                $xmlElement->appendChild($newArray);
                foreach($value as $item) {
                    $item_str = self::convertPhpValueToOpenFireXml( $type, $item );
                    $newItem = $document->createElement( $infos[self::ARRAYELEMNAME], $item_str );
                    $newArray->appendChild($newItem);
                    
                }
            } else {
                $value_str = self::convertPhpValueToOpenFireXml( $type, $value );
                $newProperty = $document->createElement( $name, $value_str );
                $xmlElement->appendChild($newProperty);
            }
            
        }
    }
    
    public function openfireDeserialize( $xmlElement )
    {
        // Reset the object to default values
        foreach( static::$properties as $name => $infos  ) {
            $this->data[$name] = NULL;
        }
        
        // Load from XML
        foreach( $xmlElement->childNodes as $propertyNode  ) {
            
            $name = $propertyNode->nodeName;
            $value_str = $propertyNode->nodeValue;
            
            if( !array_key_exists($name, static::$properties) ) {
                continue;
            }
           
            $infos       = static::$properties[$name];
            $type        = $infos[self::TYPE];
            $isArray     = $infos[self::ISARRAY];
            $isRequired  = $infos[self::ISREQUIRED];
             
            $value = NULL;
            if($isArray) { 
                $value = array(); 
                foreach( $propertyNode->childNodes as $itemNode ) {
                    $item_str = $itemNode->nodeValue;
                    $value[] = self::convertOpenFireXmlValueToPhp($type, $item_str);
                }
            } else {
                $value = self::convertOpenFireXmlValueToPhp($type, $value_str);
            }
            
            $this->data[$name] = $value;
        }
    }
}