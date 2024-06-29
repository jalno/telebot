<?php

namespace packages\telebot;

class MessageEntity extends Type
{
    /**
     * Type of the entity.
     * One of mention (@username), hashtag, bot_command, url, email, bold (bold text),
     * italic (italic text), code (monowidth string),pre (monowidth block), text_link (for clickable text URLs).
     *
     * @var string
     */
    protected $type;

    /**
     * Offset in UTF-16 code units to the start of the entity.
     *
     * @var int
     */
    protected $offset;

    /**
     * Length of the entity in UTF-16 code units.
     *
     * @var int
     */
    protected $length;

    /**
     * Optional. For “text_link” only, url that will be opened after user taps on the text.
     *
     * @var string
     */
    protected $url;

    public function __construct(string $type, int $offset, int $length)
    {
        $this->type = $type;
        $this->offset = $offset;
        $this->length = $length;
    }

    public static function fromJson($data)
    {
        $object = new self($data->type, $data->offset, $data->length);
        if (isset($data->url)) {
            $object->url = $data->url;
        }

        return $object;
    }

    public function toJson()
    {
        return [
            'type' => $this->type,
            'offset' => $this->offset,
            'length' => $this->length,
            'url' => $this->url,
        ];
    }

    /**
     * Get italic (italic text), code (monowidth string),pre (monowidth block), text_link (for clickable text URLs).
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Set italic (italic text), code (monowidth string),pre (monowidth block), text_link (for clickable text URLs).
     *
     * @param string $type italic (italic text), code (monowidth string),pre (monowidth block), text_link (for clickable text URLs)
     *
     * @return void
     */
    public function setType(string $type)
    {
        $this->type = $type;
    }

    /**
     * Get offset in UTF-16 code units to the start of the entity.
     */
    public function getOffset(): int
    {
        return $this->offset;
    }

    /**
     * Set offset in UTF-16 code units to the start of the entity.
     *
     * @param int $offset Offset in UTF-16 code units to the start of the entity
     *
     * @return void
     */
    public function setOffset(int $offset)
    {
        $this->offset = $offset;
    }

    /**
     * Get length of the entity in UTF-16 code units.
     */
    public function getLength(): int
    {
        return $this->length;
    }

    /**
     * Set length of the entity in UTF-16 code units.
     *
     * @param int $length Length of the entity in UTF-16 code units
     *
     * @return void
     */
    public function setLength(int $length)
    {
        $this->length = $length;
    }
}
