<?php

// phpcs:ignorefile

declare(strict_types=1);

/**
 * Infobip Client API Libraries OpenAPI Specification
 *
 * OpenAPI specification containing public endpoints supported in client API libraries.
 *
 * Contact: support@infobip.com
 *
 * This class is auto generated from the Infobip OpenAPI specification through the OpenAPI Specification Client API libraries (Re)Generator (OSCAR), powered by the OpenAPI Generator (https://openapi-generator.tech).
 *
 * Do not edit manually. To learn how to raise an issue, see the CONTRIBUTING guide or contact us @ support@infobip.com.
 */

namespace Infobip\Model;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation as Serializer;
use Symfony\Component\Serializer\Annotation\Ignore;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Annotation\DiscriminatorMap;

class MmsMessageResult implements ModelInterface
{
    public const DISCRIMINATOR = '';
    public const OPENAPI_MODEL_NAME = 'MmsMessageResult';

    public const OPENAPI_FORMATS = [
        'to' => null,
        'status' => null,
        'messageId' => null
    ];

    /**
     */
    public function __construct(
        #[Assert\Valid]
    #[Assert\NotBlank]

    protected \Infobip\Model\MmsStatus $status,
        protected ?string $to = null,
        protected ?string $messageId = null,
    ) {
    }

    #[Ignore]
    public function getModelName(): string
    {
        return self::OPENAPI_MODEL_NAME;
    }

    #[Ignore]
    public static function getDiscriminator(): ?string
    {
        return self::DISCRIMINATOR;
    }

    public function getTo(): string|null
    {
        return $this->to;
    }

    public function setTo(?string $to): self
    {
        $this->to = $to;
        return $this;
    }

    public function getStatus(): \Infobip\Model\MmsStatus
    {
        return $this->status;
    }

    public function setStatus(\Infobip\Model\MmsStatus $status): self
    {
        $this->status = $status;
        return $this;
    }

    public function getMessageId(): string|null
    {
        return $this->messageId;
    }

    public function setMessageId(?string $messageId): self
    {
        $this->messageId = $messageId;
        return $this;
    }
}
