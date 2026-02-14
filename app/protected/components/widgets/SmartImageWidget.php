<?php
class SmartImageWidget extends CWidget
{
    public $src;
    public $alt;
    public $options = [];
    
    public function run()
    {
        Yii::import('application.components.UniversalAltHelper');
        
        if (empty($this->alt)) {
            $this->alt = UniversalAltHelper::generateAlt($this->src);
        }
        
        $this->options['alt'] = $this->alt;
        
        echo CHtml::image($this->src, $this->alt, $this->options);
    }
}