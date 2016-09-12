<?php namespace SalesforceRestAPI;

/**
 * The job class used for batch operations
 */
class Job {

  const TYPE_CSV      = 'CSV';
  const TYPE_JSON     = 'JSON';
  const TYPE_XML      = 'XML';
  const TYPE_ZIP_CSV  = 'ZIP_CSV';
  const TYPE_ZIP_JSON = 'ZIP_JSON';
  const TYPE_ZIP_XML  = 'ZIP_XML';

  const OPERATION_INSERT      = 'insert';
  const OPERATION_DELETE      = 'delete';
  const OPERATION_QUERY       = 'query';
  const OPERATION_UPSERT      = 'upsert';
  const OPERATION_UPDATE      = 'update';
  const OPERATION_HARD_DELETE = 'hardDelete';

  const STATE_OPEN    = 'Open';
  const STATE_CLOSED  = 'Closed';
  const STATE_ABORTED = 'Aborted';
  const STATE_FAILED  = 'Failed';

  protected $batches = [];

  /**
   * constructor
   */
  public function __construct($data)
  {
    // getto dynamic loader
    foreach ($data as $k => $v)
    {
      $this->{$k} = $v;
    }
  }

  public function addBatch(BatchInfo $batch)
  {
    $this->batches[] = $batch;
  }

  public function getAllBatchInfo()
  {
    return $this->batches;
  }
}
