<?php

namespace Validation;

class Validator
{

    private $data;
    private $errors;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function validate(array $rules): ?array
    {
        foreach ($rules as $name => $rulesArray) {
            if (array_key_exists($name, $this->data)) {
                foreach ($rulesArray as $rule) {
                    switch ($rule) {
                        case 'required':
                            $this->required($name, $this->data[$name]);
                            break;
                        case 'onlyString':
                            $this->_checkAndSanitizeStr($name, $this->data[$name]);
                            break;
                        case 'checkMail':
                            $this->isEmail($name, $this->data[$name]);
                            break;
                        case substr($rule, 0, 3) === 'min':
                            $this->min($name, $this->data[$name], $rule);
                        default:
                            # code...
                            break;
                    }
                }
            }
        }

        return $this->getErrors();
    }

    private function required(string $name, string $value)
    {
        $value = trim($value);

        if (!isset($value) || is_null($value) || empty($value)) {
            $this->errors[$name][] = "{$name} est requis.";
        }
    }

    private function min(string $name, string $value, string $rule)
    {
        preg_match_all('/(\d+)/', $rule, $matches);
        $limit = (int) $matches[0][0];

        if (strlen($value) < $limit) {
            $this->errors[$name][] = "{$name} doit comprendre un minimum de {$limit} caractères";
        }
    }

    private function _checkAndSanitizeStr(string $name, string $value)
    {
        $value = htmlspecialchars($value);
        if (!is_string($value)){
            $this->errors[$name][] = "veuillez saisir une chaine de charactères";
        }
    }

    private function isEmail(string $name, string $value){
        $value = filter_var($value, FILTER_VALIDATE_EMAIL);
        if(!filter_var($value, FILTER_VALIDATE_EMAIL)){
            $this->errors[$name][] = "veuillez saisir une adresse mail valide";
        }
    }

    private function getErrors(): ?array
    {
        return $this->errors;
    }
}
