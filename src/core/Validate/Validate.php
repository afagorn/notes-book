<?php
declare(strict_types=1);

namespace System\Validate;

class Validate
{
    const RULE_REQUIRED = 'required';

    const RULE_INTEGER = 'integer';

    const RULE_STRING = 'string';

    const RULE_EMAIL = 'email';

    private array $data;

    /**
     * @param array $rules
     * @param array $data
     */
    public function validate(array $rules, array $data)
    {
        $errorMessage = '';

        /*
         * required
         * integer
         * string
         * email
         */
        foreach ($rules as $dataKey => $ruleString) {
            if(!is_string($ruleString)) {
                throw new \InvalidArgumentException('Rule must be a string');
            } elseif(!is_string($dataKey)) {
                throw new \InvalidArgumentException('Data key must be a string');
            }

            $rulesParsed = explode('|', $ruleString);

            if(empty($data[$dataKey])) {
                if(array_search(self::RULE_REQUIRED, $rulesParsed) !== false) {
                    $errorMessage = "$dataKey is required";
                    break;
                }
                continue;
            }

            $value = $data[$dataKey];

            foreach ($rulesParsed as $rule) {
                switch ($rule) {
                    case self::RULE_INTEGER:
                        if(is_null($this->integer($dataKey))) {
                            $errorMessage = "$dataKey must be integer";
                            break 2;
                        }
                    case self::RULE_STRING:
                        if(!$this->string($dataKey)) {
                            $errorMessage = "$dataKey must be string";
                            break 2;
                        }
                }
            }
        }

        if(!empty($errorMessage)) {
            throw new \InvalidArgumentException($errorMessage);
        }
    }

    private function integer(string $dataKey): bool
    {
        $result = filter_var($this->data[$dataKey], FILTER_VALIDATE_INT);

        if($result !== false) {
            $this->data[$dataKey] = $result;

            return false;
        }

        return true;
    }

    private function string(string $dataKey)
    {

    }
}