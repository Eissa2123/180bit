<?php

    class QRCode {

        public $IN;
        public $OUT;
            
        public function __construct(){
            
        }

        public function Load($Datas){	
            $this->IN = array();
            if(is_array($Datas) and count($Datas) > 0){
                foreach($Datas as $key => $value){
                    $this->IN[] = array(
                        'Tag'       => $key,
                        'Length'    => strlen($value),
                        'Value'     => $value
                    );
                }
            }
            return $this;
        }

        private function Encoding($value){
            $hex = pack("H*", sprintf("%02X", $value));
            D($hex);
            return $hex;
        }

        function ToTLV($tag, $value, $length) {
            $value = (string) $value;
            return $this->Encoding($tag).$this->Encoding($length).$value;
        }

        public function Crypt(){
            $this->OUT = "";
            if(is_array($this->IN) and count($this->IN) > 0){
                foreach($this->IN as $item){
                    
                    $Tag = $item['Tag'];
                    $Length = $item['Length'];
                    $Value = $item['Value'];

                    $TLV = $this->ToTLV($Tag, $Length, $Value);

                    $this->OUT .= $TLV;
                }
            }
            return $this;
        }
        
        public function Decrypt(){
            return $this;
        }
        
        public function Render(){
            D($this->IN);
            
            D($this->OUT);

            echo base64_encode($this->OUT);
        }

        function getLength($value) {
            return strlen($value);
        }
    
        function toHex($value) {
            return pack("H*", sprintf("%02X", $value));
        }
    
        function toString($__tag, $__value, $__length) {
            $value = (string) $__value;
            return $this->toHex($__tag) . $this->toHex($__length) . $value;
        }
    
        function getTLV($dataToEncode) {
            $__TLVS = '';
            
            for ($i = 0; $i < count($dataToEncode); $i++) {
                $__tag = $dataToEncode[$i][0];
                $__value = $dataToEncode[$i][1];
                $__length = $this->getLength($__value);
                $__TLVS .= $this->toString($__tag, $__value, $__length);
            }
    
            return base64_encode($__TLVS);
        }
        
    }
    
?>