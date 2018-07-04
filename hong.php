<?php
/*
 
*/

class OptionDTO
{                  /*{{{*/

    public $totalMoney;

    public $num;

    public $rangeStart;

    public $rangeEnd;

    public $builderStrategy;

    public $randFormatType; //Can_Left：不修数据,可以有剩余；No_Left：不能有剩余

    public static function create($totalMoney,$num,$rangeStart,$rangEnd,
        $builderStrategy,$randFormatType = 'No_Left')
    {/*{{{*/
        $self = new self();
        $self->num = $num;
        $self->rangeStart = $rangeStart;
        $self->rangeEnd = $rangEnd;
        $self->totalMoney = $totalMoney;
        $self->builderStrategy = $builderStrategy;
        $self->randFormatType = $randFormatType;
        return $self; 
    }/*}}}*/

}/*}}}*/

interface IBuilderStrategy
{/*{{{*/
    public function create();    
    public function setOption(OptionDTO $option); 
    public function isCanBuilder();
    public function fx($x);
}/*}}}*/

class EqualPackageStrategy implements IBuilderStrategy
{/*{{{*/
    public $oneMoney;

    public $num;

    public function __construct($option = null) 
    {
        if($option instanceof OptionDTO)
        {
            $this->setOption($option);
        }
    }

    public function setOption(OptionDTO $option)
    {
        $this->oneMoney = $option->rangeStart;
        $this->num = $option->num;
    }

    public function create() 
    {/*{{{*/

        $data = array();
        if(false == $this->isCanBuilder())
        {
            return $data;    
        }

        $data = array();
        if(false == is_int($this->num) || $this->num <= 0) 
        {
            return $data;    
        }
        for($i = 1;$i <= $this->num;$i++)
        {
            $data[$i] = $this->fx($i);
        }
        return $data;
    }/*}}}*/
    
    public function fx($x) 
    {/*{{{*/
        return $this->oneMoney; 
    }/*}}}*/

    public function isCanBuilder()
    {/*{{{*/
        if(false == is_int($this->num) || $this->num <= 0) 
        {
            return false;    
        }

        if(false ==  is_numeric($this->oneMoney) || $this->oneMoney <= 0)
        {
            return false;
        }

        if($this->oneMoney < 0.01)
        {
            return false;
        }
        
        return true;

    }/*}}}*/


}/*}}}*/

class RandTrianglePackageStrategy implements IBuilderStrategy
{/*{{{*/
    public $totalMoney;

    public $num;

    public $minMoney;

    public $maxMoney;

    public $formatType; 

    public $leftMoney;


    public function __construct($option = null) 
    {/*{{{*/
        if($option instanceof OptionDTO)
        {
            $this->setOption($option);
        }
    }/*}}}*/

    public function setOption(OptionDTO $option)
    {/*{{{*/
        $this->totalMoney = $option->totalMoney;
        $this->num = $option->num;
        $this->formatType = $option->randFormatType;
        $this->minMoney = $option->rangeStart;
        $this->maxMoney = $option->rangeEnd;
        $this->leftMoney = $this->totalMoney;
    }/*}}}*/

    public function create() 
    {/*{{{*/
        
        $data = array();
        if(false == $this->isCanBuilder())
        {
            return $data;    
        }
        
        $leftMoney = $this->leftMoney;
        for($i = 1;$i <= $this->num;$i++)
        {
            $data[$i] = $this->fx($i);
            $leftMoney = $leftMoney - $data[$i]; 
        }

        list($okLeftMoney,$okData) = $this->format($leftMoney,$data);

        shuffle($okData);
        $this->leftMoney = $okLeftMoney;

        return $okData;
    }/*}}}*/

    public function isCanBuilder()
    {/*{{{*/
        if(false == is_int($this->num) || $this->num <= 0) 
        {
            return false;    
        }

        if(false ==  is_numeric($this->totalMoney) || $this->totalMoney <= 0)
        {
            return false;
        }

        $avgMoney = $this->totalMoney / 1.0 / $this->num;
        
        if($avgMoney < $this->minMoney )
        {
            return false;
        }
        
        return true;

    }/*}}}*/

    public function getLeftMoney()
    {/*{{{*/
        return $this->leftMoney;
    }/*}}}*/

