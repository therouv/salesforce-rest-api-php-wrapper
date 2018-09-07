<?php namespace Salesforce\Rest\Batch;

/**
 * The BatchResult class used for batch operations
 */
class Result
{
    /**
     * @var Info
     */
    protected $batchInfo;

    /**
     * constructor
     *
     * @param array $data
     * @param Info  $batchInfo
     */
    public function __construct($data, Info $batchInfo)
    {
        foreach ($data as $k => $v) {
            $this->{$k} = $v;
        }

        $this->batchInfo = $batchInfo;
    }

    /**
     * Return the associated BatchInfo
     *
     * @return Info
     */
    public function getBatchInfo()
    {
        return $this->batchInfo;
    }
}
