<?php

namespace autoxloo\fcm\message\target;

use autoxloo\fcm\exceptions\EmptyValueException;

/**
 * Class TargetToken
 * @see https://firebase.google.com/docs/reference/fcm/rest/v1/projects.messages#Message.FIELDS.token
 * @since 1.0.1
 */
class TargetToken implements Target
{
    const TARGET_KEY = 'token';

    /**
     * @var string Registration token to send a message to.
     */
    protected $token;


    /**
     * TargetToken constructor.
     *
     * @param string $token Registration token to send a message to.
     *
     * @throws EmptyValueException
     * @throws \UnexpectedValueException
     */
    public function __construct($token)
    {
        if (!is_string($token)) {
            throw new \UnexpectedValueException('Field "token" has to be a string');
        }
        if (empty($token)) {
            throw new EmptyValueException('Field "token" can not be empty');
        }

        $this->token = $token;
    }

    /**
     * Gets FCM target key (token, topic, condition) and it value.
     *
     * @return array Map (key: string, value: string)
     */
    public function getTargetKeyValue()
    {
        return [self::TARGET_KEY => $this->token];
    }
}