    public function fx($x)
    {/*{{{*/
        
        if(false == $this->isCanBuilder())
        {
            return 0;
        }

        if($x < 1 || $x > $this->num)
        {
            return 0;
        }
        
        $x1 = 1;
        $y1 = $this->minMoney;
        
        $y2 = $this->maxMoney;

        $x2 = ceil($this->num /  1.0 / 2);

        $x3 = $this->num;
        $y3 = $this->minMoney;  

        if($x1 == $x2 && $x2 == $x3)
        {
            return $y2;
        }

        if($x1 != $x2 && $x >= $x1 && $x <= $x2)
        {

            $y = 1.0 * ($x - $x1) / ($x2 - $x1) * ($y2 - $y1) + $y1;  
            return number_format($y, 2, '.', '');
        }

        if($x2 != $x3 && $x >= $x2 && $x <= $x3)
        {

            $y = 1.0 * ($x - $x2) / ($x3 - $x2) * ($y3 - $y2) + $y2;  
            return number_format($y, 2, '.', '');
        }
        
        return 0;


    }/*}}}*/

    private function format($leftMoney,array $data)
    {/*{{{*/

        if(false == $this->isCanBuilder())
        {
            return array($leftMoney,$data);  
        }
        
        if(0 == $leftMoney)
        {
            return array($leftMoney,$data);  
        }

        if(count($data) < 1)
        {
            return array($leftMoney,$data);  
        }

        if('Can_Left' == $this->formatType
          && $leftMoney > 0)
        {
            return array($leftMoney,$data);  
        }


        $myMax = $this->maxMoney;

        while($leftMoney > 0)
        {
            $found = 0;
            foreach($data as $key => $val) 
            {
                if($leftMoney <= 0)
                {
                    break;
                }

                $afterLeftMoney =  (double)$leftMoney - 0.01;
                $afterVal = (double)$val + 0.01;
                if( $afterLeftMoney >= 0  && $afterVal <= $myMax)
                {
                    $found = 1;
                    $data[$key] = number_format($afterVal,2,'.','');
                    $leftMoney = $afterLeftMoney;
                    $leftMoney = number_format($leftMoney,2,'.','');
                }
            }

            if($found == 0)
            {
                break;
            }
        }
        while($leftMoney < 0)
        {
            $found = 0;
            foreach($data as $key => $val) 
            {
                if($leftMoney >= 0)
                {
                    break; 
                }
                
                $afterLeftMoney =  (double)$leftMoney + 0.01;
                $afterVal = (double)$val - 0.01;
                if( $afterLeftMoney <= 0 && $afterVal >= $this->minMoney)
                {
                    $found = 1;
                    $data[$key] = number_format($afterVal,2,'.','');
                    $leftMoney = $afterLeftMoney;
                    $leftMoney = number_format($leftMoney,2,'.','');
                }
            }
            
            if($found == 0)
            {
                break;
            }
        }
        return array($leftMoney,$data);  
    }/*}}}*/

}/*}}}*/

class RedPackageBuilder
{/*{{{*/

    protected static $_instance = null;  

    public static function getInstance()
    {  /*{{{*/
        if (null === self::$_instance) 
        {  
            self::$_instance = new self();  
        }  
        return self::$_instance;  
    }  /*}}}*/

    public function getBuilderStrategy($type)
    {  /*{{{*/
        $class = $type.'PackageStrategy';

        if(class_exists($class))
        {
            return new $class();  
        }
        else
        {
            throw new Exception("{$class} 类不存在！");
        }
    }  /*}}}*/

    public function getRedPackageByDTO(OptionDTO $optionDTO) 
    {/*{{{*/
        $builderStrategy = $this->getBuilderStrategy($optionDTO->builderStrategy);

        $builderStrategy->setOption($optionDTO);

        return $builderStrategy->create();
    }/*}}}*/
    
}/*}}}*/

class Client
{/*{{{*/
    public static function main($argv)
    {
        $dto = OptionDTO::create(1000,10,100,100,'Equal');
        $data = RedPackageBuilder::getInstance()->getRedPackageByDTO($dto);

        $dto = OptionDTO::create(5,10,0.01,0.99,'RandTriangle');
        $data = RedPackageBuilder::getInstance()->getRedPackageByDTO($dto);
        print_r($data);

        $dto = OptionDTO::create(5,10,0.01,0.99,'RandTriangle','Can_Left');
        $data = RedPackageBuilder::getInstance()->getRedPackageByDTO($dto);
        
    }
}/*}}}*/




/*
 
*/