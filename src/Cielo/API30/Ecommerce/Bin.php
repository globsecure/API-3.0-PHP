<?php
namespace Cielo\API30\Ecommerce;


class Bin implements \JsonSerializable
{
    /**
     * 6 primeiros dígitos do cartão
     *
     * @var string $bin
     */
    protected $bin;

    /**
     *
     * Status da requisição de análise de Bins:
     *
     * 00 – Analise autorizada
     * 01 – Bandeira não suportada
     * 02 – Cartão não suportado na consulta de bin
     * 73 – Afiliação bloqueada
     *
     * @var string $status
     */
    protected $status;

    /**
     * Bandeira do cartão
     *
     * @var string $provider
     */
    protected $provider;

    /**
     *
     * Tipo do cartão em uso :
     *      Credito
     *      Debito
     *      Multiplo
     *
     * @var string $cardType
     */
    protected $cardType;

    /**
     * Se o cartão é emitido no exterior (False/True)
     *
     * @var string $foreigncard
     */
    protected $foreignCard;

    /**
     * @return string
     */
    public function getBin()
    {
        return $this->bin;
    }

    /**
     * @param string $bin
     * @return $this
     */
    public function setBin($bin)
    {
        $this->bin = $bin;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return string
     */
    public function getProvider()
    {
        return $this->provider;
    }

    /**
     * @param string $provider
     * @return $this
     */
    public function setProvider($provider)
    {
        $this->provider = $provider;
        return $this;
    }

    /**
     * @return string
     */
    public function getCardType()
    {
        return $this->cardType;
    }

    /**
     * @param string $cardType
     * @return $this
     */
    public function setCardType($cardType)
    {
        $this->cardType = $cardType;
        return $this;
    }

    /**
     * @return string
     */
    public function getForeignCard()
    {
        return $this->foreignCard;
    }

    /**
     * @param string $foreignCard
     * @return $this
     */
    public function setForeignCard($foreignCard)
    {
        $this->foreignCard = $foreignCard;

        return $this;
    }

    /**
     * @param $json
     *
     * @return Bin
     */
    public static function fromJson($json)
    {
        $object = json_decode($json);

        $bin = new Bin();
        $bin->populate($object);

        return $bin;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    /**
     * @param \stdClass $data
     */
    public function populate(\stdClass $data)
    {
        $this->bin          = isset($data->Bin) ? $data->Bin : null;
        $this->status       = isset($data->Status) ? $data->Status : null;
        $this->provider     = isset($data->Provider) ? $data->Provider : null;
        $this->cardType     = isset($data->CardType) ? $data->CardType : null;
        $this->foreignCard  = isset($data->ForeignCard) ? $data->ForeignCard : null;
    }
}