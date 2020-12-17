<?php

namespace InTradeSys\eBay\fileTransfer;


/**
 * This class represents a tree in xml structures.
 */
class EbatNsFileTransfer_ComplexType extends EbatNsFileTransfer_SimpleType
{
    const NAME = 'EbatNsFileTransfer_ComplexType';
    const XMLNS = 'urn:ebay:apis:eBLBaseComponents';

    /**
     * @return array
     */
    public function listUndeclaredProperties()
    {
        return $this->_undeclaredProperties;
    }

    /**
     * @param string|null $element
     * @param object|null $encoder
     * @param array $attributes
     * @return string
     */
    public function toXml($element = null, $encoder = null, $attributes = [])
    {
        $ret = '';

        foreach (self::listElements() as $tag => $info) {
            $value = $this->readProperty($tag);
            $type = $info['type'];
            $elementMarkup = '';

            if (is_array($value)) {
                foreach ($value as $item) {
                    if ($item instanceof EbatNsFileTransfer_SimpleType) {
                        $elementMarkup .= $item->toXml($tag, $encoder ? $encoder : true);
                    } else { // literal
                        $elementMarkup .= self::tagify($tag, $item, [], $encoder, $type);
                    }
                }
            } elseif ($value instanceof EbatNsFileTransfer_SimpleType) {
                $elementMarkup .= $value->toXml($tag, $encoder ? $encoder : true);
            } else { // literal
                $elementMarkup .= self::tagify($tag, $value, [], $encoder, $type);
            }

            $ret .= $elementMarkup;
        }

        foreach ($this->_undeclaredProperties as $tag => $properties) {
            $ret .= '<!-- Use "listUndeclaredProperties" to access "' . $tag . '". -->';

            foreach ($properties as $value) {
                if ($value instanceof EbatNsFileTransfer_SimpleType) {
                    $ret .= $value->toXml($tag, $encoder ? $encoder : true);
                } else { // literal
                    $ret .= self::tagify($tag, $value, [], $encoder, 'undeclared');
                }
            }
        }

        return self::tagify($element, $ret, $attributes);
    }
}
