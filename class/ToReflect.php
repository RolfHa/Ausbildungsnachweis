<?php


class ToReflect
{

    public static function entity2array($entity, $recursionDepth = 2)
    {
        $result = array();
        $class = new ReflectionClass(get_class($entity));
        foreach ($class->getMethods(ReflectionMethod::IS_PUBLIC) as $method) {
            $methodName = $method->name;
            // nur standartisierte Getter-Methoden
            // weitere Methoden (mit Camelcase wie "getById(int $id))" rausnehmen
            if (strpos($methodName, "get") === 0 && strlen($methodName) > 3 &&
                //substr($methodName, 4) == strtolower(substr($methodName, 4))) {
                $methodName!=='getById'){
                $propertyName = lcfirst(substr($methodName, 3));
                $value = $method->invoke($entity);

                if (is_object($value)) {
                    if ($recursionDepth > 0) {
                        $result[$propertyName] = self::entity2array($value, $recursionDepth - 1);
                    } else {
                        $result[$propertyName] = "***";  // Stop recursion
                    }
                } else {
                    $result[$propertyName] = $value;
                }
            }
        }
        return $result;
    }
}