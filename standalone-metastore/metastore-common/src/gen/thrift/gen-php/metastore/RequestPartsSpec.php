<?php
namespace metastore;

/**
 * Autogenerated by Thrift Compiler (0.14.1)
 *
 * DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
 *  @generated
 */
use Thrift\Base\TBase;
use Thrift\Type\TType;
use Thrift\Type\TMessageType;
use Thrift\Exception\TException;
use Thrift\Exception\TProtocolException;
use Thrift\Protocol\TProtocol;
use Thrift\Protocol\TBinaryProtocolAccelerated;
use Thrift\Exception\TApplicationException;

class RequestPartsSpec
{
    static public $isValidate = false;

    static public $_TSPEC = array(
        1 => array(
            'var' => 'names',
            'isRequired' => false,
            'type' => TType::LST,
            'etype' => TType::STRING,
            'elem' => array(
                'type' => TType::STRING,
                ),
        ),
        2 => array(
            'var' => 'exprs',
            'isRequired' => false,
            'type' => TType::LST,
            'etype' => TType::STRUCT,
            'elem' => array(
                'type' => TType::STRUCT,
                'class' => '\metastore\DropPartitionsExpr',
                ),
        ),
    );

    /**
     * @var string[]
     */
    public $names = null;
    /**
     * @var \metastore\DropPartitionsExpr[]
     */
    public $exprs = null;

    public function __construct($vals = null)
    {
        if (is_array($vals)) {
            if (isset($vals['names'])) {
                $this->names = $vals['names'];
            }
            if (isset($vals['exprs'])) {
                $this->exprs = $vals['exprs'];
            }
        }
    }

    public function getName()
    {
        return 'RequestPartsSpec';
    }


    public function read($input)
    {
        $xfer = 0;
        $fname = null;
        $ftype = 0;
        $fid = 0;
        $xfer += $input->readStructBegin($fname);
        while (true) {
            $xfer += $input->readFieldBegin($fname, $ftype, $fid);
            if ($ftype == TType::STOP) {
                break;
            }
            switch ($fid) {
                case 1:
                    if ($ftype == TType::LST) {
                        $this->names = array();
                        $_size540 = 0;
                        $_etype543 = 0;
                        $xfer += $input->readListBegin($_etype543, $_size540);
                        for ($_i544 = 0; $_i544 < $_size540; ++$_i544) {
                            $elem545 = null;
                            $xfer += $input->readString($elem545);
                            $this->names []= $elem545;
                        }
                        $xfer += $input->readListEnd();
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 2:
                    if ($ftype == TType::LST) {
                        $this->exprs = array();
                        $_size546 = 0;
                        $_etype549 = 0;
                        $xfer += $input->readListBegin($_etype549, $_size546);
                        for ($_i550 = 0; $_i550 < $_size546; ++$_i550) {
                            $elem551 = null;
                            $elem551 = new \metastore\DropPartitionsExpr();
                            $xfer += $elem551->read($input);
                            $this->exprs []= $elem551;
                        }
                        $xfer += $input->readListEnd();
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                default:
                    $xfer += $input->skip($ftype);
                    break;
            }
            $xfer += $input->readFieldEnd();
        }
        $xfer += $input->readStructEnd();
        return $xfer;
    }

    public function write($output)
    {
        $xfer = 0;
        $xfer += $output->writeStructBegin('RequestPartsSpec');
        if ($this->names !== null) {
            if (!is_array($this->names)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('names', TType::LST, 1);
            $output->writeListBegin(TType::STRING, count($this->names));
            foreach ($this->names as $iter552) {
                $xfer += $output->writeString($iter552);
            }
            $output->writeListEnd();
            $xfer += $output->writeFieldEnd();
        }
        if ($this->exprs !== null) {
            if (!is_array($this->exprs)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('exprs', TType::LST, 2);
            $output->writeListBegin(TType::STRUCT, count($this->exprs));
            foreach ($this->exprs as $iter553) {
                $xfer += $iter553->write($output);
            }
            $output->writeListEnd();
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}