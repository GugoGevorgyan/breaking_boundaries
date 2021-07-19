<?php
/**
 * @param object $object
 * @return string
 */
function getClassName(object $object): string
{
    return substr(strrchr(get_class($object), "\\"), 1);
}
