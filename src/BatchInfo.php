<?php namespace SalesforceRestAPI;

/**
 * The BatchInfo class used for batch operations
 */
class BatchInfo
{
  const STATE_QUEUED        = 'Queued';
  const STATE_IN_PROGRESS   = 'InProgress';
  const STATE_COMPLETED     = 'Completed';
  const STATE_FAILED        = 'Failed';
  const STATE_NOT_PROCESSED = 'Not Processed';

  /**
   * @var Job
   */
  protected $job;

  /**
   * constructor
   *
   * @param array $data
   * @param Job   $job
   */
  public function __construct($data, Job $job)
  {
    // getto dynamic loader
    foreach ($data as $k => $v)
    {
      $this->{$k} = $v;
    }

    $this->job = $job;
  }

  /**
   * Return associated Job
   *
   * @return Job
   */
  public function getJob()
  {
    return $this->job;
  }
}
